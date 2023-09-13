<title>Attendance MS QR Code | Subjects</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Subjects</li>
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
              <div class="card-header">
                <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>
              </div>
              <div class="card-body">

                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Subject level</th>
                    <th>Subject name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $fetch = mysqli_query($conn, "SELECT * FROM subject LEFT JOIN grade ON subject.subject_grade_Id=grade.grade_Id ORDER BY grade");
                        while ($row = mysqli_fetch_array($fetch)) {
                        
                      ?>
                        <td><?php echo ''.$row['grade'].'- '.$row['strand'].''; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td>
                          <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#update<?php echo $row['subject_Id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                          <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['subject_Id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
                    </tr>
                    <?php include 'subject_update_delete.php'; } ?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Subject level</th>
                        <th>Subject name</th>
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


<?php include 'subject_add.php'; ?>
<?php include 'footer.php';  ?>
