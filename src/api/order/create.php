<?php
include __DIR__ . '/../../includes/init.php';
include __DIR__ . '/../../includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit;
}
$user_id = $_SESSION['user_id'];
$items = $_POST['items'] ?? [];
$total_order = $_POST['total_order'] ?? 0;
$payment_method = $_POST['payment_method'] ?? null;

if (empty($items)) {
    header('Location: ../../cart.php');
    exit;
}

if (!$payment_method) {
    header('Location: ../../order.php?error=no_payment');
    exit;
}
$stmt = $pdo->prepare("INSERT INTO orders (created_at, total_order, id_user) VALUES (NOW(), ?, ?)");
$stmt->execute([$total_order, $user_id]);
$id_order = $pdo->lastInsertId('orders_id_commandes_seq');

foreach ($items as $id_product => $qty) {
    $stmt = $pdo->prepare("INSERT INTO order_items (id_order, id_product, qty) VALUES (?, ?, ?)");
    $stmt->execute([$id_order, $id_product, $qty]);
}
$stmt = $pdo->prepare("DELETE FROM cart_items WHERE id_user = ?");
$stmt->execute([$user_id]);

header('Location: ../../order_confirmation.php?id=' . $id_order);
exit;
?>