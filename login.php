<?php 
session_start();
try {
    require_once "includes/dbh.inc.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["pwd"];

        if($username == "admin" && $password == "1234"){
            header("Location: dashboard.php");
        } else {
            echo "your are not an admin.";
        }
    }   
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$pdo = null;
