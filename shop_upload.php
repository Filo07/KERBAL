<?php
require_once 'asset.php';

if (!isLevel(5)) {
    header("Location: login.php");
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title       = fix($_POST['title']);
    $description = fix($_POST['description']);
    $price       = floatval($_POST['price']);
    $file        = $_FILES['file'];

    // Allowed file types
    $allowed = ['zip', 'rar', 'pdf', 'craft'];
    $ext     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        $error = "File type not allowed. Allowed: zip, rar, pdf, craft";
    } elseif ($file['size'] > 20 * 1024 * 1024) {
        $error = "File too large. Max 20MB.";
    } else {
        $upload_dir = 'uploads/shop/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

        $filename  = uniqid() . '_' . basename($file['name']);
        $file_path = $upload_dir . $filename;

        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            global $conn;
            $stmt = mysqli_prepare($conn, "INSERT INTO tbl_shop (user_id, username, title, description, price, file_path) VALUES (?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, 'isssds', $_SESSION['user_id'], $_SESSION['username'], $title, $description, $price, $file_path);
            mysqli_stmt_execute($stmt);
            $success = "Item uploaded successfully!";
        } else {
            $error = "File upload failed, try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
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
            <section>
                <h1>Upload Item</h1>
                <div class="line"></div>
                <?php if ($error)   echo "<p style='color:red;'>$error</p>"; ?>
                <?php if ($success) echo "<p style='color:green;'>$success</p>"; ?>
                <form method="POST" enctype="multipart/form-data">
                    <label><input type="text" name="title" placeholder="Title" required></label><br><br>
                    <label><textarea name="description" placeholder="Description"></textarea></label><br><br>
                    <label><input type="number" name="price" placeholder="Price (0 = free)" step="0.01" min="0" value="0"></label><br><br>
                    <label><input type="file" name="file" required></label><br><br>
                    <button type="submit">Upload</button>
                    <p><a href="community.php">← Back to Community</a></p>
                </form>
            </section>
        </div>
    </main>
    <script src="header.js" defer></script>
</body>
</html>