# Videogame_tracker

## game list
This section displays a list of all the available games within the database. The user can add games to their list by clicking the 'add to list' button (while logged in).

```javascript
function addToList(idGame,idUser){
if (idUser == 0){
    alert("please login first");
    return;
}
$.ajax({
url: '../php/db-connection.php',
type: 'post',
data: { "idGame": idGame,
        "idUser": idUser,
        "call"  : 2
      },
success: function(response) { console.log(response); }
});

alert("game added successfully ")

}
```

hello
