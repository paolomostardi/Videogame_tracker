<?php
require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');

?>

<html>
<head>
	<?php htmlHead($pagename); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
	<script src="../javascript/renderMainList.js"></script>

</head>

<body>
	
	<?php htmlHeader($pagename); ?>

	</script>
	<div id="content">
		<section id="main-section">
			<div class="section-title-container">
				<span id="section-title">Main game list</span>
			</div>
			<div id="game-list">
			</div>
		</section>
	</div>
</body>
</html>