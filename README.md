# Project Summary

## Project Name
PHP Ecommerce App

## Project Description
The PHP Ecommerce App is a database-backed video game storefront developed throughout the Server-Side Scripting with PHP Lab course. The application displays products from a MySQL/MariaDB database and allows users to add products to a shopping cart, update quantities, and remove items. The project was later reorganized using the Model-View-Controller (MVC) architecture and given a custom gaming-themed interface.

## Project Tasks
- Created the initial PHP ecommerce application structure
- Designed and populated the product and cart database tables
- Connected PHP pages to the database
- Displayed product information dynamically from the database
- Implemented Add to Cart functionality
- Implemented cart quantity updates and item removal
- Refactored the application into Model, View, and Controller components
- Added product images
- Added shared CSS styling for the product catalog and shopping cart
- Tested product display, navigation, cart operations, database access, and application behavior
- Used Git and GitHub to track development progress and create project releases

## Skills Demonstrated
- PHP server-side scripting
- MySQL/MariaDB database integration
- SQL queries and database-backed applications
- CRUD-related application functionality
- Model-View-Controller architecture
- HTML and CSS interface development
- Debugging and application testing
- Git and GitHub version control
- Incremental software development

## Technologies Used
- PHP
- MySQL/MariaDB
- HTML
- CSS
- Apache
- XAMPP
- Visual Studio Code
- Git and GitHub

## Development Process
The application was developed incrementally throughout the course. Each week added or improved a major part of the project, including database support, shopping cart functionality, MVC organization, interface improvements, and final testing. GitHub commits and release tags were used to document major project phases.

## Local Setup (XAMPP)

1. Place or clone this project in your XAMPP `htdocs` directory, then start Apache and MySQL/MariaDB.
2. Import `php_ecommerce_app.sql` into your local MySQL/MariaDB server using phpMyAdmin.
3. Create or use a **local database account** with only the permissions required by this application.
4. Copy `model/database.example.php` to `model/database.local.php`. Edit the copy with your own local database host, username, password, and database name.
5. Open `http://localhost/PHP-Ecommerce-App/view/products.php` (adjust the folder name if yours differs).

**Security:** `model/database.local.php` is excluded from Git via `.gitignore`. Never commit real passwords, database exports containing private customer data, or production credentials. The `model` directory is also blocked from direct HTTP access by an Apache `.htaccess` file; ensure Apache honors `.htaccess` rules.

**Important for existing clones:** Earlier commits contained database credentials in `model/database.php`. Changing the current file does not erase Git history. Rotate the previously exposed database password (and any reused password) before continuing, then put the replacement only in your local ignored config file. Do not paste credentials into GitHub issues or pull requests.

## Repository
https://github.com/TORLAW1692/PHP-Ecommerce-App
