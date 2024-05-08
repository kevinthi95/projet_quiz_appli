<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="http://localhost:8888/projetinfo1formulaireinscrit.css">
</head>
<body>
<?php
session_start(); // Démarrage de la session

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $file = 'utilisateurs.txt';
    if (file_exists($file)) {
        $lines = file($file);
        $updatedLines = [];
        $found = false;
        $redirectId = '';  // ID pour la redirection

        foreach ($lines as $line) {
            $columns = explode(';', $line);
            if (trim($columns[0]) === $email) {
                if (trim($columns[1]) === $password) {
                    // Vérifie s'il y a déjà un ID existant
                    if (isset($columns[2]) && trim($columns[2]) !== '') {
                        $redirectId = trim($columns[2]);  // Utilise l'ID existant
                    } else {
                        $redirectId = uniqid();  // Génère un nouvel ID si nécessaire
                        $line = rtrim($line) . ';' . $redirectId . PHP_EOL;
                    }
                    $found = true;
                }
            }
            $updatedLines[] = $line;
        }

        if ($found) {
            file_put_contents($file, implode('', $updatedLines));
            echo '<script>';
            echo 'setTimeout(function() { window.location.href = "http://localhost:8888/projetinfo1page_principal.php?id='.$redirectId.'"; }, 5000);';
            echo '</script>';
            echo '<div id="message">Connexion réussie. Redirection dans 5 secondes...</div>';
            $_SESSION['user_id'] = $redirectId;  // Stockez l'ID de l'utilisateur après une connexion réussie

            exit;
        } else {
            echo '<script>';
            echo 'setTimeout(function() { window.location.href = "http://localhost:8888/projetinfo1formulaireinscrit.php"; }, 5000);';
            echo '</script>';
            echo '<div id="message">Email non trouvé ou mot de passe incorrect. Redirection dans 5 secondes...</div>';
            exit;
        }
    } else {
        echo '<div id="message">Le fichier des utilisateurs n\'existe pas. Contactez l\'administrateur.</div>';
    }
}
?>


<h1>Connexion à votre compte</h1>
<form id="loginForm" method="post">
    <label for="email">Adresse e-mail :</label>
    <input type="email" id="email" name="email" required placeholder="Adresse mail"><br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required placeholder="Mot de passe"><br><br>
    <input type="submit" value="Se connecter"> <br><br>
    <a href="http://localhost:8888/index.php">Créer un nouveau compte</a>
</form>
<div id="message"></div>

</body>
</html>
