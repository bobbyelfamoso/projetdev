<?php
include 'includes/init.php';
$page_title = 'Shopping - Pure Matcha';
$page_css = 'shopping';
include 'includes/db.php';
$user_id = $_SESSION['user_id'] ?? null;
$category = $_GET['category'] ?? null;
if ($category) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE category_product = ?");
    $stmt->execute([$category]);
} else {
    $stmt = $pdo->query("SELECT * FROM products");
}
?>
<?php include 'includes/header.php'; ?>

<main>

    <section class="hero">
        <div class="firstelem">
            <p>Our selection</p>
        </div>
        <div class="secondelem">
            <h1>Quality Matcha, Crafted with Care</h1>
        </div>
        <div class="thirdtelem">
            <p>Inspired by Japanese Culture</p>
        </div>
    </section>

    <section class="shoppingpart">

        <div class="sidebar-container">
            <aside class="sidebar">
                <div class="filter-section">
                    <h3>Categories</h3>
                    <ul class="filter-list">
                        <li class="<?= !$category ? 'active' : '' ?>">
                            <a href="shopping.php">All Products</a>
                        </li>
                        <li class="<?= $category == 'Ceremonial Grade' ? 'active' : '' ?>">
                            <a href="shopping.php?category=Ceremonial Grade">Ceremonial Grade</a>
                        </li>
                        <li class="<?= $category == 'Limited Editions' ? 'active' : '' ?>">
                            <a href="shopping.php?category=Limited Editions">Limited Editions</a>
                        </li>
                        <li class="<?= $category == 'Discover' ? 'active' : '' ?>">
                            <a href="shopping.php?category=Discover">Discover</a>
                        </li>
                        <li class="<?= $category == 'Best Sellers' ? 'active' : '' ?>">
                            <a href="shopping.php?category=Best Sellers">Best Sellers</a>
                        </li>
                        <li class="<?= $category == 'Accessories' ? 'active' : '' ?>">
                            <a href="shopping.php?category=Accessories">Accessories</a>
                        </li>
                        <li class="<?= $category == 'Bundle & Offers' ? 'active' : '' ?>">
                            <a href="shopping.php?category=Bundle & Offers">Bundle & Offers</a>
                        </li>
                    </ul>
                </div>

                <div class="filter-section">
                    <h3>Price Range</h3>
                    <div class="price-slider-container">
                        <div class="price-labels">
                            <span id="price-value">100€</span>
                        </div>
                        <input type="range" min="0" max="100" value="0" class="price-slider" id="theslide">
                    </div>
                </div>
            </aside>
        </div>

        <div class="products">

            <?php
            if (!$stmt) {
                echo "<p>Erreur lors de la récupération des produits.</p>";
            } else {
                while ($product = $stmt->fetch()) {
                    ?>

                    <div class="product1">
                        <div class="product-img">
                            <a href="Pdescription.php?id=<?= $product['id_product'] ?>">
                                <img src="<?= $product['image_path'] ?>"
                                    alt="<?= $product['name_product'] ?>">
                            </a>
                        </div>

                        <div class="productinfo">
                            <span class="category">
                                <?=$product['category_product']?>
                            </span>
                            <h3>
                                <?=$product['name_product']?>
                            </h3>
                            <p>
                                <?=$product['short_description'] ?>
                            </p>

                            <div class="productfooter">
                                <span class="price">
                                    <?=$product['price_product']?>€
                                </span>

                                <?php if ($user_id): ?>
                                <form method="POST" action="api/cart/create.php" style="display:inline;">
                                    <input type="hidden" name="product_id"
                                        value="<?= $product['id_product'] ?>">
                                    <button type="submit" class="add-btn">Add to Cart</button>
                                </form>
                                <?php else: ?>
                                    <button type="button" class="add-btn js-add-to-cart" data-id="<?= $product['id_product'] ?>">Add to Cart</button>

                                <?php endif; ?>


                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>

        </div>

    </section>
<script src="js/shopping.js"></script>
<script src="js/cart-local.js"></script>
</main>

<?php include 'includes/footer.php'; ?>