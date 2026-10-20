# CU GDSC Hub

**A Laravel-based management system for the Google Developer Groups on Campus (GDSC) at Central University, Ghana.**

## About the Project

CU GDSC Hub is a web application I am building to organize and manage activities within the GDSC community at Central University.

The project brings together member records, events, attendance, announcements, learning resources, and library inventory in one application. The aim is to make routine club administration more organized while providing members with easier access to information and learning materials.

This project is also part of my journey toward becoming a stronger developer. I am using it to practice Laravel, database relationships, authentication, role-based access, and the design of practical application workflows.

## Features

- **Member Management:** Create, view, update, and manage student records.
- **Leadership Management:** Maintain records of club leaders.
- **Event Management:** Organize and manage club events.
- **Attendance Tracking:** Record attendance and review attendance records.
- **Announcements:** Share important updates with members.
- **Resource Library:** Organize learning resources for members.
- **Book Inventory:** Manage books and monitor available stock.
- **Borrowing Management:** Record book borrowing and track borrowing records.
- **Authentication and Access Control:** Provide login functionality and restrict features according to user roles.

## Technology Stack

- **Backend:** PHP and Laravel
- **Frontend:** HTML, CSS, JavaScript, Blade templates, and Bootstrap
- **Database:** MySQL
- **Development Tools:** Visual Studio Code, Git, and GitHub

## Getting Started

### Prerequisites

Make sure you have the following installed:

- PHP and Composer
- MySQL
- Node.js and npm
- Git

### Installation

1. Clone the repository:

   ```bash
   git clone <YOUR_GITHUB_REPOSITORY_URL>
   ```

2. Enter the project directory:

   ```bash
   cd <YOUR_PROJECT_DIRECTORY>
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Create your environment file:

   ```bash
   cp .env.example .env
   ```

   On Windows, you can also copy `.env.example` to `.env` using File Explorer.

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure your database credentials in `.env` and create the corresponding MySQL database.

7. Run the database migrations:

   ```bash
   php artisan migrate
   ```

8. Install frontend dependencies and build the assets:

   ```bash
   npm install
   npm run build
   ```

9. Start the development server:

   ```bash
   php artisan serve
   ```

10. Open the local URL shown in your terminal, usually `http://127.0.0.1:8000`.

## Project Status

This project is under development. Features, workflows, and access permissions may change as development and testing continue.

## Learning Objectives

Through this project, I am strengthening my understanding of:

- Laravel MVC architecture
- Blade layouts and template inheritance
- CRUD operations and form validation
- Database design and Eloquent relationships
- Authentication and role-based authorization
- Application testing and debugging
- Git and GitHub version control

## Author

**Priscilla Nmalemya Azure**

Computer Science student at Central University, Ghana.

GitHub: [Azure-priscy](https://github.com/Azure-priscy)
