<!DOCTYPE html>
<?php
require_once 'asset.php';

$cartItems = [];
$totalPrice = 0;

if (!empty($_SESSION['cart'])) {
    $ids = array_keys($_SESSION['cart']);
    $id_list = implode(',', array_map('intval', $ids));
    
    $query = "SELECT * FROM tbl_products WHERE id IN ($id_list)";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        while ($product = mysqli_fetch_assoc($result)) {
            $id = $product['id'];
            $quantity = $_SESSION['cart'][$id];
            $subtotal = $product['price'] * $quantity;
            $totalPrice += $subtotal;
            
            $product['quantity'] = $quantity;
            $product['subtotal'] = $subtotal;
            $cartItems[] = $product;
        }
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
    <script src="header.js" defer></script>
</head>
<body>

    <div class="stars-1"></div>
    <div class="stars-2"></div>
    <div class="stars-3"></div>

    <header id="header">
        <div id="headerbutton" onClick="toggles()">
            <div class="bar"></div>
        </div>
        <nav>
            <a href="index.php">HOME</a>
            <a href="about.php">ABOUT</a>
            <?php if (isLevel(5)): ?>
                <a href="community.php">COMMUNITY</a>
            <?php endif; ?>
            <?php if (isLevel(5)): ?>
                <a href="logout.php">LOGOUT</a>
            <?php else: ?>
                <a href="login.php">LOGIN</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <div class="backboard">
            <section class="navigate">
                <h1>Shopping Cart</h1>
                <div class="line2"></div>

                <?php if (isset($_SESSION['flash'])): ?>
                    <p><?php echo htmlspecialchars($_SESSION['flash']); ?></p>
                    <?php unset($_SESSION['flash']); ?>
                <?php endif; ?>

                <?php if (empty($cartItems)): ?>
                    <p>Your cart is empty.</p>
                    <a href="shop.php" class="button">To Products</a>
                <?php else: ?>
                    <?php foreach ($cartItems as $item): ?>
                        <div class="product">
                            <div>
                                <h2><?php echo htmlspecialchars($item['name']); ?></h2>
                                <p>Price: <?php echo number_format($item['price'], 2); ?> kr</p>
                                <p>Quantity: <?php echo $item['quantity']; ?></p>
                                <p>Subtotal: <?php echo number_format($item['subtotal'], 2); ?> kr</p>
                            </div>
                            
                            <form method="POST" action="cart_remove.php">
                                <input type="hidden" name="product_id" value="<?php echo (int)$item['id']; ?>">
                                <button type="submit" class="button">Remove</button>
                            </form>
                        </div>
                        <div class="line"></div>
                    <?php endforeach; ?>

                    <div class="cart-total">
                        <h3>Total: <?php echo number_format($totalPrice, 2); ?> kr</h3>
                        <br>
                        <a href="shop.php" class="button">Continue Shopping</a>
                    </div>
                <?php endif; ?>

            </section>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Kerbal Space Program Fan Site. All rights reserved.</p>
    </footer>

</body>
</html>