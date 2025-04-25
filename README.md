# Task Manager System

## Description

This is a **Task Manager System** created for learning purposes using **Laravel** and **Livewire**. It includes **user authentication**, **user management**, **member management**, and **task management** features. The app allows users to sign up, log in, and manage tasks, members, and user roles. It also provides an interactive, dynamic user interface using Livewire.

## Features

- **User Authentication**: Users can register, log in, and manage their accounts with secure authentication.
- **Member Management**: Create, update, delete, and view members with detailed information.
- **Task Management**: Assign, update, track, and delete tasks for members.
- **Pagination**: Efficient handling of large datasets with pagination for users, members, and tasks.
- **Modals**: User-friendly modals for adding/editing members and tasks.
- **Flash Messages**: Success and error messages for a better user experience.

## Tech Stack

- **Laravel** - Backend framework
- **Livewire** - For dynamic user interfaces
- **Tailwind CSS** - For responsive and modern styling
- **MySQL** - For database management
- **Laravel Breeze** - For authentication

## Installation

### Requirements

- PHP >= 8.0
- Composer
- MySQL (or compatible database)

### Steps to Install

1. Clone this repository:

    ```bash
    git clone https://github.com/your-username/Task-Manager-System.git
    ```

    ```bash
         cd Task-Manager-System
         composer install
         cp .env.example .env
         php artisan key:generate
         php artisan key:generate
         php artisan migrate

         composer require laravel/breeze --dev
         php artisan breeze:install
         npm install
         npm run dev
    ```

### Project Description:

This project now reflects a complete system for **user authentication**, **task management**, and **member management** .

Let me know if you'd like further adjustments or if you'd like to proceed with this!
