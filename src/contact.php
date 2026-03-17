<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pure Matcha - Contact Us</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="firstnavbar1">
        <nav class="firstnavbar">
            <a href="landingpage.php">Our Selection</a>
            <a href="landingpage.php">Our Story</a>
            <a href="shopping.php">Shopping</a>
            <a href="login.php">Login</a>
            <a href="cart.php" class="cart-link">
                <img src="img/Cart-Icon.png" class="cart-icon">
            </a>
        </nav>
    </header>
    <header class="secnavbar1">
        <div class="secnavbar">
            <a>Discover</a>
            <a>New In</a>
            <a>Best Sellers</a>
            <a>Limited Editions</a>
            <a>Bundle & Offers</a>
        </div>
    </header>
    <main class="contact-main">
        <h1 class="page-title">Contact Us</h1>

        <section class="contact-section">
            <div class="contact-grid">
                <div class="message-card">
                    <h2>Send us a message</h2>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="full-name">Full Name</label>
                            <input type="text" id="full-name" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message"></textarea>
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

<?php include 'includes/footer.php'; ?>
