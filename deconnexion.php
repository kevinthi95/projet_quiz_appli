<?php
session_start(); // Démarre la gestion de session

// Supprime l'ID utilisateur de la session
if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']); // Supprime la variable de session
}

// Vous pouvez également vouloir détruire toute la session si vous n'utilisez pas d'autres variables de session
// session_destroy();

// Redirection vers la page de connexion ou la page d'accueil
header('Location: http://localhost:8888/projetinfo1page_principal.php');
exit;
?>
