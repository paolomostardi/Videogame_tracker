<?php
require("php/main.php");
?>

<html>
<head>
	<?php htmlHead(); ?>
	<link rel="stylesheet" href="css/game-list.css">
</head>

<body>
	
	<?php htmlHeader(); ?>
	
	<div id="content">
		<section id="main-section">
			
			<div id="search">
				<span>search:</span>
				<input id="search-game-list" type="text" placeholder="game name...">
			</div>
			
			<div id="game-list">
				<div class="game">
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class="details">
						<span class="title">Assassins Creed 2</span>
						<span class="desc">Assassins Creed 2 is all about assassinating people!</span>
					</div>
					<a class="altbtn">add to list</a>
				</div>
				<div class="game">
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class="details">
						<span class="title">Dark Souls</span>
						<span class="desc">Dark Souls is a very difficult game to beat.</span>
					</div>
					<a class="altbtn">add to list</a>
				</div>
				<div class="game">
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class="details">
						<span class="title">Minecraft</span>
						<span class="desc">Minecraft is a sandbox game that players can craft things in!</span>
					</div>
					<a class="altbtn">add to list</a>
				</div>
				<div class="game">
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class="details">
						<span class="title">Counter-Strike</span>
						<span class="desc">Counter-Strike is a tactical first-person shooter.</span>
					</div>
					<a class="altbtn">add to list</a>
				</div>
				<div class="game">
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class="details">
						<span class="title">Far Cry</span>
						<span class="desc">Far Cry is an open world exploration game with a narrative!</span>
					</div>
					<a class="altbtn">add to list</a>
				</div>
			</div>
		</section>
	</div>
	
</body>
</html>