# 📦 Inventory Management System

## 📘 Description / Overview

The **Inventory Management System (IMSystem)** is a web-based application designed to manage and monitor product inventory efficiently.  
It allows users to track available items, manage categories, and update inventory details in real-time to ensure organization.

---

## 🎯 Objectives

- To create a simple and user-friendly inventory system.
- To implement CRUD (Create, Read, Update, Delete) operations using Laravel and PHP.
- To demonstrate database integration for managing items and categories.
- To apply web development principles for functionality and interface design.

---

## ⚙️ Features / Functionality

- Add, edit, and delete items and categories.
- Organize products by type or category.
- Search and view inventory records quickly.
- User-friendly interface.

---

## 🖥️ Installation Instructions

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/inventory-management-system.git
   ```
2. **Navigate to the project folder:**
   ```bash
   cd inventory-management-system
   ```
3. **Install dependencies(if using laravel):**
   ```bash
   composer install
   ```
4. **Run migrations to create database tables:**
   ```bash
   php artisan migrate
   ```
5. **Start your local server:**
   ```bash
   php artisan serve
   ```
6. **Open your browser and go to:**

```bash
  http://127.0.0.1:8000
```

## 💡 Usage

- Navigate to the Items or Categories tab.

- Add new inventory entries or update existing ones.

- Monitor quantities, categories, and items.

- View summaries.

## 🖼️ Screenshots or Code Snippets

```bash
@extends('layouts.app')

@section('content')
<div class="container" style="max-width:520px;">
 <div class="card" style="border-radius:20px;box-shadow:0 2px 12px rgba(0,0,0,0.07);padding:32px 28px;">
     <h2 style="font-size:2rem;font-weight:700;margin-bottom:24px;">Add Category</h2>
     <form action="{{ route('categories.store') }}" method="POST" style="display:grid;gap:18px;">
         @csrf
         <div>
             <label for="name">Name</label>
             <input type="text" name="name" id="name" required value="{{ old('name') }}">
         </div>

         <div style="display:flex;justify-content:flex-end;gap:12px;">
             <a href="{{ route('categories.index') }}"
                class="btn secondary"
                style="border-radius:12px;padding:10px 18px;font-size:1rem;">
                 Cancel
             </a>
             <button type="submit"
                     class="button"
                     style="background:#33443;border-radius:16px;padding:10px 22px;box-shadow:0 2px 8px rgba(51,68,67,0.08);font-size:1rem;">
                 <!-- Plus Icon -->
                 <svg xmlns="http://www.w3.org/2000/svg" style="height:18px;width:18px;vertical-align:middle;margin-right:6px;" fill="none" viewBox="0 0 24 24" stroke="white">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                 </svg>
                 Add Category
             </button>
         </div>
     </form>
 </div>
</div>
@endsection
```

## 👩‍💻 Contributors

- Samantha L. Fernandez
- Bachelor of Science in Information Technology

## ⚖️ License

This project is **free to use** for educational and personal purposes.  
You may copy, modify, and share it as long as proper credit is given.
© 2025 Soyoon Ho — All rights reserved.
