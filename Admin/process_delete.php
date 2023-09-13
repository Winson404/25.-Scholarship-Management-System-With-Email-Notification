<?php 
	include '../config.php';

	function msg_success($page) {
		$_SESSION['message'] = "Record has been deleted!";
        $_SESSION['text']    = "Deleted successfully!";
        $_SESSION['status']  = "success";
		header("Location: $page");
		exit();
	}


	function msg_failed($page) {
	    $_SESSION['message'] = "Something went wrong while deleting the record";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
		header("Location: $page");
		exit();
	}

	


	// DELETE ADMIN - ADMIN_DELETE.PHP
	if(isset($_POST['delete_admin'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
			msg_success("admin.php");
		} else {
			msg_failed("admin.php");
        }
	}
	
	


	// DELETE USER - USERS_DELETE.PHP
	if(isset($_POST['delete_user'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
			msg_success("users.php");
		} else {
			msg_failed("users.php");
        }
	}
	
	

	// DELETE CUSTOMIZATION - CUSTOMIZE_UPDATE_DELETE.PHP
	if(isset($_POST['delete_customization'])) {
		$customID = $_POST['customID'];

		$delete = mysqli_query($conn, "DELETE FROM customization WHERE customID='$customID'");
		if($delete) {
			msg_success("customize.php");
		} else {
			msg_failed("customize.php");
        }
	}
	
	

	// DELETE ACTIVITY - ACTIVITY_UPDATE_DELETE.PHP
	if(isset($_POST['delete_activity'])) {
		$actId = $_POST['actId'];

		$delete = mysqli_query($conn, "DELETE FROM announcement WHERE actId='$actId'");
		if($delete) {
			msg_success("announcement.php");
		} else {
			msg_failed("announcement.php");
        }
	}



	// DELETE ACADEMIC YEAR - ACADEMIC_DELETE.PHP
	if(isset($_POST['delete_academic_year'])) {
		$acad_Id = $_POST['acad_Id'];

		$delete = mysqli_query($conn, "DELETE FROM academic_year WHERE acad_Id='$acad_Id'");
		if($delete) {
			msg_success("academic.php");
		} else {
			msg_failed("academic.php");
        }
	}



?>




