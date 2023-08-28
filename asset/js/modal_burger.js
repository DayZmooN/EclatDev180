let menuBurger = document.querySelector('.menu-burger'); // Sélectionner l'élément avec la classe 'menu-burger'
let navMenu = document.querySelector('.navbar'); // Sélectionner l'élément avec la classe 'navbar'

menuBurger.addEventListener('click', function () {
    if (navMenu.style.display === "block") {
        navMenu.style.display = "none"; // Cacher le menu si déjà affiché
    } else {
        navMenu.style.display = "block"; // Afficher le menu s'il est caché
    }
});



