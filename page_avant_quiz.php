<?php
session_start();

// Vérifier si l'ID de l'utilisateur est présent dans la session
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: http://localhost:8888/index.php");
    exit;
}

// Fonction pour récupérer l'email depuis le fichier utilisateurs.txt basé sur user_id
function getEmailFromUserId($user_id) {
    $filename = 'utilisateurs.txt';
    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $data = explode(';', $line);
            if (trim($data[2]) == $user_id) {
                return trim($data[0]);
            }
        }
    }
    return null;
}

$email = getEmailFromUserId($user_id);


// Vérifier si l'utilisateur a le droit d'accès au quiz
function checkAccess($email) {
    $filename = "donnees/" . $email . ".txt";
    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        if (isset($lines[6])) { // La 7ème ligne est indexée par 6
            $parts = explode(':', $lines[6]);
            if (count($parts) >= 2 && trim($parts[1]) == "non") {
                return false;
            }
        }
    }
    return true;
}

if (!$email || !checkAccess($email)) {
    // Afficher le message d'erreur et attendre 5 secondes avant la redirection
    echo '<p>Vous n\'êtes pas habilité à accéder au quiz !</p>';
    echo '<p>Redirection automatique dans 5 secondes...</p>';
    header("refresh:5;url=http://localhost:8888/projetinfo1page_principal.php?id=$user_id");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès au Quiz</title>
    <link rel="stylesheet" href="page_avant_quiz.css">
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Quiz Formule 1</h1>
    </header>
    <main>
        <section id="presentation">
            <h2 class="red-title">Bienvenue au Quiz sur la Formule 1</h2>
            <p>Ce quiz vous permettra de tester vos connaissances. Répondez aux questions pour découvrir votre niveau.</p>
            <p>Le quiz est composé de questions de différents niveaux de difficulté :</p>
            <ul>
                <li><span class="difficulty-circle difficulty-facile"></span>Facile</li>
                <li><span class="difficulty-circle difficulty-intermédiaire"></span>Intermédiaire</li>
                <li><span class="difficulty-circle difficulty-difficile"></span>Difficile </li>
            </ul>
            <p>Prenez votre temps pour répondre à chaque question et essayez d'obtenir le meilleur score possible !</p>
            <a href="http://localhost:8888/projetinfo1.php?id=<?php echo $user_id; ?>" class="styled-button">Commencer le Quiz</a>
        </section>
        <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
    </main>
    </body>
</html>
