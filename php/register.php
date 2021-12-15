<?php
require("main.php");
$pagename = basename(__FILE__, '.php');

function displayError() {
	if (!isset($_GET["error"]))
		return;
	
	$msg = "";
	switch ($_GET["error"]) {
		case 1:
			$msg = "Required fields are missing!";
			break;
		case 2:
			$msg = "Passwords do not match!";
			break;
		case 3:
			$msg = "Server error - try again later.";
			break;
	}
	echo '<div id="error-container"><span id="error">'.$msg.'</span></div>';
	return;
}
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
					<span id="title">create an account</span>
				</div>
				<form id="register-form" class="account-form" action="finished.php" method="post">
					<div class="input-container" id="username-container">
						<span>username:</span>	
						<input id="username" name="username" type="text" placeholder="username...">
					</div>
					<div class="input-container" id="password-container">
						<span>password:</span>
						<input id="password" name="password" type="password" placeholder="password...">
					</div>
					<div class="input-container" id="confirm-password-container">
						<span>confirm password:</span>
						<input id="confirm-password" name="confirm-password" type="password" placeholder="confirm password...">
					</div>
					<div class="input-container" id="confirm-password-container">
						<span>insert email:</span>
						<input id="email" name="email" type="text" placeholder="example@mail.com">
					</div>
					<div id="submit-container">
						<button id="submit">register</button>
					</div>
					<?php displayError(); ?>
				</form>
				<div id="info-container">
					<span>already have an account? <a href="login.php">login here</a></span>
				</div>
			</div>
		</section>
	</div>

</body>
</html>



