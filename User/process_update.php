<?php 
	include '../config.php';



	// UPDATE ADMIN INFO - PROFILE.PHP
	if(isset($_POST['update_profile_info'])) {

	    $user_Id		       = mysqli_real_escape_string($conn, $_POST['user_Id']);
	    $firstname             = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename            = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname              = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix                = mysqli_real_escape_string($conn, $_POST['suffix']);
		$dob                   = mysqli_real_escape_string($conn, $_POST['dob']);
		$age                   = mysqli_real_escape_string($conn, $_POST['age']);
		$birthplace            = mysqli_real_escape_string($conn, $_POST['birthplace']);
		$gender                = mysqli_real_escape_string($conn, $_POST['gender']);
		$civilstatus           = mysqli_real_escape_string($conn, $_POST['civilstatus']);
		$occupation            = mysqli_real_escape_string($conn, $_POST['occupation']);
		$religion		       = mysqli_real_escape_string($conn, $_POST['religion']);
		$email		           = mysqli_real_escape_string($conn, $_POST['email']);
		$contact		       = mysqli_real_escape_string($conn, $_POST['contact']);
		$house_no              = mysqli_real_escape_string($conn, $_POST['house_no']);
		$street_name           = mysqli_real_escape_string($conn, $_POST['street_name']);
		$purok                 = mysqli_real_escape_string($conn, $_POST['purok']);
		$zone                  = mysqli_real_escape_string($conn, $_POST['zone']);
		$barangay              = mysqli_real_escape_string($conn, $_POST['barangay']);
		$municipality          = mysqli_real_escape_string($conn, $_POST['municipality']);
		$province              = mysqli_real_escape_string($conn, $_POST['province']);
		$region                = mysqli_real_escape_string($conn, $_POST['region']);
		$HigherEducationStatus = mysqli_real_escape_string($conn, $_POST['HigherEducationStatus']);
		$SubsidyType           = mysqli_real_escape_string($conn, $_POST['SubsidyType']);
		$otherSubsidyType      = mysqli_real_escape_string($conn, $_POST['otherSubsidyType']);
		$course                = mysqli_real_escape_string($conn, $_POST['course']);
		$yearLevel 	           = mysqli_real_escape_string($conn, $_POST['yearLevel']);
		$disability            = mysqli_real_escape_string($conn, $_POST['indigenousPeople']);
		$indigenousPeople      = mysqli_real_escape_string($conn, $_POST['indigenousPeople']);
		$parentName            = mysqli_real_escape_string($conn, $_POST['parentName']);
		$parentContact         = mysqli_real_escape_string($conn, $_POST['parentContact']);
		
		$check = mysqli_query($conn, "SELECT * FROM users WHERE WHERE email='$email' AND user_Id != '$user_Id'");
		if(mysqli_num_rows($check) > 0) {
		   $_SESSION['message'] = "Email already exists!";
	       $_SESSION['text'] = "Please try again.";
	       $_SESSION['status'] = "error";
		   header("Location: profile.php");
		} else {
			  $update = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', dob='$dob', age='$age', birthplace='$birthplace', gender='$gender', civilstatus='$civilstatus', occupation='$occupation', religion='$religion', email='$email', contact='$contact', house_no='$house_no', street_name='$street_name', purok='$purok', zone='$zone', barangay='$barangay', municipality='$municipality', province='$province', region='$region', HigherEducationStatus='$HigherEducationStatus', SubsidyType='$SubsidyType', otherSubsidyType='$otherSubsidyType', course='$course', yearLevel='$yearLevel', disability='$disability', indigenousPeople='$indigenousPeople', parentName='$parentName', parentContact='$parentContact' WHERE user_Id='$user_Id' ");

          	  if($update) {
	          	$_SESSION['message'] = "Record has been updated!";
	            $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
				header("Location: profile.php");
	          } else {
	            $_SESSION['message'] = "Something went wrong while updating the information.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
	          }
		}
	}



	// CHANGE ADMIN PASSWORD - PROFILE.PHP
	if(isset($_POST['update_password_admin'])) {

    	$user_Id    = $_POST['user_Id'];
    	// $OldPassword = md5($_POST['OldPassword']);
    	// $password    = md5($_POST['password']);
    	// $cpassword   = md5($_POST['cpassword']);
    	$OldPassword = $_POST['OldPassword'];
    	$password    = $_POST['password'];
    	$cpassword   = $_POST['cpassword'];

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password does not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
                } else {
                    $_SESSION['message'] = "Something went wrong while changing the password.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: profile.php");
    	}

    }




  	// UPDATE ADMIN PROFILE - PROFILE.PHP
	if(isset($_POST['update_profile_admin'])) {

		$user_Id    = $_POST['user_Id'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		  // Check if image file is a actual image or fake image
	    $target_dir = "../images-users/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check == false) {
		    $_SESSION['message']  = "Selected file is not an image.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    } 

		// Check file size // 500KB max size
		elseif ($_FILES["fileToUpload"]["size"] > 500000) {
		  	$_SESSION['message']  = "File must be up to 500KB in size.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
		}

	    // Allow certain file formats
	    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		    $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    elseif ($uploadOk == 0) {
		    $_SESSION['message']  = "Your file was not uploaded.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");

	    // if everything is ok, try to upload file
	    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	          	$save = mysqli_query($conn, "UPDATE users SET image='$file' WHERE user_Id='$user_Id'");
	     
	            if($save) {
	            	$_SESSION['message'] = "Profile picture has been updated!";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
	            } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
	            }
	        } else {
	            $_SESSION['message'] = "There was an error uploading your file.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
	        }

		}
	}








?>
