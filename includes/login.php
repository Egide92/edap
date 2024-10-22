<?php
session_start();
require_once 'C:/wamp64/www/edap/config.php'; // Inclusion de la connexion à la base de données
$pdo = getConnection();

function authenticateUser($username, $password) {
    global $pdo;

    $sql = "SELECT * FROM utilisateurs WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['photo'] = $user['photo']; // Stocker le chemin de la photo
        return true; // Authentification réussie
    }
    return false; // Échec de l'authentification
}

function getUserInfo() {
    if (isset($_SESSION['user_id'])) {
        return [
            'username' => $_SESSION['username'],
            'photo' => $_SESSION['photo'],
        ];
    }
    return null; // Retourne null si l'utilisateur n'est pas connecté
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $message = 'Veuillez remplir tous les champs';
        } else {
            if (authenticateUser($username, $password)) {
                header('Location: ../admin.php?submitted=1');
                exit();
            } else {
                $message = 'Nom d\'utilisateur ou mot de passe incorrect';
            }
        }
    }
}
?>
