
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel">DETALLE DE CONTRATOS</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div role="content">
			<div class="widget-body">
				<form class="form-horizontal" action="javascript: vAjax('personal_ingreso','insert1','frm1'); " id="frm1">
					<fieldset>
						<?php 
				            if($dt1){
				                foreach ($dt1 as $dta1): 
				                    ?>
								        <div class="col-md-12">
									    	<div class="form-group">
												<div class="col-md-4">
													<label><b>D.N.I.</b></label>
													<input style="text-align: center;" type="text" class="form-control" value="<?php echo $dta1[pe_dni] ?>" readonly >
												</div>
												<div class="col-md-8">
													<label><b>Nombres</b></label>
													<input style="text-align: center;" type="text" class="form-control" value="<?php echo $dta1[pe_apellidos].', '.$dta1[pe_nombres] ?>" readonly >
												</div>
											</div>
											<button style="display: none;" id="sub_mitR" type="submit"></button>
										</div>
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th style="text-align: 5px">Cód.</th>
															<th style="width: 100%">Cargo</th>
															<th style="text-align: 5px">Inicio</th>
															<th style="text-align: 5px">Fin</th>
															<th style="text-align: 5px">Acc.</th>
														</tr>
													</thead>
													<tbody>
														<?php 
												            if($dt2){
												                foreach ($dt2 as $dta2): 
												                    ?>
												                    	<tr class="<?php echo ($dta2[co_liquidado])?'success':'warning' ?>">
												                    		<td><?php echo str_pad($dta2[idcontratos], 6, "0", STR_PAD_LEFT) ?></td>
												                    		<td><?php echo $dta2[ca_descripcion] ?><br>
												                    			<font style="font-size: 80%">
													                    			<?php 
													                    				switch ($dta2[idtipocontrato]) {
													                    					case '0':
													                    						?><i>No Especificado</i><?php 
													                    						break;
													                    					case '1':
													                    						?><i>CONTRATO INDEFINIDO</i><?php 
													                    						break;
													                    					case '2':
													                    						?><i>CONTRATO A PLAZO FIJO O DETERMINADO</i><?php 
													                    						break;
													                    					case '3':
													                    						?><i>CONTRATO A TIEMPO PARCIAL</i><?php 
													                    						break;
													                    					case '4':
													                    						?><i>LOCACION DE SERVICIO</i><?php 
													                    						break;
													                    				}
													                    			?>
												                    			</font>
												                    			
												                    		</td>
												                    		<td><?php echo date('d/m/Y',strtotime($dta2[co_inicio])) ?></td>
												                    		<td>
												                    			<?php 
												                    				echo date('d/m/Y',strtotime($dta2[co_fin])) 
												                    			?>
												                    			<?php 
													                                if ($dta2[co_fin]<=date('Y-m-d') && $dta2[co_liquidado]==1 ) {
													                                   ?><i style="color:red; font-size: 80%"><b>( VENCIDO )</b></i><?php
													                                }
													                            ?>
											                    			</td>
												                    		<td>
												                    			<?php 
												                    				if ($dta2[co_estado]==0) {
												                    					?>
												                    						<a title="Ver detalle de contrato" class="btn btn-danger btn-xs" onclick="vAjax('personal_contratos','mod2',<?php echo $dta2[idcontratos] ?>,'modal5');">Ver Detalles <br><i>(Regularizar)</i></a>
												                    					<?php
												                    				}else{
												                    					?>
												                    						<a title="Ver detalle de contrato" class="btn btn-default btn-xs" onclick="vAjax('personal_contratos','mod2',<?php echo $dta2[idcontratos] ?>,'modal5');">Ver Detalles</a>
												                    					<?php
												                    				}
												                    			?>
												                    			<br>

												                    		</td>
												                    	</tr>
																	<?php 
												                endforeach; 
												            }
												        ?>
													</tbody>
												</table>
											</div>
										</div>
				 					<?php 
				                endforeach; 
				            }
				        ?>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">CERRAR</button>
		<button class="btn btn-primary" type="button" onclick="vAjax('personal_contratos','mod3',<?php echo $s02 ?>,'modal5');">
			<i class="fa fa-plus"></i> NUEVO CONTRATO 
		</button>
	</div>
</div>