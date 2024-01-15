<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>NUEVO EGRESO DE CAJA</b></h4>
</div>

<div class="modal-body"><div class="row">
	<div class="col-md-12">
		<div role="content">
            <br>
            <form id="frm2">	            
            	<div class="col-md-6" style="text-align: center;">
            		<label><b>Fecha y Hora de la Op.</b></label>
	                 <input type="datetime-local" class="form-control" value="<?php echo date("Y-m-d\TH:i:s");?>">
				</div>
	            <div class="col-md-6" style="text-align: center;">
	            	<label><b>Monto a desemboldar S/.</b></label>
	                <input type="number" style="text-align: right;" autocomplete="off" class="form-control" placeholder="S/. 00.00" name="monto" id="m_mont">
	            </div>
	            <div class="col-md-12"><br></div>
	            <div class="col-md-12">
	            	<label><b>Nomenclatura de la Op. ha realizarse</b></label>
	                <select class="form-control" name="nomen" onchange="if($(this).val()==1){$('#idcol').hide();$('#idcaj').show();}else{$('#idcol').show();$('#idcaj').hide();}">
	                    <?php 
	                      	foreach ($dt1 as $dta2): 
	                       		?>
	                       			<option value="<?php echo $dta2[idnomenclatura]?>"><?php echo $dta2[no_nombre]?></option>
	                       		<?php
							endforeach;
	                    ?>
	                </select>
	            </div>
	            <div id="idcol" style="display: none">
	            	<div class="col-md-12"><br></div>
	            	<div class="col-md-12">
	            		<label><b>Colaborador que Recibe el Dinero</b></label>
		                <select class="form-control" name="personal">
		                    <?php 
		                       	foreach ($dt2 as $dta): 
		                        	?>
		                        		<option  value="<?php echo '0-'.$dta[idpersonal]?>"><?php echo ' [ '.$dta[pe_dni].' ] '.$dta[pe_apellidos].$dta[pe_nombres]?></option>
		                        	<?php
								endforeach;
		                    ?>
		                </select>
	            	</div>
	            </div>
	            <div id="idcaj">
	            	<div class="col-md-12"><br></div>
		           	<div class="col-md-12">
		           		<label><b>Responsable de la Caja que recibe el dinero</b></label>
		                <select class="form-control" name="cajero">
		                    <?php 
		                       	foreach ($dt3 as $dta3): 
		                        	?>
		                        		<option  value="<?php echo $dta3[caj].'-'.$dta3[idpersonal]?>"><?php echo ' [ Caja : '.$dta3[dist].' - '.$dta3[lo_abreviatura].' ] '.$dta3[nom]?></option>
		                        	<?php
								endforeach;
		                    ?>
		                </select>
		            </div>
	            </div>
	           <div class="col-md-12"><br></div>
	            
	            <div class="col-md-6" style="text-align: center;">
	            	<label><b>Tipo de Desembolso</b></label>
	                <select class="form-control" name="tip_op">
	                	<option value="2">Trans. BCP</option>
	                	<option value="3">Trans. Interbank</option>
	                	<option value="1" selected>Efectivo</option>
	                </select>
	            </div>
	            <div class="col-md-6" style="text-align: center;">
	            	<label><b>Nro. de Operación</b></label>
	                <input type="number" style="text-align: right;" autocomplete="off" class="form-control" placeholder="########" name="nro_op">
	            </div>
	            <div class="col-md-12"><br></div>
                <div class="col-md-12">
	                <textarea class="form-control" placeholder ="Descripcion adicional" name="descrip"></textarea><br>
	            </div>
	            
            </form>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-info" type="button" onclick="savEgre()">
		<i class="fa fa-save"></i>
		<b> GUARDAR</b>
	</button>					
	<button class="btn btn-default" data-dismiss="modal">
		<b>CERRAR</b>
	</button>
</div>
<script>
	$('#m_mont').select();
	function savEgre(){
		if($('#m_mont').val()<0 || $('#m_mont').val()==''){
			aviso('danger','Especifique el monto a desembolsar.');$('#m_mont').select();
		}else{
			vAjax('caja_general','insert1','frm2');
		}
	}
</script>