<?php session_start();
	include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();
    $exc = $class->sel1('07');
?>
<div class="tabbable tabs-below">
	<form class="form-horizontal" id="frm1">
		<div class="col-md-12"><br>
		
			<div class="panel panel-default"><br>
				<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
					<div class="form-group" style="margin-bottom: 3px;">
						<label class="col-md-1 control-label"><b>Documento</b></label>
						<div class="col-md-2">
							<div class="icon-addon addon-md">
								<input placeholder="Documento" autofocus style="text-align: center;" class="form-control input-xs abb" id="docMod2" onkeyup="this.value = this.value.toUpperCase()" onkeydown=" if (event.ctrlKey){FNotas();}" name="numero" ondblclick="$('.abb').val('');$('#detnt').empty();$(this).attr('readonly', false);">
								<label for="email" style="padding: 4px 0;" class="glyphicon glyphicon-search input-xs " rel="tooltip" title="" data-original-title="docmod"></label>
								<input type="hidden" class="abb" name="idc" id="nidc">
							</div>
						</div>
						
						<div class="col-md-2">
							<select name="tdoc" id="tdoc2" class="form-control input-xs" onchange="TPNT()">
								<option value="07">07 | Nota de Crédito Electrónico</option>
								<option value="08">08 | Nota de Débito Electrónico</option>
							</select> <i></i> 
						</div>
						<div class="col-md-2">
							<input placeholder="# Serie" style="text-align: center;" name="ser" class="form-control input-xs" id="vSerie2" value="<?php echo $exc[0][ser] ?>" readonly="">
						</div>
						<div class="col-md-2">
							<input class="form-control input-xs" style="text-align: right;" readonly="" name="correlativo" id="vCorr2" value="<?php echo str_pad($exc[0][corr], 8, "0", STR_PAD_LEFT) ?>" placeholder="# Correlativo">
						</div>
						
						<label class="col-md-1 control-label"><b>Fecha</b></label>
						<div class="col-md-2">
							<input class="form-control input-xs" name="fecha" style="text-align: center" value="<?php echo date('Y-m-d') ?>" type="date" readonly>
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 3px;">
						<label class="col-md-1 control-label"><b>Cliente</b></label>
						<div class="col-md-7">
							<div class="input-group" style="width: 100%">
								<input class="form-control input-xs abb" id="nomClient2" type="text" readonly="" style="width: 100%">
							</div>
						</div>
						<label class="col-md-1 control-label"><b>RUC/ DNI</b></label>
						<div class="col-md-3">
							<div class="icon-addon addon-md">
								<input type="number" style="font-weight: bold;" class="form-control input-xs abb" id="numDni2" readonly="">
								<label for="email" style="padding: 4px 0;" class="glyphicon glyphicon-search input-xs abb" rel="tooltip" title="" data-original-title="email"></label>
							</div>
						</div>
					</div>
					<div class="form-group" style="    margin-bottom: 3px;">
						<label class="col-md-1 control-label"><b>Dirección</b></label>
						<div class="col-md-5">
							<div class="input-group" style="width: 100%">
								<input type="text" style="font-weight: bold;width: 100%" class="form-control input-xs abb" id="dir2" readonly="">
							</div>
						</div>
						<label class="col-md-1 control-label"><b>E-mail</b></label>
						<div class="col-md-5">
							<div class="input-group" style="width: 100%">
								<input type="text" style="font-weight: bold;width: 100%" class="form-control input-xs abb" id="corr2" readonly="">
							</div>
						</div>
						<input type="hidden" name="tipo" id="v_tipo" tabindex="-1" value="1">
					</div>
				</div><br>
			</div>
			<div class="page">
				<div class="panel panel-default"><br>
					<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
						<div class="form-group" style="margin-bottom: 3px;">
							<label class="col-md-1 control-label"><b>Motivo</b></label>
							<div class="col-md-3">
								<select class="form-control input-xs sview" tabindex="-1" id="mtNot" name="motivo" onchange="MOTNT();">
								    <option value="01">Anulación de la operación</option>
								    <option value="02"> Anulación por error en el RUC</option>
								<!--    <option value="03"> Corrección por error en la descripción</option>-->
								    <option value="04">Descuento global</option> 

								  <!--  <option value="05">Descuento por Item</option> -->
								
									<option value="06">Devolución total</option>
								<!--
								    <option value="07">Devolución por Item</option>
								    <option value="08">Bonificación</option>
								    <option value="09">Disminución en el valor</option>
								-->
								</select>
								<select class="form-control input-xs sview" tabindex="-1" id="motDebito" style="display: none" name="mtDebit">
								    <option value="01">Interes por mora </option>
								    <option value="02">Aumento en el valor </option>
								    <option value="03">Penalidades</option>
								</select>
							</div>
							<label class="col-md-1 control-label"><b>Glosa</b></label>
							<div class="col-md-7">
								<textarea style="width: 100%" tabindex="-1" name="glosa" id="nglos" class="form-control input-xs abb"></textarea>
							
							</div>
						</div>
					</div><br>
				</div>
			</div>
			<!-- DETALLES -->
						<input type="hidden" name="dt">
		</div>
		<div class="page" id="iddtnt">
			<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;height: 160px;margin-top: 10px;overflow: auto;"><form>
				<table class="table">
					<thead>
						<tr class="encabezado">
							<th><center>Código</center></th>
							<th><center>Cantidad</center></th>
							<th style="width:100%;"><center>Producto</center></th>
							<th><center>Total</center></th>
						</tr>
					</thead>
					<tbody id="detnt"></tbody>
				</table>
		    </div>
		</div>
		<div class="page">
			<div class="panel panel-default">
				<div class="panel-body" style="padding-bottom: 0px; padding-top: 10px;">
					
					<div class="form-group" style="    margin-bottom: 3px;">
						<label class="col-md-8 control-label" style="text-align: left;">
							
						</label>
						<label class="col-md-1 control-label"><b>I.G.V</b></label>
						<div class="col-md-3">
							<div class="input-group">
								<span class="input-group-addon" style="padding: 0px 10px;"><b>S/.</b></span>
								<input class="form-control input-xs" type="text" id="nigv" style="text-align: right;" readonly="">
								<span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group" style="    margin-bottom: 3px;">
						<div class="col-md-3">
							
						</div>
						<label class="col-md-5 control-label" style="text-align: left;"></label>
						<label class="col-md-1 control-label"><b>Sub Total</b></label>
						<div class="col-md-3">
							<div class="input-group">
								<span class="input-group-addon" style="padding: 0px 10px;"><b>S/.</b></span>
								<input class="form-control input-xs" id="nsubt" type="text" style="text-align: right;" readonly="">
								<span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group" style="    margin-bottom: 3px;">
						<label class="col-md-8 control-label" style="text-align: left;"></label>
						<label class="col-md-1 control-label"><b>Total</b></label>
						<div class="col-md-3">
							<div class="input-group">
								<span class="input-group-addon" style="padding: 0px 10px;"><b>S/.</b></span>
								<input class="form-control input-xs abb" id="ntotal" name="total" type="text" value="0" style="text-align: right;" onkeyup="dGlob()" readonly="">
								<span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
							</div>
						</div>
					</div>
					<label class="col-md-12 control-label"><br></label>
					<div class="form-group" style="margin-bottom: 3px;">
						<label class="col-md-3 control-label" style="text-align: left;">
							
						</label>
						<label class="col-md-6 control-label"><br></label>
						<label class="col-md-3 control-label" style="text-align: right;">
							<button class="btn btn-default" type="button" onclick="gh()">
								Limpiar
							</button>
							<button class="btn btn-primary"	id="nscomp" onclick="savNota();return false;">
								<i class="fa fa-save"></i>
									Guardar
							</button>
						</label>
					</div>
				</div>
			</div>
		</div>
	</form>	
