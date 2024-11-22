<?php
    require ('../model/m_product.php');

    class C_product {
        // Phương thức lấy tất cả sản phẩm
        public function list_all_product()
        {
            // Khởi tạo đối tượng Product để gọi phương thức từ lớp Product
            $product = new Product();
            // Lấy danh sách sản phẩm từ lớp Product
            $list_product = $product->list_all_product();
            // Trả về danh sách sản phẩm
            return $list_product;
        }

        // Phương thức tìm kiếm sản phẩm theo tên
    }
?>
