<?php session_save_path("session"); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>rules</title>
    <link rel="stylesheet" href="index.css" />
  </head>
  <body class="wrapper">
    <?php include "header.php"; ?>
    <h1>Rules of the Game</h1>
    <ol>
      <li>There five levels to this Game</li>
      <li>One each level you have to guess the correct word based on the description </li>
      <li>Fill out every box with one letter and click submit</li>
      <li>If the letter is correct, the box will turm green, otherwise it will be cleared and you have to try again</li>
      <li>You can only reach the next level if you find all the correct letters</li>
      <li>You have four trials to find the word</li>
      <li>The more trials you use the lower the score</li>
      <li>You also have one use clue</li>
     </ol>
    <?php include "footer.php"; ?>

  </body>
</html>
