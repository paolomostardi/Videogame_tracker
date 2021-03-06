<?php


/*
*	db-connection.php
*	author: paolo
*	list of functions in alphabetical order:

*	OpenCon():
	Establish a connection with mysql database.
	Uses the credential secified in database.cfg

*	addGameToList($listId,$gameId):
*	CloseCon($conn)
*	createVideogameList($userId)
*	getAttributeFromTable($attributeToGet,$tableFrom,$primaryKey):
	take as an input an attribute a table and an id, then run a sql query to search for it.
	Returns null in case of not match. 

*	All the following functions use getAttributeFrom table to get the specified attirubute:

*	getBios($userId)
* 	getListId($userId)
*	getUsername($userId)
*	getUserImageId($userId)
*	getVideogameName($gameId)
*	getVideogameDescription($gameId)
*
*	getGames($userId):
	run an sql query to obtain games from a list
*	getListOfGames($userId):
	obtain a list id form the user and the use it to return a list of games.
*	getMainListOfGames()
	obtain the homepage gamelist
* 	
*	updateBio($newBio, $userID)
*	updateImg($imgName, $userID)
*	removeImg($img)
*	removeGameFromUserList($listId,$gameId)
*
*
*
*
*
*
*
*
*
*/

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
  CloseCon($connection);

 }

function getAttributeFromTable($attributeToGet,$tableFrom,$primaryKey) {
	$connection = OpenCon();
	$sql        = "SELECT {$attributeToGet} FROM {$tableFrom} WHERE {$tableFrom}_id = {$primaryKey}";
	$stmt       = $connection->prepare($sql);
	$stmt      -> execute();
	$result	    = $stmt->get_result();
	$row        = $result->fetch_row();
	$val        = is_null($row) ? NULL : $row[0];
	CloseCon($connection);
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
  CloseCon($connection);
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

function updateBio($newBio, $userID) {
	$conn = OpenCon();
	$stmt = $conn->prepare("update user set bios = ? where (user_id = ?)");
	$stmt->bind_param("si", $newBio, $userID);
	$stmt->execute();
	if ($conn->affected_rows !== 1){
		CloseCon($connection);
		return false;
	}
	CloseCon($conn);
	return true;
}

function updateImg($imgName, $userID) {
	$conn = OpenCon();
	$conn->begin_transaction();
	
	$stmt = $conn->prepare("insert into profile_images (path) values (?)");
	$stmt->bind_param("s", $imgName);
	$stmt->execute();
	if ($conn->affected_rows !== 1) {
		$conn->rollback();
		return false;
	}
	$imgID = $stmt->insert_id;
	
	$stmt = $conn->prepare("update user set image_id = ? where (user_id = ?)");
	$stmt->bind_param("ii", $imgID, $userID);
	$stmt->execute();
	if ($conn->affected_rows !== 1) {
		$conn->rollback();
		return false;
	}
	
	$conn->commit();
	CloseCon($conn);
	return true;
}

function removeImg($img) {
	$conn = OpenCon();
	$stmt = $conn->prepare("delete from profile_images where (path = ?)");
	$stmt->bind_param("s", $img);
	$stmt->execute();
	if ($conn->affected_rows !== 1)
		return false;
	
	return true;
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
  CloseCon($connection);
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

