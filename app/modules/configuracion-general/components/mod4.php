<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>ASIGNACIÓN DE CPE's</b></h4>
</div>
<div class="modal-body">
	<input type="hidden" value="<?php echo $s02 ?>" id="idlocall">
	<div class="row">
		<div role="content">
			<div class="col-md-12">
				<div class="col-md-1"></div>
				<div class="col-md-8">
					<select class="form-control" id="idcpe">
						<?php 
    						if($dt1){
       							foreach ($dt1 as $dta): 
       								?>
      									<option value="<?php echo intval($dta['idcpe']) ?>"><?php echo $dta['cpe_descrip'] ?></option>
       								<?php
       							endforeach; 
       						}
       					?>
       				</select>
				</div>
				<div class="col-md-2">
					<button class="btn btn-success btn-sm" type="button" onclick="vAjax('configuracion-general','insert2',$('#idcpe').val()+'-/<?php echo $s02; ?>')">
						<span class="glyphicon glyphicon-floppy-disk"></span> Guardar
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
					<tbody>
						<?php 
		            		if($dt2){$c=1;
		                		foreach ($dt2 as $dta2): 
		                			?>
		                				<tr id="ttr<?php echo $dta2['id'] ?>">
		                					<td><?php echo $c; ?></td>
		                					<td><?php echo $dta2['cod'] ?></td>
		                					<td><?php echo $dta2['cpe_descrip'] ?></td>
		                					<td><a class="btn btn-danger btn-xs" onclick="confir('Confirmación','Seguro que deseas eliminar EL CPE seleccionado?','configuracion-general','del2','<?php echo $dta2['id']?>','remove')">Eliminar</a></td>

		                					

		                				</tr>
		                			<?php $c++;
		                		endforeach; 
		            		}else{
		            			?>
		            				<tr>
		            					<td colspan="3"><center><i>No hay datos registrados</i></center></td>
		            				</tr>
		            			<?
		            		}
		        		?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-default" onclick="$('#myModal').modal('hide');">Cancelar</button>
</div>