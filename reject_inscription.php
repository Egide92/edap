<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Mettre à jour l'état de l'inscription
    $pdo = getConnection();
    $sql = "UPDATE inscription SET etat = 'rejeté' WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    // Redirection après rejet
    header("Location: admin.php?rejected=1");
    exit();
}
?>
