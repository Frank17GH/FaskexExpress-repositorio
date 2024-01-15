<div class="modal-content" id="div-modal"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h6 class="modal-title" id="myModalLabel"><b>RECOJO Y ENTREGAS </b></h6>
	</div>

	<div class="modal-body">
		<div class="row">
			<?php if($dt1){ foreach ($dt1 as $dta1): ?>
			    <div class="col-md-12">
					<div class="col-md-9">
						<label><b>DESCRIPCIÓN</b></label>
						<input  value="<?php echo $dta1[re_nombre] ?>" class="form-control input-xs" readonly>
					</div>
					<div class="col-md-3">
						<label><b>ESTADO</b></label>
						<select class="form-control input-xs" id="dest">
							<option value="1" <?php echo ($dta1[re_estado])?'selected':'' ?>>Activo</option>
							<option value="0" <?php echo (!$dta1[re_estado])?'selected':'' ?>>Inactivo</option>
						</select>
					</div>
					<div class="col-md-12"><br><?php  $arr=explode(',', $dta1[re_cobertura]); ?></div>
					<div class="col-md-12"><legend style="font-size: 90%"><b>Coberturas</b></legend></div>
						<?php $class = new Mod();
           					$dt2 = $class->distritos($dta1[re_cobertura]); ?>		
						<?php if($dt2){ foreach ($dt2 as $dta2): ?>
                			<div class="col-md-4">
                				<div class="checkbox">
									<label>
										<input type="checkbox" name="checks[]" value="<?php echo $dta2[iddistrito] ?>" class="checkbox style-0" <?php echo (in_array($dta2[iddistrito], $arr))?'checked="cheked"':'' ?>>
										<span style="text-align: justify;"><?php echo $dta2[nombre] ?></span>
									</label>
								</div>
                			</div>
						<?php endforeach; }else{ ?> <div class="col-md-12"><center><i>(No hay información)</i></center></div> <?php } ?>
				</div>	 				
	       	<?php endforeach; }  ?>
	        <input type="hidden" name="" id="val_sel">
		</div>
	</div>
	

	<div class="modal-footer">
		<div class="edit" style="display: ">
			<button class="btn btn-primary" onclick="vAjax('configuracion-cotizacion','insert_local','<?php echo $s02 ?>-/'+$('#val_sel').val())">
				<i class="fa fa-check"></i>
				Guardar
			</button>
			<button class="btn btn-default" onclick="$('.edit').hide();$('.view').show()">
				<i class="fa fa-remove"></i>
				Cancelar
			</button>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('[name="checks[]"]').click(function() {
      
    var arr = $('[name="checks[]"]:checked').map(function(){
      return this.value;
    }).get();
    var str = arr.join(',');
    $('#val_sel').val(str);
  });
</script>