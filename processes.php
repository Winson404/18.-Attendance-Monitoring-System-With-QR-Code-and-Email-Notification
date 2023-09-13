<?php 

	include 'config.php';

// ****************************************************************LOGIN**********************************************************************************
	
	// users LOGIN
	if(isset($_POST['login'])) {
		$email    = $_POST['email'];
		$password = md5($_POST['password']);

		$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		if(mysqli_num_rows($check)===1) {

				$row = mysqli_fetch_array($check);
				$user_type = $row['user_type'];
				if($user_type == 'Admin') {
					$_SESSION['admin_Id'] = $row['user_Id'];
					header("Location: Admin/dashboard.php");
				} else {
					$_SESSION['user_Id'] = $row['user_Id'];
					header("Location: Teacher/profile.php");
				}
		} else {
				$_SESSION['message'] = "Incorrect password.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
				header("Location: login.php");
		}
	}
// ****************************************************************END LOGIN******************************************************************************


// ****************************************************************REGISTRATIONS**************************************************************************

// SAVE USER
	if(isset($_POST['create_user'])) {
		$ID_number			 = $_POST['ID_number'];
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
		if(mysqli_num_rows($check_email) > 0 ) {
						$_SESSION['message']  = "Email is already taken.";
				    $_SESSION['text'] = "Please try again.";
				    $_SESSION['status'] = "error";
						header("Location: register.php");            
		} else {

				  		// Check if image file is a actual image or fake image
		          $target_dir = "images-users/";
		          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		          $uploadOk = 1;
		          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        

                  // Allow certain file formats
                  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
							    $_SESSION['text'] = "Please try again.";
							    $_SESSION['status'] = "error";
									header("Location: register.php");
                  $uploadOk = 0;
                  }

                  // Check if $uploadOk is set to 0 by an error
                  if ($uploadOk == 0) {
                  $_SESSION['message']  = "Your file was not uploaded.";
							    $_SESSION['text'] = "Please try again.";
							    $_SESSION['status'] = "error";
									header("Location: register.php");
                  // if everything is ok, try to upload file
                  } else {

                      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     	
                      	$save = mysqli_query($conn, "INSERT INTO users (ID_number, firstname, middlename, lastname, suffix, gender, dob, age, address, email, contact, password, image, date_registered) VALUES ('$ID_number', '$firstname', '$middlename', '$lastname', '$suffix', '$gender', '$dob', '$age', '$address', '$email', '$contact', '$password', '$file','$date_registered')");

                            if($save) {
	                            $_SESSION['message']  = "User information has been successfully saved!";
													    $_SESSION['text'] = "Please try again.";
													    $_SESSION['status'] = "success";
															header("Location: register.php");                             
                            } else {
                              $_SESSION['message'] = "Something went wrong while saving the information. Please try again.";
													    $_SESSION['text'] = "Please try again.";
													    $_SESSION['status'] = "error";
															header("Location: register.php");
                            }
                      } else {
                            $_SESSION['message'] = "There was an error uploading your file.";
												    $_SESSION['text'] = "Please try again.";
												    $_SESSION['status'] = "error";
														header("Location: register.php");
                      }
				 }
		}

	}
	
// ************************************************************END REGISTRATIONS**************************************************************************

?>