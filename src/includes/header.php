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

<header class="firstnavbar1">
    <nav class="firstnavbar">
        <a href="landingpage.php">Our Selection</a>
        <a href="landingpage.php">Our Story</a>
        <a href="shopping.php">Shopping</a>
        <?php if (isset($_SESSION['user_id'])): ?>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle">Mon Compte ▼</a>
            <div class="dropdown-menu">
                <a href="my-orders.php">Mes Commandes</a>
                <a href="api/session/logout.php">Déconnexion</a>
            </div>
        </div>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
        <a href="cart.php" class="cart-link">
            <img src="img/Cart-Icon.png" class="cart-icon">
        </a>
    </nav>
</header>

<header class="secnavbar1">
    <div class="secnavbar">
        <a>Discover</a>
        <a>Best Sellers</a>
        <a>Limited Editions</a>
        <a>Bundle & Offers</a>
    </div>
</header>