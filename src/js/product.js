var imageproduit = document.querySelector('.product-image-section');

addEventListener('mouseover', function () {
    imageproduit.style.transform = 'scale(1.1)';
})

addEventListener('mouseout', function () {
    imageproduit.style.transform = 'scale(1)';
})
