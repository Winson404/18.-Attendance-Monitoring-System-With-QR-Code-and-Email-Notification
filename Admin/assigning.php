<title>Attendance MS QR Code | Assigned teachers</title>
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
            <h1>Teachers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Assigned teachers</li>
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
                    <th>Teachers name</th>
                    <th>Strand and Section</th>
                    <th>Subject</th>
                    <th>Time</th>
                    <th>Day</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $fetch = mysqli_query($conn, "SELECT * FROM assign JOIN users ON assign.assign_user_Id=users.user_Id JOIN subject ON assign.assign_subject_Id=subject.subject_Id JOIN section ON assign.assign_section_Id=section.section_Id JOIN grade ON section.section_grade_Id=grade.grade_Id WHERE user_type='User' AND DELETED='False'");
                        while ($row = mysqli_fetch_array($fetch)) {
                      ?>
                        <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                        <td><?php echo ''.$row['grade'].' '.$row['strand'].' - '.$row['section'].''; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo ''.$row['start_time'].' - '.$row['end_time'].''; ?></td>
                        <td><?php echo $row['day']; ?></td>
                        <td>
                          <!-- <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#view<?php //echo $row['assign_Id']; ?>"><i class="fa-solid fa-eye"></i></button> -->
                          <a href="assigning_profile.php?teacher_profile=<?php echo $row['user_Id']; ?>" type="button" class="btn bg-gradient-primary"><i class="fa-solid fa-eye"></i></a>
                          <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#update<?php echo $row['assign_Id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                          <button type="button" class="btn bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['assign_Id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
                    </tr>

                    <?php include 'assigning_update_delete.php'; } ?>

                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Teachers name</th>
                        <th>Strand and Section</th>
                        <th>Subject</th>
                        <th>Time</th>
                        <th>Day</th>
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


<?php include 'assigning_add.php'; ?>
<?php include 'footer.php';  ?>


