      <!-- rajouter ici car plus compréhensible -->
<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    echo '<div class="message message-error"><p>Vous devez être connecté pour voir cette page.</p>';
    echo '<a href="http://localhost:8888/projetinfo1formulaireinscrit.php">Se connecter</a> ou ';
    echo '<a href="http://localhost:8888/index.php">Créer un compte</a></div>';
    exit;
}

function formatPasswordForDisplay($password) {
    if (strlen($password) > 1) {
        return substr($password, 0, 1) . str_repeat('*', strlen($password) - 1);
    }
    return $password; // Gère le cas peu probable où le mot de passe serait d'un seul caractère
}

$user_id = $_SESSION['user_id'];

$file = 'utilisateurs.txt'; 
if (file_exists($file)) {
    $lines = file($file);
    foreach ($lines as $line) {
        $columns = explode(';', $line);
        if (trim($columns[2]) === $user_id) {
            $email = trim($columns[0]); 
            break; 
        }
    }
}
$annexeFile = 'donnees/' . $email . '.txt';

if (file_exists($annexeFile)) {
    $userData = file_get_contents($annexeFile);
    $displayData = $userData;
    if (preg_match('/Password:\s*(.*)$/m', $userData, $matches)) {
        $passwordDisplay = formatPasswordForDisplay(trim($matches[1]));
        $displayData = str_replace($matches[1], $passwordDisplay, $userData);
    }
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['current_password'])) {
    $current_password = trim($_POST['current_password']);
    $new_password = trim($_POST['new_password']);  
    $confirm_password = trim($_POST['confirm_password']);  

    if (file_exists($file)) {
        $lines = file($file);
        foreach ($lines as &$line) {
            $columns = explode(';', $line);
            if (trim($columns[2]) === trim($user_id)) {
                $stored_password = trim($columns[1]);
                if ($current_password === $stored_password) {
                    if ($new_password === $confirm_password) {
                        if ($new_password === $stored_password) {
                            $message = '<div class="message message-error">Le nouveau mot de passe est identique à l\'ancien.</div>';
                        } elseif (strpos($email, $new_password) === false) {
                            $line = str_replace($stored_password, $new_password, $line);
                            file_put_contents($file, implode('', $lines));
                            $message = '<div class="message message-success">Mot de passe mis à jour avec succès.</div>';
                        } else {
                            $message = '<div class="message message-error">Le nouveau mot de passe ne doit pas contenir de parties de votre email.</div>';
                        }
                    } else {
                        $message = '<div class="message message-error">Les nouveaux mots de passe ne correspondent pas.</div>';
                    }
                } else {
                    $message = '<div class="message message-error">Mot de passe actuel incorrect.</div>';
                }
                break;
            }
        }
    } else {
        $message = '<div class="message message-error">Le fichier utilisateurs.txt n\'existe pas.</div>';
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
    <!-- rajouter ici car sinon ça ne fonctionne pas -->
    <style>
    
        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
        }

        .message-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
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
        <?php if (!empty($message)) echo $message; ?>
    </div>
    <div class="footer">
        <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>">
            <button id="pickUpButton">Accueil !</button>
        </a>
    </div>
</body>
</html>

