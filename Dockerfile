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
    libicu-dev \
    libcurl4-openssl-dev \
    libgmp-dev \
    libmagickwand-dev \
    nodejs \
    npm \
 && pecl install imagick \
 && docker-php-ext-enable imagick \
 && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl curl gmp

# install composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# set working directory
WORKDIR /var/www/html

# copy existing application files
COPY . .

# ensure environment file is present
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# install PHP dependencies (separate lines for clearer failure output)
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --prefer-dist --no-interaction --ignore-platform-reqs --verbose || cat /var/www/html/composer-error.log

# environment and artisan caches
RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN php artisan key:generate --force --quiet
RUN php artisan config:cache --verbose
RUN php artisan route:cache --verbose
RUN php artisan view:cache --verbose

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
