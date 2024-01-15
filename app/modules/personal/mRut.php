<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title"><center><b>NUEVO DESPACHO</b></center></h6>
</div>


<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">

				<div class="jarviswidget-editbox">
				</div>

				<div class="widget-body">
					
					<form class="form-horizontal" id="frm2">
						<fieldset>
					    	<div class="form-group" style="padding: 15px">

					    		<div class="col-md-3">
									<label ><b> ENTREGA</b></label>
									<div class="has-success">
									
									<select class="form-control"  name="ambito">
										<option value="1">LOCAL</option>
										<option value="2">NACIONAL</option>											
									</select>
								
									</div>
								</div>
								
								<div class="col-md-3"><label ><b>TIPO PERSONAL </b></label>
									<div class="has-success">										
											<select class="form-control"  name="personal">
												<option value="1">Motorisado</option>
												<option value="2">Mensajero</option>
												<option value="3">Agente</option>
											</select>
										
									</div>
								</div>

								<div class="col-md-6"><label><b>RESPONSABLE</b></label><div class="form-group has-success">
										<div class="input-group">
											<select class="form-control" name="mensajero" id="iddst" >
												<?php 
													if ($dt1) {
														foreach ($dt1 as $dta1): 
															?>
																<option value="<?php echo $dta1[idpersonal] ?>" ><?php echo '[ '.$dta1[pe_dni].' ] '.mb_strtoupper(utf8_encode($dta1[pe_apellidos].', '.$dta1[pe_nombres])) ?></option>

															<?php
														endforeach;
													}
												?>
											</select>										
										</div>
									</div>
								</div>
					    	
								<div class="col-md-3">
								<label><b>FECHA SALIDA</b></label>
								<input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d') ?>">
									
								</div>	
								<div class="col-md-3">
									<label><b>HORA SALIDA</b></label>
										<input type="time" class="form-control" style="text-align: center;" name="hora" value="<?php echo date('H:i') ?>" readonly>
								</div>	

								
								<div class="col-md-6">
									<label ><b>USUARIO</b></label>
									<span class="form-control">
										<?php echo ucwords(strtolower(explode(' ', $_SESSION['fasklog']['pe_nombres'])[0].' '.explode(' ', $_SESSION['fasklog']['pe_apellidos'])[0])); ?> 
								</span>
									
								</div>
								<div class="col-md-12">
								<br>
								</div>

								<!-- Lector Pistola -->
								<div class="col-md-12">
									<form class="form-horizontal" id="form1" role="form" name="form1" >									
										<div class="">
											<div class="panel panel-primary">
											    <div class="panel-heading" style="padding:10px;">
											    	AGREGAR COMPROBANTE
											    </div>
												<div class="panel-body" style="padding:10px;">								    						
													<input type="hidden" name="idapoyo" id="idapoyo">	
													<div class="col-md-3">
											    		<label><b>ORDEN / NUMERO</b></label>
												    	<div class="input-group">									
															<input type="" name="nomC" id="nomC" class="form-control" placeholder="OA01-00000012-1" onkeypress="if(event.keyCode == 13){ vPaquete();}">
														</div>
													</div>	
													<div class="col-md-3">
											    		<label><b>PERSONA</b></label>
												    	<div class="input-group">									
															<input type="" name="perC" id="perC" class="form-control" placeholder="PERSONA" readonly="">
														</div>
													</div>

													<div class="col-md-3">
											    		<label><b>DIRECCION</b></label>
												    	<div class="input-group">									
															<input type="" name="dirC" id="dirC" class="form-control" placeholder="Jr." readonly="">
														</div>
													</div>

													<div class="col-md-3">
											    		<label><b>DISTRITO</b></label>
												    	<div class="input-group">									
															<input type="" name="disC" id="disC" class="form-control" placeholder="" readonly="">
														</div>
													</div>

													<div class="col-md-3">
											    	<br>
												    	<div class="input-group">									
														<button type="button" class="btn btn-primary" style="padding: 10px;display: none;"  onclick="savReparto(); "
						           							>Agregar      
						          							</button> 
														</div>
													</div>	    									
								    			</div>
											</div>
										</div>							
									</form>
								</div>
								
								<!-- fin Pistola -->
								<br>

								 

								 <div class="row">
					<div id ="div-lista"></div>
					<script>vAjax('despacho','tabla2',0,'lista');</script> 
				</div>								 																
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="vAjax('despacho','cre_despacho','frm2');">
			<i class="fa fa-save"></i>
			Guardar
		</button>
	</div>
</div>

<script type="text/javascript">

function vPaquete(){

		var comprobante=$("#nomC").val();
		var idC=$("#idapoyo");		
		var perC=$("#perC"); 
		var dirC=$("#dirC"); 
		var disC=$("#disC"); 
		
		if (comprobante!='') {
			$.getJSON('app/modules/despacho/data.php?t=1&comp='+comprobante,function(data){
				$.each(data, function(value){
					aviso('info','Paquete  '+comprobante+'  encontrado');
						idC.val(this['idapoyo']);
						perC.val(this['persona']);
						dirC.val(this['direccion']);
						disC.val(this['distrito']);	
						savReparto(); 								
				});
				
			}).fail( function(d, textStatus, error) {   
               
                    aviso('warning','Paquete ya esta asignado o no disponible, :(');
         });
		}

		else{			
			aviso('danger','Ingresar Codigo');		
			$('#nomC').select();	
		}	
}

function savReparto(){
   if($('#nomC').val()==''){
		
		aviso('danger','Ingresa un Código Valido');
		$('#nomC').select();

	}else{	
		vAjax('despacho','saveDet','frm2');

	}
}



</script>