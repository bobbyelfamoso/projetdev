var slider = document.getElementById('theslide');
var affichage = document.getElementById('price-value');
affichage.innerHTML = slider.value;

slider.oninput = function () {
    affichage.innerHTML = this.value + "€";
    var produits = document.querySelectorAll('.product1');

    produits.forEach(function (produit) {
        var prix = parseInt(produit.querySelector('.price').textContent);
        if (slider.value < prix) {
            produit.style.display = "none";
        } else {
            produit.style.display = "block";
        }
    })

};

var toutesLesImages = document.querySelectorAll('.product-img');
for (var i = 0; i < toutesLesImages.length; i++) {
    var image = toutesLesImages[i];
    image.addEventListener('mouseover', function () {
        this.style.transform = 'scale(1.1)';
        this.style.transition = 'transform 0.3s ease';
    });
    image.addEventListener('mouseout', function () {
        this.style.transform = 'scale(1)';
    });
}


