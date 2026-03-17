<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pure Matcha - Order History</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/order.css">
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

    <main class="order-main">
        <div class="order-container">
            <div class="order-left-column">
                <div class="order-card shadow-card">
                    <h2>Shipping Details</h2>
                    <form class="shipping-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" id="first-name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" id="last-name" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" placeholder="">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="zipcode">Zip Code</label>
                                <input type="text" id="zipcode" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" id="country" placeholder="">
                        </div>
                    </form>
                </div>

                <div class="order-card shadow-card payment-section">
                    <h2>Payment</h2>
                    <div class="payment-options">
                        <button class="payment-opt">
                            <img src="img/Paypal-Icon.png" alt="PayPal">
                            <span>PayPal</span>
                        </button>
                        <button class="payment-opt">
                            <img src="img/Card-Icon.png" alt="Credit Card">
                            <span>Credit Card</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="order-right-column">
                <div class="order-card order-summary-card">
                    <h2>Order Summary</h2>
                    <div class="summary-product">
                        <div class="product-info">
                            <span class="category-label">Category</span>
                            <span class="product-name">Product name</span>
                            <span class="product-meta">Qty: x</span>
                            <span class="product-meta">45.00$</span>
                        </div>
                    </div>

                    <div class="summary-details">
                        <div class="summary-line">
                            <span>Subtotal</span>
                            <span>45.00$</span>
                        </div>
                        <div class="summary-line">
                            <span>Shipping</span>
                            <span>5.00$</span>
                        </div>
                        <div class="summary-line">
                            <span>Tax</span>
                            <span>2.00$</span>
                        </div>
                    </div>

                    <div class="summary-total">
                        <span>Total</span>
                        <span>52.00$</span>
                    </div>

                    <button class="confirm-btn">Confirm Order</button>
                </div>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
