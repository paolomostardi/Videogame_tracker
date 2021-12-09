<?php
session_start();

$_SESSION["loggedin"] = $_SESSION["loggedin"] ?? false;

//gets the current working directory
define("ROOT", getcwd().DIRECTORY_SEPARATOR);

//adds the head html elements
function htmlHead($pagename) {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>'.$pagename.'</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/'.$pagename.'.css">';
}

//adds the html header, which has the navbar and shit
function htmlHeader($page = "") {
	$n1 = $n2 = $n3 = $a1 = $a2 = "";
	switch ($page) {
		case "game":
			$n1 = "selected";
			break;
		case "user-list":
			$n2 = "selected";
			break;
		case "profile":
			$n3 = "selected";
			break;
		case "login":
			$a1 = "selected";
			break;
		case "register":
			$a2 = "selected";
			break;
	}
	
	echo '<div id="header">
		<div id="navbar">
		
			<div id="navbtns">
				<div class="navbtn-container">
					<a class="navbtn" id="nav-game-list" href="game-list.php" '.$n1.'>game list</a>
				</div>
				<div class="navbtn-container">
					<a class="navbtn" id="nav-user-list" href="user-list.php" '.$n2.'>my list</a>
				</div>
				<div class="navbtn-container">
					<a class="navbtn" id="nav-profile" href="profile.php" '.$n3.'>my profile</a>
				</div>
			</div>';
	
	
	echo '<div id="altbtns">';
	
	if ($_SESSION["loggedin"] == true) {
		echo '<div class="altbtn-container">
			<a class="altbtn" id="nav-logout" href="logout.php">logout</a>
		</div>';
	} else {
		echo '<div class="altbtn-container">
				<a class="altbtn" id="nav-login" href="login.php" '.$a1.'>login</a>
			</div>
			<div class="altbtn-container">
				<a class="altbtn" id="nav-register" href="register.php" '.$a2.'>register</a>
			</div>';
	}
	
	echo '</div></div></div>';
}
?>