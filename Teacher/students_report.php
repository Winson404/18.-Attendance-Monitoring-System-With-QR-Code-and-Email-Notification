<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Student report</li>
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
             
              <div class="card-body">
                <form method="POST">
               

                <div class="row bg-light">
                  <div class="col-6">
                      <div class="form-group">
                          <span><b>Section:</b></span>
                          <select class="select2" data-placeholder="Shelf location" id="shelf" style="width: 100%;" onchange="myFunction(this.value)">
                          <!-- <select class="select2" multiple="multiple" data-placeholder="Shelf location" style="width: 100%;" name="shelf-location"> -->
                              <option selected>Select Section</option>
                              <?php  
                                  $fetch = mysqli_query($conn, "SELECT * FROM section JOIN grade ON section.section_grade_Id=grade.grade_Id");
                                  while($row = mysqli_fetch_array($fetch)) {
                              ?>
                              <option value="<?php echo $row['section_Id']; ?>"><?php echo ''.$row['grade'].' '.$row['strand'].' - '.$row['section'].''; ?></option>
                              <?php } ?>
                          </select>
                          <!-- PASSING VALUE ON CHANGE -->
                          <input type="hidden" class="form-control" id="as_is_shelf" name="section" required>
                          <!-- END PASSING VALUE ON CHANGE -->
                      </div>
                    </div>
                  
                  <div class="col-1">
                    <div class="form-group">
                      <span class="text-light">Search:</span>
                      <button type="submit" class="btn btn-default" name="search">Search</button>
                      </form>
                    </div>
                  </div>
                  
              </div>
              <div class="dropdown-divider"></div>

              <?php 
                if(isset($_POST['search'])) {
                  $section = $_POST['section'];
              ?>
                 <table id="tatable" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>LRN</th>
                        <th>STUDENT NAME</th>
                        <th>GENDER</th>
                        <th>STRAND - SECTION</th>
                      </tr>
                      </thead>
                      <tbody id="users_data">
                        <tr>
                          <?php 
                            $fetch = mysqli_query($conn, "SELECT * FROM students JOIN section ON students.student_section_Id=section.section_Id JOIN grade ON section.section_grade_Id=grade.grade_Id WHERE student_section_Id='$section' ");
                            // $fetch = mysqli_query($conn, "SELECT * FROM attendance JOIN students ON attendance.attendance_student_Id=students.student_Id WHERE attendance_section_Id='$section' AND logdate='$date'");
                            if(mysqli_num_rows($fetch) > 0) {
                            while ($row = mysqli_fetch_array($fetch)) {
                          ?>
                            <td><?php echo $row['LRN']; ?></td>
                            <td><?php echo ' '.$row['lastname'].' '.$row['suffix'].', '.$row['firstname'].' '.$row['middlename'].'  '; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo ' '. $row['grade'].' - '. $row['section'].' ' ; ?></td>
                        </tr>
                        <?php } } else { ?>
                          <td colspan="100%" class="text-center">No record found</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>LRN</th>
                            <th>STUDENT NAME</th>
                            <th>GENDER</th>
                            <th>STRAND - SECTION</th>
                          </tr>
                      </tfoot>
                    </table>
                  <?php } else { ?>
                    <table id="tatable" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>LRN</th>
                        <th>STUDENT NAME</th>
                        <th>GENDER</th>
                        <th>STRAND - SECTION</th>
                      </tr>
                      </thead>
                      <tbody id="users_data">
                        <tr>
                          <?php 
                            $fetch = mysqli_query($conn, "SELECT * FROM students JOIN section ON students.student_section_Id=section.section_Id JOIN grade ON section.section_grade_Id=grade.grade_Id ");
                            // $fetch = mysqli_query($conn, "SELECT * FROM attendance JOIN students ON attendance.attendance_student_Id=students.student_Id WHERE attendance_section_Id='$section' AND logdate='$date'");
                            if(mysqli_num_rows($fetch) > 0) {
                            while ($row = mysqli_fetch_array($fetch)) {
                          ?>
                            <td><?php echo $row['LRN']; ?></td>
                            <td><?php echo ' '.$row['lastname'].' '.$row['suffix'].', '.$row['firstname'].' '.$row['middlename'].'  '; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo ' '. $row['grade'].' - '. $row['section'].' ' ; ?></td>
                        </tr>
                        <?php } } else { ?>
                          <td colspan="100%" class="text-center">No record found</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>LRN</th>
                            <th>STUDENT NAME</th>
                            <th>GENDER</th>
                            <th>STRAND - SECTION</th>
                          </tr>
                      </tfoot>
                    </table>
                  <?php } ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


<?php include 'footer.php';  ?>


<script>
    function myFunction(report_section_Id){ 
      var x = document.getElementById("shelf").value;
      document.getElementById("as_is_shelf").value = x;
    }
</script>