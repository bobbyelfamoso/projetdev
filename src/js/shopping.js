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
