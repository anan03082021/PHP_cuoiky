<?php

    require_once("database.php");


    class initDatabase extends Database  {

        public function create_structure()
        {
            ############### Table USER
            $sql = "CREATE TABLE users (
                    user_id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) UNIQUE NOT NULL,
                    password VARCHAR(255) NOT NULL,
                    email VARCHAR(100) UNIQUE NOT NULL,
                    phone VARCHAR(20),
                    full_name VARCHAR(255),
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

            // Role: 0 user, 1 admin

           $this->set_query($sql);
           $result = $this->excute_query();
           

            ############### Table CATEGORY  

            $sql = "CREATE TABLE IF NOT EXISTS category (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50) NOT NULL UNIQUE,
                description TEXT
            );";

                

            $this->set_query($sql);
            $result = $this->excute_query();


            $sql = "INSERT INTO category (name, description) 
                    VALUES 
                        ('VanPhongPham', 'Nhung san pham đon gian phuc vu cho hoat dong van phong'),
                        ('DungCuHocTap', 'Nhung san pham ho tro hoc sinh sinh vien trong hoc tap'),
                        ('MyThuat', 'Nhung dung cu dung trong hoi hoa'),
                        ('QuaLuuNiem', 'Nhung do vat dung cu nho suu tam');";

                

            $this->set_query($sql);
            $result = $this->excute_query();


            

            ############### Table product 

            $sql = "CREATE TABLE IF NOT EXISTS product (
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
            );";

                // Role: 0 user, 1 admin

            $this->set_query($sql);
            $result = $this->excute_query();


            ############### Table shipping_address (địa chỉ giao hàng)

            $sql = "CREATE TABLE shipping_address (
                    address_id INT AUTO_INCREMENT PRIMARY KEY,
                    user_id INT,
                    recipient_name VARCHAR(255) NOT NULL,
                    phone VARCHAR(20) NOT NULL,
                    address_line1 VARCHAR(255) NOT NULL,
                    address_line2 VARCHAR(255),
                    state VARCHAR(100),
                    postal_code VARCHAR(20) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
            );";

            $this->set_query($sql);
            $result = $this->excute_query();


            $this->close();
           echo "INIT COMPLETE";


           

        }
        
    }

    
    
    
    $myinit = new initDatabase();

    $myinit->create_structure();



?>