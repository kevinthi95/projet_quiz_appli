function ajouterCarre() {
    var noteContainer = document.getElementById('noteContainer');
    var nouvelleNote = document.createElement('div');
    nouvelleNote.setAttribute('class', 'note');
    nouvelleNote.setAttribute('contenteditable', 'true');
    nouvelleNote.innerText = 'Cliquez pour écrire...';

    nouvelleNote.addEventListener('focus', function() {
        if (nouvelleNote.innerText === 'Cliquez pour écrire...') {
            nouvelleNote.innerText = '';
            nouvelleNote.style.color = 'black';
        }
    });

    nouvelleNote.addEventListener('blur', function() {
        if (nouvelleNote.innerText.trim() === '') {
            nouvelleNote.innerText = 'Cliquez pour écrire...';
            nouvelleNote.style.color = '#CCC';
        }
    });

    // agrandir/réduire le carré
    nouvelleNote.addEventListener('click', function() {
        //  carré est déjà agrandi ?
        if (nouvelleNote.classList.contains('agrandi')) {
            nouvelleNote.classList.remove('agrandi');
        } else {
            // Retire la classe 'agrandi' des autres notes avant d'agrandir la note courante
            let toutesLesNotes = document.querySelectorAll('.note');
            toutesLesNotes.forEach(note => {
                note.classList.remove('agrandi');
            });
            nouvelleNote.classList.add('agrandi');
        }
    });

    noteContainer.appendChild(nouvelleNote);
}
