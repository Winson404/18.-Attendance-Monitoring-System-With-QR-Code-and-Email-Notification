<title>Attendance MS QR Code | Gen. Attendance QR CODE Scanning</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gen. Attendance QR CODE Scanning</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Gen. Attendance QR CODE Scanning</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="card" style="height: 520px;">
              <div class="card-header">
                    <?php 
                      $date = date('Y-m-d');
                      $attendance = mysqli_query($conn, "SELECT * FROM attendance JOIN students ON attendance.attendance_student_Id=students.student_Id WHERE logdate='$date' ORDER BY attendance_Id DESC LIMIT 1");
                      while ($row = mysqli_fetch_array($attendance)) {
                    ?>
                    <label>✅ <?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?> - <span class="text-success"><?php echo ''.date("F d, Y", strtotime($row['logdate'])).' - '.$row['time_in'].''; ?></span></label>
                    <?php } ?>
              </div>
              <div class="card-body">
                <div class="row d-flex justify-content-center">
                  <div class="col-lg-5">
                    <video id="camera" width="100%" height="100%"></video>
                    <div class="row d-flex justify-content-center">
                      <button class="btn bg-gradient-primary"><i class="fa-solid fa-camera"></i> TAP HERE</button>
                    </div>
                  </div>
                  <form action="process_save.php" method="POST">
                    <input type="hidden" name="navbar_lrn" id="text2" placeholder="Enter Learner's Reference Number" class="form-control" autofocus>
                  </form>
                </div>
              </div>
              </div>
            </div>
      </div>
    </section>
  </div>
<script>

  let ds = new Instascan.Scanner({ video: document.getElementById('camera')});
    Instascan.Camera.getCameras().then(function(cameras){
      if(cameras.length > 0 ){
        ds.start(cameras[0]);
      } else{
        alert('No cameras found');
      }

    }).catch(function(e) {
      console.error(e);
    });

    ds.addListener('scan',function(c){
    document.getElementById('text2').value=c;
    document.forms[0].submit();
  });

// REFRESH PAGE ON BUTTON CLICK
function navbarrefreshPage() {
      location.reload();
}

</script>

<?php include 'footer.php';  ?>
