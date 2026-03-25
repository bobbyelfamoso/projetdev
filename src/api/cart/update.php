<?php

include __DIR__ . '/../../includes/db.php';
session_start();
$user_id = $_SESSION['user_id'] ?? null;
$product_id = $_POST['product_id'] ?? null;
$qty = $_POST['qty'] ?? null;

if ($product_id) {
    $stmt = $pdo->prepare("UPDATE users SET $qty= ? WHERE user_id= ? ");
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
