

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>PUBMODELS_COMMANDE</title>

  <!-- Favicons -->
  <link href="img/m4.jpg" rel="icon">
  <link href="img/m4.jpg" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
<script src="js/age.js"></script>
<script src="js/telephone.js"></script>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
  <style>
        .error {
            color: red;
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
      <a href="index.php" class="logo"><b>EDAP<span>ISP/walungu</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
        
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
          <p class="centered"><a href="#"><img src="img/im2.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"></h5>
          <li class="mt">
            <a href="lock_screen.php">
              <i class="fa fa-home"></i>
              <span>Admin</span>
            </a> </li>
            </li>
            <li><a href="tel:+243 973992892">
              <i class="fa fa-phone"></i>
              <span>Appel au +243 975120416</span>
            </a></li>
            <li><a href="https://api.whatsapp.com/send?phone=243973992892">
              <i class="fa fa-whatsapp"></i>
              <span>Appel ou Message WhatsApp </span>
            </a></li>
            <li><a href="mailto:birindwanshokano027@gmail.com">
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
      <section class="wrapper">
        <h3><i class="fa fa-book"></i> Remplissez le formulaire svp!! <a href="index.php"><button class="btn btn-large btn-danger pull-right"><i class="fa fa-reply-all"></i> Retour</button></a> </h3>
        <br><br>
        <!-- BASIC FORM ELELEMNTS -->
      
    <form action="submit_inscription.php" method="post" enctype="multipart/form-data">
    <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-floating">
                <label for="floatingInput1">Votre Nom Complet</label>
                    <input type="text" name="noms" class="form-control" id="floatingInput1" placeholder="Noms" required>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-floating">
                <label for="floatingInput3">Nom du père</label>
                    <input type="text" name="nompere" class="form-control" id="floatingInput3" placeholder="Nom du père" required>
                    
                </div>
            </div>

            <div class="col-md-4 mb-3">
            <label for="floatingInput1">Votre Genre</label>
                <div class="form-floating">
                    <select name="genre" class="form-control" aria-label="Default select example" required>
                    <option selected>Selectionnez votre Genre</option>
                    <option value="M">Masculin</option>
                    <option value="F">Feminin</option>
                    </select>
                </div>
            </div>           
        </div>
        <br>

        <div class="row">
        <div class="col-md-4 mb-3">
                <div class="form-floating">
                <label for="age">Votre Age</label>
                <input type="number" name="age" class="form-control" id="age" placeholder="Age"  min="10" max="25" required oninput="validateAge()">
                <div id="error-message" class="error"></div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-floating"><label for="floatingInput3">Nom de la mère</label>
                    <input type="text" name="nommere" class="form-control" id="floatingInput3" placeholder="Nom de la mère" required>
                    
                </div>
            </div>

            <div class="col-md-4 mb-3">
            <label for="floatingInput1">La classe</label>
                <div class="form-floating">
                    <select name="classe" class="form-control" aria-label="Default select example" required>
                        <option selected>Selectionnez la classe</option>
                        <option value="7ème">Septième</option>
                        <option value="8ème">Huitième</option>
                        <option value="1ère">Première</option>
                        <option value="2ème">Deuxième</option>
                        <option value="3ème">Troisième</option>
                        <option value="4ème">Quatrième</option>
                        <option value="5ème">Cinquième</option>
                    </select>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-floating">
                <label for="floatingInput2">Votre Adresse Actuelle</label>
                    <input type="text" name="adresse" class="form-control" id="floatingInput2" placeholder="Adresse" required>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-floating">
                <label for="floatingInput3">Joignez votre Buletin</label>
                    <input type="file" name="bulletin" class="form-control" id="floatingInput3" placeholder="bulletin" accept="application/pdf" required>
                </div>
            </div>

            <div class="col-md-4 mb-3">
            <label for="floatingInput1">L'Etat de la classe</label>
                <div class="form-floating">
                    <select name="etatClasse" class="form-control" aria-label="Default select example" required>
                    <option selected>Etat de la classe</option>
                    <option value="Montante">Montante</option>
                    <option value="Doublante">Doublante</option>
                    </select>
                    </div>
                </div>
               </div>
               <br>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-floating">
                <label for="floatingInput1">Ecole de provenance</label>
              <input type="text" name="ecoleprov" class="form-control" id="floatingInput1" placeholder="Ecole de provenance" required>
            </div>    
          </div>

            <div class="col-md-4 mb-3">
                <div class="form-floating">
                <label for="floatingInput3">Numéro de Téléphone</label>
                    <input type="text" id="PHONE" inputmode="numeric" name="numTel" class="form-control" id="floatingInput3" placeholder="Numéro de Téléphone " required oninput="validatePhoneNumber()" maxlength="10">
                    <div id="error-message" class="error"></div>
                  </div>
            </div>

            <div class="col-md-4 mb-3">
              
            <label for="floatingInput1">Votre Section</label>
            <div class="form-floating">
                    <select name="section" class="form-control" aria-label="Default select example" required>
                        <option selected>Selectionnez la section</option>
                        <option value="Sec">Secondaire</option>
                        <option value="Péd">Pédagogie</option>
                        <option value="T.S">T. Sociale</option>
                        <option value="T.V">T. Vetérinaire</option>
                        <option value="M.P">M. Physique</option>
                        <option value="CG">C. Gestion</option>
                        <option value="BC">B Chimie</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
    <br><br><br><br><br>
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
</body>

</html>