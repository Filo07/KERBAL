<?php
require_once 'asset.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: shop.php');
    exit;
}

$product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;

// Verify product exists (stock check removed)
$stmt = mysqli_prepare($conn, "SELECT id, name FROM tbl_products WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $product_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    $_SESSION['flash'] = 'Product not available.';
    header('Location: shop.php');
    exit;
}

// Add to cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]++;
} else {
    $_SESSION['cart'][$product_id] = 1;
}

$_SESSION['flash'] = htmlspecialchars($product['name']) . ' added to cart!';
header('Location: shop.php');
exit;