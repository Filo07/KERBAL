<!DOCTYPE html>
<?php
require_once 'asset.php';

if (!isLevel(5)) {
    header("Location: login.php");
    exit();
}
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
        <img src="bilder/logo5.png" alt="Logo">
        <div class="backboard">
            <section class="navigate">
                <h1>Community</h1>
                <div class="line"></div>
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