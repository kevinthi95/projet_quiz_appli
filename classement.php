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

$directory = 'donnees/';
$results = [];

// Lire tous les fichiers dans le répertoire de données
if ($handle = opendir($directory)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            $filepath = $directory . $entry;
            $contents = file_get_contents($filepath);
            if (preg_match('/Score: (\d+)\/20, Time: ([^,]+), Ratio: ([\d\.]+)/', $contents, $matches)) {
                $email = basename($entry, ".txt"); // Extraire l'email de nom du fichier
                $score = $matches[1];
                $time = $matches[2];
                $ratio = $matches[3];
                $results[] = array("email" => $email, "score" => $score, "time" => $time, "ratio" => $ratio);
            }
        }
    }
    closedir($handle);
}

// Trier les résultats par ratio décroissant
usort($results, function ($a, $b) {
    return $b['ratio'] <=> $a['ratio'];
});

// Sélectionner les 20 meilleurs scores
$topResults = array_slice($results, 0, 20);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="classement.css">
    <title>Classement</title>
</head>
<body>
    <h1>Classement des 20 meilleurs scores</h1>
    <table>
        <tr>
            <th>Email</th>
            <th>Score</th>
            <th>Chrono</th>
            <th>Ratio</th>
        </tr>
        <?php foreach ($topResults as $result): ?>
            <tr>
                <td><?php echo htmlspecialchars($result['email']); ?></td>
                <td><?php echo htmlspecialchars($result['score']); ?></td>
                <td><?php echo htmlspecialchars($result['time']); ?></td>
                <td><?php echo htmlspecialchars($result['ratio']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
   <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
</body>
</html>
