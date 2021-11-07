<?php
	require("main.php");
	require("db-connection.php");
	$pagename = basename(__FILE__, '.php');
?>

<html>
<head>
	<?php htmlHead($pagename); ?>
	<link rel="stylesheet" href="../css/account-forms.css">

</head>
 
<?php
	session_start();





	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$connection 			= OpenCon();
		$username_inserted 		= trim($_POST["username"]);
		$password_inserted 		= trim($_POST["password"]);
		$sql 					= "SELECT * FROM user WHERE username = ?";
		$stmt 					= $connection->prepare($sql);
		$stmt				   -> bind_param("s", $username_inserted);
		$stmt				   -> execute();
		$result					= $stmt   -> get_result();
		$row					= $result -> fetch_row();
		$id 					= $row[0];
		$username 				= $row[1];
		$email 					= $row[2];
		$password 				= $row[3];

		if ($password_inserted == $password)
		{
			session_start();
			$_SESSION["loggedin"] 	= true;
			$_SESSION["id"] 		= $id;
			$_SESSION["username"] 	= $username; 
			header("location: profile.php");
		}
	}
	
?>

<body>


	<?php htmlHeader($pagename); ?>
	<form action="login.php" method="post">
	<div id="content">
		<section id="main-section">
			<div id="login-form-container" class="account-form-container">
				<div id="title-container">
					<span id="title">login</span>
				</div>
				<form id="login-form" class="account-form">
					<div class="input-container" id="username-container">
						<span>Username</span>
						<input id="username" name="username" type="text" placeholder="username...">
					</div> <br>
					<div class="input-container" id="password-container">
						<span>Password</span>
						<input id="password" name="password" type="	" placeholder="password...">
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
    </form>


</body>
</html>