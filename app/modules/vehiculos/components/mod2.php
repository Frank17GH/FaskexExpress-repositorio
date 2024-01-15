<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><i class="fa fa-shield fa-lg fa-fw txt-color-red"></i> SOAT</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div role="content">
			<div class="widget-body">
<!-- Registro-->				
				<form id="frm2">
					
					<div class="col-md-12">
						<input type="hidden" value="<?php echo $s02 ?>" id="idvehi" name="id">
						<div class="col-md-2"><input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" name="inicio"></div>
						<div class="col-md-2"><input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" name="fin"></div>
						<div class="col-md-4">
							<select class="form-control" name="aseg">
								<?php 
	           						if($dt2){
	               						foreach ($dt2 as $et2): 
	               							?>
	               							<option value="<?php echo $et2[idaseguradora] ?>"><?php echo utf8_encode($et2[as_descripcion]) ?></option>
	               							<?php 
	               						endforeach; 
	               					}
	               				?>	
							</select>
						</div>
						<div class="col-md-2"><input type="number" class="form-control" value="0.00" name="costo"></div>
						<div class="col-md-2" style="text-align: center;">
							<button class="btn btn-success btn-sm" type="button" style="width: 100%" onclick="vAjax('vehiculos','insert2','frm2');">
								<i class="fa fa-plus"></i> Agregar
							</button>
						</div>
						<div class="col-md-1"></div>
					</div>

					<div class="col-md-12" style="padding-top: 10px">
						<div class="col-md-3"><input type="text" class="form-control" value="" name="certificado" placeholder="N° de certificado"></div>
						<div class="col-md-3"><input type="text" class="form-control" value="" name="uso" placeholder="Uso"></div>
						<div class="col-md-3">
							<select class="form-control" name="tipo">
								<option value="Fisico">Selecciones Tipo</option>
								<option value="Fisico">Fisico</option>
								<option value="Digital">Digital</option>
							</select>
						</div>
					</div>
				</form>
				
				<div class="col-md-12"><br></div>
				<div class="col-md-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th style="width: 5px">ESTADO</th>
								<th style="width: 5px">INICIO</th>
								<th style="width: 5px">FIN</th>
								<th>ASEGURADORA</th>
								<th>N° Certificado</th>
								<th style="width: 100px; ">COSTO</th>
								<th style="width: 5px">Acciones</th>
							</tr>
						</thead>
						<tbody id="detser">
							<?php 
           						if($dt1){
               						foreach ($dt1 as $et1): 
               							?>
               								<tr id="ttr<?php echo $et1['idsoat'] ?>" class="<?php if ($et1['so_fin']>date('Y-m-d')) {echo 'success';}else{echo 'danger';} ?>">
               									<td>
               										<?php 
               											if ($et1['so_fin']>date('Y-m-d')) {
               												?><span class="label label-success">Activo</span><?php
               											}else{
               												?><span class="label label-danger">Inactivo</span><?php
               											}
               										?>
               									</td>
               									<td><?php echo date('d/m/Y',strtotime($et1['so_inicio'])) ?></td>
               									<td><?php echo date('d/m/Y',strtotime($et1['so_fin'])) ?></td>
               									<td><?php echo utf8_encode($et1['as_descripcion']) ?></td>
               									<td><?php echo utf8_encode($et1['so_certificado']) ?></td>
               									<td style="text-align: right;">S/ <?php echo number_format($et1['so_costo'],2) ?></td>
               									<td><input type="button" onclick="confir('Eliminacion','¿Seguro que deseas quitar el registro seleccionado?','vehiculos','del2',<?php echo $et1['idsoat'] ?>,'remove');" class="btn btn-xs btn-default" value="Eliminar" name=""></td>

               								</tr>
               							<?php 
               						endforeach; 
           						}else{
           							?><tr><td colspan="3"><center><i>No hay datos registrados</i></center></td></tr><?
           						}
       						?>
						</tbody>
						
					</table>
					<input type="hidden" value="<?php echo $c; ?>" id="num">
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal"><b>CERRAR</b></button>
	</div>
</div>