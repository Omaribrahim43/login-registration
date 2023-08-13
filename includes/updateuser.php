<?php 
require_once "dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $user_id = $_GET["id"];

    try {
        $stmt = $pdo->prepare("SELECT id, username, email, pwd FROM users WHERE id = :id");
        $stmt->bindParam(":id", $user_id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST["new_username"];
    $new_email = $_POST["new_email"];
    $new_pwd = $_POST["new_pwd"];
    $user_id = $_POST["user_id"];

    try {
        $stmt = $pdo->prepare("UPDATE users SET username = :username, email = :email, pwd = :pwd WHERE id = :id");
        $stmt->bindParam(":username", $new_username);
        $stmt->bindParam(":email", $new_email);
        $stmt->bindParam(":pwd", $new_pwd);
        $stmt->bindParam(":id", $user_id);
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <?php include_once "../navbar.php" ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="mb-4">Update User</h1>
                <form method="post" action="">
                    
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <div class="form-group">
                        <label>Name:</label>
                        <input class="form-control" type="text" name="new_username" value="<?php echo $user['username']; ?>"><br>
                    </div>
                    <div class="form-group">
                        <label>email:</label>
                        <input class="form-control" type="email" name="new_email" value="<?php echo $user['email']; ?>"><br>
                    </div>
                    <div class="form-group">    
                        <label>Password:</label>
                        <input class="form-control" type="password" name="new_pwd" value="<?php echo $user['pwd']; ?>"><br>
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a class="btn btn-secondary" href="../dashboard.php">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
