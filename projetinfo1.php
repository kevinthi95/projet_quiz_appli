
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
        <div id="result-container"></div>
    </div>
    <div id="result-container"></div>
    <div id="legend-container">
        <p>Légende :</p>
        <div class="legend-item">
            <span class="difficulty-circle difficulty-facile"></span> Facile (1 point)
        </div>
        <div class="legend-item">
            <span class="difficulty-circle difficulty-intermédiaire"></span> Intermédiaire (2 points)
        </div>
        <div class="legend-item">
            <span class="difficulty-circle difficulty-difficile"></span> Difficile (3 points)
        </div>
    </div>
    <div id="question-count">
        <span id="remaining-questions-text">Questions restantes : </span><span id="remaining-questions"></span>
    </div>
    <div id="timer-container">
        Temps écoulé : <span id="time">00:00</span>
    </div>
    
    <script src="projetinfo1.js"></script>
    <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>"  class="center-link">Retour à la page principale</a>
</body>
</html>