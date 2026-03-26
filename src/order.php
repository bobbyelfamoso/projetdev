<?php
$page_title = 'Order - Pure Matcha';
$page_css = 'order';
include 'includes/header.php'; ?>

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
