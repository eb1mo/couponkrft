<?php
require 'header.php';
require 'db.php';
require 'functions.php';
redirectIfNotLoggedIn();

$admin_id = $_SESSION['admin_id'];
$coupons = $conn->query("SELECT * FROM coupons WHERE admin_id = $admin_id");
?>

<div class="container">
    <h2 class="mt-5">Admin Dashboard</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Prefix</th>
                    <th>Digits</th>
                    <th>Usage Limit</th>
                    <th>Used Count</th>
                    <th>Expiry Date</th>
                    <th>Discount Range</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($coupon = $coupons->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $coupon['code']; ?></td>
                        <td><?php echo $coupon['prefix']; ?></td>
                        <td><?php echo $coupon['digits']; ?></td>
                        <td><?php echo $coupon['usage_limit']; ?></td>
                        <td><?php echo $coupon['used_count']; ?></td>
                        <td><?php echo $coupon['expiry_date']; ?></td>
                        <td><?php echo $coupon['discount_min'] . ' - ' . $coupon['discount_max']; ?></td>
                        <td>
                            <a href="edit_coupon.php?id=<?php echo $coupon['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_coupon.php?id=<?php echo $coupon['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
