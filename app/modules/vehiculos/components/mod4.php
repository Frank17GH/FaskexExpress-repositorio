<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><i class=" txt-color-red"></i> CONTROL DE KILOMETROS </h4>
</div>
<div class="modal-body">
	<div class="row">
		<div role="content">
			<div class="widget-body">
				<form id="frm2">
					<div class="col-md-12">
						<input type="hidden" value="<?php echo $s02 ?>" id="idvehi" name="id">
						<div class="col-md-4">						
							<select class="form-control" name="aseg">
								<OPTION >Seleccione Piloto</OPTION>
								<?php 
	           						if($dt2){
	               						
	               					}
	               				?>	
							</select>
						</div>
						
						<div class="col-md-2"><input name="inicio" type="number" value="" placeholder="Km Inicial" class="form-control"  ></div>
						<div class="col-md-2"><input name="fin" type="number" value="" placeholder="Km Final" class="form-control" ></div>				
						<div class="col-md-2"><input name="costo" type="number"  value="0.00" class="form-control"></div>
						<div class="col-md-2" style="text-align: center;">
							<button class="btn btn-success btn-sm" type="button" style="width: 100%" onclick="vAjax('vehiculos','','frm2');">
								<i class="fa fa-plus"></i> Agregar
							</button>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="col-md-12" style="padding-top: 10px">
						<div class="col-md-4"><input type="text" class="form-control" value="" name="tarea" placeholder="Descripcion de la tarea"></div>
						<div class="col-md-3"><input type="text" class="form-control" value="" name="reporte" placeholder="Observacion"></div>
						<div class="col-md-3">
							<input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" name="fecha" >
						</div>
					</div>

				</form>
				
				<div class="col-md-12"><br></div>
				<div class="col-md-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th style="width: 100px">FECHA</th>
								<th style="width: 100px">KM-INICIO</th>
								<th style="width: 100px">KM-FIN</th>
								<th >TAREA</th>
								<th style="width: 100px">REPORTE</th>
								<th style="width: 100px; ">COSTO</th>
								<th style="width: 5px">Acciones</th>
							</tr>
						</thead>
						<tbody id="detser">
							<?php 
           						if($dt1){
               						foreach ($dt1 as $et1): 
               							?>
               								<tr id="ttr<?php echo $et1['idkilometro'] ?>" class="success">
               									<td><?php echo date('d/m/Y',strtotime($et1['km_fecha'])) ?></td>
               									<td><?php echo $et1['km_inicio'] ?></td>
               									<td><?php echo $et1['km_fin'] ?></td>
               									<td><?php echo utf8_encode($et1['km_tarea']) ?></td>
               									<td><?php echo utf8_encode($et1['km_reporte']) ?></td>
               									<td style="text-align: right;">S/ <?php echo number_format($et1['km_costo'],2) ?></td>
               									<td><input type="button" onclick="vAjax('vehiculos','',<?php echo $et1['idkilometro'] ?>);" class="btn btn-xs btn-default" value="Eliminar" name=""></td>
               								</tr>
               							<?php 
               						endforeach; 
           						}else{
           							?><tr><td colspan="12"><center><i>No hay datos registrados</i></center></td></tr><?
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