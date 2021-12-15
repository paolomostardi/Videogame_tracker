<?php
/*
this script logs the user out when they click the 'logout' button
*/


require("main.php");
$pagename = basename(__FILE__, '.php');

//unset all user session variables (logout the user)
unset($_SESSION["loggedin"]);
unset($_SESSION["id"]);
unset($_SESSION["username"]);
unset($_SESSION["img"]);
header("location: game-list.php");
?>