<?php
require("main.php");
require("db-connection");
$pagename = basename(__FILE__, '.php');
?>

<html>
<head>
	<?php htmlHead($pagename); ?>
	<link rel="stylesheet" href="../css/account-forms.css">
</head>

<?php
	session_start();
	if(isset($_SESSION["loggedin"]) === false)
	{
		header("location: login.php");
		exit;
	}

	$username = $_SESSION["username"];
	$bios 		= get_bios($_SESSION["id"])

?> 

	<body>
		<?php htmlHeader($pagename); ?>
		<div id="content">
			<section id="main-section">
					<div id="username">
						<span id="title"><?php echo $username ?></span>
					</div>
					<button>edit</button>
					<div class="coverimg-container">
						<span class="imgholder"></span>
					</div>
					<div class = "bios">
						<?php echo $username ?>
					</div>
			</section>
		</div>

	</body>
</html>