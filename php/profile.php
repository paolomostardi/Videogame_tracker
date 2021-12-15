<?php
/*
this displays the html for the user profile page.
*/


require("main.php");
require("db-connection.php");
$pagename = basename(__FILE__, '.php');

if($_SESSION["loggedin"] == false) {
	header("location: login.php");
	exit;
}

$username = getUsername($_SESSION["id"]);
?>

<html>
<head>
	<?php htmlHead($pagename); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
	<script src="../javascript/profile.js"></script>
</head>

<body>

<?php htmlHeader($pagename); ?>
	<div id="content">
		<section id="main-section">
			<div id="profile-container">
				<div id="profile">
					<button id="edit" class="altbtn">edit mode</button>
					<div id="img-container">
							<span id="img-holder" class="img-holder">
								<img id="profile-img" src="<?php echo "..".$_SESSION["img"]; ?>">
							</span>
							<div id="edit-img-container" class="hidden">
								<input title="New image..." type="file" id="fileupload-img" accept="image/png, image/jpeg" class="hidden">
								<label id="fileupload-img-btn" for="fileupload-img" >Select image</label>
							</div>
					</div>
						
					<div id="username-bio-container">
						<div id="username-container">
							<span id="username"><?php echo $username?></span>
						</div>
						
						<div id="bio-container">
							<span id="bio"><?php echo getBios($_SESSION["id"]) ?></span>
							<div id="edit-bio-container" class="hidden">
								<textarea id='new-bio'></textarea>
							</div>
							<div id="submit-container" class="hidden">
								<span id="edit-img-status-msg" class="status-msg">Image unchanged</span>
								<span id="edit-bio-status-msg" class="status-msg">Bio unchanged</span>
								<button id='submit-changes'>Save all changes</button>
							</submit>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>
</html> 