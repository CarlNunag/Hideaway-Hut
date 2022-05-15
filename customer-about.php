<?php
require('dbc-edited.php');
session_start();

if(time()-$_SESSION["login_time_stamp"] >7200) 
    {
        session_unset();
        session_destroy();
        header("Location:index.html");
    }
    
    else  
        {  
            $_SESSION['last_login_timestamp'] = time();
        } 

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="customer-favicon.png" type="">

  <title> Hideaway Hut | About </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="customer-bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="customer-font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="customer-stylen.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="customer-responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="customer-index.php">
            <span>
             Hideaway Hut
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item ">
                <a class="nav-link" href="customer-index.php">Home </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="customer-about.php">About <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="customer-logout.html">Logout </a>
              </li>
            </ul>
            <div class="user_option">
              <a href="customer-placed-orders.php" class="order_online">
                My Orders
              </a>
              <a href="customer-mycart.php" class="order_online">
                Order Bag
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="customer-about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                We Are Hideaway Hut
              </h2>
            </div>
            <p>
              Welcome to Hideaway Hut Food Ordering system!
                    <p>
                       We provide affordable snacks and cravings at your reach. <br>
                       Quick food ordering with four easy steps. <br> <br>
                       * Select your prefered product and corresponding quantity <br>
                       * Add to bag <br>
                       * Proceed to checkout <br>
                       * Wait for an order confirmation <br>
            </p>
            <a href="customer-menu.php" style="color: #ffffff; border: none; background: rgb(0, 97, 247, .8); border-radius: 1rem; text-align: center;">
              Order Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  AM Compound, Labuan, Zamboanga City
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +63 9066141035
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  Adzminaalih.aa@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              Hideaway Hut
            </a>
            <p>
              
            </p>
            <div class="footer_social">
              <p>
                  <?php 
                $userID = $_SESSION['userID'];
                $sql = "Select * from useraccount WHERE userID='$userID';";
                $res = mysqli_query($dbcon, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $accountStatus = $row['accountStatus'];
                            $userID = $_SESSION['userID'];
                            ?>
                  My account status: <?php echo $row['accountStatus'];?>
                  <?php
                    }
                  }
                  ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Mondays to Saturdays
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="customer-jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="customer-bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="customer-custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>