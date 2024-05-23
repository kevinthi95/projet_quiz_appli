<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de saisie des informations - Confirmation</title>
    <link rel="stylesheet" type="text/css" href="projetinfo1formulaire.css">
    <link rel="stylesheet" href="style.css">
    <!--ne fonctionne pas dans le css-->
    <style>
        #message-container {
            display: none;
            padding: 15px;
            margin: 20px 0;
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
    <script>
        function hideMessageAndRedirect1() {
            var messageContainer = document.getElementById('message-container');
            setTimeout(function() {
                messageContainer.style.display = 'none';
                window.location.href = "http://localhost:8888/projetinfo1formulaireinscrit.php";
            }, 5000);
        }

        function hideMessageAndRedirect2(userId) {
            var messageContainer = document.getElementById('message-container');
            setTimeout(function() {
                messageContainer.style.display = 'none';
                window.location.href = "http://localhost:8888/projetinfo1page_principal.php?id=" + userId;
            }, 5000);
        }
    </script>
</head>

<body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower(trim($_POST['email']));
    $file = 'utilisateurs.txt';

    if (file_exists($file)) {
        $lines = file($file);
        foreach ($lines as $line) {
            $columns = explode(';', $line);
            if (strtolower(trim($columns[0])) === $email) {
                echo '<div id="message-container" class="message-error">Vous êtes déjà inscrit.
                        <div class="loader">
                            <div class="justify-content-center jimu-primary-loading"></div>
                        </div>
                      </div>';
                echo '<script>document.getElementById("message-container").style.display = "block"; hideMessageAndRedirect1();</script>';
                exit;
            }
        }
    }

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $pays = $_POST['pays'];
    $passions = $_POST['passions'];
    $user_id = uniqid();

    $data = "$email;" . (trim($password)) . ";$user_id\n";
    $annexeData = "Nom:$nom\nPrénom:$prenom\nAdresse e-mail:$email\nÂge:$age\nPays:$pays\nPassions: $passions\nAccès:oui\n";
    $annexeFile = 'donnees/' . $email . '.txt';
    $messagesFile = 'message/' . $email . '.txt';

    $fp = fopen($file, 'a');
    fwrite($fp, $data);
    fclose($fp);

    $messagesFp = fopen($messagesFile, 'w');
    fclose($messagesFp);

    $annexeFp = fopen($annexeFile, 'w');
    fwrite($annexeFp, $annexeData);
    fclose($annexeFp);

    $_SESSION['user_id'] = $user_id;

    echo '<div id="message-container" class="message-success">Merci! Vos informations ont été enregistrées avec succès. Vous allez être redirigé.
            <div class="loader">
                <div class="justify-content-center jimu-primary-loading"></div>
            </div>
          </div>';
    echo '<script>document.getElementById("message-container").style.display = "block"; hideMessageAndRedirect2("' . $user_id . '");</script>';
}
?>

<div class="form-container">
    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p class="form-title">Nouveau compte</p>
        <div class="input-container">
            <input type="text" id="nom" name="nom" required placeholder="Entrez votre nom">
            <input type="text" id="prenom" name="prenom" required placeholder="Entrez votre prénom">
            <input type="email" id="email" name="email" required placeholder="email@gmail.com">
            <input type="password" id="password" name="password" required placeholder="Mot de passe">
            <input type="number" id="age" name="age" min="0" required placeholder="Âge"><br><br>
            <select id="pays" name="pays" required>
                <option value="">Sélectionnez votre pays</option>
                <option value="france">🇫🇷 France</option>
                <option value="belgique">🇧🇪 Belgique</option>
                <option value="suisse">🇨🇭 Suisse</option>
                <option value="espagne">🇪🇸 Espagne</option>
                <option value="allemagne">🇩🇪 Allemagne</option>
                <option value="royaume-uni">🇬🇧 Royaume-Uni</option>
                <option value="italie">🇮🇹 Italie</option>
                <option value="monaco">🇲🇨 Monaco</option>
                <option value="luxembourg">🇱🇺 Luxembourg</option>
                <option value="portugal">🇵🇹 Portugal</option>
                <option value="maroc">🇲🇦 Maroc</option>
                <option value="tunisie">🇹🇳 Tunisie</option>
            </select><br><br>
            <input type="text" id="passions" name="passions" placeholder="Entrez vos passions séparées par des virgules">
        </div>
        <button type="submit" class="submit">Soumettre</button>
        <p class="signup-link">Déjà inscrit? <a href="http://localhost:8888/projetinfo1formulaireinscrit.php">Connexion</a></p>
    </form>
</div>
</body>
</html>

