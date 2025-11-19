# Tailwind to WordPress Conversion Guide

This document maps all Tailwind CSS classes from the React/Lovable demo to their WordPress block editor equivalents.

## Hero Section Conversion Map

### Layout & Positioning

| React/Tailwind | WordPress Equivalent | Implementation |
|----------------|---------------------|----------------|
| `h-screen` | `minHeight: 100vh` | Cover block min-height setting |
| `relative` | `position: relative` | Cover block (default) |
| `absolute` | `position: absolute` | CSS class |
| `inset-0` | `top: 0; right: 0; bottom: 0; left: 0` | Cover block background |
| `flex items-center justify-center` | `layout: constrained` | Group block centered layout |
| `overflow-hidden` | `overflow: hidden` | CSS class on cover block |
| `z-10` | `z-index: 10` | CSS class |
| `z-50` | `z-index: 50` | CSS class |

### Background & Images

| React/Tailwind | WordPress Equivalent | Implementation |
|----------------|---------------------|----------------|
| `bg-cover bg-center` | `object-fit: cover` | Cover block image background |
| `bg-gradient-to-b from-transparent to-deep-charcoal/40` | `gradient: hero-overlay` | theme.json gradient |
| `backdrop-blur-lg` | `backdrop-filter: blur(16px)` | Custom CSS |
| `bg-background/95` | `rgba(255, 255, 255, 0.95)` | Custom CSS background |

### Typography

| React/Tailwind | WordPress Equivalent | Implementation |
|----------------|---------------------|----------------|
| `text-6xl` | `font-size: 3.75rem` | `clamp(3.5rem, 7vw, 4.5rem)` |
| `md:text-7xl` | `font-size: 4.5rem` | Included in clamp() |
| `font-serif` | `fontFamily: serif` | theme.json Cormorant Garamond |
| `text-xl` | `font-size: 1.25rem` | `clamp(1.25rem, 2.5vw, 1.5rem)` |
| `md:text-2xl` | `font-size: 1.5rem` | Included in clamp() |
| `font-light` | `font-weight: 300` | Inline style |
| `tracking-wide` | `letter-spacing: 0.05em` | Inline style |
| `text-background` | `color: white` | textColor: white |
| `text-sm` | `font-size: 0.875rem` | Inline style |
| `text-muted-foreground` | `color: taupe` | textColor: taupe |

### Spacing

| React/Tailwind | WordPress Equivalent | Implementation |
|----------------|---------------------|----------------|
| `px-4` | `padding: 0 1rem` | Inline style |
| `py-20` | `padding: 5rem 0` | spacing preset |
| `mb-4` | `margin-bottom: 1rem` | Inline style |
| `gap-4` | `gap: 1rem` | blockGap spacing |
| `p-6` | `padding: 1.5rem` | Inline style |
| `bottom-20` | `bottom: 5rem` | Custom CSS |
| `bottom-8` | `bottom: 2rem` | Custom CSS |

### Borders & Shadows

| React/Tailwind | WordPress Equivalent | Implementation |
|----------------|---------------------|----------------|
| `rounded-lg` | `border-radius: 0.5rem` | Inline style |
| `shadow-xl` | `box-shadow: large` | Custom CSS |
| `shadow-2xl` | `box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25)` | Custom CSS |
| `border border-border` | `border: 1px solid taupe` | Inline style |

### Responsive Design

| React/Tailwind | WordPress Equivalent | Implementation |
|----------------|---------------------|----------------|
| `flex-col` | `flex-direction: column` | Columns block (mobile default) |
| `md:flex-row` | `flex-direction: row` | Columns block (desktop) |
| `flex-1` | `flex: 1` | Column width: 25% |
| `max-w-4xl` | `max-width: 1000px` | contentSize on group |

### Animations

| React/Tailwind | WordPress Equivalent | Implementation |
|----------------|---------------------|----------------|
| `animate-fade-in` | `animation: fadeIn 1s ease-in` | Custom CSS class |
| `animate-bounce` | `animation: bounce 2s infinite` | Custom CSS class |
| `transition-all duration-300` | `transition: all 0.3s ease` | Custom CSS |

### Colors (theme.json mapping)

| React/Tailwind | WordPress Color Slug | Hex Value |
|----------------|---------------------|-----------|
| `bg-background` | `white` | `#FFFFFF` |
| `text-foreground` | `charcoal` | `#2D2D2D` |
| `bg-cream` | `beige` | `#F5F1E8` |
| `bg-soft-beige` | `taupe` | `#C4B5A0` |
| `bg-deep-charcoal` | `charcoal` | `#2D2D2D` |
| `bg-gold` / `text-gold` | `gold` | `#D4AF37` |
| `text-muted-foreground` | `taupe` | `#C4B5A0` |
| `border-border` | `taupe` | `#C4B5A0` |

