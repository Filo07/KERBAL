<?php
require_once 'asset.php';

global $conn;
$result = mysqli_query($conn, "SELECT username, message, created_at FROM tbl_chat ORDER BY created_at DESC LIMIT 50");

$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

header('Content-Type: application/json');
echo json_encode(array_reverse($messages));