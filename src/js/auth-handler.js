

document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.querySelector('.cote-droit');
    const loginButton = document.querySelector('.log');
    const emailInput = document.getElementById('username');
    const passwordInput = document.getElementById('pass');

    if (loginButton) {
        loginButton.addEventListener('click', async (e) => {
            e.preventDefault();

            const email = emailInput.value;
            const password = passwordInput.value;

            try {
                const response = await fetch('../api/login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ email, password })
                });

                const data = await response.json();

                if (response.ok) {
                    console.log('Connexion réussie:', data);
                    localStorage.setItem('supabase_session', JSON.stringify(data));
                    alert('Connexion réussie !');
                    window.location.href = 'landingpage.html';
                } else {
                    console.error('Erreur:', data.error_description || data.error || 'Erreur inconnue');
                    alert('Erreur : ' + (data.error_description || data.error || 'Identifiants invalides'));
                }
            } catch (error) {
                console.error('Erreur réseau:', error);
                alert('Erreur de connexion au serveur.');
            }
        });
    }
});
