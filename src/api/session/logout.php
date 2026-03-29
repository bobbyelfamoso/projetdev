<?php
include __DIR__ . '/../../includes/init.php';
unset($_SESSION['user_id']);
header('Location: ../../landingpage.php');
exit;
?>
