# React to WordPress Conversion Analysis
## The Aurelia Hotel Website

---

## Executive Summary

This document provides a comprehensive analysis of "The Aurelia" luxury hotel website, currently built with React, Vite, TypeScript, and Tailwind CSS. The analysis covers the complete component inventory, styling approach, data architecture, and detailed recommendations for conversion to WordPress with Full Site Editing (FSE) and Gutenberg blocks.

**Project Overview:**
- **Current Stack:** React 18.3.1 + TypeScript + Vite + Tailwind CSS + shadcn/ui
- **Target Stack:** WordPress 6.4+ with FSE Block Theme
- **Estimated Conversion Time:** 15-22 days
- **Complexity Level:** Medium to High (due to booking widget and interactive features)

---

## Table of Contents

1. [Codebase Structure](#1-codebase-structure)
2. [Complete Component Inventory](#2-complete-component-inventory)
3. [Component Hierarchy & Data Flow](#3-component-hierarchy--data-flow)
4. [Styling Analysis](#4-styling-analysis)
5. [Tailwind to CSS Conversion Strategy](#5-tailwind-to-css-conversion-strategy)
6. [Form Handling Recommendations](#6-form-handling-recommendations)
7. [Plugin Integration Points](#7-plugin-integration-points)
8. [Custom Post Types & Taxonomies](#8-custom-post-types--taxonomies)
9. [WordPress Block Strategy](#9-wordpress-block-strategy)
10. [Assets & Media](#10-assets--media)
11. [Technical Challenges & Solutions](#11-technical-challenges--solutions)
12. [Conversion Roadmap](#12-conversion-roadmap)
13. [Performance Considerations](#13-performance-considerations)
14. [SEO & Accessibility](#14-seo--accessibility)
15. [Maintenance & Scalability](#15-maintenance--scalability)

---

## 1. Codebase Structure

### 1.1 File Organization

```
aurelia-alpine-elegance/
├── src/
│   ├── components/
│   │   ├── BookingWidget.tsx          # Sticky booking form
│   │   ├── ExperienceBox.tsx          # Service/amenity card
│   │   ├── NavLink.tsx                # Navigation link component
│   │   ├── Newsletter.tsx             # Email subscription form
│   │   ├── RoomCard.tsx               # Room display card
│   │   ├── RoomDetailModal.tsx        # Room details modal
│   │   ├── TestimonialCard.tsx        # Guest testimonial card
│   │   └── ui/                        # shadcn/ui components (50+ files)
│   ├── pages/
│   │   ├── Index.tsx                  # Main homepage
│   │   └── NotFound.tsx               # 404 page
│   ├── assets/                        # Images (7 JPG files)
│   ├── hooks/                         # Custom React hooks
│   ├── lib/                           # Utilities
│   ├── App.tsx                        # Root app component
│   ├── main.tsx                       # Entry point
│   └── index.css                      # Global styles + design tokens
├── package.json                       # Dependencies
└── tailwind.config.ts                 # Tailwind configuration
```

### 1.2 Technology Stack

| Technology | Version | Purpose | WordPress Equivalent |
|------------|---------|---------|---------------------|
| React | 18.3.1 | UI Framework | WordPress + Gutenberg |
| TypeScript | 5.8.3 | Type Safety | PHP with type hints |
| Vite | 5.4.19 | Build Tool | WordPress build tools |
| Tailwind CSS | 3.4.17 | Styling | Custom CSS / theme.json |
| shadcn/ui | - | Component Library | Custom blocks |
| Radix UI | Various | Primitives | Native HTML/JS |
| React Router | 6.30.1 | Routing | WordPress rewrite rules |
| React Hook Form | 7.61.1 | Form Handling | WordPress forms/AJAX |
| date-fns | 3.6.0 | Date Utilities | PHP DateTime |
| Lucide React | 0.462.0 | Icons | Font Awesome / Dashicons |
| Sonner | 1.7.4 | Toast Notifications | Custom JS / WP notices |

### 1.3 Key Dependencies Requiring Conversion

**UI Components (Radix UI/shadcn/ui):**
- Dialog/Modal → WordPress modal or single page template
- Calendar → Flatpickr.js or jQuery UI Datepicker
- Popover → Custom JavaScript popovers
- Select → Styled select or custom dropdown
- Button → Standard HTML button with CSS
- Input → Standard HTML input with CSS

**State Management:**
- `useState` → WordPress transients, session storage, or AJAX
- Component state → Form state or DOM manipulation

**Routing:**
- React Router → WordPress permalinks and page templates

---

## 2. Complete Component Inventory

### 2.1 Page-Level Components

#### **Index (Homepage)**
- **File:** `src/pages/Index.tsx` (323 lines)
- **Description:** Main landing page with all sections
- **Sections:** Hero, Welcome, Rooms, Experiences, Testimonials, Location, Footer
- **State Management:** `selectedRoom` state for modal
- **Data:** Hardcoded room array (3 rooms)
- **WordPress Equivalent:** Front Page Template

### 2.2 Feature Components

#### **BookingWidget**
- **File:** `src/components/BookingWidget.tsx` (143 lines)
- **Purpose:** Sticky booking form for availability checking
- **Key Features:**
  - Date pickers (check-in/check-out)
  - Guest count selector
  - Sticky scroll behavior (appears at bottom after scrolling)
  - Form validation
  - Toast notifications
- **State:**
  - `checkIn: Date | undefined`
  - `checkOut: Date | undefined`
  - `guests: string`
  - `isSticky: boolean`
- **Dependencies:** shadcn/ui Calendar, Popover, Button, Select; date-fns; sonner
- **WordPress Strategy:** **CRITICAL COMPONENT**
  - Option 1: WP Hotel Booking plugin integration
  - Option 2: Custom block with AJAX handler
  - Requires: Date picker library, sticky scroll JS, form validation

#### **RoomCard**
- **File:** `src/components/RoomCard.tsx` (67 lines)
- **Purpose:** Display room information in card format
- **Props:**
  - `image: string` - Room photo URL
  - `badge?: string` - Optional badge (e.g., "MOST POPULAR")
  - `title: string` - Room name
  - `description: string` - Room specs (size, bed, view)
  - `features: string[]` - Amenity list
  - `price: string` - Price per night
  - `onViewDetails: () => void` - Click handler
- **Key Features:**
  - Image hover zoom effect
  - Badge overlay
  - Feature list with checkmarks
  - View Details button
- **WordPress Strategy:**
  - Custom Post Type: `hotel_room`
  - ACF fields for all metadata
  - Custom block: `aurelia/room-card`
  - Template part or block variation

#### **RoomDetailModal**
- **File:** `src/components/RoomDetailModal.tsx` (75 lines)
- **Purpose:** Display detailed room information in modal
- **Props:**
  - `isOpen: boolean`
  - `onClose: () => void`
  - `room: object | null`
- **Key Features:**
  - Modal overlay with backdrop
  - Large room image
  - Full description
  - Amenities grid
  - Book Now button
- **WordPress Strategy:**
  - **Approach 1:** Single room page template (Recommended for SEO)
  - **Approach 2:** JavaScript modal with AJAX content loading
  - Use FancyBox, Magnific Popup, or custom modal library

#### **TestimonialCard**
- **File:** `src/components/TestimonialCard.tsx` (39 lines)
- **Purpose:** Display guest testimonial
- **Props:**
  - `quote: string` - Testimonial text
  - `name: string` - Guest name
  - `location: string` - Guest location
  - `image: string` - Avatar photo
- **Key Features:**
  - 5-star rating (hardcoded)
  - Blockquote styling
  - Circular avatar
  - Hover shadow effect
- **WordPress Strategy:**
  - Custom Post Type: `testimonial`
  - ACF fields: quote, author, location, rating
  - Featured image for avatar
  - Custom block: `aurelia/testimonial-card`

#### **ExperienceBox**
- **File:** `src/components/ExperienceBox.tsx` (22 lines)
- **Purpose:** Display hotel amenity/service
- **Props:**
  - `icon: LucideIcon` - Icon component
  - `title: string` - Service name
  - `description: string` - Service description
- **Key Features:**
  - Icon in circular background
  - Hover scale animation
  - Centered text layout
- **WordPress Strategy:**
  - Custom block: `aurelia/experience-box`
  - Icon picker for block editor
  - Map Lucide icons to Font Awesome
  - Icons used: Sparkles (spa), UtensilsCrossed (dining), Mountain (adventures), Wine (cellar)

#### **Newsletter**
- **File:** `src/components/Newsletter.tsx` (42 lines)
- **Purpose:** Email subscription form
- **Features:**
  - Email input with validation
  - Regex email validation pattern
  - Submit handler with console logging
  - Toast notification on success/error
  - Form reset after submission
- **WordPress Strategy:**
  - **Option 1:** Mailchimp for WordPress plugin (Recommended)
  - **Option 2:** Contact Form 7 with Mailchimp extension
  - **Option 3:** Custom block with AJAX handler
  - Requires: Email validation, nonce security, database storage or API integration

### 2.3 Section Components (Inline in Index.tsx)

All sections below are defined inline within the Index.tsx file:

1. **Hero Section** (Lines 67-91)
   - Full-screen background image
   - Centered title and tagline
   - Integrated BookingWidget
   - Scroll indicator with bounce animation

2. **Welcome Section** (Lines 94-137)
   - Two-column layout
   - "Welcome to The Aurelia" content
   - Three paragraphs of description
   - Featured interior image
   - Call-to-action link

3. **Rooms Showcase** (Lines 140-157)
   - Section heading and subtitle
   - Grid of 3 RoomCard components
   - Dynamic mapping from room data array

4. **Experiences Section** (Lines 160-194)
   - Dark background (deep-charcoal)
   - 4-column grid of ExperienceBox components
   - Services: Spa, Dining, Adventures, Wine Cellar

5. **Testimonials Section** (Lines 197-218)
   - Section heading
   - 2-column grid of TestimonialCard components
   - Guest stories

6. **Location Section** (Lines 221-272)
   - Two-column layout
   - Map placeholder
   - Contact information (address, email, phone)
   - Travel information
   - Icons: MapPin, Mail, Phone

7. **Footer** (Lines 275-310)
   - Three-column layout
   - Brand column (logo, description, social placeholders)
   - Quick Links column (navigation menu)
   - Newsletter column (Newsletter component)
   - Copyright notice

---

## 3. Component Hierarchy & Data Flow

### 3.1 Component Tree

```
App (src/App.tsx)
└── BrowserRouter
    └── Routes
        └── Route path="/"
            └── Index (src/pages/Index.tsx)
                ├── Hero Section
                │   ├── Background Image
                │   ├── Heading & Tagline
                │   ├── BookingWidget
                │   │   ├── Calendar Popover (Check-in)
                │   │   ├── Calendar Popover (Check-out)
                │   │   ├── Select (Guests)
                │   │   └── Button (Submit)
                │   └── Scroll Indicator (ChevronDown icon)
                ├── Welcome Section
                │   ├── Text Content (heading, paragraphs, CTA)
                │   └── Feature Image
                ├── Rooms Showcase Section
                │   ├── Section Heading
                │   └── Grid of RoomCard × 3
                │       ├── Image
                │       ├── Badge (conditional)
                │       ├── Title & Description
                │       ├── Features List
                │       ├── Price
                │       └── Button (View Details)
                ├── Experiences Section
                │   ├── Section Heading
                │   └── Grid of ExperienceBox × 4
                │       ├── Icon
                │       ├── Title
                │       └── Description
                ├── Testimonials Section
                │   ├── Section Heading
                │   └── Grid of TestimonialCard × 2
                │       ├── Star Rating
                │       ├── Quote
                │       ├── Avatar Image
                │       └── Name & Location
                ├── Location Section
                │   ├── Map Placeholder
                │   └── Contact Info
                │       ├── Address (MapPin icon)
                │       ├── Email (Mail icon)
                │       ├── Phone (Phone icon)
                │       └── Travel Info
                ├── Footer
                │   ├── Brand Column
                │   ├── Quick Links Column
                │   └── Newsletter Column
                │       └── Newsletter Component
                │           ├── Input (Email)
                │           └── Button (Subscribe)
                └── RoomDetailModal
                    ├── Dialog Overlay
                    ├── Room Image
                    ├── Full Description
                    ├── Amenities Grid
                    └── Book Now Button
```

### 3.2 Data Flow Analysis

#### **Room Data**
```typescript
// Defined in Index.tsx (lines 21-62)
const rooms = [
  {
    image: alpineSuite,              // Import from assets
    badge: "MOST POPULAR",           // Optional string
    title: "Alpine Suite",           // Room name
    description: "48 sqm | King Bed | Mountain View Balcony",
    features: [                      // Array of amenities
      "Private balcony with panoramic views",
      "Freestanding soaking tub",
      "Italian marble bathroom",
    ],
    price: "From €450/night",        // String with currency
    fullDescription: "..."           // Long description for modal
  },
  // ... 2 more rooms
];
```

**WordPress Conversion:**
- Store in Custom Post Type: `hotel_room`
- ACF field group: `room_details`
- Query with WP_Query or core/query block
- Display with custom block template

#### **Testimonial Data**
```typescript
// Hardcoded in JSX (lines 204-215)
<TestimonialCard
  quote="The Aurelia redefined luxury for us..."
  name="Sarah & James Mitchell"
  location="London, UK"
  image={testimonialSarah}
/>
```

**WordPress Conversion:**
- Custom Post Type: `testimonial`
- Post title = Author name
- Post content or ACF field = Quote
- ACF field = Location
- Featured image = Avatar

#### **Experience Data**
```typescript
// Hardcoded in JSX (lines 172-191)
<ExperienceBox
  icon={Sparkles}
  title="Alpine Spa Sanctuary"
  description="Award-winning treatments..."
/>
```

**WordPress Conversion:**
- Custom block instances
- Block attributes for icon, title, description
- Icon picker in block editor
- Or use ACF Flexible Content

#### **State Management**

**BookingWidget State:**
```typescript
const [isSticky, setIsSticky] = useState(false);     // Scroll position
const [checkIn, setCheckIn] = useState<Date>();      // Selected date
const [checkOut, setCheckOut] = useState<Date>();    // Selected date
const [guests, setGuests] = useState("2");           // Guest count
```
- **WordPress:** Store in form state, use JavaScript for UI updates

**Newsletter State:**
```typescript
const [email, setEmail] = useState("");              // Email input
```
- **WordPress:** Controlled by form element, submitted via AJAX

**Modal State:**
```typescript
const [selectedRoom, setSelectedRoom] = useState<any>(null);  // Current room
```
- **WordPress:** Pass room ID via URL parameter or data attribute

### 3.3 Event Handlers

| Component | Event | Handler | WordPress Equivalent |
|-----------|-------|---------|---------------------|
| BookingWidget | Form submit | `handleBooking()` | AJAX form submission |
| BookingWidget | Scroll | `handleScroll()` | Vanilla JS scroll listener |
| RoomCard | Button click | `onViewDetails()` | Link to single page or modal trigger |
| Newsletter | Form submit | `handleSubmit()` | Form plugin or AJAX handler |
| RoomDetailModal | Close | `onClose()` | Modal close event |

---

## 4. Styling Analysis

### 4.1 Design System (from index.css)

#### **Color Palette**

The site uses a luxury earth-tone palette defined as CSS custom properties:

```css
:root {
  /* Primary Colors */
  --background: 0 0% 100%;           /* White */
  --foreground: 220 15% 20%;         /* Dark charcoal */

  /* Brand Colors */
  --cream: 40 25% 95%;               /* Light cream */
  --soft-beige: 35 25% 88%;          /* Beige */
  --warm-taupe: 30 15% 60%;          /* Taupe */
  --deep-charcoal: 220 15% 20%;      /* Dark charcoal */
  --gold: 45 90% 55%;                /* Gold accent */
  --gold-muted: 45 70% 45%;          /* Muted gold */

  /* Semantic Colors */
  --card: 0 0% 100%;
  --muted-foreground: 30 15% 60%;
  --border: 35 25% 88%;
  --accent: 45 90% 55%;
  /* ... etc */
}
```

**WordPress Implementation:**
```json
// theme.json
{
  "settings": {
    "color": {
      "palette": [
        { "slug": "background", "color": "#FFFFFF", "name": "Background" },
        { "slug": "foreground", "color": "#2D3142", "name": "Foreground" },
        { "slug": "cream", "color": "#F7F4F0", "name": "Cream" },
        { "slug": "soft-beige", "color": "#E8DFD6", "name": "Soft Beige" },
        { "slug": "warm-taupe", "color": "#A39381", "name": "Warm Taupe" },
        { "slug": "deep-charcoal", "color": "#2D3142", "name": "Deep Charcoal" },
        { "slug": "gold", "color": "#D4AF37", "name": "Gold" },
        { "slug": "gold-muted", "color": "#B8941C", "name": "Gold Muted" }
      ]
    }
  }
}
```

#### **Typography**

```css
:root {
  --font-serif: 'Cormorant Garamond', serif;   /* Headings */
  --font-sans: 'Inter', sans-serif;            /* Body text */
}

body {
  font-family: var(--font-sans);
}

h1, h2, h3, h4, h5, h6 {
  font-family: var(--font-serif);
}
```

**Fonts Used:**
- **Cormorant Garamond** (Google Fonts) - Serif font for all headings
- **Inter** (Google Fonts) - Sans-serif for body text

**WordPress Implementation:**
```php
// functions.php
function aurelia_enqueue_fonts() {
    wp_enqueue_style('google-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap',
        array(), null);
}
add_action('wp_enqueue_scripts', 'aurelia_enqueue_fonts');
```

Or use theme.json fontFamilies.

### 4.2 Tailwind Class Usage Breakdown

#### **Most Common Utilities**

| Category | Classes | Frequency | WordPress Approach |
|----------|---------|-----------|-------------------|
| **Spacing** | `py-20`, `px-4`, `gap-8`, `mb-4`, `mt-6` | Very High | Custom CSS classes or utility classes |
| **Layout** | `grid`, `flex`, `md:grid-cols-3`, `items-center` | Very High | CSS Grid/Flexbox |
| **Typography** | `text-5xl`, `font-serif`, `tracking-wide` | High | CSS classes with rem values |
| **Colors** | `bg-gold`, `text-cream`, `bg-deep-charcoal` | High | CSS custom properties |
| **Effects** | `shadow-xl`, `rounded-lg`, `backdrop-blur` | Medium | CSS box-shadow, border-radius |
| **Transitions** | `transition-all`, `duration-300`, `hover:scale-110` | High | CSS transitions and transforms |
| **Responsive** | `md:text-6xl`, `md:grid-cols-2` | Very High | CSS media queries |

#### **Custom Tailwind Classes (Defined in config)**

```typescript
// tailwind.config.ts extends
colors: {
  'cream': 'hsl(var(--cream))',
  'soft-beige': 'hsl(var(--soft-beige))',
  'warm-taupe': 'hsl(var(--warm-taupe))',
  'deep-charcoal': 'hsl(var(--deep-charcoal))',
  'gold': 'hsl(var(--gold))',
  'gold-muted': 'hsl(var(--gold-muted))',
}
```

### 4.3 Component-Specific Styling

#### **Hero Section**
```css
/* Tailwind Classes Used */
relative h-screen flex items-center justify-center overflow-hidden
absolute inset-0 bg-cover bg-center
bg-gradient-to-b from-transparent to-deep-charcoal/40
text-6xl md:text-7xl font-serif animate-fade-in
animate-bounce

/* WordPress CSS */
.hero-section {
  position: relative;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.hero-section__background {
  position: absolute;
  inset: 0;
  background-size: cover;
  background-position: center;
}

.hero-section__overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, transparent, rgba(45, 49, 66, 0.4));
}

.hero-section__title {
  font-size: clamp(3.5rem, 7vw, 4.5rem);
  font-family: var(--font-serif);
  animation: fadeIn 1s ease-in;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
```

#### **BookingWidget**
```css
/* Tailwind Classes */
fixed bottom-8 left-1/2 -translate-x-1/2 shadow-2xl
bg-background/95 backdrop-blur-lg border border-border rounded-lg p-6
flex flex-col md:flex-row gap-4 items-end

/* WordPress CSS */
.booking-widget {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(16px);
  border: 1px solid var(--border);
  border-radius: 0.5rem;
  padding: 1.5rem;
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

.booking-widget--sticky {
  position: fixed;
  bottom: 2rem;
  left: 50%;
  transform: translateX(-50%);
  z-index: 50;
}

.booking-widget__form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

@media (min-width: 768px) {
  .booking-widget__form {
    flex-direction: row;
    align-items: flex-end;
  }
}
```

#### **RoomCard**
```css
/* Tailwind Classes */
group bg-card rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all
relative h-64 overflow-hidden
w-full h-full object-cover group-hover:scale-110 transition-transform duration-500
text-3xl font-serif mb-2

/* WordPress CSS */
.room-card {
  background: var(--card);
  border-radius: 0.5rem;
  overflow: hidden;
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.room-card:hover {
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

.room-card__image-wrapper {
  position: relative;
  height: 16rem;
  overflow: hidden;
}

.room-card__image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.room-card:hover .room-card__image {
  transform: scale(1.1);
}

.room-card__title {
  font-size: 1.875rem;
  font-family: var(--font-serif);
  margin-bottom: 0.5rem;
}
```

#### **Responsive Grid Patterns**
```css
/* Tailwind */
grid md:grid-cols-3 gap-8
grid md:grid-cols-2 gap-12
grid md:grid-cols-4 gap-8

/* WordPress CSS */
.grid-3 {
  display: grid;
  grid-template-columns: 1fr;
  gap: 2rem;
}

@media (min-width: 768px) {
  .grid-3 {
    grid-template-columns: repeat(3, 1fr);
  }
}
```

### 4.4 Animation Classes

```css
/* Custom Animations (to be added to WordPress theme) */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes bounce {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}

.animate-fade-in {
  animation: fadeIn 1s ease-in;
}

.animate-bounce {
  animation: bounce 2s infinite;
}
```

---

## 5. Tailwind to CSS Conversion Strategy

### 5.1 Conversion Methodology

**Recommended Approach: Hybrid Strategy**

1. **CSS Custom Properties** (Design Tokens)
   - Define all colors, spacing, typography in `:root`
   - Use in CSS classes and theme.json
   - Ensures consistency and easy theming

2. **Utility Classes** (For Common Patterns)
   - Create reusable utility classes for spacing, flex, grid
   - Similar to Tailwind but semantic naming
   - Example: `.flex-center`, `.grid-3-col`, `.section-padding`

3. **Component Classes** (BEM Methodology)
   - Use Block-Element-Modifier naming
   - Example: `.room-card`, `.room-card__image`, `.room-card--featured`
   - Scoped styling for each component

4. **Theme.json Integration**
   - Define colors, spacing, typography in theme.json
   - Leverage Gutenberg's built-in styles
   - Use `styles.blocks` for core block customization

### 5.2 Conversion Map

#### **Spacing Scale**

| Tailwind | Value | CSS Custom Property | Usage |
|----------|-------|---------------------|-------|
| `p-4` | 1rem | `--spacing-4` | Padding small |
| `p-6` | 1.5rem | `--spacing-6` | Padding medium |
| `py-20` | 5rem | `--spacing-20` | Section padding |
| `gap-8` | 2rem | `--spacing-8` | Grid gap |
| `gap-12` | 3rem | `--spacing-12` | Large gap |

```css
:root {
  --spacing-4: 1rem;
  --spacing-6: 1.5rem;
  --spacing-8: 2rem;
  --spacing-12: 3rem;
  --spacing-20: 5rem;
}

.section-padding {
  padding-top: var(--spacing-20);
  padding-bottom: var(--spacing-20);
}
```

#### **Typography Scale**

| Tailwind | Font Size | Line Height | CSS Class |
|----------|-----------|-------------|-----------|
| `text-sm` | 0.875rem | 1.25rem | `.text-sm` |
| `text-lg` | 1.125rem | 1.75rem | `.text-lg` |
| `text-xl` | 1.25rem | 1.75rem | `.text-xl` |
| `text-2xl` | 1.5rem | 2rem | `.text-2xl` |
| `text-5xl` | 3rem | 1 | `.text-5xl` |
| `text-6xl` | 3.75rem | 1 | `.text-6xl` |

```css
:root {
  --font-size-sm: 0.875rem;
  --font-size-lg: 1.125rem;
  --font-size-xl: 1.25rem;
  --font-size-2xl: 1.5rem;
  --font-size-5xl: 3rem;
  --font-size-6xl: 3.75rem;
}

.heading-xl {
  font-size: var(--font-size-5xl);
  font-family: var(--font-serif);
}

@media (min-width: 768px) {
  .heading-xl {
    font-size: var(--font-size-6xl);
  }
}
```

#### **Shadow Scale**

```css
.shadow-lg {
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
              0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.shadow-xl {
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
              0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.shadow-2xl {
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}
```

### 5.3 Complete CSS Stylesheet Structure

```
wp-content/themes/aurelia/assets/css/
├── base.css               # Reset, variables, base elements
├── utilities.css          # Utility classes (flex, grid, spacing)
├── components/
│   ├── booking-widget.css
│   ├── room-card.css
│   ├── testimonial-card.css
│   ├── experience-box.css
│   ├── newsletter.css
│   └── buttons.css
├── sections/
│   ├── hero.css
│   ├── welcome.css
│   ├── experiences.css
│   ├── location.css
│   └── footer.css
└── responsive.css         # Media queries and responsive overrides
```

### 5.4 Sample Conversion: Welcome Section

**React/Tailwind:**
```tsx
<section className="min-h-screen bg-background py-20 px-4">
  <div className="container mx-auto">
    <div className="grid md:grid-cols-2 gap-12 items-center">
      <div className="space-y-6">
        <p className="text-gold text-sm tracking-widest uppercase">
          Welcome to The Aurelia
        </p>
        <h2 className="text-5xl md:text-6xl font-serif text-foreground">
          Experience Alpine Elegance
        </h2>
        {/* ... */}
      </div>
      {/* Image column */}
    </div>
  </div>
</section>
```

**WordPress/CSS:**
```html
<section class="welcome-section section-padding">
  <div class="container">
    <div class="welcome-grid">
      <div class="welcome-content">
        <p class="welcome-eyebrow">Welcome to The Aurelia</p>
        <h2 class="welcome-heading">Experience Alpine Elegance</h2>
        <!-- ... -->
      </div>
      <!-- Image column -->
    </div>
  </div>
</section>
```

```css
.welcome-section {
  min-height: 100vh;
  background: var(--background);
}

.section-padding {
  padding: 5rem 1rem;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

.welcome-grid {
  display: grid;
  gap: 3rem;
  align-items: center;
}

@media (min-width: 768px) {
  .welcome-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

.welcome-content {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.welcome-eyebrow {
  color: var(--gold);
  font-size: 0.875rem;
  letter-spacing: 0.1em;
  text-transform: uppercase;
}

.welcome-heading {
  font-size: 3rem;
  font-family: var(--font-serif);
  color: var(--foreground);
}

@media (min-width: 768px) {
  .welcome-heading {
    font-size: 3.75rem;
  }
}
```

---

## 6. Form Handling Recommendations

### 6.1 BookingWidget Form

**Current Implementation:**
- React Hook Form with Zod validation
- Date pickers using react-day-picker
- Toast notifications with Sonner
- Console logging (no backend integration)

**WordPress Conversion Options:**

#### **Option 1: WP Hotel Booking Plugin (Recommended)**

**Pros:**
- Full booking system out of the box
- Payment integration
- Room availability management
- Admin dashboard
- Email notifications
- Shortcode integration

**Cons:**
- May require template customization
- Potential styling conflicts
- Plugin dependency

**Implementation:**
```php
// Embed booking form
echo do_shortcode('[hb_booking_form]');

// Or use custom integration
if (function_exists('hb_booking_form')) {
    hb_booking_form(array(
        'check_in_date' => '',
        'check_out_date' => '',
        'adults' => 2
    ));
}
```

**Customization:**
```php
// Override plugin templates
// Copy templates to: wp-content/themes/aurelia/wp-hotel-booking/
```

#### **Option 2: Custom AJAX Form**

**Pros:**
- Full control over functionality
- Custom styling easy
- No plugin dependency
- Lightweight

**Cons:**
- Requires custom development
- Need to build booking logic
- More maintenance

**Implementation:**

**HTML (Block Template):**
```php
<form id="aurelia-booking-form" class="booking-widget">
    <div class="booking-widget__field">
        <label for="check-in">Check-in</label>
        <input type="text" id="check-in" name="check_in" class="flatpickr" required>
    </div>
    <div class="booking-widget__field">
        <label for="check-out">Check-out</label>
        <input type="text" id="check-out" name="check_out" class="flatpickr" required>
    </div>
    <div class="booking-widget__field">
        <label for="guests">Guests</label>
        <select id="guests" name="guests">
            <option value="1">1 Guest</option>
            <option value="2">2 Guests</option>
            <option value="3">3 Guests</option>
            <option value="4">4 Guests</option>
        </select>
    </div>
    <button type="submit" class="button button--gold">Check Availability</button>
</form>
```

**JavaScript:**
```javascript
// assets/js/booking-widget.js
(function($) {
    // Initialize Flatpickr date pickers
    flatpickr('.flatpickr', {
        dateFormat: 'Y-m-d',
        minDate: 'today',
        disableMobile: true
    });

    // Sticky scroll behavior
    $(window).on('scroll', function() {
        var heroHeight = $('.hero-section').outerHeight();
        if ($(window).scrollTop() > heroHeight - 100) {
            $('.booking-widget').addClass('booking-widget--sticky');
        } else {
            $('.booking-widget').removeClass('booking-widget--sticky');
        }
    });

    // Form submission
    $('#aurelia-booking-form').on('submit', function(e) {
        e.preventDefault();

        var formData = {
            action: 'aurelia_check_availability',
            nonce: aureliaAjax.nonce,
            check_in: $('#check-in').val(),
            check_out: $('#check-out').val(),
            guests: $('#guests').val()
        };

        $.ajax({
            url: aureliaAjax.ajaxurl,
            type: 'POST',
            data: formData,
            beforeSend: function() {
                $('.booking-widget__submit').prop('disabled', true).text('Checking...');
            },
            success: function(response) {
                if (response.success) {
                    showNotification('success', response.data.message);
                    // Redirect to booking page or show available rooms
                } else {
                    showNotification('error', response.data.message);
                }
            },
            error: function() {
                showNotification('error', 'An error occurred. Please try again.');
            },
            complete: function() {
                $('.booking-widget__submit').prop('disabled', false).text('Check Availability');
            }
        });
    });

    function showNotification(type, message) {
        // Custom notification implementation
        var notification = $('<div class="notification notification--' + type + '">' + message + '</div>');
        $('body').append(notification);
        setTimeout(function() {
            notification.fadeOut(function() {
                $(this).remove();
            });
        }, 3000);
    }
})(jQuery);
```

**PHP Handler (functions.php or custom file):**
```php
// AJAX handler for availability check
add_action('wp_ajax_aurelia_check_availability', 'aurelia_check_availability');
add_action('wp_ajax_nopriv_aurelia_check_availability', 'aurelia_check_availability');

function aurelia_check_availability() {
    // Verify nonce
    check_ajax_referer('aurelia-booking-nonce', 'nonce');

    // Sanitize input
    $check_in = sanitize_text_field($_POST['check_in']);
    $check_out = sanitize_text_field($_POST['check_out']);
    $guests = absint($_POST['guests']);

    // Validate dates
    $check_in_date = DateTime::createFromFormat('Y-m-d', $check_in);
    $check_out_date = DateTime::createFromFormat('Y-m-d', $check_out);

    if (!$check_in_date || !$check_out_date) {
        wp_send_json_error(array('message' => 'Invalid dates selected.'));
    }

    if ($check_in_date >= $check_out_date) {
        wp_send_json_error(array('message' => 'Check-out must be after check-in.'));
    }

    // Check availability (custom logic or plugin integration)
    $available_rooms = aurelia_get_available_rooms($check_in, $check_out, $guests);

    if (!empty($available_rooms)) {
        wp_send_json_success(array(
            'message' => 'Rooms available! We will contact you shortly.',
            'rooms' => $available_rooms
        ));
    } else {
        wp_send_json_error(array('message' => 'No rooms available for selected dates.'));
    }
}

function aurelia_get_available_rooms($check_in, $check_out, $guests) {
    // Custom availability logic
    // Query hotel_room CPT
    // Check against bookings table or custom meta
    // Return array of available rooms

    // Placeholder implementation
    $args = array(
        'post_type' => 'hotel_room',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );

    $rooms_query = new WP_Query($args);
    $available = array();

    if ($rooms_query->have_posts()) {
        while ($rooms_query->have_posts()) {
            $rooms_query->the_post();
            // Check if room is available (implement booking check logic)
            $available[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'price' => get_field('room_price')
            );
        }
        wp_reset_postdata();
    }

    return $available;
}

// Enqueue scripts
add_action('wp_enqueue_scripts', 'aurelia_enqueue_booking_scripts');

function aurelia_enqueue_booking_scripts() {
    // Flatpickr for date picker
    wp_enqueue_style('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css');
    wp_enqueue_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', array(), null, true);

    // Custom booking script
    wp_enqueue_script('aurelia-booking', get_template_directory_uri() . '/assets/js/booking-widget.js', array('jquery', 'flatpickr'), '1.0.0', true);

    // Localize script
    wp_localize_script('aurelia-booking', 'aureliaAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('aurelia-booking-nonce')
    ));
}
```

**Recommendation:** Use WP Hotel Booking plugin for a production site with real bookings. Use custom AJAX for a simpler inquiry/contact form.

### 6.2 Newsletter Form

**Current Implementation:**
- React state management
- Regex email validation
- Console logging

**WordPress Options:**

#### **Option 1: Mailchimp for WordPress (Recommended)**

```php
// Install plugin: MC4WP: Mailchimp for WordPress
// Configure in WP Admin
// Use shortcode:
echo do_shortcode('[mc4wp_form id="123"]');

// Custom styling to match design
```

**Custom CSS:**
```css
.mc4wp-form {
    display: flex;
    gap: 0.75rem;
}

.mc4wp-form input[type="email"] {
    flex: 1;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 0.75rem 1rem;
    color: var(--background);
}

.mc4wp-form input[type="email"]::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.mc4wp-form button {
    background: var(--gold);
    color: var(--deep-charcoal);
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 0.375rem;
    cursor: pointer;
}
```

#### **Option 2: Custom AJAX Handler**

Similar pattern to booking widget - see above.

---

## 7. Plugin Integration Points

### 7.1 Required Plugins

#### **Advanced Custom Fields (ACF) Pro**

**Purpose:** Custom fields for rooms, testimonials, and site options

**Field Groups:**

**1. Room Details**
```
Field Group: Room Details
Location: Post Type = hotel_room

Fields:
- room_badge (Text) - Badge text (e.g., "MOST POPULAR")
- room_size (Text) - Size in sqm
- room_bed_type (Text) - Bed type
- room_view (Text) - View type
- room_features (Repeater)
  - feature_text (Text)
- room_price (Text) - Price display
- room_full_description (WYSIWYG) - Long description
```

**2. Testimonial Details**
```
Field Group: Testimonial Details
Location: Post Type = testimonial

Fields:
- testimonial_quote (Textarea) - Quote text
- testimonial_author (Text) - Author name
- testimonial_location (Text) - Location
- testimonial_rating (Number) - Star rating (1-5)
```

**3. Site Contact Info**
```
Field Group: Site Contact
Location: Options Page

Fields:
- contact_address (Textarea)
- contact_email (Email)
- contact_phone (Text)
- contact_map (Google Map)
- travel_info (WYSIWYG)
```

### 7.2 Recommended Plugins

| Plugin | Purpose | Priority | Alternative |
|--------|---------|----------|-------------|
| WP Hotel Booking | Booking system | High | Custom solution |
| Mailchimp for WP | Newsletter | Medium | Contact Form 7 |
| WP Rocket | Performance | High | W3 Total Cache |
| Yoast SEO | SEO optimization | High | Rank Math |
| ACF Extended | Enhanced ACF | Medium | - |
| Regenerate Thumbnails | Image optimization | Low | - |

### 7.3 Integration Architecture

```
WordPress Core
├── Theme: Aurelia (FSE Block Theme)
│   ├── Custom Blocks
│   │   ├── aurelia/room-card
│   │   ├── aurelia/testimonial-card
│   │   ├── aurelia/experience-box
│   │   ├── aurelia/booking-widget
│   │   └── aurelia/newsletter
│   ├── Custom Post Types
│   │   ├── hotel_room
│   │   └── testimonial
│   └── Template Parts
│       ├── header.html
│       ├── footer.html
│       └── patterns/*.php
└── Plugins
    ├── ACF Pro (Field definitions)
    ├── WP Hotel Booking (Booking logic)
    ├── Mailchimp for WP (Newsletter)
    └── Yoast SEO (Meta data)
```

---

## 8. Custom Post Types & Taxonomies

### 8.1 Custom Post Type: hotel_room

**Registration:**
```php
// inc/post-types/room.php

function aurelia_register_room_cpt() {
    $labels = array(
        'name' => 'Rooms',
        'singular_name' => 'Room',
        'menu_name' => 'Hotel Rooms',
        'add_new' => 'Add New Room',
        'add_new_item' => 'Add New Room',
        'edit_item' => 'Edit Room',
        'view_item' => 'View Room',
        'all_items' => 'All Rooms',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,  // Enable Gutenberg
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-home',
        'rewrite' => array('slug' => 'rooms'),
        'menu_position' => 5,
    );

    register_post_type('hotel_room', $args);
}
add_action('init', 'aurelia_register_room_cpt');
```

**Sample Data Structure:**
```
Post Title: Alpine Suite
Post Content: (Optional - can use ACF full_description instead)
Featured Image: alpine-suite.jpg

ACF Fields:
- room_badge: "MOST POPULAR"
- room_size: "48 sqm"
- room_bed_type: "King Bed"
- room_view: "Mountain View Balcony"
- room_features (repeater):
  - Row 1: "Private balcony with panoramic views"
  - Row 2: "Freestanding soaking tub"
  - Row 3: "Italian marble bathroom"
- room_price: "From €450/night"
- room_full_description: (WYSIWYG with full text)
```

### 8.2 Custom Post Type: testimonial

**Registration:**
```php
// inc/post-types/testimonial.php

function aurelia_register_testimonial_cpt() {
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add Testimonial',
        'edit_item' => 'Edit Testimonial',
        'all_items' => 'All Testimonials',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-testimonial',
        'publicly_queryable' => false,  // Don't need single pages
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'aurelia_register_testimonial_cpt');
```

**Sample Data:**
```
Post Title: Sarah & James Mitchell
Featured Image: testimonial-sarah.jpg

ACF Fields:
- testimonial_quote: "The Aurelia redefined luxury for us. The attention to detail is extraordinary, and the staff anticipated our every need. The views alone are worth the journey."
- testimonial_author: "Sarah & James Mitchell" (or use post title)
- testimonial_location: "London, UK"
- testimonial_rating: 5
```

### 8.3 Optional Taxonomy: room_category

If rooms need categorization (Suite, Penthouse, Retreat, etc.):

```php
function aurelia_register_room_category() {
    register_taxonomy('room_category', 'hotel_room', array(
        'label' => 'Room Categories',
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'room-category'),
    ));
}
add_action('init', 'aurelia_register_room_category');
```

---

## 9. WordPress Block Strategy

### 9.1 Block Architecture

**Approach: FSE Block Theme + Custom Blocks**

Use a combination of:
1. **Core Blocks** - For standard content (headings, paragraphs, images, columns)
2. **Block Patterns** - For reusable section layouts
3. **Custom Blocks** - For specialized components (room cards, testimonials, booking widget)

### 9.2 Custom Blocks to Create

#### **1. aurelia/room-card**

**Type:** Dynamic Block (PHP render callback)

**Block.json:**
```json
{
  "$schema": "https://schemas.wp.org/trunk/block.json",
  "apiVersion": 2,
  "name": "aurelia/room-card",
  "title": "Room Card",
  "category": "aurelia",
  "icon": "admin-home",
  "description": "Display a hotel room card",
  "supports": {
    "html": false
  },
  "attributes": {
    "roomId": {
      "type": "number",
      "default": 0
    }
  },
  "editorScript": "file:./index.js",
  "style": "file:./style.css",
  "render": "file:./render.php"
}
```

**render.php:**
```php
<?php
$room_id = $attributes['roomId'];
if (!$room_id) return;

$room = get_post($room_id);
if (!$room) return;

$image = get_the_post_thumbnail_url($room_id, 'large');
$badge = get_field('room_badge', $room_id);
$title = get_the_title($room_id);
$size = get_field('room_size', $room_id);
$bed = get_field('room_bed_type', $room_id);
$view = get_field('room_view', $room_id);
$features = get_field('room_features', $room_id);
$price = get_field('room_price', $room_id);

$description = "$size | $bed | $view";
?>

<div class="room-card">
    <div class="room-card__image-wrapper">
        <?php if ($image): ?>
            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="room-card__image">
        <?php endif; ?>
        <?php if ($badge): ?>
            <div class="room-card__badge"><?php echo esc_html($badge); ?></div>
        <?php endif; ?>
    </div>

    <div class="room-card__content">
        <h3 class="room-card__title"><?php echo esc_html($title); ?></h3>
        <p class="room-card__description"><?php echo esc_html($description); ?></p>

        <?php if ($features): ?>
            <ul class="room-card__features">
                <?php foreach ($features as $feature): ?>
                    <li class="room-card__feature">
                        <svg class="room-card__check" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <?php echo esc_html($feature['feature_text']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="room-card__footer">
            <span class="room-card__price"><?php echo esc_html($price); ?></span>
            <a href="<?php echo get_permalink($room_id); ?>" class="room-card__button">View Details</a>
        </div>
    </div>
</div>
```

#### **2. aurelia/testimonial-card**

Similar structure to room-card, but simpler.

#### **3. aurelia/experience-box**

**Type:** Static Block (saved in post content)

**Block.json:**
```json
{
  "name": "aurelia/experience-box",
  "title": "Experience Box",
  "category": "aurelia",
  "attributes": {
    "icon": {
      "type": "string",
      "default": "sparkles"
    },
    "title": {
      "type": "string",
      "default": ""
    },
    "description": {
      "type": "string",
      "default": ""
    }
  }
}
```

**edit.js:**
```javascript
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { icon, title, description } = attributes;

    return (
        <>
            <InspectorControls>
                <PanelBody title="Settings">
                    <SelectControl
                        label="Icon"
                        value={icon}
                        options={[
                            { label: 'Sparkles (Spa)', value: 'sparkles' },
                            { label: 'Utensils (Dining)', value: 'utensils' },
                            { label: 'Mountain', value: 'mountain' },
                            { label: 'Wine Glass', value: 'wine-glass' }
                        ]}
                        onChange={(value) => setAttributes({ icon: value })}
                    />
                </PanelBody>
            </InspectorControls>

            <div {...useBlockProps({ className: 'experience-box' })}>
                <div className="experience-box__icon">
                    <i className={`fa fa-${icon}`}></i>
                </div>
                <RichText
                    tagName="h3"
                    className="experience-box__title"
                    value={title}
                    onChange={(value) => setAttributes({ title: value })}
                    placeholder="Title"
                />
                <RichText
                    tagName="p"
                    className="experience-box__description"
                    value={description}
                    onChange={(value) => setAttributes({ description: value })}
                    placeholder="Description"
                />
            </div>
        </>
    );
}
```

#### **4. aurelia/booking-widget**

**Type:** Dynamic Block with JavaScript interaction

Requires:
- Block registration
- Date picker library (Flatpickr)
- AJAX handler
- Sticky scroll behavior

(See Section 6.1 for full implementation)

### 9.3 Block Patterns

Create reusable patterns for sections:

**patterns/hero-section.php:**
```php
<?php
/**
 * Title: Hero Section
 * Slug: aurelia/hero-section
 * Categories: featured
 */
?>

<!-- wp:cover {"url":"<?php echo get_template_directory_uri(); ?>/assets/images/hotel-exterior.jpg","dimRatio":40,"overlayColor":"deep-charcoal","gradient":"hero-gradient","minHeight":100,"minHeightUnit":"vh","align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:100vh">
    <span aria-hidden="true" class="wp-block-cover__background has-deep-charcoal-background-color has-background-dim-40 has-background-dim has-background-gradient has-hero-gradient-gradient-background"></span>
    <img class="wp-block-cover__image-background" alt="" src="<?php echo get_template_directory_uri(); ?>/assets/images/hotel-exterior.jpg" data-object-fit="cover"/>
    <div class="wp-block-cover__inner-container">
        <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"huge","fontFamily":"serif"} -->
        <h1 class="has-text-align-center has-serif-font-family has-huge-font-size">The Aurelia</h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","fontSize":"large"} -->
        <p class="has-text-align-center has-large-font-size">Where Mountains Meet Luxury</p>
        <!-- /wp:paragraph -->

        <!-- wp:aurelia/booking-widget /-->
    </div>
</div>
<!-- /wp:cover -->
```

**patterns/welcome-section.php:**
```php
<?php
/**
 * Title: Welcome Section
 * Slug: aurelia/welcome-section
 * Categories: text
 */
?>

<!-- wp:group {"align":"full","backgroundColor":"background","className":"section-padding"} -->
<div class="wp-block-group alignfull section-padding has-background-background-color has-background">
    <!-- wp:columns {"verticalAlignment":"center"} -->
    <div class="wp-block-columns are-vertically-aligned-center">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:paragraph {"className":"welcome-eyebrow","textColor":"gold"} -->
            <p class="welcome-eyebrow has-gold-color has-text-color">Welcome to The Aurelia</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":2,"fontSize":"extra-large","fontFamily":"serif"} -->
            <h2 class="has-serif-font-family has-extra-large-font-size">Experience Alpine Elegance</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>Nestled in the heart of the Swiss Alps, The Aurelia offers an unparalleled escape where contemporary luxury meets timeless mountain charm.</p>
            <!-- /wp:paragraph -->

            <!-- More paragraphs... -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:image {"sizeSlug":"large","className":"welcome-image"} -->
            <figure class="wp-block-image size-large welcome-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/interior-lounge.jpg" alt=""/>
            </figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
```

---

## 10. Assets & Media

### 10.1 Image Inventory

| File | Size | Usage | Optimization |
|------|------|-------|--------------|
| hotel-exterior.jpg | Large | Hero background | WebP, responsive sizes |
| interior-lounge.jpg | Large | Welcome section | WebP, responsive sizes |
| alpine-suite.jpg | Medium | Room card | WebP, thumbnail sizes |
| summit-penthouse.jpg | Medium | Room card | WebP, thumbnail sizes |
| garden-retreat.jpg | Medium | Room card | WebP, thumbnail sizes |
| testimonial-sarah.jpg | Small | Avatar | WebP, small thumbnail |
| testimonial-elena.jpg | Small | Avatar | WebP, small thumbnail |

### 10.2 Image Optimization Strategy

**Recommended Sizes:**
```php
// functions.php
add_image_size('room-card', 600, 400, true);
add_image_size('room-card-2x', 1200, 800, true);
add_image_size('hero-bg', 1920, 1080, true);
add_image_size('testimonial-avatar', 112, 112, true);
```

**WebP Conversion:**
- Use plugin: WebP Converter for Media or ShortPixel
- Fallback to JPEG for older browsers
- Implement with `<picture>` element:

```html
<picture>
    <source srcset="image.webp" type="image/webp">
    <img src="image.jpg" alt="Description">
</picture>
```

**Lazy Loading:**
```html
<img src="image.jpg" alt="Description" loading="lazy">
```

### 10.3 Icon Strategy

**Current:** Lucide React icons

**WordPress Options:**
1. **Font Awesome** (Recommended)
   - Wide icon selection
   - Easy to implement
   - CDN or self-hosted

2. **Dashicons** (Built-in)
   - Already in WordPress
   - Limited selection
   - Good for admin

3. **Custom SVG**
   - Best performance
   - Inline or sprite sheet
   - More setup required

**Icon Mapping:**
| Lucide Icon | Font Awesome | Dashicons |
|-------------|--------------|-----------|
| Sparkles | `fa-sparkles` | `dashicons-star-filled` |
| UtensilsCrossed | `fa-utensils` | `dashicons-food` |
| Mountain | `fa-mountain` | - |
| Wine | `fa-wine-glass` | - |
| Check | `fa-check` | `dashicons-yes` |
| CalendarIcon | `fa-calendar` | `dashicons-calendar` |
| Users | `fa-users` | `dashicons-groups` |
| MapPin | `fa-map-marker-alt` | `dashicons-location` |
| Mail | `fa-envelope` | `dashicons-email` |
| Phone | `fa-phone` | `dashicons-phone` |
| ChevronDown | `fa-chevron-down` | `dashicons-arrow-down` |

**Implementation:**
```php
// Enqueue Font Awesome
function aurelia_enqueue_font_awesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'aurelia_enqueue_font_awesome');
```

---

## 11. Technical Challenges & Solutions

### 11.1 Challenge: Sticky Booking Widget

**React Implementation:**
```typescript
const [isSticky, setIsSticky] = useState(false);

useEffect(() => {
    const handleScroll = () => {
        const heroHeight = window.innerHeight;
        setIsSticky(window.scrollY > heroHeight - 100);
    };
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
}, []);
```

**WordPress Solution:**
```javascript
// vanilla JS or jQuery
(function() {
    let bookingWidget = document.querySelector('.booking-widget');
    let heroSection = document.querySelector('.hero-section');

    if (!bookingWidget || !heroSection) return;

    function handleScroll() {
        let heroHeight = heroSection.offsetHeight;
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > heroHeight - 100) {
            bookingWidget.classList.add('booking-widget--sticky');
        } else {
            bookingWidget.classList.remove('booking-widget--sticky');
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Initial check
})();
```

**CSS:**
```css
.booking-widget {
    position: absolute;
    bottom: 5rem;
    left: 50%;
    transform: translateX(-50%);
    transition: all 0.3s ease;
}

.booking-widget--sticky {
    position: fixed;
    bottom: 2rem;
    z-index: 100;
}
```

### 11.2 Challenge: Date Picker Integration

**React:** Uses `react-day-picker` with date-fns

**WordPress Solution:** Flatpickr.js

```javascript
// Initialize Flatpickr
const checkInPicker = flatpickr('#check-in', {
    dateFormat: 'F j, Y',
    minDate: 'today',
    onChange: function(selectedDates, dateStr, instance) {
        // Update check-out minimum date
        checkOutPicker.set('minDate', selectedDates[0]);
    }
});

const checkOutPicker = flatpickr('#check-out', {
    dateFormat: 'F j, Y',
    minDate: 'today'
});
```

### 11.3 Challenge: Modal vs Single Page for Room Details

**Options:**

**Option A: Modal (Matches React)**
- Pros: Same UX as React version, no page reload
- Cons: Not SEO-friendly, harder to share, mobile UX concerns
- Implementation: JavaScript modal library (FancyBox, Magnific Popup)

**Option B: Single Room Page (Recommended)**
- Pros: SEO-friendly, shareable URLs, better mobile UX, native WordPress
- Cons: Requires page load (can be mitigated with smooth transitions)
- Implementation: Standard WordPress single-{post-type}.php template

**Recommendation:** Use single room pages for better SEO and WordPress integration.

### 11.4 Challenge: Toast Notifications

**React:** Uses Sonner library

**WordPress Solutions:**

**Option 1: Custom Notification System**
```javascript
function showNotification(type, message) {
    const notification = document.createElement('div');
    notification.className = `notification notification--${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);

    // Trigger fade-in
    setTimeout(() => notification.classList.add('notification--visible'), 10);

    // Auto-remove after 3 seconds
    setTimeout(() => {
        notification.classList.remove('notification--visible');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}
```

```css
.notification {
    position: fixed;
    top: 2rem;
    right: 2rem;
    background: white;
    padding: 1rem 1.5rem;
    border-radius: 0.5rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    opacity: 0;
    transform: translateY(-1rem);
    transition: all 0.3s ease;
    z-index: 1000;
}

.notification--visible {
    opacity: 1;
    transform: translateY(0);
}

.notification--success {
    border-left: 4px solid #10b981;
}

.notification--error {
    border-left: 4px solid #ef4444;
}
```

**Option 2: WordPress Admin Notices**
```php
function aurelia_add_notice($type, $message) {
    set_transient('aurelia_notice_' . $type, $message, 45);
}

function aurelia_display_notices() {
    $types = array('success', 'error', 'warning', 'info');

    foreach ($types as $type) {
        $message = get_transient('aurelia_notice_' . $type);
        if ($message) {
            echo '<div class="notification notification--' . esc_attr($type) . '">';
            echo esc_html($message);
            echo '</div>';
            delete_transient('aurelia_notice_' . $type);
        }
    }
}
add_action('wp_footer', 'aurelia_display_notices');
```

### 11.5 Challenge: Animations and Transitions

**React:** CSS classes added via Tailwind

**WordPress:** Custom CSS animations

```css
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.animate-fade-in {
    animation: fadeIn 1s ease-in;
}

.animate-bounce {
    animation: bounce 2s infinite;
}

/* Reduced motion preference */
@media (prefers-reduced-motion: reduce) {
    * {
        animation: none !important;
        transition: none !important;
    }
}
```

**Scroll-triggered animations (optional):**
```javascript
// Using Intersection Observer
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-fade-in');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.querySelectorAll('.animate-on-scroll').forEach(el => {
    observer.observe(el);
});
```

---

## 12. Conversion Roadmap

### Phase 1: Foundation Setup (Days 1-2)

**Tasks:**
- [ ] Create WordPress theme structure (FSE block theme)
- [ ] Set up theme.json with color palette and typography
- [ ] Convert CSS custom properties from index.css to style.css
- [ ] Enqueue Google Fonts (Cormorant Garamond, Inter)
- [ ] Create base CSS files (base.css, utilities.css)
- [ ] Set up local development environment
- [ ] Initialize Git repository for theme

**Deliverables:**
- Working WordPress installation
- Theme activated with design tokens configured
- Fonts loading correctly

### Phase 2: Custom Post Types & ACF (Day 3)

**Tasks:**
- [ ] Register hotel_room Custom Post Type
- [ ] Register testimonial Custom Post Type
- [ ] Install ACF Pro
- [ ] Create ACF field group: Room Details
- [ ] Create ACF field group: Testimonial Details
- [ ] Create ACF options page for site contact info
- [ ] Add 3 sample rooms with full data
- [ ] Add 2 sample testimonials

**Deliverables:**
- CPTs registered and visible in admin
- Sample content added
- ACF fields configured

### Phase 3: Static Sections (Days 4-6)

**Tasks:**
- [ ] Create Hero Section block pattern
- [ ] Create Welcome Section block pattern
- [ ] Create Experiences Section with custom experience-box block
- [ ] Create Location Section block pattern
- [ ] Create Footer template part
- [ ] Add all section content
- [ ] Test responsive behavior

**Deliverables:**
- All static sections render correctly
- Responsive on mobile/tablet/desktop
- Footer with navigation menu

### Phase 4: Dynamic Components (Days 7-10)

**Tasks:**
- [ ] Create aurelia/room-card custom block
- [ ] Create Rooms Showcase section with WP_Query loop
- [ ] Create aurelia/testimonial-card custom block
- [ ] Create Testimonials Section with WP_Query loop
- [ ] Build single room template (single-hotel_room.php)
- [ ] Test all dynamic content rendering
- [ ] Add proper error handling for missing data

**Deliverables:**
- Room cards display from CPT data
- Testimonial cards display from CPT data
- Single room page template functional
- Query loops working correctly

### Phase 5: Interactive Features (Days 11-14)

**Tasks:**
- [ ] Evaluate WP Hotel Booking plugin vs custom solution
- [ ] Implement booking widget (custom block)
- [ ] Integrate Flatpickr date picker
- [ ] Add sticky scroll behavior JavaScript
- [ ] Create AJAX handler for booking form
- [ ] Add form validation (client + server)
- [ ] Implement newsletter subscription (Mailchimp plugin or custom)
- [ ] Test all forms thoroughly
- [ ] Add error handling and success messages

**Deliverables:**
- Booking widget functional with validation
- Newsletter subscription working
- All forms secured with nonces
- Toast/notification system implemented

### Phase 6: Styling & Polish (Days 15-17)

**Tasks:**
- [ ] Convert all remaining Tailwind classes to CSS
- [ ] Implement hover effects (scale, shadow, etc.)
- [ ] Add animations (fadeIn, bounce)
- [ ] Fine-tune responsive breakpoints
- [ ] Cross-browser testing (Chrome, Firefox, Safari, Edge)
- [ ] Mobile testing (iOS, Android)
- [ ] Fix any visual discrepancies vs React version
- [ ] Optimize CSS (remove unused, minify)

**Deliverables:**
- Pixel-perfect match to React version
- All animations working
- Cross-browser compatible
- Mobile-optimized

### Phase 7: Content Migration & Assets (Days 18-19)

**Tasks:**
- [ ] Upload all images to WordPress media library
- [ ] Optimize images (WebP conversion, compression)
- [ ] Configure image sizes (thumbnails, medium, large)
- [ ] Migrate all room data from hardcoded array to CPT
- [ ] Migrate all testimonial data to CPT
- [ ] Create navigation menus (header, footer)
- [ ] Add all static content (About text, contact info)
- [ ] Test all internal links

**Deliverables:**
- All images optimized and uploaded
- All content migrated
- Menus configured
- No broken links

### Phase 8: SEO, Performance & Launch Prep (Days 20-22)

**Tasks:**
- [ ] Install and configure Yoast SEO or Rank Math
- [ ] Add meta titles and descriptions for all pages
- [ ] Implement schema markup (Hotel, LocalBusiness, Offer)
- [ ] Generate and submit XML sitemap
- [ ] Configure Google Analytics
- [ ] Install caching plugin (WP Rocket or W3 Total Cache)
- [ ] Run PageSpeed Insights and optimize
- [ ] Accessibility audit (WCAG 2.1 AA)
- [ ] Add alt text to all images
- [ ] Test all functionality end-to-end
- [ ] Create staging site for final review
- [ ] Full backup before launch

**Deliverables:**
- SEO optimized
- Performance score >85 (mobile), >90 (desktop)
- Accessibility compliant
- Fully tested and ready for launch

---

## 13. Performance Considerations

### 13.1 Performance Targets

| Metric | Target | Priority |
|--------|--------|----------|
| First Contentful Paint | < 2s | High |
| Largest Contentful Paint | < 2.5s | High |
| Time to Interactive | < 3.5s | Medium |
| Cumulative Layout Shift | < 0.1 | High |
| Total Page Size | < 2MB | Medium |
| PageSpeed Insights (Mobile) | 85+ | High |
| PageSpeed Insights (Desktop) | 90+ | Medium |

### 13.2 Optimization Strategies

#### **Image Optimization**
- WebP format with JPEG fallback
- Responsive images with srcset
- Lazy loading for below-fold images
- CDN for image delivery (optional)
- Proper image sizing (don't load 2000px image in 300px container)

```html
<img
    src="alpine-suite.jpg"
    srcset="alpine-suite-600w.jpg 600w, alpine-suite-1200w.jpg 1200w"
    sizes="(max-width: 768px) 100vw, 600px"
    alt="Alpine Suite"
    loading="lazy"
>
```

#### **CSS Optimization**
- Minify CSS files
- Remove unused CSS (PurgeCSS or manual audit)
- Critical CSS inline for above-the-fold content
- Defer non-critical CSS

```php
// Critical CSS inline in <head>
function aurelia_inline_critical_css() {
    ?>
    <style>
        /* Critical above-fold CSS */
        .hero-section { /* ... */ }
        .booking-widget { /* ... */ }
    </style>
    <?php
}
add_action('wp_head', 'aurelia_inline_critical_css', 1);

// Defer non-critical CSS
function aurelia_defer_css($html, $handle) {
    if ('aurelia-main-style' === $handle) {
        $html = str_replace("media='all'", "media='print' onload=\"this.media='all'\"", $html);
    }
    return $html;
}
add_filter('style_loader_tag', 'aurelia_defer_css', 10, 2);
```

#### **JavaScript Optimization**
- Minify JS files
- Defer non-critical JS
- Use async where appropriate
- Reduce third-party scripts

```php
// Defer JavaScript
wp_enqueue_script('aurelia-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', array(
    'in_footer' => true,
    'strategy' => 'defer'
));
```

#### **Font Loading Optimization**
```php
// Preload critical fonts
function aurelia_preload_fonts() {
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/fonts/cormorant-garamond.woff2" as="font" type="font/woff2" crossorigin>';
}
add_action('wp_head', 'aurelia_preload_fonts');
```

```css
/* Font display swap */
@font-face {
    font-family: 'Cormorant Garamond';
    src: url('cormorant-garamond.woff2') format('woff2');
    font-display: swap; /* Prevent FOIT (Flash of Invisible Text) */
}
```

#### **Caching Strategy**
- Page caching (WP Rocket or W3 Total Cache)
- Browser caching (set proper headers)
- Object caching (Redis or Memcached for high traffic)
- CDN for static assets (optional)

```php
// Browser caching headers (.htaccess or functions.php)
function aurelia_set_cache_headers() {
    header('Cache-Control: max-age=31536000');
}
add_action('send_headers', 'aurelia_set_cache_headers');
```

#### **Database Optimization**
- Limit WP_Query results
- Use transients for expensive queries
- Clean up post revisions and spam

```php
// Cache room query results
function aurelia_get_rooms() {
    $rooms = get_transient('aurelia_rooms');

    if (false === $rooms) {
        $args = array(
            'post_type' => 'hotel_room',
            'posts_per_page' => 3,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );

        $query = new WP_Query($args);
        $rooms = $query->posts;

        set_transient('aurelia_rooms', $rooms, HOUR_IN_SECONDS);
    }

    return $rooms;
}

// Clear cache when room is updated
function aurelia_clear_room_cache($post_id) {
    if ('hotel_room' === get_post_type($post_id)) {
        delete_transient('aurelia_rooms');
    }
}
add_action('save_post', 'aurelia_clear_room_cache');
```

#### **Reduce HTTP Requests**
- Combine CSS files where possible
- Combine JS files where possible
- Use CSS sprites or SVG sprites for icons
- Minimize external requests (third-party scripts)

---

## 14. SEO & Accessibility

### 14.1 SEO Implementation

#### **Meta Tags**
```php
// functions.php or use Yoast SEO plugin
function aurelia_add_meta_tags() {
    if (is_front_page()) {
        echo '<meta name="description" content="Experience luxury alpine accommodation at The Aurelia Hotel in Zermatt, Switzerland. Boutique hotel with stunning mountain views, Michelin-starred dining, and world-class spa.">';
        echo '<meta property="og:title" content="The Aurelia - Luxury Alpine Hotel in Zermatt">';
        echo '<meta property="og:description" content="Where Mountains Meet Luxury">';
        echo '<meta property="og:image" content="' . get_template_directory_uri() . '/assets/images/hotel-exterior.jpg">';
    }

    if (is_singular('hotel_room')) {
        // Room-specific meta tags
    }
}
add_action('wp_head', 'aurelia_add_meta_tags');
```

#### **Schema Markup (JSON-LD)**
```php
function aurelia_add_schema_markup() {
    if (is_front_page()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Hotel',
            'name' => 'The Aurelia',
            'description' => 'Luxury alpine hotel in Zermatt, Switzerland',
            'image' => get_template_directory_uri() . '/assets/images/hotel-exterior.jpg',
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => 'Bergstrasse 42',
                'addressLocality' => 'Zermatt',
                'postalCode' => '3920',
                'addressCountry' => 'CH'
            ),
            'telephone' => '+41 27 966 8800',
            'email' => 'reservations@theaurelia.ch',
            'starRating' => array(
                '@type' => 'Rating',
                'ratingValue' => '5'
            ),
            'priceRange' => '€€€€',
            'amenityFeature' => array(
                array('@type' => 'LocationFeatureSpecification', 'name' => 'Spa'),
                array('@type' => 'LocationFeatureSpecification', 'name' => 'Restaurant'),
                array('@type' => 'LocationFeatureSpecification', 'name' => 'WiFi')
            )
        );

        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
    }
}
add_action('wp_head', 'aurelia_add_schema_markup');
```

#### **Sitemap**
- Use Yoast SEO or Rank Math for automatic XML sitemap
- Submit to Google Search Console
- Include all pages, rooms, and important content

#### **URL Structure**
```
Homepage: https://theaurelia.com/
Rooms: https://theaurelia.com/rooms/alpine-suite/
Testimonials: (No public pages, just admin)
Contact: https://theaurelia.com/contact/
```

### 14.2 Accessibility (WCAG 2.1 AA)

#### **Semantic HTML**
```html
<!-- Use proper heading hierarchy -->
<header>
    <nav aria-label="Main navigation">
        <ul>
            <li><a href="/rooms">Rooms</a></li>
        </ul>
    </nav>
</header>

<main>
    <section aria-labelledby="welcome-heading">
        <h2 id="welcome-heading">Welcome to The Aurelia</h2>
        <!-- Content -->
    </section>
</main>

<footer>
    <!-- Footer content -->
</footer>
```

#### **Keyboard Navigation**
```css
/* Focus visible for keyboard users */
*:focus-visible {
    outline: 2px solid var(--gold);
    outline-offset: 2px;
}

/* Skip to main content link */
.skip-link {
    position: absolute;
    top: -40px;
    left: 0;
    background: var(--gold);
    color: var(--deep-charcoal);
    padding: 8px;
    text-decoration: none;
    z-index: 100;
}

.skip-link:focus {
    top: 0;
}
```

```html
<a href="#main-content" class="skip-link">Skip to main content</a>
```

#### **Color Contrast**
Ensure all text meets WCAG AA standards (4.5:1 for normal text, 3:1 for large text).

Test with tools:
- WAVE (browser extension)
- axe DevTools
- Lighthouse accessibility audit

#### **Alt Text for Images**
```php
// Ensure all images have alt text
<img src="alpine-suite.jpg" alt="Alpine Suite with king bed and mountain view balcony">

// Decorative images
<img src="decorative.jpg" alt="" role="presentation">
```

#### **Form Labels and ARIA**
```html
<form>
    <label for="email">Email Address</label>
    <input
        type="email"
        id="email"
        name="email"
        required
        aria-required="true"
        aria-describedby="email-error"
    >
    <span id="email-error" class="error" role="alert"></span>
</form>
```

#### **ARIA Landmarks**
```html
<header role="banner">
<nav role="navigation" aria-label="Main">
<main role="main">
<aside role="complementary">
<footer role="contentinfo">
```

---

## 15. Maintenance & Scalability

### 15.1 Content Management

**Editor Experience:**
- Use Block Patterns for easy section insertion
- ACF fields for structured data (rooms, testimonials)
- Gutenberg editor for flexible content editing
- Media library organization (folders/categories)

**Documentation:**
```
Create admin documentation:
- How to add a new room
- How to add a testimonial
- How to update contact information
- How to manage bookings
```

### 15.2 Future Enhancements

**Potential Features:**
- Multi-language support (WPML or Polylang)
- Online payment integration (Stripe, PayPal)
- Customer account system (WooCommerce or custom)
- Loyalty program
- Blog/News section
- Events calendar
- Virtual tours (360° images)
- Live chat support
- Mobile app integration

### 15.3 Scalability Considerations

**For Growth:**
- Use caching extensively
- Consider CDN for global reach
- Optimize database (regular cleanup, indexing)
- Load balancing for high traffic
- Separate media server or CDN for images
- API endpoints for third-party integrations

**Multisite Potential:**
If expanding to multiple hotel properties:
```php
// WordPress Multisite
// Each hotel gets its own subsite
// Shared theme and plugins
// Centralized management
```

### 15.4 Backup & Security

**Backup Strategy:**
- Automated daily backups (UpdraftPlus or VaultPress)
- Off-site storage (Dropbox, Google Drive, S3)
- Database and file backups
- Test restore process regularly

**Security Measures:**
- SSL certificate (HTTPS)
- Security plugin (Wordfence or iThemes Security)
- Regular WordPress/plugin/theme updates
- Strong passwords and 2FA for admin
- Limit login attempts
- File permissions (644 for files, 755 for directories)
- Hide WordPress version
- Disable file editing in admin

```php
// functions.php security
// Disable file editing
define('DISALLOW_FILE_EDIT', true);

// Limit login attempts (use plugin)

// Hide WordPress version
remove_action('wp_head', 'wp_generator');
```

---

## Conclusion

This comprehensive analysis provides a complete roadmap for converting "The Aurelia" React website to WordPress. The conversion is feasible with an estimated timeline of 15-22 days, depending on team experience and whether plugins or custom solutions are chosen for the booking system.

**Key Success Factors:**
1. Use FSE Block Theme architecture for modern WordPress development
2. Leverage ACF Pro for structured data (rooms, testimonials)
3. Create custom blocks for unique components (room cards, booking widget)
4. Choose plugin vs. custom solution strategically (WP Hotel Booking recommended)
5. Maintain design fidelity through careful CSS conversion
6. Prioritize performance and SEO from the start
7. Ensure accessibility compliance (WCAG 2.1 AA)

**Critical Path Items:**
- Booking widget integration (most complex component)
- Custom post types and ACF setup (foundation for dynamic content)
- Tailwind to CSS conversion (maintain visual consistency)
- Mobile responsiveness (crucial for hotel bookings)

The resulting WordPress site will be maintainable, scalable, and provide a superior content management experience while matching the visual quality and functionality of the original React application.

---

**Next Steps:**
1. Review this analysis with stakeholders
2. Choose plugins vs. custom solutions for booking and newsletter
3. Set up development environment
4. Begin Phase 1 of conversion roadmap

For questions or clarifications on any section of this analysis, please refer to the specific sections above or the accompanying `conversion-manifest.json` file.
