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
    <title> Hideaway Hut </title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="customer-bootstrap.css" />
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="customer-font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="customer-stylen.css" rel="stylesheet" />
    <!-- responsive style -->
    <style>
        body {
            background: #ffffff;
        }
    </style>
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  mx-auto ">
                            <li class="nav-item">
                                <a class="nav-link" href="customer-index.php">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="customer-about.php">About</a>
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

    <!-- food section -->

    <section class="food_section layout_padding-bottom">
        <div class="container" style="height: 50rem;">
            <div class="heading_container heading_center">
                <h2>
                    Checkout
                    <br> <br>
            </div>

            <div class="filters-content">
                <div class="row grid">

                    <p style="margin-left: 5%; position: absolute;">
                        <span style="font-weight: bolder; font-size: 1.5rem; ">Order summary<br> </span> <span style="font-weight: bolder;">
                            <?php
                    $timecheck = getdate(date("U"));
                    $date = "
                    $timecheck[month]
                    $timecheck[mday],
                    $timecheck[year]";
                    
                    echo $date;
                    
                    ?>
                        </span>
                        
                        <br>
                    </p>

                    <form action="customer-place-order.php"
                        style="margin-left: 5%; margin-top: 5rem; position: absolute; width: 95%;">

                        <br>
                        <span style="font-weight: bolder; font-size: 1.2rem;">
                            Products ordered <br>
                        </span> <br>
                        <?php
                  $userID = $_SESSION['userID'];
                  $sql = "Select * from mycart WHERE userID='$userID';";
                  $res = mysqli_query($dbcon, $sql);
                  $count = mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $productPrice = $row['productPrice'];
                          $productName = $row['productName'];
                          $productQuantity = $row['productQuantity'];
                          $nameAppend;
                          ?>
                          
                          
                        <p id="quantity-box">
                            <span style="font-weight: bolder; font-size: 1rem;">
                                <?php echo $row["productQuantity"]; ?> X
                            </span>
                            
                            &nbsp; <?php echo $row["productName"];?> &nbsp; <br>
                            ₱ <span style="font-weight: bolder;">
                                <?php echo $row["productPrice"]; ?>
                                
                          
                            </span> 
                            
                            <br> <br>
                            
                            <input style="display:none;" name="productQuantity" type="number"
                                value="<?php echo $row["productQuantity"]; ?>">
                                
                            <input style="display:none;" name="userID" type="text"
                                value="<?php echo $_SESSION['userID']; ?>">
                                
                            <input style="display:none;" name="productID" type="text"
                                value="<?php echo $row["productID"]; ?>">
                                
                            <input style="display:none;" name="orderID" type="number"
                                value="<?php echo rand(1111, 9999); ?>">
                                
                            <input style="display:none;" name="productName" type="text"
                                value="<?php error_reporting(0); echo $nameAppend .= "$productQuantity" . " X " . "$productName" . "    "; ?>">
                            
                            <input style="display:none;" name="productPrice" type="number"
                                value="<?php echo $row[" productPrice"];?>">
                                
                            <input style="display:none;" name="orderStatus" type="text"
                                value="To be confirmed by Administrator">
                        </p>




                        <?php
                    }
                  }
                else
                  {
                    echo "<div class='error'>An error occured.</div>";
                  }
                  ?>
                  
                  
                  
                  

                        <hr id="hr-2" style="width: 95%; margin-left: 0;">

                        <?php
                  $sql = "SELECT SUM(productQuantity) FROM mycart;";
                  $res = mysqli_query($dbcon, $sql);
                  $count = mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $quantity = $row['SUM(productQuantity)'];
                          ?>
                        <?php
                    }
                  }
                else
                  {
                    echo "<div class='error'>Food not available.</div>";
                  }
                  ?>



                        <input style="display:none;" name="productQuantity" type="number"
                            value="<?php echo $quantity; ?>">
                        <span style="font-weight: bolder; font-size: 1.2rem;">
                            Payment details
                        </span> 
                        <p id="subtotal"> <br>
                            Subtotal
                            <span style="font-weight: bolder;">
                                <?php
                  $sql = "SELECT SUM(productQuantity*productPrice) FROM mycart;";
                  $res = mysqli_query($dbcon, $sql);
                  $count = mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          echo "₱".$row['SUM(productQuantity*productPrice)'];
                            $subtotal = $row['SUM(productQuantity*productPrice)'];
                          ?>
                                <?php
                    }
                  }
                else
                  {
                    echo "<div class='error'>Food not available.</div>";
                  }
                  ?>
                            </span>

                            <input style="display:none;" name="subTotal" type="number" value="<?php echo $subtotal; ?>">
                        </p>


                        <p id="delivery-fee">
                            Delivery Fee <span style="font-weight: bolder;">₱35.00</span>
                            <input style="display:none;" name="deliveryFee" type="number"
                                value="<?php echo "35.00"; $riderNotes = ""; $deliveryFee = "35"?>">
                        </p>

                        <p id="total">
                            Total <span id="total-price" style="font-weight: bolder;">₱
                                <?php echo $subtotal + $deliveryFee; ?>
                                <input style="display:none;" name="amountPayable" type="number"
                                    value="<?php echo $subtotal + $deliveryFee;?>">
                            </span> <br>
                        </p> <br>


                        <hr id="hr-2" style="width: 95%; margin-left: 0;">

                        <?php
                  $userID = $_SESSION['userID'];
                  $sql = "Select * from useraccount WHERE userID='$userID';";
                  $res = mysqli_query($dbcon, $sql);
                  $count = mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $deliveryAddress = $row['deliveryAddress'];
                          $contactNumber = $row['contactNumber'];
                          ?>

                        <span style="font-weight: bolder; font-size: 1.2rem;">
                            Delivery details
                        </span> <br> <br>
                        
                        <p id="deliver-to">
                            <span style="font-weight: bolder; font-size: 1rem;">
                                Customer Name
                            </span>
                            <br>
                        
                        <?php
                  $userID = $_SESSION['userID'];
                  $sql = "Select * from useraccount WHERE userID='$userID';";
                  $res = mysqli_query($dbcon, $sql);
                  $count = mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $productPrice = $row['userID'];
                          $productName = $row['userName'];
                          ?>
                  
                  <input style="border: none; color: rgb(0, 97, 247); padding-top: .3rem;" name="userName" type="text" value="<?php echo $row["userName"]; ?>">
                  
                  <?php
                    }
                  }
                else
                  {
                    echo "<div class='error'>An error occured.</div>";
                  }
                  ?>
                        


                        <p id="deliver-to">
                            <span style="font-weight: bolder; font-size: 1rem;">
                                Cash on Delivery Address
                            </span>
                            <br>

                            <input id="delivery-address-input" type="text" name="deliveryAddress"
                                placeholder="Enter Delivery Address" value="<?php echo $deliveryAddress;?>"
                                pattern="(?=.*[a-z])(?=.*[A-Z]).{10,}" required
                                style=" width: 95%; height: 2rem; font-size: 1rem;border: .1rem solid rgb(0, 97, 247, .7); border-radius: .5rem; text-align: left; padding: .3rem .5rem;">
                            <input style="display:none;" id="paymentMode" type="text" name="paymentMode"
                                value="Cash on Delivery">
                        </p>


                        <p id="rider-notes">
                            <span style="font-weight: bolder; font-size: 1rem;">
                            Rider Notes
                            </span>
                            <br>
                            <input id="rider-notes-input" type="text" name="riderNotes"
                                placeholder="Add Rider Notes (optional)" value="" pattern="(?=.*[a-z])(?=.*[A-Z]).{5,}"
                                style=" width: 95%; height: 2rem; font-size: 1rem;border: .1rem solid rgb(0, 97, 247, .7); border-radius: .5rem; text-align: left; padding: .3rem .5rem;">
                        </p>

                        <p id="contact-number">
                            <span style="font-weight: bolder; font-size: 1rem;">
                            Contact Number
                            </span>
                            <br>
                            <input id="contact-number-input" type="text" name="contactNumber"
                                placeholder="Enter Contact Number" value="<?php echo $contactNumber;?>"
                                pattern="(?=.*\d).{10,}" required
                                style=" width: 95%; height: 2rem; font-size: 1rem;border: .1rem solid rgb(0, 97, 247, .7); border-radius: .5rem; text-align: left; padding: .3rem .5rem;"
                                </p> <?php
                    }
                  }
                  ?> <br> <br>


                            <input id="place-order-button" type="submit" name="place-order" value="Place Order"
                                style="color: #ffffff; padding: .4rem 0 .5rem 0; min-width: 35%; max-width: 50%; height: 3rem; font-size: 1.2rem;border: none; background: rgb(0, 97, 247, 7); border-radius: .5rem; text-align: center;">
                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- end food section -->
    <!-- footer section -->
    <footer class="footer_section" style="margin-top: 50rem;">
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
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