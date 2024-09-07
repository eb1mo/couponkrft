<?php
require 'header.php';
require 'db.php';
require 'functions.php';
redirectIfNotLoggedIn();

$id = (int)$_GET['id'];
$admin_id = $_SESSION['admin_id'];
$coupon = $conn->query("SELECT * FROM coupons WHERE id = $id AND admin_id = $admin_id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $conn->real_escape_string($_POST['prefix']);
    $digits = (int)$_POST['digits'];
    $usage_limit = (int)$_POST['usage_limit'];
    $expiry_date = $conn->real_escape_string($_POST['expiry_date']);
    $discount_min = (int)$_POST['discount_min'];
    $discount_max = (int)$_POST['discount_max'];

    $conn->query("UPDATE coupons SET prefix='$prefix', digits=$digits, usage_limit=$usage_limit, expiry_date='$expiry_date', discount_min=$discount_min, discount_max=$discount_max WHERE id = $id AND admin_id = $admin_id");
    header("Location: admin_dashboard.php");
    exit();
}
?>

<div class="container">
    <h2 class="mt-5">Edit Coupon</h2>
    <form action="edit_coupon.php?id=<?php echo $coupon['id']; ?>" method="POST">
        <div class="mb-3">
            <label for="prefix" class="form-label">Prefix</label>
            <input type="text" class="form-control" id="prefix" name="prefix" value="<?php echo $coupon['prefix']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="digits" class="form-label">Number of Digits</label>
            <input type="number" class="form-control" id="digits" name="digits" value="<?php echo $coupon['digits']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="usage_limit" class="form-label">Usage Limit</label>
            <input type="number" class="form-control" id="usage_limit" name="usage_limit" value="<?php echo $coupon['usage_limit']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="expiry_date" class="form-label">Expiry Date</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="<?php echo $coupon['expiry_date']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="discount_min" class="form-label">Minimum Discount</label>
            <input type="number" class="form-control" id="discount_min" name="discount_min" value="<?php echo $coupon['discount_min']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="discount_max" class="form-label">Maximum Discount</label>
            <input type="number" class="form-control" id="discount_max" name="discount_max" value="<?php echo $coupon['discount_max']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Coupon</button>
    </form>
</div>
</body>
</html>
