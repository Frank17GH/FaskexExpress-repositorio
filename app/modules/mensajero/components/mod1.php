
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title">CREACION DE HOJA DE RUTA</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" id="frm2">
						<fieldset>
					    	<div class="form-group" style="padding: 15px">
					    		<div class="col-md-3">
									<label><b>FECHA SALIDA</b></label>
									<input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d') ?>">
									
								</div>	
								<div class="col-md-2">
									<label><b>HORA SALIDA</b></label>
										<input type="time" class="form-control" style="text-align: center;" name="hora" value="<?php echo date('H:i') ?>" readonly>
								</div>		
									<div class="col-md-7"><label><b>MENSAJERO</b></label><div class="form-group has-success">
										<div class="input-group">
											<select class="form-control" name="mensajero" id="iddst" onchange="vAjax('mensajero','tabla3',$('#iddst').val(),'tbl11')">
												<?php 
													if ($dt1) {
														foreach ($dt1 as $dta1): 
															?>
																<option value="<?php echo $dta1[idpersonal] ?>" ><?php echo '[ '.$dta1[pe_dni].' ] '.mb_strtoupper(utf8_encode($dta1[pe_apellidos].', '.$dta1[pe_nombres])) ?></option>

															<?php
														endforeach;
													}
												?>
											</select>
											<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
										</div>
									</div>
								</div>
								<hr>
								<br>
								<br>
								<!-- Lector Pistola -->
								<div role="content">
									<form class="smart-form" action="" id="nDetalle" >									
											<div class="">
												<div class="panel panel-primary">
												    <div class="panel-heading" style="padding:10px;">
												    	AGREGAR COMPROBANTE
												    </div>
													<div class="panel-body" style="padding:10px;">								    							
														<div class="col-md-3">
												    		<label><b>SERIE / NUMERO</b></label>
													    	<div class="input-group">									
																<input type="" name="nomC" id="nomC" class="form-control" placeholder="F001-0000" onkeypress="if(event.keyCode == 13){ cargar(); }">
															</div>
														</div>		

											    	</div>
												</div>
											</div>							
									</form>
								</div>
								<!-- fin Pistola -->
								<br>
								 <table class="table table-hover">
										<tr>
											<th style="width: 1px">Seleccionar</th>	
											<th style="width: 1px">#</th>

											<th>Consignatario</th>
											<th>Direccion</th>
											<th >Tipo</th>
											<th style="width: 3px">Ver</th>
											
										</tr>
									<tbody id="idveri2">
										<?php 
											if ($dt2) {
												$cc=0;
												foreach ($dt2 as $dta2): $cc++;
													?>
													<tr style="cursor: pointer;" onclick="barcode2(<?php echo $dta2[iddet] ?>)" id="ttrr<?php echo $dta2[iddet] ?>">
														
														<td><input type="checkbox" id='chec<?php echo $dta2[iddet] ?>'></td>														
														<td><?php echo $cc; ?></td>
														<td style="display:none;"><?php echo $dta2[iddet] ?></td>
														<td><?php echo $dta2[de_nombre] ?></td>									
														<td><?php echo $dta2[de_direccion] ?></td>
														<td> <?php 
						                                    if ($dta2[de_tipo_encomienda]==1) {
						                                        ?><i class="fa fa-file txt-color-orange fa-lg"></i> <b>(SOBRE)</b><?php
						                                    }else{

						                                        ?><i><img style="width: 21px;" src="app/recursos/img/paquete.png"></i> <b>(PAQUETE)</b><?php
						                                    }
						                                ?>
					                            		</td>
														<td><a class="btn btn-default btn-xs" href="javascript:void(0);" onclick="vAjax('facturacion','mod1','0-/<?php echo $dta2[idcomprobante] ?>','modal1');"><b><i class="fa fa-eye"></i> DETALLES</b></a></td>
													</tr>
													<?php
												endforeach;
											} 
											?>
									</tbody>									
								</table>
								<input type="text" value="" id='idet2' name="detcc">
									<?php  if (!$dt2) { ?>
										<i><center>No hay Envios disponibles <br><br></center></i>
									<?php } ?>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="vAjax('mensajero','insert1','frm2');">
			<i class="fa fa-save"></i>
			Guardar
		</button>
	</div>
</div>

<script type="text/javascript">
	function cargar(){
		
if ($('#nomC').val()) {
			barcode2($('#nomC').val());
			aviso('info','Hoja de ruta generado correctamente!','Correcto!');
		}else{			
			aviso('danger','No se encuentra encomienda','Error!');
			$('#nomC').select();
		}
	}
</script>