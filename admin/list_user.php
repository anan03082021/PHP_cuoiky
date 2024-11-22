<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            background-color: #343a40;
        }
        .sidebar a {
            color: #ffffff;
        }
        .sidebar a:hover {
            background-color: #495057;
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
        }
    </style>
</head>
<body>

    <?php 
        require ('../template/admin_header.php');
    ?>


    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div class="container mt-4">
            <h2>Welcome to the Admin Dashboard!</h2>
            <p>This is your central hub for managing the application.</p>


            <?php
                require ('../controller/c_list_user.php');

                $c_user = new C_user();
                
                $list_user = $c_user->list_all_user();

            ?>
            <!-- Add your content here -->

            <div class="row">

                <div class="col-md-12">
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                         <?php foreach ($list_user as $user): ?>

                            <tr>
                                <td><?php echo "{$user['username']}";     ?></td>
                                <td><?php echo "{$user['firstname']}";    ?></td>
                                <td><?php echo "{$user['lastname']}";     ?></td>
                                <td><?php echo "{$user['role']}";         ?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        
                            
                        </tbody>
                    </table>

                </div>
               
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
