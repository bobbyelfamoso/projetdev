async function loadProducts() {
    const container = document.getElementById('products-container');

    try {
        const response = await fetch('../api/get_products.php');
        const data = await response.json();

        if (data.success) {
            data.data.forEach(product => {
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
                                <button class="add-btn">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += productHTML;
            });

        } else {
            console.error("Erreur serveur :", data.error);
        }

    } catch (error) {
        console.error("Erreur lors de la requête :", error);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    loadProducts();
});
