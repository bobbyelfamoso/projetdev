<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Recettes - Pure Matcha</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/recipes.css">
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
            <a>Accesssories</a>
        </div>
    </header>

    <main>
        <section class="hero-recipes">
            <div class="hero-content">
                <p class="subtitle">The Matcha Kitchen</p>
                <h1>Culinary Artistry</h1>
                <p class="description">Elevate your daily ritual with our curated collection of matcha-infused
                    creations. From traditional ceremonies to modern fusion delights.</p>
            </div>
        </section>

        <section class="recipes-list">
            <div class="recipe-card">
                <div class="recipe-img">
                    <img src="img/matcharecipe.png" alt="Traditional Ritual">
                    <div class="tags">
                        <span>5min</span>
                        <span>Medium</span>
                    </div>
                </div>
                <div class="recipe-info">
                    <span class="recipe-category">Traditional Ritual</span>
                    <h2>The Classic Usucha</h2>
                    <p>Experience the meditative calm of the traditional thin tea ceremony. A vibrant, frothy bowl of
                        emerald green perfection that centers the mind.</p>
                    <button class="read-more">Read full recipe</button>
                </div>
            </div>

            <div class="recipe-card reverse">
                <div class="recipe-img">
                    <img src="img/white-chocolate-matcha-cookies-cover-1.jpg" alt="Matcha Cookies">
                    <div class="tags">
                        <span>5min</span>
                        <span>Medium</span>
                    </div>
                </div>
                <div class="recipe-info">
                    <span class="recipe-category">Sweet Treats</span>
                    <h2>White Chocolate Matcha Cookies</h2>
                    <p>Indulge in the perfect balance of earthy premium matcha and decadent white chocolate. These soft,
                        chewy delicacies are the ultimate afternoon treat.</p>
                    <button class="read-more">Read full recipe</button>
                </div>
            </div>

            <div class="recipe-card">
                <div class="recipe-img">
                    <img src="img/Matcharecipe2.png" alt="Matcha Fudge">
                    <div class="tags">
                        <span>15min</span>
                        <span>Easy</span>
                    </div>
                </div>
                <div class="recipe-info">
                    <span class="recipe-category">Sweet Treats</span>
                    <h2>Velvety Matcha Fudge</h2>
                    <p>Discover the smooth, melt-in-your-mouth texture of our signature matcha fudge. A concentrated
                        burst of antioxidant-rich flavor in every square.</p>
                    <button class="read-more">Read full recipe</button>
                </div>
            </div>
        </section>

        <div class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <span>...</span>
            <a href="#">5</a>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>
