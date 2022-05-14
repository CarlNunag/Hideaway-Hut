<?php
require('dbc-edited.php');
session_start();

if (time() - $_SESSION["login_time_stamp"] > 7200) {
    session_unset();
    session_destroy();
    header("Location:index.html");
} else {
    $_SESSION['last_login_timestamp'] = time();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hideaway Hut | Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="admin-style.mn.css">
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
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
                            <a class="active" href="admin-dashboard.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
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
                                    <a href="admin-online-orders.php"><span aria-hidden="true"></span>Online Orders</a>
                                </li>
                                <li>
                                    <a href="admin-walk-in-orders.php"><span aria-hidden="true"></span>Walk-in Orders</a>
                                </li>
                                <li>
                                    <a href="admin-place-walk-in-orders.php"><span aria-hidden="true"></span>Place Walk-in Orders</a>
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
                                    <a href="admin-inventory.php"><span aria-hidden="true"></span>Visit Inventory</a>
                                </li>
                                <li>
                                    <a href="admin-updateinventory.php"><span aria-hidden="true"></span>Update a
                                        product</a>
                                </li>

                                <li>
                                    <a href="admin-addrecord.php"><span aria-hidden="true"></span>Add new product</a>
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
                                    <a href="admin-customers.php"><span aria-hidden="true"></span>Registered
                                        accounts</a>
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
                        <h2 class="main-title">Place walk-in orders</h2>
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
                                    <picture>
                                        <source srcset="avatar-illustrated-02.webp" type="image/webp"><img src="avatar-illustrated-02.png" alt="User name">
                                    </picture>
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
                    <div class="row">
                        <div class="col-lg-9">
                            
                            <div class="users-table table-wrapper">
                                <table class="posts-table">
                                    <thead>
                                        <tr class="users-table-info">
                                            <th style="width: 2rem; padding-left: 1rem;">Product Name</th>
                                            <th style="width: 2rem;">Price</th>
                                            <th style="width: 2rem;">Quantity</th>
                                            <th style="width: 2rem;">Modify Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "Select * from purchasecounter ORDER BY id;";
                                        $res = mysqli_query($dbcon, $sql);
                                        $count = mysqli_num_rows($res);
                                        if ($count > 0) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $productname = $row['productname'];
                                                $ccost = $row['ccost'];
                                                $cquantity = $row['cquantity'];
                                        ?>

                                                <tr>
                                                    <td id="d1">
                                                        <?php echo $row["productname"]; ?>
                                                    </td>
                                                    <td id="d2">
                                                        ₱
                                                        <?php echo $row["ccost"]; ?>
                                                    </td>
                                                    <td id="d3">
                                                        <?php echo $row["cquantity"]; ?>
                                                    </td>
                                                    <td id="d4">
                                                        <form class="quantity-container-form" action="admin-updatequantity.php">
                                                            <input id="quantity-container-form-textfield" type="number" name="cquantity" pattern="(?=.*\d).{3,}" required>
                                                            <input style="display: none;" id="update-textfield" name="idf" type="number" value="<?php echo "".$row["id"]; ?>">
                                                            <input id="quantity-container-form-update-button" name="submit" type="submit" value="Update" onclick="validateinput()">
                                                        </form>
                                                    </td>
                                                </tr>

                                        <?php
                                            }
                                        } else {
                                            echo "<div class='error'>Food not available.</div>";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>






                        <div class="col-lg-3">
                            <article class="white-block">
                                <div class="top-cat-title">
                                    <h3>Order Counter</h3>

                                    <ul class="top-cat-list">
                                        <li>
                                            <br>
                                            <div class="top-cat-list__title">
                                                <p>Amount Payable</p>
                                                <div class="top-cat-list__subtitle">
                                                    <span class="primary">₱


                                                        <?php
                                                        error_reporting(0);
                                                        $sql = "SELECT SUM(cquantity*ccost) FROM purchasecounter;";
                                                        $res = mysqli_query($dbcon, $sql);
                                                        $count = mysqli_num_rows($res);
                                                        if ($count > 0) {
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "" .  $row['SUM(cquantity*ccost)'];
                                                                
                                                        ?>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                </div>



                                            </div>
                                        </li>


                                        <li>
                                            <br> <br>
                                            <div class="top-cat-list__title">
                                                <p>Cash</p>
                                                <div class="top-cat-list__subtitle">
                                                    <span class="primary">₱
                                                        <?php
                                                        if (isset($_POST['btn'])) {
                                                            $cash = $_POST['c'];
                                                        }
                                                        echo ($cash);
                                                        ?>
                                                    </span>
                                                </div>
                                                <form method="post">
                                                    <input id="number" type="number" name="c" pattern="(?=.*\d).{2,}" required>
                                                    <input id="button" type="submit" name="btn" value="Calculate">
                                                </form>
                                        </li>


                                        <li>
                                            <br> <br>
                                            <div class="top-cat-list__title">
                                                <p>Change</p>
                                                <div class="top-cat-list__subtitle">
                                                    <span class="warning">₱
                                                        <?php

                                                        $sql = "SELECT SUM(cquantity*ccost) FROM purchasecounter;";
                                                        $res = mysqli_query($dbcon, $sql);
                                                        $count = mysqli_num_rows($res);
                                                        if ($count > 0) {
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                $change = $cash - $row['SUM(cquantity*ccost)'];
                                                                echo "" . $change;
                                                        ?>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            </a>
                                        </li>

                                        <li>
                                            <div class="top-cat-list__title">
                                                <form id="submitform" action="admin-makehistory.php">

                                                    <input style="display: none;" type="text" name="order-total-submit" value="<?php error_reporting(0);
                                                                                                                                $sql = " SELECT SUM(cquantity*ccost) FROM purchasecounter;";
                                                                                                                                $res = mysqli_query($dbcon, $sql);
                                                                                                                                $count = mysqli_num_rows($res);
                                                                                                                                if ($count > 0) {
                                                                                                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                                                                                                        echo "" . $row['SUM(cquantity*ccost)'];
                                                                                                                                ?>
                                                    <?php
                                                                                                                                    }
                                                                                                                                }
                                                    ?>">
                                                    <input style="display: none;" type="text" name="name-submit" value="<?php error_reporting(0);
                                                                                                                        $sql = " SELECT productname, cquantity FROM purchasecounter";
                                                                                                                        $res = mysqli_query($dbcon, $sql);
                                                                                                                        $count = mysqli_num_rows($res);
                                                                                                                        if ($count > 0) {
                                                                                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                                                                                if ($row['cquantity'] != 0) {
                                                                                                                                    echo "(" . $row['productname'] . ": " . $row['cquantity'] . ")";
                                                                                                                                }
                                                                                                                        ?>
                                                    <?php
                                                                                                                            }
                                                                                                                        }
                                                    ?>">

                                                    <input style="display: none;" type="text" name="quantity-submit" value="<?php error_reporting(0);
                                                                                                                            $sql = " SELECT SUM(cquantity) FROM purchasecounter";
                                                                                                                            $res = mysqli_query($dbcon, $sql);
                                                                                                                            $count = mysqli_num_rows($res);
                                                                                                                            if ($count > 0) {
                                                                                                                                while ($row = mysqli_fetch_assoc($res)) {
                                                                                                                                    $quantity =  $row['SUM(cquantity)'];
                                                                                                                                    echo " " . $quantity;

                                                                                                                            ?>
                                                    <?php
                                                                                                                                }
                                                                                                                            }
                                                    ?>">

                                                    <input style="display: none;" type="number" name="cash-submit" value="<?php error_reporting(0); echo $cash; ?>">

                                                    <input style="display: none;" type="number" name="change-submit" placeholder="change" value="<?php error_reporting(0); echo "".$change;?>">

                                                    <br>

                                                    <input style="display: none;" type="text" name="capital-submit" value="<?php error_reporting(0);
                                                                                                                $sql = " SELECT SUM(cquantity*ccapital) FROM purchasecounter";
                                                                                                                $res = mysqli_query($dbcon, $sql);
                                                                                                                $count = mysqli_num_rows($res);
                                                                                                                if ($count > 0) {
                                                                                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                                                                                        echo " " . $row['SUM(cquantity*ccapital)'];
                                                                                                                ?>
                                                    <?php
                                                                                                                    }
                                                                                                                }
                                                    ?>">

                                                    <input style="display: none;" type="text" name="cost-submit" value="<?php error_reporting(0);
                                                                                                                        $sql = " SELECT SUM(cquantity*ccost) FROM purchasecounter";
                                                                                                                        $res = mysqli_query($dbcon, $sql);
                                                                                                                        $count = mysqli_num_rows($res);
                                                                                                                        if ($count > 0) {
                                                                                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                                                                                echo " " . $row['SUM(cquantity*ccost)'];
                                                                                                                        ?>
                                                    <?php
                                                                                                                            }
                                                                                                                        }
                                                    ?>">
                                                    
                                                    <input style="" type="number" name="walkinorderID" value="<?php error_reporting(0); echo rand(1000, 9999); ?>">

                                                    <input id="confirm-order" type="submit" value="Confirm Order"></input>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>


                            </article>
                        </div>
                    </div>
                </div>
            </main>



            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2021 © Elegant Dashboard - <a href="elegant-dashboard.com" target="_blank" rel="noopener noreferrer">elegant-dashboard.com</a></p>
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