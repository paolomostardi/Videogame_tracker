<?php
function OpenCon()
 {
    $dbhost     = "localhost";
    $dbuser     = "root";
    $dbpass     = "1234";
    $db         = "videogame_tracker";
    $conn       = new mysqli($dbhost, $dbuser, $dbpass,$db) or 
                  die("Connect failed: %s\n". $conn -> error);
    return      $conn;
 }
 
function CloseCon($conn)
 {
    $conn -> close();
 }


 function checkUsername($username_to_check)
 {
    
 }
   
?>
