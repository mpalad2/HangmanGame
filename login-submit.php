<?php session_save_path("session"); 
  session_start();?>
<?php
$errors = [];
$userN = $_POST['username'];
$passW = $_POST['password'];
$userlist = file('userdata.txt');

$success = false;
foreach ($userlist as $user) {
  $user_details = explode(',', $user);
  if ($user_details[0] == $userN && $user_details[6] == $passW) {
    $success = true;
    break;
  }
}
if ($success == false) {
  $errors[] = "invalid username or password";
}
if ($_POST['username'] == "") {
  $errors[] = "Please fill username";
}
if ($_POST['password'] == "") {
  $errors[] = "Please fill password";
}

if ($success && empty($errors)): ?>
<?php
$_SESSION['username'] = $userN;
$_SESSION['score1'] = $user_details[1];
$_SESSION['score2'] = $user_details[2];
$_SESSION['score3'] = $user_details[3];
$_SESSION['score4'] = $user_details[4];
$_SESSION['score5'] = $user_details[5];
?>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body class="wrapper"> 
  <div>
 Thanks for logging in! Let's play a game now!</br>
 <a class="btn btn-primary" href="level1.php" role="button">Level 1</a></br>
 <a class="btn btn-primary" href="level2.php" role="button">Level 2</a></br>
 <a class="btn btn-primary" href="level3.php" role="button">Level 3</a></br>
 <a class="btn btn-primary" href="level4.php" role="button">Level 4</a></br>
 <a class="btn btn-primary" href="level5.php" role="button">Level 5</a></br>
 </div></br>

 <div>
   Click here to logout</br>
   <a class="btn btn-primary" href="logout.php" role="button">Log out</a></br>
 </div>
 <?php include "footer.php"; ?></body>
<?php else: ?>
  <head>
<link rel="stylesheet" href="style.css" />
</head>
<body class="wrapper"> 
 
 <div class="errors">
      Please fix the following errors:
        <ul>
<?php foreach ($errors as $error) { ?>
            <li><?= $error ?> </li>
    <?php } ?>
        </ul>
        <a class="btn btn-primary" href="login.php" role="button">Back to Login</a>
      </body>


      <?php include "footer.php"; ?>
<?php endif;
 ?>
