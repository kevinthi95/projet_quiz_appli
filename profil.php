<?php
session_start(); // Démarrage de la session

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo '<p>Vous devez être connecté pour voir cette page.</p>';
    echo '<a href="http://localhost:8888/projetinfo1formulaireinscrit.php">Se connecter</a> ou ';
    echo '<a href="http://localhost:8888/index.php">Créer un compte</a>';
    exit;
}

$user_id = $_SESSION['user_id'];
$annexeFile = 'donnees/' . $user_id . '.txt';

function formatPasswordForDisplay($password) {
    if (strlen($password) > 1) {
        return substr($password, 0, 1) . str_repeat('*', strlen($password) - 1);
    }
    return $password; // Gère le cas peu probable où le mot de passe serait d'un seul caractère
}

$userData = 'Aucune information disponible.';
$passwordDisplay = '****'; // Initialement masqué

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

    if ($new_password !== $confirm_password) {
        $message = "Les mots de passe ne correspondent pas.";
    } else {
        if (isset($matches[1]) && password_verify($current_password, $matches[1])) {
            $newHashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
            $newData = str_replace($matches[1], $newHashedPassword, $userData);
            file_put_contents($annexeFile, $newData);
            $message = "Mot de passe mis à jour avec succès.";
        } else {
            $message = "Mot de passe actuel incorrect.";
        }
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
</head>
<body>
    <header>
        <h1>Profil de l'utilisateur</h1>
    </header>
    <div class="container">
    
        <pre><?php echo htmlspecialchars($displayData); ?></pre>
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
        <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $userId; ?>">Retour à la page principale</a>
    </div>
</body>
</html>