</div>

<script>
	function TPNT(){
		$("#vCorr2").val('');$("#vSerie2").val('');
		$.getJSON('app/modules/notas/components/data.php?t=1&tipo='+$("#tdoc2").val(),function(data){
			$.each(data, function(value){
				$("#vSerie2").val(this['ser']);
				$("#vCorr2").val(this['corr']);
			});
		});
		if ($("#tdoc2").val()=='07') {
			$('#mtNot').show();$('#motDebito').hide();
			
		}else{
			$('#mtNot').hide();$('#motDebito').show();
			$('#iddtnt').hide();$("#ntotal").attr('readonly', false).select();
		}
	}
	function MOTNT(){
		if($('#mtNot').val()=='04'){
				$( "#ntotal" ).prop( "readonly", false ).select();
			}else{
				$( "#ntotal" ).prop( "readonly", true );
			}
	}
	function savNota(){
		if ($('#nidc').val()=='') {
			aviso('danger','Selecciona un Comprobante electrónico válido.');$('#nidc').select();
		}else if ($('#nglos').val()=='') {
			aviso('danger','Ingresa el motivo por el cual se emite la nota');$('#nglos').select();
		}else if ($('#vSerie2').val()=='') {
			aviso('danger','No existe una Serie asociada a este local.');
		}else{
			confir('Confirmacion de emisión!','¿Seguro que deseas emitir esta nota?','notas','emitir','frm1');
		}
		return false;
	}
	function FNotas(){
		$.getJSON('app/modules/notas/components/data.php?t=2&id='+$("#docMod2").val(),function(data){
			$.each(data, function(value){
				if (this['nc']==1) {												
					$('#numDni2').val(this['doc']);
					$("#nomClient2").val(this['nom']);
	                $("#dir2").val(this['dir']);
	                $("#corr2").val(this['corr']);
	                $("#ntotal").val(this['total']);
	                $("#nidc").val(this['id']);
                    $("#docMod2").attr('readonly', true);
                    $("#detnt").html('<tr id="trn_0" class="class="encabezado"">'+
								'<td>'+
									'<div class="input-group" style="width: 100px;">'+
										'<input style="text-align: center;" class="form-control input-xs" value="00" readonly>'+
									'</div>'+
								'</td>'+
								'<td>'+
									'<input class="form-control input-xs" value="1" style="width: 60px;text-align: center" readonly>'+
								'</td>'+
								'<td>'+
									'<div class="input-group" style="width:100%">'+
										'<textarea class="form-control input-xs" style="resize:none; height: 24px;width:100%"  rows="1" readonly>'+this['des']+'</textarea>'+
									'</div>'+
								'</td>'+
								'<td>'+
									'<div class="icon-addon addon-md">'+
										'<input class="form-control input-xs cxl" value="'+this['total']+'" style="width:90px;text-align: right;">'+
										'<label style="padding: 4px 0;" class="glyphicon  input-xs"><b>S/.</b></label>'+
									'</div>'+
					            '</td>'+
								
					        '</tr>');
                    TPNT();
				} else {
					aviso('danger','Este Documento ya cuenta una Nota de Credito');
				}
			});
		});
	}
</script>