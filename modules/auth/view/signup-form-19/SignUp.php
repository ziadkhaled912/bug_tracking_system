<!doctype html>
<html lang="en">
  <head>
  	<title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
  <style>.bedo{        color: red;
    position: absolute;
    font-family: serif;
    font-size: x-large;
    background-color: blanchedalmond;}</style>
  
  <style>.error{color:#000000 ;}</style>

	</head>
	<body class="img" style="background-image: url(images/bg.jpg);">
  
<?php
require_once './../../model/UserModel.php';
require_once './../../controller/authentication.php';

if (isset($_SESSION['id'])) {
    session_start();
}
$errMsg = '';
$user = new UserModel();
$auth = new AuthController();
$Full_Name_Err = $IDErr = $passwordErr = $ConfirmPasswordErr = $contactErr = $emailErr = $roleErr = '';
$user->fullName = $user->confirmPassword = $user->password = $user->contactNumber = $user->email = $user->role = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['full_name'])) {
        $Full_Name_Err = 'FullName is required';
    } else {
        $user->fullName = $_POST['full_name'];
        if (!preg_match("/^[a-zA-Z-']*$/", $user->fullName)) {
            $Full_Name_Err = 'only letter and white spaces allowed';
        }
    }
    if (empty($_POST['password'])) {
        $passwordErr = 'please entre  your password';
    } else {
        $user->password = $_POST['password'];
    }

    if (empty($_POST['ConfirmPassword'])) {
        $ConfirmPasswordErr = 'please confirm password';
    } else {
        $user->confirmPassword = $_POST['ConfirmPassword'];
    }

    if (empty($_POST['contact'])) {
        $contactErr = 'contact number is required';
    } else {
        $user->contactNumber = $_POST['contact'];
    }

    if (empty($_POST['email'])) {
        $emailErr = 'email is required';
    } else {
        $user->email = $_POST['email'];
        if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'the email address is incorrect';
        }
    }
    if (empty($_POST['role'])) {
        $roleErr = 'role is required';
    } else {
        $user->role = $_POST['role'];
        if ($user->role == 'user' || $user->role == 'admin') {
            $user->role = $_POST['role'];
        } else {
            $roleErr = 'please entre user or admin words';
        }
    }
}

if ($auth->register($user)) {
    if ($_SESSION['role'] == 1) {
        if ($_SESSION['role'] == 'admin') {
            //header("location:);
        } else {
            //header("location:);
        }
    }
} else {
    $errMsg = $_SESSION['errMsg'];
}
?> 
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
						<form action="./SignUp.php" method="post"  class="signup-form">
		      		<div class="form-group mb-3">
		      			<label class="label" for="name">Full Name</label>
		      			<input type="text" class="form-control" name="full_name"placeholder="John Doe">
		      		  <span class="error">*<?php echo $Full_Name_Err; ?></span>
                <span class="icon fa fa-user-o"></span>
		      		</div>
					  <div class="form-group mb-3">
						<label class="label" for="role"> role</label>
					  <input id="role" type="text" class="form-control" name="role" placeholder="entre your role">
            <span class="error">*<?php echo $roleErr; ?></span>
            <span class="icon fa fa-lock"></span>
					</div>
					  <div class="form-group mb-3">
						<label class="label" for="email">email</label>
					  <input id="email" type="email" class="form-control" name="email" placeholder="entre your email">
            <span class="error">*<?php echo $emailErr; ?></span>
					</div>
					  <div class="form-group mb-3">
						<label class="label" for="contact number">contact number</label>
					  <input id="contact" type="text" class="form-control" name="contact" placeholder="entre your phone number">
            <span class="error">*<?php echo $contactErr; ?></span>
          </div>
	            <div class="form-group mb-3">
	            	<label class="label" for="password">Password</label>
	              <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                <span class="error">*<?php echo $passwordErr; ?></span>
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	              <span class="icon fa fa-lock"></span>
	            </div>
	            <div class="form-group mb-3">
	            	<label class="label" for="password">ConfirmPassword</label>
	              <input id="password-confirm" type="password" class="form-control" name="ConfirmPassword" placeholder="ConfirmPassword">
                <span class="error">*<?php echo $ConfirmPasswordErr; ?></span>
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	              <span class="icon fa fa-lock"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
	            </div>
	          </form>
	          <p>I'm already a member! <a data-toggle="tab" href="../login-form-20/index.html">log In</a></p>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

