
<?php 
require("main.php");
require("db-connection.php");
$videogameList = getMainListOfGames();

function renderUserList($nameGame,$descriptionGame,$gameId){
    if (isset($_SESSION["id"]))
        $userId = $_SESSION["id"];
    else
        $userId = 0;
    echo(
    '<div class="game">
    <div class="coverimg-container">
        <span class="imgholder"></span>
    </div>
    <div class="details">
        <span class="title">'. $nameGame        .'</span>
        <span class="desc"> '. $descriptionGame .'</span>
    </div>
    <button class="altbtn" onclick="addToList('.$gameId.','.$userId.')">
    add to list</button> 
    </div>'
    );  
}

?>

<span>
    <?php 
        foreach($videogameList as $vg){
			renderUserList($vg["name"],$vg["description"],$vg["videogame_id"]);
       }
    ?>
</span> 


