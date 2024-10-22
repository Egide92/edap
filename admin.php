<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Démarre la session seulement si elle n'est pas déjà active
}
require_once 'C:/wamp64/www/edap/config.php'; // Inclure une seule fois
require_once 'C:/wamp64/www/edap/auth.php'; // Inclure une seule fois
include 'total_general.php'; // Inclure le total général 

// Vérifiez si l'utilisateur est connecté
include_once 'sections/all_sections.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: includes/login.php'); // Redirigez vers la page de connexion si non connecté
    exit();
}

// Récupérer les informations de l'utilisateur
$userInfo = getUserInfo();
$username = $userInfo['username'];
$photo = $userInfo['photo'] ?? 'uploads/default.jpg'; // Chemin vers la photo par défaut

$search = isset($_GET['search']) ? $_GET['search'] : '';

function getPendingInscriptions($search) {
    $pdo = getConnection();
    // Utilisation de paramètres nommés sans guillemets
    $sql = "SELECT * FROM inscription WHERE etat = 'en attente' AND noms LIKE :search";
    $stmt = $pdo->prepare($sql);
    
    // Lier les valeurs
    $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$inscriptions = getPendingInscriptions($search);
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

  <!-- Favicons -->
  <link href="api/img/logo.jpg" rel="icon">
  <link href="api/img/logo.jpg" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
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
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>EDAP-ISP<span>WALUNGU</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
        <li class="dropdown">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-male"></i>
              <span class="badge bg-theme">
              <?= htmlspecialchars($totalGarconValide) ?>
              </span>
              </a>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-female"></i>
              <span class="badge bg-theme">
              <?= htmlspecialchars($totalFilleValide) ?>
              </span>
              </a>
            
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
           
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-group"></i>
              <span class="badge bg-warning">
              <?= htmlspecialchars($totalInscriptionsValide) ?>
              </span>
              </a>
            
          </li>
          
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
        </li>
      </div>
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" class="btn btn-primary" href="logout.php">Déconnecxion</a></li>
        </ul>
      </div>
    </header>
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">
          <?php if ($photo): ?>
            <a href=""><img src="img/sec.jpg" alt="Photo de profil" class="img-circle"  style="width: 150px; height: auto;"></a>
          <?php endif; ?>
          </p>
          
          <h5 class="centered"><?= htmlspecialchars($username) ?></h5>
          <li class="mt">
            <a class="bbadge bg-warning" href="all_data.php">
              <i class="fa fa-keyboard-o"></i>
              <span>Gérer les Inscriptions</span>
              </a>
          </li>
          <li class="mt">
            <a class="active" href="">
              <i class="fa fa-dashboard"></i>
              <span>Nos sections</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Secondaire</span>              
              <span class="label label-theme pull-right mail-info">
              <?= htmlspecialchars($totalSecValide) ?>
              </span>
              </a>
            <ul class="sub">
            <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">&nbsp;7ème EB</i>
                  <span class="badge bg-warning">
                  <?= htmlspecialchars($totalSec7emeValide) ?>
                </span>
                </a>
              </li>
              <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">&nbsp;8ème EB</i>
                  <span class="badge bg-warning">
                  <?= htmlspecialchars($totalSec8emeValide)?>
                </span>
                </a>
              </li>
          </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Pédagogie</span>
              <span class="label label-theme pull-right mail-info">
              <?= htmlspecialchars($totalPedaValide)?>
              </span>
            </a>
            <ul class="sub">
                <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">&nbsp;1ère &nbsp; HP</i>
                  <span class="badge bg-warning">
                  <?= htmlspecialchars($totalPeda1Valide)?>
                  </span>
                    </a>
                  </li>
              <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">&nbsp;2ème HP</i>
                  <span class="badge bg-warning">
                 <?= htmlspecialchars($totalPeda2Valide)?>
                </span>
                </a>
              </li>
            <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">&nbsp;3ème HP</i>
                  <span class="badge bg-warning">
                  <?= htmlspecialchars($totalPeda3Valide)?>
              </span>
              </a>
             </li>
            <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">&nbsp;4ème HP</i>
                  <span class="badge bg-warning">
                  <?= htmlspecialchars($totalPeda4Valide)?>
              </span>
              </a>
             </li>
             <li id="header_notification_bar" class="dropdown">
                  <a class="dropdown-toggle" href="#">
                    <i class="fa fa-group">&nbsp;5ème HP</i>
                    <span class="badge bg-warning">
                    <?= htmlspecialchars($totalPeda5Valide)?>
                </span>
                </a>
             </li>
            </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      
    <section class="wrapper site-min-height content-panel">
    <!--Contenu filtre-->
    <div class="row mt adv-table">
        <!-- CHART PANELS -->
    </div>
    <div class="table-responsive" style="width: 100%;overflow-x: auto;"> 
    <table cellpadding="0" cellspacing="0" border="1" class="display table table-bordered" id="hidden-table-info">
        <thead>
            <tr>
                <th>Noms</th>
                <th>Genre</th>
                <th>Âge</th>
                <th>Classe</th>
 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($inscriptions)): ?>
                    <tr>
                        <td colspan="7" class="text-center">Aucune inscription en attente.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($inscriptions as $inscription): ?>
                        <tr>
                            <td><?= htmlspecialchars($inscription['noms']) ?></td>
                            <td><?= htmlspecialchars($inscription['genre']) ?></td>
                            <td><?= htmlspecialchars($inscription['age']) ?></td>
                            <td><?= htmlspecialchars($inscription['classe']) ?></td>
                            
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewModal<?= htmlspecialchars($inscription['id']) ?>"><i class="fa fa-eye"></i>
                            Détails
                        </button>
                                <form action="validate_inscription.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($inscription['id']) ?>">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i></button>
                                </form>
                                <form action="reject_inscription.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($inscription['id']) ?>">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
        </tbody>
    </table>
          </div>
