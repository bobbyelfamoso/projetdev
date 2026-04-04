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

let bouton = document.documentElementbyClassName('.add-to-cart-btn');
let texteInitial = bouton.textContent;

bouton.addEventListener("mouseover", () => { bouton.style.background = "#9ccc65"; bouton.textContent = "I WANT IT!"; });

bouton.addEventListener("mouseout", () => { bouton.style.background = "#2e4f21"; bouton.textContent = texteInitial; });
