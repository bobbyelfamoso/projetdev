<?php
// 1. Autoriser les requêtes depuis ton frontend (CORS) et indiquer qu'on renvoie du JSON
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// 2. Inclure la connexion à la base de données
require_once __DIR__ . '/db.php';

try {
    // 3. Préparer la requête SQL
    // Si on reçoit une catégorie spécifique dans l'URL (ex: get_products.php?category=Discover), on filtre
    $categoryFilter = $_GET['category'] ?? null;
    
    if ($categoryFilter) {
        $sql = "SELECT * FROM products WHERE category_product = :category ORDER BY id_product ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['category' => $categoryFilter]);
    } else {
        // Sinon, on prend tous les produits
        $sql = "SELECT * FROM products ORDER BY id_product ASC";
        $stmt = $pdo->query($sql);
    }
    
    // 4. Récupérer les données sous forme de tableau
    $products = $stmt->fetchAll();
    
    // 5. Renvoyer les données en format JSON au JavaScript
    echo json_encode([
        "success" => true,
        "count" => count($products),
        "data" => $products
    ]);

} catch(PDOException $e) {
    // En cas d'erreur de la BDD, on renvoie une erreur JSON propre
    http_response_code(500);
    echo json_encode([
        "success" => false, 
        "error" => "Erreur lors de la récupération des produits: " . $e->getMessage()
    ]);
}
?>
