<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            background-color: #343a40;
            color: white;
        }

        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #495057;
            border-radius: 5px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            height: 60px;
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 1.5rem;
            border-radius: 5px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .img-thumbnail {
            height: 75px;
            object-fit: cover;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>

    <?php
    require('../template/admin_header.php');
    ?>

    <div class="content">
        <div class="header">
            <h1>Product List</h1>
        </div>
        <div class="container mt-4">
            <h2 class="mb-4">Manage Products</h2>

            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="add_product.php">
                        <button class="btn btn-custom">+ Add New Product</button>
                    </a>
                </div>
            </div>

            <?php
            require('../controller/c_list_product.php');
            $c_product = new C_product();
            $list_product = $c_product->list_all_product();
            ?>

            <div class="card p-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>In Stock</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_product as $product): ?>
                            <tr>
                                <td><img src="<?php echo $product['avatar']; ?>" class="img-thumbnail" alt="Product Image"></td>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo number_format($product['price'], 2); ?> VND</td>
                                <td><?php echo $product['in_stock']; ?></td>
                                <td><?php echo $product['category_name']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="edit_product.php?id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="delete_product.php?id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
