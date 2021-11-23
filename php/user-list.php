<?php
require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');
session_start();
?>

<html>
<head>
	<?php htmlHead($pagename);
		if ($_SESSION["loggedin"] == FALSE)
			header("location: login.php"); 
	?>
	<script src="../javascript/script.js"></script>

	<script>

	</script>
</head>

<body>
	
	<?php loggedInHtmlHeader($pagename); ?>
	
	<div id="content">

		<section id="main-section">
			<?php getListId($_SESSION["id"]);?>
			<p id = "par">asdasdasd</p>
			<button onclick = read() >hello</button>
		</section>
	</div>
	
</body>
</html>