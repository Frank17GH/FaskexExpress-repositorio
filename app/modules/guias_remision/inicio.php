<?php session_start();
		include '../../recursos/db.class.php';
	    include '.Model.php';
	    $class = new Mod();
	    $class2 = new Mod();
	    $dt1 = $class->viajes(0);
	    $dt2 = $class2->series(0);
	?>
<div class="tabbable tabs-below">
	<div class="col-md-12"><br>
		<form class="form-horizontal" id="frmGuia" method="post">
			<div class=" col-md-12">
				<div class="panel panel-default">
					<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
						<div class="col-md-3">
							<b>Tipo de Guía</b>
							<select  name="tipoGuia" class="form-control input-xs" style="width: 100%;">
								<option value="31">Transportista</option>
								<option value="09">Remitente</option>
							</select>
						</div>
						<div class="col-md-3">
							<b>Serie</b>
							<select  name="serie" class="form-control input-xs" style="width: 100%;">
								<?php 
									foreach ($dt2 as $serie) {
										?>
											<option value="<?php echo $serie['nombre'] ?>">
												<?php echo $serie['nombre'] ?>
											</option>
										<?php
									}
								 ?>
							</select>
						</div>
						<div class="col-md-3">
							<b>Fecha de Emisión</b>
							<input type="date" class="form-control input-xs" name="fechaEmision" value="<?php echo date('Y-m-d') ?>">
						</div>
						<div class="col-md-3">
							<b>Fecha de Traslado</b>
							<input type="date" class="form-control input-xs" name="fechaTraslado" value="<?php echo date('Y-m-d') ?>">
						</div>
						<div class="col-md-12">
							<br>
						</div>
					</div>
				</div>
			</div>

			<div class=" col-md-6">
				<div class="panel panel-default">
					<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
						<legend>Remitente</legend>
						<div class="col-md-8">
							<b>Nombres/Razón Social</b>
							<input class="form-control input-xs" name="origenNombre" id="nomClient2" type="text" readonly="">
							<input type="hidden" id="idClient2" name="remitente_id" value="0">
						</div>
						<div class="col-md-4">
							<b>Nro. Doc.</b>
							<input type="number" placeholder="#" name="origenDoc" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="numDni2" autofocus="" onkeydown=" if (event.keyCode === 13){FClient(0, 2);return false;}; ">
						</div>
						<div class="col-md-12">
							<br>
						</div>
					</div>
				</div>
			</div>
			<div class=" col-md-6">
				<div class="panel panel-default">
					<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
						<legend>Destinatario</legend>
						<div class="col-md-8">
							<b>Nombres/Razón Social</b>
							<input class="form-control input-xs" name="destinoNombre" id="nomClient3" type="text" readonly="">
							<input type="hidden" id="idClient3" name="remitente_id" value="0">
						</div>
						<div class="col-md-4">
							<b>Nro. Doc.</b>
							<input type="number" placeholder="#" name="destinoDoc" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="numDni3" autofocus="" onkeydown=" if (event.keyCode === 13){FClient(0, 3);return false;}; ">
						</div>
						<div class="col-md-12">
							<br>
						</div>
					</div>
				</div>
			</div>


			<div class=" col-md-12">
				<div class="panel panel-default">
					<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
						<legend>Viaje</legend>
						<div class="col-md-12">
							<select name="viaje" class="form-control input-sm" onchange="busqViaje($(this).val())" style="width: 100%;">
								<option value="0">Seleccione</option>
								<?php 
									foreach ($dt1 as $viaje) {
										?>
											<option value="<?php echo $viaje['id'] ?>">
												<?php echo '['.strtoupper($viaje['d1']).'] '.$viaje['origen'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a 
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '['.strtoupper($viaje['d2']).'] '.$viaje['destino'] ?>
											</option>
										<?php
					 				}
								 ?>
							</select>
						</div>
						<div class="col-md-12">
							<br>
						</div>
						<div class="col-md-6">
							<label><b>Dirección Partida</b></label>
							<textarea class="form-control" rows="1" id="g_idOrigen" name="origen"></textarea>
						</div>
						<div class="col-md-6">
							<label><b>Dirección Llegada</b></label>
							<textarea class="form-control" rows="1" id="g_idDestino" name="destino"></textarea>
						</div>
						<div class="col-md-12">
							<br>
						</div>
					</div>
				</div>
			</div>
			<div class=" col-md-12">
				<div class="panel panel-default">
					<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
						<legend>Información del transporte</legend>
						<div class="col-md-3">
							<b>Placa</b>
							<div class="input-group">
								<input class="form-control input-xs" name="vehiculoPlaca1" id="numPlaca2" type="text">
								<input type="hidden" id="idPlaca2" name="placa_id" value="0">
								<div class="input-group-btn">
									<button class="btn btn-default input-xs" onkeydown=" if (event.keyCode === 13){busqPlaca(2);}" type="button">
										<i class="fa fa-search"></i>
									</button>
									<button class="btn btn-default input-xs" type="button" onclick="vAjax('guias_remision','viewPlacas',0,'modal1');">
										<i class="fa fa-list"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<b>Descripción del Vehiculo</b>
							<input type="text" placeholder="<- Seleccione ó busque por placa" name="vehiculoDescripcion1" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="nomVehi2" readonly="">
						</div>
						<div class="col-md-3">
							<b>Licencia</b>
							<div class="input-group">
								<input class="form-control input-xs" name="conductorLicencia1" id="numDni4" type="text" onkeydown=" if (event.keyCode === 13){FClient(0, 4, 1);}">
								<input type="hidden" id="idClient4" name="licencia_id" value="0">
								<div class="input-group-btn">
									<button class="btn btn-default input-xs" onclick="FClient(0, 4, 1);" type="button">
										<i class="fa fa-search"></i>
									</button>
									<button class="btn btn-default input-xs" type="button" onclick="vAjax('guias_remision','viewChoferes',0,'modal1');">
										<i class="fa fa-list"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<b>Nombres del Conductor</b>
							<input type="text" placeholder="<- Seleccione o busque por Nro. Dni" name="conductorNombres1" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="nomClient4" readonly="">
						</div>
						<div class="col-md-12">
							<br>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-2">
				<b>¿Quien Paga?</b>
				<select  name="quienPaga" class="form-control input-xs" style="width: 100%;">
					<option value="1">Remitente</option>
					<option value="2">Destinatario (Contra Entrega)</option>
				</select>
			</div>
			<div class="col-md-2">
				<b>Unidad de Medida</b>
				<select  name="unidadMedida" class="form-control input-xs" style="width: 100%;">
					<option value="KGM">Kilogramo</option>
					<option value="TNE">Tonelada</option>
				</select>
			</div>
			<div class="col-md-2">
				<b>Peso</b>
				<input type="number" id="idpeso" style="text-align: center;" class="form-control input-xs" name="peso">
			</div>
			<div class="col-md-2">
				<b>Medio de pago</b>
				<select class="form-control input-xs valid" name="medioPago" aria-invalid="false">
					<option value="1">Efectivo</option>
					<option value="2">Credito</option>
					<option value="3">Tarjeta</option>				                           
				</select>
			</div>
			<button style="display: none;" id="subGuia" type="submit"></button>
		</form>
	</div>
	<div class="page">
		<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;height: 200px;margin-top: 10px;overflow: auto;"><form id="frm_bienes">
			<table class="table" id="tabprod">
				<thead>
					<tr class="encabezado">
						<td colspan="6"><b><center>Bienes a Transportar</center></b></td>
					</tr>
					<tr class="encabezado">
						<th style="width: 120px;"><center>Código</center></th>
						<th><center>Nombre del Bien</center></th>
						<th style="width: 120px;"><center>U.M</center></th>
						<th style="width: 5px;"><center>Cantidad</center></th>
						<th style="width: 160px;"><center>Doc. Referencia</center></th>
						<th style="width: 80px;"><center>Flete</center></th>
						<th style="width: 5px;"><center>Acciones</center></th>
					</tr>
				</thead>
				<tbody id="bienes"></tbody>
				<tbody>
					<div id="div-Pend"></div>
						<tr class="encabezado">
							<td>
								<input class="form-control input-xs" name="guia_codigoprod" id="guia_codigoprod_0" value="0" type="number" min="0" style="width: 100%;text-align: center">
							</td>
							<td>
								<textarea id="guia_nomprod_0" name="guia_nomprod" type="text" class="form-control input-xs" style="resize:none; height: 24px"  rows="1"></textarea>
							</td>
							<td>
								<select id="guia_medidaprod_0" name="guia_medidaprod" class="form-control input-xs" style="width: 100%;">
									<option value="NIU">Unidad</option>
								</select>
							</td>
							<td>
								<input id="guia_cantprod_0" name="guia_cantprod" class="form-control input-xs" placeholder="#" style="width: 100%; text-align: right;">
				            </td>
				            <td>
								<input id="guia_docref_0" name="guia_docref" class="form-control input-xs" placeholder="Gr - t001-1" style="width: 100%; text-align: right;">
				            </td>
				            <td>
								<input id="guia_flete_0" name="guia_flete" class="form-control input-xs" placeholder="0.00" style="width: 100%; text-align: right;">
				            </td>
							<td id="add0" class="acciones" style="padding: 8px 1px;">
								<ul class="demo-btns text-center">
									<li style="width: 100%">
										<a class="btn btn-default input-xs" onclick="FGuia(3);" id="add0" style="width:100%">
											<span class="glyphicon glyphicon-ok"></span>
										</a>
									</li>
								</ul>
							</td>
				        </tr>
				</tbody>  
			</table>
	    </div>
	</div>
	<div class="page">
		<div class="panel panel-default">
			<div class="panel-body" style="padding-bottom: 0px; padding-top: 10px;">
				<label class="col-md-12 control-label"><br></label>
				<div class="form-group" style="    margin-bottom: 3px;">
					<label class="col-md-3 control-label" style="text-align: left;">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="envio" class="checkbox style-0" checked="checked">
								<span>Imprimir Comprobante</span>
							</label>
						</div>
					</label>
					<label class="col-md-6 control-label"><br></label>
					<label class="col-md-3 control-label" style="text-align: right;">
						<button class="btn btn-default" type="button" onclick="gh()">
							Limpiar
						</button>
						<button class="btn btn-primary"	id="idBtnSave1" onclick="$('#subGuia').click();">
							<i class="fa fa-save"></i>
							Guardar
						</button>
					</label>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.error{
            color: red;
        }
</style>
<script type="text/javascript">
	$('#frmGuia').validate({
                rules: {
                    "origenDoc": {
                        required: true
                    },
                    "origen": {
                        required: true
                    },
                    "destino": {
                        required: true
                    },
                    "vehiculoPlaca1": {
                        required: true
                    },
                    "conductorLicencia1": {
                        required: true
                    },
                    "peso": {
                        required: true,
                        min: 1
                    },
                    "fechaEmision": {
                        required: true
                    },
                    "fechaTraslado": {
                        required: true
                    },
                    "viaje": {
                        min: 1
                    }
                },
                messages: {
                    "origen": {
                        required: "Obligatorio"
                    },
                    "destino": {
                        required: "Obligatorio"
                    },
                    "origenDoc": {
                        required: "Nro. Documento"
                    },
                    "vehiculoPlaca1": {
                        required: "Obligatorio"
                    },
                    "conductorLicencia1": {
                        required: "Obligatorio"
                    },
                    "peso": {
                        required: "Obligatorio",
                        min: "Mayor a 0"
                    },
                    "fechaEmision": {
                        required: "Obligatorio"
                    },
                    "fechaTraslado": {
                        required: "Obligatorio"
                    },
                    "viaje": {
                        min: "Selecciona un viaje"
                    },
                },
                submitHandler: function (form) { // for demo
                	$('#idBtnSave1').prop('disabled', true);
                    vAjax('guias_remision','guardar','frmGuia');
                    return false;
                }
            });

	FGuia(4);
	function gh(){
		$("#guia_codigoprod_0").val('');
		$("#guia_nomprod_0").val('');
		$("#guia_medidaprod_0").val('');
		$('#guia_cantprod_0').val('1');
		$('#idBtnSave1').prop('disabled', false);
		$("#numPlaca2").val('');
		$("#nomVehi2").val('');
		$("#numDni4").val('');
		$("#nomClient4").val('');
		$("#g_idOrigen").val('');
		$("#g_idDestino").val('');
	}
	function FGuia(st,id=0){
		switch(st){
			case 0:
				$("#guia_codigoprod_0").val('');
				$("#guia_nomprod_0").val('');
				$("#guia_medidaprod_0").val('');
				$('#guia_cantprod_0').val('1');
			break;
		case 1:
				$("#guia_codigoprod_0").val('');
				$("#guia_nomprod_0").val('');
				$("#guia_medidaprod_0").val('');
				$('#guia_cantprod_0').val('1');
			break;
			case 3:
				if ($('#guia_nomprod_0').val()=='') {
					aviso('danger','Ingrese un bien válido.');
					$("#guia_nomprod_0").css("border-color", "#c46a69");
					$("#guia_nomprod_0").select();
					$("#cantprod_0").removeAttr( 'style' );
				}else if ($('#guia_cantprod_0').val()==0) {
					aviso('danger','Ingrese una cantidad mayor a cero');
					$("#guia_cantprod_0").css("border-color", "#c46a69");
					$("#guia_cantprod_0").select();
				}else{ 
					$('#add0').prop('disabled', true);
					vAjax('guias_remision','addprod','frm_bienes');
					//	vAjax('facturacion','addprod',$('#codprod_0').val()+'-/'+$('#cantprod_0').val()+'-/'+$('#nomprod_0').val()+'-/'+$('#precio_prod_0').val());
				}
			break;
			case 4:
				$("#bienes").empty();
				$.getJSON(_mod+'guias_remision/data.php?t=7',function(data){
					$.each(data, function(value){
						$("#bienes").append('<tr class="dato" id="tr_'+this['id']+'">'+
											'<td>'+
												'<input class="form-control input-xs" id="guia_codigoprod_'+this['id']+'" value="'+this['cod']+'" value="0" type="number" min="0" style="width: 100%;text-align: center" readonly>'+
											'</td>'+
											'<td>'+
												'<textarea id="guia_nomprod_'+this['id']+'" type="text" class="form-control input-xs" style="resize:none; height: 24px"  rows="1" tabindex="-1" readonly>'+this['bien']+'</textarea>'+
											'</td>'+
											'<td>'+
												'<input class="form-control input-xs" id="guia_medidaprod_'+this['id']+'" value="'+this['medida']+'" type="text"  style="width: 100%;text-align: center" readonly>'+
											'</td>'+
											
											'<td style="text-align:right">'+
												'<input id="guia_cantprod_'+this['id']+'" value="'+this['cantidad']+'" class="form-control input-xs" placeholder="#" style="width: 100%; text-align: right;" tabindex="-1" readonly>'+
											'</td>'+
											'<td style="text-align:right">'+
												'<input id="guia_flete_'+this['id']+'" name="guia_docref" value="'+this['docref']+'" class="form-control input-xs" placeholder="Gr - t001-1" style="width: 100%; text-align: right;" tabindex="-1" readonly>'+
											'</td>'+
											'<td style="text-align:right">'+
												'<input id="guia_docref_'+this['id']+'" name="guia_flete" value="'+this['flete']+'" class="form-control input-xs" placeholder="Gr - t001-1" style="width: 100%; text-align: right;" tabindex="-1" readonly>'+
											'</td>'+
											'<td id="add0" class="acciones" style="padding: 8px 1px;">'+
												'<ul class="demo-btns text-center">'+
													'<li style="width: 100%">'+
														'<a class="btn btn-default input-xs" onclick="vAjax(\'guias_remision\',\'delbien\','+this['id']+')" style="width:100%">'+
															'<span class="glyphicon glyphicon-remove"></span>'+
														'</a>'+
													'</li>'+
												'</ul>'+
										    '</td></tr>');
					});
					$('#add0').prop('disabled', false);
				});
			break;
		}
	}
	function buscaPlaca(placa, des, id){
		$('#numPlaca2').val(placa);
		$('#nomVehi2').val(des);
		$('#idPlaca2').val(id);
		$('#myModal').modal('hide');
	}
	function busqViaje(id){
    $.getJSON(_mod+'guias_remision/data.php?t=4&viaje='+id,function(data){
        $.each(data, function(value){
            $("#numPlaca2").val(this['placa']);
            $("#idPlaca2").val(this['idVehiculo']);
            $("#nomVehi2").val(this['vehiculo']);
            $("#g_numLicencia").val(this['chofer_licencia']);
            $("#idClient4").val(this['idChofer']);
            $("#nomClient4").val(this['chofer']);
            $("#numDni4").val(this['chofer_dni']);
            $("#g_idOrigen").val(this['origen_direccion']);
            $("#g_idDestino").val(this['destino_direccion']);
        });
    });
}
</script>