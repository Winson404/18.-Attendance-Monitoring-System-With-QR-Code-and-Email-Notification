

<!-- ****************************************************CREATE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i> Add section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label>Grade level</label>
              <select class="form-control form-control-sm" name="grade" required>
                <option selected disabled>Select grade level</option>
                <?php 
                  $fetch = mysqli_query($conn, "SELECT * FROM grade ORDER BY grade");
                  while ($row = mysqli_fetch_array($fetch)) {
                ?>
                <option value="<?php echo $row['grade_Id']; ?>"><?php echo''. $row['grade'].' - '. $row['strand'].''; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Section</label>
               <select class="form-control form-control-sm" name="section" required>
                <option selected disabled>Select section</option>
                <option value="AGUILAR">AGUILAR</option>
                <option value="BIYO">BIYO</option>
                <option value="SAN JUAN">SAN JUAN</option>
                <option value="HENOSA">HENOSA</option>
                <option value="FLORES">FLORES</option>
                <option value="DELMUNDO">DELMUNDO</option>
                <option value="RIZAL">RIZAL</option>
                <option value="TRINIDAD">TRINIDAD</option>
                <option value="BENITEZ">BENITEZ</option>
                <option value="Ciron Sr.">Ciron Sr.</option>
                <option value="QUISUMBING">QUISUMBING</option>
                <option value="ESGUERRA">ESGUERRA</option>
                <option value="PALMA">PALMA</option>
              </select>
            </div>
          </div>
          
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="save_section"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

