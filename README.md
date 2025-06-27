# Laravel File Upload with Migration 📁

A simple Laravel project to demonstrate file uploads, storage, and migration setup.

## 🧰 Features

- Upload and store files via Laravel forms  
- Use migrations to create `files` table  
- Save file metadata (original name, path) in the database  
- Access uploaded files via publicly symlinked storage  

## 🚀 Prerequisites

- PHP ≥ 8.0  
- Composer  
- MySQL or another supported database  
- Node.js & npm (optional for UI assets)  
- Laravel ≥ 11 (or 8+)  

## 🛠️ Installation

1. **Clone the project**  
   ```bash
   git clone https://github.com/NareshG375/laravel-fileupload.git
   cd laravel-file-upload


2. Install dependencies

  composer install
  npm install # optional if using front-end
  npm run dev # optional

3. Configure environment


   APP_NAME="Laravel File Upload"
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_db
   DB_USERNAME=your_user
   DB_PASSWORD=your_pass
4. Generate App Key

   php artisan key:generate

5. Run Migrations

   php artisan migrate

6. php artisan storage:link

   php artisan storage:link

7. Start the development server

   php artisan serve   

8. License

   MIT License © 2025

   Originally built by Naresh Garg