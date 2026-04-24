<!DOCTYPE html>
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
            <a href="dashboard.php">HOME</a>
            <a href="about.php">ABOUT</a>
            <a href="community.php">COMMUNITY</a>
            <a href="logout.php">LOGOUT</a>
        </nav>
    </header>

    <main>
        <img src="bilder/logo3.png" alt="Logo">
        <div class="backboard">
            <section class="navigate">
                <h1>Welcome User!</h1>
                <div class="line"></div>
                <h2>This site may not take you to the Mun, but it can tell you how!</h2>
                <p>Kerbal Space Program offers a vast universe to explore. And it will make your dreams of space exploration come true! Here you can read up on the Kerbin solar system, or why Jebediah Kerman is the best pilot in the galaxy and much more!</p>
                <a href="planet.php" class="button">Explore the Kerbin Solar System</a>
                <a href="jebediah.php" class="button">Learn about Jebediah Kerman</a>
                <div class="line"></div>
                <h2>For those of you who want to explore the<br>whats and whys of this page:</h2>
                <p>Simply click the button below to read up on this website's history!</p>
                <a href="about.php" class="button">Read the History</a>
                <div class="line"></div>
                <h2>P.S : Dont forget to check out our community page!</h2>
                <a href="community.php" class="button">Visit the Community Page</a>
            </section>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Kerbal Space Program Fan Site. All rights reserved.</p>
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