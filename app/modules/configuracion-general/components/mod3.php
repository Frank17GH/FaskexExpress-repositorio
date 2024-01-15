<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>DETALLE DE SERIES</b></h4>
</div>
<div class="modal-body">
	<div class="row">
		<div role="content">
			<div class="widget-body">
				<div class="col-md-12">
					<div class="col-md-3"></div>
					<div class="col-md-4">
						<input class="form-control" id="nSer" placeholder="Numero de Serie" style="width: 100%">
					</div>
					<div class="col-md-2" style="text-align: left;">
						<button class="btn btn-success btn-sm" type="button" onclick="savSer(<?php echo $s02 ?>)">
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
           						if($dt1){
               						foreach ($dt1 as $data): 
               							?>
               								<tr id="<?php echo $data['idseries'] ?>">
               									<td><?php echo $data['idseries'] ?></td>
               									<td><a class="btn btn-danger btn-xs" onclick="confir('Confirmación','Seguro que deseas eliminar la serie seleccionada?','configuracion-general','del4','0-/<?php echo $data['idseries'] ?>','remove')">Eliminar</a></td>
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