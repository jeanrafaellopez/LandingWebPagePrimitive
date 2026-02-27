# 🎨 Referencia de Estilos - Landing Page ExampleEnterprize

## Paleta de Colores

### Gradientes Principales
```css
/* Gradiente del Título */
from-blue-600 via-purple-600 to-pink-600

/* Colores Individuales */
Blue:   #3b82f6  (from-blue-600)
Purple: #a855f7  (via-purple-600) 
Pink:   #ec4899  (to-pink-600)
```

### Fondos
```css
Claro:
- White:         #ffffff
- Slate-50:      #f8fafc
- Slate-100:     #f1f5f9
- Gray-50:       #f9fafb
- Gray-900:      #111827

Oscuro (Dark Mode):
- Neutral-900:   #171717
- Neutral-950:   #0a0a0a
- Black:         #000000
- Blue-950:      #0c2d78
```

## Tipografía

```css
Font Family: 'Inter', sans-serif
Pesos:
- Regular:  400
- Medium:   500
- Semibold: 600
- Bold:     700
- ExtraBold: 800

Tamaños Frontend:
- Hero Title:      text-7xl sm:text-8xl (56px → 96px)
- Section Title:   text-5xl sm:text-6xl (48px → 60px)
- Card Title:      text-2xl sm:text-3xl (24px → 30px)
- Body:            text-lg sm:text-xl  (18px → 20px)
- Small:           text-sm            (14px)
```

## Espaciado

```css
Hero Section:   pt-40 pb-20   (top/bottom padding)
Services:       py-24         (32rem padding vertical)
CTA:            py-20         (20px padding vertical)
Footer:         py-16         (16px padding vertical)

Container:      max-w-7xl     (80rem width)
Gaps:           gap-8, gap-10, gap-12
```

## Efectos y Sombras

### Sombras
```css
shadow-lg:     0 10px 15px -3px rgba(0,0,0,0.1)
shadow-xl:     0 20px 25px -5px rgba(0,0,0,0.1)
hover:shadow-2xl: 0 25px 50px -12px rgba(0,0,0,0.25)
```

### Blur Effects
```css
backdrop-blur-md   (12px blur)
filter blur-3xl    (48px blur)
mix-blend-multiply (para elementos decorativos)
```

### Bordes y Radios
```css
rounded-lg:    0.5rem (8px)
rounded-xl:    0.75rem (12px)
rounded-2xl:   1rem (16px)
rounded-3xl:   1.5rem (24px)
rounded-full:  50%

border-l, border-r, border-b, border-gray-200 dark:border-neutral-800
```

## Animaciones Personalizadas

### Floating Animation
```css
@keyframes floating {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}
animation: floating 3s ease-in-out infinite;

/* Aplicada a elementos decorativos con delay */
<!-- Primer elemento (sin delay) -->
<!-- Segundo elemento (animation-delay: 1s) -->
```

### Transiciones Hover
```css
transition duration-300  (300ms)
transition duration-500  (500ms)
hover:opacity-80        (fade on hover)
hover:scale-105         (grow to 105%)
hover:translate-x-2     (move right 8px)
group-hover:*           (parrents affect children)
```

### Gradient Text
```css
bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600
bg-clip-text
text-transparent
```

## Componentes y Patrones

### Service Card
```html
<div class="group relative">
  <!-- Glow Background -->
  <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl blur-xl opacity-0 group-hover:opacity-75 transition duration-500"></div>
  
  <!-- Card Content -->
  <div class="relative bg-gradient-to-br from-white to-gray-50 dark:from-neutral-900 dark:to-neutral-800 rounded-3xl p-8 sm:p-10 transition duration-500 hover:scale-105">
    <!-- Top Border Animation -->
    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 transform scale-x-0 group-hover:scale-x-100 transition duration-500 origin-left"></div>
    
    <!-- Content -->
  </div>
</div>
```

### Button Styles

#### Primary Button
```html
<a class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-lg hover:opacity-90 transition-opacity">
  Acción Primaria
</a>
```

#### Secondary Button
```html
<a class="px-8 py-4 border-2 border-blue-600 text-blue-600 dark:border-blue-400 dark:text-blue-400 font-semibold rounded-lg hover:bg-blue-50 dark:hover:bg-blue-950 transition-colors">
  Acción Secundaria
</a>
```

## States y Variantes

### Hover States
```css
group-hover:opacity-75      (Fade backgrounds)
group-hover:scale-x-100     (Expand borders)
group-hover:scale-110       (Zoom images)
group-hover:text-transparent (Hide text)
group-hover:bg-clip-text    (Show gradient text)
group-hover:shadow-xl       (Drop shadow)
```

### Dark Mode
```css
dark:bg-neutral-950
dark:text-white
dark:border-neutral-800
dark:from-neutral-900
dark:to-neutral-800
dark:hover:bg-blue-950
```

## Layout Responsive

### Breakpoints (Tailwind)
```css
sm:  640px   (smartphones)
md:  768px   (tablets)
lg:  1024px  (desktops)
xl:  1280px  (large screens)
2xl: 1536px  (extra large)
```

### Grid Services
```css
grid-cols-1         (mobile: 1 column)
md:grid-cols-2      (tablet: 2 columns)
lg:grid-cols-3      (desktop: 3 columns)
gap-8 xl:gap-10     (responsive gaps)
```

## Z-Index Stack
```css
z-50   (Navbar fixed)
z-10   (Hero content, card content)
(default) (Sections, cards)
```

## Accessibility Features

```css
/* Focus states */
outline-hidden         (Remove default outline)
ring-2 ring-accent     (Custom focus ring)

/* Text contrast */
Dark backgrounds with white/light text
Light backgrounds with dark text

/* Semantic HTML -->
Proper heading hierarchy (h1, h2, h3)
Alt text on images
Aria labels where needed
```

## Performance Optimizations

```css
/* CSS containment for animated elements */
will-change: transform  (On floating elements)

/* GPU acceleration -->
transform: translateY()  (Instead of top/bottom)

/* Optimized blur -->
filter blur-3xl  (Not excessive, max 48px)
opacity values   (Instead of rgba colors for performance)
```

---

## Cómo Personalizar

1. **Cambiar colores primarios**: Reemplaza `blue-600 to-purple-600` con tus colores
2. **Velocidad de animaciones**: Cambia `3s`, `duration-300`, `duration-500`
3. **Tamaños de fuente**: Ajusta `text-7xl`, `text-5xl`, etc.
4. **Espaciado**: Modifica valores `pt-`, `pb-`, `gap-`, `p-`
5. **Radio de bordes**: Cambia `rounded-2xl`, `rounded-3xl`

Todos los valores son editables sin afectar la funcionalidad. 🎨
