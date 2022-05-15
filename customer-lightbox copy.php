<?php
require('dbc-edited.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="customer-r copy.css">
    <link rel="stylesheet" href="customer-s copy.css">
    <title>Lightbox Form</title>
</head>

<body class="container fluid-box">
    <main class="form fluid-form">

        <p id="heading-1">
            Hideaway Hut
        </p>
        <hr>

        <p id="heading-2">
            Order summary for user ID: <?php echo $_SESSION['userID']; ?>
        </p>
        
            <?php
                  $sql = "Select * from mycart ORDER BY productID;";
                  $res = mysqli_query($dbcon, $sql);
                  $count = mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $productPrice = $row['productPrice'];
                          $productName = $row['productName'];
                          $productQuantity = $row['productQuantity'];
                          ?>
            
            <form action="customer-place-order.php">

            <p id="quantity-box">
                <?php echo $row["productQuantity"]; ?> X
                <input style="display:none;" name="productQuantity" type="number" value="<?php echo $row["productQuantity"]; ?>">
                <input style="display:none;" name="userID" type="text" value="<?php echo $_SESSION['userID']; ?>">
                
                <input style="display:none;" name="orderID" type="number" value="<?php echo rand(1111, 9999); ?>">
            </p>

            <p id="product-name">
                <?php echo $row["productName"]; ?>
                <input style="display:none;" name="productName" type="text" value="<?php echo $row[" productName"]; ?>">
            </p>

            <span id="product-price">
                P
                <?php echo $row["productPrice"]; ?>
                <input style="display:none;" name="productPrice" type="number" value="<?php echo $row[" productPrice"];
                    ?>">
            </span>
            <?php
                    }
                  }
                else
                  {
                    echo "<div class='error'>An error occured.</div>";
                  }
                  ?>
                    
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
                    
                <input style="display:none;" name="productQuantity" type="number" value="<?php echo $quantity; ?>">

            <p id="subtotal">
                Subtotal
                    
                    <?php
                  $sql = "SELECT SUM(productQuantity*productPrice) FROM mycart;";
                  $res = mysqli_query($dbcon, $sql);
                  $count = mysqli_num_rows($res);
                  if($count>0)
                  {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          echo "".$row['SUM(productQuantity*productPrice)'];
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
                    
                <input style="display:none;" name="subTotal" type="number"
                    value="<?php echo $subtotal; ?>">
            </p>


            <p id="delivery-fee">
                Delivery Fee 35.00
                <input style="display:none;" name="deliveryFee" type="number"
                    value="<?php echo "35.00"; $riderNotes = ""; $deliveryFee = "35"?>">
            </p>


            <hr id="hr-2">

            <p id="deliver-to">
                Cash on Delivery Address
            </p>

            <p id="delivery-address">
                <input id="delivery-address-input" type="text" name="deliveryAddress" placeholder="Add Delivery Address" value="<?php echo $row[" deliveryAddress"];?>">
                <input style="display:none;" id="paymentMode" type="text" name="paymentMode" value="Cash on Delivery">
            </p>

            <p id="rider-notes">
                Rider Notes
                <input id="rider-notes-input" type="text" name="riderNotes" placeholder="Add Rider Notes"
                    value="">
            </p>

            <p id="contact-number">
                Contact Number <br>
                <input id="contact-number-input" type="text" name="contactNumber" placeholder="Add Contact Number"
                    value="">
            </p>

            <hr id="hr-4">

            <p id="total">
                Total <span id="total-price">P <?php echo $subtotal + $deliveryFee; ?>
                <input style="display:none;" name="amountPayable" type="number"
                    value="<?php echo $subtotal + $deliveryFee;?>">
                </span> <br>
            </p>

            <input id="place-order-button" type="submit" name="place-order" value="Place Order">
        </form>


    </main>

</body>

</html>