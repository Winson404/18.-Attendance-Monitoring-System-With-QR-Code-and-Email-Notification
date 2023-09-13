<?php 
	include '../config.php';

	// SAVE ADMIN
	if(isset($_POST['create_admin'])) {
		$user_type			 = $_POST['usertype'];
		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix          = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$dob             = $_POST['dob'];
		$age             = $_POST['age'];
		$contact         = $_POST['contact'];
		$email           = $_POST['email'];
		$address         = $_POST['address'];
		$password        = md5($_POST['password']);
		$cpassword       = md5($_POST['cpassword']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);
		

		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
      $_SESSION['message'] = "Email is already taken.";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: admin.php");
		} else {

			if($password != $cpassword) {
        $_SESSION['message'] = "Password does not matched.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: admin.php");
			} else {

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
									header("Location: admin.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message'] = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered, user_type) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered', '$user_type')");

                            if($save) {
									          	$_SESSION['message'] = "User information has been successfully saved!";
									            $_SESSION['text'] = "Saved successfully!";
											        $_SESSION['status'] = "success";
															header("Location: admin.php");
									          } else {
									            $_SESSION['message'] = "Something went wrong while saving the information.";
									            $_SESSION['text'] = "Please try again.";
											        $_SESSION['status'] = "error";
															header("Location: admin.php");
									          }
                      } else {
                            $_SESSION['message'] = "There was an error uploading your file.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: admin.php");
                      }
				 }

			}

		}

	}








	// SAVE users
	if(isset($_POST['create_user'])) {
		$idnumber  			 = $_POST['idnumber'];
		$firstname       = $_POST['firstname'];
		$middlename      = $_POST['middlename'];
		$lastname        = $_POST['lastname'];
		$suffix          = $_POST['suffix'];
		$gender          = $_POST['gender'];
		$dob             = $_POST['dob'];
		$age             = $_POST['age'];
		$contact         = $_POST['contact'];
		$email           = $_POST['email'];
		$address         = $_POST['address'];
		$password        = md5($_POST['password']);
		$cpassword       = md5($_POST['cpassword']);
		$date_registered = date('Y-m-d');
		$file            = basename($_FILES["fileToUpload"]["name"]);


		$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check_email)>0) {
      $_SESSION['message'] = "Email is already taken.";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: users.php");
		} else {

			$sql = mysqli_query($conn, "SELECT * FROM users WHERE ID_number='$idnumber'");
			if(mysqli_num_rows($sql)>0) {
	      $_SESSION['message'] = "ID number has already been taken.";
	      $_SESSION['text'] = "Please try again.";
	      $_SESSION['status'] = "error";
				header("Location: users.php");
			} else {

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
									header("Location: users.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message'] = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (ID_number, firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered) VALUES ('$idnumber', '$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered')");

                            if($save) {
									          	$_SESSION['message'] = "User information has been successfully saved!";
									            $_SESSION['text'] = "Saved successfully!";
											        $_SESSION['status'] = "success";
															header("Location: users.php");
									          } else {
									            $_SESSION['message'] = "Something went wrong while saving the information.";
									            $_SESSION['text'] = "Please try again.";
											        $_SESSION['status'] = "error";
															header("Location: users.php");
									          }
                      } else {
                            $_SESSION['message'] = "There was an error uploading your file.";
								            $_SESSION['text'] = "Please try again.";
										        $_SESSION['status'] = "error";
														header("Location: users.php");
                      }
				 }

			}

		}

	}



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

    $fetch = mysqli_query($conn, "SELECT * FROM students WHERE LRN='$LRN'");
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
	        	$save = mysqli_query($conn, "INSERT INTO students (LRN, firstname, middlename, lastname, suffix, gender, student_grade_Id, student_section_Id, image, qr_image, date_registered) VALUES ('$LRN', '$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$grade', '$section', '$file', '$qr_image', '$date_registered')");
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




