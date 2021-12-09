# Videogame tracker

## Overview
This application allows users to create a list of games which they enjoy. They can create and login to an account, and they can remove/add games from their list.

### The navigation bar (Navbar)
The Navbar is displayed at the top of every page. It contains the links to all the different pages, allowing the user to easily navigate around the website.
Each of the following pages will be available within the Navbar:

### Master game list
The game list is a list of all the available games within the database. The user can add games to their list by clicking the 'Add to list' button (while logged in). They can view the master game list on the 'Game list' page.

### User list
All the games that the user has added to their list will be added to their user list. They can access their list on the 'My list' page.

### Use profile
The user can view their own profile on the 'My profile' page. They will be able to see their username, profile picture and bio.

### Login page
The user can login to their account (assuming they already have one) at the login page. They will be required to enter their username and password to login.

### Register account page
The user can register an account on the website at the register account page. They will be required to enter a username, password and email. They will also be asked to confirm their password to ensure they have spelt it correctly.

## A more in-depth look at each process in the program

### Master game list

```javascript
function addToList(idGame,idUser){
    if (idUser == 0){
        alert("please login first");
        return;
    }
    
    //when the 'add to list' button is clicked, ajax sends a post request containing data about the selected game.
    //if the server responds, and adds the game to the user's list successfully, then an alert is displayed
    $.ajax({
        url: '../php/db-connection.php',
        type: 'post',
        data: { "idGame": idGame,
                "idUser": idUser,
                "call"  : 2
              },
        success: function(response) { console.log(response); }
    });
    
    alert("game added successfully ");
}
```

