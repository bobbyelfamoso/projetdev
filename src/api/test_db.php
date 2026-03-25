<?php
// On inclut le fichier db.php qui est maintenant dans le même dossier
require_once __DIR__ . '/../includes/db.php';

// Si on arrive ici, c'est que la connexion a réussi (sinon db.php aurait arrêté le script)
echo "<h1>✅ Connexion réussie à Supabase !</h1>";
echo "<p>Votre dossier API fonctionne correctement et peut communiquer avec PostgreSQL.</p>";
?>
