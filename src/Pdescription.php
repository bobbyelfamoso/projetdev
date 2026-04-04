<?php
include_once 'includes/init.php';
include_once 'includes/db.php';
$user_id = $_SESSION['user_id'] ?? null;

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: shopping.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM products WHERE id_product = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    header('Location: shopping.php');
    exit;
}

$page_title = $product['name_product'] . ' - Pure Matcha';
$page_css = 'Pdescription';
?>
<?php include 'includes/header.php'; ?>

<main class="product-main">
    <div class="back-link">
        <a href="shopping.php">
            <span class="arrow">↩</span> Back
        </a>
    </div>

    <h1 class="product-big-title"><?= $product['name_product'] ?></h1>

    <div class="product-hero">
        <div class="product-image-section">
            <div class="decorative-box"></div>
            <img src="<?= $product['image_path'] ?>" alt="<?= $product['name_product'] ?>" class="product-img">
        </div>

        <div class="product-info-section">
            <div class="info-card">
                <span class="category-label"><?= $product['category_product'] ?></span>
                <h2 class="product-title"><?= $product['name_product'] ?></h2>
                <p class="product-desc">
                    <?= $product['long_description'] ?>
                </p>
            </div>

            <div class="ingredients-section">
                <p><strong>Ingredients :</strong> Camellia Sinensis Leaf Powder, L-Theanine, Natural Caffeine,
                    Polyphenols, Catechins</p>
            </div>

            <div class="purchase-section">
                <span class="price"><?= $product['price_product'] ?>€</span>
                <div class="actions">
                    <form method="POST" action="api/cart/create.php" style="display:inline;">
                        <input type="hidden" name="product_id" value="<?= $product['id_product'] ?>">
                        <button type="submit" class="add-to-cart-btn">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="details-section">
        <div class="usage-guide">
            <h3>How to use</h3>
            <p><?= $product['short_description'] ?></p>
        </div>

        <div class="product-details-list">
            <h3>Product's details</h3>
            <ul>
                <li><strong>Weight:</strong> 30g</li>
                <li><strong>Origin:</strong> Japan</li>
                <li><strong>Shelf life:</strong> 12 months</li>
            </ul>
        </div>
    </section>
    <script src="js/product.js"></script>

</main>

<?php include 'includes/footer.php'; ?>