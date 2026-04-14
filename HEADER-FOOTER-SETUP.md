# Header & Footer Implementation Guide

## ✅ **Đã Hoàn Thành**

### **1. Menu Locations** (Updated in function-root.php)
```
✓ header-menu       → Main navigation
✓ header-mobile     → Mobile menu
✓ footer-expertise  → Footer Expertise column
✓ footer-portfolio  → Footer Portfolio column
✓ footer-company    → Footer Company column
✓ footer-legal      → Footer bottom legal links
```

### **2. ACF Options Pages** (Created Sub-pages)
```
✓ Theme Settings (parent)
  ├── Header Settings
  ├── Footer Settings
  ├── Social Media
  └── Contact Info
```

### **3. ACF Field Groups** (JSON Files Created)
```
✓ group_header_settings.json
  - Logo Icon
  - Logo Text
  - Phone
  - Email
  - CTA Button
  - Loader Settings

✓ group_footer_settings.json
  - Footer Logo
  - Column Titles
  - Contact Info
  - CTA Button
  - Address
  - Copyright
  - UI Toggles

✓ group_social_media.json
  - Social Links Repeater
    - Platform (Select)
    - URL
    - Icon Class
```

---

## 🚀 **Hướng Dẫn Setup**

### **Bước 1: Sync ACF Field Groups**

1. Đi tới **Custom Fields** trong WordPress Admin
2. Click **Sync** tab
3. Chọn tất cả field groups mới
4. Click **Sync Available**

### **Bước 2: Tạo Menu Locations**

Đi tới **Appearance → Menus** và tạo các menu sau:

**Header Menu:**
```
Name: Main Navigation
Location: Menu chính (header-menu)
Items:
- Expertise (link to #services)
- Portfolio (link to #sectors)
- About (link to #about)
- Our People (link to #people)
```

**Mobile Menu:**
```
Name: Mobile Navigation
Location: Menu mobile (header-mobile)
Items: (same as Main Navigation)
```

**Footer Menus:**

1. **Expertise Menu**
   - Location: Footer - Expertise
   - Items: Architecture Drafting, Structural Engineering, Civil/Drainage, Surveying, 3D Renders, Energy Rating, Estimation

2. **Portfolio Menu**
   - Location: Footer - Portfolio
   - Items: Residential, Commercial, Industrial, Swimming Pools

3. **Company Menu**
   - Location: Footer - Company
   - Items: Our Story, Our People, Careers

4. **Legal Menu**
   - Location: Footer - Legal
   - Items: Terms, Privacy

### **Bước 3: Nhập ACF Options**

#### **Header Settings** (`/wp-admin/admin.php?page=header-settings`)

```
Logo Icon: Upload logo_single.png
Logo Text: Upload logo_text.png
Phone: +84 28 7300 3130
Email: info@commonworks.com.au
CTA Button:
  - Title: Get in Touch
  - URL: #contact
  - Target: _self
```

#### **Footer Settings** (`/wp-admin/admin.php?page=footer-settings`)

```
Footer Logo: Upload loaded.png
Column Titles:
  - Expertise: "Expertise"
  - Portfolio: "Portfolio"
  - Company: "Company"
  - Contact: "Get in Touch"

Contact Info:
  - Phone: +84 28 7300 3130
  - Email: info@commonworks.com.au
  - CTA Button:
      Title: Let's Talk →
      URL: #contact

Address:
APAC Office
Level 6, Goldstar 12 Building.
284/41 Ly Thuong Kiet St., Dien Hong Ward,
Ho Chi Minh City, Vietnam

Copyright: © 2025 CommonWorks Consulting. All Rights Reserved.

Toggles:
  ✓ Show Back to Top Button
  ☐ Show Search Form
```

#### **Social Media** (`/wp-admin/admin.php?page=social-media-settings`)

```
Add Social Link #1:
  - Platform: Facebook
  - URL: https://facebook.com/yourpage
  - Icon: fab fa-facebook-f

Add Social Link #2:
  - Platform: LinkedIn
  - URL: https://linkedin.com/company/yourcompany
  - Icon: fab fa-linkedin-in
```

---

## 📝 **Code Highlights**

### **Custom Image Functions Used:**

