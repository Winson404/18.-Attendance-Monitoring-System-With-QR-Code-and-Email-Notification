<title>Attendance MS QR Code | No. of Students in a Section</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>No. of Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">No. of Students in a Section</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
             <!--  <div class="card-header">
                <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>
              </div> -->
              <div class="card-body">

                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Strand and Section</th>
                    <th>Number of Students</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $fetch = mysqli_query($conn, "SELECT *, COUNT(student_Id) As stud FROM students JOIN section ON students.student_section_Id=section.section_Id JOIN grade ON section.section_grade_Id=grade.grade_Id JOIN assign ON section.section_Id=assign.assign_section_Id WHERE assign_user_Id='$id' GROUP BY section");
                        while ($row = mysqli_fetch_array($fetch)) {
                      ?>
                        <td><?php echo ''.$row['grade'].' '.$row['strand'].' - '.$row['section'].''; ?></td>
                        <td><?php echo $row['stud']; ?></td>
                        <td>
                          <a href="all_students.php?student_section_Id=<?php echo $row['student_section_Id']; ?>" type="button" class="btn bg-gradient-primary"><i class="fa-solid fa-eye"></i></a>
                          <!-- <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#update<?php echo $row['grade_Id']; ?>"><i class="fa-solid fa-eye"></i></button> -->
                        </td> 
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Strand and Section</th>
                        <th>Number of Students</th>
                        <th>Actions</th>
                      </tr>
                  </tfoot>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php //include 'section_students_add.php'; ?>
<?php include 'footer.php';  ?>
