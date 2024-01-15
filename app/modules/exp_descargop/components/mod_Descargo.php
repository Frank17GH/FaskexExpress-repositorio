<?php 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();    
?>
<div class="modal-header" style="padding: 10px;">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title">DESCARGO DE SOBRE/PAQUETE</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<form class="form-horizontal" action="javascript: vAjax('exp_descargop','upd_Entrega','frm10'); " id="frm10">
					
					<input type="text" value="<?php echo $dt1[0]['tipo'] ?>" name="tipo">					
					<input type="text" value="<?php echo $dt1[0]['idapoyo']?>" name="idapoyo" >
					<input type="text" value="<?php echo $dt1[0]['codigo'] ?>"  name="iddespachotemp">
				
					<fieldset>
						<div class="form-group">
							<div class="col-md-4">
								<label><b>CONSIGNADO</b></label>
								<input type="text" class="form-control" name="" value="<?php echo $dt1[0]['de_nombre'] ?>" readonly="">
							</div>
							<div class="col-md-2">
								<label><b>DNI</b></label>
								<input type="text" class="form-control" name="" value="<?php echo $dt1[0]['de_ruc'] ?>" readonly="">
							</div>
							<div class="col-md-2">
								<label><b>FECHA</b></label>
								<input type="date" style="text-align: center;" class="form-control" name="fecha" value="<?php echo date('Y-m-d') ?>">			
							</div>
							<div class="col-md-2">
								<label><b>HORA</b></label>
								<input type="time" style="text-align: center;" class="form-control" value="<?php echo date('H:i:s') ?>" name="hora">			
							</div>
							<div class="col-md-2">
								<label><b>SERIE - CORRELATIVO</b></label>
								<input type="text" class="form-control" style="text-align: center;" value="<?php echo $dt1[0][etiqueta]; ?>" readonly>							
							</div>
							<div class="col-md-12" style="margin-top: 8px"></div>													
							
							<div class="col-md-3">
								<label><b>ESTADO</b></label>
								<select class="form-control" name="idestado" onchange="ocultar(3);mostrar($(this).val());"  required>
				                    <option value="">[SELECCIONAR ESTADO ]</option>
				                    <option value="4" <?php if($dt1[0][dd_estado]==4){echo 'selected';} ?>>ENTREGADO</option>
				                    <option value="3" <?php if($dt1[0][dd_estado]==3){echo 'selected';} ?>>MOTIVADO</option>
				                </select> 
							</div>

							<div class="col-md-3" style="display: <?php echo ($dt1[0][dd_estado]==4)?'none':'' ;?>;" id="div_3" >
								<label><b>MOTIVO</b></label>
								<select class="form-control " id="idmotivo" name="idmotivo" >
				                    <option value="0">[SELECIONAR MOTIVO]</option>
				                    <?php 
			                        $ts = $class->sel_Motivo();
			                        foreach ($ts as $ts1): 
			                            ?><option value="<?php echo $ts1['idmotivo'] ?>"
			                            	<?php echo ($ts1[idmotivo]==$dt1[0][motivo])?'selected':''; ?>>
			                            	<?php echo $ts1[mo_descripcion] ?></option><?php 
			                         endforeach;
			                    	?> 
				                </select>
							</div>
							<div class="col-md-3">
								<label><b>ENTREGA</b></label>
								<select class="form-control " id="identrega" name="identrega" required>
				                    <option value="">[SELECCIONAR ENTREGA]</option>
				                     <?php 
			                        $ts = $class->sel_Entrega();
			                        foreach ($ts as $ts1): 
			                            ?><option value="<?php echo $ts1['identrega'] ?>" 
			                            	<?php echo ($ts1[identrega]==$dt1[0][entrega])?'selected':''; ?>>
			                            	<?php echo $ts1[en_descripcion] ?></option><?php 
			                         endforeach;
			                    	?> 
				                </select>
							</div>
							<div class="col-md-3">
								<label><b>OBSERVACIONES</b></label>								 
						        <div class="form-group has-primary">
						            <input type="text" name="nota" class="form-control" value="<?php echo $dt1[0][nota] ?>" >   	
						        </div>
							</div>

							<div class="col-md-12"><br></div>	

							<div class="col-md-4" >
								<div class="col-md-12">
			                        <label ><b>SELECCIONAR IMAGEN</b></label>
			                          <div class="has-default">  
			                           <input type="file" name="file" id="file" class="form-control">
			                         </div>
					               </div>
					            <div class="panel panel-default">
					              
					              <div class="panel-body">                
					                  
					                    <div class="col-md-12">                         
					                          <div class="has-success"> 
					                             <img id="imgC" src="<?php echo ($dt1[0][img1])? $dt1[0][img1] :'/./../app/recursos/img/img_base.png' ; ?>  " style="margin-top: 15px; width: 100%; height: 250px;">                              
					                         </div>
					                         <input type="hidden" name="img1" id="imgTxt">
					                    </div>                  
					              </div>
					            </div>
					        </div>

					        <div class="col-md-4" >
								<div class="col-md-12">
			                        <label ><b>SELECCIONAR IMAGEN</b></label>
			                          <div class="has-default">  
			                           <input type="file" name="file2" id="file2" class="form-control">
			                         </div>
					               </div>
					            <div class="panel panel-default">
					              
					              <div class="panel-body">                
					                  
					                    <div class="col-md-12">                         
					                          <div class="has-success"> 
					                             <img id="imgC2" src="<?php echo ($dt1[0][img2])? $dt1[0][img2] :'/./../app/recursos/img/img_base.png' ; ?>  " style="margin-top: 15px; width: 100%; height: 250px;">                              
					                         </div>
					                         <input type="hidden" name="img2" id="imgTxt2">
					                    </div>                  
					              </div>
					            </div>
					        </div>	

					        <div class="col-md-4" >
								<div class="col-md-12">
			                        <label ><b>SELECCIONAR IMAGEN</b></label>
			                          <div class="has-default">  
			                           <input type="file" name="file3" id="file3" class="form-control">
			                         </div>
					               </div>
					            <div class="panel panel-default">
					              
					              <div class="panel-body">                
					                  
					                    <div class="col-md-12">                         
					                          <div class="has-success"> 

					                             <img id="imgC3" src="<?php echo ($dt1[0][img3])? $dt1[0][img3] :'/./../app/recursos/img/img_base.png' ; ?>  " style="margin-top: 15px; width: 100%; height: 250px;">                              
					                         </div>
					                         <input type="hidden" name="img3" id="imgTxt3">
					                    </div>                  
					              </div>
					            </div>
					        </div>

					        <div class="col-md-4" style="display: none;" >
								<div class="col-md-12">
			                        <label ><b>SELECCIONAR IMAGEN</b></label>
			                          <div class="has-default">  
			                           <input type="file" name="file4" id="file4" class="form-control">
			                         </div>
					               </div>
					            <div class="panel panel-default">
					              
					              <div class="panel-body">                
					                  
					                    <div class="col-md-12">                         
					                          <div class="has-success"> 
					                             <img id="imgC4" src="<?php echo ($dt1[0][img4])? $dt1[0][img4] :'/./../app/recursos/img/img_base.png' ; ?>  " style="margin-top: 15px; width: 100%; height: 250px;">                              
					                         </div>
					                         <input type="hidden" name="img4" id="imgTxt4">
					                    </div>                  
					              </div>
					            </div>
					        </div>																				
						</div>						
					</fieldset>

					<div class="modal-footer" style="display: <?php echo ($dt1[0][dd_estado]==4)?'none':'' ;?>;">
						<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit" type="button" >
							<i class="fa fa-save"></i>
							Guardar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>
	

