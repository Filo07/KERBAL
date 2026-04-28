<?php
session_start();
require_once 'db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    
    $stmt = mysqli_prepare($conn, 'SELECT id FROM tbl_kerbal WHERE username = ?');
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        $error = 'Username already taken.';
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt2 = mysqli_prepare($conn, 'INSERT INTO tbl_kerbal (username, password) VALUES (?, ?)');
        mysqli_stmt_bind_param($stmt2, 'ss', $username, $hashed);

        if (mysqli_stmt_execute($stmt2)) {
            $success = 'Account created! <a href="login.php">Login here</a>';
        } else {
            $error = 'Something went wrong. Please try again.';
        }
    }
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="form.css">
<html>
<head><title>Register</title></head>
    <body>
        <div class="stars-1"></div>
        <div class="stars-2"></div>
        <div class="stars-3"></div>

        <section>
            <?php if ($error)   echo "<p>$error</p>"; ?>
            <?php if ($success) echo "<p>$success</p>"; ?>

            <form method="POST">
                <h1>REGISTER</h1>
                <label><input type="text" name="username" placeholder="Enter your username" required></label><br><br>
                <label><input type="password" name="password" placeholder="Enter your password" required></label><br><br>
                <button type="submit">Register</button>
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </form>
        </section>
    </body>
</html>