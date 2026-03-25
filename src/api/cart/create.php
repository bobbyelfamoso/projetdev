<?php 

include __DIR__ . '/../../includes/db.php';
session_start();
$user_id = $_SESSION['user_id'] ?? null;
$product_id = $_POST['product_id'] ?? null;

if (!$product_id ) {
    header('Location: ../../shopping.php');
    exit;
}

if ($user_id) {
    $stmt = $pdo->prepare("INSERT INTO cart_items (id_product, id_user, qty) VALUES (?, ?, 1)");
$stmt->execute([$product_id, $user_id]);
header('Location: ../../cart.php');
exit;
}

// TODO: ajout code pour localStorage (non-connecté)

header('Location: ../../cart.php?add=' . $product_id);
exit;
?>

