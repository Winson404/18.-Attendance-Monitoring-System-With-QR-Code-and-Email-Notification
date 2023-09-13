<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['subject_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Update subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['subject_Id']; ?>" name="subject_Id">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label>Grade level</label>
              <select class="custom-select custom-select-sm" name="grade" required>
              <?php                           
                  $subject_grade_Id = $row['subject_grade_Id'];
                  $grade  = mysqli_query($conn, "SELECT * FROM grade ORDER BY grade");
                  while($row_grade = mysqli_fetch_array($grade)) {
              ?>
                  <option value="<?php echo $row_grade['grade_Id']; ?>" <?php if($row_grade['grade_Id'] == $subject_grade_Id) { echo 'selected'; } ?>> <?php echo ''.$row_grade['grade'].' - '.$row_grade['strand'].''; ?></option>
                   <?php } ?>
               </select>
            </div>
          </div>

          <div class="col-lg-12">
              <div class="form-group">
                <label>Subject name</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Subject name" name="subject" value="<?php echo $row['subject']; ?>" required>
              </div>
          </div>
          
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_subject"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['subject_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-book"></i> Delete subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['subject_Id']; ?>" name="subject_Id">
          <h6 class="text-center">Delete subject record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_subject"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>