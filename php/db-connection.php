<?php

function OpenCon() {
	$cfg = parse_ini_file(dirname(getcwd())."/database.cfg");
	
	//use values provided in database.cfg to select mysql database. default values are below
	$dbhost = $cfg["hostname"] ?? "localhost";
	$dbuser = $cfg["username"] ?? "root";
	$dbpass = $cfg["password"] ?? "";
	$db     = $cfg["database"] ?? "vgt";
	$conn   = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	return $conn;
}
 
function CloseCon($conn) {
   $conn -> close();
}

function createVideoGameList($userId){
  
  $connection   = OpenCon();
  $description  = "Main list, of the user " . getUsername($userId);
  $name         = "Main-list";
  $sql 		      = "INSERT INTO list (description, list_id, name, user_id)
                   VALUES ('$description', '$userId', '$name','$userId')";
  $connection  ->query($sql);

 }

function getAttributeFromTable($attributeToGet,$tableFrom,$primaryKey) {
	$connection = OpenCon();
	$sql        = "SELECT {$attributeToGet} FROM {$tableFrom} WHERE {$tableFrom}_id = {$primaryKey}";
	$stmt       = $connection->prepare($sql);
	$stmt      -> execute();
	$result	    = $stmt->get_result();
	$row        = $result->fetch_row();
	$val        = is_null($row) ? NULL : $row[0];
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

 function getGames($listId)
 {
  $attribute  = "videogame_id";
  $table      = "videogame_list_connection";
  $connection = OpenCon();
	$sql        = "SELECT {$attribute} FROM {$table} WHERE list_id = {$listId}";
	$stmt       = $connection->prepare($sql);
	$stmt       ->execute();
	$result	    = $stmt->get_result();
  $rows = array();
  while(!is_null($a = $result->fetch_row() )){
    array_push($rows,$a[0]);
  }
	return $rows;
 }

 function getVideogameName($gameId){
  $attribute  = "name";
  $table      = "videogame";
  $result     = getAttributeFromTable($attribute,$table,$gameId);
  return $result;
 }

 function getVideogameDescription($gameId){
  $attribute  = "description";
  $table      = "videogame";
  $result     = getAttributeFromTable($attribute,$table,$gameId);
  return $result;
 }

 function getListOfGames($userId){
  $listId       = getListId($userId);
  $listOfGames  = getGames($listId);
  return $listOfGames;
 }
 
function getMainListOfGames(){
	$connection = OpenCon();
	$sql = "SELECT * FROM videogame";
	$stmt = $connection->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	
	$rows = array();
	while($a = $result->fetch_assoc()) {
		array_push($rows,$a);
	}
	return $rows;
}



 function removeGameFromUserList($listId,$gameId){
  $table      = "videogame_list_connection";
  $connection = OpenCon();
	$sql        = "DELETE FROM {$table}
                 WHERE list_id = {$listId} AND videogame_id = {$gameId}";
	$stmt       = $connection->prepare($sql);
	$stmt       ->execute();
 }

 function addGameToList($listId,$gameId){
  $connection = OpenCon();
  $sql 		= "INSERT INTO videogame_list_connection (videogame_id, list_id)
        		 VALUES ('$gameId', '$listId')";
	$result 	= $connection->query($sql);
 }
 

if (isset($_POST['call'])){
  if (($_POST['call'] == 1)){
    $gameId = intval($_POST['idGame']);
    $userId = intval($_POST['idUser']);
    $listId = getListId($userId);
    removeGameFromUserList($listId,$gameId);
  }

  if (($_POST['call'] == 2)){
    $gameId = intval($_POST['idGame']);
    $userId = intval($_POST['idUser']);
    $listId = getListId($userId);
    addGameToList($listId,$gameId);
  }
}

?>

