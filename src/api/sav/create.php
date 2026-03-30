<?php
include __DIR__ . '/../../includes/init.php';
include __DIR__ . '/../../includes/db.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit;
}
$user_id = $_SESSION['user_id'];
$email = $_POST['email'] ?? '';
$subject_sav = $_POST['subject_sav'] ?? '';
if (empty($email) || empty($subject_sav)) {
    header('Location: ../../refund.php?error=missing_fields');
    exit;
}
$stmt = $pdo->prepare("INSERT INTO sav (email, subject_sav, id_user) VALUES (?, ?, ?)");
$stmt->execute([$email, $subject_sav, $user_id]);
header('Location: ../../refund.php?success=1');
exit;
?>