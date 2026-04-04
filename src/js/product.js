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
