<?php
function OpenCon() {
	$cfg = parse_ini_file(dirname(getcwd())."/database.cfg");
	
	//use values provided in database.cfg to select mysql database. default values are below
	$dbhost = $cfg["hostname"] ?? "localhost";
	$dbuser = $cfg["username"] ?? "root";
	$dbpass = $cfg["password"] ?? "";
	$db = $cfg["database"] ?? "videogame_tracker";
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	
	return $conn;
}
 
function CloseCon($conn) {
   $conn -> close();
}

function getAttributeFromTable($attribute,$table,$id) {
	$connection = OpenCon();
	$sql = "SELECT {$attribute} FROM {$table} WHERE {$table}_id = {$id}";
	$stmt = $connection->prepare($sql);
	$stmt->execute();
	$result	= $stmt->get_result();
	$row = $result->fetch_row();
	
	//if found nothing then dont explode
	$val = is_null($row) ? NULL : $row[0];
	return $val;
 }

 function getUsername($userId)
 {
   $attribute  = "username";
   $table      = "user";
   $result     = getAttributeFromTable($attribute,$table,$userId);
   return $result;
 }

 function getBios($userId){
   $attribute  = "bios";
   $table      = "user";
   $result     = getAttributeFromTable($attribute,$table,$userId);
   return $result;
 }

 function getUserImageId($userId){
   $attribute  = "image_id";
   $table      = "user";
   $result     = getAttributeFromTable($attribute,$table,$userId);
   return $result;
 }

 function getListId($userId)
 {
   $attribute  = "list_id";
   $table      = "list";
   $result     = getAttributeFromTable($attribute,$table,$userId);
   return $result;
 }

 function getGames($id)
 {
   
 }


?>