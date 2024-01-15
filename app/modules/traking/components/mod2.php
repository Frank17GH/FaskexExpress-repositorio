
<div class="modal-header" style="    padding: 10px;">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title">DETALLE DE ENTREGA DE SOBRE/PAQUETE</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<form class="form-horizontal" action="javascript: vAjax('traking','entregado','frm10'); " id="frm10">
					<input type="hidden" value="<?php echo $s02 ?>" name="id">
					<fieldset>
						<div class="form-group">
							<div class="col-md-8">
								<label><b>CONSIGNADO</b></label>
								<input type="text" class="form-control" name="" value="<?php echo $dt1[0]['de_nombre'] ?>" readonly="">
							</div>
							<div class="col-md-4">
								<label><b>DNI</b></label>
								<input type="text" class="form-control" name="" value="<?php echo $dt1[0]['de_ruc'] ?>" style="text-align: center;" readonly="">
							</div>
							<div class="col-md-12" style="margin-top: 8px"></div>
							<div class="col-md-4">
								<label><b>FECHA</b></label>
								<input type="date" style="text-align: center;" class="form-control" name="fecha" value="<?php echo date('Y-m-d',strtotime($dt1[0]['fecha_entrega'])) ?>" readonly>			
							</div>
							<div class="col-md-4">
								<label><b>HORA</b></label>
								<input type="time" style="text-align: center;" class="form-control" value="<?php echo date('H:i:s',strtotime($dt1[0]['fecha_entrega'])) ?>" name="hora" readonly>			
							</div>
							<div class="col-md-4">
								<label><b>REMITO</b></label>
								<input type="text" class="form-control" style="text-align: center;" value="<?php echo str_pad($dt1[0]['iddet'], 8, "0", STR_PAD_LEFT); ?>" readonly>
							</div>
							<div class="col-md-12"><br></div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
</div>
<div class="modal-footer">
	<button class="btn btn-default"  data-dismiss="modal"><b>CERRAR</b></button>
</div>