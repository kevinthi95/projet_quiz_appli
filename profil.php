<?php
session_start(); // Démarrage de la session

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo '<p>Vous devez être connecté pour voir cette page.</p>';
    echo '<a href="http://localhost:8888/projetinfo1formulaireinscrit.php">Se connecter</a> ou ';
    echo '<a href="http://localhost:8888/index.php">Créer un compte</a>';
    exit;
}

function formatPasswordForDisplay($password) {
    if (strlen($password) > 1) {
        return substr($password, 0, 1) . str_repeat('*', strlen($password) - 1);
    }
    return $password; // Gère le cas peu probable où le mot de passe serait d'un seul caractère
}

$user_id = $_SESSION['user_id'];

$file = 'utilisateurs.txt'; // Chemin vers le fichier des utilisateurs
// Vérifie si le fichier des utilisateurs existe
if (file_exists($file)) {
    // Lit le contenu du fichier des utilisateurs ligne par ligne
    $lines = file($file);
    
    // Parcourt chaque ligne du fichier des utilisateurs
    foreach ($lines as $line) {
        // Divise la ligne en colonnes en utilisant le point-virgule comme séparateur
        $columns = explode(';', $line);
        
        // Vérifie si l'ID de l'utilisateur correspond à celui stocké dans la session
        if (trim($columns[2]) === $user_id) {
            $email = trim($columns[0]); // Récupère l'email de la première colonne
            break; // Sort de la boucle après avoir trouvé l'email
        }
    }
}
$annexeFile = 'donnees/' . $email . '.txt';

// Chargement des données utilisateur
if (file_exists($annexeFile)) {
    $userData = file_get_contents($annexeFile);
    $displayData = $userData; // Copie des données pour l'affichage
    if (preg_match('/Password:\s*(.*)$/m', $userData, $matches)) {
        $passwordDisplay = formatPasswordForDisplay(trim($matches[1]));
        $displayData = str_replace($matches[1], $passwordDisplay, $userData);
    }
}


// Traitement du formulaire de mise à jour du mot de passe
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['current_password'])) {
    $current_password = strtolower(trim($_POST['current_password']));  // Assurez-vous de retirer les espaces
    $new_password = strtolower(trim($_POST['new_password']));  // Convertir en minuscules
    $confirm_password = strtolower(trim($_POST['confirm_password']));  // Convertir en minuscules

    if (file_exists($file)) {
        $lines = file($file);
        foreach ($lines as &$line) {
            $columns = explode(';', $line);
            if (trim($columns[2]) === trim($user_id)) {
                $stored_password = trim($columns[1]);
                if ($current_password === $stored_password) {
                    if ($new_password === $confirm_password) {
                        $line = str_replace($stored_password, $new_password, $line);
                        file_put_contents($file, implode('', $lines));
                        $message = "Mot de passe mis à jour avec succès.";
                    } else {
                        $message = "Les nouveaux mots de passe ne correspondent pas.";
                    }
                } else {
                    $message = "Mot de passe actuel incorrect.";
                }
                break;
            }
        }
    } else {
        $message = "Le fichier utilisateurs.txt n'existe pas.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'utilisateur</title>
    <link rel="stylesheet" href="profil.css">
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Profil de l'utilisateur</h1>
    </header>
    <div class="container">
        <pre><?php echo htmlspecialchars($userData); ?></pre>
    </div>
    <div class="update-form">
        <h2>Modifier votre mot de passe</h2>
        <form method="post">
            <label for="current-password">Mot de passe actuel:</label>
            <input type="password" id="current-password" name="current_password" required>
            <label for="new-password">Nouveau mot de passe:</label>
            <input type="password" id="new-password" name="new_password" required>
            <label for="confirm-password">Confirmer le nouveau mot de passe:</label>
            <input type="password" id="confirm-password" name="confirm_password" required>
            <button type="submit">Mettre à jour</button>
        </form>
        <?php if (!empty($message)) echo "<p>$message</p>"; ?>
    </div>
    <div class="footer">
         <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
    </div>

</body>
</html>
