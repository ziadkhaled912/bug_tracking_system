<?php
require_once "../model/UserModel.php";
require_once "../controller/authentication.php";

if (isset($_SESSION['id'])) {
    session_start();
}
$errMsg = '';
$user = new UserModel();
$auth = new AuthController();
// $user_roles = $auth->getUserRole();
// $user->fullName = $user->confirmPassword = $user->password = $user->contactNumber = $user->email = $user->role_id = '';

if (isset($_POST['full_name']) && isset($_POST['password']) && isset($_POST['ConfirmPassword']) && isset($_POST['contact']) && isset($_POST['email'])) {
    if (!empty($_POST['full_name']) && !empty($_POST['password']) && !empty($_POST['ConfirmPassword']) && !empty($_POST['contact']) && !empty($_POST['email'])) {
      $user->fullName = $_POST['full_name'];
      $user->password = $_POST['password'];
      $user->confirmPassword = $_POST['ConfirmPassword'];
      $user->contactNumber = $_POST['contact'];
      $user->email = $_POST['email'];
      $user->role_id = 2;
      if ($auth->register($user)) {
        if ($_SESSION['role'] == 'admin') {
            // header("location:);
        } else if ($_SESSION['role'] == 'user') {
            header("location: ./../../../../../bug_tracking_system/modules/customer/view");
    } else {
      //header("location:");
    }
  }
    } else {
      $errMsg = "Please fill all fields";
    }
    //     $Full_Name_Err = 'FullName is required';
    //     return;
    // } else {
    //     $user->fullName = $_POST['full_name'];
    // }
    // if (empty($_POST['password'])) {
    //     $passwordErr = 'please entre  your password';
    // } else {
    //     $user->password = $_POST['password'];
    // }

    // if (empty($_POST['ConfirmPassword'])) {
    //     $ConfirmPasswordErr = 'please confirm password';
    // } else {
    //     $user->confirmPassword = $_POST['ConfirmPassword'];
    // }

    // if (empty($_POST['contact'])) {
    //     $contactErr = 'contact number is required';
    // } else {
    //     $user->contactNumber = $_POST['contact'];
    // }

    // if (empty($_POST['email'])) {
    //     $emailErr = 'email is required';
    // } else {
    //     $user->email = $_POST['email'];
    //     if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
    //         $emailErr = 'the email address is incorrect';
    //     }
    // }
    // if (empty($_POST['role_id'])) {
    //     $roleErr = 'role is required';
    // } else {
    //     $user->role_id = $_POST['role_id'];
    //     if ($user->role_id == 'user' || $user->role_id == 'admin') {
    //         $user->role_id = $_POST['role_id'];
    //     } else {
    //         $roleErr = 'please entre user or admin words';
    //     }
    // }
}
?> 

<!doctype html>
<html lang="en">
  <head>
  	<title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="./signup-form-19/css/style.css">
  <style>
  .bedo{        
    color: red;
    position: absolute;
    font-family: serif;
    font-size: x-large;
    background-color: blanchedalmond;}</style>
  
  <style>.error{color:#000000 ;}</style>

	</head>
	<body class="img" style="background-image: url(./signup-form-19/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Sign Up page</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap">
		      	<h3 class="text-center mb-4">validated fields</h3>
						<form action="index.php" method="post"  class="signup-form">
		      		<div class="form-group mb-3">
		      			<label class="label" for="name">Full Name</label>
		      			<input type="text" class="form-control" name="full_name"placeholder="John Doe">
                <span class="icon fa fa-user-o"></span>
		      		</div>
            <!-- <div class="form-group mb-3">
                  <label for="role_id" class="label">Role *</label>
                  <select name="role_id" id="role_id" class="form-control" placeholder="entre your role">
                    <?php  
                      // foreach($user_roles as $role) {
                    ?>
                      
                      <?php 
                      // }
                      ?>
                  </select>
            </div> -->
					  <div class="form-group mb-3">
						<label class="label" for="email">email</label>
					  <input id="email" type="email" class="form-control" name="email" placeholder="entre your email">
					</div>
					  <div class="form-group mb-3">
						<label class="label" for="contact number">contact number</label>
					  <input id="contact" type="text" class="form-control" name="contact" placeholder="entre your phone number">
          </div>
	            <div class="form-group mb-3">
	            	<label class="label" for="password">Password</label>
	              <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	              <span class="icon fa fa-lock"></span>
	            </div>
	            <div class="form-group mb-3">
	            	<label class="label" for="password">ConfirmPassword</label>
	              <input id="password-confirm" type="password" class="form-control" name="ConfirmPassword" placeholder="ConfirmPassword">
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	              <span class="icon fa fa-lock"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
	            </div>
              <?php 
            if($errMsg != "") {
            ?>
            <span class="error" style="color: #B90B0B"><?php echo "* " . $errMsg; ?></span>
            <?php 
            }
            ?>
	          </form>
	          <p>I'm already a member! <a href="Login.php">log In</a></p>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="./signup-form-19/js/jquery.min.js"></script>
  <script src="./signup-form-19/js/popper.js"></script>
  <script src="./signup-form-19/js/bootstrap.min.js"></script>
  <script src="./signup-form-19/js/main.js"></script>

	</body>
</html>

