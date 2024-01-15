
<div class="modal-header" style="    padding: 10px;">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title">ENTREGA DE SOBRE/PAQUETE</h4>
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
								<input type="text" class="form-control" name="" value="<?php echo $dt1[0]['de_ruc'] ?>" readonly="">
							</div>
							<div class="col-md-12" style="margin-top: 8px"></div>
							<div class="col-md-4">
								<label><b>FECHA</b></label>
								<input type="date" style="text-align: center;" class="form-control" name="fecha" value="<?php echo date('Y-m-d') ?>">			
							</div>
							<div class="col-md-4">
								<label><b>HORA</b></label>
								<input type="time" style="text-align: center;" class="form-control" value="<?php echo date('H:i:s') ?>" name="hora">			
							</div>
							<div class="col-md-4">
								<label><b>REMITO</b></label>
								<input type="text" class="form-control" style="text-align: center;" value="<?php echo str_pad($dt1[0]['iddet'], 8, "0", STR_PAD_LEFT); ?>" readonly>
							</div>
							<div class="col-md-12"><br></div>
							<div class="col-md-3"></div>
							<div class="col-md-6" style="text-align: center;">

								<span class="btn btn-default input-sm" style="width: 100%">
		                            <i class="fa fa-file-image-o"></i> Subir Captura
		                            <!--  capture="camera" accept="image/*" -->
		                            <input type='file' id="imgInp" name="archivo" style="width:100%;height:100%;position:absolute;top:0;left:0;opacity:0;cursor:pointer;" />
		                        </span>
							</div>
							<div class="col-md-3"></div>
							<div class="col-md-12"><br></div>
							<?php 
								if ($dt1[0]['co_tipo_pago']==4) {
									?>
										<div class="col-md-12">
											<a class="btn btn-danger btn-sm" style="width: 100%" href="javascript:void(0);">PAGO DESTINO DE S/. <?php echo number_format($dt1[0]['co_total'],2) ?></a>
										</div>
										<input type="hidden" value="1" name="cajj">
										<div class="col-md-12"><br></div>
									<?php
								}else{
									?>
										<input type="hidden" value="0" name="cajj">
									<?php
								}
							?>
							
							
							<?php 
								if ($dt1[0]['de_tipo_entrega']!=1) {
									?>
										<div class="col-md-3"></div>
					                    <div class="col-md-6">
					                    	<center><legend>CLAVE DE RECOJO</legend></center>
											<div class="input-group input-group-lg">
												
												<div class="icon-addon addon-lg">
													<input type="password" onclick="$(this).select()" style="text-align: center;" class="form-control" id="codver" autocomplete="off">
													<label for="email" class="fa fa-keyboard-o" rel="tooltip" title="" data-original-title="email"></label>
												</div>
												<span class="input-group-btn">
													<button class="btn btn-default" type="button" onclick="vAjax('traking','verifica','<?php echo $s02 ?>-/'+$('#codver').val(),'vveri')">Verificar!</button>
												</span>
											</div>
										</div>
					                    <div class="col-md-3"></div>
									<?php
								}else{
									?><input type="hidden" id="cdver" value="1"><?php
								}
							?>
							
		                    <div class="col-md-12" id="div-vveri"></div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
</div>
<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="savTrack();">
			<i class="fa fa-save"></i>
			Guardar
		</button>
	</div>
<script type="text/javascript">
	$('#codver').select();
	function savTrack(){
		if ($('#cdver').val()) {
			vAjax('traking','entregado','frm10');
		}else{
			
			confir('Confirmación','El código ingresado es incorreco, ¿Deseas continuar?','traking','entregado','frm10','remove');$('#codver').select();
		}
	}
</script>