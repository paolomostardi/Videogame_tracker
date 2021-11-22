<?php
require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');

if($_SESSION["loggedin"] == false) {
	header("location: login.php");
	exit;
}
?>

<html>
<head>
	<?php htmlHead($pagename); ?>
</head>

<body>
	
	<?php htmlHeader($pagename); ?>
	
	
	<div id="content">
		<section id="main-section">
			<?php $listID = getListId($_SESSION["id"]); 
			if ($listID === false) {
				echo "no list :(";
			} ?>
		</section>
	</div>
	
</body>
</html>