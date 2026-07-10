# Sangam — Company Website

A dynamic, full-stack company website for **Sangam Pvt. Ltd.**, an IT services company based in Hyderabad, India.

## Tech Stack

| Layer          | Technology                                |
| -------------- | ----------------------------------------- |
| Backend        | Laravel 12 (PHP 8.2+)                     |
| Frontend       | Vue 3 (Composition API, `<script setup>`) |
| SPA Bridge     | Inertia.js v2                             |
| Styling        | Tailwind CSS v4                           |
| UI Components  | Reka-UI (headless) + Lucide Vue icons     |
| Hero Slider    | Swiper v12                                |
| Authentication | Laravel Fortify                           |
| Authorization  | Spatie Laravel Permission                 |
| Build Tool     | Vite 6                                    |
| Database       | SQLite (dev) / MySQL (prod)               |

## Features

### Public Website

- **Hero Slider** — Swiper-powered full-screen hero with CTA buttons (3 slides)
- **About Section** — Company story with stats and "Why Choose Us" panel
- **Services** — 6 IT service cards (Web, Mobile, Cloud, AI/ML, UI/UX, Cybersecurity)
- **Technologies** — Color-coded tech stack badges grouped by category
- **Portfolio** — Filterable project cards with category tabs
- **Testimonials** — Client reviews with star ratings
- **Stats Counter** — Key numbers (150+ projects, 80+ clients, 8+ years, 45+ team)
- **Trusted Clients** — Partner/client logos section
- **Contact CTA** — Call-to-action section
- **Contact Form** — Full contact form with server-side validation
- **Footer** — Multi-column footer with social links

### Admin Panel

- Secure login at `/login`
- Dashboard at `/admin` with stats overview
- Contact messages management at `/admin/contacts`

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer 2.x
- Node.js 18+
- npm

### Installation

```bash
# Clone the repository
git clone https://github.com/pranayanakarmi/venture4tech.git
cd venture4tech

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Create SQLite database
touch database/database.sqlite

# Run migrations and seed demo data
php artisan migrate --seed

# Build frontend assets
npm run build

# Start development server
php artisan serve
```

Visit `http://localhost:8000` to see the site.

### Development (Hot Reload)

```bash
# Terminal 1: Laravel dev server
php artisan serve

# Terminal 2: Vite dev server
npm run dev
```

### Environment Variables

Key `.env` settings:

```env
APP_NAME="Sangam"
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite

# Admin user seeded automatically
FIRST_ADMIN_EMAIL=admin@venture4tech.com
FIRST_ADMIN_PASSWORD=password
```

## Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php        # Homepage with all dynamic sections
│   │   ├── AboutController.php       # About page
│   │   ├── ServicesController.php    # Services index + detail
│   │   ├── PortfolioController.php   # Portfolio index + detail
│   │   ├── ContactController.php     # Contact form + submission
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       └── ContactController.php
│   └── Models/                       # 20 Eloquent models
├── database/
│   ├── migrations/                   # 4 migration files
│   └── seeders/                      # 12 seeders with realistic data
├── resources/
│   ├── css/app.css                   # Tailwind CSS v4 + design tokens
│   └── js/
│       ├── app.js                    # Inertia.js entry point
│       ├── layouts/
│       │   ├── GuestLayout.vue       # Public layout (topbar + navbar + footer)
│       │   └── AppLayout.vue         # Admin layout (sidebar)
│       └── pages/
│           ├── Home.vue              # Full homepage (all sections)
│           ├── About.vue             # About page
│           ├── Services/Index.vue    # Services listing
│           ├── Services/Show.vue     # Service detail
│           ├── Portfolio/Index.vue   # Portfolio with filters
│           ├── Portfolio/Show.vue    # Project detail
│           ├── Contact.vue           # Contact form
│           ├── Auth/Login.vue        # Admin login
│           └── Admin/
│               ├── Dashboard.vue     # Admin dashboard
│               └── Contacts/         # Contact messages CRUD
└── routes/
    └── web.php                       # All routes (public + admin)
```

## Content Models

| Model                         | Description                                    |
| ----------------------------- | ---------------------------------------------- |
| `HeroSlide`                   | Homepage hero slider slides                    |
| `Service`                     | IT services offered                            |
| `Technology`                  | Technologies/tools showcased                   |
| `Project`                     | Portfolio projects                             |
| `Testimonial`                 | Client testimonials                            |
| `TeamMember`                  | Team members                                   |
| `Partner`                     | Clients and technology partners                |
| `Statistic`                   | Key stats (projects, clients, etc.)            |
| `Contact`                     | Contact form submissions                       |
| `SiteSetting`                 | Site-wide settings (name, email, social links) |
| `Menu` / `MenuItem`           | Navigation menus                               |
| `FooterColumn` / `FooterLink` | Footer content                                 |
| `HomeAboutSection`            | About section CMS content                      |
| `HomeServicesSection`         | Services section header                        |
| `HomeProjectsSection`         | Projects section header                        |
| `HomeTestimonialsSection`     | Testimonials section header                    |
| `HomeStatsSection`            | Stats section header                           |
| `HomeClientsSection`          | Clients section header                         |
| `HomeContactCtaSection`       | CTA section content                            |
| `HomeTechnologiesSection`     | Technologies section header                    |

## Brand

- **Company:** Sangam Pvt. Ltd.
- **Tagline:** Innovating Tomorrow, Today
- **Primary Color:** `#1a56db` (Blue)
- **Email:** info@venture4tech.com
- **Location:** Hyderabad, Telangana, India

---

© 2025 Sangam Pvt. Ltd. All rights reserved.
