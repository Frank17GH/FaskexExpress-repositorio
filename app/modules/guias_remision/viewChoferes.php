<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel">SELECCIÓN DE CHOFER</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div class="well well-sm well-primary" s>
				<table id="dtable77" class="table table-bordered table-condensed" style="width: 100%">
         			<thead>
				        <tr>
				           	<th style="width: 5px"><center>LICENCIA</center></th>
							<th><center>NOMBRES</center></th>
				        </tr>
    				</thead>
    				<tbody>
                        <?php if($dt1){
                            		foreach ($dt1 as $data): ?>
										<tr style="cursor: pointer" onclick="busca('<?php echo $data['licencia'] ?>', '<?php echo $data['NomPer'] ?>', '<?php echo $data['ID'] ?>');">	
											<td>L<?php echo $data['licencia'] ?></td>
											<td><?php echo $data['NomPer'] ?></td>
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
<script type="text/javascript">
	function busca(num, nom, id){
		$('#numDni4').val(num);
		$('#nomClient4').val(nom);
		$('#licencia_id').val(id);
		$('#myModal').modal('hide');
	}
</script>