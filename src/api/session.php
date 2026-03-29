<?php
include __DIR__ . '/includes/init.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $user_id = $_POST['user_id'] ?? null;
    
    if ($user_id) {
        $_SESSION['user_id'] = $user_id;
        echo json_encode(['success' => true, 'user_id' => $user_id]);
    } else {
        echo json_encode(['success' => false, 'error' => 'No user_id provided']);
    }
    
} elseif ($method === 'GET') {
    $user_id = $_SESSION['user_id'] ?? null;
    echo json_encode(['user_id' => $user_id]);
    
} elseif ($method === 'DELETE') {
    unset($_SESSION['user_id']);
    echo json_encode(['success' => true]);
}
?>
