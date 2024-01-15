<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel">ASIGNACIÓN DE GIROS</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div role="content">
			<div class="widget-body">
				<div class="col-md-12">
					<div class="col-md-3"></div>
					<div class="col-md-4">
						<select class="form-control" id="idgiross">
							<?php 
           						if($dt1){
               						foreach ($dt1 as $dta1): 
               							?>
               								<option value="<?php echo $dta1[idgiros] ?>"><?php echo $dta1[gi_nombre] ?></option>
               							<?php 
               						endforeach; 
           						}
       						?>
						</select>
					</div>
					<div class="col-md-2" style="text-align: left;">
						<button class="btn btn-success btn-sm" type="button" onclick="vAjax('configuracion-usuarios','insert3','<?php echo $s02 ?>-/'+$('#idgiross').val())">
							<i class="fa fa-plus"></i> Agregar
						</button>
					</div>
					<div class="col-md-1"></div>
				</div>
				<div class="col-md-12"><br></div>
				<div class="col-md-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Serie</th>
								<th style="width: 5px">Acciones</th>
							</tr>
						</thead>
						<tbody id="detser">
							<?php 
           						if($dt2){
               						foreach ($dt2 as $dta2): 
               							?>
               								<tr id="tr1_<?php echo $dta2[idusergiros] ?>">
               									<td><?php echo $dta2[gi_nombre] ?></td>
               									<td><a class="btn btn-danger btn-xs" onclick="confir('Confirmación','Seguro que deseas eliminar la serie seleccionada?','configuracion-usuarios','del2','<?php echo $s02 ?>-/<?php echo $dta2[idusergiros] ?>','remove')">Eliminar</a></td>
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
		<button class="btn btn-default" onclick="vAjax('configuracion-usuarios','mod1',<?php echo $s02 ?>,'modal1');">
			<i class="fa fa-undo"></i>
			Volver
		</button>
	</div>
</div>