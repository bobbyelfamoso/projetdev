<?php

include __DIR__ . '/../../includes/init.php';
include __DIR__ . '/../../includes/db.php';

$user_id = $_SESSION['user_id'] ?? null;
$id_cart_item = $_POST['id_cart_item'] ?? null;
$qty = $_POST['qty'] ?? null;

if ($user_id && $id_cart_item && $qty !== null && $qty > 0) {
    $stmt = $pdo->prepare("UPDATE cart_items SET qty = ? WHERE id_cart_item = ? AND id_user = ?");
    $stmt->execute([$qty, $id_cart_item, $user_id]);
}

header('Location: ../../cart.php');
exit;
?>
