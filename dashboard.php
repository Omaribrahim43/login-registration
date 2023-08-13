<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body class="bg-light">
    <?php
    try {
        
        require_once "includes/dbh.inc.php";

        $stmt = $pdo->query("SELECT id, username, email, pwd FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
    <?php include_once "navbar.php" ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Users Management</h1>
                    <a href="includes/insertuser.php" class="btn btn-primary btn-action mb-3">Add New User</a>
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['pwd']; ?></td>
                                <td><a href="includes/updateuser.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-action">Edit</a></td>
                                <td><a href="includes/deleteuser.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-action">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
