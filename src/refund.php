<?php
include 'includes/init.php';
$page_title = 'Refund Policy - Pure Matcha';
$page_css = 'refund';
include 'includes/db.php';
$user_id = $_SESSION['user_id'] ?? null;
?>
<?php include 'includes/header.php'; ?>

    <main>
        <section class="refund-hero">
            <p class="hero-subtitle">Customer Support</p>
            <h1>SAV & Returns</h1>
            <p class="hero-description">Encountered a problem? We are here to ensure your matcha ritual stays perfect.
            </p>
        </section>

        <section class="refund-content">
            <div class="refund-grid">
                <div class="guarantee-card">
                    <h2>Our Quality Guarantee</h2>
                    <p class="guarantee-intro">We take pride in the freshness of our Uji-harvested matcha. If your
                        product arrives damaged or isn't meeting our high standards, please let us know immediately.
                    </p>

                    <div class="steps-list">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-text">
                                <h3>Report within 14 days</h3>
                                <p>Contact us as soon as you notice an issue.</p>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-text">
                                <h3>Submit Proof</h3>
                                <p>Our team will ask for photos of the batch number or damage.</p>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div class="step-text">
                                <h3>Resolution</h3>
                                <p>We'll provide a replacement or full refund within 48h.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-card">
                    <h2>Report an Issue</h2>
                    <form class="report-form" method="POST" action="api/sav/create.php">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="order-id">Order ID</label>
                                <input type="text" name="order_id" id="order-id" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="issue-type">Issue Type</label>
                                <input type="text" name="issue-type" id="issue-type" placeholder="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder=""required>
                        </div>

                        <div class="form-group">
                            <label for="address">Adress</label>
                            <input type="text" name="address" id="address" placeholder=""required>
                        </div>

                        <div class="form-group">
                            <label for="description">Detailed Description</label>
                            <textarea name="description" id="description" required></textarea>
                            <input type="file" id="image" name="image" accept="image/png, image/jpeg" />
                        </div>

                        <button type="submit" class="submit-btn">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

<?php include 'includes/footer.php'; ?>
