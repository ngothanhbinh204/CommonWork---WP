# About Page Setup Guide

## Overview
About Page với 7 sections được quản lý bằng ACF (Advanced Custom Fields) và tab-based architecture.

## File Structure

### Template Files
- **Template**: `page-templates/template-about.php` - Main About page template
- **Sections**: 
  - `template-parts/section/about-hero.php` - Hero section
  - `template-parts/section/about-story.php` - Story section
  - `template-parts/section/about-mission-vision.php` - Mission & Vision cards
  - `template-parts/section/about-values.php` - Core Values grid
  - `template-parts/section/about-timeline.php` - Timeline/Journey
  - `template-parts/section/about-team.php` - Leadership Team
  - `template-parts/section/about-cta.php` - Final CTA

### ACF JSON
- **ACF Group**: `acf-json/group_about_page.json`
- **7 Tabs**: Hero, Story, Mission/Vision, Values, Timeline, Team, CTA

## Section Details

### 1. Hero Section
**Fields:**
- Hero Title (WYSIWYG) - Required
- Hero Description (WYSIWYG)

**Features:**
- Breadcrumb integration (Rank Math)
- Background with particles effect
- AOS animations

### 2. Story Section
**Fields:**
- Story Image (Image) - với lazy loading
- Established Badge (Text) - e.g., "Est. 2017"
- Eyebrow Text (Text) - "Our Story"
- Story Title (WYSIWYG)
- Story Paragraphs (Repeater)
  - Paragraph (WYSIWYG)

**Features:**
- Image with overlay badge
- Multiple paragraph support
- Progressive AOS delays

### 3. Mission & Vision Section
**Fields:**
- MV Cards (Repeater) - Max 2 items
  - Icon SVG (Textarea)
  - Eyebrow (Text)
  - Title (WYSIWYG)
  - Description (WYSIWYG)

**Features:**
- 2-column card layout
- SVG icon support
- Background pattern overlay

### 4. Core Values Section
**Fields:**
- Values Eyebrow (Text) - "What Guides Us"
- Values Title (WYSIWYG)
- Values Items (Repeater)
  - Title (Text)
  - Description (WYSIWYG)

**Features:**
- Auto-numbered cards (01, 02, ...)
- 3-column grid layout
- Staggered animations

### 5. Timeline Section
**Fields:**
- Timeline Eyebrow (Text) - "Our Journey"
- Timeline Eyebrow Class (Text) - Optional CSS class (e.g., "blue")
- Timeline Title (WYSIWYG)
- Timeline Items (Repeater)
  - Year (Text)
  - Title (Text)
  - Description (WYSIWYG)

**Features:**
- Vertical timeline with connecting lines
- Year badges
- Progressive delay animations (80ms increments)

### 6. Leadership Team Section
**Fields:**
- Team Eyebrow (Text) - "Leadership Team"
- Team Title (WYSIWYG)
- Team Subtitle (WYSIWYG)
- Team Members (Repeater)
  - Photo (Image)
  - Name (Text)
  - Role (Text)
  - Email (Email)
  - Phone (Text)

**Features:**
- Grid layout for team cards
- Hover effects (hover-y-effect)
- Optional contact info display
- Auto-link email/phone with icons

### 7. CTA Section
**Fields:**
- CTA Title (WYSIWYG)
- CTA Description (WYSIWYG)
- CTA Button (Link)

**Features:**
- Background with pattern overlay
- Secondary button style
- Arrow icon in button

## Setup Instructions

### 1. Sync ACF Fields
1. Vào **WordPress Admin → Custom Fields**
2. Click tab **Sync available**
3. Tìm **"About Page Content"**
4. Click nút **Sync**

### 2. Create About Page
1. Vào **Pages → Add New**
2. Nhập tiêu đề: "About Us" hoặc "Về chúng tôi"
3. **Page Attributes → Template**: Chọn **"About Page"**
4. Click **Publish**

### 3. Fill Content
Navigate through 7 tabs và điền content:

**Tab 1 - Hero:**
- Title: "Built on <em>Trust,</em><br>Driven by <em>Excellence</em>"
- Description: Brief intro paragraph

**Tab 2 - Story:**
- Upload story image (1600×900px recommended)
- Badge: "Est. 2017"
- Add 3-4 paragraphs about company history

**Tab 3 - Mission/Vision:**
- Add 2 cards:
  - Card 1: Mission (icon + title + description)
  - Card 2: Vision (icon + title + description)

**Tab 4 - Values:**
- Add 6 core values
- Each with title + description

**Tab 5 - Timeline:**
- Add 5+ milestones
- Each with year + title + description

**Tab 6 - Team:**
- Add leadership team members (4-6)
- Upload photos (square format recommended)
- Add contact info for key members

**Tab 7 - CTA:**
- Title: Ready to extend your team?
- Description: Brief pitch
- Button: Link to /contact page

## Field Type Reference

| Content Type | Field Type | Why |
|-------------|-----------|-----|
| Paragraphs/Descriptions | WYSIWYG | Rich text với formatting |
| Titles với italic | WYSIWYG | Hỗ trợ `<em>` tags |
| Short labels | Text | Plain text |
| SVG Icons | Textarea | Raw SVG code |
| Images | Image | Return array format |
| Links/Buttons | Link | URL + title + target |
| Email | Email | Auto validation |
| Lists | Repeater | Dynamic content |

## Custom Functions Used

### Image Functions
- `get_image_attrachment($id, $size, $class, $alt)` - Lazy loading images with Lozad.js

### Escaping Functions
- `wp_kses_post()` - For WYSIWYG content (allows safe HTML)
- `esc_html()` - For plain text
- `esc_url()` - For URLs
- `esc_attr()` - For HTML attributes

## Design Features

### AOS Animation Pattern
- Hero elements: fade-up với delays 400/600
- Section headers: fade-up
- Grid items: Staggered delays (100ms increments)
- Timeline items: 80ms increments

### CSS Classes
- `__inner` - Container với max-width
- `highlight__eyebrow` - Small uppercase label
- `title-section` - Large section title
- `hover-y-effect` - Vertical hover animation
- Background patterns: `.about-*__bg`, `.about-*__pat`

## Common Issues

### Images không hiển thị
- Kiểm tra function `get_image_attrachment()` đã được define trong `inc/function-field.php`
- Verify image IDs correct trong ACF

### Tabs không horizontal
- Check ACF JSON có `"endpoint": 0` cho tabs 1-6
- Check tab 7 (CTA) có `"endpoint": 1`

### WYSIWYG editor không xuất hiện
- Verify ACF Pro activated
- Check field type là `wysiwyg`, không phải `textarea`
- Clear browser cache

## Next Steps

1. ✅ Template files created
2. ✅ ACF JSON synced
3. ✅ Page created with template
4. ⏳ Fill content for all 7 sections
5. ⏳ Upload images
6. ⏳ Test responsive layout
7. ⏳ Verify AOS animations

## References
- Original HTML: `UI/AboutUs.html`
- ACF Documentation: https://www.advancedcustomfields.com/resources/
- Theme functions: `inc/function-field.php`
