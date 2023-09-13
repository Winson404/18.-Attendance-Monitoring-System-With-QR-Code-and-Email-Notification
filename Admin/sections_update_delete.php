<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['section_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Update section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['section_Id']; ?>" name="section_Id">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label>Grade level</label>
              <select class="custom-select custom-select-sm" name="grade" required>
              <?php                           
                  $section_grade_Id = $row['section_grade_Id'];
                  $grade  = mysqli_query($conn, "SELECT * FROM grade ORDER BY grade");
                  while($row_grade = mysqli_fetch_array($grade)) {
              ?>
                  <option value="<?php echo $row_grade['grade_Id']; ?>" <?php if($row_grade['grade_Id'] == $section_grade_Id) { echo 'selected'; } ?>> <?php echo ''.$row_grade['grade'].' - '.$row_grade['strand'].' '; ?></option>
                   <?php } ?>
               </select>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
              <label>Section</label>
               <select class="form-control form-control-sm" name="section" required>
                <option selected disabled>Select section</option>
                <option value="AGUILAR"    <?php if($row['section'] == 'AGUILAR')   { echo 'selected'; } ?> >AGUILAR</option>
                <option value="BIYO"       <?php if($row['section'] == 'BIYO')      { echo 'selected'; } ?> >BIYO</option>
                <option value="SAN JUAN"   <?php if($row['section'] == 'SAN JUAN')  { echo 'selected'; } ?> >SAN JUAN</option>
                <option value="HENOSA"     <?php if($row['section'] == 'HENOSA')    { echo 'selected'; } ?> >HENOSA</option>
                <option value="FLORES"     <?php if($row['section'] == 'FLORES')    { echo 'selected'; } ?> >FLORES</option>
                <option value="DELMUNDO"   <?php if($row['section'] == 'DELMUNDO')  { echo 'selected'; } ?> >DELMUNDO</option>
                <option value="RIZAL"      <?php if($row['section'] == 'RIZAL')     { echo 'selected'; } ?> >RIZAL</option>
                <option value="TRINIDAD"   <?php if($row['section'] == 'TRINIDAD')  { echo 'selected'; } ?> >TRINIDAD</option>
                <option value="BENITEZ"    <?php if($row['section'] == 'BENITEZ')   { echo 'selected'; } ?> >BENITEZ</option>
                <option value="Ciron Sr."  <?php if($row['section'] == 'Ciron Sr.') { echo 'selected'; } ?> >Ciron Sr.</option>
                <option value="QUISUMBING" <?php if($row['section'] == 'QUISUMBING'){ echo 'selected'; } ?> >QUISUMBING</option>
                <option value="ESGUERRA"   <?php if($row['section'] == 'ESGUERRA')  { echo 'selected'; } ?> >ESGUERRA</option>
                <option value="PALMA"      <?php if($row['section'] == 'PALMA')     { echo 'selected'; } ?> >PALMA</option>
              </select>
            </div>
          </div>
          
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_section"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['section_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Delete section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['section_Id']; ?>" name="section_Id">
          <h6 class="text-center">Delete section record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_section"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>