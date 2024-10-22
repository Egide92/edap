<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Démarre la session seulement si elle n'est pas déjà active
}

require_once 'C:/wamp64/www/edap/config.php'; // Inclure une seule fois

function authenticateUser($username, $password) {
    $pdo = getConnection(); // Utiliser la fonction définie dans config.php

    $sql = "SELECT * FROM utilisateurs WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['photo'] = 'uploads/' . ($user['photo'] ?? 'default.jpg'); // Chemin vers la photo
        return true; // Authentification réussie
    }
    return false; // Échec de l'authentification
}

function getUserInfo() {
    if (isset($_SESSION['user_id'])) {
        return [
            'username' => $_SESSION['username'] ?? 'Invité', // Valeur par défaut si non définie
            'photo' => $_SESSION['photo'] ?? 'default.jpg', // Valeur par défaut si non définie
        ];
    }
    return [
        'username' => 'Invité', // Valeur par défaut si non connecté
        'photo' => 'default.jpg', // Valeur par défaut si non connecté
    ];
}
?>
