<?php
include "includes/login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>PUBMODELS</title>

  <!-- Favicons -->
  <link href="img/im2.jpg" rel="icon">
  <link href="img/im2.jpg" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body onload="getTime()">
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div class="container">
    <div id="showtime"></div>
    <div class="col-lg-4 col-lg-offset-4">
      <div class="lock-screen">
        <h2><a data-toggle="modal" href="#myModal"><i class="fa fa-lock"></i></a></h2>
        <p>UNLOCK</p>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
                <div>
                <h4 class="modal-title">Gestion des inscriptions EDAP/ISP-WALUNGU</h4>
                <a data-toggle="modal" href="#myModal2" style="margin-top: 200px;">?</a>
                </div>
              </div>
              <form action="includes/login.php" method="POST">
              <div class="modal-body">
              
                <!-- Affichage du message d'erreur -->
                <?php if ($message): ?>
                    <div class="error"><?php echo htmlspecialchars($message); ?></div>
                <?php endif; ?>

                <p class="centered"><img class="img-circle" width="80" src="img/im2.jpg"></p>
                <p><input type="text" name="username" placeholder="Username" autocomplete="on" class="form-control placeholder-no-fix"></p>
                <p><input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix"></p>
              </div>
              
              <div class="modal-footer centered">
              
              <button class="btn btn-theme03" type="submit"><i class="fa fa-sign-in"></i></button>
                <a href="index.php"><button class="btn btn-theme04" type="button"><i class="fa fa-sign-out"></i></button></a>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal -->
         <!--modal 2 -->
         <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Créations compte</h4>
              </div>
              <form action="includes/signin.php" method="POST">
              <div class="modal-body">
              
                <!-- Affichage du message d'erreur -->
                <?php if ($message): ?>
                    <div class="error"><?php echo htmlspecialchars($message); ?></div>
                <?php endif; ?>

                <p class="centered"><img class="img-circle" width="80" src="img/im2.jpg"></p>
                <p><input type="text" name="username" placeholder="Username" autocomplete="on" class="form-control placeholder-no-fix"></p>
                <p><input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix"></p>
                <p><input type="file" id="photo" name="photo" placeholder="photo" accept="image/*" class="form-control placeholder-no-fix"></p>
                
              </div>
              
              <div class="modal-footer centered">
              
              <button class="btn btn-theme03" type="submit"><i class="fa fa-sign-in"></i></button>
                <a href="index.php"><button class="btn btn-theme04" type="button"><i class="fa fa-sign-out"></i></button></a>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!--modal 2-->
      </div>
      <!-- /lock-screen -->
    </div>
    <!-- /col-lg-4 -->
  </div>
  <!-- /container -->
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/m5.jpg", {
      speed: 500
    });
  </script>
  <script>
    function getTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      // add a zero in front of numbers<10
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
      t = setTimeout(function() {
        getTime()
      }, 500);
    }
    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
  </script>
</body>

</html>
