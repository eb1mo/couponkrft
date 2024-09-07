<?php include 'header.php'; ?>
<div class="container">
    <h2 class="mt-5">Enter Coupon Code</h2>
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
