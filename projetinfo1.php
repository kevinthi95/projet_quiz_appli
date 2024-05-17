<?php
// Démarrer la session
session_start();

// Vérifier si l'ID de l'utilisateur est présent dans la session
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Utiliser $user_id pour personnaliser le contenu de la page ou pour toute autre fonctionnalité
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: http://localhost:8888/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="projetinfo1.css">
</head>
<body>
    <div id="quiz-container">
        <h1>Quiz</h1>
        <div id="question"></div>
        <div id="options"></div>
        <div id="difficulty-container">
            <div id="difficulty"></div>
        </div>
    </div>
    <div id="result-container"></div>
    <div id="legend-container">
        <p>Légende :</p>
        <div class="legend-item">
            <span class="difficulty-circle difficulty-facile"></span> Facile
        </div>
        <div class="legend-item">
            <span class="difficulty-circle difficulty-intermédiaire"></span> Intermédiaire
        </div>
        <div class="legend-item">
            <span class="difficulty-circle difficulty-difficile"></span> Difficile
        </div>
    </div>
    <div id="question-count">
        <span id="remaining-questions-text">Questions restantes : </span><span id="remaining-questions"></span>
    </div>
    <div id="timer-container">
        Temps écoulé : <span id="time">00:00</span>
    </div>

    <script src="projetinfo1.js"></script>

    <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" class="center-link">Retour à la page principale</a>
</body>
</html>
