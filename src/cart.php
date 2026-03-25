<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- TODO: ajout code pour localStorage (non-connecté) -->
    <title>Pure Matcha - Your Cart</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="firstnavbar1">
        <nav class="firstnavbar">
            <a href="landingpage.php">Our Selection</a>
            <a href="landingpage.php">Our Story</a>
            <a href="shopping.php">Shopping</a>
            <a href="login.php">Login</a>
            <a href="cart.php" class="cart-link">
                <img src="img/Cart-Icon.png" class="cart-icon">
            </a>
        </nav>
    </header>
    <header class="secnavbar1">
        <div class="secnavbar">
            <a>Discover</a>
            <a>New In</a>
            <a>Best Sellers</a>
            <a>Limited Editions</a>
            <a>Bundle & Offers</a>
        </div>
    </header>

    <main class="cart-main">
        <div class="cart-card">
            <h1 class="cart-title">Your Cart</h1>

            <div class="cart-items">
                <div class="cart-item">
                    <div class="item-image">
                        <img src="img/Matcharecipe.png" alt="Product">
                    </div>
                    <div class="item-details">
                        <h2>Product</h2>
                        <span class="item-id">ID: XXXXX123</span>
                        <span class="item-price-label">Price: 50.00£</span>
                    </div>
                    <div class="item-actions">
                        <span class="item-total">50.00£</span>
                        <div class="quantity-selector">
                            <button type="button" class="qty-btn">+</button>
                            <span class="qty-number">1</span>
                            <button type="button" class="qty-btn">-</button>
                        </div>
                    </div>
                </div>

                <div class="cart-item">
                    <div class="item-image">
                        <img src="img/Matcharecipe2.png" alt="Product">
                    </div>
                    <div class="item-details">
                        <h2>Product</h2>
                        <span class="item-id">ID: XXXXX123</span>
                        <span class="item-price-label">Price: 50.00£</span>
                    </div>
                    <div class="item-actions">
                        <span class="item-total">50.00£</span>
                        <div class="quantity-selector">
                            <button type="button" class="qty-btn">+</button>
                            <span class="qty-number">1</span>
                            <button type="button" class="qty-btn">-</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart-summary">
                <h3>Summary:</h3>
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>100.00£</span>
                </div>
                <div class="summary-row">
                    <span>Shipping</span>
                    <span>2.50£</span>
                </div>
                <div class="summary-total">
                    <span>Total</span>
                    <span>102.50£</span>
                </div>
            </div>

            <div class="cart-footer">
                <button class="checkout-btn">Check Out</button>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
