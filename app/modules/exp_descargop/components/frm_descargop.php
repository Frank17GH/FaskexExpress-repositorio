<?php 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();    
?>
	<div class="row" style="padding: 10px;">		
		
	    <div class="col-md-4 mb-2">
	    	<label class="control-label"><b>Mensajero</b></label>		
	        <div class="form-group has-primary">
	            <div class="col-md-12">
	                <div class="input-group">
	                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
	                    <select class="form-control"  id="responsable" name="idpersonal" onchange="vAjax('exp_descargop','tbl_descargop_pendientes',$(this).val(),'tbl_temp_descargop_pendietnes');vAjax('exp_descargop','tbl_descargop',$(this).val(),'tbl_temp_descargop');" >
	                        <option value="">[Seleccionar Mensajero]</option>
	                        <?php 	
	                            foreach ($dt1 as $dta1): 
			                        ?><option value="<?php echo $dta1['iddespacho'] ?>"><?php echo $dta1['responsable'] ?></option><?php 
			                    endforeach;
			                ?>
	                    </select>   
	                </div>
	            </div>
	        </div>
	    </div>	    	   
	    		    
	    <div class="col-md-3">  
	    	<label class="control-label"><b>Guia de Salida - orden / comprobante</b></label>
	        <div class="form-group has-primary">
	            <div class="col-md-12">
	                <input type="text" name="barra" id="nomC" class="form-control" placeholder="Codigo de barra" onkeypress="if(event.keyCode == 13){codigo($(this).val()); }" >   	                     
	            </div>
	        </div>
	    </div>

	    <div class="col-md-1 mb-2">
	    	<label class="control-label"><b>.</b></label>
	        <div class="form-group has-primary">
	            <div class="col-md-12">
	    			<button type="button" id="total" class="btn btn-sm btn-info" onclick="vAjax('exp_descargop','mod_Buscar',0,'modal3');">Historial</button>
	    		</div>
			</div>
	    </div>

	
	</div>	