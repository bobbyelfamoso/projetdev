<?php
include 'includes/init.php';
$page_title = 'Mes Commandes - Pure Matcha';
$page_css = 'order';
include 'includes/db.php';
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->prepare("
    SELECT * FROM orders 
    WHERE id_user = ? 
    ORDER BY created_at DESC
");
$stmt->execute([$user_id]);
$orders = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

    <main class="order-main">
        <div class="order-container">
            <div class="order-card order-summary-card" style="width: 100%;">
                <h2>Mes Commandes</h2>
                
                <?php if (empty($orders)): ?>
                    <div class="empty-cart-message">
                        <p>You have no orders yet</p>
                        <div class="back-link">
                            <a href="shopping.php">
                                <span class="arrow">↩</span> Continue Shopping
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($orders as $order): ?>
                    <div class="summary-row" style="margin-bottom: 1rem; padding: 1rem; border: 1px solid #eee; border-radius: 8px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <strong>Commande #<?= $order['id_commandes'] ?></strong>
                                <br>
                                <span style="color: #888; font-size: 0.9rem;"><?= date('d/m/Y', strtotime($order['created_at'])) ?></span>
                            </div>
                            <div style="text-align: right;">
                                <strong style="color: #2E4F21;"><?= number_format($order['total_order'], 2) ?>€</strong>
                                <br>
                                <a href="order_confirmation.php?id=<?= $order['id_commandes'] ?>" style="color: #D4A373; font-size: 0.9rem;">Voir le détail</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
