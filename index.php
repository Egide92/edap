<?php
include 'config.php';
include 'total_general.php'; // Inclure le total général 


$search = isset($_GET['search']) ? $_GET['search'] : '';

function getValidatedInscriptions($search) {
    $pdo = getConnection();
    // Utilisation uniquement de paramètres nommés
    $sql = "SELECT * FROM inscription WHERE etat = 'validé' AND noms LIKE :search";
    $stmt = $pdo->prepare($sql);
    
    // Lier les valeurs
    $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTotalValidatedInscriptions($search) {
    $pdo = getConnection();
    $sql = "SELECT COUNT(*) FROM inscription WHERE etat = 'validé' AND noms LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchColumn();
}

// Récupérer toutes les inscriptions validées sans pagination
$inscriptions = getValidatedInscriptions($search);
$totalInscriptions = getTotalValidatedInscriptions($search);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>EDAP ISP/Walungu</title>

  <!-- Favicons -->
  <link href="img/m4.jpg" rel="icon">
  <link href="img/m4.jpg" rel="apple-touch-icon">

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
          <li>
          <a class="logout" href="inscription.php">
          <i class="fa fa-book"></i> Inscription</a>
        </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="img/m5.jpg" class="img-circle" width="120"></a></p>
          <h5 class="centered"></h5>
          <li class="mt">
            <a href="lock_screen.php">
              <i class="fa fa-home"></i>
              <span>Admin</span>
            </a> </li>
            <li><a href="inscription.php">
              <i class="fa fa-book"></i>
              <span>S'inscrire</span>
              </a></li>
            <li><a href="tel:+243 992869153">
              <i class="fa fa-phone"></i>
              <span>Appel au +243 992869153</span>
            </a></li>
            <li><a href="https://api.whatsapp.com/send?phone=243992869153">
              <i class="fa fa-whatsapp"></i>
              <span>Appel ou Message WhatsApp </span>
            </a></li>
            <li><a href="#">
              <i class="fa fa-envelope"></i>
              <span>E-mail </span>
            </a></li>
            
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
    <div class="table-responsive" style="width: 100%;overflow-x: auto;"> 
    <table cellpadding="0" cellspacing="0" border="1" class="display table table-bordered" id="hidden-table-info">
        <thead>
            <tr>
                <th>Noms</th>
                <th>Genre</th>
                <th>Âge</th>
                <th>Classe</th>
                <th>État/ Classe</th>
                <th>Section</th>
                <th>Éco de Prov</th>
                <th>Nom/ Père</th>
                <th>Nom/ Mère</th>
                <th>Adresse</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($inscriptions)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Aucune inscription validée.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($inscriptions as $inscription): ?>
                      <tr>
                      <td><?php echo htmlspecialchars($inscription['noms']); ?></td>
                      <td><?php echo htmlspecialchars($inscription['genre']); ?></td>
                      <td><?php echo htmlspecialchars($inscription['age']); ?></td>
                      <td><?php echo htmlspecialchars($inscription['classe']); ?></td>
                      <td><?php echo htmlspecialchars($inscription['etatClasse']); ?></td>
                      <td><?php echo htmlspecialchars($inscription['section']); ?></td>
                      <td><?php echo htmlspecialchars($inscription['ecoleprov']); ?></td>
                      <td><?php echo htmlspecialchars($inscription['nompere']); ?></td>
                      <td><?php echo htmlspecialchars($inscription['nommere']); ?></td>
                      <td><?php echo htmlspecialchars($inscription['adresse']); ?></td>
                    
                  </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
        </tbody>
    </table>
          </div>
          </div>
</section>
</section>

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