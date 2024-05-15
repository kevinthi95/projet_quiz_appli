<?php
session_start(); // Démarre la session

// Vérifier si l'ID de l'utilisateur est présent dans la session
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Utiliser $user_id pour personnaliser le contenu de la page ou pour toute autre fonctionnalité
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bloc Notes Dynamique</title>
    <link rel="stylesheet" href="carte_abonne.css">
</head>
<body>
    <div id="noteContainer">
        <!-- Les carrés seront ajoutés ici -->
    </div>
    <button onclick="ajouterCarre()">Ajouter un carré</button>
    <script src="carte_abonne.js"></script>
</body>
</html>
