<?php
include_once 'C:/wamp64/www/edap/config.php';// Inclure le fichier de configuration

function getTotalSecValide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND section = 'sec'"; // Filtre pour l'état "validé" et section "sec"
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

$totalSecValide = getTotalSecValide();

function getTotalSec7emeValide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND section = 'Sec' AND classe = '7ème'"; // Filtre pour l'état "validé", section "Sec" et classe "7ème"
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

$totalSec7emeValide = getTotalSec7emeValide();

function getTotalSec8emeValide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND section = 'Sec' AND classe = '8ème'"; // Filtre pour l'état "validé", section "Sec" et classe "8ème"
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

$totalSec8emeValide = getTotalSec8emeValide();

function getTotalPedaValide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND section = 'Péd'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
$totalPedaValide = getTotalPedaValide();

function getTotalPeda1Valide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND section = 'Péd' AND classe = '1ère'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
$totalPeda1Valide = getTotalPeda1Valide();

function getTotalPeda2Valide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND section = 'Péd' AND classe ='2ème'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
$totalPeda2Valide = getTotalPeda2Valide();

function getTotalPeda3Valide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND section = 'Péd' AND classe ='3ème'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
$totalPeda3Valide = getTotalPeda3Valide();

function getTotalPeda4Valide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND section = 'Péd' AND classe ='4ème'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
$totalPeda4Valide = getTotalPeda4Valide();

function getTotalPeda5Valide() {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND section = 'Péd' AND classe ='5ème'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
$totalPeda5Valide = getTotalPeda5Valide();
?>
