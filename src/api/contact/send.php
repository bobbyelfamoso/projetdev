<?php
include __DIR__ . '/../../includes/init.php';
include __DIR__ . '/../../includes/db.php';

$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

if (empty($full_name) || empty($email) || empty($message)) {
    header('Location: ../../contact.php?error=missing_fields');
    exit;
}

$stmt = $pdo->prepare("INSERT INTO contact_sheet (full_name, email_contact, message_contact, subject_contact) VALUES (?, ?, ?, ?)");
$stmt->execute([$full_name, $email, $message, $subject]);

header('Location: ../../contact.php?success=1');
exit;
?>
