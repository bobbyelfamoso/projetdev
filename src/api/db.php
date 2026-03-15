<?php
// On récupère le chemin absolu du fichier .env (qui se trouve à la racine)
$envFile = __DIR__ . '/../../.env';

if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value, " \t\n\r\0\x0B\"");
        
        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

$host = $_ENV['DB_HOST'] ?? '';
$port = $_ENV['DB_PORT'] ?? '';
$dbname = $_ENV['DB_NAME'] ?? '';
$user = $_ENV['DB_USER'] ?? '';
$password = $_ENV['DB_PASS'] ?? '';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    
    // La variable $pdo sera disponible partout où db.php est inclus
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    // Si c'est pour une API, on renvoie une erreur propre en JSON
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Erreur de connexion à la base de données.']);
    exit;
}
?>
