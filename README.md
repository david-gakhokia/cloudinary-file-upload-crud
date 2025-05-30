<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/david-gakhokia/cloudinary-file-upload-crud/actions">
        <img src="https://github.com/david-gakhokia/cloudinary-file-upload-crud/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License">
    </a>
</p>

---

## 📦 Cloudinary File Upload CRUD

A simple yet powerful **Laravel 12 CRUD** application for managing products with **Cloudinary-based image uploads** and **Bootstrap 5** styling.

> 🔥 Designed as a developer-friendly starter project — ready to extend or use in your portfolio.

---

## 🚀 Features

- ✅ Create / Read / Update / Delete products
- 📤 Upload product image to **Cloudinary**
- 📎 Store `public_id`, `secure_url`, and `original_filename`
- 🗑️ Delete images from Cloudinary upon record deletion
- 📐 Laravel 12 + Bootstrap 5 UI layout
- 📁 RESTful routes and clean code structure

---

## 📸 Screenshot

<p align="center">
    <img src="https://raw.githubusercontent.com/david-gakhokia/cloudinary-file-upload-crud/main/public/demo-screenshot.png" width="600">
</p>

---

## 🧱 Technologies Used

- Laravel 12
- PHP 8.2+
- Cloudinary PHP SDK
- Bootstrap 5 (CDN)
- Blade Templates
- MySQL / SQLite

---

## ⚙️ Setup

```bash
git clone https://github.com/david-gakhokia/cloudinary-file-upload-crud.git
cd cloudinary-file-upload-crud

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
