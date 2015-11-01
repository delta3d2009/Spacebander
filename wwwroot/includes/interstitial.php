<?php
echo "
<!-- Intersitial Modal -->
<div class='modal fade' id='modal-screen'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title'>Physician sucessfully registered.</h4>
      </div>
      <div class='modal-body'>
        <p>Physician information was saved into Data Base.</p>
        <p>For Searching, Editing or Removing use other tabs.</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn-orange' data-dismiss='modal'>Close</button>
       <button type='button' class='btn-green'>Accept</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#modal-screen' id='launch-modal'>Launch demo modal</button>
";
?>