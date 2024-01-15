<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel">RENDICION DE EGRESO</h6>
</div>

<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
	            <form id="frm4">
	            	<input type="hidden" value="<?php echo explode('-/', $s02)[0] ?>" name="id">
	                <div class="col-md-6">
		                <label><b>Monto DADO</b></label>
		                <input type="text" class="form-control" style="text-align: right;" name="" value="<?php echo number_format(explode('-/', $s02)[1],2) ?>" readonly>
					</div>
		            <div class="col-md-6">
		                <label><b>Monto GASTADO</b></label>
		                <input type="text" class="form-control" style="text-align: right;" name="real" value="<?php echo str_replace(',', '',number_format(explode('-/', $s02)[1],2))  ?>">
					</div>
					<div class="col-md-12"><br></div>
					<div class="col-md-12" style="text-align: center; display: none">
						<a class="btn btn-primary btn-sm" href="javascript:void(0);" onclick="vAjax('caja','mod7',0,'modal2');">Agregar Comprobante</a>
					</div>
					<div class="col-md-6">
		                <label><b>Tipo de comprobante</b></label>
		                <select class="form-control" name="tipo">
		                	<option value="02">Recibo</option>
		                	<option value="03">Boleta</option>
		                	<option value="01">Factura</option>
		                </select>
					</div>
					<div class="col-md-6">
		                <label><b>Nro. Comprobante</b></label>
		                <input type="text" class="form-control" name="ser">
					</div>

	            </form>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-info" type="button" onclick="vAjax('caja','insert2','frm4')">
		<i class="fa fa-save"></i>
		<b> GUARDAR</b>
	</button>					
	<button class="btn btn-default" data-dismiss="modal">
		<b>CERRAR</b>
	</button>
</div>