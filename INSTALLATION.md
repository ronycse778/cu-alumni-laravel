# CU Alumni Association Website - Installation Guide

## Project Overview
This is a complete Laravel 11 alumni association website with Bootstrap 5, MySQL database, and a comprehensive admin panel. The project includes:
- Frontend website with all sections (Event Highlights, Notable Events, Stories, News, Notices, Gallery)
- User authentication (Login/Registration)
- Admin panel with full CRUD operations for all content
- Settings management for site configuration

## System Requirements
- PHP 8.2 or higher
- MySQL 5.7 or higher
- Composer
- Apache/Nginx web server

## Installation Steps

### Step 1: Extract the Project
Extract the downloaded zip file to your desired location:
```bash
unzip cu-alumni-website.zip
cd alumni-website
```

### Step 2: Install Dependencies
Install PHP dependencies using Composer:
```bash
composer install
```

### Step 3: Configure Environment
Copy the example environment file and configure it:
```bash
cp .env.example .env
```

Edit the `.env` file and update the following settings:
```
APP_NAME="CU Alumni Association"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cu_alumni
DB_USERNAME=root
DB_PASSWORD=your_password_here
```

### Step 4: Generate Application Key
Generate a new application key:
```bash
php artisan key:generate
```

### Step 5: Create Database
Create a new MySQL database named `cu_alumni`:
```sql
CREATE DATABASE cu_alumni CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Or using command line:
```bash
mysql -u root -p -e "CREATE DATABASE cu_alumni CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### Step 6: Run Migrations
Run the database migrations to create all tables:
```bash
php artisan migrate
```

### Step 7: Create Storage Link
Create a symbolic link for file uploads:
```bash
php artisan storage:link
```

### Step 8: Seed Database (Optional)
Seed the database with sample data:
```bash
php artisan db:seed
```

This will create:
- Admin user (email: admin@example.com, password: password)
- Sample event highlights
- Sample notable events
- Sample stories
- Sample news items
- Sample notices
- Site settings

### Step 9: Set Permissions
Set proper permissions for storage and cache directories:
```bash
chmod -R 775 storage bootstrap/cache
```

### Step 10: Start Development Server
Start the Laravel development server:
```bash
php artisan serve
```

The website will be available at: http://localhost:8000

## Admin Panel Access

### Default Admin Credentials
- **Email:** admin@example.com
- **Password:** password

### Admin Panel URL
Access the admin panel at: http://localhost:8000/admin/dashboard

### Admin Features
The admin panel includes full CRUD operations for:
1. Event Highlights
2. Notable Events
3. Stories
4. News & Press Release
5. Notices
6. Image Gallery
7. Site Settings

## Frontend Features

### Public Pages
- **Homepage (/)**: Displays all content sections
- **News (/news)**: Lists all news articles
- **Notices (/notices)**: Lists all notices
- **Gallery (/gallery)**: Displays image gallery

### User Authentication
- **Login (/login)**: User login page
- **Register (/register)**: User registration page

## File Upload Configuration

Images are stored in the `storage/app/public` directory and are accessible via the `/storage` URL after running `php artisan storage:link`.

Supported upload directories:
- Notable Events: `storage/app/public/notable-events`
- Stories: `storage/app/public/stories`
- News: `storage/app/public/news`
- Gallery: `storage/app/public/galleries`

## Database Structure

### Tables
1. **users**: User accounts
2. **event_highlights**: Event highlight cards
3. **notable_events**: Notable events with images
4. **stories**: Alumni stories
5. **news**: News and press releases
6. **notices**: Notice board items
7. **galleries**: Image gallery
8. **settings**: Site configuration (key-value pairs)

## Customization

### Updating Site Settings
Login to admin panel and navigate to Settings to update:
- Total Members count
- Total Countries count
- Total Chapters count
- Programming With Purpose text

### Adding Content
All content can be managed through the admin panel:
1. Login to admin panel
2. Navigate to the desired section
3. Click "Add New" button
4. Fill in the form and submit

### Styling
The project uses Bootstrap 5 via CDN. To customize styles:
- Edit `resources/views/layouts/app.blade.php` for frontend styles
- Edit `resources/views/layouts/admin.blade.php` for admin panel styles

## Production Deployment

### For Production Environment:

1. Update `.env` file:
```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

2. Optimize the application:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. Set proper file permissions:
```bash
chmod -R 755 storage bootstrap/cache
```

4. Configure your web server (Apache/Nginx) to point to the `public` directory

### Apache Configuration Example:
```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    DocumentRoot /path/to/alumni-website/public

    <Directory /path/to/alumni-website/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### Nginx Configuration Example:
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /path/to/alumni-website/public;

    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## Troubleshooting

### Common Issues

**Issue: Database connection error**
- Solution: Check MySQL credentials in `.env` file
- Ensure MySQL service is running

**Issue: Permission denied errors**
- Solution: Run `chmod -R 775 storage bootstrap/cache`

**Issue: Images not displaying**
- Solution: Run `php artisan storage:link`

**Issue: 404 errors on routes**
- Solution: Ensure `.htaccess` file exists in `public` directory
- For Nginx, check configuration includes try_files directive

**Issue: Blank page after installation**
- Solution: Check `storage/logs/laravel.log` for errors
- Ensure all dependencies are installed with `composer install`

## Support

For issues or questions:
1. Check the Laravel documentation: https://laravel.com/docs/11.x
2. Review the installation steps above
3. Check error logs in `storage/logs/laravel.log`

## Technology Stack

- **Framework:** Laravel 11
- **Frontend:** Bootstrap 5 (CDN)
- **Database:** MySQL
- **Authentication:** Laravel UI
- **Icons:** Font Awesome 6
- **PHP Version:** 8.2+

## Project Structure

```
alumni-website/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       ├── EventHighlightController.php
│   │       ├── NotableEventController.php
│   │       ├── StoryController.php
│   │       ├── NewsController.php
│   │       ├── NoticeController.php
│   │       ├── GalleryController.php
│   │       └── SettingController.php
│   └── Models/
│       ├── EventHighlight.php
│       ├── NotableEvent.php
│       ├── Story.php
│       ├── News.php
│       ├── Notice.php
│       ├── Gallery.php
│       └── Setting.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── admin.blade.php
│       ├── admin/
│       └── home.blade.php
├── routes/
│   └── web.php
└── public/
    └── storage/ (symlink)
```

## License

This project is developed for CU Alumni Association.

---

**Installation Date:** 2025-10-18
**Laravel Version:** 11.x
**PHP Version:** 8.3
