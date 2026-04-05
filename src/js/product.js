// Animation de zoom sur l'image principale de la page produit
var imageSection = document.querySelector('.product-image-section');
var imageImg = document.querySelector('.product-img');

if (imageSection && imageImg) {
    imageSection.addEventListener('mouseover', function () {
        imageImg.style.transform = 'scale(1.1)';
        imageImg.style.transition = 'transform 0.3s ease';
    });

    imageSection.addEventListener('mouseout', function () {
        imageImg.style.transform = 'scale(1)';
    });
}

// Changement de texte et de couleur sur l'unique bouton "Ajouter au panier"
let bouton = document.querySelector('.add-to-cart-btn');
if (bouton) {
    let texteInitial = bouton.textContent;

    bouton.addEventListener("mouseover", () => { 
        bouton.style.background = "#8a6747"; 
        bouton.textContent = "I WANT IT!"; 
    });

    bouton.addEventListener("mouseout", () => { 
        bouton.style.background = "#F28C28"; 
        bouton.textContent = texteInitial; 
    });
}
