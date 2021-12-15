# Videogame tracker

## Overview
This application allows users to create a list of games which they enjoy. They can create and login to an account, and they can remove/add games from their list.

## Installation 
This program was developed and tested using XAMPP.  
To run it, you will need Apache and MySQL. There are no specific apache/php/mysql configurations required.

## Main features/webpages

### The navigation bar (Navbar)
The Navbar is displayed at the top of every page.  
It contains links to different pages, allowing the user to easily navigate around the website.  
Each of the webpages in this list will be accessible from the Navbar.

### Master/main game list
The game list is a list of all the available games within the database.  
The user can add games to their list by clicking the 'Add to list' button (while logged in). They can view the master game list on the 'Game list' page.

### User list
All the games that the user has added to their list will be added to their user list.  
They can access their list on the 'My list' page.

### Use profile
The user can view their own profile on the 'My profile' page.  
They will be able to see their username, profile picture and bio, as well as change their profile picture and bio too.

### Login page
The user can login to their account (assuming they already have one) at the login page.  
They will be required to enter their username and password to login.

### Register account page
The user can register an account on the website at the register account page.  
They will be required to enter a username, password and email. They will also be asked to confirm their password to ensure they have spelt it correctly.

### Logout
The user can logout of their account on the logout page.  
The page will not display any content to the user, because the user is logged out automatically and it will immediately redirect the user to the Master game list webpage.
