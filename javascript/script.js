


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


function remove(idGame,idUser){

  $.ajax({
    url: '../php/db-connection.php',
    type: 'post',
    data: { "idGame": idGame,
            "idUser": idUser,
            "call"  : 1
          },
    success: function(response) { console.log(response); }
  });

}