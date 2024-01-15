
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel">NUEVO COMPROBANTE</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
            <form id="inspr">
                <input type="hidden" value="2" name="tp">
                <input type="hidden" value="1" name="tpp">
                <div style="display: " id="dtprod">
                	<div class="col-md-4">
                    	<label><b>RUC</b></label>
                        <input type="number" placeholder="DNI/RUC " autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="numDni"  onkeydown=" if (event.keyCode === 13){FClient(0);return false;}">
                    </div>
                    <div class="col-md-8">
                    	<label><b>PROVEEDOR</b></label>
                        <input class="form-control input-xs" id="nomClient" placeholder="Nombre Cliente" type="text" readonly="">
                    </div>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-6">
                        <label><b>TIPO DE COMPROBANTE</b></label>
                        <select class="form-control input-xs">
                            <option>FACTURA</option>
                            <option>BOLETA</option>
                            <option>RECIBO POR HONORARIO</option>
                            <option>NOTA DE VENTA</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label><b>SERIE</b></label>
                       <input type="text" class="form-control input-xs" style="text-align: center;" placeholder="#### - #">
                    </div>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-12">
                       <textarea class="form-control input-xs" placeholder="GLOSA"></textarea>
                    </div>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                    	<input type="text" style="text-align: right;" placeholder="TOTAL" class="form-control input-xs">
                    </div>
                   
                </div>
            </form>
       </div>
	</div>
	
</div><div class="modal-footer" style="text-align: center;">
		<button class="btn btn-default"  data-dismiss="modal">CANCELAR</button>
		<button class="btn btn-primary" type="button" onclick="vAjax('caja','apCaja',<?php echo $s02 ?>);">
			<i class="fa fa-save"></i>
			GUARDAR
		</button>
	</div>
<script>$('#idusu').val('<?php echo $_SESSION['fasklog']['pe_apellidos'].', '.$_SESSION['fasklog']['pe_nombres'] ?>')</script>