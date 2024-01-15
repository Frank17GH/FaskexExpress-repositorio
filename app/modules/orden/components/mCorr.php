<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel">Administración de correos</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
									
		<div class="col-md-12">
			<div class="well well-sm well-primary" s>
				<form class="form form-inline" id="1_frmCorr" >
					<center>
						<div class="form-group">
							<input type="hidden" name="fun" value="0" id="idn">
							<input type="hidden" name="id" value="<?php echo $s02 ?>">
							<input class="form-control" value="" placeholder="nombre@dominio.com" name="corr" style="width: 300px">
							<button class="btn btn-success btn-sm" type="button" onclick="FCorr(1)">
								<span class="glyphicon glyphicon-floppy-disk"></span> Guardar
							</button>
							<button id="idCancel" class="btn btn-danger btn-sm" type="button" style="display: none" onclick="FCorr(2)">
								<span class="glyphicon glyphicon-remove"></span> Cancelar
							</button>
						</div>
					</center>
				</form>
			</div>
		</div>
		<div class="col-md-12">
			<div class="well well-sm well-primary" s>
				<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th><center>Descrip</center></th>
							<th style="width: 10px"><center>Extras</center></th>
						</tr>
					</thead>
					<tbody>
						<?php if($dt1){
                            foreach ($dt1 as $data): ?>
								<tr id="trd_<?php echo $data[0]?>">
									<td id="nom_<?php echo $data[0]?>"><?php echo $data[1] ?></td>
									<td>
										<div class="input-group-btn">
											<a class="btn btn-default input-xs" title="Editar" onclick="FCorr(3,<?php echo $data[0] ?>)">
												<span class="glyphicon glyphicon-pencil"></span>
											</a>
											<a class="btn btn-default input-xs" title="Eliminar" onclick="FCorr(4,<?php echo $data[0] ?>)">
												<i class="glyphicon glyphicon-trash"></i>
											</a>
										</div>
									</td>
								</tr>
						<?php endforeach; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		Cerrar
	</button>
</div>