<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noms = $_POST['noms'];
    $age = $_POST['age'];
    $classe = $_POST['classe'];
    $genre = $_POST['genre'];
    $nompere = $_POST['nompere'];
    $nommere = $_POST['nommere'];
    $adresse = $_POST['adresse'];
    $section = $_POST['section'];
    $etatClasse = $_POST['etatClasse'];
    $ecoleprov = $_POST['ecoleprov'];
    $numTel = $_POST['numTel'];
    // Générer un nom de fichier unique pour le bulletin
    $bulletin = uniqid('bulletin_', true) . '.' . pathinfo($_FILES['bulletin']['name'], PATHINFO_EXTENSION);

    // Déplacer le fichier téléchargé
    move_uploaded_file($_FILES['bulletin']['tmp_name'], 'uploads/' . $bulletin);

    // Insérer l'inscription dans la base de données
    $pdo = getConnection();
    $sql = "INSERT INTO inscription (noms, age, classe, genre, nompere, nommere, adresse, section, etatClasse, ecoleprov, numTel, bulletin, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'en attente')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$noms, $age, $classe, $genre , $nompere, $nommere, $adresse, $section, $etatClasse, $ecoleprov, $numTel, $bulletin]);

    // Redirection après soumission
    header("Location: inscription.php");
    exit();
}
?>

