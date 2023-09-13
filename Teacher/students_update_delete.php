<!-- VIEW -->
<div class="modal fade" id="view<?php echo $row['student_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Student's info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <input type="hidden" class="form-control" value="<?php echo $row['student_Id']; ?>" name="student_Id">
          <div class="col-lg-12 mb-4 d-flex justify-content-center">
              <img src="../images-users/<?php echo $row['image']; ?>" alt="" width="120" height="120" style="border-radius: 50%; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>Learner's Reference Number (LRN)</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Learner's Reference Number (LRN)" name="lrn" required value="<?php echo $row['LRN']; ?>" readonly>
              </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>Student's full name</label>
                <input type="text" class="form-control form-control-sm"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)" value="<?php echo ''.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?>" readonly>
              </div>
          </div>
         
          <div class="col-lg-12">
            <div class="form-group">
              <label>Gender</label>
              <input type="text" class="form-control form-control-sm"  placeholder="Jr./Sr." name="suffix" onkeyup="lettersOnly(this)" value="<?php echo $row['gender']; ?>" readonly>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Grade and Section</label>
              <input type="text" class="form-control form-control-sm"  placeholder="Suffix name" name="suffix" onkeyup="lettersOnly(this)" value="<?php echo $row['grade']; ?> <?php echo $row['strand']; ?> - <?php echo $row['section']; ?>" readonly>
            </div>
          </div>
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-gradient-primary" data-dismiss="modal" data-toggle="modal" data-target="#update<?php echo $row['student_Id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Update</button>
      </div>
    </div>
  </div>
</div>




<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['student_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Update student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <input type="hidden" class="form-control" value="<?php echo $row['student_Id']; ?>" name="student_Id">
          <div class="col-lg-12">
              <div class="form-group">
                <label>Learner's Reference Number (LRN)</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Learner's Reference Number (LRN)" name="lrn" required value="<?php echo $row['LRN']; ?>">
              </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control form-control-sm"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)" value="<?php echo $row['firstname']; ?>">
              </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
                <label>Middle name</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Middle name" name="middlename" required onkeyup="lettersOnly(this)" value="<?php echo $row['middlename']; ?>">
            </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)" value="<?php echo $row['lastname']; ?>">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Suffix name</label>
              <input type="text" class="form-control form-control-sm"  placeholder="Suffix name" name="suffix" onkeyup="lettersOnly(this)" value="<?php echo $row['suffix']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Gender</label>
              <select class="form-control form-control-sm" name="gender" required>
                <option value="Male"   <?php if($row['gender'] == 'Male')   { echo 'selected'; } ?>>Male</option>
                <option value="Female" <?php if($row['gender'] == 'Female') { echo 'selected'; } ?>>Female</option>
              </select>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="form-group">
              <label>Grade level - Strand</label>
              <select class="form-control form-control-sm" name="grade" required onchange="updatefetchsamesection(this.value)">
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
              <select class="form-control form-control-sm" name="section" required id="updatesection">
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
                <input type="file" class="form-control-file form-control-sm" name="fileToUpload">
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_student" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>







<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['student_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Delete student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['student_Id']; ?>" name="student_Id">
          <h6 class="text-center">Delete student's record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_student"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>



<!-- VIEW QR CODE -->
<div class="modal fade" id="qr<?php echo $row['student_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-qrcode"></i> Student's QR Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12 d-flex justify-content-center">
            <img src="../images-qr-codes/<?php echo $row['qr_image']; ?>" alt="" width="400">
        </div>
      </div>
      <div class="modal-footer alert-light d-flex justify-content-center">
        <a href="../images-qr-codes/<?php echo $row['qr_image']; ?>" type="button" class="btn bg-gradient-primary" download><i class="fa-solid fa-download"></i> Download</a>
      </div>
    </div>
  </div>
</div>



<!-- RESTORE RECORD -->
<div class="modal fade" id="restore<?php echo $row['student_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Restore student's record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['student_Id']; ?>" name="student_Id">
          <h6 class="text-center">Restore student's record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="restore_student"><i class="fa-solid fa-window-restore"></i> Restore</button>
      </div>
        </form>
    </div>
  </div>
</div>



<!-- DELETE -->
<div class="modal fade" id="permanentdelete<?php echo $row['student_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Delete student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['student_Id']; ?>" name="student_Id">
          <h6 class="text-center">Delete student's record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="permanent_delete_student"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
