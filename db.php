<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coupon_system_pro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
