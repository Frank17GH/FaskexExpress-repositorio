<div class="modal-header">
	 <h4 class="modal-title"><i class='subheader-icon fal fa-align-justify'></i> Registros</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fal fa-times"></i></span>
    </button>
</div>

<div class="modal-body">	
<!-- Registro-->				
	<div  id="div-frm_dtransaccion"></div>
	<div  id="div-tbl_dtransaccion"><script>vAjax('transaccion','tra_tabla',<?php echo $s02 ?>,'tbl_dtransaccion');</script></div>
</div>				
