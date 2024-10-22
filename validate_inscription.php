<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Mettre à jour l'état de l'inscription
    $pdo = getConnection();
    $sql = "UPDATE inscription SET etat = 'validé' WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    // Redirection après validation
    header("Location: admin.php?success=1");
    exit();
}
?>
