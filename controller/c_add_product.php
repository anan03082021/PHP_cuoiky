<?php
    require('../model/m_product.php');  // Kết nối với model sản phẩm

    session_start();

    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $description = $_POST['description'];  // Mô tả sản phẩm
    $price = $_POST['price'];
    $in_stock = $_POST['in_stock'];
    $category_id = $_POST['category_id'];

    // Xử lý ảnh đại diện
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $avatar_tmp = $_FILES['avatar']['tmp_name'];
        $avatar_name = basename($_FILES['avatar']['name']);
        $avatar_path = "../media/Products" . $avatar_name;

        // Di chuyển tệp ảnh vào thư mục uploads
        if (move_uploaded_file($avatar_tmp, $avatar_path)) {
            $message = "Avatar uploaded successfully.";
        } else {
            $message = "Error uploading avatar.";
            $avatar_path = NULL; // Nếu không tải lên được, set giá trị NULL
        }
    } else {
        $avatar_path = NULL; // Không có ảnh thì set NULL
    }

    // Tạo một đối tượng Product từ model và gọi phương thức tạo sản phẩm
    $new_product = new Product();
    $new_product->create_1_product($name, $description, $price, $in_stock, $category_id, $avatar_path);

    // Sau khi thêm sản phẩm thành công, chuyển hướng đến trang danh sách sản phẩm
    header("Location: ../admin/list_product.php");
    exit;
?>
