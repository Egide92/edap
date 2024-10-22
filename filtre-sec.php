<?php
// Connexion à la base de données
try {
    $nomUtilisateur = 'root';
    $motDePasse = '';
    $pdo = new PDO('mysql:host=localhost;dbname=edap', $nomUtilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données
    $stmt = $pdo->query("SELECT * FROM inscription");
    $inscriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
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
  <link rel="stylesheet" href="css/filtre.css">
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
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
              <?php
                    include 'config.php';

                    try {
                        // Remplacez 'table_filles' par le nom de votre table et 'genre' par le nom de la colonne qui contient le genre.
                        $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE genre = :genre");
                        $stmt->execute(['genre' => 'M']);
                        
                        $count = $stmt->fetchColumn();

                        echo $count;
                    } catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage();
                    }
                ?>
              </span>
              </a>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-female"></i>
              <span class="badge bg-theme">
              <?php
                    include 'config.php';

                    try {
                        // Remplacez 'table_filles' par le nom de votre table et 'genre' par le nom de la colonne qui contient le genre.
                        $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE genre = :genre");
                        $stmt->execute(['genre' => 'F']);
                        
                        $count = $stmt->fetchColumn();

                        echo $count;
                    } catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage();
                    }
                ?>

              </span>
              </a>
            
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
           
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-group"></i>
              <span class="badge bg-warning">
             <?php
            // Inclure le fichier de configuration
            include 'config.php';

            // Nom de la table
            $tableName = 'inscription';

            try {
                // Préparer et exécuter la requête SQL
                $sql = "SELECT COUNT(*) FROM $tableName";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                // Récupérer le résultat
                $count = $stmt->fetchColumn();

                // Afficher le résultat dans le message souhaité
                echo  $count;
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }

            // Fermer la connexion
            $pdo = null;
            ?>

              </span>
              </a>
            
          </li>
          
          <li id="header_notification_bar" class="dropdown">
            <a class="dropdown-toggle" href="filtre.php">
              <i class="fa fa-filter"></i>
              <span id="toggleButton">Filtrer</span>
              </a>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
        </li>
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Déconnecxion</a></li>
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
          <p class="centered"><a href=""><img src="img/sec.png" class="img-circle" width="80"></a></p>
          <h5 class="centered">Secrétariat</h5>
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
              <span class="label label-theme pull-right mail-info"><?php
                    include 'config.php';

                    try {
                        // Remplacez 'table_filles' par le nom de votre table et 'genre' par le nom de la colonne qui contient le genre.
                        $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE section = :section");
                        $stmt->execute(['section' => 'sec']);
                        
                        $count = $stmt->fetchColumn();

                        echo $count;
                    } catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage();
                    }
                ?>
              </span>
              </a>
            <ul class="sub">
                <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">7ème</i>
                  <span class="badge bg-warning">
                  <?php
                    // Inclure le fichier de configuration
                    include 'config.php';

                    // Nom de la table
                    try {
                        // Préparez la requête avec des paramètres pour la classe et la section
                        $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE classe = :classe AND section = :section");

                        // Définir les valeurs des paramètres
                        $params = [
                            'classe' => '7ème', // Remplacez par la classe souhaitée
                            'section' => 'Sec'    // Remplacez par la section souhaitée
                        ];

                        // Exécutez la requête avec les paramètres
                        $stmt->execute($params);
                        
                        // Récupérez le nombre d'inscriptions
                        $count = $stmt->fetchColumn();

                        // Affichez le résultat
                        echo  $count;
                    } catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage();
                    }
                    ?>
                  </span>
                  </a>
                </li>
              <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">8ème</i>
                  <span class="badge bg-warning">
                <?php
                // Inclure le fichier de configuration
                include 'config.php';

                // Nom de la table
                try {
                  // Préparez la requête avec des paramètres pour la classe et la section
                  $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE classe = :classe AND section = :section");

                  // Définir les valeurs des paramètres
                  $params = [
                      'classe' => '8ème', // Remplacez par la classe souhaitée
                      'section' => 'Sec'    // Remplacez par la section souhaitée
                  ];

                  // Exécutez la requête avec les paramètres
                  $stmt->execute($params);
                  
                  // Récupérez le nombre d'inscriptions
                  $count = $stmt->fetchColumn();

                  // Affichez le résultat
                  echo  $count;
              } catch (PDOException $e) {
                  echo 'Erreur : ' . $e->getMessage();
              }
              ?>
              </sapn>
            </a>
            </li>
          </ul>
        </li>
        <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Pédagogie</span>
              <span class="label label-theme pull-right mail-info">
                  <?php 
                  include 'config.php';

                      try {
                          // Remplacez 'table_filles' par le nom de votre table et 'genre' par le nom de la colonne qui contient le genre.
                          $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE section = :section");
                          $stmt->execute(['section' => 'Péd']);
                          
                          $count = $stmt->fetchColumn();

                          echo $count;
                      } catch (PDOException $e) {
                          echo 'Erreur : ' . $e->getMessage();
                      }
                      ?>
              </span>
            </a>
            <ul class="sub">
                <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">&nbsp;1ère &nbsp; HP</i>
                  <span class="badge bg-warning">
                  <?php
                    // Inclure le fichier de configuration
                    include 'config.php';

                    // Nom de la table
                    try {
                        // Préparez la requête avec des paramètres pour la classe et la section
                        $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE classe = :classe AND section = :section");

                        // Définir les valeurs des paramètres
                        $params = [
                            'classe' => '1ère', // Remplacez par la classe souhaitée
                            'section' => 'Péd'    // Remplacez par la section souhaitée
                        ];

                        // Exécutez la requête avec les paramètres
                        $stmt->execute($params);
                        
                        // Récupérez le nombre d'inscriptions
                        $count = $stmt->fetchColumn();

                        // Affichez le résultat
                        echo  $count;
                    } catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage();
                    }
                    ?>
                  </span>
                    </a>
                  </li>
              <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">&nbsp;2ème HP</i>
                  <span class="badge bg-warning">
                <?php
                // Inclure le fichier de configuration
                include 'config.php';

                // Nom de la table
                try {
                  // Préparez la requête avec des paramètres pour la classe et la section
                  $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE classe = :classe AND section = :section");

                  // Définir les valeurs des paramètres
                  $params = [
                      'classe' => '2ème', // Remplacez par la classe souhaitée
                      'section' => 'Péd'    // Remplacez par la section souhaitée
                  ];

                  // Exécutez la requête avec les paramètres
                  $stmt->execute($params);
                  
                  // Récupérez le nombre d'inscriptions
                  $count = $stmt->fetchColumn();

                  // Affichez le résultat
                  echo  $count;
              } catch (PDOException $e) {
                  echo 'Erreur : ' . $e->getMessage();
              }
              ?>
              </span>
            </a>
            </li>
            <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">&nbsp;3ème HP</i>
                  <span class="badge bg-warning">
                <?php
                // Inclure le fichier de configuration
                include 'config.php';

                // Nom de la table
                try {
                  // Préparez la requête avec des paramètres pour la classe et la section
                  $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE classe = :classe AND section = :section");

                  // Définir les valeurs des paramètres
                  $params = [
                      'classe' => '3ème', // Remplacez par la classe souhaitée
                      'section' => 'Péd'    // Remplacez par la section souhaitée
                  ];

                  // Exécutez la requête avec les paramètres
                  $stmt->execute($params);
                  
                  // Récupérez le nombre d'inscriptions
                  $count = $stmt->fetchColumn();

                  // Affichez le résultat
                  echo  $count;
              } catch (PDOException $e) {
                  echo 'Erreur : ' . $e->getMessage();
              }
              ?>
              </span>
              </a>
             </li>
            <li id="header_notification_bar" class="dropdown">
                <a class="dropdown-toggle" href="#">
                  <i class="fa fa-group">&nbsp;4ème HP</i>
                  <span class="badge bg-warning">
                <?php
                // Inclure le fichier de configuration
                include 'config.php';

                // Nom de la table
                try {
                  // Préparez la requête avec des paramètres pour la classe et la section
                  $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE classe = :classe AND section = :section");

                  // Définir les valeurs des paramètres
                  $params = [
                      'classe' => '4ème', // Remplacez par la classe souhaitée
                      'section' => 'Péd'    // Remplacez par la section souhaitée
                  ];

                  // Exécutez la requête avec les paramètres
                  $stmt->execute($params);
                  
                  // Récupérez le nombre d'inscriptions
                  $count = $stmt->fetchColumn();

                  // Affichez le résultat
                  echo  $count;
              } catch (PDOException $e) {
                  echo 'Erreur : ' . $e->getMessage();
              }
              ?>
              </span>
              </a>
             </li>
             <li id="header_notification_bar" class="dropdown">
                  <a class="dropdown-toggle" href="#">
                    <i class="fa fa-group">&nbsp;5ème HP</i>
                    <span class="badge bg-warning">
                  <?php
                  // Inclure le fichier de configuration
                  include 'config.php';

                  try {
                    // Préparez la requête avec des paramètres pour la classe et la section
                    $stmt = $pdo->prepare("SELECT COUNT(*) FROM inscription WHERE classe = :classe AND section = :section");

                    // Définir les valeurs des paramètres
                    $params = [
                        'classe' => '5ème', // Remplacez par la classe souhaitée
                        'section' => 'Péd'    // Remplacez par la section souhaitée
                    ];

                    // Exécutez la requête avec les paramètres
                    $stmt->execute($params);
                    
                    // Récupérez le nombre d'inscriptions
                    $count = $stmt->fetchColumn();

                    // Affichez le résultat
                    echo  $count;
                } catch (PDOException $e) {
                    echo 'Erreur : ' . $e->getMessage();
                }
                ?>
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
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- CHART PANELS -->
            
            <form class="form-inline" role="form" method="GET" action="index.php" >
            <div class="form-group">
                <select id="elementsParPage" class="form-control" name="elementsParPage">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                <button class="btn btn-theme" type="submit">Appliquer</button>
              </div>
            </form>  
            
            
              <!--filtre-->
              <form class="form-inline" role="form" method="GET" action="filtre.php">
                <div class="filtre">
                  <!-- <label for="classe">Classe :</label>
                  <input type="text" id="classe" name="classe">-->
                  <label for="classe">classe :</label>
                  <select id="classe" class="form-control" name="classe">
                      <option value="">Tous</option>
                      <option value="7ème">Septième</option>
                      <option value="8ème">Huitième</option>
                      <option value="1ère">Première</option>
                      <option value="2ème">Deuxième</option>
                      <option value="3ème">Troisième</option>
                      <option value="4ème">Quatrième</option>
                      <option value="5ème">Cinquième</option>
                  </select>
                  <label for="genre">Genre :</label>
                  <select id="genre" class="form-control" name="genre">
                      <option value="">Tous</option>
                      <option value="M">Masculin</option>
                      <option value="F">Féminin</option>
                  </select>
                  
                  <label for="etatClasse">État de la Classe  :</label>
                  <select id="etatClasse" class="form-control" name="etatClasse">
                      <option value="">Tous</option>
                      <option value="Montante">Montante</option>
                      <option value="Doublante">Doublante</option>
                  </select>
                  
                  <button  class="btn btn-theme" type="submit">Filtrer</button>
                  </div>
              </form>
              </div>
              </div>