## BookingWidget Conversion

### Form Elements

| React Component | WordPress Equivalent | Implementation |
|----------------|---------------------|----------------|
| `<Calendar />` (shadcn) | `<input type="date">` | HTML block |
| `<Select />` (shadcn) | `<select>` | HTML block |
| `<Button />` (shadcn) | Button block | Core button with gold background |
| `<Popover />` (shadcn) | Native browser picker | HTML5 date input |

### Input Styling

```css
/* React: shadcn/ui Button variant="outline" */
/* WordPress: Custom input styles */
.booking-date-input {
    padding: 0.75rem 1rem;
    border: 1px solid var(--wp--preset--color--taupe);
    border-radius: 0.375rem;
    font-size: 0.875rem;
}
```

### Grid Layout

```
React: flex flex-col md:flex-row gap-4
WordPress: Columns block with 4 columns (25% each)
Mobile: Stacks vertically via CSS media query
```

## Complete Mapping Reference

### Typography Scale

| Tailwind | WordPress | Actual Size |
|----------|-----------|-------------|
| `text-xs` | `small` | `0.75rem` |
| `text-sm` | - | `0.875rem` |
| `text-base` | `base` | `1rem` |
| `text-lg` | `medium` | `1.125rem` |
| `text-xl` | `large` | `1.25rem` |
| `text-2xl` | `x-large` | `1.5rem` |
| `text-3xl` | - | `1.875rem` |
| `text-4xl` | - | `2.25rem` |
| `text-5xl` | `xx-large` | `3rem` |
| `text-6xl` | - | `3.75rem` |
| `text-7xl` | `xxx-large` | `4.5rem` |

### Spacing Scale

| Tailwind | WordPress | Actual Size |
|----------|-----------|-------------|
| `1` | - | `0.25rem` |
| `2` | - | `0.5rem` |
| `4` | `small` | `1rem` |
| `6` | - | `1.5rem` |
| `8` | `medium` | `2rem` |
| `12` | - | `3rem` |
| `16` | `large` | `4rem` |
| `20` | - | `5rem` |
| `24` | `x-large` | `6rem` |

### Border Radius

| Tailwind | WordPress | Actual Size |
|----------|-----------|-------------|
| `rounded-sm` | `small` | `0.125rem` |
| `rounded` | `medium` | `0.25rem` |
| `rounded-md` | `medium` | `0.375rem` |
| `rounded-lg` | `large` | `0.5rem` |
| `rounded-xl` | - | `0.75rem` |
| `rounded-2xl` | - | `1rem` |
| `rounded-full` | - | `9999px` |

## Best Practices

### 1. Use theme.json for Design Tokens

Define colors, spacing, and typography in `theme.json` instead of inline styles:

```json
{
  "settings": {
    "color": {
      "palette": [
        { "slug": "gold", "color": "#D4AF37", "name": "Gold" }
      ]
    }
  }
}
```

### 2. Prefer clamp() for Responsive Typography

Instead of separate mobile/desktop sizes, use `clamp()`:

```css
/* React: text-6xl md:text-7xl */
/* WordPress: */
font-size: clamp(3.5rem, 7vw, 4.5rem);
```

### 3. Use CSS Custom Properties

Reference theme.json values in CSS:

```css
color: var(--wp--preset--color--gold);
```

### 4. Leverage Core Blocks

Use WordPress core blocks instead of custom HTML:
- Cover block for hero sections
- Columns block for responsive layouts
- Group block for containers
- Button block for CTAs

### 5. Mobile-First Responsive Design

Use media queries to enhance desktop experience:

```css
/* Mobile default */
.booking-widget { padding: 1.5rem; }

/* Desktop enhancement */
@media (min-width: 782px) {
  .booking-widget { padding: 2rem; }
}
```

## Testing Checklist

- [ ] Pattern inserts via Block Editor
- [ ] Responsive on mobile (< 768px)
- [ ] Responsive on tablet (768px - 1024px)
- [ ] Responsive on desktop (> 1024px)
- [ ] Animations work (fade-in, bounce)
- [ ] Form inputs are functional
- [ ] Button hover states work
- [ ] Accessibility (keyboard navigation, focus states)
- [ ] Performance (no layout shift, smooth animations)

## Resources

- [WordPress Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [theme.json Documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
- [Tailwind to CSS Converter](https://transform.tools/tailwind-to-css)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
