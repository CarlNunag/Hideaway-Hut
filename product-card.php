<?php
require('dbc-edited.php');
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
  <title> Hideaway Hut </title>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="customer-bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="customer-font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="stylenew.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="responsive.css" rel="stylesheet" />
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
              <li class="nav-item">
                <a class="nav-link" href="customer-index.php">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="customer-about.html">About</a>
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

  <!-- food section -->

  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2> <br>
          Our Menu
        </h2>
      </div>
      <div class="filters-content">
        <div class="row grid">
          <table width="90%" style="margin-left: 20px; border-collapse:collapse; color: midnightblue; font-size: 12px;">
            <tbody>
              <?php 
            
                $sql = "Select * from purchasecounter ORDER BY id;";
                $res = mysqli_query($dbcon, $sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $productname = $row['productname'];
                            ?>
                <tr style="height: 150px; display: block;">
                <form action="customer-add-to-cart.php">
                  <div class="col-sm-6 col-lg-4 all pizza">
                    <div class="box">
                      <div>
                        <div class="img-box"></div>
                        <div class="detail-box">
                          <h5>
                            <?php echo $row["productname"]; ?>
                          </h5>
                          <div class="options">
                            <h6 style="font-weight: bolder;">
                              ₱ <?php echo $row["ccost"]; ?>
                            </h6>
                          </div>
                          <input style="display:none;" name="id" type="number" value="<?php echo $row["id"]; ?>">
                          <input style="display:none;" name="productName" type="text" value="<?php echo $row["productname"]; ?>">
                          <input style="display:none;" name="ccost" type="number" value="<?php echo $row["ccost"]; ?>">
                          <input id="quantity-input" name="productQuantity" type="number" value="0">
                          <input style="display:none;" name="orderID" type="number" value="<?php echo rand(1000, 9999); ?>">
                          <input id="add-to-bag-button" name="submit" type="submit" value="Add to Bag">
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
                    echo "<div class='error'>Food not available.</div>";
                  }
                  ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- end food section -->
              <hr>
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
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
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