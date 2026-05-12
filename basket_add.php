<?php
require_once 'asset.php';

if (!isLevel(5)) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['item_id']);
    $title = $_POST['title'];
    $price = floatval($_POST['price']);

    if (!isset($_SESSION['basket'])) {
        $_SESSION['basket'] = [];
    }

    // Inga dubbletter i korgen
    foreach ($_SESSION['basket'] as $item) {
        if ($item['id'] === $id) {
            header("Location: community.php");
            exit();
        }
    }

    $_SESSION['basket'][] = [
        'id'    => $id,
        'title' => $title,
        'price' => $price
    ];
}

header("Location: community.php");
exit();