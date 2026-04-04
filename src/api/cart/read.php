<?php
include_once __DIR__ . '/../../includes/init.php';
include_once __DIR__ . '/../../includes/db.php';
$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $stmt = $pdo->prepare("
        SELECT cart_items.*, products.name_product, products.price_product, products.image_path 
        FROM cart_items 
        JOIN products ON cart_items.id_product = products.id_product 
        WHERE cart_items.id_user = ?
    ");
    $stmt->execute([$user_id]);
    $cart_items = $stmt->fetchAll();
} else {
    $cart_items = [];
    $session_cart = $_SESSION['panier'] ?? [];
    if (!empty($session_cart)) {
        $ids = array_keys($session_cart);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id_product IN ($placeholders)");
        $stmt->execute($ids);
        $products = $stmt->fetchAll();

        foreach ($products as $p) {
            $cart_items[] = [
                'id_product' => $p['id_product'],
                'name_product' => $p['name_product'],
                'price_product' => $p['price_product'],
                'image_path' => $p['image_path'],
                'qty' => $session_cart[$p['id_product']]
            ];
        }
    }
}
return $cart_items;
