<?php
include_once "dbh.inc.php";
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
    $user_id = $_GET["id"];

    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(":id", $user_id);
        $stmt->execute();

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
    <title>Delete user</title>
</head>
<body>
    <?php include_once "../navbar.php" ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="mb-4">Delete user</h1>
                <p class="text-black-50">Are you sure you want to delete this user?</p>
                <form method="post" action="">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <button class="btn btn-primary" type="submit">Confirm Delete</button>
                    <a class="btn btn-secondary" href="../dashboard.php">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>