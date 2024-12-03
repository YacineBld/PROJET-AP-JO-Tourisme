<?php
// Démarrer une session pour vérifier si l'utilisateur est connecté
session_start();
 
// Vérifier si l'utilisateur est connecté et s'il a un rôle 'clientPro' ou 'clientPart'
// Si l'utilisateur n'est pas authentifié, il est redirigé vers la page de connexion
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'clientPro' && $_SESSION['role'] !== 'clientPart')) {
    header('Location: index.php'); // Redirige vers la page d'accueil ou de connexion si non connecté
    exit(); // Arrêter l'exécution du script après la redirection
}
 
// Inclure les fichiers nécessaires pour se connecter à la base de données et accéder aux méthodes du modèle
require_once('../modele/modeleUser.class.php'); // Inclut la classe modèle User
require_once('../controleur/config_bdd.php'); // Inclut la configuration de la connexion à la BDD
 
// Vérifier si le formulaire a été soumis via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les nouveaux mots de passe saisis par l'utilisateur
    // Si la valeur n'existe pas, on initialise une variable vide
    $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
 
    // Vérifier si les mots de passe saisis correspondent
    if ($new_password !== $confirm_password) {
        // Si les mots de passe ne correspondent pas, afficher un message d'erreur
        echo "<script>alert('Les nouveaux mots de passe ne correspondent pas.');</script>";
    } else {
        // Si les mots de passe correspondent, récupérer l'ID de l'utilisateur connecté
        $iduser = $_SESSION['iduser'];
 
        // Créer une instance de la classe ModeleUser avec les paramètres de la connexion à la BDD
        // On passe ici les paramètres de la BDD pour se connecter à la base de données
        $modeleUser = new ModeleUser($serveur, $serveur2, $bdd, $user, $mdp, $mdp2);
 
        // Appeler la méthode 'modifierMotDePasse' du modèle pour modifier le mot de passe
        // On passe l'ID de l'utilisateur et le nouveau mot de passe
        if ($modeleUser->modifierMotDePasse($iduser, $new_password)) {
            // Si la modification réussit, afficher un message de succès
            echo "<script>alert('Mot de passe modifié avec succès.');</script>";
        } else {
            // Si une erreur se produit lors de la modification, afficher un message d'erreur
            echo "<script>alert('Erreur lors de la modification du mot de passe.');</script>";
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le mot de passe</title>
</head>
<body>
 
<h2>Modifier le mot de passe</h2>
 
<!-- Formulaire permettant à l'utilisateur de modifier son mot de passe -->
<form method="POST" action="vue_modifier_mdp.php">
   
    <!-- Champ pour saisir le nouveau mot de passe -->
    <label for="new_password">Nouveau mot de passe :</label>
    <input type="password" name="new_password" id="new_password" required><br><br>
   
    <!-- Champ pour confirmer le nouveau mot de passe -->
    <label for="confirm_password">Confirmer le nouveau mot de passe :</label>
    <input type="password" name="confirm_password" id="confirm_password" required><br><br>
   
    <!-- Bouton pour soumettre le formulaire -->
    <button type="submit">Modifier le mot de passe</button>
</form>
 
</body>
</html>
