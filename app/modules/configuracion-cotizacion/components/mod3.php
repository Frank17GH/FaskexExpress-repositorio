
<div class="modal-content" id="div-modal"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h6 class="modal-title" id="myModalLabel"><b>DETALLE DE SUBSERVICIO</b></h6>
	</div>
	<div class="modal-body">
		<div class="row">
			<?php 
	            if($dt1){ 
	                foreach ($dt1 as $dta1): 
	                    ?>
					        <div class="col-md-12">
								<div class="col-md-6">
									<label><b>DESCRIPCIÓN</b></label>  <?php echo $dta1[recojo]; ?>
									<input name="des" value="<?php echo $dta1[de_descripcion] ?>" class="form-control input-xs" required="">
								</div>


								<div class="col-md-2">
									<label><b>Recojo</b></label>
									<select class="form-control input-xs"  onchange="vAjax('configuracion-cotizacion','update_recojo','<?php echo $s02 ?>-/'+this.value)">
										<option>--Seleccionar--</option>
									<?php $class = new Mod();
                                        $dt4 = $class->tabla_local(0); 
                                        if($dt4){ foreach ($dt4 as $dta4): 
                                    ?>							
                                     
                                        <option value="<?php echo $dta4[idreenlocal] ?>" <?php echo ($dta1[recojo]==$dta4[idreenlocal])?'selected':''; ?>><?php echo $dta4[re_nombre] ?></option>
                                        <?php endforeach; } ?>
                                         
									</select>
								</div>
								<?php if ($dta1[idambito]==1 || $dta1[idambito]==3){ ?>
								<div class="col-md-2">
									<label><b>Entrega</b></label>
									<select class="form-control input-xs" onchange="vAjax('configuracion-cotizacion','update_entrega','<?php echo $s02 ?>-/'+this.value)">
										<option>--Seleccionar--</option>
									<?php $class = new Mod();
                                        $dt4 = $class->tabla_local(0); 
                                        if($dt4){ foreach ($dt4 as $dta4): 
                                    ?>							                                     
                                        <option value="<?php echo $dta4[idreenlocal] ?>" <?php echo ($dta1[entrega]==$dta4[idreenlocal])?'selected':''; ?>><?php echo $dta4[re_nombre] ?></option>
                                        <?php endforeach; } ?>                                         
									</select>
								</div>
								<?php } else if ($dta1[idambito]==2) { ?>
								<div class="col-md-2">
									<label><b>Entrega Nacional</b></label>
									<select class="form-control input-xs" onchange="vAjax('configuracion-cotizacion','update_entrega_nacional','<?php echo $s02 ?>-/'+this.value)">
										<option>--Seleccionar--</option>
									<?php $class = new Mod();
                                        $dt5 = $class->tabla_nacional(0); 
                                        if($dt5){ foreach ($dt5 as $dta5): 
                                    ?>							                                     
                                        <option value="<?php echo $dta5[idreennacional] ?>" <?php echo ($dta1[entrega_nacional]==$dta5[idreennacional])?'selected':''; ?>><?php echo $dta5[ren_nombre] ?></option>
                                        <?php endforeach; } ?>                                         
									</select>
								</div>
							<?php } ?>


								<div class="col-md-2">
									<label><b>ESTADO</b></label>
									<select class="form-control input-xs" id="dest">
										<option value="1" <?php echo ($dta1[de_estado])?'selected':'' ?>>Activo</option>
										<option value="0" <?php echo (!$dta1[de_estado])?'selected':'' ?>>Inactivo</option>
									</select>
								</div>
								<div class="col-md-12"><br><?php $arr=explode(',', $dta1[det]); ?></div>
								<?php 
						            if($dt2){
						                foreach ($dt2 as $dta2): 
						                    ?><div class="col-md-12"><legend style="font-size: 90%"><b><?php echo utf8_encode($dta2[ca_descrip]) ?></b></legend></div><?php
											$class = new Mod();
           									$dt3 = $class->mod3_3($dta2[idcategoria]);
           									if($dt3){$cc=1;
							                	foreach ($dt3 as $dta3):
							                		?>
							                			<div class="col-md-4">
							                				<div class="checkbox">
																<label>
																	<input type="checkbox" name="checks[]" value="<?php echo $dta3[idadicionales] ?>" class="checkbox style-0" <?php echo (in_array($dta3[idadicionales], $arr))?'checked="cheked"':'' ?>>
																	<span style="text-align: justify;"><?php echo $dta3[ad_descrip] ?></span>
																</label>
															</div>
							                			</div>
							                		<?php
							                			if ($cc%3) {
							                				
							                			}else{
															?><div class="col-md-12"></div><?php
							                			}
							                			$cc++;
							                	endforeach; 
						                	}else{
						                		?><div class="col-md-12"><center><i>(No hay información)</i></center></div><?php
						                	}
							 			endforeach; 
							        }
							    ?>
								<div class="col-md-12"></div>
								 
							</div>
	 					<?php
	 				endforeach; 
	            }
	        ?>
	        <input type="hidden" name="" id="val_sel">
		</div>
	</div>
	<div class="modal-footer">
		<div class="edit" style="display: ">
			<button class="btn btn-primary" onclick="vAjax('configuracion-cotizacion','insert4','<?php echo $s02 ?>-/'+$('#val_sel').val())">
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