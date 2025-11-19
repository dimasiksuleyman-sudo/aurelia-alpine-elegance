# Aurelia Hotel WordPress Theme

A modern WordPress Block Theme for luxury hotel websites featuring Full Site Editing (FSE), custom blocks, and elegant design.

## Features

- **Full Site Editing (FSE)** - Complete site customization through the WordPress editor
- **Custom Post Types** - Hotel rooms with detailed meta fields
- **Block Patterns** - Pre-designed sections for hero, rooms, and testimonials
- **Responsive Design** - Mobile-first approach with elegant breakpoints
- **Performance Optimized** - Clean code, minimal dependencies
- **Accessibility Ready** - WCAG 2.1 AA compliant
- **SEO Friendly** - Semantic HTML and proper heading hierarchy

## Requirements

- WordPress 6.4 or higher
- PHP 7.4 or higher
- MySQL 5.7 or higher

## Installation

1. Download or clone this theme into your WordPress `wp-content/themes/` directory
2. Activate the theme from WordPress Admin → Appearance → Themes
3. The custom post type "Hotel Rooms" will be automatically registered

## Theme Structure

```
aurelia-hotel/
├── assets/
│   ├── css/
│   │   └── custom.css          # Custom component styles
│   └── js/
│       └── main.js             # JavaScript functionality
├── inc/
│   ├── post-types.php          # Custom post type registration
│   └── template-functions.php  # Template helper functions
├── parts/
│   ├── header.html             # Header template part
│   └── footer.html             # Footer template part
├── patterns/
│   ├── hero-booking.php        # Hero section with booking widget
│   ├── room-cards.php          # Room cards grid
│   └── testimonials.php        # Testimonials section
├── templates/
│   └── index.html              # Main template
├── functions.php               # Theme setup and functions
├── style.css                   # Main stylesheet with theme headers
└── theme.json                  # FSE configuration
```

## Custom Post Type: Hotel Rooms

The theme registers a custom post type `hotel_room` with the following fields:

### Meta Fields
- **Price** - Room price per night (e.g., "From €450/night")
- **Size** - Room size (e.g., "48 sqm")
- **Bed Type** - Type of bed (e.g., "King Bed")
- **Max Guests** - Maximum number of guests
- **View Type** - Type of view (e.g., "Mountain View Balcony")
- **Badge** - Optional badge text (e.g., "MOST POPULAR")

### Taxonomies
- **Room Categories** - Hierarchical categories (Suite, Penthouse, etc.)
- **Room Amenities** - Tags for amenities (WiFi, Balcony, etc.)

### Adding a New Room

1. Go to **Hotel Rooms → Add New** in WordPress admin
2. Add room title and description
3. Set a featured image
4. Fill in the room details meta fields
5. Assign categories and amenities
6. Publish

## Block Patterns

### Hero Booking Pattern
Full-screen hero section with background image and booking widget overlay.

**Usage:** Insert pattern `aurelia-hotel/hero-booking` in the editor

### Room Cards Pattern
Responsive grid displaying hotel rooms from the custom post type.

**Usage:** Insert pattern `aurelia-hotel/room-cards` in the editor

### Testimonials Pattern
Two-column layout for guest testimonials.

**Usage:** Insert pattern `aurelia-hotel/testimonials` in the editor

## Color Palette

The theme uses a luxury earth-tone color palette:

- **Beige** - `#F5F1E8` - Light backgrounds
- **Taupe** - `#C4B5A0` - Muted accents
- **Charcoal** - `#2D2D2D` - Text and dark backgrounds
- **Gold** - `#D4AF37` - Primary accent color
- **White** - `#FFFFFF` - Pure white
- **Soft Gray** - `#F8F8F8` - Subtle backgrounds

## Typography

- **Headings** - Cormorant Garamond (serif) from Google Fonts
- **Body Text** - Inter (sans-serif) from Google Fonts

## Customization

