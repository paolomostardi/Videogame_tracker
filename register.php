<?php
require("php/main.php");
$pagename = basename(__FILE__, '.php');
?>

<html>
<head>
	<?php htmlHead(); ?>
	<link rel="stylesheet" href="css/<?php echo $pagename ?>.css">
</head>

<body>
	
	<?php htmlHeader($pagename); ?>
	<div id="content">
		<section id="main-section">
			<div id="register-form-container">
				<div id="title-container">
					<span id="title">register an account</span>
				</div>
				<form id="register-form">
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
					<div id="submit-container">
						<button id="submit">register</button>
					</div>
				</form>
			</div>
		</section>
	</div>
	
</body>
</html>