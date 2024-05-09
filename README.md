
# Bookstore API

The Bookstore API is a Laravel application that provides an interface for managing books and stores. This API allows the following operations:

- Registration, viewing, updating, and deletion of books. 
- Registration, viewing, updating, and deletion of stores.
- Association and disassociation of books with stores.
- User authentication.

## Requirements
- PHP 8 or higher
- Composer
- MySQL or SQLite
- Laravel 8

## Installation
1. Clone the repository to your local environment:
```bash
git clone https://github.com/your-username/bookstore-api.git
```
2. Navigate to the project directory:
```bash
cd laravel-bookstore-api
```
3. Install Composer dependencies:
```bash
composer install
```
4. Create an environment file .env based on the .env.example file:
```bash
cp .env.example .env
```
5. Configure the database in the .env file:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
6. Run the database migrations to create the necessary tables:
```bash
php artisan migrate
```
7.  If desired, you can populate the database with sample data using seeders:
```bash
php artisan db:seed
```
## Usage
1. Start the PHP built-in server:
```bash
php artisan serve
```
2. Access the API at http://localhost:8000.
3. To perform operations on the API, you can use tools such as HTTPie, Postman, or Insomnia.
4. Here are some examples of usage:
- Authentication
```bash
POST http://localhost:8000/api/login
body: {
  "email": "your_email@example.com",
  "password": "your_password"
}
```
- Book registration:
```bash
POST http://localhost:8000/api/books
body: {
  "name": "Book Name",
  "isbn": "123456789",
  "value": 29.99
}
```
- Associating a book with a store:
```bash
POST http://localhost:8000/api/books/1/attach/2
```
- Viewing all books:
```bash
GET http://localhost:8000/api/books
```
- Viewing a specific book:
```bash
GET http://localhost:8000/api/books/1
```