<!-- ADD GRADE LEVEL -->
<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-puzzle-piece"></i>Add grade level</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
         <div class="form-group">
            <label>Grade level</label>
            <select class="form-control form-control-sm" name="grade" required>
              <option selected disabled>Select grade level</option>
              <option value="Grade 11">Grade 11</option>
              <option value="Grade 12">Grade 12</option>
            </select>
         </div>
        <div class="form-group">
            <label>SHS Strand</label>
             <select class="form-control form-control-sm" name="strand" required>
              <option selected disabled>Select strand</option>
              <option value="STEM">STEM</option>
              <option value="HUMSS">HUMSS</option>
              <option value="TVL AFA">TVL AFA</option>
              <option value="TVL HE">TVL HE</option>
            </select>
        </div>
        <div class="form-group">
          <label>Description/Meaning</label>
          <textarea class="form-control form-control-sm" name="description" cols="30" rows="5" placeholder="Description/Meaning"></textarea>
        </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="create_grade"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

