<?php 
		include '../config.php';

	  use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require '../vendor/PHPMailer/src/Exception.php';
		require '../vendor/PHPMailer/src/PHPMailer.php';
		require '../vendor/PHPMailer/src/SMTP.php';

	// UPDATE ADMIN
	if(isset($_POST['update_admin'])) {

		$user_Id    = $_POST['user_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
		            if($save) {
                	$_SESSION['message'] = "Admin information has been updated!";
			            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
									header("Location: admin.php");
                } else {
                  $_SESSION['message'] = "Something went wrong while updating the information.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                }

		} else {

				  // Check if image file is a actual image or fake image
		          $target_dir = "../images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message']  = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	                      	$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file' WHERE user_Id='$user_Id'");
							            if($save) {
					                	$_SESSION['message'] = "Admin information has been updated!";
								            $_SESSION['text'] = "Updated successfully!";
										        $_SESSION['status'] = "success";
														header("Location: admin.php");
					                } else {
					                  $_SESSION['message'] = "Something went wrong while updating the information.";
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






	// CHANGE ADMIN PASSWORD
	if(isset($_POST['password_admin'])) {

    	$user_Id     = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				// COMPARE BOTH NEW AND CONFIRM PASSWORD
		    		if($password != $cpassword) {
		    				$_SESSION['message']  = "Password does not matched. Please try again";
		            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header("Location: admin.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");

			    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
			            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
									header("Location: admin.php");
                } else {
                  $_SESSION['message'] = "Something went wrong while changing the password.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: admin.php");
                }
		    		}
    	} else {
    				$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: admin.php");
    	}

    }





    // UPDATE TEACHER
		if(isset($_POST['update_user'])) {
		$idnumber	  = $_POST['idnumber'];
		$user_Id    = $_POST['user_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {

					$save = mysqli_query($conn, "UPDATE users SET ID_number='$idnumber', firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
		            if($save) {
			                $_SESSION['message']  = "User information has been updated!";
					            $_SESSION['text'] = "Updated successfully!";
							        $_SESSION['status'] = "success";
											header("Location: users.php");                          
		            } else {
			                $_SESSION['message'] = "Something went wrong while saving the information.";
					            $_SESSION['text'] = "Please try again.";
							        $_SESSION['status'] = "error";
											header("Location: users.php");
		            }

		} else {

				  // Check if image file is a actual image or fake image
		          $target_dir = "../images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message']  = "Your file was not uploaded.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");

                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	                      	$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact', image='$file' WHERE user_Id='$user_Id'");
				           
							            if($save) {
					                	$_SESSION['message'] = "User information has been updated!";
								            $_SESSION['text'] = "Updated successfully!";
										        $_SESSION['status'] = "success";
														header("Location: users.php");
					                } else {
					                  $_SESSION['message'] = "Something went wrong while updating the information.";
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




	// CHANGE TEACHER PASSWORD
	if(isset($_POST['password_user'])) {

    	$user_Id    = $_POST['user_Id'];	
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
    				// COMPARE BOTH NEW AND CONFIRM PASSWORD
		    		if($password != $cpassword) {
		    				$_SESSION['message']  = "Password does not matched. Please try again";
		            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header("Location: users.php");
		    		} else {
			    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");

			    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
			            $_SESSION['text'] = "Updated successfully!";
					        $_SESSION['status'] = "success";
									header("Location: users.php");
                } else {
                  $_SESSION['message'] = "Something went wrong while changing the password.";
			            $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: users.php");
                }
		    		}
    	} else {
    				$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: users.php");
    	}

    }






	// UPDATE ADMIN PROFILE
	if(isset($_POST['update_profile'])) {

		$user_Id    = $_POST['user_Id'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$dob        = $_POST['dob'];
		$age        = $_POST['age'];
		$contact    = $_POST['contact'];
		$email      = $_POST['email'];
		$address    = $_POST['address'];

		$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', dob='$dob', age='$age', address='$address', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
    if($save) {
          $_SESSION['message']  = "Admin information has been updated!";
          $_SESSION['text'] = "Updated successfully!";
	        $_SESSION['status'] = "success";
					header("Location: profile.php");                          
    } else {
          $_SESSION['message'] = "Something went wrong while saving the information.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: profile.php");
    }
	}


	// CHANGE ADMIN PASSWORD
	if(isset($_POST['update_password_admin'])) {

    	$user_Id    = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

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




  // UPDATE ADMIN PROFILE
	if(isset($_POST['update_profile_admin'])) {

		$user_Id    = $_POST['user_Id'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

	  // Check if image file is a actual image or fake image
    $target_dir = "../images-users/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
    $_SESSION['text'] = "Please try again.";
    $_SESSION['status'] = "error";
		header("Location: profile.php");
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    $_SESSION['message']  = "Your file was not uploaded.";
    $_SESSION['text'] = "Please try again.";
    $_SESSION['status'] = "error";
		header("Location: profile.php");

    // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          	$save = mysqli_query($conn, "UPDATE users SET image='$file' WHERE user_Id='$user_Id'");
     
            if($save) {
            	$_SESSION['message'] = "Admin profile has been updated!";
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




	// UPDATE GRADE LEVEL
	if(isset($_POST['update_grade'])) {
		$grade_Id    = $_POST['grade_Id'];
		$grade       = $_POST['grade'];
		$strand      = $_POST['strand'];
		$description = $_POST['description'];
		$update = mysqli_query($conn, "UPDATE grade SET grade='$grade', strand='$strand', description='$description' WHERE grade_Id='$grade_Id'");
		 if($update) {
      	$_SESSION['message'] = "Grade level has been updated!";
        $_SESSION['text'] = "Updated successfully!";
        $_SESSION['status'] = "success";
				header("Location: gradelevel.php");
      } else {
        $_SESSION['message'] = "Something went wrong while updating the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: gradelevel.php");
      }
	}




	// UPDATE SECTION
	if(isset($_POST['update_section'])) {
		$section_Id = $_POST['section_Id'];
		$grade      = $_POST['grade'];
		$section    = $_POST['section'];
		$update = mysqli_query($conn, "UPDATE section SET section_grade_Id='$grade', section='$section' WHERE section_Id='$section_Id'");
		 if($update) {
      	$_SESSION['message'] = "Section has been updated!";
        $_SESSION['text'] = "Updated successfully!";
        $_SESSION['status'] = "success";
				header("Location: sections.php");
      } else {
        $_SESSION['message'] = "Something went wrong while updating the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: sections.php");
      }
	}








	// UPDATE STUDENT
	if(isset($_POST['update_student'])) {
		$student_Id = $_POST['student_Id'];
		$lrn        = $_POST['lrn'];
		$firstname  = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname   = $_POST['lastname'];
		$suffix     = $_POST['suffix'];
		$gender     = $_POST['gender'];
		$grade      = $_POST['grade'];
		$section    = $_POST['section'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		if(empty($file)) {
				$save = mysqli_query($conn, "UPDATE students SET LRN='$lrn', firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', student_grade_Id='$grade', student_section_Id='$section' WHERE student_Id='$student_Id'");
        if($save) {
        	$_SESSION['message'] = "Student information has been successfully updated!";
          $_SESSION['text'] = "Updated successfully!";
	        $_SESSION['status'] = "success";
	        header ('Location: students_update_view.php?student_Id='.$student_Id.'');
        } else {
          $_SESSION['message'] = "Something went wrong while saving the information.";
          $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header ('Location: students_update_view.php?student_Id='.$student_Id.'');

        }

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
			header ('Location: students_update_view.php?student_Id='.$student_Id.'');
	    $uploadOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadOk == 0) {
	    $_SESSION['message'] = "Your file was not uploaded.";
	    $_SESSION['text'] = "Please try again.";
	    $_SESSION['status'] = "error";
			header ('Location: students_update_view.php?student_Id='.$student_Id.'');
	    // if everything is ok, try to upload file
	    } else {
	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        	$save = mysqli_query($conn, "UPDATE students SET LRN='$lrn', firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', gender='$gender', student_grade_Id='$grade', student_section_Id='$section', image='$file' WHERE student_Id='$student_Id'");
	            if($save) {
		          	$_SESSION['message'] = "Student information has been successfully updated!";
		            $_SESSION['text'] = "Updated successfully!";
				        $_SESSION['status'] = "success";
								header ('Location: students_update_view.php?student_Id='.$student_Id.'');
		          } else {
		            $_SESSION['message'] = "Something went wrong while saving the information.";
		            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header ('Location: students_update_view.php?student_Id='.$student_Id.'');
		          }
	        } else {
	              $_SESSION['message'] = "There was an error uploading your file.";
		            $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header ('Location: students_update_view.php?student_Id='.$student_Id.'');
	        }
			 }

		}
}




	// RESTORE STUDENT RECORD
	if(isset($_POST['restore_student'])) {
		$student_Id = $_POST['student_Id'];
		$update = mysqli_query($conn, "UPDATE students SET DELETED='False' WHERE student_Id='$student_Id'");
		 if($update) {
	      	$_SESSION['message'] = "Student information has been restored.";
	        $_SESSION['text'] = "Restored successfully!";
	        $_SESSION['status'] = "success";
			header("Location: students_backup.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while restoring the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: students_backup.php");
	      }
	}



	// RESTORE TEACHER RECORD
	if(isset($_POST['restore_user'])) {
		$user_Id = $_POST['user_Id'];

		$update = mysqli_query($conn, "UPDATE users SET DELETED='False' WHERE user_Id='$user_Id'");
		 if($update) {
	      	$_SESSION['message'] = "Teacher information has been restored!";
	        $_SESSION['text'] = "Restored successfully!";
	        $_SESSION['status'] = "success";
			header("Location: users_backup.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users_backup.php");
	      }
	}




	// UPDATE SUBJECT
	if(isset($_POST['update_subject'])) {
		$subject_Id = $_POST['subject_Id'];
		$grade      = $_POST['grade'];
		$subject    = $_POST['subject'];

		$update = mysqli_query($conn, "UPDATE subject SET subject_grade_Id='$grade', subject='$subject' WHERE subject_Id='$subject_Id'");
		 if($update) {
	      	$_SESSION['message'] = "Subject has been updated!";
	        $_SESSION['text'] = "Updated successfully!";
	        $_SESSION['status'] = "success";
			header("Location: subject.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: subject.php");
	      }
	}



	// UPDATE ASSIGNED TEACHER
	if(isset($_POST['update_assign_teacher'])) {
		$assign_Id      = $_POST['assign_Id'];
		$teacher        = $_POST['teacher'];
		$strand_section = $_POST['strand_section'];
		$subject        = $_POST['subject'];
		$startime       = date('H:i:s', $_POST['startime']);
		$endtime        = $_POST['endtime'];
		$day            = $_POST['day'];

		$save = mysqli_query($conn, "UPDATE assign SET assign_user_Id='$teacher', assign_subject_Id='$subject', assign_section_Id='$strand_section', start_time='$startime', end_time='$endtime', day='$day' WHERE assign_Id='$assign_Id'");
		if($save) {
				$_SESSION['message'] = "Assigning teacher been successfully updated!";
        $_SESSION['text'] = "Updated successfully!";
        $_SESSION['status'] = "success";
				header("Location: assigning.php");
		} else {
				$_SESSION['message'] = "Something went wrong while saving the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: assigning.php");
		}
}

?>




