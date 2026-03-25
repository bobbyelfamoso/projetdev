<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

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
                        <li class="active">All Products</li>
                        <li>Ceremonial Grade</li>
                        <li>Culinary Grade</li>
                        <li>Accessories</li>
                    </ul>
                </div>

                <div class="filter-section">
                    <h3>Price Range</h3>
                    <div class="price-slider-container">
                        <div class="price-labels">
                            <span>0€</span>
                            <span id="price-value">100€</span>
                        </div>
                        <input type="range" min="0" max="100" value="100" class="price-slider"
                            oninput="updatePrice(this.value)">
                    </div>
                </div>
            </aside>
        </div>

        <div class="products">

            <?php
            $stmt = $pdo->query("SELECT * FROM products");

            if (!$stmt) {
                echo "<p>Erreur lors de la récupération des produits.</p>";
            } else {
                while ($product = $stmt->fetch()) {
                    ?>

                    <div class="product1">
                        <div class="product-img">
                            <a href="Pdescription.php?id=<?= htmlspecialchars($product['id_product']) ?>">
                                <img src="<?= htmlspecialchars($product['image_path']) ?>"
                                    alt="<?= htmlspecialchars($product['name_product']) ?>">
                            </a>
                        </div>

                        <div class="productinfo">
                            <span class="category">
                                <?= htmlspecialchars($product['category_product']) ?>
                            </span>
                            <h3>
                                <?= htmlspecialchars($product['name_product']) ?>
                            </h3>
                            <p>
                                <?= htmlspecialchars($product['short_description']) ?>
                            </p>

                            <div class="productfooter">
                                <span class="price">
                                    <?= htmlspecialchars($product['price_product']) ?>€
                                </span>
                                <form method="POST" action="api/cart/create.php" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id_product']) ?>">
                                    <button type="submit" class="add-btn">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>

        </div>

    </section>

</main>

<?php include 'includes/footer.php'; ?>