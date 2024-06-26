<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

function getEmailFromUserId($user_id) {
    $userFile = 'utilisateurs.txt';
    if (file_exists($userFile)) {
        $lines = file($userFile, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $parts = explode(';', $line);
            if (count($parts) >= 3 && $parts[2] === $user_id) {
                return $parts[0];
            }
        }
    }
    return null; 
}

$email = getEmailFromUserId($user_id);

function getMessages($email) {
    $filename = 'message/' . $email . '.txt';
    if (file_exists($filename)) {
        $messages = file($filename, FILE_IGNORE_NEW_LINES);
        $formattedMessages = array();
        foreach ($messages as $message) {
            $parts = explode('|', $message);
            $formattedMessages[] = array('date' => $parts[0], 'content' => $parts[1]);
        }
        return $formattedMessages;
    }
    return array();
}

function saveMessage($email, $message) {
    $filename = 'message/' . $email . '.txt';
    date_default_timezone_set('Europe/Paris');
    $dateTime = date('Y-m-d H:i:s');
    $formattedMessage = "user : " .$dateTime . '|' . $message;
    file_put_contents($filename, $formattedMessage . PHP_EOL, FILE_APPEND);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $message = $_POST['message'];
    saveMessage($email, $message);
    header("Location: messagerie.php");
    exit;
}

$messages = getMessages($email);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <link rel="stylesheet" href="messagerie.css"> 
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Messagerie</h1>
    <form method="post" action="messagerie.php">
        <textarea name="message" placeholder="Entrez votre message. Un administrateur du site le recevra."></textarea><br>
        <input type="submit" value="Envoyer">
    </form>

    <h2>Vos messages</h2>
    <?php foreach ($messages as $message): ?>
        <div class="message"><?= htmlspecialchars($message['date']) ?> - <?= htmlspecialchars($message['content']) ?></div>
    <?php endforeach; ?>
 <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
</body>
</html>
