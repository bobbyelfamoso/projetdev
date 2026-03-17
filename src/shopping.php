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
                        <input type="range"
                               min="0"
                               max="100"
                               value="100"
                               class="price-slider"
                               oninput="updatePrice(this.value)">
                    </div>
                </div>

            </aside>
        </div>

        <div class="products" id="products-container">
        </div>

    </section>

</main>

<script src="js/shopping.js"></script>

<?php include 'includes/footer.php'; ?>