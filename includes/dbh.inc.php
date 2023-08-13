<?php 

$localhost = "localhost";
$dbusername = "root";
$dbpassword = "1234";
$dbname = "users";

$conn = mysqli_connect($localhost, $dbusername, $dbpassword, $dbname);

if($conn) {
    echo "connection successfuly";
} else {
    die("connection failed" . mysqli_connect_error());
}