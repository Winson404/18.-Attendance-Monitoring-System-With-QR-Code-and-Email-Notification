<?php 
	include '../config.php';
	include('../phpqrcode/qrlib.php');

	// SAVE STUDENT
	if(isset($_POST['save_student'])) {
		$reference  = $_POST['LRN'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$grade      = $_POST['grade'];
		$section    = $_POST['section'];
		$file       = basename($_FILES["fileToUpload"]["name"]);
		$date_registered = date('Y-m-d');

    $fetch = mysqli_query($conn, "SELECT * FROM students WHERE LRN='$reference'");
    if(mysqli_num_rows($fetch) > 0) {
    		$_SESSION['message'] = "Student already exists.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: students.php");
    } else {
    	
			$fetch_grade = mysqli_query($conn, "SELECT * FROM grade WHERE grade_Id='$grade'");
    	$row_grade = mysqli_fetch_array($fetch_grade);
    	$fetched_grade = $row_grade['grade'];

    	// SAVING QR CODES**********************************************************************
    	$name = $reference;
	    $path = '../images-qr-codes/';
	    $qr_image = $path.uniqid().".png";

	    $ecc = 'L';
	    $pixel_Size = 10;
	    $frame_Size = 10;
	    QRcode::png($name,$qr_image,$ecc,$pixel_Size,$frame_Size);
	    // *************************************************************************************

			// Check if image file is a actual image or fake image
	    $target_dir = "../images-users/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    // Allow certain file formats
	    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	    $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
	    $_SESSION['text'] = "Please try again.";
	    $_SESSION['status'] = "error";
			header("Location: students.php");
	    $uploadOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadOk == 0) {
	    $_SESSION['message'] = "Your file was not uploaded.";
	    $_SESSION['text'] = "Please try again.";
	    $_SESSION['status'] = "error";
			header("Location: students.php");
	    // if everything is ok, try to upload file
	    } else {
	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        	$save = mysqli_query($conn, "INSERT INTO students (LRN, firstname, middlename, lastname, suffix, gender, student_grade_Id, student_section_Id, image, qr_image, date_registered) VALUES ('$reference', '$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$grade', '$section', '$file', '$qr_image', '$date_registered')");
	            if($save) {
		          	$_SESSION['message'] = "Student information has been successfully saved!";
		            $_SESSION['text'] = "Saved successfully!";
				        $_SESSION['status'] = "success";
								header("Location: students.php");
		          } else {
		            $_SESSION['message'] = "Something went wrong while saving the information.";
		            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header("Location: students.php");
		          }
	        } else {
	              $_SESSION['message'] = "There was an error uploading your file.";
		            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header("Location: students.php");
	        }
			 }

		}
}





// ATTENDANCE CHECK BY SECTION(attendance.php)
if(isset($_POST['lrn'])) {
	$lrn        = $_POST['lrn'];
	$sec_Id     = $_POST['section_Id'];
	$assignId   = $_POST['assignId'];
	

	// GET TIME START IN A SECTION
	$get_timeStart = mysqli_query($conn, "SELECT * FROM assign WHERE assign_section_Id='$sec_Id' AND assign_Id='$assignId' ");
	$r_timeStart   = mysqli_fetch_array($get_timeStart);
	$sec_timeStart = $r_timeStart['allowance_time'];
	$absent = $r_timeStart['absent_time'];

	// I FETCHED THIS ASSIGN_SUBJECT_ID TO INCLUDE IN SAVING IN ATTENDANCE
	$subject_Id    = $r_timeStart['assign_subject_Id'];

	date_default_timezone_set('Asia/Manila');
  // echo date('F j, Y g:i:s A');
	$date = date('Y-m-d');
	$time = date('H:i');

  $remarks = "";
  if($time <= $sec_timeStart) {
      $remarks = "Present";
  } elseif($time > $sec_timeStart && $time < $absent ) {
    $remarks = "Late";
  } else {
    $remarks = "Absent";
  }


	$fetch = mysqli_query($conn, "SELECT * FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE LRN='$lrn'");
	if(mysqli_num_rows($fetch) > 0) {
		$row = mysqli_fetch_array($fetch);
		$student_Id = $row['student_Id'];
		$section_Id = $row['student_section_Id'];

		if($sec_Id != $section_Id) {
				$_SESSION['message'] = "This student is not from this section";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
				header('Location: attendance.php?section_Id='.$sec_Id.'&&assignId='.$assignId.'');
		} else {
				$exist = mysqli_query($conn, "SELECT * FROM attendance WHERE attendance_student_Id='$student_Id' AND attendance_subject_Id='$subject_Id' AND logdate='$date'");
				if(mysqli_num_rows($exist) > 0) {
					$_SESSION['message'] = "You already have your attendance with this subject";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
					header('Location: attendance.php?section_Id='.$sec_Id.'&&assignId='.$assignId.'');
				} else {
						// $exist = mysqli_query($conn, "SELECT * FROM attendance WHERE attendance_student_Id='$student_Id' AND logdate='$date'");
				// if(mysqli_num_rows($exist) > 0) {

				// 		$update = mysqli_query($conn, "UPDATE attendance SET time_out='$time' WHERE attendance_student_Id='$student_Id'");
				// 		if($update) {
				// 			$_SESSION['message'] = ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' ' ;
				// 	    $_SESSION['text'] = "Successfully Timed out.";
				// 	    $_SESSION['status'] = "success";
				// 			header('Location: attendance.php?section_Id='.$sec_Id.'&&assignId='.$assignId.'');
				// 		} else {
				// 			$_SESSION['message'] = "Something went wrong while logging out.";
				// 	    $_SESSION['text'] = "Please try again.";
				// 	    $_SESSION['status'] = "error";
				// 			header('Location: attendance.php?section_Id='.$sec_Id.'&&assignId='.$assignId.'');
				// 		}

				// } else {

						$save = mysqli_query($conn, "INSERT INTO attendance (attendance_student_Id, attendance_section_Id, attendance_subject_Id, time_in, logdate, remarks) VALUES ('$student_Id', '$section_Id', '$subject_Id', '$time', '$date', '$remarks')");
						if($save) {
							$_SESSION['message'] = ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' ' ;
					    $_SESSION['text'] = 'Successfully Timed in';
					    $_SESSION['status'] = "success";
							header('Location: attendance.php?section_Id='.$sec_Id.'&&assignId='.$assignId.'');
						} else {
							$_SESSION['message'] = "Something went wrong while logging in.";
					    $_SESSION['text'] = "Please try again.";
					    $_SESSION['status'] = "error";
							header('Location: attendance.php?section_Id='.$sec_Id.'&&assignId='.$assignId.'');
						}
				// }
				}

				
		}

	} else {
		$_SESSION['message'] = "Student not found.";
    $_SESSION['text'] = "Please try again.";
    $_SESSION['status'] = "error";
		header('Location: attendance.php?section_Id='.$sec_Id.'&&assignId='.$assignId.'');
	}
}






