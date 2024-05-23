<?php
session_start(); 

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['reply'])) {
    $email = $_POST['email'];
    $replyMessage = $_POST['reply'];

    // l'e-mail et réponse non vides ?
    if (!empty($email) && !empty($replyMessage)) {
        // logique pour enregistrer la réponse dans le fichier de messages 
        $filename = 'message/' . $email . '.txt';
        $reply = "Admin: " . $replyMessage; 
        // Ajoutez la réponse 
        file_put_contents($filename, $reply . PHP_EOL, FILE_APPEND);
        // Rediriger vers la page d'administration 
        header("Location: adminmess.php");
        exit;
    } else {
        // Si l'e-mail de l'utilisateur ou la réponse est vide, affichez un message d'erreur
        echo "Erreur: Veuillez remplir tous les champs.";
    }
} else {
    // Si le formulaire n'a pas été soumis correctement, rediriger vers la page principale ou afficher un message d'erreur
    header("Location: index.php"); 
    exit;
}
?>
