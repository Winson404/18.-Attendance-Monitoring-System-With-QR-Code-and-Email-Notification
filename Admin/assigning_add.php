<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Assign teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
        <div class="row">

          <div class="col-lg-12">
            <div class="form-group">
              <label>Teacher's name</label>
              <select class="form-control form-control-sm" name="teacher" required>
                <option selected disabled>Select teacher</option>
                <?php 
                  $fetch = mysqli_query($conn, "SELECT * FROM users WHERE DELETED='False' AND user_type='User'");
                  while ($row = mysqli_fetch_array($fetch)) {
                ?>
                <option value="<?php echo $row['user_Id']; ?>"><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Strand - Section</label>
              <select class="form-control form-control-sm" name="strand_section" onchange="fetchsubject(this.value)" required>
                <option selected disabled>Select section</option>
                <?php 
                  $fetch = mysqli_query($conn, "SELECT * FROM section JOIN grade ON section.section_grade_Id=grade.grade_Id ORDER BY grade");
                  while ($row = mysqli_fetch_array($fetch)) {
                ?>
                <option value="<?php echo $row['section_Id']; ?>"><?php echo ' '.$row['grade'].' '.$row['strand'].' - '.$row['section'].' '; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Subject</label>
              <select class="form-control form-control-sm" name="subject" required id="subject">
                <option selected disabled>Select subject</option>
              </select>
            </div>
          </div>
          

          <div class="col-lg-6">
              <div class="form-group">
                <label>Start time</label>
                <input type="time" class="form-control form-control-sm"  placeholder="Start time" name="startime" required>
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>End time</label>
              <input type="time" class="form-control form-control-sm"  placeholder="End time" name="endtime" required>
            </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>Day</label>
                <select class="form-control form-control-sm" name="day" required>
                <option selected disabled>Select day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
              </select>
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="save_assign_teacher"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


 

<script>
    function fetchsubject(section_Id){ 
    $('#subject').html('');
    $.ajax({
    type:'post',
    url: 'ajaxdata.php',
    data : { section_Id : section_Id}, 
    success : function(data){
    $('#subject').html(data);
    }
    })
    }
</script>



