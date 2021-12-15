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
