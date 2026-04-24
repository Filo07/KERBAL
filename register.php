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
<html>
<head><title>Register</title></head>
<body>

<h2>Create Account</h2>

<?php if ($error)   echo "<p>$error</p>"; ?>
<?php if ($success) echo "<p>$success</p>"; ?>

<form method="POST">
    <label>Username: <input type="text" name="username" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="login.php">Login here</a></p>

</body>
</html>