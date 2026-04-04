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

let bouton = document.querySelector('.add-to-cart-btn');
let texteInitial = bouton.textContent;

bouton.addEventListener("mouseover", () => { bouton.style.background = "#8a6747ff"; bouton.textContent = "I WANT IT!"; });

bouton.addEventListener("mouseout", () => { bouton.style.background = "#F28C28"; bouton.textContent = texteInitial; });
