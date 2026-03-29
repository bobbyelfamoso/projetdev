<?php
include 'includes/init.php';
$page_title = 'About Us - Pure Matcha';
$page_css = 'aboutus';
?>
<?php include 'includes/header-alt.php'; ?>
    <main>
        <section class="about-hero">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>About Us</h1>
                    <p class="hero-desc">
                        At Pure Matcha, we believe that the finest tea comes from a deep respect for tradition.
                        Our journey begins in Uji, Kyoto, where the art of matcha has been perfected over centuries.
                    </p>
                </div>
                <div class="hero-image-container">
                    <div class="decorative-box"></div>
                    <img src="img/1200x680.jpg" alt="Matcha Harvest" class="hero-img">
                </div>
            </div>
        </section>

        <section class="values-section">
            <div class="value-item">
                <div class="value-image">
                    <img src="img/iconvaleur1.png" alt="Japanese Heritage">
                </div>
                <div class="value-text">
                    <h2>Japanese Heritage</h2>
                    <p>
                        Our matcha is sourced from historic tea estates in Uji, Kyoto. Every leaf is picked by skilled
                        hands and stone-ground using traditional methods that preserve the soul of the tea. This heritage
                        is the red stamp of authenticity on every product we offer.
                    </p>
                </div>
            </div>

            <div class="value-item reverse">
                <div class="value-image">
                    <img src="img/iconvlauer2.png" alt="Mountain Purity">
                </div>
                <div class="value-text">
                    <h2>Mountain Purity</h2>
                    <p>
                        Grown at high altitudes where the air is crisp and the soil is nutrient-rich, our tea plants are
                        nourished by natural spring water and morning mists. This unique environment creates a flavor
                        profile that is naturally sweet and vibrant.
                    </p>
                </div>
            </div>

            <div class="value-item">
                <div class="value-image">
                    <img src="img/iconvaleur3.png" alt="Organic Quality" class="leaf-icon">
                </div>
                <div class="value-text">
                    <h2>Organic Excellence</h2>
                    <p>
                        We are committed to 100% organic farming. By avoiding synthetic pesticides and fertilizers, we
                        protect the biodiversity of the tea gardens and ensure that you receive the highest
                        concentration of antioxidants and nutrients.
                    </p>
                </div>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>
