# Laravel API Project

This is a Laravel-based RESTful API that manages users, projects, and timesheets. It includes authentication using Laravel Sanctum, relationship management, and filtering for fetching data.

## Features
- User authentication (register, login, logout) with Laravel Sanctum
- CRUD operations for Users, Projects, and Timesheets
- Relationship handling (Users can be assigned to multiple projects, and users can log timesheets for projects)
- API protection (only authenticated users can access endpoints)
- Filtering support in the "Read All Records" endpoint

## Installation & Setup

### Prerequisites
Ensure you have the following installed:
- PHP (>= 8.0)
- Composer
- MySQL
- Laravel (>= 9.0)

### Step 1: Install Dependencies
```sh
composer install
```

### Step 2: Set Up Environment Variables
Copy the example `.env` file:
```sh
cp .env.example .env
```
Then update the following database credentials in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### Step 3: Generate Application Key
```sh
php artisan key:generate
```

### Step 4: Run Database Migrations
```sh
php artisan migrate
```

### Step 5: Seed the Database (Optional)
```sh
php artisan db:seed
```

### Step 6: Install Laravel Sanctum & Run Migrations
```sh
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

### Step 6: Serve the Application
```sh
php artisan serve
```
The API will be available at: `http://127.0.0.1:8000`

## API Endpoints

### Authentication
- **Register:** `POST /api/register`
- **Login:** `POST /api/login`
- **Logout:** `POST /api/logout` (Requires Auth)

### Users
- **Create User:** `POST /api/users`
- **Get All Users:** `GET /api/users`
- **Get User by ID:** `GET /api/users/{id}`
- **Update User:** `POST /api/users/update`
- **Delete User:** `POST /api/users/delete`

### Projects
- **Create Project:** `POST /api/projects`
- **Get All Projects:** `GET /api/projects`
- **Get Project by ID:** `GET /api/projects/{id}`
- **Update Project:** `POST /api/projects/update`
- **Delete Project:** `POST /api/projects/delete`

### Timesheets
- **Create Timesheet:** `POST /api/timesheets`
- **Get All Timesheets:** `GET /api/timesheets`
- **Get Timesheet by ID:** `GET /api/timesheets/{id}`
- **Update Timesheet:** `POST /api/timesheets/update`
- **Delete Timesheet:** `POST /api/timesheets/delete`

### Filtering
Filtering is available in "Read All Records" endpoints. Example:
```sh
GET /api/users?first_name=John&gender=male
GET /api/projects?status=active
GET /api/timesheets?user_id=1&project_id=2
```

## Authentication
After logging in, include the token in the Authorization header for protected routes:
```sh
Authorization: Bearer YOUR_ACCESS_TOKEN
```

## License
This project is licensed under the MIT License.

---
Made with ❤️ by Chathu Abeywickrama