// SAVE GRADE LEVEL
if(isset($_POST['create_grade'])) {
		$grade 			 = $_POST['grade'];
		$strand 		 = $_POST['strand'];
		$description = $_POST['description'];
		$fetch = mysqli_query($conn, "SELECT * FROM grade WHERE grade='$grade' AND strand='$strand' AND description='$description'");
		if(mysqli_num_rows($fetch) > 0) {
				$_SESSION['message'] = "Grade level already exists.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: gradelevel.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO grade (grade, strand, description) VALUES ('$grade', '$strand', '$description')");
			if($save) {
					$_SESSION['message'] = "Grade level has been successfully saved!";
          $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
					header("Location: gradelevel.php");
			} else {
					$_SESSION['message'] = "Something went wrong while saving the information.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: gradelevel.php");
			}
		}
}


	
	if(isset($_POST['save_section'])) {
			$grade   = $_POST['grade'];
			$section = $_POST['section'];

			$fetch = mysqli_query($conn, "SELECT * FROM section WHERE section_grade_Id='$grade' AND section='$section'");
			if(mysqli_num_rows($fetch) > 0) {
					$_SESSION['message'] = "Section already exists.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: sections.php");
			}	else {
					$save = mysqli_query($conn, "INSERT INTO section (section_grade_Id, section) VALUES ('$grade', '$section')");
					if($save) {
							$_SESSION['message'] = "Section has been successfully saved!";
		          $_SESSION['text'] = "Saved successfully!";
			        $_SESSION['status'] = "success";
							header("Location: sections.php");
					} else {
							$_SESSION['message'] = "Something went wrong while saving the information.";
		          $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
							header("Location: sections.php");
					}
			}
	}



	// SAVE SUBJECT
	if(isset($_POST['save_subject'])) {
		$grade      = $_POST['grade'];
		$subject = $_POST['subject'];
		$fetch = mysqli_query($conn, "SELECT * FROM subject WHERE subject_grade_Id='$grade' AND subject='$subject'");
		if(mysqli_num_rows($fetch) > 0) {
				$_SESSION['message'] = "Subject already exists.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: subject.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO subject (subject_grade_Id, subject) VALUES ('$grade', '$subject')");
			if($save) {
					$_SESSION['message'] = "Subject has been successfully saved!";
          $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
					header("Location: subject.php");
			} else {
					$_SESSION['message'] = "Something went wrong while saving the information.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: subject.php");
			}
		}
}



	// SAVE ASSIGN TEACHER
	if(isset($_POST['save_assign_teacher'])) {
		$teacher        = $_POST['teacher'];
		$strand_section = $_POST['strand_section'];
		$subject        = $_POST['subject'];
		$startime       = $_POST['startime'];
		$endtime        = $_POST['endtime'];
		$day            = $_POST['day'];

		$fetch = mysqli_query($conn, "SELECT * FROM assign WHERE assign_user_Id='$teacher' AND assign_subject_Id='$subject' AND assign_section_Id='$strand_section'");
		if(mysqli_num_rows($fetch) > 0) {
				$_SESSION['message'] = "Teacher has already been assigned with this subject and section.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: assigning.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO assign (assign_user_Id, assign_subject_Id, assign_section_Id, start_time, end_time, day) VALUES ('$teacher', '$subject', '$strand_section', '$startime', '$endtime', '$day')");
			if($save) {
					$_SESSION['message'] = "Assigning teacher been successfully saved!";
          $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
					header("Location: assigning.php");
			} else {
					$_SESSION['message'] = "Something went wrong while saving the information.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: assigning.php");
			}
		}
}



// SAVE ASSIGN TEACHER
	if(isset($_POST['save_student_section'])) {
		$section = $_POST['section'];
		$student = $_POST['student'];

		$fetch = mysqli_query($conn, "SELECT * FROM section_students WHERE section_students_student_Id='$student'");
		if(mysqli_num_rows($fetch) > 0) {
				$_SESSION['message'] = "This student is already added in a section";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: section_students.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO section_students (section_students_section_Id, section_students_student_Id) VALUES ('$section', '$student')");
			if($save) {
					$_SESSION['message'] = "You have successfully added a student in a section";
          $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
					header("Location: section_students.php");
			} else {
					$_SESSION['message'] = "Something went wrong while saving the information.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: section_students.php");
			}
		}
}




if(isset($_POST['lrn'])) {
	$lrn  = $_POST['lrn'];
	$section_Id = $_POST['section_Id'];
	date_default_timezone_set('Asia/Manila');
  // echo date('F j, Y g:i:s A');
	$date = date('Y-m-d');
	$time = date('g:i:s A');


  $start = strtotime('08:00:00');
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


	$fetch = mysqli_query($conn, "SELECT * FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE LRN='$lrn'");
	if(mysqli_num_rows($fetch) > 0) {
		$row = mysqli_fetch_array($fetch);
		$student_Id = $row['student_Id'];
		$section_Id = $row['student_section_Id'];

		$exist = mysqli_query($conn, "SELECT * FROM attendance WHERE attendance_student_Id='$student_Id' AND logdate='$date'");
		if(mysqli_num_rows($exist) > 0) {

				$update = mysqli_query($conn, "UPDATE attendance SET time_out='$time' WHERE attendance_student_Id='$student_Id'");
				if($update) {
					$_SESSION['message'] = ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' ' ;
			    $_SESSION['text'] = "Successfully Timed out.";
			    $_SESSION['status'] = "success";
					header("Location: attendance.php");
				} else {
					$_SESSION['message'] = "Something went wrong while logging out.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
					header("Location: attendance.php");
				}

		} else {

				$save = mysqli_query($conn, "INSERT INTO attendance (attendance_student_Id, attendance_section_Id, time_in, logdate, remarks) VALUES ('$student_Id', '$section_Id', '$time', '$date', '$remarks')");
				if($save) {
					$_SESSION['message'] = ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' ' ;
			    $_SESSION['text'] = "Successfully Timed in.";
			    $_SESSION['status'] = "success";
					header("Location: attendance.php");
				} else {
					$_SESSION['message'] = "Something went wrong while logging in.";
			    $_SESSION['text'] = "Please try again.";
			    $_SESSION['status'] = "error";
					header("Location: attendance.php");
				}
		}

	} else {
		$_SESSION['message'] = "Student not found.";
    $_SESSION['text'] = "Please try again.";
    $_SESSION['status'] = "error";
		header("Location: attendance.php");
	}
}



?>




