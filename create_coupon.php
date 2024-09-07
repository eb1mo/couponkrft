<?php
require 'header.php';
require 'db.php';
require 'functions.php';
redirectIfNotLoggedIn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prefix = $conn->real_escape_string($_POST['prefix']);
    $digits = (int)$_POST['digits'];
    $usage_limit = (int)$_POST['usage_limit'];
    $expiry_date = $conn->real_escape_string($_POST['expiry_date']);
    $discount_min = (int)$_POST['discount_min'];
    $discount_max = (int)$_POST['discount_max'];
    $admin_id = $_SESSION['admin_id'];

    $count = (int)$_POST['count'];
    $generation_type = $_POST['generation_type'];

    for ($i = 0; $i < $count; $i++) {
        if ($generation_type == 'serial') {
            $code = $prefix . str_pad($i + 1, $digits, '0', STR_PAD_LEFT);
        } else {
            $code = $prefix . generateRandomString($digits);
        }

        $conn->query("INSERT INTO coupons (admin_id, code, prefix, digits, usage_limit, expiry_date, discount_min, discount_max) 
                      VALUES ($admin_id, '$code', '$prefix', $digits, $usage_limit, '$expiry_date', $discount_min, $discount_max)");
    }

    header("Location: admin_dashboard.php");
    exit();
}
?>

<div class="container">
    <h2 class="mt-5">Create Coupon</h2>
    <form  action="create_coupon.php" method="POST">
        <div class="mb-3">
            <label for="prefix" class="form-label">Prefix</label>
            <input type="text" class="form-control" id="prefix" name="prefix" required>
        </div>
        <div class="mb-3">
            <label for="digits" class="form-label">Number of Digits</label>
            <input type="number" class="form-control" id="digits" name="digits" required>
        </div>
        <div class="mb-3">
            <label for="count" class="form-label">Number of Coupons</label>
            <input type="number" class="form-control" id="count" name="count" required>
        </div>
        <div class="mb-3">
            <label for="usage_limit" class="form-label">Usage Limit</label>
            <input type="number" class="form-control" id="usage_limit" name="usage_limit" required>
        </div>
        <div class="mb-3">
            <label for="expiry_date" class="form-label">Expiry Date</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
        </div>
        <div class="mb-3">
            <label for="discount_min" class="form-label">Minimum Discount</label>
            <input type="number" class="form-control" id="discount_min" name="discount_min" required>
        </div>
        <div class="mb-3">
            <label for="discount_max" class="form-label">Maximum Discount</label>
            <input type="number" class="form-control" id="discount_max" name="discount_max" required>
        </div>
        <div class="mb-3">
            <label for="generation_type" class="form-label">Generation Type</label>
            <select class="form-control" id="generation_type" name="generation_type" required>
                <option value="serial">Serial</option>
                <option value="random">Random</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Create Coupon</button>
    </form>
</div>
</body>
</html>
