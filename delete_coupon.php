<?php
require 'db.php';
require 'functions.php';
redirectIfNotLoggedIn();

$id = (int)$_GET['id'];
$admin_id = $_SESSION['admin_id'];

$conn->query("DELETE FROM coupons WHERE id = $id AND admin_id = $admin_id");
header("Location: admin_dashboard.php");
exit();
?>
