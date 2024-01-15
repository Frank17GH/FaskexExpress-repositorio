<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h2 class="modal-title" id="myModalLabel"><b><center>Editar Guia</center></b></h2>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div class="page sview2" style=""> 
				<div class="panel panel-default">
					<?php foreach ($dt1 as $cdata): ?>
					<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
						<form action="javascript: vAjax('guia_varias','actGuia','frm_actguia');" id="frm_actguia">
							<div class="form-group col-md-12" style="margin-bottom: 3px;">
								<div class="col-md-1"></div>
								<input type="hidden" name="id" value="<?php echo $s02; ?>">
								<label class="col-md-2 control-label"><b>Descripcion</b></label>
								<div class="col-md-9">
									<input class="form-control input-xs" name="descrip" required="" value="<?php echo $cdata[0] ?>">
								</div>
							</div>
							<div class="form-group col-md-12" style="margin-bottom: 3px;">
								<div class="col-md-1"></div>
								<label class="col-md-2 control-label"><b>Flete</b></label>
								<div class="col-md-4">
									<input class="form-control input-xs" type="input" name="flete"  step="0.01" required="" value="<?php echo number_format($cdata[flete],2) ?>">
								</div>
								<div class="col-md-5"></div>
							</div>
							<div class="form-group col-md-12" style="margin-bottom: 3px;">
								<div class="col-md-3"></div>
								<div class="col-md-2">
									<button type="submit" class="btn btn-xs btn-success">Actualizar</button>
								</div>
							</div>
						</form>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">
			Cerrar Ventana
		</button>
		
	</div>
</div>