### Modifying Colors

Edit `theme.json` to change the color palette:

```json
"palette": [
  {
    "slug": "beige",
    "color": "#F5F1E8",
    "name": "Beige"
  }
]
```

### Adding Custom Patterns

1. Create a new PHP file in the `patterns/` directory
2. Follow the WordPress block pattern format
3. Add the pattern category `aurelia-sections` or `aurelia-hotel`

### Custom CSS

Add custom styles to `assets/css/custom.css`

### Custom JavaScript

Add custom scripts to `assets/js/main.js`

## Template Functions

The theme includes helper functions for displaying room data:

```php
// Get room price
aurelia_get_room_price( $post_id );

// Get room description (combines size, bed type, and view)
aurelia_get_room_description( $post_id );

// Display room amenities
aurelia_display_room_amenities( $post_id );

// Check if room has badge
aurelia_has_room_badge( $post_id );

// Display room badge
aurelia_the_room_badge( $post_id );
```

## Quick Start Guide

### Step 1: Create Sample Data

After activating the theme, visit your site with this URL parameter to create demo hotel rooms:

```
https://yoursite.com/?aurelia_create_sample_data=1
```

This will automatically create:
- ✅ 3 demo hotel rooms (Alpine Suite, Summit Penthouse, Garden Retreat)
- ✅ Room categories (Suite, Penthouse, Retreat)
- ✅ Room amenities (WiFi, Balcony, Hot Tub, Air Conditioning, etc.)

### Step 2: Set Up Homepage

1. Go to **Settings → Reading**
2. Select **A static page**
3. Choose **Front Page** for your homepage
4. Save changes

### Step 3: Insert Block Patterns

1. Edit your front page
2. Click the **+** button to add blocks
3. Search for "Aurelia" to see all available patterns
4. Insert patterns in this recommended order:
   - Hero Section
   - Welcome Section
   - Rooms Grid
   - Experiences
   - Testimonials
   - Location

## Development

### Local Development Setup

1. Install WordPress locally (Local, XAMPP, etc.)
2. Clone this theme to `wp-content/themes/`
3. Activate the theme
4. Create sample data using the URL parameter above

### Recommended Plugins

#### Essential Plugins

1. **WP Hotel Booking** (Free)
   - **Purpose**: Full booking system integration
   - **Features**: Calendar, availability, pricing, reservations
   - **Install**: Via WordPress plugin directory or WP-CLI
   - **Setup**: Configure payment gateway, booking rules, and pricing

2. **Contact Form 7** (Free)
   - **Purpose**: Contact and inquiry forms
   - **Features**: Easy form builder, email notifications, spam protection
   - **Install**: Via WordPress plugin directory
   - **Setup**: Create forms and add shortcodes to pages

3. **Advanced Custom Fields (ACF)** (Optional)
   - **Purpose**: Add custom fields if needed beyond built-in meta boxes
   - **Install**: Via WordPress plugin directory
   - **When to use**: Only if additional custom fields are required

#### Performance Plugins

4. **WP Rocket** (Premium - Recommended)
   - **Purpose**: Caching and performance optimization
   - **Cost**: $59/year
   - **Features**: Page caching, CSS/JS minification, lazy loading, CDN
   - **Setup**: Enable file optimization, media optimization, and preload cache

5. **Autoptimize** (Free Alternative)
   - **Purpose**: Code optimization without caching
   - **Features**: Minify CSS/JS/HTML, defer JavaScript
   - **Install**: Via WordPress plugin directory

#### SEO Plugins

6. **Yoast SEO** (Free)
   - **Purpose**: Search engine optimization
   - **Features**: Meta tags, XML sitemaps, content analysis
   - **Setup**: Run configuration wizard and connect Google Search Console

#### Backup Plugins

7. **UpdraftPlus** (Free)
   - **Purpose**: Automated backups
   - **Features**: Cloud storage integration (Google Drive, Dropbox, etc.)
   - **Setup**: Configure daily backup schedule and test restore functionality

