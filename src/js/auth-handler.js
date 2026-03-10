// 1. On récupère l'élément du bouton de connexion par son ID
const clic = document.getElementById('click');

// 2. On écoute le clic sur ce bouton
clic.addEventListener('click', async (event) => {
    // Empêche le formulaire de recharger la page
    event.preventDefault();

    // Récupérer les éléments input pour l'email et le mot de passe
    const email = document.getElementById('username').value;
    const password = document.getElementById('pass').value;

    if (!email || !password) {
        alert("Please fill in all fields.");
        return;
    }

    try {
        // Utiliser fetch pour envoyer les données au PHP
        const response = await fetch('../api/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email, password })
        });

        const result = await response.json();

        if (result.error) {
            console.error('Error logging in:', result.error);
            alert('Login failed: ' + result.error);
        } else {
            console.log('User logged in successfully:', result);
            alert('Login successful!');
            // Rediriger vers la page d'accueil ou shopping
            window.location.href = 'shopping.html';
        }
    } catch (error) {
        console.error('Fetch error:', error);
        alert('An error occurred during login.');
    }
});
