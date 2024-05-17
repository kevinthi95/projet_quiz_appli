<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de présentation de la Formule 1</title>
    <link rel="stylesheet" href="projetinfo1page_principal.css">
</head>
<body class="fade-in">
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
    <h1>Présentation de la Formule 1</h1>
    <nav>
        <ul>
    
           <li><a href="http://localhost:8888/page_avant_quiz.php?id=<?php echo $user_id; ?>" >Quiz</a></li>
            <li><a href= "http://localhost:8888/classement.php?id=<?php echo $user_id; ?>" >Classement</a></li>
            <li><a href= "http://localhost:8888/profil.php?id=<?php echo $user_id; ?>" >Profil</a></li>
            <li><a href= "http://localhost:8888/deconnexion.php?id=$<?php echo $user_id; ?>">Se déconnecter</a></li>
            <li><a href="http://localhost:8888/administrateur.php?id=<?php echo $user_id; ?>">Admin</a></li>
            <li><a href="http://localhost:8888/page_avant_abonnement.php?id=<?php echo $user_id; ?>">Abonnement</a></li>
            <li><a href="http://localhost:8888/messagerie.php?id=<?php echo $user_id; ?>">Messagerie</a></li>
        </ul>
    </nav>
</header>

    <!-- Contenu principal -->
    <div class="text">
        <div class="information-section">
            <h2>Informations Générales sur la Formule 1</h2>
                <p>
                    La Formule 1 est le plus haut niveau de compétition en sport automobile. Elle est régie par la Fédération Internationale de l'Automobile (FIA). Les courses de Formule 1 se déroulent sur des circuits spécialement conçus pour l'événement ou sur des circuits urbains temporaires. Les voitures de Formule 1 sont parmi les plus rapides du monde, capables d'atteindre des vitesses de plus de 300 km/h.
                </p>
                <p>
                    Le championnat du monde de Formule 1 est disputé chaque année, avec plusieurs Grand Prix se déroulant dans différents pays à travers le monde. Les pilotes et les équipes marquent des points en fonction de leur classement dans chaque course, et à la fin de la saison, le pilote et l'équipe avec le plus de points sont couronnés champions du monde.
                </p>
                <p>
                    La Formule 1 est également connue pour ses avancées technologiques constantes, avec des équipes rivalisant pour développer les voitures les plus rapides et les plus innovantes. Les courses de Formule 1 offrent souvent des moments de suspense, de dépassements audacieux et de drames, faisant de ce sport l'un des plus populaires au monde.
                </p>
        </div>
    </div>
    
    <div class="bubble">
        <div class="History">
            <h2> L'hisoire de la formule 1</h2>
                <p>
                    La Formule 1, souvent considérée comme le sommet du sport automobile, a débuté officiellement en 1950 avec le lancement du premier Championnat du monde de Formule 1 par la Fédération internationale de l'automobile (FIA). Depuis lors, elle a évolué pour devenir l'une des compétitions sportives les plus populaires au monde, attirant des millions de fans à travers le globe. Des pilotes légendaires tels que Juan Manuel Fangio, Alberto Ascari, et Stirling Moss ont marqué les débuts de la Formule 1, établissant des standards de performance et de compétition qui inspirent encore les générations actuelles. Depuis, des équipes emblématiques telles que Ferrari, McLaren et Mercedes ont dominé la scène, rivalisant pour le titre de champion du monde constructeurs et le titre de champion du monde pilotes. Avec des courses épiques sur des circuits emblématiques comme Monza, Monaco et Spa-Francorchamps, la Formule 1 continue de captiver les fans avec son mélange unique de vitesse, de technologie et de compétition féroce.
                </p>
        </div>
    </div>
    <div class="text">
        <div class="Champion">
            <h2> Les grands champions de la Formule 1</h2>
                <p>
                    La Formule 1 a vu défiler certains des pilotes les plus talentueux de l'histoire du sport automobile. Des noms tels que Michael Schumacher, Lewis Hamilton, Ayrton Senna et Juan Manuel Fangio résonnent à travers les époques, rappelant leurs exploits sur la piste et leurs multiples titres de champion du monde. Schumacher, avec ses sept titres mondiaux, reste un géant de la Formule 1, tandis que Hamilton, avec son style de pilotage flamboyant et ses records de victoires, est sur le point de le surpasser. Senna, connu pour sa détermination sans faille et ses prouesses par temps de pluie, reste une icône de la sportivité et du talent brut. Ces pilotes, et bien d'autres, ont marqué l'histoire de la Formule 1, créant des rivalités mémorables et des moments inoubliables sur les circuits du monde entier.                
                </p>
        </div>
    </div>

    <div class="slide-in">
        <div class="text">
            <div class="container">
                <h1>Champions de Formule 1</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Pilote</th>
                                <th>Titres</th>
                                <th>Années</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Michael Schumacher</td>
                                <td>7</td>
                                <td>1994, 95, 2000, 2001, 2002, 2003, 2004</td>
                            </tr>
                            <tr>
                                <td>Lewis Hamilton</td>
                                <td>7</td>
                                <td>2008, 2014, 2015, 2017, 2018, 2019, 2020</td>
                            </tr>
                            <tr>
                                <td>Juan Manuel Fangio</td>
                                <td>5</td>
                                <td>1951, 1954, 1955, 1956, 1957</td>
                            </tr>
                            <tr>
                                <td>Alain Prost</td>
                                <td>4</td>
                                <td>1985, 1986, 1989, 1993</td>
                            </tr>
                            <tr>
                                <td>Sebastian Vettel</td>
                                <td>4</td>
                                <td>2010, 2011, 2012, 2013</td>
                            </tr>
                            <tr>
                                <td>Jack Brabham</td>
                                <td>3</td>
                                <td>1959, 1960, 1966</td>
                            </tr>
                            <tr>
                                <td>Jackie Stewart</td>
                                <td>3</td>
                                <td>1969, 1971, 1973</td>
                            </tr>
                            <tr>
                                <td>Niki Lauda</td>
                                <td>3</td>
                                <td>1975, 1977, 1984</td>
                            </tr>
                            <tr>
                                <td>Nelson Piquet</td>
                                <td>3</td>
                                <td>1981, 1983, 1987</td>
                            </tr>
                            <tr>
                                <td>Ayrton Senna</td>
                                <td>3</td>
                                <td>1988, 1990, 1991</td>
                            </tr>
                            <tr>
                                <td>Max Verstappen</td>
                                <td>3</td>
                                <td>2021, 2022, 2023</td>
                            </tr>
                            <!-- Ajoutez les autres lignes du tableau ici -->
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    
    <div class="bubble">
        <div class="circuit">
            <h2> Les circuits emblématiques de la Formule 1</h2>
                <p>
                    La Formule 1 est synonyme de circuits légendaires à travers le monde. Du glamour de Monaco à la vitesse de Monza, en passant par le défi technique de Spa-Francorchamps, chaque circuit a sa propre histoire et son propre charme. Monaco, avec ses rues étroites et son prestige historique, est le joyau de la couronne de la Formule 1, offrant un défi unique aux pilotes à chaque virage. Monza, avec sa longue ligne droite et ses chicanes rapides, est le théâtre de courses épiques depuis des décennies, attirant des foules passionnées de fans italiens. Spa-Francorchamps, niché dans les Ardennes belges, est réputé pour ses virages rapides et son changement brutal de conditions météorologiques, mettant à l'épreuve même les pilotes les plus expérimentés. Ces circuits, et bien d'autres, font partie intégrante du folklore de la Formule 1, offrant un spectacle inégalé et des moments de suspense à chaque course.
                </p>
        </div>
    </div>
    <div class="content">
        <div class="bubble">
            <h2>Formula 1 Grand Prix</h2>
                <table class="f1-table centre">
                    <thead>
                        <tr>
                            <th>Grand Prix</th>
                            <th>Première édition</th>
                            <th>Lieu</th>
                            <th>Circuit</th>
                            <th>Capacité théorique</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bahreïn 🇧🇭</td>
                            <td>2004</td>
                            <td>Sakhir</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Circuit_Bahrain.svg/1024px-Circuit_Bahrain.svg.png" alt="Circuit de Bahreïn" width="200"></td>
                            <td>100 000</td>
                        </tr>
                        <tr>
                            <td>Arabie saoudite 🇸🇦</td>
                            <td>2021</td>
                            <td>Djeddah</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Jeddah_Street_Circuit_2021.svg/1280px-Jeddah_Street_Circuit_2021.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>?</td>
                        </tr>
                        <tr>
                            <td>Australie 🇦🇺</td>
                            <td>1985</td>
                            <td>Melbourne</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Circuit_Albert_Park.svg/800px-Circuit_Albert_Park.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>130 000</td>
                        </tr>
                        <tr>
                            <td>D'Émilie-Romagne 🇮🇹</td>
                            <td>2020</td>
                            <td>Imola</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Circuit_Albert_Park.svg/800px-Circuit_Albert_Park.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>78 000 </td>
                        </tr>
                        <tr>
                            <td>Miami 🇺🇸</td>
                            <td>2022</td>
                            <td>Miami</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Hard_Rock_Stadium_Circuit_2022.svg/1920px-Hard_Rock_Stadium_Circuit_2022.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>80 000 </td>
                        </tr>
                        <tr>
                            <td>Espagne 🇪🇸</td>
                            <td>1951</td>
                            <td>Barcelone</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Circuit_Catalunya.svg/1024px-Circuit_Catalunya.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>140 700 </td>
                        </tr>
                        <tr>
                            <td>Monaco 🇲🇨</td>
                            <td>1950</td>
                            <td>Monaco</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Circuit_Monaco.svg/800px-Circuit_Monaco.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>37 000 </td>
                        </tr>
                        <tr>
                            <td>Azerbaïdjan 🇦🇿</td>
                            <td>2017</td>
                            <td>Bakou</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Baku_Formula_One_circuit_map.svg/1024px-Baku_Formula_One_circuit_map.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>18 500</td>
                        </tr>
                        <tr>
                            <td>Canada 🇨🇦 </td>
                            <td>1967</td>
                            <td>Montréal</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Circuit_Gilles_Villeneuve.svg/1920px-Circuit_Gilles_Villeneuve.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>100 000 </td>
                        </tr>
                        <tr>
                            <td>Grande-Bretagne 🇬🇧</td>
                            <td>1950</td>
                            <td>Silverstone</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Silverstone_circuit_opposite_straight.svg/1280px-Silverstone_circuit_opposite_straight.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>150 000 </td>
                        </tr>
                        <tr>
                            <td>Autriche 🇦🇹</td>
                            <td>1964</td>
                            <td>Spielberg</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Circuit_A1_Ring.svg/800px-Circuit_A1_Ring.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>40 000 </td>
                        </tr>
                        <tr>
                            <td>Hongrie 🇭🇺</td>
                            <td>1986</td>
                            <td>Budapest</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Hungaroring.svg/800px-Hungaroring.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>70 000</td>
                        </tr>
                        <tr>
                            <td>Belgique 🇧🇪</td>
                            <td>1950</td>
                            <td>Spa-Francorchamps</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Spa-Francorchamps_of_Belgium.svg/1280px-Spa-Francorchamps_of_Belgium.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>70 000 </td>
                        </tr>
                        <tr>
                            <td>Pays-bas 🇳🇱</td>
                            <td>1952</td>
                            <td>Zandvoort</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Zandvoort_Circuit.png/800px-Zandvoort_Circuit.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>105 000 </td>
                        </tr>
                        <tr>
                            <td>Italie 🇮🇹</td>
                            <td>1950</td>
                            <td>Monza</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Circuit_Monza.svg/1024px-Circuit_Monza.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>113 860 </td>
                        </tr>
                        <tr>
                            <td>Singapour 🇸🇬</td>
                            <td>2008</td>
                            <td>Marina Bay</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Singapore_street_circuit_v2.svg/1280px-Singapore_street_circuit_v2.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>90 000</td>
                        </tr>

                        <tr>
                            <td>Japon 🇯🇵</td>
                            <td>1976</td>
                            <td>Suzuka</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Suzuka_circuit_map--2005.svg/1024px-Suzuka_circuit_map--2005.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>155 000</td>
                        </tr>

                        <tr>
                            <td>États-Unis 🇺🇸</td>
                            <td>1959</td>
                            <td>Austin</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Austin_Formula_One_circuit.svg/800px-Austin_Formula_One_circuit.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>120 000</td>
                        </tr>

                        <tr>
                            <td>Mexique 🇲🇽</td>
                            <td>1963</td>
                            <td>Mexico</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Aut%C3%B3dromo_Hermanos_Rodr%C3%ADguez_2015.svg/1024px-Aut%C3%B3dromo_Hermanos_Rodr%C3%ADguez_2015.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>110 000</td>
                        </tr>

                        <tr>
                            <td>Brésil 🇧🇷</td>
                            <td>1973</td>
                            <td>São Paulo</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Aut%C3%B3dromo_Jos%C3%A9_Carlos_Pace_%28AKA_Interlagos%29_track_map.svg/1280px-Aut%C3%B3dromo_Jos%C3%A9_Carlos_Pace_%28AKA_Interlagos%29_track_map.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>60 000</td>
                        </tr>

                        <tr>
                            <td>Abou Dabi 🇦🇪</td>
                            <td>2009</td>
                            <td>Yas Marina</td>
                            <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Circuit_Yas-Island.svg/800px-Circuit_Yas-Island.svg.png" style="max-width: 200px; filter: grayscale(100%);"></td>
                            <td>60 000</td>
                        </tr>
                        <!-- Ajouter les autres lignes du tableau -->
                    </tbody>
                </table>
        </div>
    </div>

    <div class="text">
        <div class="innovation">
            <h2> Les innovations technologiques en Formule 1 </h2>
                <p>
                    La Formule 1 est à la pointe de la technologie automobile, avec des équipes rivalisant pour trouver chaque avantage possible sur la piste. Des développements tels que le KERS (Système de Récupération de l'Énergie Cinétique), le DRS (Système de Réduction de la Trainée) et les unités de puissance hybrides ont révolutionné le sport, permettant aux voitures de devenir plus rapides, plus efficaces et plus respectueuses de l'environnement. Ces innovations se reflètent également dans la sécurité des pilotes, avec des dispositifs tels que le Halo, un arceau de sécurité introduit pour protéger la tête des pilotes en cas d'accident. Grâce à ces avancées technologiques constantes, la Formule 1 reste à la pointe de l'innovation et de l'excellence technique, repoussant les limites de la performance automobile à chaque course.
                </p>
        </div>
    </div>
            
    <!-- Tableau Pirelli -->
    <div class="table-container">
        <div class="bubble">
            <table class="f1-table centre">
                <caption>Couleurs des pneus Pirelli entre 2011 et 2018</caption>
                    <tbody>
                        <tr>
                            <th colspan="7" scope="colgroup">Pneus sec</th>
                            <th colspan="2" scope="colgroup">Pneus pluie</th>
                        </tr>
                        <tr>
                            <td><img alt="Représentation des pneus hyper tendres" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/F1_tire_Pirelli_PZero_Pink.svg/800px-F1_tire_Pirelli_PZero_Pink.svg.png" width="55" height="55"><br>Hyper tendre<br>rose</td>
                            <td><img alt="Représentation des pneus ultra tendres" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/F1_tire_Pirelli_PZero_Purple.svg/800px-F1_tire_Pirelli_PZero_Purple.svg.png" width="55" height="55"><br>Ultra tendre<br>violet</td>
                            <td><img alt="Représentation des pneus super tendres" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/F1_tire_Pirelli_PZero_Red.svg/512px-F1_tire_Pirelli_PZero_Red.svg.png?20190705122326" width="55" height="55"><br>Super tendre<br>rouge</td>
                            <td><img alt="Représentation des pneus tendres" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/F1_tire_Pirelli_PZero_Yellow.svg/512px-F1_tire_Pirelli_PZero_Yellow.svg.png?20190705123521" width="55" height="55"><br>Tendre<br>jaune</td>
                            <td><img alt="Représentation des pneus medium" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/F1_tire_Pirelli_PZero_White.svg/512px-F1_tire_Pirelli_PZero_White.svg.png?20190705123431" width="55" height="55"><br>Medium<br>blanc</td>
                            <td><img alt="Représentation des pneus durs" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/F1_tire_Pirelli_PZero_Light_blue.svg/512px-F1_tire_Pirelli_PZero_Light_blue.svg.png?20190705123903" width="55" height="55"><br>Dur<br>bleu glacé</td>
                            <td><img alt="Représentation des pneus super durs" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/F1_tire_Pirelli_PZero_Orange.svg/512px-F1_tire_Pirelli_PZero_Orange.svg.png?20190705123710" width="55" height="55"><br>Super dur<br>orange</td>
                            <td><img alt="Représentation des pneus intermédiaires" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/F1_tire_Pirelli_Cinturato_Green.svg/512px-F1_tire_Pirelli_Cinturato_Green.svg.png?20190705124354" width="55" height="55"><br>Intermédiaire<br>vert</td>
                            <td><img alt="Représentation des pneus pluie" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/63/F1_tire_Pirelli_Cinturato_Blue.svg/512px-F1_tire_Pirelli_Cinturato_Blue.svg.png?20190705124209" width="55" height="55"><br>Pluie<br>bleu</td>
                        </tr>    
                    </tbody>
            </table>
        </div>
    </div>

    <div class="container-flex ">
        <div class="bubble-flex">
            <div class="section-flex">
                <h2>Système de réduction de traînée (DRS)</h2>
                <p>Le système de réduction de traînée (DRS) est une technologie utilisée en Formule 1 pour aider les voitures à dépasser plus facilement. Lorsque le DRS est activé, un volet situé à l'arrière de la voiture s'ouvre, réduisant ainsi la traînée aérodynamique et permettant à la voiture de gagner en vitesse.</p>
                <img src="https://formule1fr.s3.eu-west-3.amazonaws.com/xlarge_ferrari_carlos_sainz_drs_open_closed_spanish_grand_prix_planet_f11_1024x577_62e07a3eb9564652908190_d48c027015.jpeg" alt="Voiture de Formule 1 avec le DRS activé">
            </div>
            <div class="section-flex">
                <h2>Système de sécurité Halo</h2>
                <p>Le système de sécurité Halo est une structure de protection introduite en Formule 1 pour protéger la tête du pilote en cas d'accident. Le Halo est constitué d'un arceau en titane monté au-dessus du cockpit de la voiture, offrant une protection supplémentaire contre les débris volants et les collisions.</p>
                <img src="https://www.racecar-engineering.com/wp-content/uploads/2022/07/Ferrari-SF-23-Halo.jpg" alt="Voiture de Formule 1 avec le système de sécurité Halo">
                <img src="https://www.driving.co.uk/wp-content/uploads/sites/5/2021/09/Zhou-Guanyu-crash-what-is-halo.jpg" alt="Voiture de Formule 1 avec le système de sécurité Halo">
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Formule 1. Tous droits réservés.</p>
    </footer>
    
        <script src="projetinfo1page_principal.js"></script>
</body>
</html>


