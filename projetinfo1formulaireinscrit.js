document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le formulaire de se soumettre 

    var formData = new FormData(this); // Récupère les données 

    // Envoie les données du formulaire au script PHP de vérif
    fetch(this.action, {
        method: this.method,
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = "compte_utilisateur.html"; // Redirige vers la page du compte 
        } else {
            document.getElementById("message").innerText = "Adresse e-mail ou mot de passe incorrect.";
        }
    })
    .catch(error => {
        console.error('Erreur lors de la soumission du formulaire :', error);
    });
});
