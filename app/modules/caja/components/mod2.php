<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>NUEVO MOVIMIENTO</b></h4>
</div>

<div class="modal-body"><div class="row">
	<div class="col-md-12">
		<div role="content">
            <br>
            <form id="frm2">
            	<input type="hidden" value="<?php echo $s02 ?>" name="caja">
                <input type="hidden" name="tipo" value="2">

	            <div class="col-md-6">
	            	<label><b>Fecha y hora de la op.</b></label>
	                 <input type="datetime-local" name="fecha" class="form-control" value="<?php echo date("Y-m-d\TH:i:s");?>">
				</div>
	            <div class="col-md-6">
	            	<label><b>Monto a desemboldar S/.</b></label>
	                <input type="text" class="form-control" placeholder="monto > S/. 0.00" name="monto">
	            </div>
	            <div class="col-md-12"><br></div>
	            <div class="col-md-12">
	               	<label><b>Colaborador que recibe el dinero</b></label>
	                <select class="form-control" name="personal">
	                    <option value="0">Seleccione un colaborador</option>
	                    <?php 
	                       	foreach ($dt1 as $dta): 
	                        	?><option  value="<?php echo $dta[idpersonal]?>"><?php echo ' [ '.$dta[pe_dni].' ] '.$dta[pe_apellidos].', '.$dta[pe_nombres]?></option><?php
							endforeach;
	                    ?>
	                </select>
	            </div>
	            <div class="col-md-12"><br></div>
	            <div class="col-md-12">
	                <label><b>Nomenclatura de la Op. ha realizarse</b></label>
	                <select class="form-control" name="nomen">
	                    <option value="0">Seleccione una nomenclatura</option>
	                     <?php 
	                        foreach ($dt2 as $dta2): 
	                        	?><option value="<?php echo $dta2[idnomenclatura]?>"><?php echo $dta2[no_nombre]?></option><?php
							endforeach;
	                     ?>
	                </select>
	            </div>
	            <div class="col-md-12"><br></div>
	            <div class="col-md-12">
	                <select class="form-control" name="giro">
	                 	<option value="1">FASKLOG</option>
	                 	<option value="2">FASKEX</option>
	                 	<option value="3">MAZINKA</option>
	                </select>
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
	<button class="btn btn-info" type="button" onclick="vAjax('caja','insert1','frm2')">
		<i class="fa fa-save"></i>
		<b> GUARDAR</b>
	</button>					
	<button class="btn btn-default" data-dismiss="modal">
		<b>CERRAR</b>
	</button>
</div>