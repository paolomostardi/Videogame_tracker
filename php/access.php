<?php
/*
this script is called when the 'login' button is clicked on the user login page (login.php). it
logs the user into their account if the username and password are correct.
*/


require("main.php");
require("db-connection.php");

//if any form data is missing
if (!isset($_POST["username"]) or !isset($_POST["password"]))
	die();

//if any form data is empty
if (empty($_POST["username"]) or empty($_POST["password"])) {
	header("location: login.php?error=1");
	die();
}

//check to see if the password is correct
$connection = OpenCon();
$stmt = $connection->prepare("SELECT * FROM user WHERE username = ?");
$stmt -> bind_param("s", $_POST["username"]);
$stmt -> execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$hashedPwd = $user["password"];
//if passwords do not match
if (! password_verify($_POST["password"], $hashedPwd)) {
	header("location: login.php?error=2");
	die();
}

$id = $user["user_id"];
$username = $user["username"];
$email = $user["email"];
$imgID = $user["image_id"];

//get user profile image
$stmt = $connection->prepare("select path from profile_images where id = ?");
$stmt->bind_param("i", $imgID);
$stmt->execute();
$result = $stmt->get_result();

$path = $result->fetch_assoc()["path"];
if ($path == "default.png") {
	//default image location
	$path = "/img/".$path;
} else {
	//user uploaded images location
	$path = "/upload/img/".$path;
}

//set the user session variables (log the user in)
$_SESSION["loggedin"] = true;
$_SESSION["id"] = $id;
$_SESSION["username"] = $username; 
$_SESSION["img"] = $path;
header("location: profile.php");
exit;
?>