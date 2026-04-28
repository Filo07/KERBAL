<?php
session_start();
require_once 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, 'SELECT id, username, password, userlevel FROM tbl_kerbal WHERE username = ?');
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        mysqli_query($conn, "UPDATE tbl_kerbal SET lastlogin = CURRENT_TIMESTAMP WHERE id = {$user['id']}");
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['username']  = $user['username'];
        $_SESSION['userlevel'] = $user['userlevel'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="form.css">
<html>
<head><title>Login</title></head>
    <body>
        <div class="stars-1"></div>
        <div class="stars-2"></div>
        <div class="stars-3"></div>

        <section>
            <?php if ($error) echo "<p>$error</p>"; ?>

                <form method="POST">
                    <h1>LOGIN</h1>
                    <label><input type="text" name="username" placeholder="Enter your username" required></label><br><br>
                    <label><input type="password" name="password" placeholder="Enter your password" required></label><br><br>
                    <button type="submit">Login</button>
                    <p>No account? <a href="register.php">Register here</a></p>
                </form>
        </section>
    </body>
</html>