
<?php
session_start(); // Démarrer la session

// Détruire toutes les données de session
$_SESSION = []; // Vider la variable de session
session_destroy(); // Détruire la session

// Rediriger vers la page d'accueil
header('Location: index.php');
exit(); // Arrêter le script après redirection
?>
