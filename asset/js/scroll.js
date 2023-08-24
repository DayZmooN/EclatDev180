document.addEventListener('DOMContentLoaded', function () {
    let studentSection = document.querySelector('.container-card-student');

    studentSection.addEventListener('scroll', function () {
        // Détecter si la section .student est complètement défilée
        if (studentSection.scrollTop + studentSection.clientHeight >= studentSection.scrollHeight) {
            document.body.style.overflow = 'auto'; // Activer le défilement de la page
        } else {
            document.body.style.overflow = 'hidden'; // Désactiver le défilement de la page
        }
    });

    // Activer le défilement de la page si l'utilisateur n'est pas dans la section .student
    document.addEventListener('scroll', function () {
        if (window.scrollY < studentSection.offsetTop || window.scrollY > studentSection.offsetTop + studentSection.clientHeight) {
            document.body.style.overflow = 'auto';
        }
    });
});
