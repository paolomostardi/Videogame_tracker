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
    <?php
        
		//to do: move this in a separete file 

        $connection = OpenCon();
        $username   = $_POST["username"];  
        $password   = $_POST["password"];  
        $email      = $_POST["email"];  

        $sql 		= "SELECT MAX(user_id) AS max_id FROM user ";
        $result 	= $connection->query($sql);
        $row 		= $result->fetch_array();
        $id 		= $row["max_id"] + 1;

		$sql 		= "INSERT INTO user (email, passwordd, username,user_id)
        			   VALUES ('$email', '$password', '$username','$id')";
		$result 	= $connection->query($sql);
	?>
</body>


</html>