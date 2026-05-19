<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=chat", "user", "pass");
$pdo->prepare("INSERT INTO tbl_chat (username, message) VALUES (?, ?)")
    ->execute([$_SESSION['username'], htmlspecialchars($_POST['message'])]);