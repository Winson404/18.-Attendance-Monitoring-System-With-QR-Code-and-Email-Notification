<title>Attendance MS QR Code | Registered students</title>
<?php 
    include 'navbar.php'; 
    if(isset($_GET['student_Id'])) {
    $student_Id = $_GET['student_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM students WHERE student_Id='$student_Id'");
    $row = mysqli_fetch_array($fetch);
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
        <div class="row d-flex justify-content-center">
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
                <form action="process_update.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <input type="hidden" class="form-control" value="<?php echo $row['student_Id']; ?>" name="student_Id">
                      <input type="hidden" class="form-control" value="<?php echo $row['student_grade_Id']; ?>" name="gradeId">
                      <div class="col-lg-12">
                          <div class="form-group">
                            <label>Learner's Reference Number (LRN)</label>
                            <input type="text" class="form-control"  placeholder="Learner's Reference Number (LRN)" name="lrn" required value="<?php echo $row['LRN']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                            <label>First name</label>
                            <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)" value="<?php echo $row['firstname']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                            <label>Middle name</label>
                            <input type="text" class="form-control"  placeholder="Middle name" name="middlename" required onkeyup="lettersOnly(this)" value="<?php echo $row['middlename']; ?>">
                        </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                            <label>Last name</label>
                            <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)" value="<?php echo $row['lastname']; ?>">
                          </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Suffix name</label>
                          <input type="text" class="form-control"  placeholder="Suffix name" name="suffix" onkeyup="lettersOnly(this)" value="<?php echo $row['suffix']; ?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Gender</label>
                          <select class="form-control" name="gender" required>
                            <option value="Male"   <?php if($row['gender'] == 'Male')   { echo 'selected'; } ?>>Male</option>
                            <option value="Female" <?php if($row['gender'] == 'Female') { echo 'selected'; } ?>>Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="form-group">
                          <label>Grade level - Strand</label>
                          <select class="form-control" name="grade" required onchange="updatefetchsamesection(this.value)">
                            <option selected disabled>Select grade level</option>
                            <?php 
                              $grade_Id = $row['student_grade_Id'];
                              $fetch_grade = mysqli_query($conn, "SELECT * FROM grade ORDER BY grade");
                              while ($row_grade = mysqli_fetch_array($fetch_grade)) {
                            ?>
                            <option value="<?php echo $row_grade['grade_Id']; ?>" <?php if($row_grade['grade_Id'] == $grade_Id) { echo 'selected'; } ?>><?php echo ''.$row_grade['grade'].' - '.$row_grade['strand'].''; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-7">
                        <div class="form-group">
                          <label>Section</label>
                          <select class="form-control" name="section" required id="updatesection">
                            <?php   
                                $aa = $row['student_section_Id'];
                                $x = mysqli_query($conn, "SELECT * FROM section ORDER BY section");
                                while($y = mysqli_fetch_array($x)) {
                            ?>
                            <option value="<?php echo $y['section_Id']; ?>" <?php if($y['section_Id'] == $aa) { echo 'selected'; } ?>><?php echo $y['section']; ?></option>
                           <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file" name="fileToUpload">
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <a type="button" class="btn btn-secondary" href="students.php"><i class="fa-solid fa-ban"></i> Cancel</a>
                    <button type="submit" class="btn bg-gradient-primary" name="update_student" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                  </div>
                </form>
            </div>
          
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php } elseif(isset($_GET['viewstudent_Id'])) {
    $student_Id = $_GET['viewstudent_Id'];
    $fetch = mysqli_query($conn, "SELECT * FROM students WHERE student_Id='$student_Id'");
    $row = mysqli_fetch_array($fetch);
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
        <div class="row d-flex justify-content-center">
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
                <form action="process_update.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12 mb-4 d-flex justify-content-center">
                          <img src="../images-users/<?php echo $row['image']; ?>" alt="" width="120" height="120" style="border-radius: 50%; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                            <label>Learner's Reference Number (LRN)</label>
                            <input type="text" class="form-control"  placeholder="Learner's Reference Number (LRN)" name="lrn" required value="<?php echo $row['LRN']; ?>" readonly>
                          </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                            <label>First name</label>
                            <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)" value="<?php echo $row['firstname']; ?>" readonly>
                          </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                            <label>Middle name</label>
                            <input type="text" class="form-control"  placeholder="Middle name" name="middlename" required onkeyup="lettersOnly(this)" value="<?php echo $row['middlename']; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="form-group">
                            <label>Last name</label>
                            <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)" value="<?php echo $row['lastname']; ?>" readonly>
                          </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Suffix name</label>
                          <input type="text" class="form-control"  placeholder="Suffix name" name="suffix" onkeyup="lettersOnly(this)" value="<?php echo $row['suffix']; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Gender</label>
                          <select class="form-control" name="gender" required disabled>
                            <option value="Male"   <?php if($row['gender'] == 'Male')   { echo 'selected'; } ?>>Male</option>
                            <option value="Female" <?php if($row['gender'] == 'Female') { echo 'selected'; } ?>>Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="form-group">
                          <label>Grade level - Strand</label>
                          <select class="form-control" name="grade" required onchange="updatefetchsamesection(this.value)" disabled>
                            <option selected disabled>Select grade level</option>
                            <?php 
                              $grade_Id = $row['student_grade_Id'];
                              $fetch_grade = mysqli_query($conn, "SELECT * FROM grade ORDER BY grade");
                              while ($row_grade = mysqli_fetch_array($fetch_grade)) {
                            ?>
                            <option value="<?php echo $row_grade['grade_Id']; ?>" <?php if($row_grade['grade_Id'] == $grade_Id) { echo 'selected'; } ?>><?php echo ''.$row_grade['grade'].' - '.$row_grade['strand'].''; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-7">
                        <div class="form-group">
                          <label>Section</label>
                          <select class="form-control" name="section" required id="updatesection" disabled>
                            <?php   
                                $aa = $row['student_section_Id'];
                                $x = mysqli_query($conn, "SELECT * FROM section ORDER BY section");
                                while($y = mysqli_fetch_array($x)) {
                            ?>
                            <option value="<?php echo $y['section_Id']; ?>" <?php if($y['section_Id'] == $aa) { echo 'selected'; } ?>><?php echo $y['section']; ?></option>
                           <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="card-footer">
                    <a type="button" class="btn btn-secondary" href="students.php"><i class="fa-solid fa-ban"></i> Cancel</a>
                    <a type="button" class="btn bg-gradient-success" href="students_update_view.php?student_Id=<?php echo $row['student_Id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                  </div>
                </form>
            </div>
          
          </div>
        </div>
      </div>
    </section>
  </div>



  <?php } else { include '404.php'; } ?>

<?php include 'footer.php';  ?>


<script>
    function updatefetchsamesection(update_section){ //Id refers to the Id of the adviser
    $('#updatesection').html('');
    $.ajax({
    type:'post',
    url: 'ajaxdata.php',
    data : { update_section : update_section}, //Id refers to the Id of the adviser
    success : function(data){
    $('#updatesection').html(data);
    }
    })
    }
</script>


<script>
  function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure to delete selected users?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
}


$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
  
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>