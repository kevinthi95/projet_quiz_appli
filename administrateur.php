<?php
session_start(); // Démarre la session

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Utiliser $user_id pour personnaliser le contenu de la page ou pour toute autre fonctionnalité
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: index.php");
    exit;
}

// Vérifie si le code d'accès a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['code'])) {
    $code = $_POST['code'];

    // Vérifie si le code est correct
    if ($code === "1234") {
        $_SESSION['admin'] = true; // Marque l'utilisateur comme administrateur
    } else {
        echo '<div id="message">Code incorrect. Veuillez réessayer.</div>';
    }
}

// Vérifie si l'utilisateur est connecté en tant qu'administrateur
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    // Le code ci-dessous est accessible uniquement aux administrateurs
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
        // Traitement pour bloquer l'accès au quiz
        $email = $_POST['email'];
        $filename = 'donnees/' . $email . '.txt';

        // Vérifie si le fichier de l'utilisateur existe
        if (file_exists($filename)) {
            // Lit le contenu du fichier de l'utilisateur
            $userData = file_get_contents($filename);

            // Vérifie si l'accès au quiz est déjà bloqué pour cet utilisateur
            if (strpos($userData, 'Accès:non') !== false) {
                echo '<div id="message">Accès au quiz déjà bloqué pour l\'utilisateur avec l\'email: ' . $email . '</div>';
            } else {
                // Met à jour l'attribut "Accès" dans le fichier de l'utilisateur
                $userData = preg_replace('/Accès:(.*)/', 'Accès:non', $userData);

                // Écrit le contenu mis à jour dans le fichier
                file_put_contents($filename, $userData);

                echo '<div id="message">Accès au quiz bloqué pour l\'utilisateur avec l\'email: ' . $email . '</div>';
            }
        } else {
            echo '<div id="message">Utilisateur non trouvé.</div>';
        }
    }
}

  else {
    // Si l'utilisateur n'est pas connecté en tant qu'administrateur, affiche le formulaire de saisie du code
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page administrateur</title>
</head>
<body>
    <h1>Page administrateur</h1>
    <form method="post">
        <label for="code">Entrez le code d'accès:</label>
        <input type="password" name="code" id="code" required>
        <button type="submit">Valider</button>
    </form>
    <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>">Retour à la page principale</a>
</body>
</html>
<?php
    // Termine le script
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page administrateur</title>
</head>
<body>
    <h1>Page administrateur</h1>
    <!-- Contenu accessible uniquement aux administrateurs -->
    <form method="post">
        <label for="email">Choisir un utilisateur:</label>
        <select name="email" id="email" required>
            <?php
            // Lit le fichier utilisateurs.txt pour obtenir la liste des emails
            $filename = 'utilisateurs.txt';
            if (file_exists($filename)) {
                $users = file($filename);
                foreach ($users as $user) {
                    $userInfo = explode(';', $user);
                    echo '<option value="' . trim($userInfo[0]) . '">' . trim($userInfo[0]) . '</option>';
                }
            }
            ?>
        </select>
        <button type="submit">Bloquer l'accès au quiz</button>
    </form>
    <h2>Débloquer un utilisateur</h2>
    <form method="post">
        <label for="email-debloquer">Choisir un utilisateur à débloquer:</label>
        <select name="email" id="email-debloquer" required>
            <?php
            // Lit le fichier utilisateurs.txt pour obtenir la liste des emails
            $filename = 'utilisateurs.txt';
            if (file_exists($filename)) {
                $users = file($filename);
                foreach ($users as $user) {
                    $userInfo = explode(';', $user);
                    echo '<option value="' . trim($userInfo[0]) . '">' . trim($userInfo[0]) . '</option>';
                }
            }
            ?>
        </select>
        <button type="submit">Débloquer l'accès au quiz</button>
    </form>
        </br>
    <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>">Retour à la page principale</a>
</body>
</html>
