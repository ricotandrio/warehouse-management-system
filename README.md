# Warehouse Management System

## Table of Contents

1. [Overview](#overview)
2. [Key Features](#key-features)
3. [System Requirements](#system-requirements)
4. [Installation Guide](#installation-guide)
5. [Usage](#usage)
   - [Adding Products](#adding-products)
   - [Managing Transactions](#managing-transactions)
6. [Technologies Used](#technologies-used)
7. [Entity-Relationship Diagram (ERD)](#entity-relationship-diagram-erd)
8. [Contributing](#contributing)
9. [License and Usage Restrictions](#license-and-usage-restrictions)

## Overview

The **Warehouse Management System** is a self-developed solution designed for managing warehouse inventory. It provides functionalities for tracking stock levels, handling inbound and outbound transactions, and managing products with ease. This system is built using Laravel and is suitable for small to medium-sized warehouses, offering a user-friendly interface for inventory control and product management.

## Key Features

- **Inventory Management**: Effortlessly add, modify, and delete items from the inventory database.
- **Inbound and Outbound Transactions**: Track stock movements, including adding items to the warehouse (IN) and removing them (OUT).
- **Dynamic Product Input**: Seamlessly add multiple products with their respective quantities using an intuitive interface.
- **Transaction History**: Access a detailed log of all stock movements, including product names, quantities, and transaction types.
- **Transaction Management**: Edit and delete existing transactions as needed.
- **Validation**: Ensure that product selections and quantities are valid while preventing duplicate entries in a single transaction.
- **Viewer Dashboard**: Notifications for items that are low in stock or out of stock.
- **Admin Dashboard**: Comprehensive management features for overseeing the warehouse system.
- **Filter and View Options**: Enable filtering of views based on product manufacturers or categories. 

## System Requirements

- **PHP Version**: ^8.0.2
- **Laravel Framework**: ^9.2
- **Other Packages**:
  - `guzzlehttp/guzzle` ^7.2
  - `laravel/sanctum` ^2.14.1
  - `laravel/tinker` ^2.7

## Installation Guide

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-repo/warehouse-management-system.git
   ```

2. **Navigate to the project directory**:
   ```bash
   cd warehouse-management-system
   ```

3. **Install dependencies**:
   ```bash
   composer install
   ```

4. **Set up environment variables**:
   Copy the example environment file and configure it as needed:
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

6. **Set up the database**:
   Configure your database in the `.env` file and run the migrations:
   ```bash
   php artisan migrate --seed
   ```

7. **Run the application**:
   Start the development server:
   ```bash
   php artisan serve
   ```

8. **Access the system**:
   Navigate to `http://127.0.0.1:8000` in your browser.

## Usage

### Adding Products
You can add new products to the warehouse inventory. Products can have unique identifiers and quantities. Ensure that the input fields are correctly filled out to manage stock levels efficiently.

### Managing Transactions
Transactions are divided into two types:
- **IN Transactions**: To add stock to the warehouse.
- **OUT Transactions**: To remove stock from the warehouse.

Each transaction is recorded in the system, allowing you to track inventory changes over time.

## Technologies Used

- **Backend**: Laravel 9.x (PHP Framework)
- **Frontend**: Blade Templating Engine, HTML, CSS, JavaScript
- **Database**: MySQL 
- **UUID-Based Identification**: For uniquely identifying transaction headers and items. 

## Entity-Relationship Diagram (ERD)
The Entity-Relationship Diagram (ERD) for the Warehouse Management System is available in the `/docs` directory. This diagram visually represents the database schema, showcasing the relationships between different entities involved in the system, such as products, transactions, and users.

## Contributing
Even though this project has been completed personally, contributions are still welcome! If you have suggestions for enhancements, bug fixes, or new features, your input is highly appreciated. To contribute, please follow these guidelines:

1. **Fork the Repository**: Create your own copy of the project by forking the repository on GitHub.
2. **Clone Your Fork**: Download your forked repository to your local machine.
   ```bash
   git clone https://github.com/your-username/warehouse-management-system.git
   ```
3. **Create a Branch**: Before making changes, create a new branch for your feature or fix.
   ```bash
   git checkout -b feature/your-feature-name
   ```
4. **Make Your Changes**: Implement your changes, ensuring to follow the coding standards and best practices.
5. **Commit Your Changes**: Commit your changes with a clear and concise message.
   ```bash
   git commit -m "Add a brief description of your changes"
   ```
6. **Push to Your Fork**: Push your changes to your forked repository.
   ```bash
   git push origin feature/your-feature-name
   ```
7. **Open a Pull Request**: Go to the original repository and create a pull request, detailing the changes you made and their purpose.

Thank you for considering contributing to the Warehouse Management System! Your contributions can help enhance the project and make it even more beneficial for users.

## License and Usage Restrictions

This **Warehouse Management System** is licensed for **personal use only**. You are free to use and modify the code for non-commercial purposes, but **commercial use is strictly prohibited**. This includes:

- **You may** use the system for managing personal warehouse inventory.
- **You may not** sell, redistribute, or use this system for any commercial ventures.

**Disclaimer**: This system is provided as-is without warranties or support. Use it at your own risk for personal purposes only.