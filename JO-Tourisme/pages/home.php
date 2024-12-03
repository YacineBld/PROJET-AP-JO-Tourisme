<?php
// Vérifiez que $c_User est bien instancié et accessible ici.
if ($c_User != null) {
    // Récupération des données des hôtels, restaurants, etc.
    $lesHotels = $c_User->selectAllHotels();  // Cette méthode doit exister dans la classe ControleurUser
    $lesRestaurants = $c_User->selectAllRestaurants();
    $lesSports = $c_User->selectAllSports();
    $lesCultures = $c_User->selectAllCultures();
} else {
    echo "Erreur : Le contrôleur utilisateur n'a pas été initialisé correctement.";
}

require_once("composants/carroussel-home.php");  // Composant carroussel

// Traitement des formulaires POST
if(isset($_POST['Hotels'])){
    require_once("vue/vue_les_hotels.php");
    // Optionnel : Vous pouvez récupérer à nouveau les hôtels si nécessaire ici
    $lesHotels = $c_User->selectAllHotels();
}

if(isset($_POST['Restaurants'])){
    require_once("vue/vue_les_restaurants.php");
    // Optionnel : Vous pouvez récupérer à nouveau les restaurants si nécessaire ici
    $lesRestaurants = $c_User->selectAllRestaurants();
}

if(isset($_POST['Loisirs'])){
    require_once("vue/vue_les_loisirs.php");
    // Optionnel : Vous pouvez récupérer à nouveau les sports et cultures si nécessaire ici
    $lesSports = $c_User->selectAllSports();
    $lesCultures = $c_User->selectAllCultures();
}
?>