</section>

<!-- Modal -->
<div class="modal fade" id="viewModal<?= htmlspecialchars($inscription['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Détails de l'inscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Noms</th>
                        <td><?= htmlspecialchars($inscription['noms']) ?></td>
                    </tr>
                    <tr>
                        <th>Genre</th>
                        <td><?= htmlspecialchars($inscription['genre']) ?></td>
                    </tr>
                    <tr>
                        <th>Âge</th>
                        <td><?= htmlspecialchars($inscription['age']) ?></td>
                    </tr>
                    <tr>
                        <th>Classe</th>
                        <td><?= htmlspecialchars($inscription['classe']) ?></td>
                    </tr>
                    <tr>
                        <th>Nom/Père</th>
                        <td><?= htmlspecialchars($inscription['nompere']) ?></td>
                    </tr>
                    <tr>
                        <th>Nom/Mère</th>
                        <td><?= htmlspecialchars($inscription['nommere']) ?></td>
                    </tr>
                    <tr>
                        <th>Adresse</th>
                        <td><?= htmlspecialchars($inscription['adresse']) ?></td>
                    </tr>
                    <tr>
                        <th>État/Classe</th>
                        <td><?= htmlspecialchars($inscription['etatClasse']) ?></td>
                    </tr>
                    <tr>
                        <th>Bulletin</th>
                        <td><a href="uploads/<?= htmlspecialchars($inscription['bulletin']) ?>" target="_blank">Voir Bulletin</a></td>
                    </tr>
                    <tr>
                        <th>École/Prov</th>
                        <td><?= htmlspecialchars($inscription['ecoleprov']) ?></td>
                    </tr>
                    <tr>
                        <th>Section</th>
                        <td><?= htmlspecialchars($inscription['section']) ?></td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td><?= htmlspecialchars($inscription['numTel']) ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<!-- /fin modal view -->
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>INSCRIPTION</strong>. All Rights Reserved
        </p>
        <div class="credits" class="color: aqua;">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          <p>Created  by <a href="https://www.linkedin.com/in/egide-batera-81057a217/?originalSubdomain=cd"><em>Edap ISP/Walungu</em></a> &nbsp;<?php echo date('Y')?></p> 
          
        </div>
        <a href="panels.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="js/content.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!-- Inclure jQuery et DataTables -->


<script>
    $(document).ready(function() {
        $('#hidden-table-info').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "language": {
                "lengthMenu": "Afficher _MENU_ enregistrements",
                "zeroRecords": "Aucun enregistrement trouvé",
                "info": "Affichage de la page _PAGE_ sur _PAGES_",
                "infoEmpty": "Aucun enregistrement disponible",
                "infoFiltered": "(filtré de _MAX_ enregistrements au total)",
                "search": "Rechercher:",
                "paginate": {
                    "first": "Premier",
                    "last": "Dernier",
                    "next": "Suivant",
                    "previous": "Précédent"
                }
            }
        });
    });
</script>


</body>

</html>