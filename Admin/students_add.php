

<!-- ****************************************************CREATE*********************************************************************** -->
<!-- Modal -->
<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Add student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
        <div class="row">

          <!-- LOAD IMAGE PREVIEW -->
          <div class="col-lg-12 mb-2">
              <div class="form-group" id="preview">
              </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>Learner's Reference Number (LRN)</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Learner's Reference Number (LRN)" name="LRN" required>
              </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control form-control-sm"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)">
              </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
                <label>Middle name</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Middle name" name="middlename" required onkeyup="lettersOnly(this)">
            </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control form-control-sm"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Suffix name</label>
              <input type="text" class="form-control form-control-sm"  placeholder="Suffix name" name="suffix" onkeyup="lettersOnly(this)">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Gender</label>
              <select class="form-control form-control-sm" name="gender" required>
                <option selected disabled>Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="form-group">
              <label>Grade level - Strand</label>
              <select class="form-control form-control-sm" name="grade" required onchange="fetchsamesection(this.value)">
                <option selected disabled>Select grade level</option>
                <?php 
                  $fetch = mysqli_query($conn, "SELECT * FROM grade ORDER BY grade");
                  while ($row = mysqli_fetch_array($fetch)) {
                ?>
                <option value="<?php echo $row['grade_Id']; ?>"><?php echo ''.$row['grade'].' - '.$row['strand'].''; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="form-group">
              <label>Section</label>
              <select class="form-control form-control-sm" name="section" required id="section">
                <option selected disabled>Select section</option>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file form-control-sm" name="fileToUpload" onchange="getImagePreview(event)" required>
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="save_student"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


 

<script>
    function fetchsamesection(grade_Id){ 
    $('#section').html('');
    $.ajax({
    type:'post',
    url: 'ajaxdata.php',
    data : { section : grade_Id}, 
    success : function(data){
    $('#section').html(data);
    }
    })
    }
</script>


<script>
   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }
   
    function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }

</script>
<!-- ****************************************************END CREATE*********************************************************************** -->


