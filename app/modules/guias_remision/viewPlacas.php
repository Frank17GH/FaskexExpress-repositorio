<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel">SELECCIÓN DE PLACAS</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div class="well well-sm well-primary" s>
				<table id="dtable77" class="table table-bordered table-condensed" style="width: 100%">
         			<thead>
				        <tr>
				           	<th style="width: 80px"><center>PLACA</center></th>
							<th><center>VEHICULO</center></th>
							<th><center>AUTORIZACION</center></th>
				        </tr>
    				</thead>
    				<tbody>
                        <?php if($dt1){
                            		foreach ($dt1 as $data): ?>
										<tr style="cursor: pointer" onclick="buscaPlaca('<?php echo $data['placa'] ?>', '<?php echo $data['descripcion'] ?>', '<?php echo $data['id'] ?>');">	
											<td><?php echo $data['placa'] ?></td>
											<td><?php echo $data['descripcion'] ?></td>
											<td><?php echo $data['autorizacion'] ?></td>
										</tr>
							<?php endforeach; }?>
                    </tbody>
				</table>
				<script type="text/javascript">table2(77)</script> 
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">
			Cerrar
		</button>
	</div>
</div>
