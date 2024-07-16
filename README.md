# Login PHP Project

This is a simple PHP project demonstrating a basic login system with session management, user authentication, and article management. The project includes functionality to create, edit, and delete articles, with access control to restrict certain actions to logged-in users only.

## Features

- User registration and login
- Session management for user authentication
- Article management (create, edit, delete)
- Access control for article management
- User feedback messages for actions (success and error messages)

## Requirements

- PHP ^8.0
- MySQL
- Composer

## Installation

1. **Clone the repository:**

    ```sh
    git clone https://github.com/dariusz-witkowski98/login-php.git
    cd login-php
    ```

2. **Install dependencies:**

    ```sh
    composer install
    ```

3. **Database setup:**

    - Create a MySQL database named `cgrd`.
    - Update the `config/database.php` file with your database credentials.

4. **Run migrations:**

    ```sh
    php migrate.php
    ```

    This will create the necessary tables and insert a sample user.

5. **Configure Apache:**

    Ensure your Apache server is configured to allow `.htaccess` files and has `mod_rewrite` enabled. The `.htaccess` file in the project root should handle URL rewriting.

## Usage

1. **Start your local server:**

    ```sh
    php -S localhost:8000
    ```

2. **Access the application:**

    Open your browser and navigate to `http://localhost:8000`.

3. **Login credentials:**

    Use the following credentials to log in:

    - Username: `admin`
    - Password: `test`

## Project Structure

- `src/Controller`: Contains the application controllers.
- `src/View`: Contains the HTML view templates.
- `src/Database.php`: Contains the database connection and query methods.
- `assets/css`: Contains the CSS stylesheets.
- `assets/js`: Contains the JavaScript files.
- `config/database.php`: Configuration file for database credentials.
- `migrate.php`: Script to create tables and seed the database.

## License

This project is licensed under the MIT License.

---

Feel free to reach out if you have any questions or need further assistance!

---

Dariusz Witkowski  
dariusz.witkowski98@gmail.com

---

### Example
A screenshot of the application:

![image](https://github.com/user-attachments/assets/beed2f5a-181c-47bf-be57-0748c1818b93)


---

Thank you for considering my application.
