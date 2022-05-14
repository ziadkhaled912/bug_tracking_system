<?php 
$path = "./../controller/bug_controller.php";

require_once $path;
require_once "./../model/bug.php";
$bug_controller = new BugController;
$bug = new Bug;
$errMsg = "";
if (isset($_POST['summary']) && isset($_POST['priority']) && isset($_POST['describtion'])) {
  if (!empty($_POST['summary']) && !empty($_POST['priority']) && !empty($_POST['describtion'])) {

  $bug->summary=$_POST['summary'];
  $bug->description=$_POST['describtion'];
  $bug->priorty=$_POST['priority'];
  if($bug_controller->addBug($bug)) {
  header("location: index.php");
} else {
  $errorMsg="Unknow Error try again";
}
  } else {
    $errMsg = "Please fill all fields";
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./raise_bug/fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./raise_bug/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="./raise_bug/css/style.css">

    <title>Create issue</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-7">
          <div class="form h-100 contact-wrap p-5">
            <h3 class="text">Create issue</h3>
            <form class="mb-5" action="./add_bug.php" method="post" enctype='multipart/form-data' >
              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="summary" class="col-form-label">Summary *</label>
                  <input type="text" class="form-control" name="summary" id="summary" placeholder="Issue summary">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group mb-3">
                  <label for="priority" class="col-form-label">Priority *</label>
                  <select name="priority" id="priority" class="form-control" placeholder="Issue priority">
                      <option value="low">Low</option>
                      <option value="medium">Medium</option>
                      <option value="high">High</option>
                      <option value="highest">Highest</option>
                  </select>
                </div>
              </div>
            
              <div class="row mb-5">
                <div class="col-md-12 form-group mb-3">
                  <label for="describtion" class="col-form-label">Describtion *</label>
                  <textarea class="form-control" name="describtion" id="describtion" cols="30" rows="4"  placeholder="Write issue describtion"></textarea>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-5 form-group text-center">
                  <input type="submit" value="Create Issue" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                  <?php  
                  if($errMsg == "") {
                  ?>
                  <span class="submitting"></span>
                  <?php } ?>
                </div>
              </div>
            </form>
            <?php
            if($errMsg != "") {
            ?>
            <div id="form-message-warning mt-4" style="color: #B90B0B;"><?php echo $errMsg ?></div> 
            <?php 
            }
            ?>
            <div id="form-message-success">
              Your message was sent, thank you!
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
    
    

    <script src="./raise_bug/js/jquery-3.3.1.min.js"></script>
    <script src="./raise_bug/js/popper.min.js"></script>
    <script src="./raise_bug/js/bootstrap.min.js"></script>
    <script src="./raise_bug/js/jquery.validate.min.js"></script>
    <script src="./raise_bug/js/main.js"></script>

  </body>
</html>