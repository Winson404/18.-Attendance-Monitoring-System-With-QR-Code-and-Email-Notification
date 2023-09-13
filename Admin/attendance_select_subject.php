<div class="modal fade" id="selectsection<?php echo $row['section_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header bg-light">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Subject Selection</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
          </button>
        </div>
        <div class="modal-body">
             <div class="col-lg-12">
             <div class="form-group">
              <form method="POST" action="process_save.php">
                <input type="hidden" class="form-control" value="<?php echo $row['section_Id']; ?>" required name="section_Id">
                <label class="text-dark">Select subject first:</label>
                <select class="form-control" name="assignId" style="width: 100%;" required>
                <!-- <select class="select2" multiple="multiple" data-placeholder="Shelf location" style="width: 100%;" name="shelf-location"> -->
                    <option selected disabled value="">Select subject</option>
                    <?php  
                        $s_Id = $row['section_Id'];
                        $fetches = mysqli_query($conn, "SELECT * FROM assign JOIN subject ON assign.assign_subject_Id=subject.subject_Id JOIN grade ON subject.subject_grade_Id=grade.grade_Id WHERE assign.assign_section_Id='$s_Id' GROUP BY assign_subject_Id ");
                        while($rr = mysqli_fetch_array($fetches)) {
                    ?>
                    <option value="<?php echo $rr['assign_Id']; ?>"><?php echo ''.$rr['grade'].' '.$rr['strand'].' - '.$rr['subject'].''; ?></option>
                    <?php } ?>
                </select>
            </div>
           
          </div>
        </div>
        <div class="modal-footer alert-light">
          <button type="submit" class="btn btn-primary" name="getsection_Id_And_Assign_Id">Proceed</button>
        </div>
         </form>
      </div>
    </div>
  </div>
