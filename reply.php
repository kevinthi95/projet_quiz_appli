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

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['reply'])) {
    // Récupérer les données soumises par le formulaire
    $email = $_POST['email'];
    $replyMessage = $_POST['reply'];

    // Assurez-vous que l'e-mail de l'utilisateur et la réponse ne sont pas vides
    if (!empty($email) && !empty($replyMessage)) {
        // Ajoutez la logique pour enregistrer la réponse dans le fichier de messages de l'utilisateur
        $filename = 'message/' . $email . '.txt';
        $reply = "Admin: " . $replyMessage; // Format du message de réponse (ici "Admin:" est ajouté pour indiquer que c'est une réponse de l'administrateur)
        // Ajoutez la réponse au fichier de messages
        file_put_contents($filename, $reply . PHP_EOL, FILE_APPEND);
        // Rediriger vers la page d'administration après avoir répondu
        header("Location: adminmess.php");
        exit;
    } else {
        // Si l'e-mail de l'utilisateur ou la réponse est vide, affichez un message d'erreur
        echo "Erreur: Veuillez remplir tous les champs.";
    }
} else {
    // Si le formulaire n'a pas été soumis correctement, rediriger vers la page principale ou afficher un message d'erreur
    header("Location: index.php"); // Redirection vers la page principale
    exit;
}
?>
