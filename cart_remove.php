<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id_int = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $product_id_str = (string)$product_id_int;

    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart'][$product_id_int]);
        unset($_SESSION['cart'][$product_id_str]);
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        
        $_SESSION['flash'] = "Removed an item from your cart.";
    }
}

header('Location: cart.php');
exit;