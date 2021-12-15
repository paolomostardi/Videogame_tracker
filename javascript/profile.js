/*
this script will be ran on the user profile page (profile.php).

it can update the user's bio and profile image by calling 'update-profile.php', with valid data. checks
are made to ensure that the user is inputting valid data (such as, an image being too big). these
checks are also done server-side.

it also shows/hides elements, updates the text content of elements, and performs a few other simple
tasks.
*/


$(function() {
	
	//declare some frequently used elements
	let bio = $("#bio");
	let newBio = $("#new-bio")
		
	let editImg = $("#edit-img-container");
	let editBio = $("#edit-bio-container");
	
	let editBtn = $("#edit");
	let submitContainer = $("#submit-container");
	
	
	
	//if the 'edit mode' button is clicked, toggle the 'edit' view on/off depending on the current state
	let editMenuOpen = false;
	editBtn.click(function(e) {
		if (! editMenuOpen) {
			//show edit image
			editImg.removeClass("hidden");
			//show edit bio
			newBio.val(bio.text());
			bio.addClass("hidden");
			editBio.removeClass("hidden");
			//show submit button and status messages
			submitContainer.removeClass("hidden");
			
			editMenuOpen = true;
			//edit button selected
			editBtn[0].setAttribute("selected", true);
		} else {
			//hide edit image
			editImg.addClass("hidden");
			//hide edit bio
			editBio.addClass("hidden");
			bio.removeClass("hidden");
			//hide submit button and status messages
			submitContainer.addClass("hidden");
			
			editMenuOpen = false;
			//edit button unselected
			editBtn[0].removeAttribute("selected");
		}
	});
	
	let imgStatusMsg = $("#edit-img-status-msg");
	let bioStatusMsg = $("#edit-bio-status-msg");
	
	//change the text in the status message boxes
	let msg = function(msg, type) {
		if (type == "img") {
			imgStatusMsg.html(msg);
		} else if (type == "bio") {
			bioStatusMsg.html(msg);
		}
	}
	
	//image
	let validFileCheck = function(fileUploaderElmt, fileTypes, maxSize) {
		// Only allow specified filetypes
		if (! fileTypes.includes(fileUploaderElmt.files[0].type)) {
			let str = fileTypes[0].split("/")[1].toUpperCase();
			for (let i=1; i<fileTypes.length-1; i++)
				str += ", "+fileTypes[i].split("/")[1].toUpperCase();
			if (fileTypes.length > 1)
				str += " or "+fileTypes[fileTypes.length-1].split("/")[1].toUpperCase()+"";
			return [false, "This file is not a "+str+"!"];
		}
		let selFileType = fileUploaderElmt.files[0].type.split("/")[0];
		// If the file is too big, remove it and show a msg
		if (fileUploaderElmt.files[0].size > maxSize) {
			let max = maxSize;
			let i = 0;
			while (Math.round(max).toString().length > 3) {
				max = max/1024;
				i+= 1;
			}
			let unit = "B";
			switch (i) {
				case 1:
					unit = "KB";
					break;
				case 2:
					unit = "MB";
					break;
				case 3:
					unit = "GB";
					break;
				case 4:
					unit = "TB"; // if you can get to this then i would be concerned
					break;
			}
			return [false, "This "+selFileType+" file is too big! It must be less than "+parseFloat(max.toFixed(2))+unit+" in size!"];
		} else {
			return [true, selFileType.charAt(0).toUpperCase()+selFileType.slice(1)+" file is ready!"];
		}
	}
	
	let fileUploadImg = $("#fileupload-img");
	let profileImg = $("#profile-img");
	
	//when 'select image' is clicked
	fileUploadImg.on("change", function(e) {
		//allowed image types
		let validFileTypes = ["image/png", "image/jpeg", "image/gif"];
		//maximum image size
		let maxSize = 3145728; // 3MB
		//check to see if the image is valid with parameters defined above
		let vfc = validFileCheck(this, validFileTypes, maxSize);
		
		if (vfc[0] == false) {
			//file is not valid
			alert(vfc[1]);
			//unset current file
			this.value = "";
			return;
		}
		
		//file is valid
		msg(vfc[1], "img");

		let img = this.files[0];
		//display the profile image as the user selected image
		profileImg.attr("src", URL.createObjectURL(img));
	});
	
	//submit image
	let submitImg = function() {
		return new Promise(function(resolve, reject) {
			let fd = new FormData();
			//add file to data
			let file = fileUploadImg[0].files[0];
			
			//if file not submitted (invalid file)
			if (typeof file == "undefined") {
				reject("Image unchanged");
				return;
			}
			
			fd.append("img", file);
			
			//send file data to 'update-profile.php'
			$.ajax({
				url: '../php/update-profile.php?req=img',
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function(resp) {
					if (! resp[0]) {
						reject(resp[1]);
					} else {
						fileUploadImg[0].value = "";
						resolve("Image saved");
					}
				},
				error: function(e) {
					reject("Image save failed");
				}
			});
		});
	}
	
	
	
	//bio
	
	//submit bio
	let submitBio = function() {
		return new Promise(function(resolve, reject) {
			let newBioText = newBio.val();
			
			//if bio is empty
			if (newBioText == "") {
				reject("Bio is empty");
				return;
			}
			
			//if bio has not changed
			if (newBioText == bio.text()) {
				reject("Bio unchanged");
				return;
			}
			
			//send new bio data to 'update-profile.php'
			$.ajax({
				url: '../php/update-profile.php?req=bio',
				type: 'post',
				data: {"bio": newBioText},
				success: function(resp) {
					if (! resp[0]) {
						reject(resp[1]);
					} else {
						//update bio text
						bio.text(newBioText);
						resolve("Bio saved");
					}
				},
				error: function(e) {
					reject("Bio save failed");
				}
			});
			
		});
	}
	
	let submitBtn = $("#submit-changes");
	
	submitBtn.click(function(e) {
		//submit the image
		submitImg().then(function(success) {
			msg(success, "img");
		}).catch(function(error) {
			msg(error, "img");
		});
		
		//submit the new bio
		submitBio().then(function(success) {
			msg(success, "bio");
		}).catch(function(error) {
			msg(error, "bio");
		});
	});	
	
});