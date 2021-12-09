<?php

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
			<div id="game-list">
			</div>
		</section>
	</div>
</body>

<script src="../javascript/script.js"></script>
