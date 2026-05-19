<?php
$pdo = new PDO("mysql:host=localhost;dbname=chat", "user", "pass");
$stmt = $pdo->prepare("SELECT id, username, message FROM tbl_chat WHERE id > ? ORDER BY id ASC");
$stmt->execute([intval($_GET['last_id'])]);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));