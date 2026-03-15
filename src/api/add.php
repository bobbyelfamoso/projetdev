<?php
// On indique qu'on renvoie du JSON
header('Content-Type: application/json');

// 1. On inclut la connexion à la base de données (db.php est maintenant dans le MÊME dossier)
require_once __DIR__ . '/db.php';

// À partir d'ici, on a accès à la variable $pdo !

try {
    // Exemple d'action 
    echo json_encode(['success' => true, 'message' => 'Fichier add.php appelé dans le dossier src/api/ avec succès !']);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erreur lors de l\'exécution : ' . $e->getMessage()]);
}
?>
