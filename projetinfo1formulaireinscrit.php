<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="projetinfo1formulaireinscrit.css">
    <link rel="stylesheet" href="style.css">
    <!--encore obligés de le mettre ici je ne comprend pas pourquoi ca ne marche pas dans le css-->
    <style>
        #message {
            display: none;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
            position: relative;
        }

        .message-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .loader {
            position: absolute;
            top: 10px;
            right: -50px;
            width: 40px;
            height: 40px;
        }

        .jimu-primary-loading:before,
        .jimu-primary-loading:after {
            position: absolute;
            top: 0;
            content: '';
        }

        .jimu-primary-loading:before {
            left: -19.992px;
        }

        .jimu-primary-loading:after {
            left: 19.992px;
            -webkit-animation-delay: 0.32s !important;
            animation-delay: 0.32s !important;
        }

        .jimu-primary-loading:before,
        .jimu-primary-loading:after,
        .jimu-primary-loading {
            background: #076fe5;
            -webkit-animation: loading-keys-app-loading 0.8s infinite ease-in-out;
            animation: loading-keys-app-loading 0.8s infinite ease-in-out;
            width: 13.6px;
            height: 32px;
        }

        .jimu-primary-loading {
            text-indent: -9999em;
            margin: auto;
            position: absolute;
            right: calc(50% - 6.8px);
            top: calc(50% - 16px);
            -webkit-animation-delay: 0.16s !important;
            animation-delay: 0.16s !important;
        }

        @-webkit-keyframes loading-keys-app-loading {
            0%, 80%, 100% {
                opacity: .75;
                box-shadow: 0 0 #076fe5;
                height: 32px;
            }
            40% {
                opacity: 1;
                box-shadow: 0 -8px #076fe5;
                height: 40px;
            }
        }

        @keyframes loading-keys-app-loading {
            0%, 80%, 100% {
                opacity: .75;
                box-shadow: 0 0 #076fe5;
                height: 32px;
            }
            40% {
                opacity: 1;
                box-shadow: 0 -8px #076fe5;
                height: 40px;
            }
        }
    </style>
</head>
<body>
<?php
session_start(); // Démarrage de la session

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
            echo '<div id="message" class="message-success">Connexion réussie. Redirection dans 3 secondes...
                    <div class="loader">
                        <div class="justify-content-center jimu-primary-loading"></div>
                    </div>
                  </div>';
            echo '<script>
                    document.getElementById("message").style.display = "block";
                    setTimeout(function() { window.location.href = "http://localhost:8888/projetinfo1page_principal.php?id='.$redirectId.'"; }, 3000);
                  </script>';
            $_SESSION['user_id'] = $redirectId;
            exit;
        } else {
            echo '<div id="message" class="message-error">Email non trouvé ou mot de passe incorrect. Redirection dans 5 secondes...
                    <div class="loader">
                        <div class="justify-content-center jimu-primary-loading"></div>
                    </div>
                  </div>';
            echo '<script>
                    document.getElementById("message").style.display = "block";
                    setTimeout(function() { window.location.href = "http://localhost:8888/projetinfo1formulaireinscrit.php"; }, 5000);
                  </script>';
            exit;
        }
    } else {
        echo '<div id="message" class="message-error">Le fichier des utilisateurs n\'existe pas. Contactez l\'administrateur.
                <div class="loader">
                    <div class="justify-content-center jimu-primary-loading"></div>
                </div>
              </div>';
        echo '<script>document.getElementById("message").style.display = "block";</script>';
    }
}
?>
<div class="form-container">
    <form class="form" method="post">
        <p class="form-title">Connectez-vous à votre compte</p>
        <div class="input-container">
            <input name="email" placeholder="Entrez votre email" type="email" required>
            <span>
                <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
            </span>
        </div>
        <div class="input-container">
            <input name="password" placeholder="Entrez votre mot de passe" type="password" required>
            <span>
                <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                    <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
            </span>
        </div>
        <button class="submit" type="submit">Soumettre</button>
        <p class="signup-link">Pas de compte ? <a href="http://localhost:8888/index.php">Inscrivez-vous ici</a></p>
    </form>
    <div id="message"></div>
</div>
</body>
</html>






