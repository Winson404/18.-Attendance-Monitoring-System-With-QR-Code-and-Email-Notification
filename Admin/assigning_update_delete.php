<!-- UDPATE -->
<div class="modal fade" id="update<?php echo $row['assign_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Update assign teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <input type="hidden" class="form-control" value="<?php echo $row['assign_Id']; ?>" name="assign_Id">
          <div class="col-lg-12">
            <div class="form-group">
              <label>Teacher's name</label>
              <select class="form-control form-control-sm" name="teacher" required>
                <option selected disabled>Select teacher</option>
                <?php 
                  $a = $row['assign_user_Id'];
                  $sql = mysqli_query($conn, "SELECT * FROM users WHERE DELETED='False' AND user_type='User'");
                  while ($row_teacher = mysqli_fetch_array($sql)) {
                ?>
                <option value="<?php echo $row_teacher['user_Id']; ?>" <?php if($row_teacher['user_Id'] == $a) { echo 'selected'; } ?>><?php echo ' '.$row_teacher['firstname'].' '.$row_teacher['middlename'].' '.$row_teacher['lastname'].' '.$row_teacher['suffix'].' '; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Strand - Section</label>
              <select class="form-control form-control-sm" name="strand_section"  required onchange="get_sectionId(this.value)">
                <option selected disabled>Select section</option>
                <?php 
                  $a = $row['assign_section_Id'];
                  $get_section = mysqli_query($conn, "SELECT * FROM section JOIN grade ON section.section_grade_Id=grade.grade_Id ORDER BY grade");
                  while ($row_section = mysqli_fetch_array($get_section)) {
                ?>
                <option value="<?php echo $row_section['section_Id']; ?>" <?php if($row_section['section_Id'] == $a) { echo 'selected'; } ?>><?php echo ' '.$row_section['grade'].' '.$row_section['strand'].' - '.$row_section['section'].' '; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Subject</label>
              <select class="form-control form-control-sm" name="subject" required id="subject_Id">
                <option selected disabled>Select subject</option>
                <?php 
                  $b = $row['assign_subject_Id'];
                  $list = mysqli_query($conn, "SELECT * FROM subject JOIN grade ON subject.subject_grade_Id=grade.grade_Id");
                  while ($row_subject = mysqli_fetch_array($list)) {
                ?>
                <option value="<?php echo $row_subject['subject_Id']; ?>" <?php if($row_subject['subject_Id'] == $b) { echo 'selected'; } ?>><?php echo ' '.$row_subject['grade'].' - '.$row_subject['subject'].' '; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
              <div class="form-group">
                <label>Start time</label>
                <input type="time" class="form-control form-control-sm"  placeholder="Start time" name="startime" required value="<?php echo $row['start_time']; ?>">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>End time</label>
              <input type="time" class="form-control form-control-sm"  placeholder="End time" name="endtime" required value="<?php echo $row['end_time']; ?>">
            </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>Day</label>
                <select class="form-control form-control-sm" name="day" required>
                <option selected disabled>Select day</option>
                <option value="Monday"   <?php if($row['day'] == 'Monday') { echo 'selected'; } ?> >Monday</option>
                <option value="Tuesday"  <?php if($row['day'] == 'Tuesday') { echo 'selected'; } ?> >Tuesday</option>
                <option value="Wednesday"<?php if($row['day'] == 'Wednesday') { echo 'selected'; } ?> >Wednesday</option>
                <option value="Thursday" <?php if($row['day'] == 'Thursday') { echo 'selected'; } ?> >Thursday</option>
                <option value="Friday"   <?php if($row['day'] == 'Friday') { echo 'selected'; } ?> >Friday</option>
              </select>
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_assign_teacher"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
    function get_sectionId(subject_Id){ 
    $('#subject_Id').html('');
    $.ajax({
    type:'post',
    url: 'ajaxdata.php',
    data : { subject_Id : subject_Id}, 
    success : function(data){
    $('#subject_Id').html(data);
    }
    })
    }
</script>





<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['assign_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Delete assigned teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['assign_Id']; ?>" name="assign_Id">
          <h6 class="text-center">Delete assigned teacher's record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_assigned"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>