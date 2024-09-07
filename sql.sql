CREATE DATABASE coupon_system_pro;

USE coupon_system_pro;

-- Admin table to store admin details
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Coupons table to store coupons created by admins
CREATE TABLE coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    code VARCHAR(255) UNIQUE NOT NULL,
    prefix VARCHAR(50),
    digits INT,
    usage_limit INT DEFAULT 1,
    used_count INT DEFAULT 0,
    expiry_date DATE,
    discount_min INT,
    discount_max INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admins(id)
);