```php
// ACF Images (với lazy loading)
<?php echo get_image_attrachment($logo, 'image'); ?>

// Post Thumbnails
<?php echo get_image_post(get_the_ID(), 'image'); ?>

// Get URL only
$bg_url = get_image_attrachment($image, 'url');
```

### **Menu Output:**

```php
// Standard Menu
wp_nav_menu(array(
    'theme_location' => 'header-menu',
    'container' => false,
    'menu_class' => 'header__nav',
));

// Custom Mobile Menu
wp_nav_menu(array(
    'theme_location' => 'header-mobile',
    'link_before' => '<span class="header__mobile-link">',
    'link_after' => '</span>',
));
```

### **Social Media Repeater:**

```php
<?php if ($social_media && is_array($social_media)): ?>
    <?php foreach ($social_media as $social): ?>
        <a href="<?php echo esc_url($social['url']); ?>">
            <i class="<?php echo esc_attr($social['icon']); ?>"></i>
        </a>
    <?php endforeach; ?>
<?php endif; ?>
```

---

## ❓ **Menu Walker - KHÔNG CẦN**

**Tại sao?**
- ✅ Menu structure đơn giản (không có submenu)
- ✅ Đã có `add_additional_class_on_li()` để add custom class
- ✅ Đã có `special_nav_class()` để add active class
- ✅ `wp_nav_menu()` args đủ mạnh cho case này

**Khi nào cần Walker?**
- Khi cần submenu phức tạp (dropdown, mega menu)
- Khi cần custom HTML structure cho từng menu item
- Khi cần thêm icon, badge, hoặc extra wrapper

---

## 🎨 **Frontend Classes**

### **Header Classes:**
```css
.header
.header__inner
.header__logo
  .header__logo-icon
  .header__logo-text
.header__nav
.header__actions
.header-hamburger
.header__mobile-overlay
.header__mobile-nav
.header__mobile-contact
```

### **Footer Classes:**
```css
.footer
.footer__inner
.footer__brand
  .footer__logo
  .footer__social
.footer__col
  .footer__col-title
  .footer__list
.footer__contact
  .footer__contact-item
  .footer__cta
  .footer__address
.footer__bottom
  .footer__bottom-links
```

---

## 🔧 **Troubleshooting**

### **ACF Fields không hiển thị?**
1. Check ACF đã activate chưa
2. Sync field groups trong Custom Fields → Sync
3. Clear cache (nếu dùng caching plugin)

### **Menu không xuất hiện?**
1. Check đã assign menu vào location chưa (Appearance → Menus)
2. Check theme location name đúng không
3. Xóa `fallback_cb` nếu muốn hide khi không có menu

### **Images không lazy load?**
1. Check Lozad.js đã enqueue chưa
2. Check JavaScript observer đã init chưa
3. Xem source code có `data-src` và `class="lozad"` không

### **Social icons không hiện?**
1. Check FontAwesome đã enqueue chưa
2. Check icon class đúng format (`fab fa-facebook-f`)
3. Verify social media repeater có dữ liệu

---

## ✨ **Features Included**

- ✅ Responsive header with mobile menu
- ✅ Logo with 2 parts (icon + text)
- ✅ Dynamic navigation menus
- ✅ Mobile menu overlay
- ✅ Footer with 4 menu columns
- ✅ Social media links
- ✅ Contact information
- ✅ Back to top button
- ✅ Optional search form
- ✅ Optional page loader
- ✅ All images use lazy loading
- ✅ Proper escaping & validation
- ✅ ACF JSON for version control

---

## 📌 **Next Steps**

1. ✅ Setup menus in WordPress Admin
2. ✅ Upload images to ACF Options
3. ✅ Add social media links
4. ⏭️ Style with CSS (already have classes)
5. ⏭️ Add JavaScript for mobile menu toggle
6. ⏭️ Initialize Lozad.js for lazy loading
7. ⏭️ Add smooth scroll for anchor links

---

## 💡 **Tips**

**Performance:**
- Images tự động lazy load qua custom functions
- Menu được cache bởi WordPress
- ACF Options page chỉ query 1 lần

**Maintainability:**
- Header/Footer tách biệt khỏi page content
- ACF field groups có thể export/import dễ dàng
- Menu có thể thay đổi không cần code

**Scalability:**
- Dễ thêm menu locations mới
- Dễ thêm social platforms mới
- Có thể reuse template cho client khác
