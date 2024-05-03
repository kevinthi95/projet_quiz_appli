const quizData = [
    {
          question: "Qui est le double champion du monde en titre de la F1 ?",
          options: ["Lewis Hamilton", "Sebastian Vettel", "Max Verstappen", "Fernando Alonso"],
          answer: "Fernando Alonso",
          difficulty: "facile"
        },
        {
          question: "Quel est le nom de l'équipe de F1 basée à Maranello, en Italie ?",
          options: ["Mercedes", "Red Bull Racing", "Ferrari", "McLaren"],
          answer: "Ferrari",
          difficulty: "facile"
        },
        {
          question: "Quel circuit de F1 est surnommé 'Le Temple de la Vitesse' ?",
          options: ["Monaco", "Spa-Francorchamps", "Monza", "Silverstone"],
          answer: "Monza",
          difficulty: "intermédiaire"
        },
        {
          question: "Qui est le pilote le plus titré de l'histoire de la F1 ?",
          options: ["Michael Schumacher", "Lewis Hamilton", "Sebastian Vettel", "Ayrton Senna"],
          answer: "Michael Schumacher",
          difficulty: "facile"
        },
        {
          question: "Quel est le moteur de base utilisé par toutes les équipes de F1 ?",
          options: ["Le moteur à combustion interne", "Le moteur électrique", "Le moteur diesel", "Le moteur rotatif"],
          answer: "Le moteur à combustion interne",
          difficulty: "difficile"
        },
        {
          question: "Combien de pneus secs peuvent être utilisés par chaque voiture lors d'une course de F1 ?",
          options: ["Jusqu'à 8 jeux de pneus", "Jusqu'à 10 jeux de pneus", "Jusqu'à 12 jeux de pneus", "Jusqu'à 13 jeux de pneus"],
          answer: "Jusqu'à 13 jeux de pneus",
          difficulty: "difficile"
        },
        {
          question: "Quel est le nom du système de sécurité utilisé par tous les pilotes de F1 ?",
          options: ["La Barrière de sécurité", "Le Halo", "Le Cockpit Shield", "Le Halo 2.0"],
          answer: "Le Halo",
          difficulty: "facile"
        },
        {
          question: "Quel est le nom de la célèbre chicane du circuit de Spa-Francorchamps ?",
          options: ["Les Combes", "La Parabolique", "Les Esses", "La Variante Ascari"],
          answer: "Les Combes",
          difficulty: "intermédiaire"
        },
        {
          question: "Qui est le pilote britannique champion du monde de F1 en 2009 ?",
          options: ["Jenson Button", "Lewis Hamilton", "Nigel Mansell", "Damon Hill"],
          answer: "Jenson Button",
          difficulty: "difficile"
        },
        {
          question: "Quel est le nom de la célébration où le vainqueur d'une course de F1 arrose son équipe avec du champagne ?",
          options: ["Le Podium", "Le Cérémonial de la victoire", "La Célébration du vainqueur", "Le Spray de champagne"],
          answer: "Le Podium",
          difficulty: "facile"
        },
        {
            question: "Quelle est la distance maximale parcourue lors d'une course de F1 ?",
            options: ["Environ 305 kilomètres", "Environ 200 kilomètres", "Environ 500 kilomètres", "Environ 1000 kilomètres"],
            answer: "Environ 305 kilomètres",
            difficulty: "difficile"
        },
        {
            question: "Qui est le seul pilote à avoir remporté des championnats du monde avec Williams, McLaren et Ferrari ?",
            options: ["Lewis Hamilton", "Sebastian Vettel", "Fernando Alonso", "Alain Prost"],
            answer: "Alain Prost",
            difficulty: "difficile"
        },
        {
            question: "Quel est le circuit urbain le plus mythique ?",
            options: ["Le Circuit de Monaco", "Le Circuit de Singapour", "Le Circuit de Bakou", "Le Circuit de Melbourne"],
            answer: "Le Circuit de Monaco",
            difficulty: "facile"
        },
        {
            question: "Quel est le nom du recordman du nombre de victoires en F1 ?",
            options: ["Michael Schumacher", "Lewis Hamilton", "Sebastian Vettel", "Ayrton Senna"],
            answer: "Lewis Hamilton",
            difficulty: "facile"
        },
        {
            question: "Quel est le nom du système de récupération de l'énergie utilisé en F1 ?",
            options: ["KERS", "DRS", "ERS", "MGU-K"],
            answer: "MGU-K",
            difficulty: "difficile"
        },
        {
            question: "Quelle est la vitesse maximale atteinte par une voiture de F1 ?",
            options: ["Environ 320 km/h", "Environ 350 km/h", "Environ 370 km/h", "Environ 400 km/h"],
            answer: "Environ 370 km/h",
            difficulty: "intermédiaire"
        },
        {
            question: "Quel est le nom de la célébration où le vainqueur d'une course de F1 brandit son trophée sur le podium ?",
            options: ["La remise des trophées", "Le cérémonial du podium", "Le tour d'honneur", "La cérémonie de victoire"],
            answer: "Le cérémonial du podium",
            difficulty: "intermédiaire"
        },
        {
            question: "Qui est le pilote finlandais champion du monde de F1 en 2007 ?",
            options: ["Kimi Räikkönen", "Mika Häkkinen", "Valtteri Bottas", "Nico Rosberg"],
            answer: "Kimi Räikkönen",
            difficulty: "difficile"
        },
        {
            question: "Quel est le nom du célèbre virage en épingle du circuit de Suzuka ?",
            options: ["Le Virage en huit", "La Courbe des S", "L'Epingle de Suzuka", "Le Virage 130R"],
            answer: "Le Virage en huit",
            difficulty: "difficile"
        },
        {
            question: "Quel est le nom de la célèbre courbe rapide du circuit de Silverstone ?",
            options: ["Copse", "Stowe", "Abbey", "Club"],
            answer: "Copse",
            difficulty: "intermédiaire"
        },
        {
            question: "Qui est le seul pilote à avoir remporté un championnat du monde de F1 avec un moteur turbo et un moteur atmosphérique ?",
            options: ["Nelson Piquet", "Alain Prost", "Ayrton Senna", "Michael Schumacher"],
            answer: "Nelson Piquet",
            difficulty: "difficile"
        },
        {
            question: "Quel est le nom du pneu le plus tendre utilisé dans l’histoire de la F1 ?",
            options: ["Pneu tendre", "Pneu hypersoft", "Pneu super tendre", "Pneu ultra tendre"],
            answer: "Pneu hypersoft",
            difficulty: "facile"
        },
        {
            question: "Quel est le nom de la compagnie qui fournit les pneus pour la F1 ?",
            options: ["Bridgestone", "Michelin", "Pirelli", "Goodyear"],
            answer: "Pirelli",
            difficulty: "facile"
        },
        {
            question: "Qui est le dernier pilote à avoir remporté un championnat du monde de F1 avec un moteur atmosphérique ?",
            options: ["Alain Prost", "Nigel Mansell", "Jacques Villeneuve", "Sebastian Vettel"],
            answer: "Jacques Villeneuve",
            difficulty: "difficile"
        },
        {
            question: "Quel est le nom de la célèbre chicane du circuit de Yas Marina ?",
            options: ["Chicane de la Mer", "Chicane du Désert", "Chicane de l'Île", "Chicane de l'hôtel"],
            answer: "Chicane de l'hôtel",
            difficulty: "difficile"
        },
        {
            question: "Qui est le plus jeune champion du monde de F1 ?",
            options: ["Lewis Hamilton", "Fernando Alonso", "Max Verstappen", "Sebastian Vettel"],
            answer: "Sebastian Vettel",
            difficulty: "intermédiaire"
        },
        {
            question: "Quel est le nom du premier Grand Prix de la saison de F1 ?",
            options: ["Grand Prix d'Australie", "Grand Prix de Bahreïn", "Grand Prix de Malaisie", "Grand Prix de Chine"],
            answer: "Grand Prix d'Australie",
            difficulty: "facile"
        },
        {
            question: "Quel est le nom du recordman du nombre de pole positions en F1 ?",
            options: ["Sebastian Vettel", "Lewis Hamilton", "Ayrton Senna", "Michael Schumacher"],
            answer: "Lewis Hamilton",
            difficulty: "facile"
        },
        {
            question: "Quelle équipe a remporté le plus de championnats du monde de constructeurs en F1 ?",
            options: ["Ferrari", "McLaren", "Williams", "Mercedes"],
            answer: "Ferrari",
            difficulty: "facile"
        },
        {
            question: "Qui est le pilote qui a remporté le plus de victoires chez Ferrari ?",
            options: ["Michael Schumacher", "Sebastian Vettel", "Fernando Alonso", "Niki Lauda"],
            answer: "Michael Schumacher",
            difficulty: "facile"
        },
        {
            question: "Quel est le nom du virage serré du circuit de Sepang ?",
            options: ["Virage 1", "Virage 2", "Virage 3", "Virage 4"],
            answer: "Virage 1",
            difficulty: "intermédiaire"
        },
        {
            question: "Qui est le pilote allemand champion du monde de F1 en 2016 ?",
            options: ["Nico Rosberg", "Sebastian Vettel", "Michael Schumacher", "Ralf Schumacher"],
            answer: "Nico Rosberg",
            difficulty: "facile"
        },
        {
            question: "Quelle est la durée typique d'un arrêt au stand en F1 ?",
            options: ["Environ 5 secondes", "Environ 10 secondes", "Environ 2 à 3 secondes", "Environ 1 seconde"],
            answer: "Environ 2 à 3 secondes",
            difficulty: "intermédiaire"
        },
        {
            question: "Quel est le nom de la célèbre chicane du circuit de Catalunya ?",
            options: ["Chicane de la Rascasse", "Chicane de l'Épingle", "Chicane de la Chicane", "Chicane de la Piscine"],
            answer: "Chicane de l'Épingle",
            difficulty: "intermédiaire"
        },
        {
            question: "Qui est le seul pilote à avoir remporté un championnat du monde de F1 avec une équipe britannique autre que McLaren ?",
            options: ["James Hunt", "Damon Hill", "Lewis Hamilton", "Nigel Mansell"],
            answer: "Damon Hill",
            difficulty: "difficile"
        },
        {
            question: "Quelle équipe de F1 est basée à Grove, en Angleterre ?",
            options: ["Ferrari", "McLaren", "Williams", "Red Bull Racing"],
            answer: "Williams",
            difficulty: "intermédiaire"
        },
        {
            question: "Quel est le nom du recordman du nombre de victoires consécutives en F1 ?",
            options: ["Michael Schumacher", "Ayrton Senna", "Alberto Ascari", "Juan Manuel Fangio"],
            answer: "Alberto Ascari",
            difficulty: "difficile"
        },
        {
            question: "Quel est le nom de la célèbre chicane du circuit de Shanghai ?",
            options: ["Chicane de l'Épingle", "Chicane du Virage", "Chicane du Lac", "Chicane de l'Agneau"],
            answer: "Chicane de l'Épingle",
            difficulty: "intermédiaire"
        },
        {
            question: "Qui est le pilote espagnol double champion du monde de F1 ?",
            options: ["Fernando Alonso", "Carlos Sainz", "Pedro de la Rosa", "Alfonso de Portago"],
            answer: "Fernando Alonso",
            difficulty: "intermédiaire"
        },
        {
            question: "Quel est le nom de la célèbre chicane du circuit de Suzuka ?",
            options: ["Chicane des Esses", "Chicane de la Piscine", "Chicane du S", "Chicane de l'Épingle"],
            answer: "Chicane des Esses",
            difficulty: "intermédiaire"
        },
        {
            question: "Qui est le premier pilote à avoir remporté un championnat du monde de F1 avec une équipe française ?",
            options: ["Alain Prost", "René Arnoux", "Jacques Laffite", "François Cevert"],
            answer: "Alain Prost",
            difficulty: "facile"
        },
        {
            question: "Quel est le nom de la courbe rapide du circuit de Spa-Francorchamps ?",
            options: ["Eau Rouge", "Raidillon", "La Source", "Les Combes"],
            answer: "Eau Rouge",
            difficulty: "facile"
        },
        {
            question: "Qui est le pilote brésilien triple champion du monde de F1 ?",
            options: ["Nelson Piquet", "Emerson Fittipaldi", "Felipe Massa", "Ayrton Senna"],
            answer: "Ayrton Senna",
            difficulty: "facile"
        },
        {
            question: "Quel est le nom du recordman du nombre de pole positions consécutives en F1 ?",
            options: ["Ayrton Senna", "Michael Schumacher", "Sebastian Vettel", "Lewis Hamilton"],
            answer: "Ayrton Senna",
            difficulty: "intermédiaire"
        },
        {
            question: "Qui est le pilote britannique qui a remporté le championnat du monde de F1 en 2008 ?",
            options: ["Jenson Button", "Lewis Hamilton", "David Coulthard", "Nigel Mansell"],
            answer: "Lewis Hamilton",
            difficulty: "intermédiaire"
        },
        {
            question: "Quel est le nom du dernier virage du circuit de Interlagos ?",
            options: ["Virage Junção", "Virage des S", "Virage de l'Épingle", "Virage de la Rascasse"],
            answer: "Virage Junção",
            difficulty: "difficile"
        },
        {
            question: "Qui est le seul pilote à avoir remporté un championnat du monde de F1 avec une équipe autrichienne ?",
            options: ["Niki Lauda", "Gerhard Berger", "Jochen Rindt", "Helmut Marko"],
            answer: "Niki Lauda",
            difficulty: "difficile"
        },
        {
            question: "Quelle équipe de F1 est basée à Brackley, en Angleterre ?",
            options: ["Red Bull Racing", "Ferrari", "Mercedes", "McLaren"],
            answer: "Mercedes",
            difficulty: "intermédiaire"
        },
        {
            question: "Qui est le pilote allemand quintuple champion du monde de F1 ?",
            options: ["Michael Schumacher", "Sebastian Vettel", "Nico Rosberg", "Ralf Schumacher"],
            answer: "Sebastian Vettel",
            difficulty: "intermédiaire"
        },
        {
            question: "Quel est le nom du virage serré du circuit de Monaco ?",
            options: ["Virage de la Rascasse", "Virage du Casino", "Virage du Portier", "Virage de la Loews"],
            answer: "Virage de la Rascasse",
            difficulty: "intermédiaire"
        }
];

