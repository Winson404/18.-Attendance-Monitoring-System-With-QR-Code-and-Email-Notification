<title>Attendance MS QR Code | Dashboard</title>
<?php 
    include 'navbar.php'; 
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');
?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-center">

           <?php 
            $fetch = mysqli_query($conn, "SELECT *, COUNT(student_Id) As stud FROM students JOIN section ON students.student_section_Id=section.section_Id JOIN grade ON section.section_grade_Id=grade.grade_Id JOIN assign ON section.section_Id=assign.assign_section_Id WHERE assign_user_Id='$id' GROUP BY section");
            while ($row = mysqli_fetch_array($fetch)) {
              $ass = $row['assign_section_Id'];
              $student_section = $row['section'];
          ?>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='$student_section' GROUP BY section");
                  $rowrow = mysqli_fetch_array($section);
                  $section_Id = $rowrow['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND (attendance_section_Id='$section_Id' AND attendance_section_Id='$ass') AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND (attendance_section_Id='$section_Id' AND attendance_section_Id='$ass') AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND (attendance_section_Id='$section_Id' AND attendance_section_Id='$ass') AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($rowrow['stud'] == "") { echo 'Empty section'; } else { echo $rowrow['stud']; } ?></h3>
                <p><?php echo $row['section']; ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="attendance.php?section_Id=<?php echo $rowrow['section_Id']; ?>&&user_Id=<?php echo $id; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
             
            </div>
          </div>
           <?php } ?>

        </div>
      </div>
    </section>

    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>
