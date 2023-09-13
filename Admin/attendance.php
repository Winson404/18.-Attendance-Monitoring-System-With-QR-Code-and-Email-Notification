<?php 
    include 'navbar.php'; 

  
    if(isset($_GET['section_Id']) && isset($_GET['assignId']))

    $section_Id = $_GET['section_Id'];
    $assignId   = $_GET['assignId'];
    $sec = mysqli_query($conn, "SELECT * FROM section WHERE section_Id='$section_Id'");
    $display = mysqli_fetch_array($sec);

    $get_section_name = mysqli_query($conn, "SELECT * FROM attendance JOIN section ON attendance.attendance_section_Id=section.section_Id WHERE attendance_section_Id='$section_Id'");
    $section_name = mysqli_fetch_array($get_section_name);
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Section <?php if(mysqli_num_rows($get_section_name) > 0) { echo $section_name['section']; } else { echo $display['section']; } ?> attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">General Attendance</li>
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
                    <button onclick="load_upmodal()" type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#add_user" data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-qrcode"></i>SCAN QR CODE</button>
                    <p id="time"></p>
              </div>

              <div class="card-body">
                     <form action="process_save.php" method="POST" class="form-horizontal">
                         <div class="input-group mb-3">
                          <input type="text" name="lrn" id="text" placeholder="Enter Learner's Reference Number" class="form-control" autofocus>
                          <!-- TRUE VALUE OF THIS HIDDEN INPUT IS IN THE SCRIPT BELOW -->
                          <input type="hidden" name="section_Id" id="section_Id" class="form-control" value="<?php echo $section_Id; ?>">
                          <input type="hidden" name="assignId" id="assignId" class="form-control" value="<?php echo $assignId; ?>">
                          <!-- END TRUE VALUE OF THIS HIDDEN INPUT IS IN THE SCRIPT BELOW -->
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                          </div>
                        </div>
                     </form>

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
                            date_default_timezone_set('Asia/Manila');
                            $date = date('Y-m-d');
                            $attendance = mysqli_query($conn, "SELECT * FROM attendance JOIN students ON attendance.attendance_student_Id=students.student_Id JOIN subject ON attendance.attendance_subject_Id=subject.subject_Id WHERE attendance_section_Id='$section_Id' AND logdate='$date' ");
                            while ($row = mysqli_fetch_array($attendance)) {
                          ?>
                            <td><?php echo $row['LRN']; ?></td>
                            <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                            <td><?php echo $row['time_in']; ?></td>
                            <td><?php echo date("F d, Y", strtotime($row['logdate'])); ?></td>
                            <td><?php echo $row['remarks']; ?></td>
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

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php 
      include 'attendance_add.php'; 
      include 'footer.php';  

      echo "<script>
            $(window).on('load', function() {
                $('#add_user').modal('show');
                load_upmodal();
            });
        </script>"; 
?>



<script>

// LOAD UP MODAL ON BUTTON CLICKED
function load_upmodal() {
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
    Instascan.Camera.getCameras().then(function(cameras){
      if(cameras.length > 0 ){
        scanner.start(cameras[0]);
      } else{
        alert('No cameras found');
      }

    }).catch(function(e) {
      console.error(e);
    });

    scanner.addListener('scan',function(c){
    document.getElementById('text').value=c;
    document.getElementById('section_Id').value='<?php echo $section_Id; ?>';
    document.getElementById('assignId').value='<?php echo $assignId; ?>';
    document.forms[0].submit();
  });
}


// REFRESH PAGE ON BUTTON CLICK
function refreshPage() {
  location.reload();
}


// DISPLAY TIME
var timestamp = '<?=time();?>';
function updateTime(){
$('#time').html(Date(timestamp));
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
    
</script>