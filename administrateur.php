<?php
session_start(); // Démarre la session

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: http://localhost:8888/index.php");
    exit;
}

// Traitement du code d'accès
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['code'])) {
    $code = $_POST['code'];
    if ($code === "1234") {
        $_SESSION['admin'] = true; // L'utilisateur est marqué comme administrateur
        header("Location: admin_content.php"); // Redirigez vers la page principale de l'administrateur
        exit;
    } else {
        $error_message = 'Code incorrect. Veuillez réessayer.';
    }
}

// Vérifie si l'utilisateur est connecté en tant qu'administrateur
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    include 'admin_content.php'; // Inclure le contenu réservé aux administrateurs
} else {
    // Affichage du formulaire de saisie du code si pas admin
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="administrateur.css">
    <title>Page Administrateur</title>
</head>
<body>
    <div class="container">
        <h1>Page Administrateur</h1>
        <form method="post">
            <label for="code">Entrez le code d'accès :</label>
            <input type="password" name="code" id="code" required>
            <?php if (isset($error_message)) { echo '<div class="error">' . $error_message . '</div>'; } ?>
            <button type="submit" class="action-button">Valider</button>
        </form>
        <br>
         <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
        
    </div>
  </body>            
</html>
<?php
    exit; // Termine le script pour non-admin
}
?>
