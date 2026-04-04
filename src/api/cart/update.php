<?php

include_once __DIR__ . '/../../includes/init.php';
include_once __DIR__ . '/../../includes/db.php';

$user_id = $_SESSION['user_id'] ?? null;
$id_cart_item = $_POST['id_cart_item'] ?? null;
$product_id = $_POST['product_id'] ?? null;
$qty = $_POST['qty'] ?? null;

if ($user_id && $id_cart_item && $qty !== null && $qty > 0) {
    $stmt = $pdo->prepare("UPDATE cart_items SET qty = ? WHERE id_cart_item = ? AND id_user = ?");
    $stmt->execute([$qty, $id_cart_item, $user_id]);
} elseif (!$user_id && $product_id && $qty !== null && $qty > 0) {
    if (isset($_SESSION['panier'][$product_id])) {
        $_SESSION['panier'][$product_id] = (int)$qty;
    }
}

header('Location: ../../cart.php');
exit;
?>
