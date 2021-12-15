<?php
/*
this script will be called from javascript (profile.js) that is ran on the user profile page (profile.php).

depending on the GET request, the user can choose to update their bio or the profile picture/image.
*/


require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');

switch ($_GET["req"]) {
	
	//if the user wants to change their bio
	case "bio":
		//no bio was given
		if (! isset($_POST["bio"]))
			die([false, "Server error - try again later"]);
		
		$bio = $_POST["bio"];

		//if empty or null bio
		if (ctype_space($bio) or is_null($bio))
			die([false, "Bio is empty!"]);

		//if mysql call fails
		if (! updateBio($bio, $_SESSION["id"]))
			die([false, "Server error - try again later"]);
		
		exit([true]);
		//break;
	
	
	//if the user wants to change their image
	case "img":
		//no image was given
		if (! isset($_FILES["img"]["name"]))
			die([false, "No image was uploaded!"]);
		
		$img = $_FILES["img"];
		
		$filename = $img['name'];
		$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
		
		$i = "";
		
		//if filename already exists, change ending of file until name is unique
		while (file_exists(ROOT."/upload/img/".$filename)) {
			$filename = pathinfo($filename, PATHINFO_FILENAME).$i.".".$extension;
			if (! is_int($i))
				$i = 0;
			$i++;
		}
		$destination = ROOT."/upload/img/".$filename;
		
		//check if valid image file
		$validFileTypes = ["jpg","jpeg","png"];
		if (! in_array($extension, $validFileTypes))
			die([false, "Invalid file type!"]);
		
		//attempt to add image to db
		if (! updateImg($filename, $_SESSION["id"]))
			die([false, "Server error adding file to database"]);
		
		//attempt to move file to destination
		if (! move_uploaded_file($img['tmp_name'], $destination))
			die([false, "Server error - try again later"]);
		
		//delete old image if its not default.png
		if ($_SESSION["img"] !== "/img/default.png") {
			unlink(ROOT.$_SESSION["img"]);
			removeImg(basename($_SESSION["img"]));
		}
		
		$_SESSION["img"] = "/upload/img/".$filename;
		exit([true]);
		//break;
}
?>