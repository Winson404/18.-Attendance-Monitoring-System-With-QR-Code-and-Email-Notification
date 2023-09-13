<!-- UPDATE GRADE LEVEL -->
<div class="modal fade" id="update<?php echo $row['grade_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i>Update grade level</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['grade_Id']; ?>" name="grade_Id">
        <div class="form-group">
            <label>Grade level</label>
            <select class="form-control form-control-sm" name="grade" required>
               <option value="Grade 11" <?php if($row['grade'] == 'Grade 11') { echo 'selected'; } ?>>Grade 11</option>
               <option value="Grade 12" <?php if($row['grade'] == 'Grade 12') { echo 'selected'; } ?>>Grade 12</option>
            </select>
        </div>
        <div class="form-group">
            <label>SHS Strand</label>
             <select class="form-control form-control-sm" name="strand" required>
              <option selected disabled>Select strand</option>
              <option value="STEM"    <?php if($row['strand'] == 'STEM')   { echo 'selected'; } ?> >STEM</option>
              <option value="HUMSS"   <?php if($row['strand'] == 'HUMSS')  { echo 'selected'; } ?> >HUMSS</option>
              <option value="TVL AFA" <?php if($row['strand'] == 'TVL AFA'){ echo 'selected'; } ?> >TVL AFA</option>
              <option value="TVL HE"  <?php if($row['strand'] == 'TVL HE') { echo 'selected'; } ?> >TVL HE</option>
            </select>
        </div>
        <div class="form-group">
          <label>Description/Meaning</label>
          <textarea class="form-control form-control-sm" name="description" cols="30" rows="5" placeholder="Description/Meaning"><?php echo $row['description']; ?></textarea>
        </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_grade"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>


<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['grade_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Delete grade level</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['grade_Id']; ?>" name="grade_Id">
          <h6 class="text-center">Delete grade level?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_grade"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
