<?php
/*
this display the html for the user's game list.

the user's game list itself is actually fetched by javascript (render.js), and is inserted
into the 'id=game-list' div. the php script that is fetched is another file, 'render.php'.
*/


require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');

if (!isset($_SESSION["id"])) {
	header("location: login.php");
	exit;
}

$listID = getListId($_SESSION["id"]);
if (is_null($listID)) {
	//no list exists
}
?>

<html>
<head>
	<?php htmlHead($pagename); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	
	<?php htmlHeader($pagename); ?>

	</script>
	<div id="content">
		<section id="main-section">
			<div class="section-title-container">
				<span id="section-title">User game list</span>
			</div>
			<div id="game-list">
			</div>
		</section>
	</div>
</body>

<script src="../javascript/script.js"></script>
