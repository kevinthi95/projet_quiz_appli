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
    <title>Bloc Notes Dynamique</title>
    <link rel="stylesheet" href="carte_abonne.css">
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="noteContainer">
    </div>
    <button onclick="ajouterCarre()">Ajouter un carré</button>
    <script src="carte_abonne.js"></script>
</br>
 <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
</body>
</html>
