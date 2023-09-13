<title>Attendance MS QR Code | Assigned teacher profile</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['teacher_profile']))
    $teacher_profile = $_GET['teacher_profile'];
    $get_profile = mysqli_query($conn, "SELECT * FROM users JOIN assign ON users.user_Id=assign.assign_user_Id JOIN subject ON assign.assign_subject_Id=subject.subject_Id JOIN section ON assign.assign_section_Id=section.section_Id JOIN grade ON section.section_grade_Id=grade.grade_Id WHERE users.user_Id='$teacher_profile'");
    $row_profile = mysqli_fetch_array($get_profile);
    $selected_teacher = $row_profile['user_Id'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Assigned teacher profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../images-users/<?php echo $row_profile['image']; ?>"
                       alt="User profile picture"  style="height: 90px; width: 90px; border-radius: 50%;">
                </div>
                <h3 class="profile-username text-center"><?php echo ' '.$row_profile['firstname'].' '.$row_profile['lastname'].' '; ?></h3>
                <p class="text-muted text-center"><?php echo $row_profile['ID_number']; ?></p>
                <a class="btn bg-gradient-primary btn-block">Profile</a>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header bg-gradient-primary">
                <h3 class="card-title">About Me</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                <p class="text-muted"><?php echo $row_profile['address']; ?></p>
                <hr>
              </div>
            </div>

          </div>


          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#accountsecurity" data-toggle="tab">Teacher's assignation</a></li>
                  <li class="nav-item"><a class="nav-link" href="#viewprofile" data-toggle="tab">Teacher's profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane" id="viewprofile">
                     <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">Full name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="First name" placeholder="First name" value="<?php echo ' '.$row_profile['firstname'].' '.$row_profile['middlename'].' '.$row_profile['lastname'].' '.$row_profile['suffix'].' '; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="gender" required disabled>
                                 <?php if($row_profile['gender'] == 'Male'): ?>
                                      <option value="<?php echo $row_profile['gender']; ?>" selected><?php echo $row_profile['gender']; ?></option>
                                      <option value="Female">Female</option>
                                 <?php else: ?>
                                      <option value="<?php echo $row_profile['gender']; ?>" selected><?php echo $row_profile['gender']; ?></option>
                                      <option value="Male">Male</option>
                                <?php endif; ?>
                             </select> 
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Date of birth" class="col-sm-2 col-form-label">Date of birth</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="Date of birth" placeholder="Date of birth" value="<?php echo $row_profile['dob']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Age" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="Age" placeholder="Age" value="<?php echo $row_profile['age']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Email" placeholder="Email" value="<?php echo $row_profile['email']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Contact number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Contact number" placeholder="Contact number" value="<?php echo $row_profile['contact']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Date registered" class="col-sm-2 col-form-label">Date registered</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="Date registered" placeholder="Date registered" value="<?php echo $row_profile['date_registered']; ?>" readonly>
                        </div>
                      </div>
                  </div>


                  <div class="active tab-pane" id="accountsecurity">
                      <div class="row">
                          <div class="form-group col-lg-3">
                            <label for="Old password" class="col-form-label">Grade</label>
                            <input type="text" class="form-control" value="<?php echo $row_profile['grade']; ?>" readonly>
                          </div>
                          <div class="form-group col-lg-4">
                            <label for="Old password" class="col-form-label">Strand</label>
                            <input type="text" class="form-control" value="<?php echo $row_profile['strand']; ?>" readonly>
                          </div>
                          <div class="form-group col-lg-5">
                            <label for="Old password" class="col-form-label">Section</label>
                            <input type="text" class="form-control" value="<?php echo $row_profile['section']; ?>" readonly>
                          </div>
                          

                          <div class="col-lg-12">
                            <hr>
                            <table class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Section and Strand</th>
                                <th>Subjects</th>
                              </tr>
                              </thead>
                              <tbody id="users_data">
                                <tr>
                                  <?php 
                                    $sql = mysqli_query($conn, "SELECT * FROM assign JOIN users ON assign.assign_user_Id=users.user_Id JOIN subject ON assign.assign_subject_Id=subject.subject_Id JOIN section ON assign.assign_section_Id=section.section_Id JOIN grade ON section.section_grade_Id=grade.grade_Id WHERE user_type='User' AND DELETED='False' AND users.user_Id='$selected_teacher'");
                                    while ($row = mysqli_fetch_array($sql)) {
                                  ?>
                                    <td><?php echo ' '.$row['grade'].' - '.$row['section'].' '; ?></td>
                                    <td><?php echo $row['subject']; ?></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                          </div>
                      </div>
                  </div>


                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<?php include 'footer.php'; ?>

