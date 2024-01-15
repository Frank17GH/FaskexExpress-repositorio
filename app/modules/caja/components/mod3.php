<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>DETALLE DE  MOVIMIENTO</b></h4>
</div>
<?php 
	foreach ($dt1 as $dta):
		?>
			<div class="modal-body"><div class="row">
				<div class="col-md-12">
					<div role="content">
			            <form id="frm4">
			            	<input type="hidden" value="<?php echo explode('-/', $s02)[0] ?>" name="id">
			            	<div class="col-md-12">
				                <label><b>Colaborador</b></label>
				                <input type="text" class="form-control" name="real" value="<?php echo $dta[pe_apellidos].', '.$dta[pe_nombres] ?>" readonly>
							</div>
							<div class="col-md-12"><br></div>
							<div class="col-md-12">
		                    	<label><b>Nomenclatura</b></label>
		                        <select class="form-control" name="nomen">
		                        	<option value="0">Seleccione una nomenclatura</option>
		                        	<?php 
		                        		foreach ($dt2 as $dta2): 
		                        			?>
		                        				<option value="<?php echo $dta2[idnomenclatura]?>" <?php echo ($dta2[idnomenclatura]==$dta[idnomenclatura])?'selected':'' ?>><?php echo $dta2[no_nombre]?></option>
		                        			<?php
										endforeach;
		                        	?>
		                        </select>
		                    </div>
		                    <div class="col-md-12"><br></div>
							<div class="col-md-12">
				                <label><b>Descripción</b></label>
				                <textarea class="form-control" name="descrip"><?php echo $dta[mo_descrip] ?></textarea>
							</div>
							<div class="col-md-12"><br></div>
			                <div class="col-md-4">
				                <label><b>Monto DADO</b></label>
				                <input type="text" class="form-control" style="text-align: right;" name="" value="<?php echo number_format($dta[mo_total],2) ?>" readonly>
							</div>
				            <div class="col-md-4">
				                <label><b>Monto GASTADO</b></label>
				                <input type="text" class="form-control" style="text-align: right;" name="real" value="<?php echo number_format($dta[mo_real],2) ?>" readonly>
							</div>
							<div class="col-md-4">
				                <label><b>Diferencia</b></label>
				                <input type="text" class="form-control" style="text-align: right;" name="real" value="<?php echo number_format($dta[mo_total]-$dta[mo_real],2) ?>" readonly>
							</div>
							<div class="col-md-12"><br></div>
							<div class="col-md-4">
				                <label><b>Tipo de comprobante</b></label>
				                 <input type="text" class="form-control" style="text-align: right;" name="real" value="<?php if($dta[mo_tip_comp]=='01'){echo 'FACTURA';}elseif($dta[mo_tip_comp]=='02'){echo 'BOLETA';}else{echo 'RECIBO';}?>" readonly>
							</div>
							<div class="col-md-4">
				                <label><b>Nro. Comprobante</b></label>
				                <input type="text" class="form-control" value="<?php echo $dta[mo_ser_comp] ?>" ondblclick="$(this).prop('readonly',false).select();" name="ser" readonly>
							</div>
							<div class="col-md-4">
				                <label><b>Fecha de Rendición</b></label>
				                <input type="text" class="form-control" style="text-align: center;" value="<?php echo date('d/m/Y  h:i a',strtotime($dta[mo_fecha_rendi])) ?>" readonly>
							</div>
							<div class="col-md-12"><br></div>
			            </form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" type="button" onclick="confir('Confirmación','Seguro que deseas eliminar el Ingreso seleccionado?','caja','del1',<?php echo $s02 ?>,'remove')">
					<i class="fa fa-trash"></i>
					<b> Eliminar Mov.</b>
				</button>
				<?php 
				if ($dta[mo_tipo]==2) {
					if ($dta[mo_estado]==2) {
						?>
							<button class="btn btn-warning" type="button" onclick="confir('Confirmación','Seguro que deseas eliminar el Ingreso seleccionado?','caja','del3',<?php echo $s02 ?>,'remove')">
								<i class="fa fa-remove"></i>
								<b> Eliminar Rend.</b>
							</button>
						<?php
					}else{
						?>
							<button class="btn btn-info" type="button" onclick="vAjax('caja','mod4','<?php echo $s02 ?>-/<?php echo $dta[mo_total] ?>','modal1');">
								<i class="fa fa-refresh"></i>
								<b> Rendir</b>
							</button>
						<?php
					}
				}
					
				?>		
				<button class="btn btn-success" onclick="vAjax('caja','up1','frm4');">
					<b>GUARDAR</b>
				</button>			
				<button class="btn btn-default" data-dismiss="modal">
					<b>CERRAR</b>
				</button>
			</div>
		<?php
	endforeach; 
?>
