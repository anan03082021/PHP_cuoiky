<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .form-label {
            font-weight: bold;
            color: #007bff;
        }

        .form-control, .form-select {
            border-radius: 5px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .sidebar .active {
            background-color: #495057;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="text-center">Admin Panel</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="add_product.php" class="active">Add Product</a>
        <a href="manage_orders.php">Manage Orders</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="header">
            Add New Product
        </div>
        <div class="container mt-4">
            <h2 class="mb-4">Add a New Stationery Item</h2>
            <div class="card p-4">
                <form action="../controller/c_add_product.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter product name" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter product description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Product Type</label>
                        <input type="text" id="type" name="type" class="form-control" placeholder="E.g., Notebook, Pen" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" id="price" name="price" class="form-control" step="0.01" placeholder="Enter price in VND" required>
                    </div>

                    <div class="mb-3">
                        <label for="in_stock" class="form-label">Stock Quantity</label>
                        <input type="number" id="in_stock" name="in_stock" class="form-control" placeholder="Enter available quantity" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select id="category_id" name="category_id" class="form-select" required>
                            <option value="">Select Category</option>
                            <option value="1">VanPhongPham</option>
                            <option value="2">DungCuHocTap</option>
                            <option value="3">MyThuat</option>
                            <option value="4">QuaLuuNiem</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="avatar" class="form-label">Product Image</label>
                        <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-custom">Add Product</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
