<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "kerbal");
$stmt = mysqli_prepare($conn, "INSERT INTO tbl_chat (username, message) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $_SESSION['username'], htmlspecialchars($_POST['message']));
mysqli_stmt_execute($stmt);