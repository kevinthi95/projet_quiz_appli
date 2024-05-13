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
echo"$user_id";
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
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];


    // Vérifier si le fichier utilisateurs.txt existe
    if (file_exists($file)) {
        // Lire chaque ligne du fichier
        $lines = file($file);

        // Parcourir chaque ligne
        foreach ($lines as &$line) {
            // Séparer la ligne en colonnes en utilisant le point-virgule comme séparateur
            $columns = explode(';', $line);

            // Vérifier si l'ID de l'utilisateur correspond à celui de la session
            if ($columns[2] === $user_id) {
                // Récupérer le mot de passe actuel de l'utilisateur dans le fichier
                $stored_password = trim($columns[1]);
                echo "Mot de passe soumis : $current_password<br>";
                echo "Mot de passe extrait du fichier : " . $stored_password  . "<br>";


                // Vérifier si le mot de passe soumis correspond au mot de passe stocké dans le fichier
                if (password_verify($current_password, $stored_password)) {
                    // Vérifier si les nouveaux mots de passe correspondent
                    if ($new_password === $confirm_password) {
                        // Hasher le nouveau mot de passe
                        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                        // Mettre à jour le mot de passe dans le fichier
                        $line = str_replace($stored_password, $hashed_password, $line);
                        file_put_contents($file, implode('', $lines));

                        // Afficher un message de succès
                        $message = "Mot de passe mis à jour avec succès.";
                    } else {
                        // Afficher un message d'erreur si les nouveaux mots de passe ne correspondent pas
                        $message = "Les nouveaux mots de passe ne correspondent pas.";
                    }
                } else {
                    // Afficher un message d'erreur si le mot de passe actuel est incorrect
                    $message = "Mot de passe actuel incorrect.";
                }
                // Sortir de la boucle après avoir trouvé l'utilisateur correspondant
                break;
            }
        }
    } else {
        // Afficher un message d'erreur si le fichier utilisateurs.txt n'existe pas
        $message = "Le fichier utilisateurs.txt n'existe pas.";
    }
}
?>
