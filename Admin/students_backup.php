<title>Attendance MS QR Code | Registered students</title>
<?php 
    include 'navbar.php'; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Registered students</li>
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
                    <th>Image</th>
                    <th>LRN</th>
                    <th>Full name</th>
                    <th>Gender</th>
                    <th>Grade and Section</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $fetch = mysqli_query($conn, "SELECT * FROM students JOIN section ON students.student_section_Id=section.section_Id JOIN grade ON students.student_grade_Id=grade.grade_Id WHERE DELETED='True'");
                        while ($row = mysqli_fetch_array($fetch)) {
                      ?>
                        <td>
                            <img src="../images-users/<?php echo $row['image']; ?>" alt="" width="35" height="35" style="margin-left: auto;margin-right: auto;display: block;border-radius: 50%;">
                        </td>
                        <td><?php echo $row['LRN']; ?></td>
                        <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo ''.$row['grade'].' '.$row['strand'].' - '.$row['section'].''; ?></td>
                        <td>
                           <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#restore<?php echo $row['student_Id']; ?>"><i class="fa-solid fa-window-restore"></i></button>
                           <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#permanentdelete<?php echo $row['student_Id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
                    </tr>

                    <?php include 'students_update_delete.php'; } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Image</th>
                        <th>LRN</th>
                        <th>Full name</th>
                        <th>Gender</th>
                        <th>Grade and Section</th>
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


<?php include 'footer.php';  ?>
