<?php
session_start();

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
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
        <link rel="stylesheet" href="style.css">
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
</br>
     <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
</body>
</html>
