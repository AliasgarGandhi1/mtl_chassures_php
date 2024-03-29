<?php
  include '../models/Users.php';

  $user = new Users();

  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $_POST['password'] = "";
    if ($user->addUser($_POST, $hashedPassword)) {
      header('Location: login.php');
    }
  }
  // else {
  //   echo "<script>alert('Something went wrong.');</script>";
  // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign up</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/login.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <a href="../index.php"><img src="../Images/icons/mtl_logo2.gif" alt="logo" class="logo"></a>
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Sign Up</h1>
            <form action="sign_up.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="John Wick">
                </div>

                <div class="form-group address">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phoneNo" id="phoneNo" class="form-control" placeholder="+1 (999) 999-9999">
                </div>
                
                <div class="flex-container">
                    <div class="form-group address">
                        <label for="address">Address</label>
                        <input type="textarea" name="address" id="address" class="form-control" placeholder="Apt, Street, Landmark">
                    </div>

                    <div class="form-group address">
                        <label for="postalcode">Postal Code</label>
                        <input type="postal code" name="postalCode" id="postalCode" class="form-control" placeholder="H3G 2G7">
                    </div>
                </div>

                <div class="flex-container">
                    <div class="form-group address">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Montreal">
                    </div>

                    <div class="form-group address">
                        <label for="state">Province/State</label>
                        <input type="text" name="state" id="state" class="form-control" placeholder="Quebec">
                    </div>

                    <div class="form-group address">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country" class="form-control" placeholder="Canada">
                    </div>
                </div>

                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input type="text" name="userName" id="userName" class="form-control" placeholder="JhonWick2023">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com">
                </div>
                
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your passsword">
                </div>
                <div class="form-group mb-4">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Re-Enter your passsword">
                </div>        
                <input name="register" id="register" class="btn btn-block login-btn" type="submit" value="Register">
            </form>
        </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="../Images/bgimages/login.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>