const quizContainer = document.getElementById('quiz-container');
const difficultyElement = document.getElementById('difficulty'); // Sélectionnez la div pour afficher la difficulté
const questionElement = document.getElementById('question');
const optionsElement = document.getElementById('options');
const resultContainer = document.getElementById('result-container');
const remainingQuestionsElement = document.getElementById('remaining-questions');


let currentQuestion = 0;
let score = 0;
let startTime = 0; // Ajoutez une variable pour enregistrer le temps de début
let pausedTime = 0; // Ajoutez une variable pour enregistrer le temps écoulé lorsque le quiz est en pause
let timerInterval;

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function startQuiz() {
    shuffleArray(quizData);
    loadQuiz();
    startTime = Date.now(); // Enregistrez le temps de début
    startTimer();
}

function loadQuiz() {
    const currentQuizData = quizData[currentQuestion];
    questionElement.innerText = currentQuizData.question;
    optionsElement.innerHTML = '';
    currentQuizData.options.forEach(option => {
        const button = document.createElement('button');
        button.innerText = option;
        button.classList.add('option-btn');
        button.addEventListener('click', () => checkAnswer(option));
        optionsElement.appendChild(button);
    });
    difficultyElement.className = 'difficulty-circle';
    switch (currentQuizData.difficulty) {
        case 'facile':
            difficultyElement.classList.add('difficulty-facile');
            break;
        case 'intermédiaire':
            difficultyElement.classList.add('difficulty-intermédiaire');
            break;
        case 'difficile':
            difficultyElement.classList.add('difficulty-difficile');
            break;
        default:
            break;
    }
    updateRemainingQuestions();
}

