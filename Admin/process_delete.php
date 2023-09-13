<?php 
	include '../config.php';

	// DELETE ADMIN
	if(isset($_POST['delete_admin'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "Admin information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: admin.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: admin.php");
	      }
	}


	// DELETE TEACHERS
	if(isset($_POST['delete_user'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "UPDATE users SET DELETED='True' WHERE user_Id='$user_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Teacher information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: users.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
	      }
	}



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



	// DELETE GRADE LEVEL
	if(isset($_POST['delete_grade'])) {
		$grade_Id = $_POST['grade_Id'];
		$delete = mysqli_query($conn, "DELETE FROM grade WHERE grade_Id='$grade_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Grade level has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: gradelevel.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: gradelevel.php");
	      }
	}



	// DELETE SECTION
	if(isset($_POST['delete_section'])) {
		$section_Id = $_POST['section_Id'];
		$delete = mysqli_query($conn, "DELETE FROM section WHERE section_Id='$section_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Section has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: sections.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: sections.php");
	      }
	}



	// DELETE SUBJECT
	if(isset($_POST['delete_subject'])) {
		$subject_Id = $_POST['subject_Id'];
		$delete = mysqli_query($conn, "DELETE FROM subject WHERE subject_Id='$subject_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Subject has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: subject.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: subject.php");
	      }
	}



	// DELETE ASSIGNED TEACHER
	if(isset($_POST['delete_assigned'])) {
		$assign_Id = $_POST['assign_Id'];
		$delete_assigned = mysqli_query($conn, "DELETE FROM assign WHERE assign_Id='$assign_Id'");
		 if($delete_assigned) {
	      	$_SESSION['message'] = "Assigned teacher's record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: assigning.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: assigning.php");
	      }
	}


	// PERMANENT DELETE STUDENTS
	if(isset($_POST['permanent_delete_student'])) {
		$student_Id = $_POST['student_Id'];

		$delete = mysqli_query($conn, "DELETE FROM students WHERE student_Id='$student_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Student information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: students_backup.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: students_backup.php");
	      }
	}



	// PERMANENT DELETE TEACHERS
	if(isset($_POST['permanentdelete_user'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Teacher information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: users_backup.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users_backup.php");
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



    // MULTIPLE DELETE - GRADE LEVEL
	if(isset($_POST['bulk_delete_gradelevel'])) {
      if(!empty($_POST['grade_Id'])) {
        $grade_Id = implode(",", $_POST['grade_Id']);
        $del = mysqli_query($conn, "DELETE FROM grade WHERE grade_Id IN ($grade_Id)");
        if($del) {
	      	$_SESSION['message'] = "Selected records has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: gradelevel.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: gradelevel.php");
	      }
      }
    }



    // MULTIPLE DELETE - SECTIONS
	if(isset($_POST['bulk_delete_sections'])) {
      if(!empty($_POST['section_Id'])) {
        $section_Id = implode(",", $_POST['section_Id']);
        $del = mysqli_query($conn, "DELETE FROM section WHERE section_Id IN ($section_Id)");
        if($del) {
	      	$_SESSION['message'] = "Selected records has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: sections.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: sections.php");
	      }
      }
    }



    // MULTIPLE DELETE - SUBJECT
	if(isset($_POST['bulk_delete_subject'])) {
      if(!empty($_POST['subject_Id'])) {
        $subject_Id = implode(",", $_POST['subject_Id']);
        $del = mysqli_query($conn, "DELETE FROM subject WHERE subject_Id IN ($subject_Id)");
        if($del) {
	      	$_SESSION['message'] = "Selected records has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: subject.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: subject.php");
	      }
      }
    }

?>

