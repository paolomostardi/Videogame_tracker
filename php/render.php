
<?php 

/*
* this file is used to render the user videogame list 
*/
require("main.php");
require("db-connection.php");
$videogameListId = getListOfGames($_SESSION["id"]);


// render one single element of the list
function renderUserList($nameGame,$descriptionGame,$gameId){
    $userId = $_SESSION["id"];
    echo(
    '<div class="game">
    <div class="coverimg-container">
        <span class="imgholder"></span>
    </div>
    <div class="details">
        <span class="title">'. $nameGame        .'</span>
        <span class="desc"> '. $descriptionGame .'</span>
    </div>
    <button class="altbtn" onclick="remove('.$gameId.','.$userId.')">
    remove</button> 
    </div>'
    );  
}




?>

<span>
    <?php
		
		// check for empty list 
		if (empty($videogameListId)) {
			echo "<div style='text-align:center;'>You have no games in your list!<br>Add some games from <a href='game-list.php'>here</a>.</div>";
		} else {
			foreach($videogameListId as $videogameId){
				$name = getVideogameName($videogameId);
				$descriptionGame = getVideogameDescription($videogameId);
				renderUserList($name,$descriptionGame,$videogameId);
			}
		}
    ?>
</span> 


