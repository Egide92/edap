<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $nomUtilisateur = 'root';
        $motDePasse = '';
        $pdo = new PDO('mysql:host=localhost;dbname=edap', $nomUtilisateur, $motDePasse);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Mise à jour des données
        $stmt = $pdo->prepare("UPDATE inscription SET noms = :noms, genre = :genre, nompere = :nompere, datenaiss = :datenaiss, classe = :classe, nommere = :nommere, adresse = :adresse, etatClasse = :etatClasse, bulletin = :bulletin, ecoleprov = :ecoleprov, section = :section, email = :email, date = :date WHERE id = :id");
        $params = [
            ':id' => $_POST['id'],
            ':noms' => $_POST['noms'],
            ':genre' => $_POST['genre'],
            ':nompere' => $_POST['nompere'],
            ':datenaiss' => $_POST['datenaiss'],
            ':classe' => $_POST['classe'],
            ':nommere' => $_POST['nommere'],
            ':adresse' => $_POST['adresse'],
            ':etatClasse' => $_POST['etatClasse'],
            ':bulletin' => $_POST['bulletin'],
            ':ecoleprov' => $_POST['ecoleprov'],
            ':section' => $_POST['section'],
            ':email' => $_POST['email'],
            ':date' => $_POST['date']
        ];
        $stmt->execute($params);

        header('Location: index.php');
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>
<?php
if (isset($_GET['id'])) {
    try {
        $nomUtilisateur = 'root';
        $motDePasse = '';
        $pdo = new PDO('mysql:host=localhost;dbname=edap', $nomUtilisateur, $motDePasse);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données de l'enregistrement
        $stmt = $pdo->prepare("SELECT * FROM inscription WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
        $inscription = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier l'inscription</title>
</head>
<body>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($inscription['id']); ?>">
        <label>Noms :</label>
        <input type="text" name="noms" value="<?php echo htmlspecialchars($inscription['noms']); ?>"><br>
        
        <!-- Ajoutez les autres champs ici -->
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
