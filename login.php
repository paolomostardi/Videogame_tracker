<?php
require("php/main.php");
$pagename = basename(__FILE__, '.php');
?>

<html>
<head>
	<?php htmlHead($pagename); ?>
	<link rel="stylesheet" href="/css/account-forms.css">
</head>

<body>
	
	<?php htmlHeader($pagename); ?>
	
	<div id="content">
		<section id="main-section">
			<div id="login-form-container" class="account-form-container">
				<div id="title-container">
					<span id="title">login</span>
				</div>
				<form id="login-form" class="account-form">
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
				</form>
				<div id="info-container">
					<span>don't have an account? <a href="register.php">create one here</a>!</span>
				</div>
			</div>
		</section>
	</div>
	
</body>
</html>