<?php
include 'includes/init.php';
$page_title = 'Order - Pure Matcha';
$page_css = 'order';
include 'includes/db.php';
$user_id = $_SESSION['user_id'] ?? null;
$error = $_GET['error'] ?? null;

if (!$user_id) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->prepare("
    SELECT cart_items.*, products.name_product, products.price_product, products.category_product
    FROM cart_items 
    JOIN products ON cart_items.id_product = products.id_product 
    WHERE cart_items.id_user = ?
");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll();

if (empty($cart_items)) {
    header('Location: cart.php');
    exit;
}

$subtotal = 0;
foreach ($cart_items as $item) {
    $subtotal += $item['price_product'] * $item['qty'];
}
$shipping = 2.50;
$tax = 2.00;
$total = $subtotal + $shipping + $tax;
?>
<?php include 'includes/header.php'; ?>

    <main class="order-main">
        <div class="order-container">
            <div class="order-left-column">
                <div class="order-card shadow-card">
                    <h2>Shipping Details</h2>
                    <form class="shipping-form" method="POST" action="api/order/create.php">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" id="first-name" name="first_name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" id="last-name" name="last_name" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" placeholder="">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="zipcode">Zip Code</label>
                                <input type="text" id="zipcode" name="zipcode" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" placeholder="">
                        </div>
                </div>

                <div class="order-card shadow-card payment-section">
                    <h2>Payment</h2>
                    <div class="payment-options">
                        <button type="button" name="payment_method" value="paypal" class="payment-opt <?= $error ? 'error' : '' ?>">
                            <img src="img/Paypal_Logo2014.png" alt="PayPal">
                            <span>PayPal</span>
                        </button>

                        <button type="button" name="payment_method" value="card" class="payment-opt <?= $error ? 'error' : '' ?>">
                            <img src="img/Logo_CB-1-1024x503.png" alt="Credit Card">
                            <span>Credit Card</span>
                        </button>
                    </div>
                    <?php if ($error === 'no_payment'): ?>
                        <p class="payment-error">Please select a payment method</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="order-right-column">
                <div class="order-card order-summary-card">
                    <h2>Order Summary</h2>
                    <div class="summary-product">
                        <?php foreach ($cart_items as $item): ?>
                        <div class="product-info">
                            <span class="category-label"><?= htmlspecialchars($item['category_product']) ?></span>
                            <span class="product-name"><?= htmlspecialchars($item['name_product']) ?></span>
                            <span class="product-meta">Qty: <?= $item['qty'] ?></span>
                            <span class="product-meta"><?= number_format($item['price_product'] * $item['qty'], 2) ?>€</span>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="summary-details">
                        <div class="summary-line">
                            <span>Subtotal</span>
                            <span><?= number_format($subtotal, 2) ?>€</span>
                        </div>
                        <div class="summary-line">
                            <span>Shipping</span>
                            <span><?= number_format($shipping, 2) ?>€</span>
                        </div>
                        <div class="summary-line">
                            <span>Tax</span>
                            <span><?= number_format($tax, 2) ?>€</span>
                        </div>
                    </div>

                    <div class="summary-total">
                        <span>Total</span>
                        <span><?= number_format($total, 2) ?>€</span>
                    </div>

                    <?php foreach ($cart_items as $item): ?>
                        <input type="hidden" name="items[<?= $item['id_product'] ?>]" value="<?= $item['qty'] ?>">
                    <?php endforeach; ?>
                    <input type="hidden" name="total_order" value="<?= $total ?>">

                    <button type="submit" class="confirm-btn">Confirm Order</button>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
document.querySelectorAll('.payment-opt').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.payment-opt').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        
        let input = document.getElementById('selected_payment');
        if (!input) {
            input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'payment_method';
            input.id = 'selected_payment';
            document.querySelector('.shipping-form').appendChild(input);
        }
        input.value = btn.value;
    });
});
</script>

<?php include 'includes/footer.php'; ?>
