<?php
require_once 'config.php';

header('Content-Type: application/json');

// Récupérer les données envoyées en JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (empty($email) || empty($password)) {
    echo json_encode(['error' => 'Email and password are required.']);
    exit;
}

// Appel à l'API Supabase Auth
$url = SUPABASE_URL . '/auth/v1/token?grant_type=password';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'email' => $email,
    'password' => $password
]));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'apikey: ' . SUPABASE_KEY,
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    echo $response; // Retourne le token et les infos utilisateur
} else {
    $errorData = json_decode($response, true);
    $errorMessage = $errorData['error_description'] ?? $errorData['msg'] ?? 'Authentication failed';
    echo json_encode(['error' => $errorMessage]);
}
?>