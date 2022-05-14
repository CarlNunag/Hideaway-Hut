<?php
    require('dbc-edited.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="admin-style.mn.css">
</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
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

                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user"> &nbsp; &nbsp; &nbsp;
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
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Update Order Status</h2>
        <div class="row">
          <div class="col-lg-9">
            <div class="users-table table-wrapper">

                <form class="updateform" action="admin-order-status.php">
                            
                  
                  
                  <?php
                  $id=$_REQUEST['id'];
                  $sql = "Select * from placedorders WHERE orderID=$id;";
                  $res = mysqli_query($dbcon, $sql);
                  $count = mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $orderID = $row['orderID'];
                          ?>

                  <tr>
                  </tr>
                    <input type="text" name="orderID" style="display: none;" value="<?php echo $row["orderID"];?>" placeholder="Order ID"> <br>
                  <?php
                    }
                  }
                  ?>
                            
                  
                  
                  <input type="text" name="orderStatus" value="" placeholder="Order status" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" required> <br>
                            
                  <input id="add-button" type="submit" value="Update" name="submit" onclick="validateinput()">
                </form>
            </div>
          </div>
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