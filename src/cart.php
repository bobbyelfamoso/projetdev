<?php
include 'includes/init.php';
$page_title = 'Your Cart - Pure Matcha';
$page_css = 'cart';
include 'includes/db.php';
$user_id = $_SESSION['user_id'] ?? null;
$cart_items = [];
if ($user_id) {
    $stmt = $pdo->prepare("
        SELECT cart_items.*, products.name_product, products.price_product, products.image_path 
        FROM cart_items 
        JOIN products ON cart_items.id_product = products.id_product 
        WHERE cart_items.id_user = ?
    ");
    $stmt->execute([$user_id]);
    $cart_items = $stmt->fetchAll();
}
?>

<?php include 'includes/header.php'; ?>

    <main class="cart-main">
        <div class="cart-card">
            <h1 class="cart-title">Your Cart</h1>
           
            <?php if (!$user_id): ?>
                <div id="visitor-cart"></div>
                <script src="js/cart-display.js"></script>
            <?php endif; ?>
            <div class="cart-items">
                <?php if (empty($cart_items)): ?>
                    <div class="empty-cart-message">
                        <p>Your cart is empty</p>
                        <div class="back-link">
                            <a href="shopping.php">
                            <span class="arrow">↩</span> Continue Shopping
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <?php 
                    $subtotal = 0;
                    foreach ($cart_items as $item): 
                        $item_total = $item['price_product'] * $item['qty'];
                        $subtotal += $item_total;
                    ?>
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="<?= $item['image_path'] ?>" alt="<?= $item['name_product'] ?>">
                        </div>
                        <div class="item-details">
                            <h2><?= $item['name_product'] ?></h2>
                            <span class="item-id">ID: <?= $item['id_product'] ?></span>
                            <span class="item-price-label">Price: <?= number_format($item['price_product'], 2) ?>€</span>
                        </div>
                        <div class="item-actions">
                            <span class="item-total"><?= number_format($item_total, 2) ?>€</span>
                            <div class="quantity-selector">
                                <form method="POST" action="api/cart/update.php" style="display:inline;">
                                    <input type="hidden" name="id_cart_item" value="<?= $item['id_cart_item'] ?>">
                                    <input type="hidden" name="qty" value="<?= max(1, $item['qty'] - 1) ?>">
                                    <button type="submit" class="qty-btn">-</button>
                                </form>
                                <span class="qty-number"><?= $item['qty'] ?></span>
                                <form method="POST" action="api/cart/update.php" style="display:inline;">
                                    <input type="hidden" name="id_cart_item" value="<?= $item['id_cart_item'] ?>">
                                    <input type="hidden" name="qty" value="<?= $item['qty'] + 1 ?>">
                                    <button type="submit" class="qty-btn">+</button>
                                </form>
                            </div>
                            <form method="POST" action="api/cart/delete.php">
                                <input type="hidden" name="id_cart_item" value="<?= $item['id_cart_item'] ?>">
                                <button type="submit" class="remove-item-btn">Remove</button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($cart_items)): ?>
            <div class="cart-summary">
                <h3>Summary:</h3>
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span><?= number_format($subtotal, 2) ?>€</span>
                </div>
                <div class="summary-row">
                    <span>Shipping</span>
                    <span>2.50€</span>
                </div>
                <div class="summary-total">
                    <span>Total</span>
                    <span><?= number_format($subtotal + 2.50, 2) ?>€</span>
                </div>
            </div>

            <div class="cart-footer">
                <form method="POST" action="order.php">
                    <button type="submit" class="checkout-btn">Check Out</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>