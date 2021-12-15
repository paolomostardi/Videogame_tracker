/*
this script is used on the user list page (user-list.php), and it fetches the user's game list, as
well as allowing the user to remove games from their list.
*/


//fetch the user's game list
function renderList(){
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("game-list").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "../php/render.php?id=1&test=method", true);
        xhttp.send();
}

renderList();

//remove a game from user's game list
function remove(idGame,idUser){

  $.ajax({
    url: '../php/db-connection.php',
    type: 'post',
    data: { "idGame": idGame,
            "idUser": idUser,
            "call"  : 1
          },
    success: function(response) {
		alert("Game removed!");
		location.reload();
	}
  });

}