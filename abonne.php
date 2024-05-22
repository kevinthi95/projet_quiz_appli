<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnés - Informations sur la Formule 1</title>
    <link rel="stylesheet" href="abonne.css">
    <link rel="stylesheet" href="style.css">
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
    header("Location: http://localhost:8888/index.php");
    exit;
}
?>
    <header>
        <h1>Informations sur la Formule 1</h1>
        <nav>
            <ul>
                <li><a href="http://localhost:8888/carte_abonne.php?id=<?php echo $user_id; ?>">Carte </a></li>
    
            </ul>
        </nav>
    </header>

    <main>
        <section id="presentation">
            <h2>Bienvenue, Abonné à la Formule 1 !</h2>
            <p>En tant qu'abonné, vous avez accès à des informations exclusives sur la Formule 1 pour enrichir votre passion et améliorer vos connaissances. Découvrez ci-dessous quelques-unes des fonctionnalités réservées aux abonnés :</p>
        </section>

        <section id="infos">
            <h2>Informations pratiques sur la Formule 1</h2>
            <div class="info-card">
                <h3>Calendrier des Courses</h3>
                <p>Consultez le calendrier complet de la saison de Formule 1 pour ne manquer aucun grand prix.</p>
            </div>
            <div class="info-card">
                <h3>Dernières Actualités</h3>
                <p>Restez informé des dernières nouvelles, rumeurs et mises à jour de la Formule 1.</p>
            </div>
            <div class="info-card">
                <h3>Guides et Analyses</h3>
                <p>Accédez à des guides détaillés et à des analyses approfondies des courses, des équipes et des pilotes.</p>
            </div>
            </br>
  
        </section>
    </main>
 <a href="http://localhost:8888/projetinfo1page_principal.php?id=<?php echo $user_id; ?>" >
    <button id="pickUpButton"> Accueil ! </button>
    <footer>
        <p>&copy; 2024 Informations sur la Formule 1. Tous droits réservés.</p>
    </footer>
</body>
</html>
