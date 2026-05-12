<?php
require_once 'asset.php';

if (!isLevel(5)) {
    http_response_code(403);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message']);
    if ($message === '') exit();

    global $conn;
    $stmt = mysqli_prepare($conn, "INSERT INTO tbl_chat (user_id, username, message) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'iss', $_SESSION['user_id'], $_SESSION['username'], $message);
    mysqli_stmt_execute($stmt);
}