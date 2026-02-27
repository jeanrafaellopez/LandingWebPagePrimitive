# 🛠️ Guía de Uso y Personalización - Landing Page

## 📋 Tabla de Contenidos
1. [Acceso a la Landing Page](#acceso)
2. [Actualizar Contenido](#contenido)
3. [Personalizar Estilos](#estilos)
4. [Agregar/Editar Servicios](#servicios)
5. [Cambiar Colores](#colores)
6. [Troubleshooting](#troubleshooting)

---

## 🌐 Acceso a la Landing Page {#acceso}

### URL Principal
La landing page está disponible en:
```
http://localhost:8000/
```

### Acceso sin Cambios
La landing page se renderiza automáticamente con datos dinámicos de tu BD.

---

## ✏️ Actualizar Contenido {#contenido}

### Cambiar Texto de Introducción (Recuadro)

**Opción 1: Desde la BD**
```bash
# Ejecuta tinker para editar
php artisan tinker

# En la consola:
$presentation = CompanyPresentation::first();
$presentation->contenido = 'Tu nuevo texto aquí';
$presentation->save();
```

**Opción 2: Directamente en archivo**
Edita: `resources/views/layouts/landing.blade.php`

Busca: `<h1 class="text-7xl ... ExampleEnterprize`
Reemplaza el texto si lo deseas.

### Cambiar Email de Contacto

En `resources/views/layouts/landing.blade.php`, busca:
```html
<a href="mailto:contacto@ejemplo.com">
```
Reemplaza `contacto@ejemplo.com` con tu email.

En `resources/views/livewire/landing-page.blade.php`, busca lo mismo y reemplaza.

---

## 🎨 Personalizar Estilos {#estilos}

### Archivo Principal: `resources/css/app.css`

Al final del archivo encontrarás:
```css
/* Landing Page Custom Styles */
@layer utilities {
    .floating-animation { ... }
    .gradient-text { ... }
}

@keyframes floating { ... }
```

### Cambiar Velocidad de Animaciones

Busca: `animation: floating 3s ease-in-out infinite;`
- `3s` = duración (aumenta para más lento)
- Cambia a `4s`, `5s`, etc.

Busca: `transition duration-300` o `duration-500`
- Cambia a `duration-200` (más rápido)
- O `duration-1000` (más lento)

---

## 🎯 Agregar/Editar Servicios {#servicios}

### Usando Admin Panel (Recomendado)

Si tienes un panel admin, usa `php artisan make:filament-resource Servicio`

### Directamente en la BD

```bash
php artisan tinker

# Crear nuevo servicio:
Servicio::create([
    'titulo' => 'Mi Nuevo Servicio',
    'descripcion' => '<p>Descripción del servicio</p>',
    'imagen' => 'servicios/imagen.jpg'
]);

# Editar existente:
$servicio = Servicio::find(1);
$servicio->titulo = 'Nuevo Título';
$servicio->save();
```

### Estructura Base de Datos
```sql
-- tabla servicios
id        (integer, PK)
titulo    (string)
descripcion (text/longtext - HTML permitido)
imagen    (string - ruta en storage)
created_at (timestamp)
updated_at (timestamp)
```

### Cargar Imágenes

Las imágenes se guardan en:
```
storage/app/public/
```

Usa el admin o copia directamente:
```bash
# Copiar imagen a storage
cp tu_imagen.jpg storage/app/public/servicios/

# La URL será:
/storage/servicios/tu_imagen.jpg
```

---

## 🌈 Cambiar Colores {#colores}

### Gradientes Principales

**Ubicación 1**: Vista Livewire  
Archivo: `resources/views/livewire/landing-page.blade.php`

Busca: `gradient-text`
```html
<!-- Antes -->
<h1 class="text-7xl ... gradient-text ...">

<!-- Cambiar usando clases Tailwind -->
from-blue-600 via-purple-600 to-pink-600
```

Reemplaza con otros colores Tailwind:
```
from-indigo-600 via-blue-500 to-cyan-400
from-orange-500 via-red-500 to-pink-500
from-green-400 via-teal-500 to-blue-600
```

**Ubicación 2**: Botones y CTAs  
Busca: `bg-gradient-to-r from-blue-600 to-purple-600`

**Ubicación 3**: Secciones  
Busca: `bg-gradient-to-r from-blue-600 to-purple-600`

### Cambiar Color de Fondo
Busca: `bg-gradient-to-br from-slate-50 via-slate-100 to-blue-50`

Opciones:
```css
/* Claro */
from-white via-slate-50 to-zinc-100

/* Colorido */
from-blue-50 via-purple-50 to-pink-50

/* Minimalista */
from-gray-900 via-gray-800 to-gray-900 (+ dark mode)
```

---

## 📱 Cambiar Breakpoints (Responsive)

Vende breakpoints disponibles en Tailwind:
```css
sm:  640px   (tablets)
md:  768px   (tablets grandes)
lg:  1024px  (desktops)
xl:  1280px  (desktops grandes)
2xl: 1536px  (ultra wide)
```

### Ejemplo: Cambiar grid de servicios

Actual:
```html
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
```

Opciones:
```html
<!-- 2 columnas desde tablet -->
<div class="grid grid-cols-1 md:grid-cols-2">

<!-- 4 columnas en desktop -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">

<!-- 2 columnas siempre -->
<div class="grid grid-cols-2">
```

---

## 🔤 Cambiar Tamaños de Fuente

### Títulos

**Hero Title** (ExampleEnterprize)  
Busca: `text-7xl sm:text-8xl`

Opciones:
```
text-6xl sm:text-7xl   (más pequeño)
text-7xl sm:text-8xl   (actual)
text-8xl sm:text-9xl   (más grande)
```

**Section Titles**  
Busca: `text-5xl sm:text-6xl`

**Card Titles**  
Busca: `text-2xl sm:text-3xl`

---

## 📐 Cambiar Espaciado

### Padding (Interno)
```
pt-40 = padding top 40 (10rem = 160px)
pb-20 = padding bottom 20 (5rem = 80px)
p-8   = padding 8 (2rem = 32px)
sm:p-12 = padding 12 en sm screens (3rem = 48px)
```

### Gap (Espaciado entre items)
```
gap-8  = 2rem (32px)
gap-10 = 2.5rem (40px)
gap-12 = 3rem (48px)
```

### Modificar ejemplo:
```html
<!-- Reducir espaciado -->
<!-- Antes: pt-40 pb-20 -->
<section class="pt-20 pb-10">

<!-- Aumentar espaciado -->
<section class="pt-60 pb-40">
```

---

## 🔌 Agregar Nuevas Secciones

### Template Base

```blade
<!-- Nueva Sección -->
<section class="py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Título -->
        <div class="text-center mb-20">
            <h2 class="text-5xl sm:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                Título Sección
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">
                Descripción
            </p>
        </div>

        <!-- Contenido -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Items aquí -->
        </div>
    </div>
</section>
```

Inserta en `resources/views/livewire/landing-page.blade.php` antes del CTA section.

---

## 🐛 Troubleshooting {#troubleshooting}

### Problema: Los estilos no se ven
**Solución**:
```bash
npm run build    # Recompila assets
php artisan view:clear  # Limpia cache de vistas
```

### Problema: Imágenes no cargan
**Solución**:
```bash
php artisan storage:link  # Vincula directorio storage
```

Verifica que `imagen` en BD apunte a ruta correcta en `storage/app/public/`

### Problema: Livewire no funciona
**Solución**:
```bash
php artisan livewire:publish
npm run build
```

### Problema: Dark mode no funciona
**Solución**:
- Verifica que el selector `dark` esté activo en tu proyecto
- En `resources/css/app.css` hay una línea: `@custom-variant dark (&:where(.dark, .dark *));`
- Asegúrate que tengas un toggle de dark mode

### Problema: Animaciones lentas/stuttering
**Solución**:
Reduce cantidad de blur effects o usa:
```css
will-change: transform;  /* Solo en elementos animados */
```

---

## 🧪 Testear Cambios Locales

```bash
# Compilar cambios
npm run build

# Ver en navegador
# http://localhost:8000

# Para desarrollo (auto-rebuild)
npm run dev
```

---

## 📊 Variables Personalizables (Resumen Rápido)

| Elemento | Archivo | Propiedad | Ejemplo |
|----------|---------|-----------|---------|
| Color gradiente | landing-page.blade.php | `from-blue-600` | Cambiar color |
| Velocidad animación | app.css | `3s` | Hacer más lento |
| Tamaño título | landing-page.blade.php | `text-7xl` | Hacer más grande |
| Espaciado secciones | landing-page.blade.php | `py-24` | Ajustar padding |
| Email contacto | landing-page.blade.php | `mailto:` | Nuevo email |
| Número de columnas | landing-page.blade.php | `lg:grid-cols-3` | Cambiar layout |

---

## ⚡ Mejores Prácticas

✅ **DO:**
- Siempre usar `npm run build` después de cambiar CSS
- Probar en móvil y desktop
- Documentar cambios importantes
- Hacer backup antes de grandes cambios

❌ **DON'T:**
- No modificar archivos en `vendor/`
- No editar vendor CSS directamente
- No commitear `node_modules`

---

## 📚 Referencias Rápidas

- **Tailwind Colors**: https://tailwindcss.com/docs/customizing-colors
- **Tailwind Utilities**: https://tailwindcss.com/docs/padding
- **Livewire Docs**: https://livewire.laravel.com
- **Laravel Docs**: https://laravel.com/docs

---

¡Tu landing page está lista para customizar! 🚀
