<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the ID as an integer
    $product_id_int = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    // Also get it as a string just in case
    $product_id_str = (string)$product_id_int;

    if (isset($_SESSION['cart'])) {
        // Remove it whether it's stored as an integer or string key
        unset($_SESSION['cart'][$product_id_int]);
        unset($_SESSION['cart'][$product_id_str]);
        
        // Clean up: If the cart is completely empty now, clear the session array
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        
        $_SESSION['flash'] = "Item removed from your cart.";
    }
}

// Redirect back to display the updated cart
header('Location: cart.php');
exit;