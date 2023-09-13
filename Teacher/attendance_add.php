<!-- SCAN QR CODE -->
<div class="modal fade" id="add_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-qrcode"></i> Scan QR Code here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" onclick="refreshPage()"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <video id="preview" width="100%" height="80%"></video>
        <div class="row d-flex justify-content-center mt-3">
          <button class="btn bg-gradient-primary"><i class="fa-solid fa-camera"></i> TAP HERE</button>
        </div>
      </div>
      <div class="modal-footer alert-light">
      </div>
      </div>
    </div>
  </div>
</div>
