<?php

include __DIR__ . '/../../includes/db.php';
include __DIR__ . '/../../includes/init.php';
$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $stmt = $pdo->prepare("
        SELECT cart_items.*, products.name_product, products.price_product, products.image_path 
        FROM cart_items 
        JOIN products ON cart_items.id_product = products.id_product 
        WHERE cart_items.id_user = ?
    ");
    $stmt->execute([$user_id]);
    $items = $stmt->fetchAll();
    
    $_SESSION['cart'] = $items;
    header('Location: ../../cart.php');
    exit;
}

elseif (!$user_id && isset($_GET['ids'])) {
    $ids = explode(',', $_GET['ids']);
    $placeho = implode(',', array_fill(0, count($ids), '?'));
    $product= $pdo->prepare("SELECT * FROM products WHERE id_product IN ($placeho)");
    $product->execute($ids);
    $products = $product->fetchAll();
    header('Content-Type: application/json');
    echo json_encode($products);
    }

    else {
        header('Content-Type: application/json');
        echo json_encode([]);
    }


exit;

?>
