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

    <div class="header">
        <div class="header-nav">
            <a href="landingpage.php" style="text-decoration: none; color: inherit;">
                <p>Our Selection</p>
            </a>
            <a href="aboutus.php" style="text-decoration: none; color: inherit;">
                <p>Our Story</p>
            </a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="api/session/logout.php" style="text-decoration: none; color: inherit;">
                    <p>Logout</p>
                </a>
            <?php else: ?>
                <a href="login.php" style="text-decoration: none; color: inherit;">
                    <p>Login</p>
                </a>
            <?php endif; ?>
            <button class="shop-btn" onclick="location.href='shopping.php'">Shop here</button>
        </div>
    </div>