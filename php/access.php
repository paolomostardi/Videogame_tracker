<?php
  require("main.php");
  require("db-connection.php");

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if($_POST["username"] === ''){
			header("location: login.php");
			exit;
		}
		if($_POST["password"] === ''){
			header("location: login.php");
			exit;
		}
		
		$connection 			= OpenCon();
		$username_inserted 		= trim($_POST["username"]);
		$password_inserted 		= trim($_POST["password"]);
		$sql 					= "SELECT * FROM user WHERE username = ?";
		$stmt 					= $connection->prepare($sql);
		$stmt				   -> bind_param("s", $username_inserted);
		$stmt				   -> execute();
		$result				    = $stmt  -> get_result();
		$row					= $result-> fetch_row();
		$_SESSION["ting"] 	    == $row; // what is this
		$id 					= $row[0];
		$username 				= $row[1];
		$email 					= $row[2];
		$password 				= $row[3];

		if ($password_inserted == $password) {
			$_SESSION["loggedin"] 	= true;
			$_SESSION["id"] 		= $id;
			$_SESSION["username"] 	= $username; 
			$_SESSION["page"]		= "";
			header("location: profile.php");
			exit;
      
		} else {
			header("location: login.php");
			exit;
		}

	}
	
?>
