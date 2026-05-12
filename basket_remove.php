<?php
require_once 'asset.php';

if (!isLevel(5)) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['item_id']);

    if (isset($_SESSION['basket'])) {
        $_SESSION['basket'] = array_filter(
            $_SESSION['basket'],
            fn($item) => $item['id'] !== $id
        );
    }
}

header("Location: basket.php");
exit();