<?php
session_start(); // Démarre la session

// Vérifie si l'ID de l'utilisateur est présent dans la session
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Utiliser $user_id pour personnaliser le contenu de la page ou pour toute autre fonctionnalité
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: index.php");
    exit;
}

// Vérifie si l'utilisateur est connecté en tant qu'administrateur
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas un administrateur
    header("Location: index.php");
    exit;
}

function getMessagesByEmail($email) {
    $filename = 'message/' . $email . '.txt'; // Correction du chemin vers le fichier
    if (file_exists($filename)) {
        // Lire le contenu du fichier et renvoyer les messages
        return file($filename, FILE_IGNORE_NEW_LINES);
    } else {
        return array(); // Aucun message trouvé
    }
}

// Fonction pour récupérer les adresses e-mail des utilisateurs à partir du fichier utilisateur
function getUserEmails() {
    $userFile = 'utilisateurs.txt';
    if (file_exists($userFile)) {
        // Lire le contenu du fichier utilisateur et renvoyer les adresses e-mail
        $emails = array();
        $lines = file($userFile, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $columns = explode(';', $line);
            if (isset($columns[0])) {
                $emails[] = $columns[0];
            }
        }
        return $emails;
    } else {
        return array(); // Aucun utilisateur trouvé
    }
}

// Vérifie si le formulaire a été soumis avec une adresse e-mail sélectionnée
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_email'])) {
    $selectedEmail = $_POST['selected_email'];
    // Récupérer les messages de l'utilisateur sélectionné
    $messages = getMessagesByEmail($selectedEmail);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administration - Messagerie</title>
    <link rel="stylesheet" href="adminmess.css">
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Page d'administration - Messagerie</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="selected_email">Sélectionner l'utilisateur par son adresse e-mail :</label>
        <select name="selected_email" id="selected_email">
            <?php
            // Remplir le sélecteur avec les adresses e-mail des utilisateurs
            $emails = getUserEmails();
            foreach ($emails as $email) {
                echo '<option value="' . $email . '">' . $email . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Afficher les messages">
    </form>

    <?php if(isset($messages)) : ?>
        <h2>Messages de <?php echo $selectedEmail; ?></h2>
        <?php if(empty($messages)) : ?>
            <p>Aucun message trouvé pour cet utilisateur.</p>
        <?php else : ?>
            <ul>
                <?php
                $totalMessages = count($messages);
                foreach($messages as $index => $message) {
                    echo '<li>' . $message . '</li>';
                    if ($index === $totalMessages - 1) {
                        // Afficher le champ de réponse uniquement pour le dernier message
                        echo '<form method="post" action="reply.php">';
                        echo '<input type="hidden" name="email" value="' . $selectedEmail . '">';
                        echo '<textarea name="reply" placeholder="Répondre à ce message"></textarea><br>';
                        echo '<input type="submit" value="Répondre">';
                        echo '</form>';
                    }
                }
                ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Ajoutez d'autres fonctionnalités d'administration si nécessaire -->
    <div>
     <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Page Admin! </button>
         </br>
     <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
    </body>
</html>
