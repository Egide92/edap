<?php
include_once 'config.php'; // Utiliser include_once pour éviter les redéfinitions

function getTotalInscriptionsValide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé'"; // Filtre pour l'état "validé"
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

$totalInscriptionsValide = getTotalInscriptionsValide();

function getTotalFilleValide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND genre = 'F'"; // Filtre pour l'état "validé" et genre "F"
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

$totalFilleValide = getTotalFilleValide();

function getTotalGarconValide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND genre = 'M'"; // Filtre pour l'état "validé" et genre "M"
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

$totalGarconValide = getTotalGarconValide();


?>
