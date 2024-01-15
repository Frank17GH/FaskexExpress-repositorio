<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>

	<h5 class="modal-title" id="myModalLabel"><center><b>DETALLE DE DESPACHO</b></center></h5>

</div>
<?php foreach ($dt1 as $key => $data1): ?>
<div class="modal-body">
	<div class="well well-sm well-primary">
		<form class="smart-form"  id="f_viaj">				
			<fieldset>
				<div class="col-md-7">
					<label class="label"><b>RESPONSABLE: </b><?php echo $data1['responsable'] ?></label>
				</div>

				<div class="col-md-3">
					<label class="label"><b>TIPO: </b>
						<?php echo $data1['tper']; ?>
					</label>
				</div>

				<div class="col-md-2">
					<label class="label"><b>ENTREGA: </b> 
						<?php if ($data4[de_tipo]=="0"){ echo "Local" ; }else { echo "Nacional" ; } ?>
						
					</label>
				</div>							

				<div class="col-md-12"><br></div>

				<div class="col-md-8">

					<label class="label"><b>OBSERVACIONES: </b> <?php echo $data1['de_observacion'] ?></label>

				</div>	
				<div class="col-md-2">

					<label class="label"><b>FECHA: </b><?php echo $data1['de_fecha'] ?> </label>

				</div>
				<div class="col-md-2">

					<label class="label"><b>HORA: </b> <?php echo $data1['de_hora'] ?></label>

				</div>																	

			</fieldset>

		</form>
	</div>	

	<div class="well well-sm well-primary">
		<fieldset>
			<div id ="div-lista"></div>
			<script>vAjax('despacho','tabla3',<?php echo $data1['iddespacho'] ?>,'lista');</script> 
		</fieldset>
	</div>
	
</div>
<?php endforeach ?>

