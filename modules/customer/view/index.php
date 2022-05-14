<?php 
$path = "controller/bug_controller.php";
require_once "./../model/bug.php";
require_once "./../controller/bug_controller.php";
$bug_controller = new BugController;
$todo_bugs = $bug_controller->getTodoBugs();
$dev_bugs = $bug_controller->getDevelepmentBugs();
$pending_bugs = $bug_controller->getPendingBugs();
$done_bugs = $bug_controller->getDoneBugs();

// delete bug

if (isset($_POST["delete"])) {
    if (!empty($_POST["bugId"])) {
      if ($bug_controller->deleteBug($_POST["bugId"])) {
        $todo_bugs = $bug_controller->getTodoBugs();
    }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view_bug/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
    <title>View Issues</title>
</head>
<body>
<a href="add_bug.php" class="float">
<i class="fa fa-plus my-float"></i>
</a>
<div class="container bg-light">
        <div class="table-wrap table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr class="p-0">
                        <td class="w350 p-0" scope="col">
                            <small class="  btn btn-primary h-1 px-2">To Do</small>
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col"><small class="text-muted">ASSIGNEE</small>
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col"><small class="text-muted">CREATED DATE</small>
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col"><small class="text-muted">PRIORITY</small></td>
                        <td class="text-center w100 p-0 py-2" scope="col"><small class="text-muted">DELETE</small>
                        </td>
                    </tr>
                </thead>
                <?php
                if(count($todo_bugs) != 0) {
                    foreach($todo_bugs as $bug) {
                ?>
                <tbody>
                    <tr class="border-bottom bg-white">
                        <td class="row">
                            <div class="d-flex align-items-center">
                                <span class="bg-pink mx-2"></span>
                                <span><?php echo $bug['summary'] ?></span>
                            </div>
                        </td>
                        <td class="text-center"><img
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fHByb2ZpbGV8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60"
                                class="rounded-circle" alt=""></td>
                        <td class="text-center"><span class="far fa-calendar-alt text-muted"><?php echo " " . explode(" ",$bug['created_at'])[0] ?></span></td>
                        <td class="text-center"><span class="btn btn-secondary <?php echo $bug['priority'] ?>"><?php echo $bug['priority'] ?></span>
                        </td>
                        
                        <td class="text-center">
                            <form action="index.php" method="POST">
                                <input type="hidden" name="bugId" value="<?php echo $bug["id"] ?>">
                                <button name="delete" type="submit" style="border: none; background: transparent;">
                                <span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                <?php 
                }
                }
            ?>
            </table>
            <table class="table table-borderless">
                <thead>
                    <tr class="p-0">
                        <td class="w350 p-0" scope="col">
                            <small class=" btn btn-primary h-2 px-2">Develepment</small>
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col">
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col">
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col"></td>
                        <td class="text-center w100 p-0 py-2" scope="col"></td>
                    </tr>
                </thead>
                <?php
                if(count($dev_bugs) != 0) {
                    foreach($dev_bugs as $bug) {
                ?>
                <tbody>
                    <tr class="border-bottom bg-white">
                        <td class="row">
                            <div class="d-flex align-items-center">
                                <span class="bg-pink mx-2"></span>
                                <span><?php echo $bug['summary'] ?></span>
                            </div>
                        </td>
                        <td class="text-center"><img
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fHByb2ZpbGV8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60"
                                class="rounded-circle" alt=""></td>
                        <td class="text-center"><span class="far fa-calendar-alt text-muted"><?php echo " " . explode(" ",$bug['created_at'])[0] ?></span></td>
                        <td class="text-center"><span class="btn btn-secondary <?php echo $bug['priority'] ?>"><?php echo $bug['priority'] ?></span>
                        </td>
                        
                        <td class="text-center">
                            <form action="index.php" method="POST">
                                <input type="hidden" name="bugId" value="<?php echo $bug["id"] ?>">
                                <button name="delete" type="submit" style="border: none; background: transparent;">
                                <span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                <?php 
                }
                }
            ?>
            </table>
            <table class="table table-borderless">
                <thead>
                    <tr class="p-0">
                        <td class="w350 p-0" scope="col"> <small class=" btn btn-primary h-3 px-2">Pending</small>
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col">
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col"><small class="text-muted"></small>
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col"><small class="text-muted"></small></td>
                        <td class="text-center w100 p-0 py-2" scope="col"><small class="text-muted"></small>
                        </td>
                    </tr>
                </thead>
                <?php
                if(count($pending_bugs) != 0) {
                    foreach($pending_bugs as $bug) {
                ?>
                <tbody>
                    <tr class="border-bottom bg-white">
                        <td class="row">
                            <div class="d-flex align-items-center">
                                <span class="bg-pink mx-2"></span>
                                <span><?php echo $bug['summary'] ?></span>
                            </div>
                        </td>
                        <td class="text-center"><img
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fHByb2ZpbGV8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60"
                                class="rounded-circle" alt=""></td>
                        <td class="text-center"><span class="far fa-calendar-alt text-muted"><?php echo " " . explode(" ",$bug['created_at'])[0] ?></span></td>
                        <td class="text-center"><span class="btn btn-secondary <?php echo $bug['priority'] ?>"><?php echo $bug['priority'] ?></span>
                        </td>
                        
                        <td class="text-center">
                            <form action="index.php" method="POST">
                                <input type="hidden" name="bugId" value="<?php echo $bug["id"] ?>">
                                <button name="delete" type="submit" style="border: none; background: transparent;">
                                <span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                <?php 
                }
                }
            ?>
            </table>
            <table class="table table-borderless">
                <thead>
                    <tr class="p-0">
                        <td class="w350 p-0" scope="col"> <small class="btn btn-primary h-4 px-2">Done</small>
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col">
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col"><small class="text-muted"></small>
                        </td>
                        <td class="text-center w100 p-0 py-2" scope="col"><small class="text-muted"></small></td>
                        <td class="text-center w100 p-0 py-2" scope="col"><small class="text-muted"></small>
                        </td>
                    </tr>
                </thead>
                <?php
                if(count($pending_bugs) != 0) {
                    foreach($pending_bugs as $bug) {
                ?>
                <tbody>
                    <tr class="border-bottom bg-white">
                        <td class="row">
                            <div class="d-flex align-items-center">
                                <span class="bg-pink mx-2"></span>
                                <span><?php echo $bug['summary'] ?></span>
                            </div>
                        </td>
                        <td class="text-center"><img
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fHByb2ZpbGV8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60"
                                class="rounded-circle" alt=""></td>
                        <td class="text-center"><span class="far fa-calendar-alt text-muted"><?php echo " " . explode(" ",$bug['created_at'])[0] ?></span></td>
                        <td class="text-center"><span class="btn btn-secondary <?php echo $bug['priority'] ?>"><?php echo $bug['priority'] ?></span>
                        </td>
                        
                        <td class="text-center">
                            <form action="index.php" method="POST">
                                <input type="hidden" name="bugId" value="<?php echo $bug["id"] ?>">
                                <button name="delete" type="submit" style="border: none; background: transparent;">
                                <span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                <?php 
                }
                }
            ?>
            </table>
        </div>

    </div>
</body>
</html>