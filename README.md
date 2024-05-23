# projet_quiz_appli
Bienvenue dans notre fantastique application web de quiz sur la Formule 1 !


Pages et Utilisation

Tout les fichiers.css sont associer a lerus fichier php du même nom et assure un coté esthétique a chauqe pâge. De même pour les fichier js qui permettent le bon focntionnement des fichiers php.
style.css : design du bouton acceuil
saveResults.php: Page utilisée pour enregistrer les résultats du quiz des utilisateurs.
projetinfo1formulaireinscrit.php: Page d'identification lorsque l'on a déjà un compte.
projetinfo1.php: Page de quiz principale avec chronomètre et nombre de questions restantes.
profil.php: Page d'affichage des données relatives au profil de l'utilisateur, permet de modifier le mot de passe.
page_avant_quiz.php: Page avant le quiz, avant que le chronomètre commence.
page_avant_abonnement.php: Page où l'on renseigne le code d'accès, et redirige ou non vers la page abonnee.php.
messagerie.php: Messagerie utilisée par les utilisateurs lambda.
index.php: Formulaire d'inscription, récupération des données utilisateur, copie dans le fichier utilisateurs.txt, création du fichier email.txt dans le dossier donnees et messages. Copie des données utilisateurs dans donnees/email.txt.
deconnexion.php: Détruit l'ID et la session de l'utilisateur.
classement.php: Récupère et trie les scores et temps des utilisateurs, utilise un ratio pour trier.
admin_content.php: Page pour bloquer ou débloquer l'accès au quiz aux utilisateurs.
administrateur.php: Page administrateur, avec code d'accès.
abonnee.php: Page abonnée avec information supplémentaire et accès à carte_abonnee.php.
reply.php: Fichier supplémentaire permettant de répondre à l'utilisateur.
projetinfo1page_principal.php: Page principale après connexion, affichant les informations et les fonctionnalités pour les utilisateurs connectés.
adminmess.php: Page d'administration pour gérer les messages des utilisateurs.

Fichiers et Répertoires

utilisateurs.txt: Fichier contenant les informations des utilisateurs (adresses email; mots de passe; identifiants).
donnees/: Dossier contenant des données pour le quiz, scores, temps, accès...
message/: Dossier contenant les messages des utilisateurs et de l'admin.

 Avant de plonger dans l’univers de notre quiz, voici quelques étapes essentielles pour configurer le site correctement.

Pour commencer, il est crucial de créer trois éléments dans le répertoire principal de votre serveur : un fichier nommé utilisateurs.txt, un dossier donnees, et un dossier message. Ces éléments doivent être créés manuellement. De plus, vous devrez mettre à jour les liens de direction vers ces fichiers et dossiers en fonction des chemins spécifiques de votre serveur.

Une fois cette configuration initiale effectuée, vous pouvez ouvrir le fichier index.php, le point de départ de notre projet. Vous y renseignerez les informations importantes, à l'exception de la section "passions" qui est facultative.

Si vous êtes déjà inscrit, vous pouvez cliquer sur "connexion". Le formulaire reconnaîtra votre adresse email et affichera un message "Vous êtes déjà inscrit", vous redirigeant ainsi vers la page de connexion. Si vous n'êtes pas encore inscrit, vous serez redirigé vers la page principale avec un message "Merci, vos informations ont été prises en compte".

Sur la page de connexion, il est nécessaire de saisir votre email et votre mot de passe. Si l'un ou l'autre n'est pas reconnu, un message d'erreur s'affichera et vous ne pourrez pas continuer. Si les informations sont correctes, vous serez redirigé vers la page principale. Pour des raisons de sécurité, à chaque connexion, une adresse IP est créée ou mise à jour, remplaçant l'ancienne.

Une fois sur la page principale, vous pouvez faire défiler vers le bas pour lire des informations utiles qui vous aideront à résoudre le quiz. Un bouton en bas à gauche vous ramènera rapidement en haut de la page. De plus, un bouton de déconnexion en haut à gauche vous permet de vous déconnecter, réinitialisant les attributs administrateur et abonné.

En cliquant sur "Quiz", vous êtes dirigé vers une page pré-quiz qui explique les règles et fournit les informations nécessaires pour une expérience optimale. Un bouton "Accueil" est toujours présent pour vous ramener à la page d'accueil. Lorsque vous cliquez sur "Commencer le quiz", le quiz démarre avec un chronomètre et le nombre de questions restantes. À la fin du quiz, les résultats sont sauvegardés et classés. Vous pouvez consulter le classement des meilleurs scores via l'onglet "Classement".

L'onglet "Profil" vous permet de voir  vos données enregistrées, vous pouvez y modifier votre mot de passe. L'onglet "Admin" vous donne accès aux fonctions administratives après avoir entré le code secret "1234". Ne le divulguez pas ! Ce code vous permet de bloquer ou débloquer l'accès au quiz pour un utilisateur spécifique. Dans cette section, vous pouvez aussi accéder à la messagerie pour sélectionner un utilisateur, voir toute la conversation avec lui, et lui répondre.

L'onglet "Abonnement", accessible avec le code "1111", vous dirige vers la page abonné. Ici, vous trouverez des informations supplémentaires et des cartes pour prendre des notes personnelles, comme les réponses que vous connaissez déjà pour le quiz.

Retournez à l'accueil, via l'onglet "Messagerie" pour poser n'importe quelle question à l'administrateur. Voilà, vous êtes prêt à jouer ! À vous de jouer maintenant !
