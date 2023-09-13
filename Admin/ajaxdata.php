	<?php
	include '../config.php';

	// GET SECTION AUTOMATICALLY AFTER GRADE IS BEING SELECTED IN students_add.php file
	if (isset($_POST['section'])) {
		$section = $_POST['section'];
		$query = mysqli_query($conn, "SELECT * FROM section JOIN grade ON section.section_grade_Id=grade.grade_Id WHERE section.section_grade_Id = '$section'");			
		if (mysqli_num_rows($query) > 0 ) {
			echo '<option>Select section</option>'; //can be deleted
			while ($row = $query->fetch_assoc()) {
			 	echo '<option value="'.$row['section_Id'].'">  '.$row['section'].'  </option>';
			}
		} else {
			echo '<option selected disabled>No section found</option>';	
		 }
	}



	// GET SECTION AUTOMATICALLY AFTER GRADE IS BEING SELECTED IN students_update_delete.php file
	if (isset($_POST['update_section'])) {
		$section = $_POST['update_section'];
		$query = mysqli_query($conn, "SELECT * FROM section JOIN grade ON section.section_grade_Id=grade.grade_Id WHERE section.section_grade_Id ='$section'");			
		if (mysqli_num_rows($query) > 0 ) {
			echo '<option>Select section</option>'; //can be deleted
			while ($row = $query->fetch_assoc()) {
			 	echo '<option value="'.$row['section_Id'].'"> '.$row['section'].'  </option>';
			}
		} else {
			echo '<option selected disabled>No section found</option>';	
		 }
	}




	// GET SUBJECTS AUTOMATICALLY ACCORDING TO GRADE LEVEL AFTER BEING SELECTED IN assigning_add.php file
	if (isset($_POST['section_Id'])) {
		$section_Id = $_POST['section_Id'];
		$fetch = mysqli_query($conn, "SELECT * FROM section WHERE section_Id='$section_Id'");
		if(mysqli_num_rows($fetch) > 0) {
			while($row = mysqli_fetch_array($fetch)) {
				$section_grade_Id = $row['section_grade_Id'];

				$query = mysqli_query($conn, "SELECT * FROM subject JOIN grade ON subject.subject_grade_Id=grade.grade_Id WHERE subject.subject_grade_Id ='$section_grade_Id'");			
				if (mysqli_num_rows($query) > 0 ) {
					echo '<option>Select subject</option>'; //can be deleted
					while ($row = $query->fetch_assoc()) {
					 	echo '<option value="'.$row['subject_Id'].'">  '.$row['subject'].' </option>';
					}
				} else {
					echo '<option selected disabled>No subject found</option>';	
				}
			}
		} else {
			echo '<option selected disabled>No subject found</option>';	
		}
		
	}



	// GET SUBJECTS AUTOMATICALLY ACCORDING TO GRADE LEVEL AFTER BEING SELECTED IN assigning_update_delete.php file
	if (isset($_POST['subject_Id'])) {
		$subject_Id = $_POST['subject_Id'];
		$fetch = mysqli_query($conn, "SELECT * FROM section WHERE section_Id='$subject_Id'");
		if(mysqli_num_rows($fetch) > 0) {
			while($row = mysqli_fetch_array($fetch)) {
				$section_grade_Id = $row['section_grade_Id'];

				$query = mysqli_query($conn, "SELECT * FROM subject JOIN grade ON subject.subject_grade_Id=grade.grade_Id WHERE subject_grade_Id='$section_grade_Id'");			
				if (mysqli_num_rows($query) > 0 ) {
					echo '<option>Select subject</option>'; //can be deleted
					while ($row = $query->fetch_assoc()) {
					 	echo '<option value="'.$row['subject_Id'].'">  '.$row['subject'].' </option>';
					}
				} else {
					echo '<option selected disabled>No subject found</option>';	
				}
			}
		} else {
			echo '<option selected disabled>No subject found</option>';	
		 }
		
	}






	// GET SUBJECTS AUTOMATICALLY ACCORDING TO SECTION attendance_report.php file
	if (isset($_POST['report_section_Id'])) {
		$report_section_Id = $_POST['report_section_Id'];
		$fetch = mysqli_query($conn, "SELECT * FROM assign JOIN section ON assign.assign_section_Id=section.section_Id JOIN subject ON assign.assign_subject_Id=subject.subject_Id JOIN grade ON subject.subject_grade_Id=grade.grade_Id WHERE assign.assign_section_Id='$report_section_Id' GROUP BY subject_Id");
		if(mysqli_num_rows($fetch) > 0) {
			echo '<option selected disabled value="">Select subject</option>';
			while($row = mysqli_fetch_array($fetch)) {
				echo '<option value="'.$row['subject_Id'].'">  '.$row['subject'].' </option>';
			}
		} else {
			echo '<option selected disabled value="">No subject found</option>';	
		}
		
	}


 
?>