<?php session_save_path("session"); ?>
<?php session_start(); ?>
<!--
	Project 2 - PHP
	This is a leaderboard page for one of the levels.
	It sorts through the user scores and shows the top 
	five users and their scores of that level.
-->
<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Leaderboard 3</title>
	<link rel="stylesheet" href="leadStyle.css" />
</head>
<body>
	<?php include("header.php") ?>
	<h1 style = "text-align: center">Top 5 Leaderboard</h1>
	<h2 style = "text-align: center">Level 3</h2>
	<?php
		//sets file equal to calling for the users file 
		$file = file('userdata.txt');
		//sets count equal to the the amount of lines (which is the same as the number of users) in the file
		$count = count($file);
		//set topFive equal to the top five of the user list
		
		//sets fullFile equal to all of the users' information within the file
		$fullFile = file_get_contents('userdata.txt');
		//sets the array into separate users per element/index
		$users = explode("\n", $fullFile);
		
		//splits the users from the scores into separate indexes and ranks them from high to low scores
		for ($x=0; $x<count($users)-1; $x++){
			//current user - splits string into pieces - name [0] and score [3]
			$current = explode(",", $users[$x]);
			//runs through the rest of the user list
			for ($y=$x+1; $y<count($users); $y++){
				//next user - used to compare against the current user
				$next = explode(",", $users[$y]);
				//checks if current user's score is less than the next user's score
				//when condition is true - swap user placement
				if ($current[3] < $next[3]){
					//set temp value to hold current user's info
					$temp = $users[$x];
					//swap current index to equal the next user's info
					$users[$x] = $users[$y];
					//set the next index to equal the current user's info
					$users[$y] = $temp;
					//set current value to new user value for later comparisons
					$current = explode(",", $users[$x]);
				}
			}
		}
		?>
		<div>
			<h2 style = "float: left">User</h2>
			<h2 style = "float: right">Score</h2>
		</div>
		<div style ="clear:both;"></div>
		<?php
		$count = 0;
		//prints top five from updated leaderboard scores
		for ($n=0;$n<5;$n++){
			if ($count < count($users) && $users[$n] != "empty" && $users[$n] != ""){
				$oneUser = explode(",", $users[$n]);
		?>
			<div>
				<!--print name-->
				<p style = "float: left"><?php print $oneUser[0]; ?></p>
				<!--print score-->
				<p style = "float: right"><?php print $oneUser[3]; ?></p>
			</div>
			<div style ="clear:both;"></div>
		<?php
			}
			else{
		?>
			<div>
				<!--print name-->
				<p style = "float: left">N/A</p>
				<!--print score-->
				<p style = "float: right">N/A</p>
			</div>
			<div style ="clear:both;"></div>
		<?php
			}
			$count++;
		}
		?>
		<?php include("footer.php") ?>
		
</body>
</html>
