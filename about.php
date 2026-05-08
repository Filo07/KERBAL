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
        <img src="bilder/logo4.png" alt="Logo">
        <div class="backboard">
            <section class="navigate">
                <h1>Our History</h1>
                <div class="line"></div>
                <h2>How did this website come to be?</h2>
                <p>As a passionate fan of Kerbal Space Program, I wanted to create a space where fellow enthusiasts could come together to share their love for the game. This website was born out of a desire to provide a platform for fans to connect, share their creations, and explore the rich lore of the Kerbin solar system. Over time, it has evolved into a vibrant community hub where players can find resources, discuss strategies, and celebrate all things Kerbal!</p>
                <div class="line"></div>
                <h2>What can you find here?</h2>
                <p>Here, you can discover a wealth of information about the Kerbal Space Program universe, including detailed guides, community discussions, and exclusive content for dedicated fans!</p>
                <div class="line"></div>
                <h2>Why is this website log-in only?</h2>
                <p>To foster a sense of community and ensure a safe and engaging environment for all users, we have implemented a log-in system. This allows us to provide personalized experiences, protect user data, and create a space where fans can interact and share their passion for Kerbal Space Program without any concerns about privacy or security. We want to avoid being like Reddit.</p>
                <div class="line"></div>
                <h2>Return to the Homepage:</h2>
                <a href="index.php">Home</a>
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