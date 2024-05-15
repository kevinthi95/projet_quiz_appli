<?php
session_start(); // Démarre la session

// Vérifie si le code d'abonnement a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['code'])) {
    $code = $_POST['code'];

    // Vérifie si le code d'abonnement est correct
    if ($code === "1111") {
        $_SESSION['abonne'] = true; // Marque l'utilisateur comme abonné
    } else {
        echo '<div id="message">Code incorrect. Veuillez réessayer.</div>';
    }
}

// Vérifie si l'utilisateur est abonné
if (isset($_SESSION['abonne']) && $_SESSION['abonne'] === true) {
    // Redirige l'utilisateur vers la page réservée aux abonnés
    header("Location: abonne.php");
    exit;
} else {
    // Affiche le formulaire de saisie du code d'abonnement
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement au Quiz</title>
    <link rel="stylesheet" href="page_avant_abonnement.css">
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
            <label for="code">Entrez le code d'abonnement : à obtenir avec un administrateur</label>
            <input type="password" name="code" id="code" required>
            <button type="submit">Devenir Abonné</button>
        </form>
    </div>
</br>
    <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>">Retour à la page principale</a>
</body>
</html>

<?php
    // Termine le script
    exit;
}
?>
