<?php 
	include '../config.php';


	// DELETE STUDENTS
	if(isset($_POST['delete_student'])) {
		$student_Id = $_POST['student_Id'];

		$delete = mysqli_query($conn, "UPDATE students SET DELETED='True' WHERE student_Id='$student_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Student information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: students.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: students.php");
	      }
	}


	// MULTIPLE DELETE - STUDENTS
	if(isset($_POST['bulk_delete_submit'])) {
      if(!empty($_POST['checked_id'])) {
        $st_Id = implode(",", $_POST['checked_id']);
        $del = mysqli_query($conn, "DELETE FROM students WHERE student_Id IN ($st_Id)");
        if($del) {
	      	$_SESSION['message'] = "Selected records has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: students.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: students.php");
	      }
      }
    }

?>

