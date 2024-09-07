<?php
require 'header.php';
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $coupon_code = $conn->real_escape_string($_POST['coupon']);
    $today = date('Y-m-d');

    $result = $conn->query("SELECT * FROM coupons WHERE code = '$coupon_code' AND expiry_date >= '$today'");
    if ($result->num_rows > 0) {
        $coupon = $result->fetch_assoc();
        if ($coupon['used_count'] < $coupon['usage_limit']) {
            $discount = rand($coupon['discount_min'], $coupon['discount_max']);
            echo "<div class='alert alert-success'>Coupon is valid. Discount: $discount%</div>";

            $conn->query("UPDATE coupons SET used_count = used_count + 1 WHERE id = " . $coupon['id']);
        } else {
            echo "<div class='alert alert-danger'>Coupon usage limit exceeded.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid or expired coupon.</div>";
    }
}
?>

<div class="container">
    <h2 class="mt-5">Coupon Validation</h2>
    <form action="validate_coupon.php" method="POST">
        <div class="mb-3">
            <label for="coupon" class="form-label">Coupon Code</label>
            <input type="text" class="form-control" id="coupon" name="coupon" required>
        </div>
        <button type="submit" class="btn btn-primary">Validate Coupon</button>
    </form>
</div>
</body>
</html>
