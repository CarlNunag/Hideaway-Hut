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

  <title> Hideaway Hut | Order Bag </title>

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
              <li class="nav-item">
                <a class="nav-link" href="customer-about.php">About </a>
              </li>
              
               <li class="nav-item">
                <a class="nav-link" href="customer-logout.html">Logout </a>
              </li>
              
            </ul>
            <div class="user_option">
              
            <a href="customer-menu.php" class="order_online">
                Menu
            </a>
            
            
          
            <a href="customer-placed-orders.php" class="order_online">
                My Orders
              </a>
            
            <a href="customer-checkout.php" class="order_online">
                Checkout
            </a>

            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          <br> Order Bag
        </h2>
      </div>

      <div class="filters-content">
        <div class="row grid">

          <table>
            <tbody>
              <?php 
                $userID = $_SESSION['userID'];
                $sql = "Select * from mycart WHERE userID='$userID';";
                $res = mysqli_query($dbcon, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $productName = $row['productName'];
                            $productPrice = $row['productPrice'];
                            $productQuantity = $row['productQuantity'];
                            $productID = $row['productID'];
                            $userID = $_SESSION['userID'];
                            ?>
              
                <tr>
                <form action="customer-update-mycart.php">

                  <div class="col-sm-6 col-lg-4 all pizza">
                    <div class="box">
                      <div>
                        <div class="img-box">
                          
                          <a href="customer-lightbox.php"></a> 
                        </div>
                        <div class="detail-box">
                          <h5 style="color: #000000;">
                          <span style="font-weight: bolder; font-size: 1.2rem;">
                            <?php echo $row["productName"]; ?>
                            </span>
                          </h5>
                          
                          <div class="options">
                            <h6 style="color: #000000;">
                              ₱ 
                              <span style="font-weight: bolder; font-size: 1.2rem;">
                                <?php echo $row["productPrice"]; ?>
                                </span>
                                <br>
                                
                              PC
                              <span style="font-weight: bolder; font-size: 1.2rem;">
                                <?php echo $row["productQuantity"]; ?>
                                </span>
                                <br> 
                                
                            </h6>
                          </div> <br>
                          <input id="quantity-input" name="productQuantity" type="number" value="<?php echo $row["productQuantity"]; ?>" style="margin-left: 35%; width: 30%; height: 2.5rem; font-size: 1.2rem;border: .1rem solid rgb(0, 97, 247, .7); border-radius: 1rem; text-align: center;  font-weight: bolder;" pattern="(?=.*\d)" max="100" autofocus required> <br><hr><br>
                          
                          <input style="display:none;" name="productName" type="text" value="<?php echo $row["productName"]; ?>">
                          <input style="display:none;" name="productPrice" type="number" value="<?php echo $row["productPrice"]; ?>">
                          <input style="display:none;" name="productID" type="number" value="<?php echo "" . $row["productID"]; ?>">
                          <input style="display:none;" name="userID" type="text" value="<?php echo $_SESSION['userID']; ?>">
                          
                          <input id="update-quantity-button" name="submit" type="submit" value="Update Quantity" onclick="validateinput()" style="color: #ffffff; width: 100%; height: 2.5rem; font-size: 1.2rem;border: none; background: rgb(0, 97, 247, 7); border-radius: 1rem; text-align: center;"> <br> <br> <br>
                          <a id="delete-button" href="customer-delete.php?id=<?php echo $row['productID']; ?>" style="color: rgb(0, 97, 247); padding: .5rem 1rem; height: 1rem; font-size: 1rem; border: none; background: rgba(0, 97, 247, .3); border-radius: 1rem; text-align: center;">Remove product</a>
                        </div>
                      </div>
                    </div>
              </div>
                  </form>
                </tr>
              <?php
                    }
                  }
                else
                  {
                    echo "<div class='error'>You have an empty bag.</div>";
                  }
                  ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="btn-box">
        </form>
        
      </div>
    </div>
  </section>

  <!-- end food section -->

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