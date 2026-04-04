<?php

include_once __DIR__ . '/../../includes/init.php';
include_once __DIR__ . '/../../includes/db.php';
$user_id = $_SESSION['user_id'] ?? null;
$product_id = $_POST['product_id'] ?? null;

if (!$product_id) {
    header('Location: ../../shopping.php');
    exit;
}

if ($user_id) {
    $stmt = $pdo->prepare("SELECT id_cart_item, qty FROM cart_items WHERE id_user = ? AND id_product = ?");
    $stmt->execute([$user_id, $product_id]);
    $existing_item = $stmt->fetch();

    if ($existing_item) {
        $new_qty = $existing_item['qty'] + 1;
        $stmt = $pdo->prepare("UPDATE cart_items SET qty = ? WHERE id_cart_item = ?");
        $stmt->execute([$new_qty, $existing_item['id_cart_item']]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO cart_items (id_product, id_user, qty) VALUES (?, ?, 1)");
        $stmt->execute([$product_id, $user_id]);
    }

    header('Location: ../../cart.php');
    exit;
}

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}
$_SESSION['panier'][$product_id] = ($_SESSION['panier'][$product_id] ?? 0) + 1;
header('Location: ../../cart.php');
exit;

?>