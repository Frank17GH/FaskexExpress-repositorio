<?php if($dt1){
        	foreach ($dt1 as $dta): 
         ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title"><center><b><?php echo "Entrega : ".$dta[etiqueta]; ?></b></center></h6>
</div>


<div class="modal-body">
	<div class="row">
		<div class="col-sm-4" >
			<div class="alert alert-info fade in">			
				<label><b>Persona   : </b> <?php echo $dta[persona]; ?> </label><br>
				<label><b>Dni       : </b> <?php echo $dta[dni]; ?> </label><br>
				<label><b>Telefono  : </b> <?php echo $dta[telefono]; ?> </label><br>
				<label><b>Direccion : </b> <?php echo $dta[direccion]; ?> </label><br>
				<label><b>Referencia: </b> <?php echo $dta[referencia]; ?> </label><br>
				<label><b>Distrito  : </b> <?php echo $dta[distrito]; ?> </label><br><br><br><br>
			</div>
		</div>

		<div class="col-sm-4" style="<?php echo ($dta['estado']=='6')? 'display:' : 'display:none' ?>;" >
			<div class="alert alert-warning fade in">			
				<label><b>MOTIVO   : </b> <?php echo $dta[motivo]; ?> </label><br>
				<label><b>TIPO       : </b> <?php echo $dta[tipo]; ?> </label><br>
				<label><b>INMUEBLE  : </b> <?php echo $dta[inmueble]; ?> </label><br>
				<label><b>PISOS : </b> <?php echo $dta[piso]; ?> </label><br>
				<label><b>COLOR: </b> <?php echo $dta[color]; ?> </label><br>
				<label><b>PUERTA  : </b> <?php echo $dta[puerta]; ?> </label><br>
				<label><b>OBSERVACIONES  : </b> <?php echo $dta[observaciones]; ?> </label><br><br>
                 <label><b>FECHA  : </b> <?php echo $dta[fecha]; ?> </label><br><br>
				<br>
			</div>
		</div>

        <div class="col-sm-4" style="<?php echo ($dta['estado']=='7')? 'display:' : 'display:none' ?>;" >
            <div class="alert alert-success fade in">                         
                <label><b>OBSERVACIONES  : </b> <?php echo $dta[observaciones]; ?> </label><br><br>
                 <label><b>FECHA  : </b> <?php echo $dta[fecha]; ?> </label><br><br>
                <br>
            </div>
        </div>

		<form class="form-horizontal" id="form1" role="form" name="form1" > 
		 <input type="hidden" name="idapoyo" id="idapoyo" value="<?php echo $dta[idapoyo]; ?>"> 

		<div class="col-md-4" style="<?php echo ($dta['estado']=='5')? 'display:' : 'display:none' ?>;">
            <div class="panel panel-success">
              <div class="panel-heading">CONDICION DE ENTREGA</div>
              <div class="panel-body">
                            
                    <div class="col-md-12" style="padding-bottom: 10px ;">
                        <label><b>CONDICION</b></label>
                        <div >                                   
                             <select class="form-control" name="estado"  onchange="mostrar($(this).val());" >
                                <option >[Seleccione] </option>
                                <option value="7">Entregado </option>
                                <option value="6">Motivado</option>                                         
                            </select>                  
                        </div>
                    </div>  

                    <div style="display: none;" id="div_6">

                    <div class="col-md-6" style="padding-bottom: 10px ;">
                    <label ><b> MOTIVO</b></label>
                    <div >
                        <select class="form-control" name="motivo" >
                            <option value="0" >[Seleccionar Motivo]</option>
                            <option value="Se Mudo">Se Mudo</option>
                            <option value="Dir. errada">Dir. errada</option>                                         
                            <option value="No vive allí">No vive allí</option>                                         
                            <option value="Casa deshabitada">Casa deshabitada</option>                                         
                            <option value="Rechazado">Rechazado</option>                                         
                            <option value="Ausente">Ausente</option>                                         
                            <option value="Desconocido">Desconocido</option>                                         
                            <option value="Ya no labora">Ya no labora</option>                                         
                            <option value="Dir. incompleta">Dir. incompleta</option>                                                                                                                         
                        </select>
                    </div>
                </div>

                <div class="col-md-6" style="padding-bottom: 10px ;"><label ><b>TIPO </b></label>
                    <div >                                       
                        <select class="form-control" name="tipo">                                       
                            <option value="0">[Seleccionar TIpo]</option>
                            <option value="Titular">Titular</option>
                            <option value="Familiar">Familiar</option>                                         
                            <option value="Empleada">Empleada</option>                                         
                            <option value="Vigilante">Vigilante</option>                                         
                            <option value="Sello">Sello</option>                                         
                            <option value="buzón">buzón</option>                                         
                            <option value="Bajo puerta">Bajo puerta</option>                                         
                        </select>
                    </div>
                </div>

                <div class="col-md-6" style="padding-bottom: 10px ;"><label><b>INMUEBLE</b></label>
                    <div >       
                        <select class="form-control" name="inmueble" >
                            <option value="0">[Seleccionar Inmueble]</option>
                            <option value="Casa">Casa</option>
                            <option value="Departamento">Departamento</option>                                         
                            <option value="Edificio">Edificio</option>                                         
                            <option value="Quinta">Quinta</option>                                         
                            <option value="Fabrica">Fabrica</option>
                        </select>   
                    </div>
                </div>

                <div class="col-md-6" style="padding-bottom: 10px ;"><label><b>PISOS</b></label>
                    <div >       
                        <select class="form-control" name="piso" >
                            <option value="0">[Seleccione Pisos]</option>
                            <option value="Uno">Uno</option>
                            <option value="Dos">Dos</option>                                         
                            <option value="Tres">Tres</option>                                         
                            <option value="Cuatro">Cuatro</option>                                         
                            <option value="5 a mas">5 a mas </option>                                                                              
                        </select>                                              
                    </div>
                </div>

                 <div class="col-md-6" style="padding-bottom: 10px ;"><label><b>COLOR</b></label>
                    <div >       
                        <select class="form-control" name="color" >
                            <option value="0">[Seleccione Color]</option>
                            <option value="Verde">Verde</option>
                            <option value="Crema">Crema</option>                                         
                            <option value="Blanco">Blanco</option>                                         
                            <option value="Rojo">Rojo</option>                                         
                            <option value="Ladrillo">Ladrillo</option>                                   
                            <option value="Otros">Otros</option>                                           
                        </select>                                              
                    </div>
                </div>

                 <div class="col-md-6" style="padding-bottom: 10px ;"><label><b>PUERTA</b></label>
                    <div >       
                        <select class="form-control" name="puerta" >
                            <option value="0">[Seleccione Puerta]</option>
                            <option value="Madera">Madera</option>
                            <option value="Vidrio">Vidrio</option>
                            <option value="Metal">Metal</option>                                         
                        </select>                                              
                    </div>
                </div>
                </div>
                <div class="col-md-12">
                    <label ><b>OBSERVACIONES</b></label>
                      <div class="has-success">  
                        <textarea name="observaciones" placeholder="Observaciones" class="form-control "></textarea> 
                     </div>
                </div> 
                 <div class="modal-footer" >
                <br>
                 <button class="btn btn-primary" type="button" onclick="vAjax('cargo','cre_despacho','form1');">
                        <i class="fa fa-save"></i>
                        Guardar
                    </button> 
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-4" style="<?php echo ($dta['estado']=='5')? 'display:' : 'display:none' ?>;">
            <div class="panel panel-success">
              <div class="panel-heading">CARGO</div>
              <div class="panel-body">                
                  <div class="col-md-12">
                        <label ><b>SELECCIONAR IMAGEN</b></label>
                          <div class="has-success">  
                           <input type="file" name="file" id="file" class="form-control">
                         </div>
                    </div>
                    <div class="col-md-12">                         
                          <div class="has-success"> 
                             <img id="imgC" src="/./../app/recursos/img/img_base.png" style="margin-top: 15px; width: 100%; height: 270px;">                              
                         </div>
                         <input type="hidden" name="cargo" id="imgTxt">
                    </div>                  
              </div>
            </div>
        </div>  

    	</form>

		<div class="col-sm-4" style="<?php echo ($dta['estado']=='6' || $dta['estado']=='7' )? 'display:' : 'display:none' ?>;" >                         
	        <div class="alert alert-default fade in">	
	            <img id="imgC" src="<?php echo $dta[cargo]; ?>" style="margin-top: 15px; width: 100%; height: 270px;">
	        </div>
	    </div>

	</div>

</div>

</div>

<?php endforeach; } ?>

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