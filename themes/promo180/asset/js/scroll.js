document.addEventListener('DOMContentLoaded', function () {
    let container = document.querySelector('.container-card-student');
    let body = document.body;

    container.addEventListener('scroll', onScroll);
    applyScale();

    function applyScale() {
        if (window.innerWidth < 770) {
            container.style.transform = 'scale(1)';
            body.style.overflow = 'scroll';
            return;
        }

        let scrollRatio = container.scrollTop / (container.scrollHeight - container.clientHeight);
        let scaleValue = 1 + scrollRatio * 0.1;
        container.style.transform = `scale(${scaleValue})`;

        if (container.scrollTop === 0 || container.scrollTop + container.clientHeight >= container.scrollHeight) {
            body.style.overflow = 'auto';
        } else {
            body.style.overflow = 'hidden';
        }
    }

    function onScroll() {
        applyScale();
    }
});


document.addEventListener('DOMContentLoaded', function () {
    var filterBar = document.getElementById('filter-bar');

    // Si filterBar n'existe pas, on quitte la fonction
    if (!filterBar) {
        return;
    }

    // On sélectionne '.categories' au lieu de '.filter-image-name'
    var categories = filterBar.querySelector('.categories');

    // Si 'categories' n'existe pas, on quitte la fonction
    if (!categories) {
        return;
    }

    var arrowLeft = document.querySelector('.arrow.left');
    var arrowRight = document.querySelector('.arrow.right');

    // Si les flèches n'existent pas, on quitte la fonction
    if (!arrowLeft || !arrowRight) {
        return;
    }

    // Supposons que chaque élément de la liste de catégories ait une largeur + marge de 100px
    var scrollWidth = 100;

    function scrollLeft() {
        filterBar.scrollBy({ left: -scrollWidth, behavior: 'smooth' });
        updateArrows();
    }

    function scrollRight() {
        filterBar.scrollBy({ left: scrollWidth, behavior: 'smooth' });
        updateArrows();
    }

    function updateArrows() {
        var scrollLeft = filterBar.scrollLeft;
        var maxScrollLeft = filterBar.scrollWidth - filterBar.clientWidth;

        arrowLeft.style.display = (scrollLeft === 0) ? 'none' : 'block';
        arrowRight.style.display = (scrollLeft >= maxScrollLeft) ? 'none' : 'block';
    }

    // Mettre à jour les flèches lorsque l'utilisateur fait défiler la barre de filtre
    filterBar.addEventListener('scroll', updateArrows);

    // Écouter les événements de clic sur les flèches
    arrowLeft.addEventListener('click', scrollLeft);
    arrowRight.addEventListener('click', scrollRight);

    // Mettre à jour l'état initial des flèches
    updateArrows();
});
