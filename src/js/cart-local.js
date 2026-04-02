document.addEventListener('DOMContentLoaded', function() {
 var boutons = document.querySelectorAll('.js-add-to-cart');
    boutons.forEach(function(bouton) {
         bouton.addEventListener ('click', function() {
            var id = bouton.dataset.id;
            var panierlocal = localStorage.getItem('panier');
if (panierlocal !== null) {
 var panier = JSON.parse(panierlocal);
} else { 
   var panier = []}

   var produit = panier.find(function(item) {
    return item.id == id;
});
if (produit) {
    produit.qty = produit.qty + 1;
} else {
    panier.push({ id: id, qty: 1 });
}
localStorage.setItem('panier', JSON.stringify(panier));
alert('Produit ajouté au panier !');


    });

    });

});
