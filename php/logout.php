<?php
require("main.php");
$pagename = basename(__FILE__, '.php');

unset($_SESSION["loggedin"]);
unset($_SESSION["id"]);
unset($_SESSION["username"]);
header("location: game-list.php");
?>