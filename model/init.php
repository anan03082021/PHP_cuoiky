<?php

require_once("database.php");

class initDatabase extends Database {

    public function create_structure() {
        // ################## Drop tables if they exist
        $this->set_query("DROP TABLE IF EXISTS reviews, shipping_address, payments, cart, order_items, orders, product, category, user;");
        $this->excute_query();

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
                    ('VanPhongPham', 'Office supplies such as pens, notebooks, etc.'),
                    ('DungCuHocTap', 'Study tools including pens, erasers, and rulers'),
                    ('MyThuat', 'Art supplies for painting and drawing'),
                    ('QuaLuuNiem', 'Souvenirs and gift items')";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table PRODUCT
        $sql = "CREATE TABLE IF NOT EXISTS product (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            description TEXT, 
            price DECIMAL(10, 2) NOT NULL,
            in_stock INT(3) UNSIGNED DEFAULT 0,
            category_id INT(6) UNSIGNED,
            avatar VARCHAR(500), 
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE SET NULL
        )";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table ORDERS
        $sql = "CREATE TABLE IF NOT EXISTS orders (
            order_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
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
            item_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            order_id INT(6) UNSIGNED NOT NULL,
            product_id INT(6) UNSIGNED NOT NULL,
            quantity INT NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
            FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
        )";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table CART
        $sql = "CREATE TABLE IF NOT EXISTS cart (
            cart_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(6) UNSIGNED NOT NULL,
            product_id INT(6) UNSIGNED NOT NULL,
            quantity INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
            FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
        )";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table PAYMENTS
        $sql = "CREATE TABLE IF NOT EXISTS payments (
            payment_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            order_id INT(6) UNSIGNED NOT NULL,
            amount DECIMAL(10, 2) NOT NULL,
            payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            payment_method ENUM('Credit Card', 'PayPal', 'Bank Transfer') NOT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE
        )";
        $this->set_query($sql);
        $this->excute_query();

        // ################## Table SHIPPING_ADDRESS
        $sql = "CREATE TABLE IF NOT EXISTS shipping_address (
            address_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(6) UNSIGNED NOT NULL,
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
            review_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(6) UNSIGNED NOT NULL,
            product_id INT(6) UNSIGNED NOT NULL,
            rating INT CHECK (rating BETWEEN 1 AND 5),
            comment TEXT,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
            FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
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
