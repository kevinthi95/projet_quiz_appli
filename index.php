<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de saisie des informations - Confirmation</title>
    <link rel="stylesheet" type="text/css" href="projetinfo1formulaire.css">
    <link rel="stylesheet" href="style.css">
    <script>
        // Fonction pour masquer le message après quelques secondes et rediriger, focntionne !
        function hideMessageAndRedirect1() {
            var messageContainer = document.getElementById('message-container');
            setTimeout(function() {
                messageContainer.style.display = 'none';
                window.location.href = "http://localhost:8888/projetinfo1formulaireinscrit.php"; 
            }, 5000); // 5000 ms = 5 secondes
        }

        function hideMessageAndRedirect2(userId) {//pas la bonne methode je pense, fonctionne moyennement
            var messageContainer = document.getElementById('message-container');
            setTimeout(function() {
                messageContainer.style.display = 'none';
                window.location.href = "http://localhost:8888/projetinfo1page_principal.php?id=" + userId; 
            }, 5000); // 5000 ms = 5 secondes
        }
    </script>
</head>

<body>
    <?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récup l'e-mail 
    $email = strtolower(trim($_POST['email']));

    //  fichier utilisateurs existe
    $file = 'utilisateurs.txt';
    if (file_exists($file)) {
        // Lit chaque ligne de utilisateurs.txt
        $lines = file($file);

        // Parcourt chaque ligne
        foreach ($lines as $line) {
            // Sépare la ligne en colonnes en utilisant le point-virgule comme séparateur
            $columns = explode(';', $line);

            // Vérifie si la première colonne (l'adresse e-mail) correspond à l'e-mail soumis dans le formulaire
            if (strtolower(trim($columns[0])) === $email) {
                // Affiche le message d'inscription déjà existante
                echo '<div id="message-container">Vous êtes déjà inscrit.</div>';
                echo '<script>hideMessageAndRedirect1()</script>'; 
                exit; 
            }
        }
    }

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $pays = $_POST['pays'];
    $passions = $_POST['passions'];

    $user_id = uniqid(); // Définition de $user_id ici id unique

    // Formatte les données pour fichier texte
    $data = "$email;" . (trim($password)) . ";$user_id\n";

    // Enregistre les autres infos dans un fichier annexe
    $annexeData = "Nom:$nom\nPrénom:$prenom\nAdresse e-mail:$email\nÂge:$age\nPays:$pays\nPassions: $passions\nAccès:oui\n";

    // Nom des fichiers pour les autres infos
    $annexeFile = 'donnees/' . $email . '.txt'; // Utilise $user_id comme nom de fichier
    $messagesFile = 'message/' . $email . '.txt';

    // Ouvre le fichier en mode écriture
    $fp = fopen($file, 'a');

    fwrite($fp, $data);

    fclose($fp);

    // fait pareil pour message
    $messagesFp = fopen($messagesFile, 'w');
    fclose($messagesFp);
// enregistre infos
    $annexeFp = fopen($annexeFile, 'w');
    fwrite($annexeFp, $annexeData);
    fclose($annexeFp);

    // Stocker id dans une variable de session
    $_SESSION['user_id'] = $user_id; // $user_id est l'ID généré pour l'utilisateur 

    // Affiche le message de confirmation
    echo '<div id="message-container">Merci! Vos informations ont été enregistrées avec succès. Vous allez être redirigé</div>';
    echo '<script>hideMessageAndRedirect2("' . $user_id . '")</script>'; 
}
?>


<div class="form-container">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <p class="form-title">Nouveau compte</p>
            <div class="input-container">
                <input type="text" id="nom" name="nom" required placeholder="Entrez votre nom">
                <input type="text" id="prenom" name="prenom" required placeholder="Entrez votre prénom">
                <input type="email" id="email" name="email" required placeholder="email@gmail.com">
                <input type="password" id="password" name="password" required placeholder="Mot de passe">
                <input type="number" id="age" name="age" min="0" required placeholder="Âge">
                </br>
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
                <input type="text" id="passions" name="passions" placeholder="Entrez vos passions séparées par des virgules">
            </div>
            <button type="submit" class="submit">Soumettre</button>
            <p class="signup-link">Déjà inscrit? <a href="http://localhost:8888/projetinfo1formulaireinscrit.php">Connexion</a></p>
        </form>
    </div>
    </for>
</body>
</html>
