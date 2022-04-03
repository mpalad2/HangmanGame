<?php session_save_path("session"); ?>
<?php session_start(); ?>
<?php session_destroy(); ?>
<head>
<link rel="stylesheet" href="index.css" />
</head>
<body class ="wrapper">
You have successfully logged out!
<?php include "footer.php"; ?>
</body>
