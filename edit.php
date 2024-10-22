<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Démarre la session seulement si elle n'est pas déjà active
}
require_once 'C:/wamp64/www/edap/config.php'; // Inclure une seule fois
require_once 'C:/wamp64/www/edap/auth.php'; // Inclure une seule fois
require_once 'sections/all_sections.php';
require_once 'total_general.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: includes/login.php'); // Redirigez vers la page de connexion si non connecté
    exit();
}

// Récupérer les informations de l'utilisateur
$userInfo = getUserInfo();
$username = $userInfo['username'];
$photo = $userInfo['photo'] ?? 'uploads/default.jpg'; // Chemin vers la photo par défaut

$inscription = null;

// Vérifiez si un ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $pdo = getConnection();
    
    // Récupérer l'inscription à modifier
    $stmt = $pdo->prepare("SELECT * FROM inscription WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $inscription = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $inscription) {
    // Récupérer les données du formulaire
    $noms = $_POST['noms'];
    $genre = $_POST['genre'];
    $nompere = $_POST['nompere'];
    $age = $_POST['age'];
    $classe = $_POST['classe'];
    $nommere = $_POST['nommere'];
    $adresse = $_POST['adresse'];
    $etatClasse = $_POST['etatClasse'];
    $ecoleprov = $_POST['ecoleprov'];
    $section = $_POST['section'];
    $numTel = $_POST['numTel'];
    $etat = $_POST['etat'];

    // Gestion du fichier bulletin
    $bulletin = $inscription['bulletin']; // Valeur par défaut pour le bulletin
    if (isset($_FILES['bulletin']) && $_FILES['bulletin']['error'] == UPLOAD_ERR_OK) {
        $bulletin = $_FILES['bulletin']['name'];
        move_uploaded_file($_FILES['bulletin']['tmp_name'], "uploads/" . $bulletin);
    }

    // Mettre à jour l'inscription
    $stmt = $pdo->prepare("UPDATE inscription SET noms = :noms, genre = :genre, nompere = :nompere, age = :age, classe = :classe, nommere = :nommere, adresse = :adresse, etatClasse = :etatClasse, bulletin = :bulletin, ecoleprov = :ecoleprov, section = :section, numTel = :numTel, etat = :etat WHERE id = :id");

    // Lier les valeurs
    $stmt->bindValue(':noms', $noms);
    $stmt->bindValue(':genre', $genre);
    $stmt->bindValue(':nompere', $nompere);
    $stmt->bindValue(':age', $age);
    $stmt->bindValue(':classe', $classe);
    $stmt->bindValue(':nommere', $nommere);
    $stmt->bindValue(':adresse', $adresse);
    $stmt->bindValue(':etatClasse', $etatClasse);
    $stmt->bindValue(':bulletin', $bulletin);
    $stmt->bindValue(':ecoleprov', $ecoleprov);
    $stmt->bindValue(':section', $section);
    $stmt->bindValue(':numTel', $numTel);
    $stmt->bindValue(':etat', $etat);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    if ($stmt->execute()) {
        header('Location: all_data.php');
        exit();
    } else {
        // Affichez les erreurs SQL
        echo "Erreur lors de la mise à jour : " . implode(", ", $stmt->errorInfo());
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>EDAP ISP WALUNGU</title>
    <link href="api/img/logo.jpg" rel="icon">
    <link href="api/img/logo.jpg" rel="apple-touch-icon">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <script src="lib/chart-master/Chart.js"></script>
    <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <style>
        .table-responsive {
            width: 100%;
            overflow-x: auto; /* Permet le défilement horizontal si nécessaire */
        }
    </style>
</head>
<body>
<section id="container">
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <a href="index.php" class="logo"><b>EDAP-ISP<span>WALUNGU</span></b></a>
        <div class="nav notify-row" id="top_menu">
            <ul class="nav top-menu">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <i class="fa fa-male"></i>
                        <span class="badge bg-theme"><?= htmlspecialchars($totalGarconValide) ?></span>
                    </a>
                </li>
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <i class="fa fa-female"></i>
                        <span class="badge bg-theme"><?= htmlspecialchars($totalFilleValide) ?></span>
                    </a>
                </li>
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <i class="fa fa-group"></i>
                        <span class="badge bg-warning"><?= htmlspecialchars($totalInscriptionsValide) ?></span>
                    </a>
                </li>
            </ul>
        </li>
        </div>
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="logout.php">Déconnexion</a></li>
            </ul>
        </div>
    </header>

    <aside>
        <div id="sidebar" class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered">
                <?php if ($photo): ?>
                    <a href=""><img src="<?= htmlspecialchars($photo) ?>" alt="Photo de profil" class="img-circle" style="width: 150px; height: auto;"></a>
                <?php endif; ?>
                </p>
                <h5 class="centered"><?= htmlspecialchars($username) ?></h5>
                <li class="mt">
                    <a class="active" href="">
                        <i class="fa fa-dashboard"></i>
                        <span>Nos sections</span>
                    </a>
                </li>
                <!-- Ajoutez d'autres sections ici -->
            </ul>
        </div>
    </aside>

    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-shopping-cart"></i> Remplissez le formulaire svp!! <a href="index.php"><button class="btn btn-large btn-danger pull-right"><i class="fa fa-reply-all"></i> Retour</button></a> </h3>
            <br><br>

            <form method="POST" action="edit.php?id=<?= htmlspecialchars($inscription['id'] ?? '') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" class="form-control" value="<?= htmlspecialchars($inscription['id'] ?? '') ?>">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="noms" class="form-control" value="<?= htmlspecialchars($inscription['noms'] ?? '') ?>" required>
                            <label for="floatingInput1">Votre Nom Complet</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="nompere" class="form-control" value="<?= htmlspecialchars($inscription['nompere'] ?? '') ?>" required>
                            <label for="floatingInput2">Nom du Père</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <select name="genre" class="form-select" required>
                                <option value="" disabled selected>Selectionnez votre Genre</option>
                                <option value="M" <?= ($inscription['genre'] == 'M') ? 'selected' : ''; ?>>Masculin</option>
                                <option value="F" <?= ($inscription['genre'] == 'F') ? 'selected' : ''; ?>>Féminin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="age" class="form-control" value="<?= htmlspecialchars($inscription['age'] ?? '') ?>" required>
                            <label for="floatingInput3">Votre age</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="nommere" class="form-control" value="<?= htmlspecialchars($inscription['nommere'] ?? '') ?>" required>
                            <label for="floatingInput4">Nom de la Mère</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <select name="classe" class="form-select" required>
                                <option value="" disabled selected>Selectionnez la Classe</option>
                                <option value="7ème" <?= ($inscription['classe'] == '7ème') ? 'selected' : ''; ?>>Septième</option>
                                <option value="8ème" <?= ($inscription['classe'] == '8ème') ? 'selected' : ''; ?>>Huitième</option>
                                <option value="1ère" <?= ($inscription['classe'] == '1ère') ? 'selected' : ''; ?>>Première</option>
                                <option value="2ème" <?= ($inscription['classe'] == '2ème') ? 'selected' : ''; ?>>Deuxième</option>
                                <option value="3ème" <?= ($inscription['classe'] == '3ème') ? 'selected' : ''; ?>>Troisième</option>
                                <option value="4ème" <?= ($inscription['classe'] == '4ème') ? 'selected' : ''; ?>>Quatrième</option>
                                <option value="5ème" <?= ($inscription['classe'] == '5ème') ? 'selected' : ''; ?>>Cinquième</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="adresse" class="form-control" value="<?= htmlspecialchars($inscription['adresse'] ?? '') ?>" required>
                            <label for="floatingInput5">Votre Adresse Actuelle</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="file" name="bulletin" class="form-control" accept="application/pdf">
                            <label for="floatingInput6">Joignez votre Bulletin (facultatif)</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <select name="etatClasse" class="form-select" required>
                                <option value="" disabled selected>Etat de la Classe</option>
                                <option value="Montante" <?= ($inscription['etatClasse'] == 'Montante') ? 'selected' : ''; ?>>Montante</option>
                                <option value="Doublante" <?= ($inscription['etatClasse'] == 'Doublante') ? 'selected' : ''; ?>>Doublante</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="text" name="ecoleprov" class="form-control" value="<?= htmlspecialchars($inscription['ecoleprov'] ?? '') ?>" required>
                            <label for="floatingInput7">École de Provenance</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <input type="number" name="numTel" class="form-control" value="<?= htmlspecialchars($inscription['numTel'] ?? '') ?>" required>
                            <label for="floatingInput8">Votre numéro</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating">
                            <select name="section" class="form-select" required>
                                <option value="" disabled selected>Selectionnez la Section</option>
                                <option value="Sec" <?= ($inscription['section'] == 'Sec') ? 'selected' : ''; ?>>Secondaire</option>
                                <option value="Péd" <?= ($inscription['section'] == 'Péd') ? 'selected' : ''; ?>>Pédagogie</option>
                                <option value="T.S" <?= ($inscription['section'] == 'T.S') ? 'selected' : ''; ?>>T. Sociale</option>
                                <option value="T.V" <?= ($inscription['section'] == 'T.V') ? 'selected' : ''; ?>>T. Vétérinaire</option>
                                <option value="M.P" <?= ($inscription['section'] == 'M.P') ? 'selected' : ''; ?>>M. Physique</option>
                                <option value="CG" <?= ($inscription['section'] == 'CG') ? 'selected' : ''; ?>>C. Gestion</option>
                                <option value="BC" <?= ($inscription['section'] == 'BC') ? 'selected' : ''; ?>>B Chimie</option>
                            </select>
                        </div>
                    </div><br><br>
                    <div class="col-md-4 mb-3">
                      <div class="form-floating">
                          <select name="etat" class="form-select" required>
                              <option value="" disabled selected>Selectionnez l'état</option>
                              <option value="validé" <?= ($inscription['etat'] == 'validé') ? 'selected' : ''; ?>>Validé</option>
                              <option value="en attente" <?= ($inscription['etat'] == 'en attente') ? 'selected' : ''; ?>>En attente</option>
                          </select>
                          <label for="etat">État</label>
                      </div>
                  </div>

                </div>

                <br>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </section>
    </section>

    <footer class="site-footer">
        <div class="text-center">
            <p>&copy; Copyrights <strong>PUBMODELS</strong>. All Rights Reserved</p>
            <div class="credits" style="color: aqua;">
                <p>Created by <a href="https://www.linkedin.com/in/egide-batera-81057a217/?originalSubdomain=cd"><em>NEEMA COUTURE</em></a> &nbsp;<?= date('Y') ?></p>
            </div>
            <a href="panels.html#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
</section>

<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="lib/jquery.sparkline.js"></script>
<script src="lib/common-scripts.js"></script>
<script src="lib/sparkline-chart.js"></script>
</body>
</html>
