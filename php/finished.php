<?php
require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');


// add user to database
$connection = OpenCon();
$username   = $_POST["username"];  
$password   = $_POST["password"];  
$email      = $_POST["email"];  
$sql 		= "INSERT INTO user (email, password, username) VALUES ('$email', '$password', '$username')";
$result 	= $connection->query($sql);

createVideoGameList($connection->insert_id);
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
			<div id="register-form-container" class="account-form-container">
				<div id="title-container">
					<span id="title">account created</span>
				</div>
				<div class = "main-text-container">
					<div class="input-container" id="username-container">
						<span>username:</span>	
						<?php echo $_POST["username"]; ?>
					</div>
					<div class="input-container" id="confirm-password-container">
						<span>email:</span>
						<?php echo $_POST["email"]; ?>
					</div>

			</div>
		</section>
	</div>
</body>
</html>