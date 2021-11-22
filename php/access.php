

<?php
	session_start();
    require("main.php");
	require("db-connection.php");
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$connection 			= OpenCon();
		$username_inserted 		= trim($_POST["username"]);
		$password_inserted 		= trim($_POST["password"]);
		$sql 					= "SELECT * FROM user WHERE username = ?";
		$stmt 					= $connection->prepare($sql);
		$stmt				   -> bind_param("s", $username_inserted);
		$stmt				   -> execute();
		$result				    = $stmt  -> get_result();
		$row					= $result-> fetch_row();
		$id 					= $row[0];
		$username 				= $row[1];
		$email 					= $row[2];
		$password 				= $row[3];

		if ($password_inserted == $password)
		{
			session_start();
			echo "correct password";
			$_SESSION["loggedin"] 	= true;
			$_SESSION["id"] 		= $id;
			$_SESSION["username"] 	= $username; 
			header("location: profile.php");
		}
        else
		{
			header("location: login.php");
        }

	}
	
?>



