document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le formulaire de se soumettre normalement

    var formData = new FormData(this); // Récupère les données du formulaire

    // Envoie les données du formulaire au script PHP de vérification
    fetch(this.action, {
        method: this.method,
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = "compte_utilisateur.html"; // Redirige vers la page du compte utilisateur
        } else {
            document.getElementById("message").innerText = "Adresse e-mail ou mot de passe incorrect.";
        }
    })
    .catch(error => {
        console.error('Erreur lors de la soumission du formulaire :', error);
    });
});
