<?php
require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');

if($_SESSION["loggedin"] == false) {
	header("location: login.php");
	exit;
}

$username = getUsername($_SESSION["id"]);
?>

<html>
<head>
	<?php htmlHead($pagename); ?>
	<link rel="stylesheet" href="../css/account-forms.css">
</head>

<body>

<?php htmlHeader($pagename); ?>
	<div id="content">
		<section id="main-section">
			<div id="login-form-container" class="account-form-container">
				
				<div id="title-container">
					<span id="title"><?php echo $username?></span>
				</div>

				<button>edit</button>
				<div id="title-container">
					<span class="imgholder">
					<img src  ="https://media-exp1.licdn.com/dms/image/C4E0BAQFaTRiFFRRG9Q/company-logo_200_200/0/1519904079224?e=2159024400&v=beta&t=6_fyK0adSX2DrRMsyUTiudvIXpSmvIOiDZOIrwlBvYE" 
						 style="width:100%;height:100%;">
					</span>
					
				</div>
				<div id="bios">
					bios: <?php echo getBios($_SESSION["id"]) ?>
				</div>
				
		</section>
	</div>
</body>
</html> 