

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>PubModels</title>
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
   <!-- Font Awesome icons (free version)-->
   <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
       

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
      <a href="index.php" class="logo"><b>PUB<span>MODELS</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        
          <!-- settings start -->
          
        <!--  notification end -->
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
          <p class="centered"><a href="form_validation.php"><img src="img/logo.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">PUBMODELS</h5>
          <li class="mt">
            <a href="form_validation.php">
              <i class="fa fa-user"></i>
              <span>///////////////////////////</span>
              <i class="fa fa-user"></i>
              </a>
          </li>
          
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

        <!-- Main Content-->
        <section id="main-content">
          <section class="wrapper site-min-height">
             <div class="row mt">
               <div class="col-lg-12">
                    <div class="container px-4 px-lg-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Mes publications</h1>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd"><i class="bi bi-plus"></i> Ajouter</button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">nom model</th>
                                    <th scope="col">details</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    foreach($posts as $post) {
                                ?>
                                    <tr>
                                        <td><?php echo $post['id']; ?></td>
                                        <td><?php echo $user['name']; ?></td>
                                        <td><?php echo $post['created_at']; ?></td>
                                        <td><img src="<?php echo $post['cover']; ?>" alt="image" width="100px"></td>
                                        <td><?php echo $post['title']; ?></td>
                                        <td><?php echo $post['summary']; ?></td>
                                        <td><?php echo substr($post['content'], 0, 100); ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-warning">Modifier</a>
                                            <form action="api/delete.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                          




                        <!-- modal add apprenant -->
                    <div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une publication</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="api/create.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label">Titre</label>
                                            <input type="text" class="form-control" name="title" id="title">
                                        </div>
                                        <div class="mb-3">
                                            <label for="summary" class="col-form-label">summary</label>
                                            <input type="text" class="form-control" name="summary" id="summary"/>
                                        </div>

                                        <div class="mb-3">
                                            <label for="cover" class="col-form-label">Image</label>
                                            <input type="file" class="form-control" name="cover" accept=".png,.jpeg">
                                        </div>
                                        <div class="form-check">
                                            <label class="col-form-label" for="contenu">Contenu</label>
                                            <textarea name="content" class="form-control" id="contenu" cols="30" rows="10"></textarea>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Créer un apprenant</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
               </div>
             </div>
          </section>
        </section>
                
    <!-- /MAIN CONTENT -->
  <div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>
    <!--main content end-->
    
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>PUBMODELS</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with //////////// by <a href="https://templatemag.com/">////////////</a>
        </div>
        <a href="form_validation.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/form-validation-script.js"></script>

</body>

</html>
