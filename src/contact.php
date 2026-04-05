<?php
include 'includes/init.php';
$page_title = 'Contact Us - Pure Matcha';
$page_css = 'contact';
include 'includes/db.php';
$user_id = $_SESSION['user_id'] ?? null;
?>
<?php include 'includes/header.php'; ?>

<main class="contact-main">
    <h1 class="page-title">Contact Us</h1>

    <section class="contact-section">
        <div class="contact-grid">
            <div class="message-card">
                <h2>Send us a message</h2>
                <form class="contact-form" method="POST" action="api/contact/send.php">
                    <div class="form-group">
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" name="full_name" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Votre message..."></textarea>
                        <small id="char-info">
                            Nombre de caractères : <span id="comptagenum">0</span>
                        </small>
                    </div>

                    <button type="submit" class="send-btn">Send</button>
                </form>
            </div>

            <div class="info-column">
                <div class="info-section">
                    <h2>Our location</h2>
                    <p>123 Uji Tea Lane,<br>Kyoto District, Japan<br>Open for ceremony visits by appointment.</p>
                </div>

                <div class="info-section">
                    <h2>Customer Service</h2>
                    <p>hello@purematcha.com<br>+81 75-123-4567</p>
                </div>

                <div class="info-section">
                    <h2>Social Media</h2>
                </div>
            </div>
        </div>
    </section>

</main>
<script src="js/contact.js"></script>
<?php include 'includes/footer.php'; ?>