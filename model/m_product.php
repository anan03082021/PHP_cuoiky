<?php

    require_once("database.php");


    class Product extends Database{

        public function create_1_product($name, $description, $price, $in_stock, $category_id, $avatar_path)
        {
          
            $sql = "INSERT INTO product (name, description, price, in_stock, category_id, avatar)
            VALUES ('$name', '$description', '$price', '$in_stock', '$category_id', '$avatar_path')";

            $this->set_query($sql);
            $this->excute_query();
            $this->close();
        }

        public function list_all_product()
        {
            $sql = "SELECT p.id, p.name, p.price, p.in_stock, p.avatar, c.name AS category_name 
                    FROM product p 
                    LEFT JOIN category c ON p.category_id = c.id";

            $this->set_query($sql);

            $result = $this->excute_query();

            $list_product = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $list_product[] = $row;
                }
            }
            return $list_product;
        }



    }


?>