document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('visitor-cart');
    if (!container) return;
    
    const panierlocal = localStorage.getItem('panier');
    const panier = panierlocal ? JSON.parse(panierlocal) : [];
    
    if (panier.length === 0) {
        container.innerHTML = '<div class="empty-cart-message"><p>Your cart is empty</p><a href="shopping.php">Continue Shopping</a></div>';
        return;
    }
    
    const idsString = panier.map(p => p.id).join(',');
    
    fetch('api/cart/read.php?ids=' + idsString)
        .then(r => r.json())
        .then(produits => {
            let html = '<p class="login-notice">Pour modifier votre panier, veuillez vous <a href="login.php">connecter</a></p>';
            html += '<div class="cart-items">';
            
            produits.forEach(p => {
            const itemQty = panier.find(i => i.id == p.id_product)?.qty || 1;
    html += `<div class="cart-item">
        <div class="item-image"><img src="${p.image_path}" alt="${p.name_product}"></div>
        <div class="item-details"><h2>${p.name_product}</h2>
        <span class="item-id">ID: ${p.id_product}</span>
        <span class="item-price-label">Price: ${p.price_product}€</span></div>
        <div class="item-actions">
        <span class="item-total">${p.price_product * itemQty}€</span>
        </div></div>`;
});
            
            html += '</div>';
            container.innerHTML = html;
        });
});