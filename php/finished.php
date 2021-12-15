<?php
require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');

if (!isset($_POST["username"]) or !isset($_POST["password"]) or !isset($_POST["confirm-password"]) or !isset($_POST["email"]))
	die();

if (empty($_POST["username"]) or empty($_POST["password"]) or empty($_POST["confirm-password"]) or empty($_POST["email"])) {
	header("location: register.php?error=1");
	die();
}

if ($_POST["password"] !== $_POST["confirm-password"]) {
	header("location: register.php?error=2");
	die();
}
// add user to database
$hashedPwd = password_hash($_POST["password"], PASSWORD_DEFAULT);  

$connection = OpenCon();
$stmt = $connection->prepare("INSERT INTO user (email, password, username) VALUES (?, ?, ?)");
$stmt -> bind_param("sss", $_POST["email"], $hashedPwd, $_POST["username"]);
$stmt -> execute();
if ($stmt->affected_rows !== 1) {
	header("location: register.php?error=3");
	die();
}

$userID = $connection->insert_id;

createVideoGameList($userID);

$_SESSION["loggedin"] = true;
$_SESSION["id"] = $userID;
$_SESSION["username"] = $_POST["username"]; 
$_SESSION["img"] = "/img/default.png";
header("location: profile.php");
exit;
?>





<!--
<html>
<head>
	<?php //htmlHead($pagename); ?>
	<link rel="stylesheet" href="../css/account-forms.css">
</head>

<body>
	
	<?php //htmlHeader($pagename); ?>
	<div id="content">
		<section id="main-section">
			<div id="register-form-container" class="account-form-container">
				<div id="title-container">
					<span id="title">account created</span>
				</div>
				<div class = "main-text-container">
					<div class="input-container" id="username-container">
						<span>username:</span>	
						<?php //echo $_POST["username"]; ?>
					</div>
					<div class="input-container" id="confirm-password-container">
						<span>email:</span>
						<?php //echo $_POST["email"]; ?>
					</div>

			</div>
		</section>
	</div>
</body>
</html>
-->