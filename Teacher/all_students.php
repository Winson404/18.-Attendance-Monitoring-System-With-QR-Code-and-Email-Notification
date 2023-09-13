<title>Attendance MS QR Code | List of Students</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['student_section_Id']))
      $student_section_Id = $_GET['student_section_Id'];
      $fetch_student = mysqli_query($conn, "SELECT * FROM students JOIN grade ON students.student_grade_Id=grade.grade_Id JOIN section ON students.student_section_Id=section.section_Id WHERE DELETED='False' AND student_section_Id='$student_section_Id'");

      $get_section = mysqli_query($conn, "SELECT * FROM section JOIN grade ON section.section_grade_Id=grade.grade_Id WHERE section_Id ='$student_section_Id'");
      $section = mysqli_fetch_array($get_section);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">List of Students</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-header text-center bg-gradient-light">
            <a href="#" class="h3"><?php echo ''.$section['grade'].' '.$section['strand'].' - '.$section['section'].''; ?></a>
        </div>
        <div class="card-body pb-0">
          <div class="row">
            <?php 
                while ($row = mysqli_fetch_array($fetch_student)) {
            ?>

            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  <b>LRN:</b> <?php echo $row['LRN']; ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fa-solid fa-venus-mars"></i></span> Gender: <?php echo $row['gender']; ?></li>
                        <li class="small"><span class="fa-li"><i class="fa-solid fa-registered"></i></span> Date registered: <?php echo date("F d, Y", strtotime($row['date_registered'])); ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../images-users/<?php echo $row['image']; ?>" alt="Student profile" width="105" height="105" style="border-radius: 50%;box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                   <!--  <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a> -->
                    <a type="button" class="btn btn-sm bg-gradient-primary" data-toggle="modal" data-target="#qr<?php echo $row['student_Id']; ?>">
                      <i class="fa-solid fa-qrcode"></i> View QR Code
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?php include 'all_students_view.php'; } ?>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <!-- <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav> -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>
