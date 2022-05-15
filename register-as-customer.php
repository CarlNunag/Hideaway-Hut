<!doctype html>
<html lang="en">

<head>
    <title>Hideaway Hut | Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Get started by registering a new account</h3>
                                </div>
                            </div>
                            <form action="register.php" class="signin-form">
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control"  name="userName" style="border-color: rgba(0, 97, 247, .5);" pattern="(?=.*[A-z0-9À-ž\s]).{2,}" required>
                                    <label class="form-control-placeholder" style="color: rgb(0, 97, 247);" for="username">Username</label>
                                </div>
                                
                                <div class="form-group">
                                    <input id="password-field" type="text" class="form-control" name="userID" style="border-color: rgba(0, 97, 247, .5);" pattern="(?=.*\d).{4,}" required>
                                    <label class="form-control-placeholder" style="color: rgb(0, 97, 247);" for="password">User ID</label>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="deliveryAddress" style=" border-color: rgba(0, 97, 247, .5);" pattern="(?=.*[A-z0-9À-ž\s]).{8,}" required>
                                    <label class="form-control-placeholder" style="color: rgb(0, 97, 247);" for="deliveryAddress">Delivery Address</label>
                                </div>

                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="contactNumber" style="border-color: rgba(0, 97, 247, .5);" pattern="(?=.*\d).{10,}" required>
                                    <label class="form-control-placeholder" style="color: rgb(0, 97, 247);" for="username">Contact Number</label>
                                    
                                    <input type="text" name="orderID" value="<?php echo rand(1000, 9999);?>" style="display: none;"/>
                                    <input type="text" name="accountStatus" value="To be confirmed by administrator." style="display: none;"/>
                                </div>

                                <div class="form-group">
                                    <input style="color: #ffffff; background: rgba(0, 97, 247, 0.7);" type="submit" class="form-control btn rounded submit px-3" value="Register">
                                </div>

                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0" style="color: rgb(0, 97, 247);">I certify that i am at legal
                                            age.
                                            <input type="checkbox" checked required>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center" >Already have an account?  &nbsp; &nbsp;  <a href="index(1).html" style="color: rgba(0, 97, 247, 0.7);">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>