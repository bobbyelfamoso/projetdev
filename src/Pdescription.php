<?php include 'includes/header.php'; ?>

    <main class="product-main">
        <div class="back-link">
            <a href="shopping.php">
                <span class="arrow">↩</span> Back
            </a>
        </div>

        <h1 class="product-big-title">Ceremonial Grade Matcha</h1>

        <div class="product-hero">
            <div class="product-image-section">
                <div class="decorative-box"></div>
                <img src="img/secondsection.png" alt="Pure Matcha Product" class="product-img">
            </div>

            <div class="product-info-section">
                <div class="info-card">
                    <span class="category-label">Ceremonial</span>
                    <h2 class="product-title">Uji Signature Matcha</h2>
                    <p class="product-desc">
                        Experience the peak of Japanese tea craftsmanship with our Uji Signature Matcha.
                        Hand-picked during the first spring harvest, this ceremonial grade powder offers
                        a vibrant emerald color and a surprisingly sweet, creamy finish with no bitterness.
                    </p>
                </div>

                <div class="ingredients-section">
                    <p><strong>Ingredients :</strong> Camellia Sinensis Leaf Powder, L-Theanine, Natural Caffeine,
                        Polyphenols, Catechins</p>
                </div>

                <div class="purchase-section">
                    <span class="price">10.29$</span>
                    <div class="actions">
                        <button class="wishlist-btn">
                            <svg viewBox="0 0 24 24" width="24" height="24">
                                <path fill="#2E4F21"
                                    d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                            </svg>
                        </button>
                        <button class="add-to-cart-btn" onclick="location.href='cart.php'">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>

        <section class="details-section">
            <div class="usage-guide">
                <h3>How to use</h3>
                <p>Add 1-2g of matcha to hot (not boiling) water. Whisk until smooth and frothy. Enjoy as a tea or
                    latte.</p>
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
    </main>

<?php include 'includes/footer.php'; ?>
