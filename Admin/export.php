<?php

include("../config.php");
include("XLSXLibrary.php");

if(isset($_GET['export'])) {

  $export = $_GET['export'];


  if($export == 'grantee') {



      $resident = [
        ['No.', 'Full name', 'Date of birth', 'Age', 'Email', 'Contact number', 'Birthplace', 'Gender', 'Civil status', 'Occupation', 'Religion', 'Address', 'Higher Education Status', 'Subsidy Type', 'Specified Subsidy type', 'Student status', 'Course - Year Level', 'Disability', 'Indigenous people', 'Parents name', 'Parents contact', 'Account status', 'Date registered']
      ];

      $id = 0;
      $sql = "SELECT * FROM users WHERE user_type='User' ORDER BY lastname";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0) {
        foreach ($res as $row) {
          $id++;
          $name = $row['lastname']. ' ' .$row['suffix']. ', ' .$row['firstname']. ' ' .$row['middlename'];
          $courseLevel = $row['course']. ' ' .$row['yearLevel'];
          $user_status = '';
          if($row['user_status'] == 0) { $user_status = 'Pending'; } else { $user_status = 'Verified'; }
          $address = $row['house_no']. ' ' .$row['street_name']. ', ' .$row['purok']. ' ' .$row['zone']. ' ' .$row['barangay']. ', ' .$row['municipality']. ', ' .$row['province']. ' ' .$row['region'];
          $resident = array_merge($resident, array(array($id, $name, date("F d, Y", strtotime($row['dob'])), $row['age'], $row['email'], '+63 '.$row['contact'], $row['birthplace'], $row['gender'], $row['civilstatus'], $row['occupation'], $row['religion'], $address, $row['HigherEducationStatus'], $row['SubsidyType'], $row['otherSubsidyType'], $row['studentStatus'], $courseLevel, $row['disability'], $row['indigenousPeople'], $row['parentName'], '+63 '.$row['parentContact'], $user_status, date("F d, Y", strtotime($row['date_registered'])))));
        }
      } else {
        $_SESSION['message'] = "No record found in the database.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
        header("Location: users.php");
      }

      $xlsx = SimpleXLSXGen::fromArray($resident);
      $xlsx->downloadAs('Student records.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('resident.xlsx'); // This will save the file to your server

      echo "<pre>";

      print_r($resident);

      header('Location: users.php');






  } elseif($export == 'admin') {





      $resident = [
        ['No.', 'Full name', 'Date of birth', 'Age', 'Email', 'Contact number', 'Birthplace', 'Gender', 'Civil status', 'Occupation', 'Religion', 'Address', 'Date registered']
      ];

      $id = 0;
      $sql = "SELECT * FROM users WHERE user_type != 'User' ORDER BY lastname";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0) {
        foreach ($res as $row) {
          $id++;
          $name = $row['lastname']. ' ' .$row['suffix']. ', ' .$row['firstname']. ' ' .$row['middlename'];
          $address = $row['house_no']. ' ' .$row['street_name']. ', ' .$row['purok']. ' ' .$row['zone']. ' ' .$row['barangay']. ', ' .$row['municipality']. ', ' .$row['province']. ' ' .$row['region'];
          $resident = array_merge($resident, array(array($id, $name, date("F d, Y", strtotime($row['dob'])), $row['age'], $row['email'], $row['contact'], $row['birthplace'], $row['gender'], $row['civilstatus'], $row['occupation'], $row['religion'], $address, date("F d, Y", strtotime($row['date_registered'])))));
        }
      } else {
        $_SESSION['message'] = "No record found in the database.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
        header("Location: admin.php");
      }

      $xlsx = SimpleXLSXGen::fromArray($resident);
      $xlsx->downloadAs('Administrator records.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('resident.xlsx'); // This will save the file to your server

      echo "<pre>";

      print_r($resident);

      header('Location: admin.php');





  } else {

  }



}


