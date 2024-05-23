<?php
session_start(); 

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: http://localhost:8888/index.php");
    exit;
}

// on peut acces uniquement en admin
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // bloquer /dénloquer
        if (isset($_POST['email-bloquer'])) {
            // ici c'est bloquer
            $email = $_POST['email-bloquer'];
            $filename = 'donnees/' . $email . '.txt';

            // existe?
            if (file_exists($filename)) {
            
                $userData = file_get_contents($filename);

                if (strpos($userData, 'Accès:non') !== false) {
                    echo '<div id="message">Utilisateur déjà bloqué.</div>';
                } else {
                    //si accès existe alors accès non si on clique
                    $userData = preg_replace('/Accès:(.*)/', 'Accès:non', $userData);

                    // met a jour
                    file_put_contents($filename, $userData);

                    echo '<div id="message">Accès au quiz bloqué pour l\'utilisateur avec l\'email: ' . $email . '</div>';
                }
            } else {
                echo '<div id="message">Utilisateur non trouvé.</div>';
            }
        } elseif (isset($_POST['email-debloquer'])) {
            // debloquer 
            $email = $_POST['email-debloquer'];
            $filename = 'donnees/' . $email . '.txt';

            // existe ?
            if (file_exists($filename)) {
                $userData = file_get_contents($filename);

                if (strpos($userData, 'Accès:oui') !== false) {
                    echo '<div id="message1">Utilisateur déjà débloqué.</div>';
                } else {
                   // acces  = oui 
                    $userData = preg_replace('/Accès:(.*)/', 'Accès:oui', $userData);

                    file_put_contents($filename, $userData);

                    echo '<div id="message1">Accès au quiz débloqué pour l\'utilisateur avec l\'email: ' . $email . '</div>';
                }
            } else {
                echo '<div id="message">Utilisateur non trouvé.</div>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_content.css">
        <link rel="stylesheet" href="style.css">
    <title>Page administrateur</title>
</head>
<body>
<div class="container">
    <h1>Page administrateur</h1>
    <div>
        <h2>Bloquer l'accès au quiz</h2>
        <form method="post">
            <label for="email-bloquer">Choisir un utilisateur à bloquer:</label>
            <select name="email-bloquer" id="email-bloquer" required>
            <?php
            $filename = 'utilisateurs.txt';
            if (file_exists($filename)) {
                $users = file($filename);
                foreach ($users as $user) {
                    $userInfo = explode(';', $user);
                    echo '<option value="' . trim($userInfo[0]) . '">' . trim($userInfo[0]) . '</option>';
                }
            }
            ?>
            </select>
            <button type="submit" class="button1">Bloquer l'accès au quiz</button>
        </form>
    </div>
    <div>
        <h2>Débloquer l'accès au quiz</h2>
        <form method="post">
            <label for="email-debloquer">Choisir un utilisateur à débloquer:</label>
            <select name="email-debloquer" id="email-debloquer" required>
            <?php
            $filename = 'utilisateurs.txt';
            if (file_exists($filename)) {
                $users = file($filename);
                foreach ($users as $user) {
                    $userInfo = explode(';', $user);
                    echo '<option value="' . trim($userInfo[0]) . '">' . trim($userInfo[0]) . '</option>';
                }
            }
            ?>
            </select>
            <button type="submit">Débloquer l'accès au quiz</button>
        </form>
        </br>
    </div>
    <a href="http://localhost:8888/adminmess.php?id=<?php echo $user_id; ?>">messagerie</a>
    </div>
  <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
</div>
</body>
</html>
