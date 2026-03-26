<?php

include __DIR__ . '/../../includes/db.php';
session_start();

$user_id = $_SESSION['user_id'] ?? null;
$id_cart_item = $_POST['id_cart_item'] ?? null;

if ($user_id && $id_cart_item) {
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE id_cart_item = ? AND id_user = ?");
    $stmt->execute([$id_cart_item, $user_id]);
}

header('Location: ../../cart.php');
exit;
?>
