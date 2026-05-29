<!DOCTYPE html>
<?php
require_once 'asset.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <img src="bilder/jeb.png" alt="Logo" class="jeblogo">
        <div class="backboard">
            <section class="navigate">
                <h1>Jebediah Kerman</h1>
                <div class="line"></div>
                <h2>Our Favorite Astronaut</h2>
                <p>Jebediah Kerman is the most beloved astronaut in the Kerbal Space Program universe. Known for his bravery and skill, he has become a symbol of hope and adventure for players around the world.</p>
                <div class="line2"></div>
                <p>Side note: Jebediah Kerman is also known for his ability to survive in the harsh environment of the Kerbin system.</p>
                <div class="line"></div>
                <h2>P.S : Dont forget to check out our community page!</h2>
                <?php if (isLevel(5)): ?>
                    <a href="community.php" class="button">Visit the Community Page</a>
                <?php else: ?>
                    <a href="login.php" class="button">Login to access the Community Page</a>
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