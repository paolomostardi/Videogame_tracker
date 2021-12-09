
<?php 
require("main.php");
require("db-connection.php");
$videogameListId = getListOfGames($_SESSION["id"]);

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
        foreach($videogameListId as $videogameId){
            $name = getVideogameName($videogameId);
            $descriptionGame = getVideogameDescription($videogameId);
            renderUserList($name,$descriptionGame,$videogameId);

       }
    ?>
</span> 


