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
                <form method="POST">
                <div class="row bg-light">
                  <div class="col-3">
                    <div class="form-group">
                      <div class="form-group">
                        <span><b>Date From</b></span>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="date" class="form-control float-right" name="from" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <div class="form-group">
                        <span><b>Date To</b></span>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="date" class="form-control float-right" name="to" required>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

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
                   <div class="col-5">
                      <div class="form-group">
                        <form method="POST">
                          <span><b>Subject:</b></span>
                          <select class="select2" data-placeholder="Select Subject" id="subject" style="width: 100%;" onchange="myFunctionthree()">
                          <!-- <select class="select2" multiple="multiple" data-placeholder="Shelf location" style="width: 100%;" name="shelf-location"> -->
                              <option selected disabled value="">Select subject</option>
                          </select>
                          <!-- PASSING VALUE ON CHANGE -->
                          <input type="hidden" class="form-control" id="as_is_subject" name="subject" required>
                          <!-- END PASSING VALUE ON CHANGE -->
                      </div>
                  </div>


                  <div class="col-1">
                    <div class="form-group">
                      <span class="text-white">Search:</span>
                      <button type="submit" class="btn btn-default" name="search">Search</button>
                      </form>
                    </div>
                  </div>
                  
              </div>
              <div class="dropdown-divider"></div>

              <?php 
                if(isset($_POST['search'])) {
                  $from    = $_POST['from'];
                  $to      = $_POST['to'];
                  $section = $_POST['section'];
                  $subject = $_POST['subject'];

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
                            $fetch = mysqli_query($conn, "SELECT * FROM attendance JOIN students ON attendance.attendance_student_Id=students.student_Id JOIN section ON attendance.attendance_section_Id=section.section_Id JOIN subject ON attendance.attendance_subject_Id=subject.subject_Id WHERE attendance_section_Id='$section' AND attendance_subject_Id='$subject' AND logdate BETWEEN '$from' AND '$to' ");
                            // $fetch = mysqli_query($conn, "SELECT * FROM attendance JOIN students ON attendance.attendance_student_Id=students.student_Id WHERE attendance_section_Id='$section' AND logdate='$date'");
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
                    <h4 class="text-center">Select Section, Date and Subject first</h4>

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
                          <td colspan="100%" class="text-center">No record found</td>
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
    function myFunction(report_section_Id){ 

      var x = document.getElementById("shelf").value;
      document.getElementById("as_is_shelf").value = x;

      $('#subject').html('');
      $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { report_section_Id : report_section_Id}, 
      success : function(data){
      $('#subject').html(data);
      }
      })
    }


    // function myFunction() {
    //     var x = document.getElementById("shelf").value;
    //     document.getElementById("as_is_shelf").value = x;
    // }

    function myFunctionthree() {
        var x = document.getElementById("subject").value;
        document.getElementById("as_is_subject").value = x;
    }
</script>