function updateRemainingQuestions() {
    const remainingQuestions = quizData.length - currentQuestion - 1;
    remainingQuestionsElement.innerText = remainingQuestions;
}

function checkAnswer(answer) {
    clearInterval(timerInterval);
    const currentQuizData = quizData[currentQuestion];
    if (answer === currentQuizData.answer) {
        score++;
        resultContainer.innerText = 'Bonne réponse!';
    } else {
        resultContainer.innerText = 'Mauvaise réponse!';
    }
    currentQuestion++;
    if (currentQuestion < quizData.length) {
        loadQuiz();
        startTimer(); // Redémarrez le chronomètre après avoir chargé la prochaine question
    } else {
        showResults();
    }
    updateRemainingQuestions();
}

function showResults() {
    quizContainer.style.display = 'none';
    const elapsedTime = Math.floor((Date.now() - startTime - pausedTime) / 1000); // Calculez le temps écoulé
    const minutes = Math.floor(elapsedTime / 60);
    const seconds = elapsedTime % 60;
    const formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    resultContainer.innerHTML = `<h2>Votre score est ${score}/${quizData.length}</h2>`;
    resultContainer.innerHTML += `<p>Temps écoulé: ${formattedTime}</p>`;
}

function startTimer() {
    timerInterval = setInterval(updateTimer, 1000);
}

function updateTimer() {
    const elapsedTime = Math.floor((Date.now() - startTime - pausedTime) / 1000); // Calculez le temps écoulé
    const minutes = Math.floor(elapsedTime / 60);
    const seconds = elapsedTime % 60;
    const formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    document.getElementById('time').innerText = formattedTime;
}

// Gérer la pause et la reprise du chronomètre lorsque le quiz est en pause
document.addEventListener('visibilitychange', () => {
    if (document.visibilityState === 'hidden') {
        clearTimeout(timerTimeout); // Si la page est cachée, arrêtez le chronomètre et enregistrez le temps écoulé
        pausedTime += Date.now() - startTime;
    } else {
        startTime = Date.now() - pausedTime; // Si la page est visible, enregistrez le nouveau temps de début en ajoutant le temps écoulé
        startTimer(); // Redémarrez le chronomètre
    }
});

document.addEventListener('DOMContentLoaded', startQuiz);
