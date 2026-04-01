<?php
$page_title = 'Order Confirmation - Pure Matcha';
$page_css = 'confirmation';
include 'includes/init.php';
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$user_id = $_SESSION['user_id'];
$id_order = $_GET['id'] ?? null;
if (!$id_order) {
    header('Location: shopping.php');
    exit;
}

// rqt pour recup la commande
$stmt = $pdo->prepare("SELECT * FROM orders WHERE id_commandes = ? AND id_user = ?");
$stmt->execute([$id_order, $user_id]);
$order = $stmt->fetch();
if (!$order) {
    header('Location: shopping.php');
    exit;
}
// rqt pour recup les items de la commande
$stmt = $pdo->prepare("
    SELECT order_items.*, products.name_product, products.price_product, products.image_path 
    FROM order_items 
    JOIN products ON order_items.id_product = products.id_product 
    WHERE order_items.id_order = ?
");
$stmt->execute([$id_order]);
$order_items = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

    <main class="cart-main">
        <div class="cart-card">
            <h1 class="cart-title">Order Confirmed <span class="order-number">Order #<?= $id_order ?></span></h1>

            <div class="cart-items">
                <?php if (empty($order_items)): ?>
                    <div class="empty-cart-message">
                        <p>Order not Found</p>
                        <div class="back-link">
                            <a href="shopping.php">
                            <span class="arrow">↩</span> Continue Shopping
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <?php 
                    foreach ($order_items as $item): 
                        $item_total = $item['price_product'] * $item['qty'];
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
                            <span class="qty-number"><?= $item['qty'] ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($order_items)): ?>
            <div class="order-total">
                <span>Total</span>
                <span><?= number_format($order['total_order'], 2) ?>€</span>
            </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>