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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hideaway Hut | Order Card</title>
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
              <li>
                  <a href="admin-dashboard.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
              </li>

                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon message" aria-hidden="true"></span>Orders
                        <span class="category__btn transparent-btn" title="Open list">
                            
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>

                    <ul class="cat-sub-menu">
                      <li>
                        <a href="admin-online-orders.php"><span  aria-hidden="true"></span>Online Orders</a>
                      </li>
                      <li>
                        <a href="admin-walk-in-orders.php"><span  aria-hidden="true"></span>Walk-in Orders</a>
                      </li>

                    </ul>

                    <a class="show-cat-btn" href="##">
                        <span class="icon category" aria-hidden="true"></span>Inventory
                        <span class="category__btn transparent-btn" title="Open list">
                            
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>

                    <ul class="cat-sub-menu">
                      <li>
                        <a href="admin-inventory.php"><span  aria-hidden="true"></span>Visit Inventory</a>
                      </li>
                      <li>
                        <a href="admin-updateinventory.php"><span  aria-hidden="true"></span>Update a product</a>
                      </li>

                      <li>
                        <a href="admin-addrecord.php"><span  aria-hidden="true"></span>Add new product</a>
                      </li>

                    </ul>
                    
                    <a class="show-cat-btn" href="##">
                <span class="icon user-3" aria-hidden="true"></span>User Accounts
                <span class="category__btn transparent-btn" title="Open list">
                  <span class="icon arrow-down" aria-hidden="true"></span>
                </span>
              </a>

              <ul class="cat-sub-menu">
                <li>
                  <a href="admin-customers.php"><span aria-hidden="true"></span>Registered accounts</a>
                </li>

              </ul>

                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="admin-viewer-mode.php" class="sidebar-user"> &nbsp; &nbsp; &nbsp;
        <span class="icon user-3" aria-hidden="true"></span> &nbsp; &nbsp;
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">Admin mode</span>
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
          <li><a href="##">
              <i data-feather="user" aria-hidden="true"></i>
              <span>Profile</span>
            </a></li>
          <li><a href="##">
              <i data-feather="settings" aria-hidden="true"></i>
              <span>Account settings</span>
            </a></li>
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
    <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
          <?php
                  $id=$_REQUEST['id'];
                  $sql = "Select * from placedorders WHERE orderID='$id';";
                  $res = mysqli_query($dbcon, $sql);
                  $count = mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $time = $row['time'];
                          $orderID = $row['orderID'];
                          $productName = $row['productName'];
                          $productQuantity = $row['productQuantity'];
                          $subTotal = $row['subTotal'];
                          $amountPayable = $row['amountPayable'];
                          $deliveryFee = $row['deliveryFee'];
                          ?>
                          
                          
        
      </div>
      
      <br>

      <div class="filters-content">
          
        <div class="row grid">
          
          <div class="col-lg-3">
              <h3> Order number: <span style="color: rgb(0, 97, 247);"> #<?php echo $row["orderID"]; ?></span> <br> <br> </h3>
            <article class="white-block" >
              <div class="top-cat-title">
                    <h3>Order Details</h3> <br>
                        User ID: <br>
                            <span style="font-weight: bolder;">
                                #&nbsp;<?php echo $row["userID"]; ?>
                            </span> <br> <br>
                            
                        Contact Number:  <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row["contactNumber"]; ?>
                            </span> <br> <br>
                                    
                                    
                        Rider Notes:  <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row["riderNotes"]; ?>
                            </span> <br> <br>
                                    
                        Payment Method:  <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row["paymentMode"]; ?>
                            </span> <br> <br>
                            
                        Delivery Address:  <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row["deliveryAddress"]; ?>
                            </span>
            </article>
            
            
            
          </div>
          
          <article class="white-block" style="margin-left: 3%; max-width: 45%;">
              <div class="top-cat-title">
                            <h3>Products summary</h3> <br>
                            
                            <span style="font-weight: bolder;">
                            <?php echo $row["productQuantity"]; ?>&nbsp;
                            </span>
                            
                            Items
                            <br>
                            <br> 
                            
                            <span style="font-weight: bolder;">
                            <?php echo $row["productName"]; ?>
                            </span>
                            
                            <br> 

                            <ul class="top-cat-list">
                                <li> <br>
                                    <div class="top-cat-list__title">
                                        <p style="font-weight: bolder;">Subtotal: </p>
                                            <div class="top-cat-list__subtitle">
                                                <span class="primary">
                                                     
                                                    <span style="font-weight: bolder;">
                                                        ₱&nbsp;<?php echo $row["subTotal"]; ?>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
    
                                    </div>
                                </li>
                            </ul>
            </article>
          
          <article class="white-block" style="margin-left: 3%; max-width: 45%;">
              <div class="top-cat-title">
                    <h3>Order Summary</h3> <br>
                        Order Date: <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row["time"]; ?>
                            </span> <br> <br>
                                    
                        Subtotal:  <br>
                            <span style="font-weight: bolder;">
                                ₱&nbsp;<?php echo $row["subTotal"]; ?>
                            </span> <br> <br>
                                    
                        Delivery Fee:  <br>
                            <span style="font-weight: bolder;">
                                ₱&nbsp;<?php echo $row["deliveryFee"]; ?>
                            </span> <br> <br>
                            
                        Order Status:  <br>
                            <span style="font-weight: bolder;">
                                <?php echo $row["orderStatus"]; ?>
                            </span> <br> <br>
                            
                                                        <ul class="top-cat-list">
                                <li> <br>
                                    <div class="top-cat-list__title">
                                        <p style="font-weight: bolder;">Order Total: </p>
                                            <div class="top-cat-list__subtitle">
                                                <span class="primary">
                                                     
                                                    <span style="font-weight: bolder;">
                                                        ₱&nbsp;<?php echo $row["amountPayable"]; ?>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                    <div class="top-cat-list__title">
                                        
                                        
                                        
                                        <a href="admin-update-order-status.php?id=<?php echo $row['orderID']; ?>" style="color: #ffffff; border: none; background: rgb(0, 97, 247, .8); border-radius: .5rem; text-align: center; padding: 1rem 1.5rem;">Update status</a>
                                    </div>
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
                            echo "<div class='error'>No customer orders yet.</div>";
                        }
                            ?>
          
        </div>
        
        
      </div>
    </div>
  </section>

  <br><br><br><br><br>

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