<script type="text/javascript">
    document.getElementById('file').onchange=function(e){

    var reader = new FileReader()
    reader.readAsDataURL(e.target.files[0]);

    reader.onload=function(){        
        var imagen = document.getElementById("imgC");
        var imgTxt = $("#imgTxt");
        imagen.setAttribute('src', reader.result);
        imgTxt.val(reader.result);  

    }
}
</script>
<script type="text/javascript">
    document.getElementById('file2').onchange=function(e){

    var reader = new FileReader()
    reader.readAsDataURL(e.target.files[0]);

    reader.onload=function(){        
        var imagen = document.getElementById("imgC2");
        var imgTxt = $("#imgTxt2");
        imagen.setAttribute('src', reader.result);
        imgTxt.val(reader.result);  

    }
}
</script>
<script type="text/javascript">
    document.getElementById('file3').onchange=function(e){

    var reader = new FileReader()
    reader.readAsDataURL(e.target.files[0]);

    reader.onload=function(){        
        var imagen = document.getElementById("imgC3");
        var imgTxt = $("#imgTxt3");
        imagen.setAttribute('src', reader.result);
        imgTxt.val(reader.result);  

    }
}
</script>
<script type="text/javascript">
    document.getElementById('file4').onchange=function(e){

    var reader = new FileReader()
    reader.readAsDataURL(e.target.files[0]);

    reader.onload=function(){        
        var imagen = document.getElementById("imgC4");
        var imgTxt = $("#imgTxt4");
        imagen.setAttribute('src', reader.result);
        imgTxt.val(reader.result);  

    }
}
</script>
