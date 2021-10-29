<?php
//gets the current working directory
define("ROOT", getcwd().DIRECTORY_SEPARATOR);

function htmlHead() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/header.css">';
}

function htmlHeader() {
	echo '<div id="header">
		<div id="navbar">
		
			<div id="navbtns">
				<div class="navbtn-container">
					<a class="navbtn" id="game-list" href="game-list.php" selected>game list</a>
				</div>
				<div class="navbtn-container">
					<a class="navbtn" id="user-list" href="user-list.php">my list</a>
				</div>
				<div class="navbtn-container">
					<a class="navbtn" id="profile" href="profile.php">my profile</a>
				</div>
			</div>
			
			<div id="altbtns">
				<div class="altbtn-container">
					<a class="altbtn" id="login" href="login.php">login</a>
				</div>
				<div class="altbtn-container">
					<a class="altbtn" id="register" href="register.php">register</a>
				</div>
			</div>
			
		</div>
	</div>';
}
?>