<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation du Quiz</title>
    <link rel="stylesheet" href="page_avant_quiz.css"> 
</head>
<body>
<?php
// Démarrer la session
session_start();

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
    <header>
        <h1>Quiz Formule 1</h1>
    </header>
    <main>
        <section id="presentation">
            <h2 class="red-title">Bienvenue au Quiz sur la Formule 1</h2>
            <p>Ce quiz vous permettra de tester vos connaissances. Répondez aux questions pour découvrir votre niveau.</p>
            <p>Le quiz est composé de questions de différents niveaux de difficulté :</p>
            <ul>
                <li><span class="difficulty-circle difficulty-facile"></span>Facile (1 point)</li>
                <li><span class="difficulty-circle difficulty-intermédiaire"></span>Intermédiaire (2 points)</li>
                <li><span class="difficulty-circle difficulty-difficile"></span>Difficile (3 points)</li>
            </ul>
            <p>Prenez votre temps pour répondre à chaque question et essayez d'obtenir le meilleur score possible !</p>
            <a href="http://localhost:8888/projetinfo1.php?id=<?php echo $user_id; ?>" class="styled-button">Commencer le Quiz</a>
        </section>
    </main>
    <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" class="center-link">Retour à la page principale</a>
</body>
</html>
