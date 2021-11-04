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
        
        $connection = OpenCon();
        $username   = $_POST["username"];  
        $password   = $_POST["password"];  
        $email      = $_POST["email"];  

        
        $sql = "select MAX(user_id) from user";
        $result =  $connection->query($sql);
        $row = $result->fetch_assoc();
        echo $row["id"];

        $sql = "INSERT INTO user (email, passwordd, username)
        VALUES ('$username', '$password', '$email')";
        if ($connection->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    ?>
</body>
</html>