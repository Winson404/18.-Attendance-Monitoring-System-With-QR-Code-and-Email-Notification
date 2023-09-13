<title>Attendance MS QR Code | Attendance dashboard</title>
<?php 
    include 'navbar.php'; 
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');
?>
  
  <div class="modal fade" id="emptysection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header bg-light">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Empty section</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
          </button>
        </div>
        <div class="modal-body">
            <h6 class="text-center">There are no students in this section.</h6>
        </div>
        <div class="modal-footer alert-light">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-bottom: 200px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Attendance dashboard</li>
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

          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='BIYO' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'BIYO'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='SAN JUAN' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'SAN JUAN'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='HENOSA' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'HENOSA'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='FLORES' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'FLORES'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='DELMUNDO' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'DELMUNDO'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-light">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='RIZAL' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'RIZAL'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='TRINIDAD' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'TRINIDAD'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>



           <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='BENITEZ' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'BENITEZ'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='Ciron Sr.' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'Ciron Sr.'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>



           <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='QUISUMBING' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'QUISUMBING'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>



           <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='ESGUERRA' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'ESGUERRA'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='PALMA' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'PALMA'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) { ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>



           <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $section = mysqli_query($conn, "SELECT *, COUNT(student_section_Id) AS stud FROM students JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND section='AGUILAR' GROUP BY section");
                  $row = mysqli_fetch_array($section);
                  $section_Id = $row['section_Id'];
                  // PRESENT
                  $present = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS present FROM attendance WHERE remarks='Present' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_present = mysqli_fetch_array($present);
                  // LATE
                  $late = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS late FROM attendance WHERE remarks='Late' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_late = mysqli_fetch_array($late);
                  // ABSENT
                  $absent = mysqli_query($conn, "SELECT COUNT(attendance_Id) AS absent FROM attendance WHERE remarks='Absent' AND attendance_section_Id='$section_Id' AND logdate='$date'");
                  $row_absent = mysqli_fetch_array($absent);
                ?>
                <h3><?php if($row['stud'] == "") { echo 'Empty section'; } else { echo $row['stud']; } ?></h3>
                <p><?php if($row['stud'] == "") { echo 'AGUILAR'; }else { echo $row['section']; } ?></p>
                <p style="margin-bottom: -5px;">Present: <?php echo $row_present['present']; ?></p>
                <p style="margin-bottom: -5px;">Late: <?php echo $row_late['late']; ?></p>
                <p>Absent: <?php echo $row_absent['absent']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
               <?php if(mysqli_num_rows($section) > 0) {  ?>
              <a type="button" data-toggle="modal" data-target="#selectsection<?php echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <!-- <a href="attendance.php?section_Id=<?php // echo $row['section_Id']; ?>" class="small-box-footer">Attendance <i class="fas fa-arrow-circle-right"></i></a> -->
              <?php include 'attendance_select_subject.php'; } else { ?>
              <a type="button" class="small-box-footer" data-toggle="modal" data-target="#emptysection">Attendance <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>


        

        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>
<script>
    function myFunction() {
        var x = document.getElementById("shelf").value;
        document.getElementById("as_is_shelf").value = x;
    }

    function myFunctionthree() {
        var x = document.getElementById("catalog-number").value;
        document.getElementById("as_is_catalog-number").value = x;
    }
</script>