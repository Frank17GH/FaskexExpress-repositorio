<div class="modal-header" style="padding: 10px;">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel">DETALLE DE COMPRA</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="widget-body">
					<?php 
						foreach ($dt1 as $dta1):
							?>
							<form class="form-horizontal" action="javascript: vAjax('compras','insert1','frm1'); " id="frm1">
								<fieldset>
									<div class="form-group">
										<div class="col-md-6">
											<label>Tipo de comprobante<font style="color: red">*</font></label>
											<input type="text" class="form-control input-xs" readonly="" value="<?php if($dta1[co_tipo]=='01'){echo 'FACTURA';}elseif($dta1[co_tipo]=='03'){echo 'BOLETA';}elseif($dta1[co_tipo]=='02'){echo 'NOTA DE VENTA';} ?>">
										</div>
										<div class="col-md-2">
											<label>Serie</label>
											<input type="text" class="form-control input-xs" readonly="" value="<?php echo $dta1[co_serie] ?>">
										</div>
										<div class="col-md-4">
											<label>Número</label>
											<input type="text" style="text-align: right;" class="form-control input-xs" value="<?php echo str_pad($dta1[co_correlativo], 8, "0", STR_PAD_LEFT) ?>" readonly="">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-3">
											<label>RUC<font style="color: red">*</font></label>
											<input type="number" style="font-weight: bold;" value="<?php echo $dta1[cl_numdoc] ?>" class="form-control input-xs" readonly="">
										</div>
										<div class="col-md-9">
											<label>Nombre<font style="color: red">*</font></label>
											<input class="form-control input-xs" type="text" value="<?php echo $dta1[cl_nombres] ?>" readonly="">
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-8">
											<label>Asiento</label>
											<input type="text" class="form-control input-xs" readonly="" value="<?php echo $dta1[asiento] ?>">
										</div>
										<div class="col-md-4">
											<label>Moneda</label>
											<input type="text" style="text-align: center;" class="form-control input-xs" readonly="" value="<?php echo $dta1[co_moneda] ?>">
										</div>
									</div>
									<hr>
					                <table class="table" id="tabprod" style="margin-bottom: 0px;">
					                    <thead>
					                        <tr class="encabezado">
					                            <th><center>Tipo</center></th>
					                            <th style="width:100%;"><center>Descripción</center></th>
					                            <th style="width: 1px"><center>Cantidad</center></th>
					                            <th><center>Total</center></th>
					                        </tr>
					                    </thead>
					                    <tbody id="div-dtcomp"> 
											<?php 
											 	foreach ($dt2 as $dta2):
											  		?>
											   			<tr>
											    			<td>
											     				<?php 
											                        if ($dta2[de_tipo]==1) { $tp++;
											                            ?><span class="label label-primary">SERVICIO</span><?php
											                        }elseif ($dta2[de_tipo]==2){
											                            ?><span class="label label-success">PRODUCTO</span><?php
											                        }elseif ($dta2[de_tipo]==3){
											                            ?><span class="label label-info">OTRO</span><?php
											                        }
											                    ?>
											        		</td>
											        		<td><?php echo $dta2[det] ?></td>
											        		<td style="text-align: center;"><?php echo $dta2[de_cant] ?></td>
											        		<td><?php echo number_format($dta2[de_total],2) ?></td>
									        			</tr>
											        <?php
												endforeach;
											?>
										</tbody>
					                </table>

								</fieldset>
							</form>
							<?php
						endforeach;
					?>
					<div class="col-md-12" style="text-align: right;"><hr>
						<b>TOTAL: S/. <font style="font-size: 20px"><?php echo number_format($dta1[co_total],2) ?></font></b>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-danger" onclick="confir('Confirmación','Seguro que deseas eliminar el comprobante seleccionado?','compras','del1',<?php echo $s02 ?>,'remove')">
		<i class="fa fa-remove"></i>
		ELIMINAR
	</button>
	<button class="btn btn-default" data-dismiss="modal">
		<i class="fa fa-rotate-left"></i>
		CERRAR
	</button>
</div>