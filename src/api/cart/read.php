<?php

include __DIR__ . '/../../../includes/db.php';
session_start();
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id ) {
    header('Location: ../../shopping.php');
    exit;
}

if ($user_id) {
    $stmt = $pdo->prepare("
        SELECT cart_items.*, products.name_product, products.price_product, products.image_path 
        FROM cart_items 
        JOIN products ON cart_items.id_product = products.id_product 
        WHERE cart_items.id_user = ?
    ");
    $stmt->execute([$user_id]);
    $items = $stmt->fetchAll();
    
    $_SESSION['cart'] = $items;
    header('Location: ../../cart.php');
    exit;
}

header('Location: ../../cart.php');
exit;
// TODO: ajout code pour localStorage (non-connecté)

?>
