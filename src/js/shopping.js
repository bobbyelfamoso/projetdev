// 1. Fonction asynchrone pour récupérer et afficher les produits
async function loadProducts() {
    const container = document.getElementById('products-container');
    
    try {
        // La fameuse requête GET vers l'API
        const response = await fetch('../api/get_products.php');
        const data = await response.json();
        
        // Si la requête a réussi (success = true dans le PHP)
        if (data.success) {
            
            // On boucle sur tous les produits reçus
            data.data.forEach(product => {
                
                // On construit le HTML basique du produit
                const productHTML = `
                    <div class="product1">
                        <div class="product-img">
                            <img src="${product.image_path}" alt="${product.name_product}">
                        </div>
                        <div class="productinfo">
                            <span class="category">${product.category_product}</span>
                            <h3>${product.name_product}</h3>
                            <p>${product.short_description}</p>
                            <div class="productfooter">
                                <span class="price">${product.price_product}€</span>
                                <!-- Le bouton Ajouter au panier ne fait rien pour l'instant -->
                                <button class="add-btn">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                `;
                
                // On injecte ce HTML dans notre conteneur
                container.innerHTML += productHTML;
            });
            
        } else {
            console.error("Erreur serveur :", data.error);
        }
        
    } catch (error) {
        console.error("Erreur lors de la requête :", error);
    }
}

// 2. Lancer la fonction quand la page a fini de charger
document.addEventListener('DOMContentLoaded', () => {
    loadProducts();
});
