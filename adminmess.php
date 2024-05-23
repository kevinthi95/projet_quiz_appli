<!-- un peu de php partout mais obligé  -->
<?php
session_start(); 


if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: index.php");
    exit;
}

// l'utilisateur administrateur ?
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas un administrateur
    header("Location: index.php");
    exit;
}

function getMessagesByEmail($email) {
    $filename = 'message/' . $email . '.txt'; // Correction du chemin vers le fichier
    if (file_exists($filename)) {
        // Lire le contenu du fichier/ renvoyer les messages
        return file($filename, FILE_IGNORE_NEW_LINES);
    } else {
        return array(); // pas de mess
    }
}

// recup email 
function getUserEmails() {
    $userFile = 'utilisateurs.txt';
    if (file_exists($userFile)) {
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
        return array(); // pas d'utilisateur trouvé
    }
}

// Vérifie si le formulaire a été soumis avec une adresse e-mail sélectionnée
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_email'])) {
    $selectedEmail = $_POST['selected_email'];
    // Récup messages
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
    <div>
     <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Page Admin! </button>
         </br>
     <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
    </body>
</html>
