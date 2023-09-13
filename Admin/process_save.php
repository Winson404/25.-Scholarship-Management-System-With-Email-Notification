<?php 
	include '../config.php';
	include('../phpqrcode/qrlib.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/PHPMailer/src/Exception.php';
	require '../vendor/PHPMailer/src/PHPMailer.php';
	require '../vendor/PHPMailer/src/SMTP.php';
	date_default_timezone_set('Asia/Manila');


	// SAVE ADMIN - ADMIN_MGMT.PHP
	if(isset($_POST['create_admin'])) {
		$user_type		  = mysqli_real_escape_string($conn, $_POST['user_type']);
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$dob              = mysqli_real_escape_string($conn, $_POST['dob']);
		$age              = mysqli_real_escape_string($conn, $_POST['age']);
		$birthplace       = mysqli_real_escape_string($conn, $_POST['birthplace']);
		$gender           = mysqli_real_escape_string($conn, $_POST['gender']);
		$civilstatus      = mysqli_real_escape_string($conn, $_POST['civilstatus']);
		$occupation       = mysqli_real_escape_string($conn, $_POST['occupation']);
		$religion		  = mysqli_real_escape_string($conn, $_POST['religion']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);
		$contact		  = mysqli_real_escape_string($conn, $_POST['contact']);
		$house_no         = mysqli_real_escape_string($conn, $_POST['house_no']);
		$street_name      = mysqli_real_escape_string($conn, $_POST['street_name']);
		$purok            = mysqli_real_escape_string($conn, $_POST['purok']);
		$zone             = mysqli_real_escape_string($conn, $_POST['zone']);
		$barangay         = mysqli_real_escape_string($conn, $_POST['barangay']);
		$municipality     = mysqli_real_escape_string($conn, $_POST['municipality']);
		$province         = mysqli_real_escape_string($conn, $_POST['province']);
		$region           = mysqli_real_escape_string($conn, $_POST['region']);
		// $password         = md5($_POST['password']);
		$password         = $_POST['password'];
		$file             = basename($_FILES["fileToUpload"]["name"]);
		$date_registered  = date('Y-m-d');


		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
		      $_SESSION['message'] = "Email already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: admin_mgmt.php?page=create");
		} else {

			// Check if image file is a actual image or fake image
		    $target_dir = "../images-users/";
		    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		    $uploadOk = 1;
		    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check == false) {
			    $_SESSION['message']  = "File is not an image.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
		    	$uploadOk = 0;
		    } 

			// Check file size // 500KB max size
			elseif ($_FILES["fileToUpload"]["size"] > 500000) {
			  	$_SESSION['message']  = "File must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
		    	$uploadOk = 0;
			}

		    // Allow certain file formats
		    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
			    $uploadOk = 0;
		    }

		    // Check if $uploadOk is set to 0 by an error
		    elseif ($uploadOk == 0) {
			    $_SESSION['message'] = "Your file was not uploaded.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");

		    // if everything is ok, try to upload file
		    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        		$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, dob, age, email, contact, birthplace, gender, civilstatus, occupation, religion, house_no, street_name, purok, zone, barangay, municipality, province, region, image, password, user_type, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$age', '$email', '$contact', '$birthplace', '$gender', '$civilstatus', '$occupation', '$religion', '$house_no', '$street_name', '$purok', '$zone', '$barangay', '$municipality', '$province', '$region', '$file', '$password', '$user_type', '$date_registered')");

              	  if($save) {
		          	$_SESSION['message'] = "Record has been saved!";
		            $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
					header("Location: admin_mgmt.php?page=create");
		          } else {
		            $_SESSION['message'] = "Something went wrong while saving the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: admin_mgmt.php?page=create");
		          }
	       			
	        } else {
	        	$_SESSION['message'] = "There was an error uploading your profile picture.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: admin_mgmt.php?page=create");
	        }
		  }
		}
	}




	// SAVE USERS - USERS_MGMT.PHP
	if(isset($_POST['create_user'])) {
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
		$CORfile               = rand(1000,100000)."-".$_FILES['CORfile']['name'];		
		$studentStatus 	       = mysqli_real_escape_string($conn, $_POST['studentStatus']);
		$course                = mysqli_real_escape_string($conn, $_POST['course']);
		$yearLevel 	           = mysqli_real_escape_string($conn, $_POST['yearLevel']);
		$disability            = mysqli_real_escape_string($conn, $_POST['indigenousPeople']);
		$indigenousPeople      = mysqli_real_escape_string($conn, $_POST['indigenousPeople']);
		$password              = mysqli_real_escape_string($conn, $_POST['password']);
		$parentName            = mysqli_real_escape_string($conn, $_POST['parentName']);
		$parentContact         = mysqli_real_escape_string($conn, $_POST['parentContact']);
		$file                  = basename($_FILES["fileToUpload"]["name"]);
		$date_registered       = date('Y-m-d');


		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
		      $_SESSION['message'] = "Email already exists!";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: users_mgmt.php?page=create");
		} else {

			// Check if image file is a actual image or fake image
		    $target_dir = "../images-users/";
		    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		    $uploadOk = 1;
		    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check == false) {
			    $_SESSION['message']  = "File is not an image.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: users_mgmt.php?page=create");
		    	$uploadOk = 0;
		    } 

			// Check file size // 500KB max size
			elseif ($_FILES["fileToUpload"]["size"] > 500000) {
			  	$_SESSION['message']  = "File must be up to 500KB in size.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: users_mgmt.php?page=create");
		    	$uploadOk = 0;
			}

		    // Allow certain file formats
		    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: users_mgmt.php?page=create");
			    $uploadOk = 0;
		    }

		    // Check if $uploadOk is set to 0 by an error
		    elseif ($uploadOk == 0) {
			    $_SESSION['message'] = "Your file was not uploaded.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: users_mgmt.php?page=create");

		    // if everything is ok, try to upload file
		    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        	 $file_loc  = $_FILES['CORfile']['tmp_name'];
			     $file_size = $_FILES['CORfile']['size'];
			     $file_type = $_FILES['CORfile']['type'];
			     $folder    = "../attached-files/";    
			     /* new file size in KB */
			     $new_size = $file_size/1024;  
			     /* new file size in KB */	    
			     /* make file name in lower case */
			     $new_file_name = strtolower($CORfile);
			     /* make file name in lower case */    
			     $final_file=str_replace(' ','-',$new_file_name);
	        	 if ($file_size == 0) {
	        	 	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, dob, age, birthplace, gender, civilstatus, occupation, religion, email, contact, house_no, street_name, purok, zone, barangay, municipality, province, region, HigherEducationStatus, SubsidyType, otherSubsidyType, studentStatus, course, yearLevel, disability, indigenousPeople, password, parentName, parentContact, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$age', '$birthplace', '$gender', '$civilstatus', '$occupation', '$religion', '$email', '$contact', '$house_no', '$street_name', '$purok', '$zone', '$barangay', '$municipality', '$province', '$region', '$HigherEducationStatus', '$SubsidyType', '$otherSubsidyType', '$studentStatus', '$course', '$yearLevel', '$disability', '$indigenousPeople', '$password', '$parentName', '$parentContact', '$file', '$date_registered')");

              	    if($save) {
		            	$_SESSION['message'] = "Registration successful!";
		                $_SESSION['text'] = "Saved successfully!";
			            $_SESSION['status'] = "success";
					    header("Location: users_mgmt.php?page=create");
		            } else {
		              $_SESSION['message'] = "Something went wrong while saving the information.";
		              $_SESSION['text'] = "Please try again.";
			          $_SESSION['status'] = "error";
					  header("Location: users_mgmt.php?page=create");
		            }
	        	 } else {

	        	 	 

		        	 if(move_uploaded_file($file_loc,$folder.$final_file)) {
					 	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, dob, age, birthplace, gender, civilstatus, occupation, religion, email, contact, house_no, street_name, purok, zone, barangay, municipality, province, region, HigherEducationStatus, SubsidyType, otherSubsidyType, CORfile, studentStatus, course, yearLevel, disability, indigenousPeople, password, parentName, parentContact, image, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$age', '$birthplace', '$gender', '$civilstatus', '$occupation', '$religion', '$email', '$contact', '$house_no', '$street_name', '$purok', '$zone', '$barangay', '$municipality', '$province', '$region', '$HigherEducationStatus', '$SubsidyType', '$otherSubsidyType', '$final_file', '$studentStatus', '$course', '$yearLevel', '$disability', '$indigenousPeople', '$password', '$parentName', '$parentContact', '$file', '$date_registered')");

	              	    if($save) {
			            	$_SESSION['message'] = "Registration successful!";
			                $_SESSION['text'] = "Saved successfully!";
				            $_SESSION['status'] = "success";
							header("Location: users_mgmt.php?page=create");
			            } else {
			              $_SESSION['message'] = "Something went wrong while saving the information.";
			              $_SESSION['text'] = "Please try again.";
				          $_SESSION['status'] = "error";
						  header("Location: users_mgmt.php?page=create");
			            }

					 } else {
					  	$_SESSION['message'] = "Something went wrong while uploading the COR file.";
				        $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: users_mgmt.php?page=create");
					 }

				 }

	        } else {
	        	$_SESSION['message'] = "There was an error uploading your profile picture.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: users_mgmt.php?page=create");
	        }
		  }
		}
	}





	// SAVE CUSTOMIZATION - CUSTOMIZATION_ADD.PHP
	if(isset($_POST['create_customization'])) {
		$file            = basename($_FILES["fileToUpload"]["name"]);
		$date_registered = date('Y-m-d');

		$count = mysqli_query($conn, "SELECT COUNT(customID) AS countID FROM customization");
		$row = mysqli_fetch_array($count);
		if($row['countID'] == 6) {
			$_SESSION['message'] = "Maximum number of customization have been reached.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: customize.php");
		} else {
			$exist = mysqli_query($conn, "SELECT * FROM customization WHERE picture='$file'");
			if(mysqli_num_rows($exist) > 0) {
				$_SESSION['message'] = "Image already exists in the database.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
				header("Location: customize.php");
			} else {
				// Check if image file is a actual image or fake image
			    $sign_target_dir = "../images-customization/";
			    $sign_target_file = $sign_target_dir . basename($_FILES["fileToUpload"]["name"]);
			    $sign_uploadOk = 1;
			    $sign_imageFileType = strtolower(pathinfo($sign_target_file,PATHINFO_EXTENSION));

			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check == false) {
				    $_SESSION['message']  = "File is not an image.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: customize.php");
			    	$uploadOk = 0;
			    } 

				// Check file size // 500KB max size
				elseif ($_FILES["fileToUpload"]["size"] > 500000) {
				  	$_SESSION['message']  = "File must be up to 500KB in size.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: customize.php");
			    	$uploadOk = 0;
				}

			    // Allow certain file formats
			    elseif($sign_imageFileType != "jpg" && $sign_imageFileType != "png" && $sign_imageFileType != "jpeg" && $sign_imageFileType != "gif" ) {
				    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: customize.php");
				    $sign_uploadOk = 0;
			    }

			    // Check if $sign_uploadOk is set to 0 by an error
			    elseif ($sign_uploadOk == 0) {
				    $_SESSION['message'] = "Your file was not uploaded.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
					header("Location: customize.php");

			    // if everything is ok, try to upload file
			    } else {

		    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $sign_target_file)) {
						  $save = mysqli_query($conn, "INSERT INTO customization (picture, date_added) VALUES ('$file', '$date_registered')");
					      if($save) {
					      	$_SESSION['message'] = "Image has been saved.";
					        $_SESSION['text'] = "Saved successfully!";
					        $_SESSION['status'] = "success";
							header("Location: customize.php");
					      } else {
					        $_SESSION['message'] = "Something went wrong while saving the information.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
							header("Location: customize.php");
					      }  
		    		} else {
						$_SESSION['message'] = "There was an error uploading your digital signature.";
		            	$_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
						header("Location: customize.php");
		    		}
			    }
			}
		}	
		
	}




	// CREATE/SAVE ACTIVITIY - ACTIVITY_ADD.PHP
	if(isset($_POST['create_activity'])) {

		$activity       = mysqli_real_escape_string($conn, $_POST['activity']);
		$actDate        = mysqli_real_escape_string($conn, $_POST['actDate']);
		$date_acquired  = date('Y-m-d');
		$save = mysqli_query($conn, "INSERT INTO announcement (actName, actDate, date_added) VALUES ('$activity', '$actDate', '$date_acquired')");

		  if($save) {
		  	$_SESSION['message'] = "New announcement has been added.";
		    $_SESSION['text'] = "Saved successfully!";
		    $_SESSION['status'] = "success";
			header("Location: announcement.php");
		  } else {
		    $_SESSION['message'] = "Something went wrong while saving the information.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: announcement.php");
		  }
	}





	// SAVE ACADEMIC YEAR - ACADEMIC_MGMT.PHP
	if(isset($_POST['create_academic_year'])) {
		$year1    = mysqli_real_escape_string($conn, $_POST['year1']);
		$year2    = mysqli_real_escape_string($conn, $_POST['year2']);
		$semester = mysqli_real_escape_string($conn, $_POST['semester']);

		$acad     = $year1.'-'.$year2;
		$date_created  = date('Y-m-d');

		$fetch = mysqli_query($conn, "SELECT * FROM academic_year WHERE year='$acad' AND semester='$semester'");
		if(mysqli_num_rows($fetch) > 0) {
			$_SESSION['message'] = "Academic Year with semester, ".$semester." already exists.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: academic_mgmt.php?page=create");
		} else {
			$save = mysqli_query($conn, "INSERT INTO academic_year (year, semester, date_created) VALUES ('$acad', '$semester', '$date_created')");

          	  if($save) {
	          	$_SESSION['message'] = "Record has been saved!";
	            $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
				header("Location: academic_mgmt.php?page=create");
	          } else {
	            $_SESSION['message'] = "Something went wrong while saving the information.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: academic_mgmt.php?page=create");
	          }
		}
	}





	// CONTACT EMAIL MESSAGING - CONTACT-US.PHP
	if(isset($_POST['sendEmail'])) {

		$name    = mysqli_real_escape_string($conn, $_POST['name']);
		$email	 = mysqli_real_escape_string($conn, $_POST['email']);
		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
		$msg     = mysqli_real_escape_string($conn, $_POST['message']);

	    $message = '<h3>'.$subject.'</h3>
					<p>
						Good day!<br>
						'.$msg.'
					</p>
					<p>
						Name of Sender: '.$name.'<br>
						Email: '.$email.'
					</p>
					<p><b>Note:</b> This is a system generated email please do not reply.</p>';
					//Load composer's autoloader

			    $mail = new PHPMailer(true);                            
			    try {
			        //Server settings
			        $mail->isSMTP();                                     
			        $mail->Host = 'smtp.gmail.com';                      
			        $mail->SMTPAuth = true;                             
			        $mail->Username = 'goodsamaritan2k20@gmail.com';     
	        		$mail->Password = 'duxkxivrezeuguqe';                
			        $mail->SMTPOptions = array(
			            'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			            )
			        );                         
			        $mail->SMTPSecure = 'ssl';                           
			        $mail->Port = 465;                                   

			        //Send Email
			        $mail->setFrom('goodsamaritan2k20@gmail.com');
			        
			        //Recipients
			        $mail->addAddress('sonerwin12@gmail.com');              
			        $mail->addReplyTo('sonesrwin12@gmail.com');
			        
			        //Content
			        $mail->isHTML(true);                                  
			        $mail->Subject = $subject;
			        $mail->Body    = $message;

			        $mail->send();
					$_SESSION['success'] = "Email sent successfully!";
					header("Location: contact-us.php");

			    } catch (Exception $e) {
			    	$_SESSION['success'] = "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
					header("Location: contact-us.php");
			    }
    }
	

?>



