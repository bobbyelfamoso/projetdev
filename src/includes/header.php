<?php
include_once 'init.php';
include_once 'db.php';

$user_id = $_SESSION['user_id'] ?? null;
$cart_count = 0;

if ($user_id) {
    $cart_stmt = $pdo->prepare("SELECT SUM(qty) FROM cart_items WHERE id_user = ?");
    $cart_stmt->execute([$user_id]);
    $cart_count = $cart_stmt->fetchColumn() ?? 0;
} else {
    $session_cart = $_SESSION['panier'] ?? [];
    $cart_count = array_sum($session_cart);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'Pure Matcha' ?></title>
    <link rel="icon" type="image/png" href="img/favicon1.png?v=1">
    <link rel="stylesheet" href="css/base.css">
    <?php if (isset($page_css)): ?>
        <link rel="stylesheet" href="css/<?= $page_css ?>.css">
    <?php endif; ?>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>

    <header class="firstnavbar1">
        <nav class="firstnavbar">
            <a href="landingpage.php">Our Selection</a>
            <a href="landingpage.php">Our Story</a>
            <a href="shopping.php">Shopping</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="dropdown">
                    <div style="display:flex; align-items:center; gap:0.5rem; height: 100%;">
                        <a href="order.php" style="margin:0; padding:0;">Mon Compte</a>
                        <span class="dropdown-arrow" onclick="document.getElementById('drop').classList.toggle('show-mobile'); event.stopPropagation();" style="cursor: pointer; padding: 0.5rem; font-size: 0.8rem;">▼</span>
                    </div>
                    <div id="drop" class="dropdown-menu">
                        <a href="order.php">Mes Commandes</a>
                        <a href="api/session/logout.php">Déconnexion</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
            <a href="cart.php" class="cart-link">
                <img src="img/Cart-Icon.png" class="cart-icon">
                <?php if ($cart_count > 0): ?>
                    <span class="cart-count"><?= $cart_count ?></span>
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