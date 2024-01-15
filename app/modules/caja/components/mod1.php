<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>NUEVO INGRESO </b></h4>
</div>

<div class="modal-body"><div class="row">
	<div class="col-md-12">
		<div role="content">
                <div class="panel-body" style="padding-bottom: 0px; padding-top: 2px;">

                    <form id="frm1">
                    	<input type="hidden" value="<?php echo $s02 ?>" name="caja">
                    	<input type="hidden" name="tipo" value="1">
	                    <div class="col-md-6">
	                    	<input type="datetime-local" class="form-control" value="<?php echo date("Y-m-d\TH:i:s");?>">
						</div>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" placeholder="MONTO" name="monto">
	                    </div>
	                    <div class="col-md-12">
	                    	<div class="col-md-12"><br></div>
		                    <select class="form-control" name="personal">
		                    	<option value="0">Seleccione un colaborador</option>
		                    	<?php 
		                        	foreach ($dt1 as $dta): 
		                        		?>
		                        			<option  value="<?php echo $dta[idpersonal]?>"><?php echo ' [ '.$dta[pe_dni].' ] '.$dta[pe_apellidos].$dta[pe_nombres]?></option>
		                        		<?php
									endforeach;
		                        ?>
	                        </select>
	                    </div>
	                    <div class="col-md-12"><br></div>
	                   	<div class="col-md-12">
	                   		<textarea class="form-control" placeholder ="Ingresa  un motivo" name="descrip"></textarea><br>
	                   	</div>
                    </form>
                     
				</div>
		
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-info" type="button" onclick="vAjax('caja','insert1','frm1')">
		<i class="fa fa-save"></i>
		<b> GUARDAR</b>
	</button>					
	<button class="btn btn-default" data-dismiss="modal">
		<b>CERRAR</b>
	</button>
</div>