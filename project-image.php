<?php
session_start();
error_reporting(0);
include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php');
if(strlen($_SESSION['login'])==0)
  {
header('location:login.html');
}
else {
  if(isset($_POST['cover_img']))
    {    
    $sid=$_SESSION['stdid']; 
    $project_desc_1=$_POST['project_desc_1'];
    $project_desc_2=$_POST['project_desc_2'];
    $project_desc_3=$_POST['project_desc_3'];
    $project_desc_4=$_POST['project_desc_4'];
    $project_desc_5=$_POST['project_desc_5'];
    $project_desc_6=$_POST['project_desc_6'];

    $sql= "SELECT * from users where id=:sid";
                $query = $dbh -> prepare ($sql);
                $query-> bindParam(':sid' , $sid , PDO::PARAM_STR);
                $query->execute();
                $results= $query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                  foreach($results as $result)
                  {


                    if($result->project_1==!NULL) {
                      
                      $fileName= $result->project_1;

                         } else {

    $fileName = $_FILES['project_1']['name'];
      $filePath = $_FILES['project_1']['tmp_name'];
      $fileInfo = pathinfo($_FILES["project_1"]["name"]);
      // $without_extension = substr($fileName, 0, strrpos($fileName, "."));
      // $fileName = $without_extension . '_'. uniqid(). '.' . $fileInfo['extension'];

      move_uploaded_file($filePath,"content/$fileName");
    }

    if($result->project_2==!NULL) {
                      
                      $fileName2= $result->project_2;

                         } else {

      $fileName2 = $_FILES['project_2']['name'];
      $filePath2 = $_FILES['project_2']['tmp_name'];
      $fileInfo2 = pathinfo($_FILES["project_2"]["name"]);
      // $without_extension2 = substr($fileName2, 0, strrpos($fileName2, "."));
      // $fileName2 = $without_extension2 . '_'. uniqid(). '.' . $fileInfo2['extension'];

      move_uploaded_file($filePath2,"content/$fileName2");
    }

    if($result->project_3==!NULL) {
                      
                      $fileName3= $result->project_3;

                         } else {

      $fileName3 = $_FILES['project_3']['name'];
      $filePath3 = $_FILES['project_3']['tmp_name'];
      $fileInfo3 = pathinfo($_FILES["project_3"]["name"]);
      // $without_extension3 = substr($fileName3, 0, strrpos($fileName3, "."));
      // $fileName3 = $without_extension3 . '_'. uniqid(). '.' . $fileInfo3['extension'];

      move_uploaded_file($filePath3,"content/$fileName3");
        }

      if($result->project_4==!NULL) {
                      
                      $fileName4= $result->project_4;

                         } else {

      $fileName4 = $_FILES['project_4']['name'];
      $filePath4 = $_FILES['project_4']['tmp_name'];
      $fileInfo4 = pathinfo($_FILES["project_4"]["name"]);
      // $without_extension4 = substr($fileName4, 0, strrpos($fileName4, "."));
      // $fileName4 = $without_extension4 . '_'. uniqid(). '.' . $fileInfo4['extension'];

      move_uploaded_file($filePath4,"content/$fileName4");
    }

    if($result->project_5==!NULL) {
                      
                      $fileName5= $result->project_5;

                         } else {

      $fileName5 = $_FILES['project_5']['name'];
      $filePath5 = $_FILES['project_5']['tmp_name'];
      $fileInfo5 = pathinfo($_FILES["project_5"]["name"]);
      // $without_extension5 = substr($fileName5, 0, strrpos($fileName5, "."));
      // $fileName5 = $without_extension5 . '_'. uniqid(). '.' . $fileInfo5['extension'];

      move_uploaded_file($filePath5,"content/$fileName5");
    }

    if($result->project_6==!NULL) {
                      
                      $fileName6= $result->project_6;

                         } else {

      $fileName6 = $_FILES['project_6']['name'];
      $filePath6 = $_FILES['project_6']['tmp_name'];
      $fileInfo6 = pathinfo($_FILES["project_6"]["name"]);
      // $without_extension6 = substr($fileName6, 0, strrpos($fileName6, "."));
      // $fileName6 = $without_extension6 . '_'. uniqid(). '.' . $fileInfo6['extension'];

      move_uploaded_file($filePath6,"content/$fileName6");
    }
}
}
    
    




    $sql="update users set project_1=:fileName, project_2=:fileName2 , project_3=:fileName3, project_4=:fileName4, project_5=:fileName5, project_6=:fileName6, project_desc_1=:project_desc_1, project_desc_2=:project_desc_2, project_desc_3=:project_desc_3, project_desc_4=:project_desc_4, project_desc_5=:project_desc_5, project_desc_6=:project_desc_6 where id=:sid";

    $query = $dbh->prepare($sql);
    $query->bindParam(':sid',$sid,PDO::PARAM_STR);
    $query->bindParam(':fileName',$fileName,PDO::PARAM_STR);
    $query->bindParam(':fileName2',$fileName2,PDO::PARAM_STR);
    $query->bindParam(':fileName3',$fileName3,PDO::PARAM_STR);
    $query->bindParam(':fileName4',$fileName4,PDO::PARAM_STR);
    $query->bindParam(':fileName5',$fileName5,PDO::PARAM_STR);
    $query->bindParam(':fileName6',$fileName6,PDO::PARAM_STR);
    $query->bindParam(':project_desc_1',$project_desc_1,PDO::PARAM_STR);
    $query->bindParam(':project_desc_2',$project_desc_2,PDO::PARAM_STR);
    $query->bindParam(':project_desc_3',$project_desc_3,PDO::PARAM_STR);
    $query->bindParam(':project_desc_4',$project_desc_4,PDO::PARAM_STR);
    $query->bindParam(':project_desc_5',$project_desc_5,PDO::PARAM_STR);
    $query->bindParam(':project_desc_6',$project_desc_6,PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Your cover has been updated")</script>';
    }

  ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <!-- Favicon -->
    <link rel="icon" href="assets/img/favicon.png" type="image/png">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="assets/libs/@fortawesome/fontawesome-free/css/all.min.css"><!-- Page CSS -->
    <link rel="stylesheet" href="assets/libs/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/libs/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/libs/flatpickr/dist/flatpickr.min.css">
    <!-- Purpose CSS -->
    <link rel="stylesheet" href="assets/css/purpose.css" id="stylesheet">
  </head>

  <body>
    <header class="header" id="header-main">
      <!-- Topbar -->
      <div id="navbar-top-main" class="navbar-top  bg-dark border-bottom" style="background: linear-gradient(90deg, #3dc1ed 0%, #7ac49d 100%); color: #fff;">
        <div class="container" style="width: auto !important; margin-left: 1%">
          <ul class="nav">
            <li class="nav-item dropdown ml-lg-2 mr-3 ">
              <a class="nav-link px-0" href="#">
                <span class="d-lg-inline-block">Locate Stores</span>
              </a>
              <!-- <div class="dropdown-menu dropdown-menu-sm">
                  <a href="#" class="dropdown-item"><img src="assets/img/icons/flags/es.svg">Spanish</a>
                  <a href="#" class="dropdown-item"><img src="assets/img/icons/flags/ro.svg">Romanian</a>
                  <a href="#" class="dropdown-item"><img src="assets/img/icons/flags/gr.svg">Greek</a>
                </div> -->
            </li>
            <li class="nav-item dropdown ml-lg-2 mr-3">
              <a class="nav-link px-0" href="#">
                <span class="d-lg-inline-block">How it works</span>
              </a>
            </li>
            <li class="nav-item dropdown ml-lg-2">
              <a class="nav-link px-0" href="#why-prominance">
                <span class="d-lg-inline-block">Why Prominance </span>
              </a>
            </li>
          </ul>
        </div>
        <div class="ml-auto mr-3">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="login.html">Designers Login</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#">1800 833 4500 <span class="fa fa-phone"></span></a>
            </li>
          </ul>
        </div>
      </div>
      </div>
      </div>
      <!-- Main navbar -->
      <nav class="navbar navbar-main navbar-expand-lg navbar-light bg-light navbar-sticky sticky" id="navbar-main">
        <div class="container px-lg-0">
          <!-- Logo -->
          <a class="navbar-brand mr-lg-5" href="index.html">
            <img src="assets/img/main-logo.png" id="navbar-logo" style="height: 50px;">
          </a>
          <!-- Navbar collapse trigger -->
          <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Navbar nav -->
          <div class="collapse navbar-collapse" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
              <!-- Home - Overview  -->
              <!-- <li class="nav-item d-lg-none d-xl-block">
              <a class="nav-link" href="docs/changelog.html">Home</a>
            </li> -->
              <li class="nav-item d-lg-none d-xl-block">
                <a class="nav-link" href="about.html">About us</a>
              </li>
              <!-- Pages menu -->
              <li class="nav-item dropdown dropdown-animate" data-toggle="hover">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                <div class="dropdown-menu dropdown-menu-lg p-0">
                  <ul class="list-group list-group-flush">
                    <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                      <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                          <!-- SVG icon -->
                          <figure style="width: 50px;">
                            <img src="assets/img/icons/interio-icons-kitchen.png" class="svg-inject img-fluid" style="height: 50px;">
                          </figure>
                          <!-- Media body -->
                          <div class="media-body ml-3">
                            <h6 class="mb-1">Kitchen</h6>
                          </div>
                        </div>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="modular-kitchens.html" class="list-group-item list-group-item-action" role="button">
                            <div class="media d-flex align-items-center">
                              <figure style="width: 50px;">
                                <img src="assets/img/icons/interio-icons-modular-kitchen.png" class="svg-inject img-fluid" style="height: 50px;">
                              </figure>
                              <div class="media-body ml-3">
                                <h6 class="mb-1">Modular Kitchen</h6>
                              </div>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                      <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                          <!-- SVG icon -->
                          <figure style="width: 50px;">
                            <img src="assets/img/icons/interio-icons-living-room.png" class="svg-inject img-fluid" style="height: 50px;">
                          </figure>
                          <!-- Media body -->
                          <div class="media-body ml-3">
                            <h6 class="mb-1">Living Room</h6>
                          </div>
                        </div>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="tv-units.html" class="list-group-item list-group-item-action" role="button">
                            <div class="media d-flex align-items-center">
                              <figure style="width: 50px;">
                                <img src="assets/img/icons/interio-icons-tv-units.png" class="svg-inject img-fluid" style="height: 50px;">
                              </figure>
                              <div class="media-body ml-3">
                                <h6 class="mb-1">TV Units</h6>
                              </div>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                      <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                          <!-- SVG icon -->
                          <figure style="width: 50px;">
                            <img src="assets/img/icons/interio-icons-bed-room.png" class="svg-inject img-fluid" style="height: 50px;">
                          </figure>
                          <!-- Media body -->
                          <div class="media-body ml-3">
                            <h6 class="mb-1">Bed Room</h6>
                          </div>
                        </div>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="wardrobe-and-storage-unit.html" class="list-group-item list-group-item-action" role="button">
                            <div class="media d-flex align-items-center">
                              <figure style="width: 50px;">
                                <img src="assets/img/icons/interio-icons-wardrobe.png" class="svg-inject img-fluid" style="height: 50px;">
                              </figure>
                              <div class="media-body ml-3">
                                <h6 class="mb-1">Wardrobe & Storage Unit</h6>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="cot.html" class="list-group-item list-group-item-action" role="button">
                            <div class="media d-flex align-items-center">
                              <figure style="width: 50px;">
                                <img src="assets/img/icons/interio-icons-cot.png" class="svg-inject img-fluid" style="height: 50px;">
                              </figure>
                              <div class="media-body ml-3">
                                <h6 class="mb-1">Cot</h6>
                              </div>
                            </div>
                          </a>
                        <li>
                          <a href="side-tables.html" class="list-group-item list-group-item-action" role="button">
                            <div class="media d-flex align-items-center">
                              <figure style="width: 50px;">
                                <img src="assets/img/icons/interio-icons-side-table.png" class="svg-inject img-fluid" style="height: 50px;">
                              </figure>
                              <div class="media-body ml-3">
                                <h6 class="mb-1">Side Tables</h6>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="study-units.html" class="list-group-item list-group-item-action" role="button">
                            <div class="media d-flex align-items-center">
                              <figure style="width: 50px;">
                                <img src="assets/img/icons/interio-icons-study-table.png" class="svg-inject img-fluid" style="height: 50px;">
                              </figure>
                              <div class="media-body ml-3">
                                <h6 class="mb-1">Study Units</h6>
                              </div>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                      <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                          <!-- SVG icon -->
                          <figure style="width: 50px;">
                            <img src="assets/img/icons/interio-icons-wardrobe.png" class="svg-inject img-fluid" style="height: 50px;">
                          </figure>
                          <!-- Media body -->
                          <div class="media-body ml-3">
                            <h6 class="mb-1">Storage</h6>
                          </div>
                        </div>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="shoe-units.html" class="list-group-item list-group-item-action" role="button">
                            <div class="media d-flex align-items-center">
                              <figure style="width: 50px;">
                                <img src="assets/img/icons/interio-icons-shoe-rack.png" class="svg-inject img-fluid" style="height: 50px;">
                              </figure>
                              <div class="media-body ml-3">
                                <h6 class="mb-1">Shoe Units</h6>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="crockery-units.html" class="list-group-item list-group-item-action" role="button">
                            <div class="media d-flex align-items-center">
                              <figure style="width: 50px;">
                                <img src="assets/img/icons/interio-icons-crockery.png" class="svg-inject img-fluid" style="height: 50px;">
                              </figure>
                              <div class="media-body ml-3">
                                <h6 class="mb-1">Crockery Unit</h6>
                              </div>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-animate dropdown-submenu" data-toggle="hover">
                      <a href="#" class="list-group-item list-group-item-action dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                          <!-- SVG icon -->
                          <figure style="width: 50px;">
                            <img src="assets/img/icons/interio-icons-study-table.png" class="svg-inject img-fluid" style="height: 50px;">
                          </figure>
                          <!-- Media body -->
                          <div class="media-body ml-3">
                            <h6 class="mb-1">Fancy Units</h6>
                          </div>
                        </div>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="foyer-units.html" class="list-group-item list-group-item-action" role="button">
                            <div class="media d-flex align-items-center">
                              <figure style="width: 50px;">
                                <img src="assets/img/icons/interio-icons-foyer.png" class="svg-inject img-fluid" style="height: 50px;">
                              </figure>
                              <div class="media-body ml-3">
                                <h6 class="mb-1">Foyer Units</h6>
                              </div>
                            </div>
                          </a>
                        </li>

                        <li>
                          <a href="pooja-units.html" class="list-group-item list-group-item-action" role="button">
                            <div class="media d-flex align-items-center">
                              <figure style="width: 50px;">
                                <img src="assets/img/icons/interio-icons-pooja-unit.png" class="svg-inject img-fluid" style="height: 50px;">
                              </figure>
                              <div class="media-body ml-3">
                                <h6 class="mb-1">Pooja Units</h6>
                              </div>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
              <!--  <li class="nav-item d-lg-none d-xl-block">
              <a class="nav-link" href="docs/changelog.html">Consult Online </a>
            </li> -->
              <li class="nav-item d-lg-none d-xl-block">
                <a class="nav-link" href="#testimonials">Testimonials</a>
              </li>
              <li class="nav-item d-lg-none d-xl-block">
                <a class="nav-link" href="#inspirations">Inspirations</a>
              </li>
              <li class="nav-item d-lg-none d-xl-block">
                <a class="nav-link" href="#design-blog">Design Blogs</a>
              </li>
              <li class="nav-item mr-0">
                <a href="#" class="nav-link d-lg-none">Design your Own</a>
                <a href="#" class="btn btn-sm btn-icon rounded-pill d-none d-lg-inline-flex" style="background: linear-gradient(90deg, #3dc1ed 0%, #7ac49d 100%); color: #fff;">
                  <span class="btn-inner--text">Design your Own</span>
                </a>
              </li>
              <li class="nav-item ml-3">
                <a href="#" class="nav-link d-lg-none">Get 3D Layout Instant</a>
                <a href="#" class="btn btn-sm btn-icon rounded-pill d-none d-lg-inline-flex" style="background: linear-gradient(90deg, #3dc1ed 0%, #7ac49d 100%); color: #fff;">
                  <span class="btn-inner--text">Get 3D Layout Instant</span>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="main-content">
      <!-- Header (account) -->
      <section class=" bg-gradient-primary d-flex align-items-end" data-offset-top="#header-main">
        <!-- Header container -->
        <div class="container pt-4 pt-lg-0">
          <div class="row">
            <div class=" col-lg-12">
              <!-- Salute + Small stats -->
              <div class="row align-items-center mb-4">
                <div class="col-md-5 mb-4 mb-md-0">
                  <span class="h2 mb-0 text-white d-block">Hello,
                    <?php
                  if (isset($_SESSION['login']))
                  {
                      echo $_SESSION['first_name'];
                  }
                  ?>
                  </span>
                  <span class="text-white">Have a nice day!</span>
                </div>
              </div>
              <!-- Account navigation -->
              <div class="d-flex">
                <a class="btn btn-icon btn-group-nav shadow btn-neutral">
                  <span class="btn-inner--icon"><i class="fas fa-user"></i></span>
                  <span class="btn-inner--text d-none d-md-inline-block">
                    <?php
                  if (isset($_SESSION['login']))
                  {
                      echo $_SESSION['username'];
                  }
                  ?>
                  </span>
                </a>
                <!-- <div class="btn-group btn-group-nav shadow btn-neutral ml-auto" role="group" aria-label="Basic example">
                <div class="btn-group" role="group">
                  <button id="btn-group-settings" type="button" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-sliders-h"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Account</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <a class="dropdown-item" href="account-settings.php">Settings</a>
                    <a class="dropdown-item" href="logout.php">Log Out</a>
                  </div>
                </div>
                <div class="btn-group" role="group">
                  <button id="btn-group-boards" type="button" class="btn btn-neutral btn-icon" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-chart-line"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Board</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-boards">
                    <a class="dropdown-item" href="board-overview.html">Overview</a>
                    <a class="dropdown-item" href="board-projects.html">Projects</a>
                    <a class="dropdown-item" href="board-tasks.html">Tasks</a>
                    <a class="dropdown-item" href="board-connections.html">Connections</a>
                  </div>
                </div>
                <div class="btn-group" role="group">
                  <button id="btn-group-listing" type="button" class="btn btn-neutral btn-icon rounded-right" data-toggle="dropdown" data-offset="0,8" aria-haspopup="true" aria-expanded="false">
                    <span class="btn-inner--icon"><i class="fas fa-list-ul"></i></span>
                    <span class="btn-inner--text d-none d-sm-inline-block">Listing</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="btn-group-settings">
                    <span class="dropdown-header">Tables</span>
                    <a class="dropdown-item" href="listing-orders.html">Orders</a>
                    <a class="dropdown-item" href="listing-projects.html">Projects</a>
                    <span class="dropdown-header">Flex</span>
                    <a class="dropdown-item" href="listing-users.html">Users</a>
                  </div>
                </div>
              </div> -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="slice">
        <div class="container">
          <div class="row row-grid">
            <div class="col-lg-9 order-lg-2">
              <!-- Change avatar 
            <div class="card bg-gradient-warning hover-shadow-lg">
              <div class="card-body py-3">
                <div class="row row-grid align-items-center">
                  <div class="col-lg-8">
                    <div class="media align-items-center">
                      <a href="#" class="avatar avatar-lg rounded-circle mr-3">
                        <img alt="Image placeholder" src="assets/img/theme/light/team-1-800x800.jpg">
                      </a>
                      <div class="media-body">
                        <h5 class="text-white mb-0">Heather Wright</h5>
                        <div>
                          <form>
                            <input type="file" name="file-1[]" id="file-1" class="custom-input-file custom-input-file-link" data-multiple-caption="{count} files selected" multiple />
                            <label for="file-1">
                              <span class="text-white">Change avatar</span>
                            </label>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto flex-fill mt-4 mt-sm-0 text-sm-right d-none d-lg-block">
                    <a href="#" class="btn btn-sm btn-white rounded-pill btn-icon shadow">
                      <span class="btn-inner--icon"><i class="fas fa-fire"></i></span>
                      <span class="btn-inner--text">Upgrade to Pro</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>-->
              <!-- General information form -->

              <form role="form" action="project-image.php" method="POST" enctype="multipart/form-data">
                <?php
                $sid=$_SESSION['stdid'];
                $sql= "SELECT * from users where id=:sid";
                $query = $dbh -> prepare ($sql);
                $query-> bindParam(':sid' , $sid , PDO::PARAM_STR);
                $query->execute();
                $results= $query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                  foreach($results as $result)
                  {

              ?>





                <!-- Address -->
                <div class="actions-toolbar py-2 mb-4">

                </div>

                <!-- Skills 
              <div class="pt-5 mt-5 delimiter-top">
                <div class="actions-toolbar py-2 mb-4">
                  <h5 class="mb-1">Skills</h5>
                  <p class="text-sm text-muted mb-0">Show off you skills using our tags input control.</p>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label class="sr-only">Skills</label>
                      <input type="text" class="form-control" value="HTML, CSS3, Bootstrap, Photoshop, VueJS" data-toggle="tags" placeholder="Type here..." />
                    </div>
                  </div>
                </div>
              </div>-->
                <!-- Description -->
                <div class="">
                  <div class="actions-toolbar py-2 mb-4">
                    <h5 class="mb-1">Project Image</h5>
                    <p class="text-sm text-muted mb-0">Upload your Project Image</p>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Image 1</label>
                        <?php if($result->project_1==!NULL) {?>
                        <input class="form-control" name="project_1" type="hidden" value="<?php echo htmlentities($result->project_1);?>">
                        <?php } else {?>

                        <input class="form-control" name="project_1" type="file" value="<?php echo htmlentities($result->project_1);?>">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Description 1</label>
                        <input class="form-control" name="project_desc_1" type="text" placeholder="Project Description" value="<?php echo htmlentities($result->project_desc_1);?>" >
                      </div>
                    </div>

                    <?php if($result->project_1==!NULL) {?>

                    <div class="col-lg-12" style="max-width: 17%; position: absolute;">
                      <div> <a href="content/<?php echo htmlentities($result->project_1);?>" data-fancybox="pp"> <img alt="Image placeholder" src="content/<?php echo htmlentities($result->project_1);?>" class="img-fluid rounded shadow-lg"> </a>

                      </div>
                    </div>

                    <?php } else {?>

                    <span>No Project Image Uploaded</span>



                    <?php } ?>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Image 2</label>
                        <?php if($result->project_2==!NULL) {?>
                        <input class="form-control" name="project_2" type="hidden" value="<?php echo htmlentities($result->project_2);?>">
                        <?php } else {?>

                        <input class="form-control" name="project_2" type="file" value="<?php echo htmlentities($result->project_2);?>">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Description 2</label>
                        <input class="form-control" name="project_desc_2" type="text" placeholder="Project Description" value="<?php echo htmlentities($result->project_desc_2);?>" >
                      </div>
                    </div>

                    <?php if($result->project_2==!NULL) {?>

                    <div class="col-lg-12" style="max-width: 17%; position: absolute;">
                      <div> <a href="content/<?php echo htmlentities($result->project_2);?>" data-fancybox="pp"> <img alt="Image placeholder" src="content/<?php echo htmlentities($result->project_2);?>" class="img-fluid rounded shadow-lg"> </a>

                      </div>
                    </div>

                    <?php } else {?>

                    <span>No Project Image Uploaded</span>



                    <?php } ?>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Image 3</label>
                        <?php if($result->project_3==!NULL) {?>
                        <input class="form-control" name="project_3" type="hidden" value="<?php echo htmlentities($result->project_3);?>">
                        <?php } else {?>

                        <input class="form-control" name="project_3" type="file" value="<?php echo htmlentities($result->project_3);?>">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Description 3</label>
                        <input class="form-control" name="project_desc_3" type="text" placeholder="Project Description" value="<?php echo htmlentities($result->project_desc_3);?>" >
                      </div>
                    </div>

                    <?php if($result->project_3==!NULL) {?>

                    <div class="col-lg-12" style="max-width: 17%; position: absolute;">
                      <div> <a href="content/<?php echo htmlentities($result->project_3);?>" data-fancybox="pp"> <img alt="Image placeholder" src="content/<?php echo htmlentities($result->project_3);?>" class="img-fluid rounded shadow-lg"> </a>

                      </div>
                    </div>

                    <?php } else {?>

                    <span>No Project Image Uploaded</span>



                    <?php } ?>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Image 4</label>
                        <?php if($result->project_4==!NULL) {?>
                        <input class="form-control" name="project_4" type="hidden" value="<?php echo htmlentities($result->project_4);?>">
                        <?php } else {?>

                        <input class="form-control" name="project_4" type="file" value="<?php echo htmlentities($result->project_4);?>">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Description 4</label>
                        <input class="form-control" name="project_desc_4" type="text" placeholder="Project Description" value="<?php echo htmlentities($result->project_desc_4);?>" >
                      </div>
                    </div>

                    <?php if($result->project_4==!NULL) {?>

                    <div class="col-lg-12" style="max-width: 17%; position: absolute;">
                      <div> <a href="content/<?php echo htmlentities($result->project_4);?>" data-fancybox="pp"> <img alt="Image placeholder" src="content/<?php echo htmlentities($result->project_4);?>" class="img-fluid rounded shadow-lg"> </a>

                      </div>
                    </div>

                    <?php } else {?>

                    <span>No Project Image Uploaded</span>



                    <?php } ?>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Image 5</label>
                        <?php if($result->project_5==!NULL) {?>
                        <input class="form-control" name="project_5" type="hidden" value="<?php echo htmlentities($result->project_5);?>">
                        <?php } else {?>

                        <input class="form-control" name="project_5" type="file" value="<?php echo htmlentities($result->project_5);?>">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Description 5</label>
                        <input class="form-control" name="project_desc_5" type="text" placeholder="Project Description" value="<?php echo htmlentities($result->project_desc_5);?>" >
                      </div>
                    </div>

                    <?php if($result->project_5==!NULL) {?>

                    <div class="col-lg-12" style="max-width: 17%; position: absolute;">
                      <div> <a href="content/<?php echo htmlentities($result->project_5);?>" data-fancybox="pp"> <img alt="Image placeholder" src="content/<?php echo htmlentities($result->project_5);?>" class="img-fluid rounded shadow-lg"> </a>

                      </div>
                    </div>

                    <?php } else {?>

                    <span>No Project Image Uploaded</span>



                    <?php } ?>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Image 6</label>
                        <?php if($result->project_6==!NULL) {?>
                        <input class="form-control" name="project_6" type="hidden" value="<?php echo htmlentities($result->project_6);?>">
                        <?php } else {?>

                        <input class="form-control" name="project_6" type="file" value="<?php echo htmlentities($result->project_6);?>">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Project Description 6</label>
                        <input class="form-control" name="project_desc_6" type="text" placeholder="Project Description" value="<?php echo htmlentities($result->project_desc_6);?>" >
                      </div>
                    </div>

                    <?php if($result->project_6==!NULL) {?>

                    <div class="col-lg-12" style="max-width: 17%; position: absolute;">
                      <div> <a href="content/<?php echo htmlentities($result->project_6);?>" data-fancybox="pp"> <img alt="Image placeholder" src="content/<?php echo htmlentities($result->project_6);?>" class="img-fluid rounded shadow-lg"> </a>

                      </div>
                    </div>

                    <?php } else {?>

                    <span>No Project Image Uploaded</span>



                    <?php } ?>
                  </div>



                </div>
                <!-- Save changes buttons -->
                <div class="pt-5 mt-5 delimiter-top text-center">
                  <button type="submit" name="cover_img" class="btn btn-sm bg-gradient-primary text-white">Save changes</button>
                  <!-- <button type="button" class="btn btn-link text-muted">Cancel</button> -->
                </div>
                <?php }} ?>
              </form>
            </div>
            <div class="col-lg-3 order-lg-1">
              <div data-toggle="sticky" data-sticky-offset="30" data-negative-margin=".card-profile-cover">
                <div class="card">
                  <div class="card-header py-3">
                    <span class="h6">Settings</span>
                  </div>
                  <div class="list-group list-group-sm list-group-flush">
                    <a href="dashboard.php" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div>
                        <i class="fas fa-user-circle mr-2"></i>
                        <span>Profile</span>
                      </div>
                    </a>
                    <a href="cover-image.php" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div>
                        <i class="fas fa-image mr-2"></i>
                        <span>Cover Image</span>
                      </div>
                    </a>
                    <a href="project-image.php" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div>
                        <i class="fas fa-building mr-2"></i>
                        <span>Project Images</span>
                      </div>
                    </a>
                    <a href="account-settings.php" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div>
                        <i class="fas fa-cog mr-2"></i>
                        <span>Settings</span>
                      </div>
                    </a>
                    <a href="logout.php" class="list-group-item list-group-item-action d-flex justify-content-between">
                      <div>
                        <i class="fas fa-credit-card mr-2"></i>
                        <span>Log Out</span>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer id="footer-main">
      <div class="footer footer-dark" style="background: linear-gradient(90deg, #3dc1ed 0%, #7ac49d 100%);">
        <div class="container">
          <div class="row pt-md">
            <div class="col-lg-3 mb-5 mb-lg-0">
              <a href="index.html">
                <img src="assets/img/white-logo.png" alt="Footer logo" style="height: 70px;">
              </a>
              <p>Our expertise and perfectionism entails usage of materials of the highest standard. We are well versed in the creation of stunning living rooms, bedrooms, and kitchen.</p>
            </div>
            <div class="col-lg-3 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0 ">
              <h6 class="heading mb-3">Modular Kitchen</h6>
              <ul class="list-unstyled">
                <li><a href="#">Modular Kitchen Cost Calculator</a></li>
                <li><a href="#">Modular Kitchen in Bengaluru</a></li>
                <li><a href="#">Modular Kitchen in Coimbatore</a></li>
                <li><a href="#">Modular Kitchen Cost Delhi</a></li>
                <li><a href="#">Modular Kitchen in Pune</a></li>
                <li><a href="#">Modular Kitchen in Mumbai</a></li>
                <li><a href="#">Modular Kitchen Cost Kolkata</a></li>
                <li><a href="#">Modular Kitchen in Hyderabad</a></li>
                <li><a href="#">Modular Kitchen in Chennai</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-6 col-sm-4 mb-5 mb-lg-0 ">
              <h6 class="heading mb-3">Wardrobe Design</h6>
              <ul class="list-unstyled text-small">
                <li><a href="#">Wardrobe Designs in Delhi</a></li>
                <li><a href="#">Wardrobe Designs in Coimbatore</a></li>
                <li><a href="#">Wardrobe Designs in Bengaluru</a></li>
                <li><a href="#">Wardrobe Designs in Hyderabad</a></li>
                <li><a href="#">Wardrobe Designs in Pune</a></li>
                <li><a href="#">Wardrobe Designs in Chennai</a></li>
                <li><a href="#">Wardrobe Designs in Mumbai</a></li>
                <li><a href="#">Wardrobe Designs in Kolkata</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-sm-4 mb-5 mb-lg-0 ">
              <h6 class="heading mb-3">Interior Designers</h6>
              <ul class="list-unstyled">
                <li><a href="#">Interior Designer In Bengaluru</a></li>
                <li><a href="#">Interior Designer In Chennai</a></li>
                <li><a href="#">Interior Designer In Pune</a></li>
                <li><a href="#">Interior Designer In Mumbai</a></li>
                <li><a href="#">Interior Designer In Hyderabad</a></li>
                <li><a href="#">Interior Designer In Kolkata</a></li>
                <li><a href="#">Interior Designer In Gurgaon</a></li>
                <li><a href="#">Interior Designer In Noida</a></li>
              </ul>
            </div>
          </div>
          <div class="row align-items-center justify-content-md-between py-4 mt-4 delimiter-top">
            <div class="col-md-6">
              <div class="copyright text-sm font-weight-bold text-center text-md-left">
                &copy; 2020 <a href="#" class="font-weight-bold"></a>. All rights reserved.
              </div>
            </div>
            <div class="col-md-6">
              <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fab fa-dribbble"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fab fa-github"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fab fa-facebook"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <script src="assets/js/purpose.core.js"></script>
    <!-- Page JS -->
    <script src="assets/libs/swiper/dist/js/swiper.min.js"></script>
    <script src="assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="assets/libs/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <script src="assets/libs/autosize/dist/autosize.min.js"></script>
    <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <!-- Purpose JS -->
    <script src="assets/js/purpose.js"></script>
    <!-- Demo JS - remove it when starting your project -->
    <script src="assets/js/demo.js"></script>
  </body>

</html>
<?php } ?>
