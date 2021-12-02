<?php
require("main.php");
$pagename = basename(__FILE__, '.php');
?>

<html>
<head>
	<?php htmlHead($pagename); ?>
</head>

<body>
	
	<?php htmlHeader($pagename); ?>
	
	<div id="content">
		<section id="main-section">
			
			<div id="game-list">
				<div class="game">
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class="details">
						<span class="title">Assassins Creed</span>
						<span class="desc">Assassins Creed is all about assassinating people!</span>
					</div>
					<button class="altbtn">add to list</button>	
				</div>
				<div class="game">
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class="details">
						<span class="title">Dark Souls</span>
						<span class="desc">Dark Souls is a very difficult game to beat.</span>
					</div>
					<button class="altbtn">add to list</button>
				</div>
				<div class="game">
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class="details">
						<span class="title">Minecraft</span>
						<span class="desc">Minecraft is a sandbox game that players can craft things in!</span>
					</div>
					<button class="altbtn">add to list</button>
				</div>
				<div class="game">
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class="details">
						<span class="title">Counter-Strike</span>
						<span class="desc">Counter-Strike is a tactical first-person shooter.</span>
					</div>
					<button class="altbtn">add to list</button>
				</div>
				<div class="game">
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class="details">
						<span class="title">Far Cry</span>
						<span class="desc">Far Cry is an open world exploration game with a narrative!</span>
					</div>
					<button class="altbtn">add to list</button>
				</div>
			</div>
			
		</section>
	</div>
	
</body>
</html>