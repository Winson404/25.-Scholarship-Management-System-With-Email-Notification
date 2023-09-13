<?php 
	include '../config.php';
	include('../phpqrcode/qrlib.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../vendor/PHPMailer/src/Exception.php';
	require '../vendor/PHPMailer/src/PHPMailer.php';
	require '../vendor/PHPMailer/src/SMTP.php';
	date_default_timezone_set('Asia/Manila');



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




    // ATTACH LETTER - REQUESTLETTER_ADD.PHP
	if(isset($_POST['attachletter'])) {   

		$user_Id    = $_POST['user_Id'];
		$date_today = date('Y-m-d h:i:s');
		     
		 $timestamp = date("YmdHis");
		 $file      = $timestamp."-".$_FILES['file']['name'];
	     $file_loc  = $_FILES['file']['tmp_name'];
		 $file_size = $_FILES['file']['size'];
		 $file_type = $_FILES['file']['type'];
		 $folder    = "../attached-files/";
		 
		 /* new file size in KB */
		 $new_size = $file_size/1024;  
		 /* new file size in KB */
		 
		 /* make file name in lower case */
		 $new_file_name = strtolower($file);
		 /* make file name in lower case */
		 
		 $final_file=str_replace(' ','-',$new_file_name);
		 
		 if(move_uploaded_file($file_loc,$folder.$final_file))
		 {
		 	$save = mysqli_query($conn, "INSERT INTO attachedfiles (requestedby, file, fileType, date_added) VALUES('$user_Id', '$final_file', '$file_type', '$date_today')");
			if($save) {
		      	$_SESSION['message'] = "File uploaded successfully.";
		        $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
				header("Location: attachment.php");
		      } else {
		        $_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: attachment.php");
		      }
		 } else {
		  	$_SESSION['message'] = "Something went wrong while uploading the file.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: attachment.php");
		 }
	}
	

?>



