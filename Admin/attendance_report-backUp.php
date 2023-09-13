<title>Attendance MS QR Code | Attendance report</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Attendance report</li>
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
                <div class="row">
                  
                  <div class="col-5">
                      <div class="form-group">
                        <form method="POST">
                          <label>Section:</label>
                          <select class="select2" data-placeholder="Shelf location" id="shelf" style="width: 100%;" onchange="myFunction()">
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
                          <input type="hidden" class="form-control form-control-lg" id="as_is_shelf" name="section">
                          <!-- END PASSING VALUE ON CHANGE -->
                      </div>
                  </div>
               
                  <div class="col-3">
                      <div class="form-group">
                          <label>Date:</label>
                          <select class="select2" style="width: 100%;" id="catalog-number" onchange="myFunctionthree()">
                              <option selected>Select date</option>
                              <?php  
                                  $fetch = mysqli_query($conn, "SELECT * FROM attendance");
                                  while($row = mysqli_fetch_array($fetch)) {
                              ?>
                              <option value="<?php echo $row['logdate']; ?>" ><?php echo date("F d, Y", strtotime($row['logdate'])); ?></option>
                              <?php } ?>
                          </select>
                          <!-- PASSING VALUE ON CHANGE -->
                          <input type="hidden" class="form-control form-control-lg" id="as_is_catalog-number" name="date" >
                          <!-- END PASSING VALUE ON CHANGE -->
                      </div>
                  </div>
                  <div class="col-1">
                    <div class="form-group">
                      <label class="text-white">Search:</label>
                      <button type="submit" class="btn btn-default" name="search">Search</button>
                      </form>
                    </div>
                  </div>
                  
              </div>
              <hr>

              <?php 
                if(isset($_POST['search'])) {
                  $section = $_POST['section'];
                  $date    = $_POST['date'];
              ?>
                 <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>LRN</th>
                        <th>STUDENT NAME</th>
                        <th>TIME IN</th>
                        <th>LOG DATE</th>
                        <th>REMARKS</th>
                      </tr>
                      </thead>
                      <tbody id="users_data">
                        <tr>
                          <?php 
                            $fetch = mysqli_query($conn, "SELECT * FROM attendance JOIN students ON attendance.attendance_student_Id=students.student_Id WHERE attendance_section_Id='$section' AND logdate='$date'");
                            if(mysqli_num_rows($fetch) > 0) {
                            while ($row = mysqli_fetch_array($fetch)) {
                          ?>
                            <td><?php echo $row['LRN']; ?></td>
                            <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                            <td><?php echo $row['time_in']; ?></td>
                            <td><?php echo date("F d, Y", strtotime($row['logdate'])); ?></td>
                            <td><?php echo $row['remarks']; ?></td>
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
                            <th>TIME IN</th>
                            <th>LOG DATE</th>
                            <th>REMARKS</th>
                          </tr>
                      </tfoot>
                    </table>
                  <?php } else { ?>
                      <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>LRN</th>
                        <th>STUDENT NAME</th>
                        <th>TIME IN</th>
                        <th>LOG DATE</th>
                        <th>REMARKS</th>
                      </tr>
                      </thead>
                      <tbody id="users_data">
                        <tr>
                          <td colspan="100%" class="text-center">Select section and date first</td>
                        </tr>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>LRN</th>
                            <th>STUDENT NAME</th>
                            <th>TIME IN</th>
                            <th>LOG DATE</th>
                            <th>REMARKS</th>
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


<?php include 'gradelevel_add.php'; ?>
<?php include 'footer.php';  ?>


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