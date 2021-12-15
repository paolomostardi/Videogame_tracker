<?php
/*
this displays the html for the login page.

it can display an error message if there was an error when
the user attempted to login.
*/


require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');

//display the error message if there was an error
function displayError() {
	if (!isset($_GET["error"]))
		return;
	
	$msg = "";
	switch ($_GET["error"]) {
		case 1:
			$msg = "Missing username or password!";
			break;
		case 2:
			$msg = "Incorrect password!";
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
			<div id="login-form-container" class="account-form-container">
				<div id="title-container">
					<span id="title">login</span>
				</div>
				<form action="access.php" method="post" id="login-form" class="account-form">
					<div class="input-container" id="username-container">
						<span>username:</span>
						<input id="username" name="username" type="text" placeholder="username...">
					</div>
					<div class="input-container" id="password-container">
						<span>password:</span>
						<input id="password" name="password" type="password" placeholder="password...">
					</div>
					<div id="submit-container">
						<button id="submit">login</button>
					</div>
					<?php displayError(); ?>
				</form>
				<div id="info-container">
					<span>don't have an account? <a href="register.php">create one here</a>!</span>
				</div>
			</div>
		</section>
	</div>


</body>
</html>