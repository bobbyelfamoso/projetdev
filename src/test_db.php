<?php
require 'includes/init.php';
require 'includes/db.php';

// First, check the current columns
try {
    $stmt = $pdo->query('SELECT id_product, name_product, ingredients FROM products');
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($products);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
