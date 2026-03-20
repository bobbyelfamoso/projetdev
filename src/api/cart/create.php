<?php
header('Content-Type: application/json');
include __DIR__ . '/../../../includes/db.php';

$product_id = $_POST['product_id'] ?? null;

if (!$product_id) {
    echo json_encode(['success' => false, 'error' => 'No product']);
    exit;
}

$stmt = $pdo->prepare("INSERT INTO cart_items (id_product, qty) VALUES (?, 1)");
$stmt->execute([$product_id]);

header('Location: ../../cart.php');
exit;
?>
