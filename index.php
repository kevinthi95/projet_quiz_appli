<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de saisie des informations - Confirmation</title>
    <link rel="stylesheet" type="text/css" href="projetinfo1formulaire.css">
    <script>
        // Fonction pour masquer le message après quelques secondes et rediriger
        function hideMessageAndRedirect1() {
            var messageContainer = document.getElementById('message-container');
            setTimeout(function() {
                messageContainer.style.display = 'none';
                window.location.href = "page_formulaire_inscrit.html"; // Redirection vers la page principale
            }, 5000); // 5000 ms = 5 secondes
        }
        function hideMessageAndRedirect2() {
            var messageContainer = document.getElementById('message-container');
            setTimeout(function() {
                messageContainer.style.display = 'none';
                window.location.href = "projetinfo1page_principal.html"; // Redirection vers la page principale
            }, 5000); // 5000 ms = 5 secondes
        }
        function hideForm() {
            var form = document.querySelector('form');
            form.style.display = 'none';
        }
    </script>
</head>
<body>
    <h1>Formulaire de saisie des informations</h1>
    <?php
    // Vérifie si l'utilisateur est déjà enregistré
    $file = 'utilisateurs.txt';
    if (file_exists($file) && isset($_POST['email']) && strpos(file_get_contents($file), $_POST['email']) !== false) {
        // Affiche le message d'inscription déjà existante
        echo '<div id="message-container">Vous êtes déjà inscrit.</div>';
        echo '<script>hideForm(); hideMessageAndRedirect1();</script>'; // Appelle la fonction pour masquer le formulaire et le message, puis rediriger
        exit; // Arrête l'exécution du reste de la page
    }

    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupère les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $pays = $_POST['pays'];
        $passions = $_POST['passions'];

        // Formatte les données pour les enregistrer dans un fichier texte
        $data = "Nom: $nom\nPrénom: $prenom\nAdresse e-mail: $email\nMot de passe: $password\nÂge: $age\nPays: $pays\nPassions: $passions\n\n";

        // Ouvre le fichier en mode écriture
        $fp = fopen($file, 'a');

        // Écrit les données dans le fichier
        fwrite($fp, $data);

        // Ferme le fichier
        fclose($fp);

        // Affiche le message de confirmation
        echo '<div id="message-container">Merci! Vos informations ont été enregistrées avec succès.</div>';
        echo '<script>hideForm(); hideMessageAndRedirect2();</script>'; // Appelle la fonction pour masquer le formulaire et le message, puis rediriger
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" minlength="1" maxlength="30" required placeholder="Entrez votre nom"><br><br>
                
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required placeholder="Entrez votre prénom"><br><br>

            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required placeholder="email@gmail.com"><br><br>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required placeholder="mot de passe"><br><br>

            <label for="age">Âge :</label>
            <input type="number" id="age" name="age" min="0" required placeholder="18"><br><br>

            <label for="pays">Pays :</label>
            <select id="pays" name="pays" required>
                <option value="">Sélectionnez votre pays</option>
                <option value="france">🇫🇷 France</option>
                <option value="belgique">🇧🇪 Belgique</option>
                <option value="suisse">🇨🇭 Suisse</option>
                <option value="espagne">🇪🇸 Espagne</option>
                <option value="allemagne">🇩🇪 Allemagne</option>
                <option value="royaume-uni">🇬🇧 Royaume-Uni</option>
                <option value="italie">🇮🇹 Italie</option>
                <option value="monaco">🇲🇨 Monaco</option>
                <option value="luxembourg">🇱🇺 Luxembourg</option>
                <option value="portugal">🇵🇹 Portugal</option>
                <option value="maroc">🇲🇦 Maroc</option>
                <option value="tunisie">🇹🇳 Tunisie</option>
            </select><br><br>

            <label for="passions">Passions :</label><br>
            <input type="text" id="passions" name="passions" placeholder="Entrez vos passions séparées par des virgules"><br><br>
                
            <br><br>
            
            <input type="submit" value="Soumettre"> <br><br>
            <p>Cliquez sur le lien ci-dessous si vous êtes déjà inscrit :</p>
            <a href="page_formulaire_inscrit.html">Inscrit</a>
            <br><br>
            <a href="projetinfo1page_principal.html">Retour à la page principale</a>
    </form>
</body>
</html>

