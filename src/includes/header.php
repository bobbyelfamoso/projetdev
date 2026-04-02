<?php
include 'db.php';

$cart_count = 0;
if (isset($_SESSION['user_id'])) {
    $cart_stmt = $pdo->prepare("SELECT SUM(qty) FROM cart_items WHERE id_user = ?");
    $cart_stmt->execute([$_SESSION['user_id']]);
    $cart_count = $cart_stmt->fetchColumn() ?? 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Pure Matcha' ?></title>
    <link rel="stylesheet" href="css/base.css">
    <?php if (isset($page_css)): ?>
        <link rel="stylesheet" href="css/<?= $page_css ?>.css">
    <?php endif; ?>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
<script src="js/header.js"></script>

<header class="firstnavbar1">
    <nav class="firstnavbar">
        <a href="landingpage.php">Our Selection</a>
        <a href="landingpage.php">Our Story</a>
        <a href="shopping.php">Shopping</a>
        <?php if (isset($_SESSION['user_id'])): ?>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle">Mon Compte ▼</a>
            <div id="drop" class="dropdown-menu">
                <a href="my-orders.php">Mes Commandes</a>
                <a href="api/session/logout.php">Déconnexion</a>
            </div>
        </div>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
        <a href="cart.php" class="cart-link">
            <img src="img/Cart-Icon.png" class="cart-icon">
             <?php if (isset($_SESSION['user_id']) && $cart_count > 0): ?>
                <span class="cart-count"><?= $cart_count ?></span>
            <?php elseif (!isset($_SESSION['user_id'])): ?>
                <span class="cart-count" id="visitor-cart-count"></span>
            <?php endif; ?>
        </a>
    </nav>
</header>

<header class="secnavbar1">
    <div class="secnavbar">
        <a href="shopping.php?category=Discover">Discover</a>
        <a href="shopping.php?category=Best Sellers">Best Sellers</a>
        <a href="shopping.php?category=Limited Editions">Limited Editions</a>
        <a href="shopping.php?category=Bundle & Offers">Bundle & Offers</a>
    </div>
</header>