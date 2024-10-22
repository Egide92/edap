<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Démarre la session seulement si elle n'est pas déjà active
}
require_once 'C:/wamp64/www/edap/config.php'; // Inclure une seule fois
require_once 'C:/wamp64/www/edap/auth.php'; // Inclure une seule fois

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: includes/login.php'); // Redirigez vers la page de connexion si non connecté
    exit();
}

// Vérifiez si un ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $pdo = getConnection();
    
    // Préparer la requête de suppression
    $stmt = $pdo->prepare("DELETE FROM inscription WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Rediriger après la suppression
    header('Location: inscriptions.php'); // Changez le nom de la page si nécessaire
    exit();
} else {
    // Redirigez vers la page des inscriptions si aucun ID n'est fourni
    header('Location: inscriptions.php');
    exit();
}
?>
