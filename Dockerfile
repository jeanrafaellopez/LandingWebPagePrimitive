# Use an FPM base image so we can pair it with a web server (nginx/Render builder)
FROM php:8.3-fpm

# system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm \
 && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# install composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# set working directory
WORKDIR /var/www/html

# copy existing application files
COPY . .

# ensure environment file is present
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --prefer-dist --no-interaction \
 && php artisan key:generate --force \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache

# build frontend assets
RUN npm ci \
 && npm run build

# clean up dev dependencies to slim image (optional)
RUN npm prune --production || true

# set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# expose the default http port for Render
EXPOSE 10000

# start php-fpm (Render will proxy requests to this port)
CMD ["php-fpm"]
