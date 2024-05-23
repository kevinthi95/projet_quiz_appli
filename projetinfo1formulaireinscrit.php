<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="projetinfo1formulaireinscrit.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $file = 'utilisateurs.txt';
    if (file_exists($file)) {
        $lines = file($file);
        $updatedLines = [];
        $found = false;
        $redirectId = '';

        foreach ($lines as $line) {
            $columns = explode(';', $line);
            if (trim($columns[0]) === $email && trim($columns[1]) === $password) {
                $redirectId = uniqid();  
                $columns[2] = $redirectId; 
                $line = implode(';', $columns) . PHP_EOL;
                $found = true;
            }
            $updatedLines[] = $line;
        }

        if ($found) {
            file_put_contents($file, implode('', $updatedLines));
            echo '<script>setTimeout(function() { window.location.href = "http://localhost:8888/projetinfo1page_principal.php?id='.$redirectId.'"; }, 3000);</script>';
            echo '<div id="message">Connexion réussie. Redirection dans 3 secondes...</div>';
            $_SESSION['user_id'] = $redirectId;
            exit;
        } else {
            echo '<div id="message">Email non trouvé ou mot de passe incorrect. Redirection dans 5 secondes...</div>';
            echo '<script>setTimeout(function() { window.location.href = "http://localhost:8888/projetinfo1formulaireinscrit.php"; }, 5000);</script>';
            exit;
        }
    } else {
        echo '<div id="message">Le fichier des utilisateurs n\'existe pas. Contactez l\'administrateur.</div>';
    }
}
?>
<div><div class="form-container">
<form class="form" method="post">
   <p class="form-title">Connecter vous à votre compte</p>
    <div class="input-container">
      <input name="email" placeholder="Enter email" type="email" required>
      <span>
        <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
        </svg>
      </span>
  </div>
  <div class="input-container">
      <input name="password" placeholder="Enter password" type="password" required>
      <span>
        <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
          <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
        </svg>
      </span>
    </div>
     <button class="submit" type="submit">
    Soumettre
  </button>

  <p class="signup-link">
    Pas de compte ?
    <a href="http://localhost:8888/index.php">Ici</a>
  </p>
</form>
<div id="message"></div>
</div>
</body>
</html>
