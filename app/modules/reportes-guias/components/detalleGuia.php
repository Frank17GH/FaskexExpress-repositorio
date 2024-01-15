<?php foreach ($dt1 as $dta1): ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>DETALLE DE LA GUÍA ELECTRÓNICA</b></h4>
</div>

<div class="modal-body"><div class="row">
	<form id="frm12">
		<div class="col-md-12">
			<div role="content">
				<div class="panel panel-default">
	                <div class="panel-body" style="padding-bottom: 0px; padding-top: 2px;">
	                    <legend><b>ORIGEN</b></legend>
	                    <div class="col-md-12">
	                        <b><?php echo $dta1['origenDoc'] ?></b> - <?php echo $dta1['origenNombre'] ?><br><hr>
	                        <center><b><?php echo $dta1['ubi_origen'] ?></b></center>
	                        
	                    </div>
	                    <br><br>
	                    <legend><b>DESTINO</b></legend>
	                    <div class="col-md-12">
	                        <b><?php echo $dta1['destinoDoc'] ?></b> - <?php echo $dta1['destinoNombre'] ?><br><hr>
	                        <center><b><?php echo $dta1['ubi_destino'] ?></b></center>
	                        
	                    </div>
	                </div><br>
	            </div>
				<table class="table" id="tabprod">
					<thead>
						<tr class="encabezado">
							<th style="width:100%;"><center>DESCRIPCIÓN</center></th>
							<th><center>CANT.</center></th>
							<th><center>PRECIO</center></th>
							<th style="width: 5px;"><center>Acc</center></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($dt2 as $dta2): ?>
							<tr>
								<td style="vertical-align: middle;">
									<?php echo $dta2['nombre'] ?>
								</td>
								<td style="vertical-align: middle;">
									<?php echo number_format($dta2['cantidad'], 2) ?>
								</td>
								<td>
									<input type="text" id="a<?php echo $dta2['id'] ?>" class="form-control" value="<?php echo $dta2['flete']; ?>">
									
								</td>
								<td>
									<button type="button" class="btn btn-info" onclick="vAjax('rep_guias','actDetalle','<?php echo $dta2['id']; ?>-/' + $('#a<?php echo $dta2['id']; ?>').val())">
										<i class="fa fa-save"></i>
									</button>
								</td>
						    </tr>
				        <?php endforeach;?>
					</tbody>  
				</table>
			</div>
		</div>
	</form>
</div>
<div class="modal-footer">
	<?php 
		if (!$dta1['SUNAT']) {
			?>
				<label class="col-md-3 control-label" style="text-align: left; margin-top: -10px">
					<button class="btn btn-danger" onclick="confir('Confirmacion de anulación!','¿Seguro que deseas anular este comprobante?','rep_ventas','anular',<?php echo $dta1['idd'] ?>)">
						<i class="fa fa-remove"></i>
						<b>ELIMINAR</b>
					</button>				
				</label>
			<?php
		}
	?>
	
	<label class="col-md-3 control-label" style="text-align: left; margin-top: -10px">
		<button class="btn btn-info" onclick="vAjax('documentos','printGuia',<?php echo $dta1['id'] ?>)">
			<i class="fa fa-print"></i>
			<b>IMPRIMIR</b>
		</button>
	</label>
	<?php 
		if ($dta1['facturado']) {
			?>
				<label class="col-md-3 control-label" style="text-align: left; margin-top: -10px">
					<button class="btn btn-success" onclick="vAjax('documentos','printCpe', <?php echo $dta1['facturado'] ?>)">
						<i class="fa fa-print"></i>
						<b>Imprimir Factura</b>
					</button>				
				</label>
			<?php
		}
	?>
	<button class="btn btn-default" onclick="$('#myModal').modal('hide');">
		<b>CERRAR</b>
	</button>
</div>
<script>$('#myModal2').on('shown.bs.modal', function() {$('#dtruc').select()});</script>
<?php endforeach; ?>

<script>
	function redirect_by_post(purl, pparameters, in_new_tab) {
    	pparameters = (typeof pparameters == 'undefined') ? {} : pparameters;
    	in_new_tab = (typeof in_new_tab == 'undefined') ? true : in_new_tab;
	    var form = document.createElement("form");
   		$(form).attr("id", "reg-form").attr("name", "reg-form").attr("action", purl).attr("method", "post").attr("enctype", "multipart/form-data");
    	if (in_new_tab) {
        	$(form).attr("target", "_blank");
    	}
    	$.each(pparameters, function(key) {
        	$(form).append('<input type="text" name="' + key + '" value="' + this + '" />');
    	});
    	document.body.appendChild(form);
    	form.submit();
    	document.body.removeChild(form);
	    return false;
	}
	function desc(ab){
 		redirect_by_post('http://www.intra.byproyet.com/app/modules/envio/cpe/libs/desc4.php', {
        	data: ab
    	}, true);
	}
	function desPDF(ab){
		redirect_by_post('http://www.intra.byproyet.com/app/modules/envio/cpe/libs/iPDF4.php', {
        	data: ab
    	}, true);

	}
</script>