## Testing Checklist

Before deploying the theme to production, complete this checklist:

### Installation & Activation
- [ ] Theme activates without PHP errors or warnings
- [ ] No JavaScript errors in browser console
- [ ] Sample data creates successfully

### Block Patterns
- [ ] All 7 patterns insert correctly in the editor
- [ ] Hero Section displays with booking widget
- [ ] Welcome Section shows text and image properly
- [ ] Rooms Grid displays hotel rooms in 3-column layout
- [ ] Experiences section shows all 4 icon boxes
- [ ] Testimonials display with 5-star ratings
- [ ] Location section shows map placeholder and contact info

### Custom Post Type
- [ ] Can create new hotel rooms without errors
- [ ] All meta boxes (price, size, bed type, etc.) save correctly
- [ ] Featured images display on room cards and single pages
- [ ] Room categories and amenities assign properly
- [ ] Rooms display in grid pattern correctly

### Templates
- [ ] Front page template shows all sections in order
- [ ] Single hotel room page displays all room details
- [ ] Standard pages use correct page template
- [ ] Header appears with site title and navigation
- [ ] Footer shows with 3 columns and newsletter form

### Booking Widget
- [ ] Date picker opens when clicking on date inputs
- [ ] Check-in date validation (no past dates allowed)
- [ ] Check-out date must be after check-in date
- [ ] Guest selector dropdown works
- [ ] Error messages display for invalid input
- [ ] Success notification shows on form submission
- [ ] Sticky behavior activates when scrolling past hero

### Responsive Design
- [ ] **Mobile (< 768px)**: All sections stack properly
- [ ] **Tablet (768px - 1024px)**: 2-column layouts work
- [ ] **Desktop (> 1024px)**: 3-column grids display
- [ ] Images scale appropriately on all screen sizes
- [ ] Navigation menu becomes hamburger on mobile
- [ ] Booking widget adjusts for mobile screens

### Performance
- [ ] Google PageSpeed score 85+ on mobile
- [ ] Google PageSpeed score 90+ on desktop
- [ ] Largest Contentful Paint (LCP) < 2.5s
- [ ] First Input Delay (FID) < 100ms
- [ ] Cumulative Layout Shift (CLS) < 0.1
- [ ] Images are lazy-loaded (except above-fold)
- [ ] CSS and JavaScript files load without 404 errors

### Cross-Browser Compatibility
- [ ] Chrome/Edge (latest version)
- [ ] Firefox (latest version)
- [ ] Safari (latest version)
- [ ] Mobile Safari (iOS latest)

### Accessibility
- [ ] Keyboard navigation works (Tab, Enter, Esc)
- [ ] ARIA labels present on interactive elements
- [ ] Color contrast meets WCAG 2.1 AA standards
- [ ] Heading hierarchy is logical (H1 → H2 → H3)
- [ ] Images have alt text

### SEO
- [ ] Page titles display correctly
- [ ] Meta descriptions are set
- [ ] Proper heading hierarchy (one H1 per page)
- [ ] Structured data for hotel/room markup (if needed)
- [ ] XML sitemap includes hotel rooms

## Support

For theme support and documentation, visit the project repository.

## Changelog

### Version 1.0.0
- Initial release
- Full Site Editing support
- Hotel rooms custom post type
- Block patterns for hero, rooms, and testimonials
- Responsive design
- Accessibility features

## License

This theme is licensed under the GNU General Public License v2 or later.

## Credits

- Fonts: Google Fonts (Cormorant Garamond, Inter)
- Built with WordPress Block Editor
- Follows WordPress Coding Standards

---

**Theme Name:** Aurelia Hotel
**Version:** 1.0.0
**Author:** Aurelia Development Team
**Requires WordPress:** 6.4+
**Tested up to:** 6.4
**License:** GPLv2 or later
