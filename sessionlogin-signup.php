<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Register</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="sessionlogin-style.mn.css">
</head>

<body>
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Get started</h1>
    <p class="sign-up__subtitle">Hideaway Hut products at your reach</p>

    <form class="sign-up-form form" action="register.php">
      <label class="form-label-wrapper">
        <p class="form-label">User ID</p>
        <input class="form-input" name="userID" type="text" placeholder="Enter a new User ID" required>
      </label>

      <label class="form-label-wrapper">
        <p class="form-label">User Name</p>
        <input class="form-input" name="userName" type="text" placeholder="Enter a new Username" required>
      </label>

      <label class="form-label-wrapper">
        <p class="form-label">Delivery Address</p>
        <input class="form-input" name="deliveryAddress" type="text" placeholder="Enter your Delivery Address" required>
      </label>

      <label class="form-label-wrapper">
        <p class="form-label">Contact Number</p>
        <input class="form-input" name="contactNumber" type="text" placeholder="Enter your active Contact Number" required>
        
        <input name="accountStatus" type="text" style="display: none;" value="To be confirmed by administrator.">
        
        <input type="text" name="orderID" value="<?php echo rand(1000, 9999);?>" style="display: none;"/>
      </label>

      <br>

      <button class="form-btn primary-default-btn transparent-btn">Register</button>
    </form>

  </article>
</main>
<!-- Chart library -->
<script src="sessionlogin-chart.min.js"></script>
<!-- Icons library -->
<script src="sessionlogin-feather.min.js"></script>
<!-- Custom scripts -->
<script src="sessionlogin-script.js"></script>
</body>

</html>