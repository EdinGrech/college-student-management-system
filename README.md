## Creating a Laravel Project

```bash
composer create-project laravel/laravel=10 college-student-management-system
```

## DB Setup

### Run as administrator

```bash
net start mariadb
```

```bash
net stop mariadb
```

```bash
mysql -u root -p
# needs to have priv
# password: password
create database college_student_management_system;
GRANT ALL PRIVILEGES ON college_student_management_system.* TO 'laravel_user'@'localhost' IDENTIFIED BY 'password';
```

### Set envs

```text
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=college_student_management_system
    DB_USERNAME=laravel_user
    DB_PASSWORD=password
```

## Migrations

```bash
php artisan migrate
```

## Start Server

```bash
php artisan serve
```

## Create Migration / Model / Controller

```bash
php artisan make:model Collage -m -c
```

```bash
php artisan make:model Student -m -c
```

## DB Debugging Commands

```bash
use college_student_management_system;

show tables;

SHOW COLUMNS FROM students;
```
