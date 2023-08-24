document.addEventListener('DOMContentLoaded', function () {
    let container = document.querySelector('.container-card-student');
    let body = document.body;

    // Désactiver le défilement de la page
    body.style.overflow = 'hidden';

    // Initialiser AOS
    AOS.init({
        duration: 1000,
        mirror: true,
        container: container,
        disable: 'mobile' // Désactiver les animations sur les appareils mobiles
    });

    // Écouter l'événement de défilement
    container.addEventListener('scroll', function () {
        applyScale();

        // Si le conteneur est complètement défilé vers le haut ou vers le bas
        if (container.scrollTop === 0 || container.scrollTop + container.clientHeight >= container.scrollHeight) {
            body.style.overflow = 'auto'; // Activer le défilement de la page
        } else {
            body.style.overflow = 'hidden'; // Désactiver le défilement de la page
        }
    });

    // Appliquer l'échelle initiale
    applyScale();

    // Fonction pour appliquer l'échelle
    // Fonction pour appliquer l'échelle
    function applyScale() {
        // Vérifier si l'appareil est en mode mobile (par exemple, largeur inférieure à 768px)
        if (window.innerWidth < 770) {
            container.style.transform = 'scale(1)'; // Pas d'effet de zoom en mode mobile
            body.style.overflow = 'auto'; // Activer le défilement de la page

            return; // Quitter la fonction
        }

        // Calculer le ratio de défilement
        let scrollRatio = container.scrollTop / (container.scrollHeight - container.clientHeight);

        // Appliquer une transformation d'échelle
        let scaleValue = 1 + scrollRatio * 0.2; // Ajuster cette valeur
        container.style.transform = `scale(${scaleValue})`;
    }

});
