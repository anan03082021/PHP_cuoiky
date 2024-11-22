<?php
    require_once ('model/m_flower.php');
    class C_product {
        public function list_all_flower()
        {
            $flower = new Flower();
            $list_flower = $flower->list_all_product();
            return  $list_flower;
        }
    }


?>
