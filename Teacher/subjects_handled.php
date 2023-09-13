<title>Attendance MS QR Code | Subject handled</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject handled</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Subject handled</li>
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
                    <th>Sujbects assigned</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $fetch = mysqli_query($conn, "SELECT * FROM assign JOIN users ON assign.assign_user_Id=users.user_Id JOIN subject ON assign.assign_subject_Id=subject.subject_Id JOIN section ON assign.assign_section_Id=section.section_Id JOIN grade ON section.section_grade_Id=grade.grade_Id WHERE assign_user_Id='$id'");
                        while ($row = mysqli_fetch_array($fetch)) {
                      ?>
                        <td><?php echo ''.$row['grade'].' '.$row['strand'].' - '.$row['section'].''; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Strand and Section</th>
                        <th>Number of Students</th>
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
