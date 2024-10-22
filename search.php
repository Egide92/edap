<?php
include 'config.php';

if (isset($_GET['term'])) {
    $term = '%' . $_GET['term'] . '%';
    $stmt = $pdo->prepare("SELECT noms, genre, nomPere, age, classe, nomMere, adresse, etatClasse, bulletin, ecoleProv, section, numTel, date FROM inscription WHERE noms LIKE ? OR nomPere LIKE ? OR nomMere LIKE ? OR adresse LIKE ?");
    $stmt->execute([$term, $term, $term, $term]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($results);
}
?>
