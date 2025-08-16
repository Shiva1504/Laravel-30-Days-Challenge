# Day 1 – Introduction & Setup

## 🎯 Goal
Learn what Laravel is, set up the environment, and run your first Laravel application.

---

## 📌 What is Laravel?
Laravel is a **PHP framework** designed for building modern, maintainable, and scalable web applications.  
It follows the **MVC (Model-View-Controller)** pattern and comes with features like:
- Elegant syntax
- Built-in authentication
- Powerful ORM (Eloquent)
- Blade templating
- Easy routing

---

## 🛠 Requirements (Make sure to install all the below tools before starting the challenge)
- **PHP** ≥ 8.1
- **Composer**
- **MySQL** or any supported database
- Node.js & npm (for frontend assets)
- Laravel Installer (optional)

---

## 📥 Installation Steps

### 1️⃣ Install Laravel via Composer
```bash
composer create-project laravel/laravel laravel-app
```
Or using Laravel installer:
```bash
composer global require laravel/installer
laravel new laravel-app
```

### 2️⃣ Run the Laravel Development Server
```bash
cd laravel-app
php artisan serve
```

### 3️⃣ Explore the Laravel Folder Structure
app/ → Application logic (Models, Controllers, etc.)
bootstrap/ → Framework bootstrapping files
config/ → All configuration files
database/ → Migrations & seeders
public/ → Entry point for the application
resources/ → Blade templates, CSS, JS
routes/ → Web, API, console routes
storage/ → Logs, cache, file uploads
tests/ → Unit & feature tests


## 📚 Tasks for Day 1
 Install Laravel
 Run php artisan serve
 Open the app in browser
 Explore the folder structure