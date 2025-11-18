# React to WordPress Conversion Plan
## The Aurelia Hotel Website

This directory contains the complete analysis and conversion plan for migrating "The Aurelia" luxury hotel website from React to WordPress.

---

## 📁 Files in This Directory

### 1. **conversion-manifest.json**
A comprehensive JSON manifest documenting every aspect of the conversion:
- Project overview and tech stack comparison
- Complete component inventory (13 components)
- Asset mapping (7 images + fonts)
- Color palette and design system
- Detailed conversion specifications for each component
- WordPress target structure (blocks, CPTs, plugins)
- Tailwind to CSS conversion strategy
- Plugin recommendations and integration points
- 8-phase conversion roadmap
- Risk assessment and success criteria

**Use this file for:**
- Technical reference during development
- Project planning and estimation
- Team coordination
- Tracking conversion progress

### 2. **ANALYSIS.md**
An extensive 2,500+ line analysis document covering:
- Complete codebase structure breakdown
- Component hierarchy and data flow diagrams
- Styling analysis (Tailwind classes, color palette, typography)
- Detailed Tailwind to CSS conversion strategies
- Form handling recommendations (booking widget, newsletter)
- Plugin integration guidelines
- Custom Post Type specifications
- WordPress block strategy
- Asset optimization guide
- Technical challenges and solutions
- Performance optimization strategies
- SEO and accessibility implementation
- Maintenance and scalability considerations

**Use this file for:**
- Understanding the existing React codebase
- Detailed implementation guidance
- Code examples and snippets
- Best practices and recommendations
- Troubleshooting during conversion

---

## 🎯 Quick Reference

### Project Summary
- **Current Stack:** React 18 + TypeScript + Vite + Tailwind CSS + shadcn/ui
- **Target Stack:** WordPress 6.4+ with FSE Block Theme
- **Estimated Timeline:** 15-22 days
- **Complexity:** Medium to High

### Key Components
1. **Hero Section** - Full-screen background with booking widget
2. **BookingWidget** - Sticky form with date pickers (CRITICAL)
3. **RoomCard** - Dynamic room display from CPT
4. **RoomDetailModal** - Room details view
5. **TestimonialCard** - Guest testimonial display
6. **ExperienceBox** - Service/amenity showcase
7. **Newsletter** - Email subscription form
8. **Welcome/Location/Footer Sections** - Static content areas

### Required WordPress Components
- **Custom Post Types:** `hotel_room`, `testimonial`
- **Custom Blocks:** 4 blocks (room-card, testimonial-card, experience-box, booking-widget)
- **Plugins:** ACF Pro (required), WP Hotel Booking (recommended)
- **Block Patterns:** 5 patterns (hero, welcome, experiences, location, testimonials)

### Critical Decisions Needed
1. **Booking System:** WP Hotel Booking plugin vs. custom AJAX solution
2. **Room Details:** Modal (matches React) vs. Single page (better SEO)
3. **Newsletter:** Mailchimp plugin vs. custom handler
4. **Date Picker:** Flatpickr vs. jQuery UI Datepicker

---

## 🚀 Getting Started

### For Developers

1. **Read the Analysis First**
   ```bash
   # Open ANALYSIS.md and review:
   - Section 1: Codebase Structure
   - Section 2: Component Inventory
   - Section 12: Conversion Roadmap
   ```

2. **Review the Manifest**
   ```bash
   # Open conversion-manifest.json and check:
   - components[] array - your conversion tasks
   - conversionPhases - your implementation timeline
   - dependencies.plugins - what to install
   ```

3. **Set Up Development Environment**
   - Install WordPress locally
   - Create FSE block theme structure
   - Install ACF Pro
   - Review Phase 1 tasks in roadmap

### For Project Managers

1. **Timeline Planning**
   - Review `conversionPhases` in manifest (8 phases)
   - Estimated total: 15-22 days
   - Critical path: Booking widget (Phase 5)

2. **Resource Allocation**
   - Required skills: WP theme dev, PHP, JS, CSS
   - Plugin licenses needed: ACF Pro
   - Optional: WP Hotel Booking plugin

3. **Risk Management**
   - Review `riskAssessment` in manifest
   - High-risk: Booking widget complexity
   - Mitigation: Early plugin evaluation

---

## 📊 Conversion Statistics

### Components Analysis
- **Total Components:** 13 (7 custom + 6 sections)
- **Custom Blocks Needed:** 4
- **Block Patterns Needed:** 5
- **Custom Post Types:** 2
- **ACF Field Groups:** 3

### Code Metrics
- **React Components:** 7 custom components
- **shadcn/ui Components Used:** 50+ (Calendar, Dialog, Button, Select, etc.)
- **Total Images:** 7 (rooms: 3, testimonials: 2, sections: 2)
- **Custom Colors:** 8 (cream, beige, taupe, charcoal, gold variants)
- **Font Families:** 2 (Cormorant Garamond, Inter)

### WordPress Output
- **Estimated PHP Files:** 25+
- **Estimated CSS Files:** 10+
- **Estimated JS Files:** 5+
- **Custom Blocks:** ~1,200 lines of code
- **Theme Functions:** ~800 lines of code

