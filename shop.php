<!DOCTYPE html>
<?php
require_once 'asset.php';

$query = "SELECT * FROM tbl_products";
$result = mysqli_query($conn, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

$cartCount = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
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
                <h1>Shop</h1>
                <div class="line2"></div>
                <?php if (isset($_SESSION['flash'])): ?>
                    <p><?php echo htmlspecialchars($_SESSION['flash']); ?></p>
                    <?php unset($_SESSION['flash']); ?>
                <?php endif; ?>
                <a href="cart.php" class="addbutton">View Cart (<?php echo $cartCount; ?>)</a>
                <div class="line"></div>
                <?php if (empty($products)): ?>
                    <p>No products available right now.</p>
                <?php else: ?>
                    <?php foreach ($products as $p): ?>
                        <div class="product">
                            <h2><?php echo htmlspecialchars($p['name']); ?></h2>
                            <p>Price: <?php echo number_format($p['price'], 2); ?> kr</p>
                            <form method="POST" action="cart_add.php">
                                <input type="hidden" name="product_id" value="<?php echo (int)$p['id']; ?>">
                                <button type="submit" class="addbutton">Add to Cart</button>
                            </form>
                        </div>
                        <div class="line"></div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </section>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Kerbal Space Program Fan Site. All rights reserved.</p>
        <a href="https://github.com/Filo07">Developer GitHub</a>
    </footer>

    <script>
        const s1 = document.querySelector('.stars-1');
        const s2 = document.querySelector('.stars-2');
        const s3 = document.querySelector('.stars-3');

        window.addEventListener('scroll', () => {
            const y = window.scrollY;
            s1.style.transform = `translateY(${y * 0.006}px)`;
            s2.style.transform = `translateY(${y * 0.09}px)`;
            s3.style.transform = `translateY(${y * 0.1}px)`;
        });
    </script>

</body>
</html>