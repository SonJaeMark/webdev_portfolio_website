# WebDev Portfolio Website (Barangay 404)

A PHP + MySQL community portfolio website for Barangay 404, built with a simple Service/Repository structure and styled using Bootstrap and Owl Carousel.

## Features

- Home page with hero carousel and highlighted projects
- Dynamic projects section powered by `ProjectService`
- Dedicated pages for About, Projects, and Contact
- MySQL-backed project data (`projects_tbl`)
- Responsive UI using Bootstrap and custom styles

## Tech Stack

- PHP 8+
- MySQL (via XAMPP)
- Apache (via XAMPP)
- HTML/CSS/JavaScript
- Bootstrap, Owl Carousel, AOS

## Project Structure

```text
webdev_portfolio_website/
|- config/
|  |- database.php
|- database/
|  |- projects_db.sql
|- public/
|  |- index.php
|  |- assets/
|- src/
|  |- Models/
|  |- Repository/
|  |- Service/
|  |- Views/
|     |- about.php
|     |- projects.php
|     |- contact.php
```

## Requirements

- [XAMPP](https://www.apachefriends.org/) installed
- Apache and MySQL services running

## Setup Instructions

1. Place this project inside your XAMPP `htdocs` folder:
   - `C:/xampp/htdocs/webdev_portfolio_website`
2. Start **Apache** and **MySQL** in XAMPP Control Panel.
3. Create/import the database:
   - Open `http://localhost/phpmyadmin`
   - Create database named `projects_db` (if not existing)
   - Import `database/projects_db.sql`
4. Confirm DB config in `config/database.php`:
   - Host: `127.0.0.1`
   - DB: `projects_db`
   - User: `root`
   - Password: empty (`''`, default XAMPP)

## Run the Project

Open in your browser:

- Home: `http://localhost/webdev_portfolio_website/public/index.php`
- About: `http://localhost/webdev_portfolio_website/src/Views/about.php`
- Projects: `http://localhost/webdev_portfolio_website/src/Views/projects.php`
- Contact: `http://localhost/webdev_portfolio_website/src/Views/contact.php`

## Architecture Notes

The project follows a basic layered approach:

- **Model**: Data objects (`src/Models`)
- **Repository**: Database access (`src/Repository`)
- **Service**: Business logic (`src/Service`)
- **Views/Public**: Rendered pages (`src/Views`, `public`)

Example flow:

`public/index.php` -> `ProjectService` -> `ProjectsRepository` -> MySQL

## Troubleshooting

- **500 Internal Server Error**
  - Check `C:/xampp/apache/logs/error.log`.
  - If caused by `.htaccess` encoding, save `.htaccess` as UTF-8 (not UTF-16), or remove invalid lines.
- **Projects not loading**
  - Verify MySQL is running.
  - Ensure `projects_db` exists and was imported.
  - Confirm credentials in `config/database.php`.
- **Styles/images not showing**
  - Use the exact URLs above.
  - Clear browser cache (Ctrl + F5).

## Author

Khaye