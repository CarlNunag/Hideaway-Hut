<?php
require('dbc-edited.php');
session_start();

if(time()-$_SESSION["login_time_stamp"] >600) 
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hideaway Hut | Walk-in Orders</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="admin-style.mn.css">
</head>

<body>
  <div class="layer"></div>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="#" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Hideaway</span>
                    <span class="logo-subtitle">FOS</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        

        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
              
                    
                    <a class="show-cat-btn" href="##">
                <span aria-hidden="true"></span>
                <span class="category__btn transparent-btn" title="Open list">
                  <span aria-hidden="true"></span>
                </span>
              </a>

              <ul class="cat-sub-menu">

              </ul>

                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="admin-dashboard.php" class="sidebar-user"> &nbsp; &nbsp; &nbsp;
        <span class="icon user-3" aria-hidden="true"></span> &nbsp; &nbsp;
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">Viewer mode</span>
                <span class="sidebar-user__subtitle">System Mode</span>
            </div>
        </a>
    </div>
</aside>


  <div class="main-wrapper">
    <!-- ! Main nav -->
    <nav class="main-nav--bg">
  <div class="container main-nav">
    <div class="main-nav-start">
    </div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      
      <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
        <span class="sr-only">Switch theme</span>
        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
      </button>

      
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture><source srcset="avatar-illustrated-02.webp" type="image/webp"><img src="avatar-illustrated-02.png" alt="User name"></picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
          <li><a class="danger" href="admin-logout.html">
              <i data-feather="log-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>




    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Walk-in Orders</h2></h2>
        
        <div class="row">

                <?php
                  $sql = "Select * from orderhistory ORDER BY productID;";
                  $res = mysqli_query($dbcon, $sql);
                  $count = mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $productID = $row['productID'];
                          $productName = $row['productName'];
                          $cquantity = $row['cquantity'];
                          $ctotal = $row['ctotal'];
                          $ccash = $row['ccash'];
                          $cchange = $row['cchange'];
                          $ccost = $row['ccost'];
                          ?>
                          
                        
                        <article class="white-block" style="margin-left: 3%; min-width: 30%; max-width: 40%;">
              <div class="top-cat-title">
                    <h3>Order Summary</h3> <br>
                        Product ID: <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row["productID"]; ?>
                            </span> <br> <br>
                                    
                        Product Name:  <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row['productName']; ?>
                            </span> <br> <br>
                                    
                        Quantity:  <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row['cquantity']; ?>
                            </span> <br> <br>
                            
                       Amount Payable:  <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row['ctotal']; ?>
                            </span> <br> <br>
                            
                        Cash:  <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row['ccash']; ?>
                            </span> <br> <br>
                            
                        Change:  <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row['cchange']; ?>
                            </span> <br> <br>
                            
                                                        <ul class="top-cat-list">
                                <li> <br>
                                    <div class="top-cat-list__title">
                                        <p style="font-weight: bolder;">Order Total: </p>
                                            <div class="top-cat-list__subtitle">
                                                <span class="primary">
                                                     
                                                    <span style="font-weight: bolder;">
                                                        ₱&nbsp;<?php echo $row['ccost']; ?>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                    </li>
                                    
                                    
    
                                    </div>
                                    
                                    
                                </li>
                            </ul>
            </article> 
                        
                  <?php
                    }
                  }
                else
                  {
                    echo "<div class='error'>Food not available.</div>";
                  }
                  ?>
            
        </div>
      </div>
    </main>



    <!-- ! Footer -->
    <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>2021 © Elegant Dashboard - <a href="elegant-dashboard.com" target="_blank"
          rel="noopener noreferrer">elegant-dashboard.com</a></p>
    </div>
    <ul class="footer-end">
      <li><a href="##">About</a></li>
      <li><a href="##">Help</a></li>
    </ul>
  </div>
</footer>
  </div>
</div>
<!-- Chart library -->
<script src="admin-chart.min.js"></script>
<!-- Icons library -->
<script src="admin-feather.min.js"></script>
<!-- Custom scripts -->
<script src="admin-script.js"></script>
</body>

</html>