$(function() {
	
	let statusMsgContainer = $("#status-msg-container");
	
	let bio = $("#bio");
	let newBio = $("#new-bio")
		
	let editImg = $("#edit-img-container");
	let editBio = $("#edit-bio-container");
	
	let editBtn = $("#edit");
	let submitContainer = $("#submit-container");
	
	let editMenuOpen = false;
	
	
	editBtn.click(function(e) {
		if (! editMenuOpen) {
			//image
			editImg.removeClass("hidden");
			//bio
			newBio.val(bio.text());
			bio.addClass("hidden");
			editBio.removeClass("hidden");
			
			submitContainer.removeClass("hidden");
			
			editMenuOpen = true;
			editBtn[0].setAttribute("selected", true);
		} else {
			//image
			editImg.addClass("hidden");
			//bio
			editBio.addClass("hidden");
			bio.removeClass("hidden");
			
			submitContainer.addClass("hidden");
			statusMsgContainer.addClass("hidden");
			
			editMenuOpen = false;
			editBtn[0].removeAttribute("selected");
		}
	});
	
	let imgStatusMsg = $("#edit-img-status-msg");
	let bioStatusMsg = $("#edit-bio-status-msg");
	
	let msg = function(msg, type) {
		if (type == "img") {
			imgStatusMsg.html(msg);
			statusMsgContainer.removeClass("hidden");
			/*let timeout = setTimeout(function() {
				statusMsgContainer.addClass("hidden");
				imgStatusMsg.html("");
			}, 4000); */
		} else if (type == "bio") {
			bioStatusMsg.html(msg);
			statusMsgContainer.removeClass("hidden");
			/*let timeout = setTimeout(function() {
				statusMsgContainer.addClass("hidden");
				bioStatusMsg.html("");
			}, 4000); */
		}
	}
	
	//image
	let validFileCheck = function(fileUploaderElmt, fileTypes, maxSize) {
		// Only allow specified filetypes
		if (! fileTypes.includes(fileUploaderElmt.files[0].type)) {
			let str = ""+fileTypes[0].split("/")[1].toUpperCase()+"";
			for (let i=1; i<fileTypes.length-1; i++) {
				str += ", "+fileTypes[i].split("/")[1].toUpperCase()+"";
			}
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
			switch (i) {
				case 0:
					unit = "B";
					break;
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
	
	fileUploadImg.on("change", function(e) {
		let validFileTypes = ["image/png", "image/jpeg", "image/gif"];
		let maxSize = 3145728; // 3MB
		
		let vfc = validFileCheck(this, validFileTypes, maxSize);
		
		if (vfc[0] == false) {
			alert(vfc[1]);
			this.value = "";
			return;
		} else {
			msg(vfc[1], "img");
		}

		let img = this.files[0];
		profileImg.attr("src", URL.createObjectURL(img));
	});
	
	let submitImg = function() {		
		return new Promise(function(resolve, reject) {
			let fd = new FormData();
			let file = fileUploadImg[0].files[0];
			
			if (typeof file == "undefined") {
				reject("Image unchanged");
				return;
			}
			
			fd.append("img", file);
			
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
	let submitBio = function() {
		return new Promise(function(resolve, reject) {
			let newBioText = newBio.val();
		
			if (newBioText == "") {
				reject("Bio is empty");
				return;
			}
			
			if (newBioText == bio.text()) {
				reject("Bio unchanged");
				return;
			}
			
			$.ajax({
				url: '../php/update-profile.php?req=bio',
				type: 'post',
				data: {"bio": newBioText},
				success: function(resp) {
					if (! resp[0]) {
						reject(resp[1]);
					} else {
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
		/*let i = 0;
		let errs = [];
		
		let callback = function() {
			i++;			
			if (i !== 2)
				return;
			
			if (errs.length == 0) {
				msg("Changes saved!");
				return;
			}
			
			//scuffed
			let errMsg = "";
			if (errs.length > 0) {		
				errs.forEach(function(err, index) {
					if (index == errs.length-1) {
						errMsg = errMsg+err;
						return;
					}
					errMsg = errMsg+err+"<br>";
				});
			}
			
			msg(errMsg);
		}*/
		
		submitImg().then(function(success) {
			msg(success, "img");
		}).catch(function(error) {
			msg(error, "img");
		});
		
		submitBio().then(function(success) {
			msg(success, "bio");
		}).catch(function(error) {
			msg(error, "bio");
		});
	});	
	
});