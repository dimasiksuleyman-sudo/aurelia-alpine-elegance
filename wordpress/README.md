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

## Development

### Local Development Setup

1. Install WordPress locally (Local, XAMPP, etc.)
2. Clone this theme to `wp-content/themes/`
3. Activate the theme
4. Add sample room data

### Recommended Plugins

- **Advanced Custom Fields (ACF) Pro** - For additional custom fields
- **WP Hotel Booking** - For booking system integration
- **Yoast SEO** - For SEO optimization
- **WP Rocket** - For performance optimization

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
