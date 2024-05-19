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

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = trim($_POST['email']);  // Convertir l'email en minuscules pour correspondre à l'enregistrement
    $password = trim($_POST['password']);  // Assurez-vous de retirer les espaces indésirables

    $file = 'utilisateurs.txt';
    if (file_exists($file)) {
        $lines = file($file);
        $updatedLines = [];
        $found = false;
        $redirectId = '';  // ID pour la redirection

        foreach ($lines as $line) {
            $columns = explode(';', $line);
            if (trim($columns[0]) === $email && trim($columns[1]) === $password) {
                $redirectId = uniqid();  
                $columns[2] = $redirectId; // Mettre à jour avec le nouvel ID
                $line = implode(';', $columns) . PHP_EOL;
                $found = true;
            }
            $updatedLines[] = $line;
        }

       

        if ($found) {
            file_put_contents($file, implode('', $updatedLines));  // Écrire les lignes mises à jour dans le fichier
            echo '<script>';
            echo 'setTimeout(function() { window.location.href = "http://localhost:8888/projetinfo1page_principal.php?id='.$redirectId.'"; }, 3000);';
            echo '</script>';
            echo '<div id="message">Connexion réussie. Redirection dans 3 secondes...</div>';
            $_SESSION['user_id'] = $redirectId;
            exit;
        } else {
            echo '<div id="message">Email non trouvé ou mot de passe incorrect. Redirection dans 5 secondes...</div>';
            echo '<script>';
            echo 'setTimeout(function() { window.location.href = "http://localhost:8888/projetinfo1formulaireinscrit.php"; }, 5000);';
            echo '</script>';
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
