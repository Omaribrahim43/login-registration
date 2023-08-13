<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];

        try {
            require_once "dbh.inc.php";
                
            $query = "SELECT id, pwd FROM users WHERE username = :username";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":username", $username);

            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($pwd, $user['pwd'])) {
                $_SESSION["username"] = $username;
                header("Location: dashboard.php");
            } else {
                $error_message = "Invalid username or password.";
            }
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
} 
