<?php
include_once "../includes/dbh.inc.php";

if (isset($_POST["submit"])) {
    $username = "username";
    $email = "email";
    $password = "password";
    $repassword = "repassword";

    $sql = "INSERT INTO accounts (`username`, `email`, `password`) VALUES ($username, $email, $password)";

    if(mysqli_query($conn, $sql)){
        echo "User Registered successfuly";
    } else {
        echo "Invalid data givin" . mysqli_error($conn);
    }
}
