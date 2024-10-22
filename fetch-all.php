<?php
include 'config.php';

$stmt = $pdo->prepare("SELECT noms, genre, nomPere, age, classe, nomMere, adresse, etatClasse, bulletin, ecoleProv, section, numTel, date FROM inscription");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);
?>
