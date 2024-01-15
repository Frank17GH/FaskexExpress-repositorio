<div class="modal-header" style="padding: 10px;">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel">Agregar Servicios</h4>
</div>


<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="widget-body">
					<form class="form-horizontal" >
					<fieldset>
						<div class="form-group">
							<!-- SELECCIONAR SERVICIO-->
							<div class="col-md-4">
								<label>Servicios</label>
								<select class="form-control input-xs" id="ser" onchange="nomen($(this).val(),'idnomen')">
								<option value="0">Seleccione Servicio</option>
									<?php 
										if ($dt1) {$cc=0; 
											foreach ($dt1 as $dta1):
											if(!$cc){$cc=$dta1[idservicios];} 
												?>
													<option value="<?php echo $dta1[idservicios] ?>"><?php echo $dta1[se_descripcion] ?></option>
												<?php
											endforeach; 
										}
									?>
								</select>
								<script type="text/javascript">sel2('ser')</script>									
							</div>
							<!-- FIN   -->
							<!-- SELECCIONAR NOMENCLATURA-->
							<div class="col-md-4">
								<label>Nomenclatura</label>									
	                     		<select class="form-control input-xs" id="idnomen" onchange="ambito($(this).val(),'idambito')">
		                        	<option value="0">Nomenclatura</option>
	    		                </select>
	    		                <script type="text/javascript">sel2('idnomen')</script>
							</div>
							<!-- FIN   -->
							<!-- SELECCIONAR AMBITO-->
							<div class="col-md-4" style="text-align: center;">
                                <label><b>AMBITO</b></label>
                                <select class="form-control input-xs" id="idambito" onchange="subpro($(this).val(),'idsubpro')">
                            		<option value="0">Seleccionar Nomenclatura</option>
                        		</select >
                        		<script type="text/javascript">sel2('idambito')</script>
                            </div> 
                           	<!-- FIN   -->                              	
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<select  class="form-control" id="idsubpro" onchange="vAjax('cotizacion','mod3',$(this).val(),'prods'); ">
									<option value="0">Sub-Servicios</option>
								</select>
							</div>
						</div>
						
						<div class="well well-sm well-light col-sm-12" style="    padding: 0px;">
                        	<div class="col-md-12">
	                        	<legend style="    font-size: 14px;">
	                        		<span class="glyphicon glyphicon-shopping-cart"></span> DETALLE
	                        	</legend>
		                    </div>			                    

		                    <div class="col-md-12" id="div-prods" >		                        
	                           		                        			                        
		                    </div>
                    	</div>					
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<div class="view">
	
		<button class="btn btn-default"  data-dismiss="modal">
			<i class="fa fa-remove"></i>
			Cerrar
		</button>
	</div>
</div>

<script>
    function nomen(id,id2){
    $('#select2-idnomen-container').html('Seleccione Nomenclatura');
    $('#select2-idambito-container').html('Seleccione Ambito');
    $('#idsubpro').html('');
    det='';$('#'+id2).empty();
    $.ajax({
        url: "app/modules/cotizacion/components/data.php?t=1&id="+id,
        dataType: 'json', //tipo de datos retornados
        type: 'post' //enviar variables como post
    }).done(function (data){
        $.each($.parseJSON(JSON.stringify(data)), function(){ 
            det+='<option  value="'+this['id']+'">'+this['value']+'</option>';
        });
        $('#'+id2).html(det);
    }).fail(function(){
        $('#'+id2).empty();
    });
}

function ambito(id,id2){
        det='';$('#'+id2).empty();$('#select2-idambito-container').html('Seleccione Ambito');
        $('#idsubpro').html(' ');
        $.ajax({
            url: "app/modules/cotizacion/components/data.php?t=2&id="+id,
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
               det+='<option  value="'+this['id']+'">'+this['value']+'</option>';
            });
            $('#'+id2).html(det);
        }).fail(function(){
            $('#'+id2).empty();
        });
    }
    function subpro(id,id2){
        det='';$('#'+id2).empty();$('#idsubpro').html('Seleccione Sub-Servicio');
        $.ajax({
            url: "app/modules/cotizacion/components/data.php?t=3&id="+id,
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
               det+='<option  value="'+this['id']+'">'+this['value']+'</option>';
            });
            $('#'+id2).html(det);
        }).fail(function(){
            $('#'+id2).empty();
        });
    }
</script>