---

## 🎨 Design System

### Color Palette
```
Primary: #FFFFFF (Background)
Foreground: #2D3142 (Deep Charcoal)
Accent: #D4AF37 (Gold)
Neutrals: Cream, Soft Beige, Warm Taupe
```

### Typography
```
Headings: Cormorant Garamond (serif)
Body: Inter (sans-serif)
```

### Spacing Scale
```
Section Padding: 5rem (py-20)
Grid Gap: 2-3rem (gap-8, gap-12)
Card Padding: 1.5rem (p-6)
```

---

## ⚙️ Technical Requirements

### WordPress
- Version: 6.4+
- PHP: 7.4+
- MySQL: 5.7+

### Required Plugins
- Advanced Custom Fields Pro (license required)

### Recommended Plugins
- WP Hotel Booking (or custom solution)
- Mailchimp for WordPress
- WP Rocket or W3 Total Cache
- Yoast SEO or Rank Math

### JavaScript Libraries
- Flatpickr (date picker)
- Font Awesome (icons)
- Optional: AOS (animations)

---

## 📈 Success Criteria

### Functionality
- ✅ All sections render correctly on all devices
- ✅ Booking widget validates and submits properly
- ✅ Room/testimonial data displays from CPTs
- ✅ Forms include validation and security (nonces)

### Design
- ✅ Visual fidelity matches React version
- ✅ Color palette applied consistently
- ✅ Hover effects and transitions work smoothly
- ✅ Responsive breakpoints function correctly

### Performance
- ✅ PageSpeed Score: 85+ mobile, 90+ desktop
- ✅ First Contentful Paint < 2s
- ✅ Total page size < 2MB

### SEO & Accessibility
- ✅ WCAG 2.1 AA compliant
- ✅ Schema markup implemented
- ✅ All images have alt text
- ✅ Semantic HTML structure

---

## 🗓️ 8-Phase Roadmap

| Phase | Duration | Focus | Priority |
|-------|----------|-------|----------|
| 1. Foundation | 1-2 days | Theme setup, design tokens | Critical |
| 2. CPTs & ACF | 1 day | Data structure | Critical |
| 3. Static Sections | 2-3 days | Hero, Welcome, Location, Footer | High |
| 4. Dynamic Components | 3-4 days | Room/Testimonial blocks | High |
| 5. Interactive Features | 3-4 days | Booking widget, Newsletter | Critical |
| 6. Styling & Polish | 2-3 days | CSS conversion, animations | Medium |
| 7. Content Migration | 2-3 days | Images, data, menus | High |
| 8. SEO & Launch | 1-2 days | Optimization, testing | High |

**Total:** 15-22 days

---

## 📚 Additional Resources

### Documentation Links
- [WordPress Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [ACF Documentation](https://www.advancedcustomfields.com/resources/)
- [WP Hotel Booking Docs](https://docs.thimpress.com/wp-hotel-booking/)
- [FSE Theme Development](https://developer.wordpress.org/block-editor/how-to-guides/themes/)

### Code Repositories
- React Source: `/src/` directory
- WordPress Target: `/wp-content/themes/aurelia/` (to be created)

### Design Files
- Figma/Sketch: Not provided (using React version as source of truth)
- Style Guide: See ANALYSIS.md Section 4 (Styling Analysis)

---

## 🤝 Team Contacts

### Roles Needed
- **WordPress Developer** - Theme development, custom blocks
- **Frontend Developer** - CSS conversion, JavaScript
- **Content Manager** - Data migration, content entry
- **QA Tester** - Cross-browser testing, accessibility audit
- **Project Manager** - Timeline, coordination

---

## 📝 Notes

### What's NOT Included
- This is **analysis and planning only** - no code has been modified
- No WordPress theme files created yet
- No plugins installed
- No content migrated

### Next Steps
1. Review both documents thoroughly
2. Make critical decisions (booking system, modal vs. page, etc.)
3. Set up WordPress development environment
4. Begin Phase 1 of conversion roadmap

### Questions?
- Refer to ANALYSIS.md for detailed implementation guidance
- Check conversion-manifest.json for technical specifications
- Review code examples in ANALYSIS.md sections 6, 9, and 11

---

**Document Version:** 1.0
**Last Updated:** 2025-11-18
**Status:** Ready for Development

---

## 🔍 Quick Search Guide

Looking for specific information?

- **Component mapping:** See `conversion-manifest.json` → `components[]`
- **Tailwind conversion:** See `ANALYSIS.md` → Section 5
- **Forms (booking/newsletter):** See `ANALYSIS.md` → Section 6
- **Plugin recommendations:** See `conversion-manifest.json` → `dependencies.plugins`
- **ACF fields:** See `ANALYSIS.md` → Section 8
- **Code examples:** See `ANALYSIS.md` → Sections 6, 9, 11
- **Timeline:** See `conversion-manifest.json` → `conversionPhases`
- **Risks:** See `conversion-manifest.json` → `riskAssessment`
- **Performance:** See `ANALYSIS.md` → Section 13
- **SEO:** See `ANALYSIS.md` → Section 14

---

*End of README - Refer to other files in this directory for detailed information*
