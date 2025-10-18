# CU Alumni Association Website

A complete Laravel 11 alumni association website with Bootstrap 5 and comprehensive admin panel.

## Quick Start

1. Extract the zip file
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure database
4. Run `php artisan key:generate`
5. Create database: `cu_alumni`
6. Run `php artisan migrate`
7. Run `php artisan storage:link`
8. Run `php artisan db:seed` (optional - creates sample data)
9. Run `php artisan serve`
10. Visit http://localhost:8000

## Admin Access

- **URL:** http://localhost:8000/admin/dashboard
- **Email:** admin@example.com
- **Password:** password

## Features

### Frontend
- Homepage with all sections (Event Highlights, Notable Events, Stories, News, Notices, Gallery)
- User authentication (Login/Registration)
- News listing page
- Notices listing page
- Image gallery page
- Responsive design with Bootstrap 5

### Admin Panel
Full CRUD operations for:
- Event Highlights
- Notable Events
- Stories
- News & Press Release
- Notices
- Image Gallery
- Site Settings (member count, countries, chapters, etc.)

## Technology Stack

- Laravel 11
- PHP 8.3
- MySQL
- Bootstrap 5 (CDN)
- Font Awesome 6
- Laravel UI (Authentication)

## Documentation

See `INSTALLATION.md` for detailed installation instructions and configuration options.

## Project Structure

- **Frontend:** Bootstrap 5 with CDN (no Vite/npm build required)
- **Backend:** Laravel 11 with MySQL
- **Authentication:** Laravel UI
- **File Uploads:** Stored in `storage/app/public`
