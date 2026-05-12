<?php
require_once 'asset.php';

if (!isLevel(5)) {
    header("Location: login.php");
    exit();
}

global $conn;
$shop_items = mysqli_query($conn, "SELECT * FROM tbl_shop ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community</title>
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
        <div class="community-layout">
            <div class="backboard">
                <section class="chat">
                    <h1>Community Chat</h1>
                    <div class="line"></div>
                    <div id="chatbox"></div>
                    <div class="chat-input">
                        <input type="text" id="messageInput" placeholder="Type a message..." maxlength="255">
                        <button onclick="sendMessage()">Send</button>
                    </div>
                </section>
            </div>
            <div class="backboard">
                <section class="shop">
                    <div class="shop-header">
                        <h1>Download Shop</h1>
                        <a href="shop_upload.php" class="button">+ Upload</a>
                    </div>
                    <div class="line"></div>
                    <?php
                    $basket_ids = array_column($_SESSION['basket'] ?? [], 'id');
                    ?>
                    <?php if (mysqli_num_rows($shop_items) === 0): ?>
                        <p>No items available</p>
                    <?php else: ?>
                        <div class="shop-grid">
                            <?php while ($item = mysqli_fetch_assoc($shop_items)): ?>
                                <div class="shop-item">
                                    <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                                    <p class="shop-desc"><?php echo htmlspecialchars($item['description']); ?></p>
                                    <p class="shop-author">By <?php echo htmlspecialchars($item['username']); ?></p>
                                    <p class="shop-price"><?php echo $item['price'] == 0 ? 'Free' : '$' . number_format($item['price'], 2); ?></p>
                                    <?php if (in_array($item['id'], $basket_ids)): ?>
                                        <a href="basket.php" class="button">View in Basket</a>
                                    <?php else: ?>
                                        <form method="POST" action="basket_add.php">
                                            <input type="hidden" name="item_id"  value="<?php echo $item['id']; ?>">
                                            <input type="hidden" name="title"    value="<?php echo htmlspecialchars($item['title']); ?>">
                                            <input type="hidden" name="price"    value="<?php echo $item['price']; ?>">
                                            <button type="submit" class="button">Add to Basket</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <div class="line"></div>
                    <div class="basket-link">
                        <a href="basket.php" class="button">
                            View Basket
                            <?php if (!empty($_SESSION['basket'])): ?>
                                (<?php echo count($_SESSION['basket']); ?>)
                            <?php endif; ?>
                        </a>
                    </div>
                </section>
            </div>

        </div>
    </main>

    <footer>
        <p>&copy; 2026 Kerbal Space Program Fan Site. All rights reserved.</p>
        <a href="https://github.com/Filo07">Developer GitHub</a>
    </footer>

    <script>
        function fetchMessages() {
            fetch('chat_fetch.php')
                .then(res => res.json())
                .then(messages => {
                    const box = document.getElementById('chatbox');
                    box.innerHTML = messages.map(m => `
                        <div class="chat-message">
                            <strong>${m.username}</strong>
                            <span class="chat-time">${new Date(m.created_at).toLocaleTimeString()}</span>
                            <p>${m.message}</p>
                        </div>
                    `).join('');
                    box.scrollTop = box.scrollHeight;
                });
        }

        function sendMessage() {
            const input = document.getElementById('messageInput');
            const message = input.value.trim();
            if (!message) return;

            fetch('chat_send.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'message=' + encodeURIComponent(message)
            }).then(() => {
                input.value = '';
                fetchMessages();
            });
        }

        document.getElementById('messageInput').addEventListener('keydown', e => {
            if (e.key === 'Enter') sendMessage();
        });

        fetchMessages();
        setInterval(fetchMessages, 3000);

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