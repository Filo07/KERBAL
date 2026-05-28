<?php
$conn = mysqli_connect("localhost", "root", "", "kerbal");
$stmt = mysqli_prepare($conn, "SELECT id, username, message FROM tbl_chat WHERE id > ? ORDER BY id ASC");
$last_id = intval($_GET['last_id']);
mysqli_stmt_bind_param($stmt, "i", $last_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($messages);