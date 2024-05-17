<?php
session_start();

// Vérifie si l'utilisateur est connecté et récupère son identifiant
if (!isset($_SESSION['user_id'])) {
    echo "Utilisateur non connecté";
    exit;
}

$user_id = $_SESSION['user_id'];
$email = ''; // Initialisation de l'email
$file = 'utilisateurs.txt'; // Chemin du fichier utilisateur

// Trouver l'email associé à l'utilisateur
if (file_exists($file)) {
    $lines = file($file);
    foreach ($lines as $line) {
        $parts = explode(';', $line);
        if (trim($parts[2]) == $user_id) {
            $email = trim($parts[0]);
            break;
        }
    }
}

// Vérifie si l'email a été trouvé
if ($email == '') {
    echo "Email non trouvé pour l'utilisateur";
    exit;
}

// Récupérer les données POSTées
$data = json_decode(file_get_contents("php://input"), true);
$score = (int) $data['score'];
$timeString = $data['time'];

// Convertir le temps en secondes si nécessaire
$timeParts = explode(':', $timeString);
$timeInSeconds = count($timeParts) === 3 ? ($timeParts[0] * 3600 + $timeParts[1] * 60 + $timeParts[2]) 
              : ($timeParts[0] * 60 + $timeParts[1]);

// Calculer le ratio
if ($score > 16) {
    $timeInSeconds = $timeInSeconds / 9;
} elseif ($score > 10) {
    $timeInSeconds = $timeInSeconds / 2;
}

$ratio = $timeInSeconds > 0 ? round((($score * $score) * 100 / $timeInSeconds), 3) : 0;

// Chemin vers le fichier de données de l'utilisateur
$annexeFile = 'donnees/' . $email . '.txt';

// Vérifier si des données existent déjà et les mettre à jour si nécessaire
if (file_exists($annexeFile)) {
    $contents = file_get_contents($annexeFile);
    if (preg_match('/Score: (\d+)\/20, Time: ([^,]+), Ratio: ([\d\.]+)/', $contents, $matches)) {
        $existingRatio = (float)$matches[3];
        if ($ratio > $existingRatio) {
            // Le nouveau ratio est meilleur, mise à jour des données
            $updatedContent = preg_replace('/Score: \d+\/20, Time: [^,]+, Ratio: [\d\.]+/', "Score: $score/20, Time: $timeString, Ratio: $ratio", $contents);
            file_put_contents($annexeFile, $updatedContent);
            echo "Nouveau score et temps enregistrés, ratio amélioré.";
        } else {
            echo "Le ratio existant est meilleur, aucune mise à jour nécessaire.";
        }
    } else {
        // Aucune donnée valide trouvée, ajouter les nouvelles données
        file_put_contents($annexeFile, "\nScore: $score/20, Time: $timeString, Ratio: $ratio", FILE_APPEND);
        echo "Nouvelles données ajoutées avec succès.";
    }
} else {
    // Le fichier n'existe pas, créer avec les nouvelles données
    file_put_contents($annexeFile, "Score: $score/20, Time: $timeString, Ratio: $ratio");
    echo "Fichier et données créés avec succès.";
}
?>
