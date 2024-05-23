document.addEventListener('DOMContentLoaded', function() {
    let lastScrollY = window.scrollY;  // Stocke la position de défilement d'avant

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            // Vérif si l'élément entre dans le "viewport" et si le défilement est vers le bas
            if (entry.isIntersecting && window.scrollY > lastScrollY) {
                entry.target.classList.add('fade-in');
            } else {
                entry.target.classList.remove('fade-in');
            }
        });
        // Mise à jour de la dernière position de défilement après le traitement des entrées
        lastScrollY = window.scrollY;
    }, { threshold: 0.1 });

    // Observe tous les éléments sélec
    document.querySelectorAll('.text, .bubble').forEach((section) => {
        observer.observe(section);
    });

    // Mettre à jour "lastScrollY" chaque fois que l'utilisateur scroll
    window.addEventListener('scroll', () => {
        lastScrollY = window.scrollY;
    });
});
