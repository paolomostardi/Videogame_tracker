<?php
require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');
session_start();
?>

<html>
<head>
	<?php htmlHead($pagename); ?>
</head>

<body>
	
	<?php loggedInHtmlHeader($pagename); ?>
	
	<div id="content">
		<section id="main-section">
			<?php getListId($_SESSION["id"]);?>
		</section>
	</div>
	
</body>
</html>