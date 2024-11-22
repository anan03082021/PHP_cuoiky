<?php

require_once("database.php");

class initDatabase extends Database {

    public function create_structure() {
        // ################## Table USER
        $sql = "CREATE TABLE IF NOT EXISTS user (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            username VARCHAR(30) NOT NULL UNIQUE,
            password VARCHAR(30) NOT NULL,
            role INT(1) NOT NULL DEFAULT 0, 
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        // Role: 0 user, 1 admin
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table CATEGORY
        $sql = "CREATE TABLE IF NOT EXISTS category (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL UNIQUE,
            description TEXT
        )";
        $this->set_query($sql);
        $this->excute_query();

        // Insert sample categories
        $sql = "INSERT IGNORE INTO category (name, description) 
                VALUES 
                    ('Roses', 'A variety of beautiful roses in different colors'),
                    ('Tulips', 'Bright and colorful flowers that bloom in spring'),
                    ('Daisies', 'Simple and elegant flowers often used in bouquets'),
                    ('Lilies', 'Elegant flowers with a sweet fragrance')";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table FLOWER
        $sql = "CREATE TABLE IF NOT EXISTS flower (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            type VARCHAR(30) NOT NULL,
            color VARCHAR(20),
            avatar VARCHAR(500),
            price DECIMAL(10, 2) NOT NULL,
            in_stock INT(3) UNSIGNED DEFAULT 0,
            category_id INT(6) UNSIGNED,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE SET NULL
        )";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table ORDERS
        $sql = "CREATE TABLE IF NOT EXISTS orders (
            order_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED NOT NULL,
            status ENUM('Pending', 'Processing', 'Completed', 'Cancelled') DEFAULT 'Pending',
            total_price DECIMAL(10, 2) NOT NULL,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
        )";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table ORDER_ITEMS
        $sql = "CREATE TABLE IF NOT EXISTS order_items (
            item_id INT AUTO_INCREMENT PRIMARY KEY,
            order_id INT UNSIGNED NOT NULL,
            flower_id INT UNSIGNED NOT NULL,
            quantity INT NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
            FOREIGN KEY (flower_id) REFERENCES flower(id) ON DELETE CASCADE
        )";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table CART
        $sql = "CREATE TABLE IF NOT EXISTS cart (
            cart_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED NOT NULL,
            flower_id INT UNSIGNED NOT NULL,
            quantity INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
            FOREIGN KEY (flower_id) REFERENCES flower(id) ON DELETE CASCADE
        )";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table PAYMENTS
        $sql = "CREATE TABLE IF NOT EXISTS payments (
            payment_id INT AUTO_INCREMENT PRIMARY KEY,
            order_id INT UNSIGNED NOT NULL,
            amount DECIMAL(10, 2) NOT NULL,
            payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            payment_method ENUM('Credit Card', 'PayPal', 'Bank Transfer') NOT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE
        )";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table SHIPPING_ADDRESS
        $sql = "CREATE TABLE IF NOT EXISTS shipping_address (
            address_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED NOT NULL,
            recipient_name VARCHAR(255) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            address_line1 VARCHAR(255) NOT NULL,
            address_line2 VARCHAR(255),
            state VARCHAR(100),
            postal_code VARCHAR(20) NOT NULL,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
        )";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table REVIEWS
        $sql = "CREATE TABLE IF NOT EXISTS reviews (
            review_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED NOT NULL,
            flower_id INT UNSIGNED NOT NULL,
            rating INT CHECK (rating BETWEEN 1 AND 5),
            comment TEXT,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
            FOREIGN KEY (flower_id) REFERENCES flower(id) ON DELETE CASCADE
        )";
        $this->set_query($sql);
        $this->excute_query();

        $this->close();
        echo "INIT COMPLETE";
    }
}

$myinit = new initDatabase();
$myinit->create_structure();

?>
