<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once __DIR__ . '/db.php';

try {
    $categoryFilter = $_GET['category'] ?? null;
    
    if ($categoryFilter) {
        $sql = "SELECT * FROM products WHERE category_product = :category ORDER BY id_product ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['category' => $categoryFilter]);
    } else {
        $sql = "SELECT * FROM products ORDER BY id_product ASC";
        $stmt = $pdo->query($sql);
    }
    
    $products = $stmt->fetchAll();
    
    echo json_encode([
        "success" => true,
        "count" => count($products),
        "data" => $products
    ]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false, 
        "error" => "Erreur lors de la récupération des produits: " . $e->getMessage()
    ]);
}
?>
