<?php
session_start(); // Démarre la session

// Initialiser une variable pour stocker un message d'erreur éventuel
$error_message = '';

// Vérifier si l'ID de l'utilisateur est présent dans la session
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: index.php");
    exit;
}

// Vérifie si le code d'abonnement a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['code'])) {
    $code = $_POST['code'];

    // Vérifie si le code d'abonnement est correct
    if ($code === "1111") {
        $_SESSION['abonne'] = true; // Marque l'utilisateur comme abonné
        header("Location: http://localhost:8888/abonne.php?id=$user_id"); // Redirige vers la page réservée aux abonnés
        exit;
    } else {
        $error_message = 'Code incorrect. Veuillez réessayer.'; // Stocke le message d'erreur
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement au Quiz</title>
    <link rel="stylesheet" href="page_avant_abonnement.css">
    <style>
        .error-message {
            color: red; // Couleur rouge pour le message d'erreur
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Abonnez-vous pour obtenir des avantages exclusifs !</h1>
        <div class="subscription-info">
            <p>Vous êtes sur le point de devenir un abonné du Quiz. En vous abonnant, vous aurez accès à des fonctionnalités exclusives qui vous aideront à réussir vos quiz avec brio :</p>
            <ul>
                <li>Des astuces et conseils pour répondre aux questions difficiles</li>
                <li>Des résumés détaillés des sujets abordés dans chaque quiz</li>
                <li>Des quiz supplémentaires disponibles uniquement pour les abonnés</li>
            </ul>
            <p>N'attendez plus, saisissez l'opportunité de devenir un expert du Quiz en vous abonnant dès maintenant !</p>
        </div>
        <form method="post" class="subscription-form">
            <label for="code">Entrez le code d'abonnement :</label>
            <input type="password" name="code" id="code" required>
            <?php
            if ($error_message !== '') {
                echo '<div class="error-message">' . $error_message . '</div>';
            }
            ?>
            <button type="submit">Devenir Abonné</button>
        </form>
        <a id="retour-link" href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>">Retour à la page principale</a>
    </div>
</body>
</html>

<?php
    // Termine le script
    exit;
?>
