<?php
require_once 'asset.php';

if (!isLevel(5)) {
    header("Location: login.php");
    exit();
}

$basket = $_SESSION['basket'] ?? [];
$total  = array_sum(array_column($basket, 'price'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
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
            <a href="community.php">COMMUNITY</a>
            <?php if (isLevel(5)): ?>
                <a href="logout.php">LOGOUT</a>
            <?php else: ?>
                <a href="login.php">LOGIN</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <div class="backboard">
            <section class="basket">
                <h1>Your Basket</h1>
                <div class="line"></div>

                <?php if (empty($basket)): ?>
                    <p>Your basket is empty.</p>
                    <a href="community.php" class="button">← Back to Shop</a>

                <?php else: ?>
                    <?php foreach ($basket as $item): ?>
                        <div class="basket-item">
                            <div class="basket-item-info">
                                <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                                <p><?php echo $item['price'] == 0 ? 'Free' : '£' . number_format($item['price'], 2); ?></p>
                            </div>
                            <form method="POST" action="basket_remove.php">
                                <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                <button type="submit" class="button-danger">Remove</button>
                            </form>
                        </div>
                    <?php endforeach; ?>

                    <div class="line"></div>
                    <div class="basket-total">
                        <h2>Total: <?php echo $total == 0 ? 'Free' : '£' . number_format($total, 2); ?></h2>
                    </div>

                    <div class="basket-actions">
                        <a href="community.php" class="button">← Continue Shopping</a>
                        <button class="button" onclick="checkout()">Checkout</button>
                    </div>
                <?php endif; ?>

            </section>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 Kerbal Space Program Fan Site. All rights reserved.</p>
        <a href="https://github.com/Filo07">Developer GitHub</a>
    </footer>

    <script>
        function checkout() {
            alert("Not implemented.");
        }

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