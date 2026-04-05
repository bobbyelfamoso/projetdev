<?php

include_once __DIR__ . '/../../includes/init.php';
include_once __DIR__ . '/../../includes/db.php';

$user_id = $_SESSION['user_id'] ?? null;
$id_cart_item = $_POST['id_cart_item'] ?? null;
$product_id = $_POST['product_id'] ?? null;
$qty = $_POST['qty'] ?? null;

if ($user_id && $id_cart_item && $qty !== null) {
    if ($qty > 0) {
        $stmt = $pdo->prepare("UPDATE cart_items SET qty = ? WHERE id_cart_item = ? AND id_user = ?");
        $stmt->execute([$qty, $id_cart_item, $user_id]);
    } else {
        // suppr si qté est a 0 if quantity is 0
        $stmt = $pdo->prepare("DELETE FROM cart_items WHERE id_cart_item = ? AND id_user = ?");
        $stmt->execute([$id_cart_item, $user_id]);
    }
} elseif (!$user_id && $product_id && $qty !== null) {
    if ($qty > 0) {
        $_SESSION['panier'][$product_id] = (int) $qty;
    } else {
        // suppr si qté est a 0
        unset($_SESSION['panier'][$product_id]);
    }
}

header('Location: ../../cart.php');
exit;
?>