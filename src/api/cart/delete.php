<?php

include_once __DIR__ . '/../../includes/init.php';
include_once __DIR__ . '/../../includes/db.php';

$user_id = $_SESSION['user_id'] ?? null;
$id_cart_item = $_POST['id_cart_item'] ?? null;

if ($user_id && $id_cart_item) {
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE id_cart_item = ? AND id_user = ?");
    $stmt->execute([$id_cart_item, $user_id]);
} elseif (isset($_POST['product_id'])) {
    unset($_SESSION['panier'][$_POST['product_id']]);
}

header('Location: ../../cart.php');
exit;
?>