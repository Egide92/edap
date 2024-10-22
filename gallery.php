<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/fancybox/jquery.fancybox.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/jquery/jquery.min.js"></script>

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
      <a href="index.html" class="logo"><b>DASH<span>IO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <?php 
   
   include_once 'api/database.php';

   $db = new Database();
   $posts = $db->getPosts();
?>   
   
   <section id="main-content">
         <section class="wrapper site-min-height">
            <div class="row mt">
              <div class="col-lg-12">
                   <div class="container px-4 px-lg-5">
                       <div class="d-flex justify-content-between align-items-center">
                           
                           <h1>Mes publications</h1>
                           <table>
                               <td>
                               <a href="index.php" class="btn btn-success" class="text-end"><i class="bi bi-microsoft"></i></a>
                          
                               </td>
                               <td>
                               <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd"><i class="bi bi-plus-square-dotted"></i> Ajouter</button>
                           
                               </td>
                           </table>
                           
                       </div>
                       <table class="table table-success table-striped table-hover">
                           <thead>
                               <tr class="table-info">
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
                                       <td><?php echo $post['nom']; ?></td>
                                       <td><?php echo $post['details']; ?></td>
                                       <td><img src="api/img/<?php echo $post['cover']; ?>" alt="image" width="50px"></td>
                                       <td><?php echo $post['date']; ?></td>
                                       <td>
                                       
                                               <a href='api/edit.php?id=<?php echo $post['id']; ?>' class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                               
                                               <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                           <form action="api/delete.php?id" method="POST">
                                               <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
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
                                       
                                       <div class="mb-3">
                                       <label for="nom" class="form-label">Nom du model</label>
                                       <input type="text" class="form-control" name="nom" id="nom">
                                       </div>
                                       
                                       <div class="mb-3">
                                       <label for="details" class="form-label">Description du model ou details</label>
                                       <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                                       </div>

                                       <div class="mb-3">
                                           <label for="cover" class="col-form-label">Image</label>
                                           <input type="file" class="form-control" name="cover" accept=".png,.jpeg">
                                       </div>

                                       <div class="modal-footer">
                                           <button type="submit" class="btn btn-primary">VALIDER</button>
                                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                           
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
  
    
        <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
            <a href="index.html">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>UI Elements</span>
              </a>
            <ul class="sub">
              <li><a href="general.html">General</a></li>
              <li><a href="buttons.html">Buttons</a></li>
              <li><a href="panels.html">Panels</a></li>
              <li><a href="font_awesome.html">Font Awesome</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Components</span>
              </a>
            <ul class="sub">
              <li><a href="grids.html">Grids</a></li>
              <li><a href="calendar.html">Calendar</a></li>
              <li class="active"><a href="gallery.html">Gallery</a></li>
              <li><a href="todo_list.html">Todo List</a></li>
              <li><a href="dropzone.html">Dropzone File Upload</a></li>
              <li><a href="inline_editor.html">Inline Editor</a></li>
              <li><a href="file_upload.html">Multiple File Upload</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Extra Pages</span>
              </a>
            <ul class="sub">
              <li><a href="blank.html">Blank Page</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="lock_screen.html">Lock Screen</a></li>
              <li><a href="profile.html">Profile</a></li>
              <li><a href="invoice.html">Invoice</a></li>
              <li><a href="pricing_table.html">Pricing Table</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="404.html">404 Error</a></li>
              <li><a href="500.html">500 Error</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Forms</span>
              </a>
            <ul class="sub">
              <li><a href="form_component.html">Form Components</a></li>
              <li><a href="advanced_form_components.html">Advanced Components</a></li>
              <li><a href="form_validation.html">Form Validation</a></li>
              <li><a href="contactform.html">Contact Form</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Tables</span>
              </a>
            <ul class="sub">
              <li><a href="basic_table.html">Basic Table</a></li>
              <li><a href="responsive_table.html">Responsive Table</a></li>
              <li><a href="advanced_table.html">Advanced Table</a></li>
            </ul>
          </li>
          <li>
            <a href="inbox.html">
              <i class="fa fa-envelope"></i>
              <span>Mail </span>
              <span class="label label-theme pull-right mail-info">2</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Charts</span>
              </a>
            <ul class="sub">
              <li><a href="morris.html">Morris</a></li>
              <li><a href="chartjs.html">Chartjs</a></li>
              <li><a href="flot_chart.html">Flot Charts</a></li>
              <li><a href="xchart.html">xChart</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-comments-o"></i>
              <span>Chat Room</span>
              </a>
            <ul class="sub">
              <li><a href="lobby.html">Lobby</a></li>
              <li><a href="chat_room.html"> Chat Room</a></li>
            </ul>
          </li>
          <li>
            <a href="google_maps.html">
              <i class="fa fa-map-marker"></i>
              <span>Google Maps </span>
              </a>
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
        <h3><i class="fa fa-angle-right"></i> Gallery</h3>
        <hr>
        <div class="row mt">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/model/04.jpg"><img class="img-responsive" src="img/model/04.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/portfolio/port05.jpg"><img class="img-responsive" src="img/portfolio/port05.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/portfolio/port06.jpg"><img class="img-responsive" src="img/portfolio/port06.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
        </div>
        <!-- /row -->
        <div class="row mt">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/portfolio/port01.jpg"><img class="img-responsive" src="img/portfolio/port01.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/portfolio/port02.jpg"><img class="img-responsive" src="img/portfolio/port02.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/portfolio/port03.jpg"><img class="img-responsive" src="img/portfolio/port03.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
        </div>
        <!-- /row -->
        <div class="row mt mb">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/portfolio/port04.jpg"><img class="img-responsive" src="img/portfolio/port04.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/portfolio/port05.jpg"><img class="img-responsive" src="img/portfolio/port05.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/portfolio/port06.jpg"><img class="img-responsive" src="img/portfolio/port06.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-4 -->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="gallery.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/fancybox/jquery.fancybox.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    $(function() {
      //    fancybox
      jQuery(".fancybox").fancybox();
    });
  </script>

</body>

</html>
