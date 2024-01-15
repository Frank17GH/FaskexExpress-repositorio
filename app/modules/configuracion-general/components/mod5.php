<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>ASIGNACIÓN DE SERIES</b></h4>
</div>
<div class="modal-body">
	<input type="hidden" value="<?php echo $s02 ?>" id="idlocall">
	<div class="row">
		<div role="content">
			<div class="col-md-12">
				<div class="col-md-1"></div>
				<div class="col-md-8">
					<select class="form-control" id="idsers1" onchange="bfalt($(this).val(),'<?php echo $s02 ?>')">
						<option value="0">Seleccione un CPE</option>
						<?php 
    						if($dt1){
       							foreach ($dt1 as $dta): 
       								?>
      									<option value="<?php echo intval($dta['cod']) ?>"><?php echo $dta['cpe_descrip'] ?></option>
       								<?php
       							endforeach; 
       						}
       					?>
       				</select>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="col-md-12"></div>
			<div class="col-md-12">
				<div class="col-md-1"></div>
				<div class="col-md-8">
					<select class="form-control" id="idsers2">
						
       				</select>
				</div>
				<div class="col-md-2">
					<button class="btn btn-success btn-sm" type="button" onclick="vAjax('configuracion-general','insert3',$('#idsers2').val()+'-/<?php echo explode('-/', $s02)[0]; ?>')">
						<span class="glyphicon glyphicon-floppy-disk"></span> Agregar
					</button>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="col-md-12"><br></div>
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="width: 5px">#</th>
							<th style="width: 5px">Cod.</th>
							<th>CPE</th>
							<th style="width: 5px">Acciones</th>
						</tr>
					</thead>
					<tbody id="div-sers">
						<script>vAjax('configuracion-general','comp1','<?php echo $s02 ?>-/'+$('#idsers1').val(),'sers')</script>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-default" onclick="$('#myModal').modal('hide');">Cancelar</button>
</div>