<!--filtre fin-->
<?php
// Connexion à la base de données
try {
    $nomUtilisateur = 'root';
    $motDePasse = '';
    $pdo = new PDO('mysql:host=localhost;dbname=edap', $nomUtilisateur, $motDePasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Construction de la requête SQL avec les critères
    $sql = "SELECT * FROM inscription WHERE 1=1";
    $params = [];

    if (!empty($_GET['classe'])) {
        $sql .= " AND classe = :classe";
        $params[':classe'] = $_GET['classe'];
    }
    if (!empty($_GET['genre'])) {
        $sql .= " AND genre = :genre";
        $params[':genre'] = $_GET['genre'];
    }
    if (!empty($_GET['etatClasse'])) {
        $sql .= " AND etatClasse = :etatClasse";
        $params[':etatClasse'] = $_GET['etatClasse'];
    }

    // Préparez et exécutez la requête SQL
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    // Affichez les données
  ?>
  <div class="tablefiltre">
  <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Liste des inscrits</h4>
                <hr>
                <thead>
                
            <tr>
              <th>Noms</th>
              <th>Genre</th>
              <th>Nom du Père</th>
              <th>Age</th>
              <th>Classe</th>
              <th>Nom de la Mère</th>
              <th>Adresse</th>
              <th>État de la Class</th>
              <th>Bulletin</th>
              <th>École Provenance</th>
              <th>Section</th>
              <th>Contact</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>";
          <?php
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
        echo "<tbody>
                <tr>";
        echo "<td>" . htmlspecialchars($row['noms']) . "</td>";
        echo "<td>" . htmlspecialchars($row['genre']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nompere']) . "</td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['classe']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nommere']) . "</td>";
        echo "<td>" . htmlspecialchars($row['adresse']) . "</td>";
        echo "<td>" . htmlspecialchars($row['etatClasse']) . "</td>";
        echo "<td><a href='" . htmlspecialchars($row['bulletin']) . "' target='_blank'>Voir le bulletin</a></td>";
        echo "<td>" . htmlspecialchars($row['ecoleprov']) . "</td>";
        echo "<td>" . htmlspecialchars($row['section']) . "</td>";
        echo "<td>" . htmlspecialchars($row['numTel']) . "</td>";
        echo "<td>"; 
        $date = new DateTime($row['date']);
        echo htmlspecialchars($date->format('d/m/Y'));
        echo "</td>";

        echo "<td>";
        echo '<a href="edit.php?id=' . $row['id'] . '"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>';
        echo '<a href="delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cet enregistrement ?\');"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>';
        echo "</td>";


        echo "</tr>";
        echo "</tbody>
                </tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
          </div>              
          </div>
        </div>
      </section>
      <!-- /wrapper -->
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

</body>

</html>