// ATTENDANCE CHECK - GENERAL ATTENDANCE(general_scan_qr.php)
if(isset($_POST['navbar_lrn'])) {
	$navbar_lrn  = $_POST['navbar_lrn'];
	
	date_default_timezone_set('Asia/Manila');
  // echo date('F j, Y g:i:s A');
	$date = date('Y-m-d');
	$time = date('g:i:s A');


  $start = strtotime('08:25:00');
  $end = strtotime($time);

  //in hours
  // $hours = intval(($end - $start)/3600);
  // echo $hours.' hours'; 

  //If you want it in minutes, you can divide the difference by 60 instead
  $mins = (int)(($end - $start) / 60);
  // echo $mins.' minutes'.'<br>';

  $remarks = "";
  if($mins == 0 || $mins < 0) {
      $remarks = "Present";
  } elseif($mins > 0) {
    $remarks = "Late";
  } else {
    $remarks = "Absent";
  }


	$fetch = mysqli_query($conn, "SELECT * FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE LRN='$navbar_lrn'");
	if(mysqli_num_rows($fetch) > 0) {
		$row = mysqli_fetch_array($fetch);
		$student_Id = $row['student_Id'];
		$section_Id = $row['student_section_Id'];

		
		// $exist = mysqli_query($conn, "SELECT * FROM attendance WHERE attendance_student_Id='$student_Id' AND logdate='$date'");
		// if(mysqli_num_rows($exist) > 0) {

		// 		$update = mysqli_query($conn, "UPDATE attendance SET time_out='$time' WHERE attendance_student_Id='$student_Id'");
		// 		if($update) {
		// 			$_SESSION['message'] = ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' ' ;
		// 	    $_SESSION['text'] = "Successfully Timed out.";
		// 	    $_SESSION['status'] = "success";
		// 			header('Location: general_scan_qr.php');
		// 		} else {
		// 			$_SESSION['message'] = "Something went wrong while logging out.";
		// 	    $_SESSION['text'] = "Please try again.";
		// 	    $_SESSION['status'] = "error";
		// 			header('Location: general_scan_qr.php');
		// 		}

		// } else {

				$save = mysqli_query($conn, "INSERT INTO attendance (attendance_student_Id, attendance_section_Id, time_in, logdate, remarks) VALUES ('$student_Id', '$section_Id', '$time', '$date', '$remarks')");
				if($save) {
					$_SESSION['message'] = ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' ' ;
			    $_SESSION['text'] = "Successfully Timed in.";
			    $_SESSION['status'] = "success";
					header('Location: general_scan_qr.php');
				} else {
					$_SESSION['message'] = "Something went wrong while logging in.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
					header('Location: general_scan_qr.php');
				}
		// }
		

	} else {
		$_SESSION['message'] = "Student not found.";
    $_SESSION['text'] = "Please try again.";
    $_SESSION['status'] = "error";
		header('Location: general_scan_qr.php');
	}
}


?>




