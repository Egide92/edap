<?php
require_once 'C:/wamp64/www/edap/config.php'; // Inclusion de la connexion à la base de données
$pdo = getConnection();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_FILES['photo'])) {
        $username = trim($_POST['username']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

        // Gestion du fichier photo
        $photo = $_FILES['photo'];
        $photoName = uniqid() . '_' . basename($photo['name']);
        $targetDir = "uploads/"; // Dossier où les images seront enregistrées
        $targetFile = $targetDir . $photoName;
        $uploadOk = 1;

        // Vérifier les erreurs de téléchargement
        if ($photo['error'] !== UPLOAD_ERR_OK) {
            echo "Erreur lors du téléchargement du fichier.";
            $uploadOk = 0;
        }

        // Vérifier si le fichier est une image
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $check = getimagesize($photo['tmp_name']);
        if ($check === false) {
            echo "Ce n'est pas une image.";
            $uploadOk = 0;
        }

        // Vérifier la taille du fichier
        if ($photo['size'] > 500000) { // Limite de 500 Ko
            echo "Désolé, votre fichier est trop grand.";
            $uploadOk = 0;
        }

        // Autoriser certains formats de fichier
        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            $uploadOk = 0;
        }

        // Vérifier le nom d'utilisateur
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            echo "Le nom d'utilisateur ne doit contenir que des lettres, des chiffres et des underscores.";
            $uploadOk = 0;
        }

        // Vérifier si $uploadOk est à 0 à cause d'une erreur
        if ($uploadOk == 0) {
            echo "Désolé, votre fichier n'a pas été téléchargé.";
        } else {
            // Tenter de télécharger le fichier
            if (move_uploaded_file($photo['tmp_name'], $targetFile)) {
                // Préparation de la requête pour éviter les duplications
                $sql = "INSERT INTO utilisateurs (username, password, photo) VALUES (:username, :password, :photo)";
                $stmt = $pdo->prepare($sql);

                try {
                    $stmt->execute(['username' => $username, 'password' => $password, 'photo' => $targetFile]);
                    // Redirection après succès
                    header('Location: ../lock_screen.php');
                    exit();
                } catch (PDOException $e) {
                    echo "Erreur : " . htmlspecialchars($e->getMessage());
                }
            } else {
                echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            }
        }
    }
}
?>