<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title"><b>Facturar Guía</b></h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" id="frmListarGuias" method="post">
						<input type="hidden" name="id" value="<?php echo $s02 ?>">
						<fieldset>
						<div class="col-md-4">
							<b>Estado</b>
							<select class="form-control" name="estado" onchange="vAjax('guias_remision','tabla1','frmListarGuias','guialistar')">
		                        <option value="0">Todos los estados</option>
		                        <option value="3" >En Agencia</option>
		                        <option value="4" selected="">Entregado</option>
		                        <option value="2">En Ruta</option>
		                        <option value="1">Por Cargar</option>
		                    </select>
						</div>
						<div class="col-md-4">
							<b>Desde</b>
							<input type="date"  class="form-control" value="<?php echo date('Y-m-d') ?>" onchange="vAjax('guias_remision','tabla1','frmListarGuias','guialistar')">
						</div>
						<div class="col-md-4">
							<b>Hasta</b>
							<input type="date" class="form-control"  value="<?php echo date('Y-m-d') ?>" onchange="vAjax('guias_remision','tabla1','frmListarGuias','guialistar')">
						</div>
						<div class="col-md-12">
							<hr>
						</div>
						<div class="col-md-12">
							<div class="widget-body no-padding" id="div-guialistar">
                            </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default" onclick="$('#myModal2').modal('hide');">CERRAR</button>
	</div>
</div>
<script>
    vAjax('guias_remision','tabla1','frmListarGuias','guialistar');
</script>