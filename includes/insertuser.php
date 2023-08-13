<?php
require_once "dbh.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST["new_username"];
    $new_email = $_POST["new_email"];
    $new_pwd = $_POST["new_pwd"];

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd)");
        $stmt->bindParam(":username", $new_username);
        $stmt->bindParam(":email", $new_email);
        $stmt->bindParam(":pwd", $new_pwd);
        $stmt->execute();

        // Redirect back to the admin dashboard
        header("Location: ../dashboard.php");
        exit();
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
</head>
<body>
    <?php include_once "../navbar.php" ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="mb-4">Add New User</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label>Username:</label>
                        <input class="form-control" type="text" name="new_username"><br>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control" name="new_email"><br>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input class="form-control" type="password" name="new_pwd"><br>
                    </div>
                    <button class="btn btn-primary" type="submit">Add User</button>
                    <a class="btn btn-secondary" href="../dashboard.php">Back to Dashboard</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
