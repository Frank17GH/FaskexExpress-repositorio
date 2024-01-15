
<div class="modal-content" id="div-modal"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h6 class="modal-title" id="myModalLabel"><b>NUEVO SERVICIO</b></h6>
	</div>
	<div class="modal-body">
		<div class="row">
			<form id="frms" class="form-horizontal">
				<div class="col-md-12">
					<div class="col-md-8">
						<label><b></b>DESCRIPCIÓN</label>
						<input name="des" class="form-control" required="">
					</div>
					<div class="col-md-4">
						<label><b></b>ESTADO</label>
						<select class="form-control" name="est">
							<option value="1" selected="">ACTIVO</option>
							<option value="0">INACTIVO</option>
						</select>
					</div>
				</div>
        	</form>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" onclick="vAjax('configuracion-cotizacion','insert3','frms')">
			<i class="fa fa-check"></i> Guardar
		</button>
		<button class="btn btn-default" onclick="$('.edit').hide();$('.view').show()">
			<i class="fa fa-remove"></i> Cancelar
		</button>
	</div>
</div>