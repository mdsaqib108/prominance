<?php
session_start();
// error_reporting(0);
include( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php');
if(strlen($_SESSION['login'])==0)
  {
header('location:login.html');
}
else {
  if(isset($_POST['update']))
    {    
    $sid=$_SESSION['stdid'];  
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $birthday=$_POST['birthday'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $description=$_POST['description'];
    $design_style=$_POST['design_style'];
    $expertise=$_POST['expertise'];
    $experience=$_POST['experience'];
    $specialisation=$_POST['specialisation'];
    $personal_website=$_POST['personal_website'];

                  

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


                    if($result->profile==!NULL) {

                      $fileName1= $result->profile;

                         } else {

                          $fileName = $_FILES['profile']['name'];
                          $filePath = $_FILES['profile']['tmp_name'];
                          $fileInfo1 = pathinfo($_FILES["profile"]["name"]);
                          // $without_extension = substr($fileName, 0, strrpos($fileName, "."));
                          // $fileName1 = $without_extension . '_'. uniqid(). '.' . $fileInfo1['extension'];

                        

                        move_uploaded_file($filePath,"content/$fileName");
                      
                       }
                      }
                    }

    




    $sql="update users set first_name=:first_name,last_name=:last_name,birthday=:birthday,gender=:gender,email=:email,username=:username,phone=:phone,address=:address,city=:city,country=:country,description=:description,design_style=:design_style,expertise=:expertise,experience=:experience,specialisation=:specialisation,personal_website=:personal_website,profile=:fileName where id=:sid";

    $query = $dbh->prepare($sql);
    $query->bindParam(':sid',$sid,PDO::PARAM_STR);
    $query->bindParam(':first_name',$first_name,PDO::PARAM_STR);
    $query->bindParam(':last_name',$last_name,PDO::PARAM_STR);
    $query->bindParam(':birthday',$birthday,PDO::PARAM_STR);
    $query->bindParam(':gender',$gender,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->bindParam(':phone',$phone,PDO::PARAM_STR);
    $query->bindParam(':address',$address,PDO::PARAM_STR);
    $query->bindParam(':city',$city,PDO::PARAM_STR);
    $query->bindParam(':country',$country,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':design_style',$design_style,PDO::PARAM_STR);
    $query->bindParam(':expertise',$expertise,PDO::PARAM_STR);
    $query->bindParam(':experience',$experience,PDO::PARAM_STR);
    $query->bindParam(':specialisation',$specialisation,PDO::PARAM_STR);
    $query->bindParam(':personal_website',$personal_website,PDO::PARAM_STR);
    $query->bindParam(':fileName',$fileName,PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Your profile has been updated")</script>';
    }

  //   if(isset($POST['del']))
  //   {
  //   $sid=$_SESSION['stdid'];
  //   $sql = "DELETE profile FROM users  WHERE id=:sid";
  //   $query = $dbh->prepare($sql);
  //   $query -> bindParam(':sid',$sid, PDO::PARAM_STR);
  //   $query -> execute();
  //   $results=$query->fetchAll(PDO::FETCH_OBJ);
  //   $cnt=1;

  //   foreach($results as $result)
  //   {

  //   unlink(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'content' .  DIRECTORY_SEPARATOR .($result->profile));
        

  //   }
  // }
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
              <div class="actions-toolbar py-2 mb-4">
                <h5 class="mb-1">General information</h5>
                <p class="text-sm text-muted mb-0">You can help us, by filling your data, create you a much better experience using our website.</p>
              </div>
              <form role="form" action="dashboard.php" method="POST" enctype="multipart/form-data">
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
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">First name <span class="text-danger">*</span></label>
                      <input class="form-control" name="first_name" type="text" placeholder="Enter your first name" value="<?php echo htmlentities($result->first_name);?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Last name <span class="text-danger">*</span></label>
                      <input class="form-control" name="last_name" type="text" placeholder="Also your last name" value="<?php echo htmlentities($result->last_name);?>" required>
                    </div>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Birthday</label>
                      <input type="text" name="birthday" class="form-control" data-toggle="date" value="<?php echo htmlentities($result->birthday);?>" placeholder="Select date">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Gender</label>
                      <select class="form-control" name="gender" data-toggle="select" title="Gender" data-live-search="true" data-live-search-placeholder="Gender" required>
                        <option selected>
                          <?php 
                          if($result->gender==!NULL) {?>
                          <?php echo htmlentities($result->gender);?>
                          <?php } 
                                  else {?>
                          Select Gender
                          <?php } ?>

                        </option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Rather not say">Rather not say</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Email <span class="text-danger">*</span></label>
                      <input class="form-control" name="email" type="email" placeholder="name@exmaple.com" value="<?php echo htmlentities($result->email);?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Username <span class="text-danger">*</span></label>
                      <div class="input-group input-group-merge">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo htmlentities($result->username);?>" aria-label="Username" aria-describedby="basic-addon1" required readonly>
                      </div>
                    </div>
                  </div>
                </div>



                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label">Phone</label>
                      <input class="form-control" name="phone" type="text" placeholder="+40-777 245 549" value="<?php echo htmlentities($result->phone);?>">
                    </div>
                  </div>
                </div>
                <!-- Address -->
                <div class="pt-5 mt-5 delimiter-top">
                  <div class="actions-toolbar py-2 mb-4">
                    <h5 class="mb-1">Address details</h5>
                    <p class="text-sm text-muted mb-0">Fill in your address info for upcoming orders or payments.</p>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label">Address</label>
                        <textarea class="form-control" name="address" data-toggle="autosize" placeholder="Enter Your Address" rows="2"><?php echo htmlentities($result->address);?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">City <span class="text-danger">*</span></label>
                        <input class="form-control" name="city" type="text" placeholder="City" value="<?php echo htmlentities($result->city);?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Country <span class="text-danger">*</span></label>
                        <select class="form-control" name="country" data-toggle="select" title="Country" data-live-search="true" data-live-search-placeholder="Country" required>
                          <option selected>
                            <?php 
                          if($result->country==!NULL) {?>
                            <?php echo htmlentities($result->country);?>
                            <?php } 
                                  else {?>
                            Select Country
                            <?php } ?>

                          </option>
                          <option value="Afganistan">Afghanistan</option>
                          <option value="Albania">Albania</option>
                          <option value="Algeria">Algeria</option>
                          <option value="American Samoa">American Samoa</option>
                          <option value="Andorra">Andorra</option>
                          <option value="Angola">Angola</option>
                          <option value="Anguilla">Anguilla</option>
                          <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                          <option value="Argentina">Argentina</option>
                          <option value="Armenia">Armenia</option>
                          <option value="Aruba">Aruba</option>
                          <option value="Australia">Australia</option>
                          <option value="Austria">Austria</option>
                          <option value="Azerbaijan">Azerbaijan</option>
                          <option value="Bahamas">Bahamas</option>
                          <option value="Bahrain">Bahrain</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Barbados">Barbados</option>
                          <option value="Belarus">Belarus</option>
                          <option value="Belgium">Belgium</option>
                          <option value="Belize">Belize</option>
                          <option value="Benin">Benin</option>
                          <option value="Bermuda">Bermuda</option>
                          <option value="Bhutan">Bhutan</option>
                          <option value="Bolivia">Bolivia</option>
                          <option value="Bonaire">Bonaire</option>
                          <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                          <option value="Botswana">Botswana</option>
                          <option value="Brazil">Brazil</option>
                          <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                          <option value="Brunei">Brunei</option>
                          <option value="Bulgaria">Bulgaria</option>
                          <option value="Burkina Faso">Burkina Faso</option>
                          <option value="Burundi">Burundi</option>
                          <option value="Cambodia">Cambodia</option>
                          <option value="Cameroon">Cameroon</option>
                          <option value="Canada">Canada</option>
                          <option value="Canary Islands">Canary Islands</option>
                          <option value="Cape Verde">Cape Verde</option>
                          <option value="Cayman Islands">Cayman Islands</option>
                          <option value="Central African Republic">Central African Republic</option>
                          <option value="Chad">Chad</option>
                          <option value="Channel Islands">Channel Islands</option>
                          <option value="Chile">Chile</option>
                          <option value="China">China</option>
                          <option value="Christmas Island">Christmas Island</option>
                          <option value="Cocos Island">Cocos Island</option>
                          <option value="Colombia">Colombia</option>
                          <option value="Comoros">Comoros</option>
                          <option value="Congo">Congo</option>
                          <option value="Cook Islands">Cook Islands</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Cote DIvoire">Cote DIvoire</option>
                          <option value="Croatia">Croatia</option>
                          <option value="Cuba">Cuba</option>
                          <option value="Curaco">Curacao</option>
                          <option value="Cyprus">Cyprus</option>
                          <option value="Czech Republic">Czech Republic</option>
                          <option value="Denmark">Denmark</option>
                          <option value="Djibouti">Djibouti</option>
                          <option value="Dominica">Dominica</option>
                          <option value="Dominican Republic">Dominican Republic</option>
                          <option value="East Timor">East Timor</option>
                          <option value="Ecuador">Ecuador</option>
                          <option value="Egypt">Egypt</option>
                          <option value="El Salvador">El Salvador</option>
                          <option value="Equatorial Guinea">Equatorial Guinea</option>
                          <option value="Eritrea">Eritrea</option>
                          <option value="Estonia">Estonia</option>
                          <option value="Ethiopia">Ethiopia</option>
                          <option value="Falkland Islands">Falkland Islands</option>
                          <option value="Faroe Islands">Faroe Islands</option>
                          <option value="Fiji">Fiji</option>
                          <option value="Finland">Finland</option>
                          <option value="France">France</option>
                          <option value="French Guiana">French Guiana</option>
                          <option value="French Polynesia">French Polynesia</option>
                          <option value="French Southern Ter">French Southern Ter</option>
                          <option value="Gabon">Gabon</option>
                          <option value="Gambia">Gambia</option>
                          <option value="Georgia">Georgia</option>
                          <option value="Germany">Germany</option>
                          <option value="Ghana">Ghana</option>
                          <option value="Gibraltar">Gibraltar</option>
                          <option value="Great Britain">Great Britain</option>
                          <option value="Greece">Greece</option>
                          <option value="Greenland">Greenland</option>
                          <option value="Grenada">Grenada</option>
                          <option value="Guadeloupe">Guadeloupe</option>
                          <option value="Guam">Guam</option>
                          <option value="Guatemala">Guatemala</option>
                          <option value="Guinea">Guinea</option>
                          <option value="Guyana">Guyana</option>
                          <option value="Haiti">Haiti</option>
                          <option value="Hawaii">Hawaii</option>
                          <option value="Honduras">Honduras</option>
                          <option value="Hong Kong">Hong Kong</option>
                          <option value="Hungary">Hungary</option>
                          <option value="Iceland">Iceland</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="India">India</option>
                          <option value="Iran">Iran</option>
                          <option value="Iraq">Iraq</option>
                          <option value="Ireland">Ireland</option>
                          <option value="Isle of Man">Isle of Man</option>
                          <option value="Israel">Israel</option>
                          <option value="Italy">Italy</option>
                          <option value="Jamaica">Jamaica</option>
                          <option value="Japan">Japan</option>
                          <option value="Jordan">Jordan</option>
                          <option value="Kazakhstan">Kazakhstan</option>
                          <option value="Kenya">Kenya</option>
                          <option value="Kiribati">Kiribati</option>
                          <option value="Korea North">Korea North</option>
                          <option value="Korea Sout">Korea South</option>
                          <option value="Kuwait">Kuwait</option>
                          <option value="Kyrgyzstan">Kyrgyzstan</option>
                          <option value="Laos">Laos</option>
                          <option value="Latvia">Latvia</option>
                          <option value="Lebanon">Lebanon</option>
                          <option value="Lesotho">Lesotho</option>
                          <option value="Liberia">Liberia</option>
                          <option value="Libya">Libya</option>
                          <option value="Liechtenstein">Liechtenstein</option>
                          <option value="Lithuania">Lithuania</option>
                          <option value="Luxembourg">Luxembourg</option>
                          <option value="Macau">Macau</option>
                          <option value="Macedonia">Macedonia</option>
                          <option value="Madagascar">Madagascar</option>
                          <option value="Malaysia">Malaysia</option>
                          <option value="Malawi">Malawi</option>
                          <option value="Maldives">Maldives</option>
                          <option value="Mali">Mali</option>
                          <option value="Malta">Malta</option>
                          <option value="Marshall Islands">Marshall Islands</option>
                          <option value="Martinique">Martinique</option>
                          <option value="Mauritania">Mauritania</option>
                          <option value="Mauritius">Mauritius</option>
                          <option value="Mayotte">Mayotte</option>
                          <option value="Mexico">Mexico</option>
                          <option value="Midway Islands">Midway Islands</option>
                          <option value="Moldova">Moldova</option>
                          <option value="Monaco">Monaco</option>
                          <option value="Mongolia">Mongolia</option>
                          <option value="Montserrat">Montserrat</option>
                          <option value="Morocco">Morocco</option>
                          <option value="Mozambique">Mozambique</option>
                          <option value="Myanmar">Myanmar</option>
                          <option value="Nambia">Nambia</option>
                          <option value="Nauru">Nauru</option>
                          <option value="Nepal">Nepal</option>
                          <option value="Netherland Antilles">Netherland Antilles</option>
                          <option value="Netherlands">Netherlands (Holland, Europe)</option>
                          <option value="Nevis">Nevis</option>
                          <option value="New Caledonia">New Caledonia</option>
                          <option value="New Zealand">New Zealand</option>
                          <option value="Nicaragua">Nicaragua</option>
                          <option value="Niger">Niger</option>
                          <option value="Nigeria">Nigeria</option>
                          <option value="Niue">Niue</option>
                          <option value="Norfolk Island">Norfolk Island</option>
                          <option value="Norway">Norway</option>
                          <option value="Oman">Oman</option>
                          <option value="Pakistan">Pakistan</option>
                          <option value="Palau Island">Palau Island</option>
                          <option value="Palestine">Palestine</option>
                          <option value="Panama">Panama</option>
                          <option value="Papua New Guinea">Papua New Guinea</option>
                          <option value="Paraguay">Paraguay</option>
                          <option value="Peru">Peru</option>
                          <option value="Phillipines">Philippines</option>
                          <option value="Pitcairn Island">Pitcairn Island</option>
                          <option value="Poland">Poland</option>
                          <option value="Portugal">Portugal</option>
                          <option value="Puerto Rico">Puerto Rico</option>
                          <option value="Qatar">Qatar</option>
                          <option value="Republic of Montenegro">Republic of Montenegro</option>
                          <option value="Republic of Serbia">Republic of Serbia</option>
                          <option value="Reunion">Reunion</option>
                          <option value="Romania">Romania</option>
                          <option value="Russia">Russia</option>
                          <option value="Rwanda">Rwanda</option>
                          <option value="St Barthelemy">St Barthelemy</option>
                          <option value="St Eustatius">St Eustatius</option>
                          <option value="St Helena">St Helena</option>
                          <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                          <option value="St Lucia">St Lucia</option>
                          <option value="St Maarten">St Maarten</option>
                          <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                          <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                          <option value="Saipan">Saipan</option>
                          <option value="Samoa">Samoa</option>
                          <option value="Samoa American">Samoa American</option>
                          <option value="San Marino">San Marino</option>
                          <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                          <option value="Saudi Arabia">Saudi Arabia</option>
                          <option value="Senegal">Senegal</option>
                          <option value="Seychelles">Seychelles</option>
                          <option value="Sierra Leone">Sierra Leone</option>
                          <option value="Singapore">Singapore</option>
                          <option value="Slovakia">Slovakia</option>
                          <option value="Slovenia">Slovenia</option>
                          <option value="Solomon Islands">Solomon Islands</option>
                          <option value="Somalia">Somalia</option>
                          <option value="South Africa">South Africa</option>
                          <option value="Spain">Spain</option>
                          <option value="Sri Lanka">Sri Lanka</option>
                          <option value="Sudan">Sudan</option>
                          <option value="Suriname">Suriname</option>
                          <option value="Swaziland">Swaziland</option>
                          <option value="Sweden">Sweden</option>
                          <option value="Switzerland">Switzerland</option>
                          <option value="Syria">Syria</option>
                          <option value="Tahiti">Tahiti</option>
                          <option value="Taiwan">Taiwan</option>
                          <option value="Tajikistan">Tajikistan</option>
                          <option value="Tanzania">Tanzania</option>
                          <option value="Thailand">Thailand</option>
                          <option value="Togo">Togo</option>
                          <option value="Tokelau">Tokelau</option>
                          <option value="Tonga">Tonga</option>
                          <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                          <option value="Tunisia">Tunisia</option>
                          <option value="Turkey">Turkey</option>
                          <option value="Turkmenistan">Turkmenistan</option>
                          <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                          <option value="Tuvalu">Tuvalu</option>
                          <option value="Uganda">Uganda</option>
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="Ukraine">Ukraine</option>
                          <option value="United Arab Erimates">United Arab Emirates</option>
                          <option value="United States of America">United States of America</option>
                          <option value="Uraguay">Uruguay</option>
                          <option value="Uzbekistan">Uzbekistan</option>
                          <option value="Vanuatu">Vanuatu</option>
                          <option value="Vatican City State">Vatican City State</option>
                          <option value="Venezuela">Venezuela</option>
                          <option value="Vietnam">Vietnam</option>
                          <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                          <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                          <option value="Wake Island">Wake Island</option>
                          <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                          <option value="Yemen">Yemen</option>
                          <option value="Zaire">Zaire</option>
                          <option value="Zambia">Zambia</option>
                          <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                      </div>
                    </div>
                  </div>
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
                <div class="pt-5 mt-5 delimiter-top">
                  <div class="actions-toolbar py-2 mb-4">
                    <h5 class="mb-1">About me</h5>
                    <p class="text-sm text-muted mb-0">Use this field to let others know you better.</p>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <div class="form-group">
                          <label class="form-control-label">Description <span class="text-danger">*</span></label>
                          <textarea class="form-control" name="description" placeholder="Tell us a few words about yourself" rows="3" required><?php echo htmlentities($result->description);?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <div class="form-group">
                          <label class="form-control-label">Design Style <span class="text-danger">*</span></label>
                          <textarea class="form-control" name="design_style" placeholder="For example : Contemporary Design, Traditional Design etc" rows="3" required><?php echo htmlentities($result->design_style);?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <div class="form-group">
                          <label class="form-control-label">Expertise <span class="text-danger">*</span></label>
                          <textarea class="form-control" name="expertise" placeholder="For example : Apartments, Bungalows, Duplex Houses" rows="3" required><?php echo htmlentities($result->expertise);?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <div class="form-group">
                          <label class="form-control-label">Experience <span class="text-danger">*</span></label>
                          <textarea class="form-control" name="experience" placeholder="For example : 5 years in the industry as a full fledged professional" rows="3" required><?php echo htmlentities($result->experience);?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <div class="form-group">
                          <label class="form-control-label">Specialisation <span class="text-danger">*</span></label>
                          <textarea class="form-control" name="specialisation" placeholder="For example : Kitchens, Interior Garden, Bedroom" rows="3" required><?php echo htmlentities($result->specialisation);?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Personal Website</label>
                        <input class="form-control" name="personal_website" type="text" value="<?php echo htmlentities($result->personal_website);?>" placeholder="Paste your Personal website URL">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label class="form-control-label">Profile Picture</label>
                        <?php if($result->profile==!NULL) {?>
                        <input class="form-control" name="" type="hidden">
                        <?php } else {?>

                        <input class="form-control" name="profile" type="file">
                        <?php } ?>
                      </div>
                    </div>

                    <?php if($result->profile==!NULL) {?>

                    <div class="col-lg-12" style="max-width: 17%;">
                      <div> 
                        <!-- <button type="submit" name="del" class="btn btn-youtube rounded-circle btn-icon-only" style="position: absolute; right: 0; width: 2rem;    height: 2rem;    line-height: 2rem;">
                        <span class="btn-inner--icon">
                            <i class="fas fa-times"></i>
                        </span>
                    </button> -->
                    <a href="content/<?php echo htmlentities($result->profile);?>" data-fancybox="pp"> <img alt="Image placeholder" src="content/<?php echo htmlentities($result->profile);?>" class="img-fluid rounded shadow-lg"> </a>

                      </div>
                    </div>

                    <?php } else {?>

                    <span>No Profile Image Uploaded</span>



                    <?php } ?>
                  </div>


                </div>
                <!-- Save changes buttons -->
                <div class="pt-5 mt-5 delimiter-top text-center">
                  <button type="submit" name="update" class="btn btn-sm bg-gradient-primary text-white">Save changes</button>
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
