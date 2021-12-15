# Videogame tracker

## Overview
This application allows users to create their own list of games which they enjoy. They can create and edit their profile as well.

## Installation 
This program was developed and tested using XAMPP.  
  
__1.__ Install XAMPP (or equivalent), or (UNTESTED) manually install Apache and MySQL. There are no specific apache/php/mysql configurations required.  
__2.__ Creator a folder in the htdocs folder in XAMPP or Apache installation. Then clone/download the repository and extract the files to a new folder within the htdocs folder.  
__3.__ Start Apache and MySQL (for XAMPP: open the control panel and click start Apache and MySQL).  
__4.__ If using XAMPP or phpMyAdmin, Navigate to _localhost/phpmyadmin_ in a web browser.  
__3.__ Create a new database in MySQL or phpMyAdmin, and for example call it __videogame_tracker__.  
__4.__ Import the __SQL.sql__ file into the new database (phpMyAdmin: click on the 'import' tab within the database you just made, and navigate to __SQL.sql__. Then click _Go_).  
__5.__ Open the file __database.cfg__ and configure the settings correctly (for XAMPP, the default values are already defined here):    
```
[access-info]
hostname = "localhost"
username = "root"
password = ""
#the name of the database you just created
database = "videogame_tracker"
```  
__6.__ Navigate to _localhost/[folder-created-in-htdocs]/index.php_ in a web browser.

## Main features/webpages

### The navigation bar (Navbar)
The Navbar is displayed at the top of every page.  
It contains links to different pages, allowing the user to easily navigate around the website.  
Each of the webpages in this list will be accessible from the Navbar.

### Master/main game list page
The user will be able to view a list of all the available games in the database on the 'Game list' page.  
The user can add games to their own list by clicking the 'Add to list' button (while logged in).

### User game list page
The user will be able to view their game list on the 'My list' page.  
All the games that the user has added (from the main game list) will be added to their game list.  
The user can remove games from their game list by clicking the 'Remove from list' button (while logged in).

### User profile page
The user can view their own profile on the 'Profile' page.  
They will be able to see their username, profile picture and bio, as well as change their profile picture and bio too.

### Login page
The user can login to their account (assuming they already have one) at the 'Login' page.  
They will be required to enter their username and password to login.

### Register account page
The user can register an account on the website at the 'Register' page.  
They will be required to enter a username, password and email. They will also be asked to confirm their password to ensure they have spelt it correctly.

### Logout page
The user can logout of their account on the 'Logout' page.  
The page will not display any content to the user, because the user is logged out automatically and it will immediately redirect the user to the Master game list webpage.
