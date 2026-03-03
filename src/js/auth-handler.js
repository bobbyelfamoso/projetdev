// 1. On récupère l'élément du bouton de connexion par son ID
const clic = document.getElementById('click');

// 2. On écoute le clic sur ce bouton
clic.addEventListener('click', (event) => {
    // Empêche le formulaire de recharger la page
    event.preventDefault();

    // TODO: Récupérer les éléments input pour l'email et le mot de passe

    // TODO: Extraire la valeur (.value) de ces inputs

    // TODO: Utiliser fetch() pour envoyer les données au fichier PHP (login.php)

    // TODO: Traiter la réponse (si OK -> stocker le token et rediriger)
});
