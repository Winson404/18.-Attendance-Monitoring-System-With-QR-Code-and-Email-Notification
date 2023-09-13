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



