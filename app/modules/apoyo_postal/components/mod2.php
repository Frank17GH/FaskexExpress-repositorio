<div class="modal-header" style="    padding: 10px;">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title">DIGITACIÓN DE DOCUMENTOS</h4>
</div>

<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" action="javascript: vAjax('apoyo_postal','update2','frm1'); " id="frm1">
						<?php if($dt1){ foreach ($dt1 as $dta): ?>
						
						<fieldset>
							<div class="col-md-12">
						    	<div class="form-group">
						    		<div class="col-md-12">
						    			<strong class="col-md-3" style="padding-top: 5px;">Empresa <font style="color: red">*</font></strong>
										<input class="form-control col-md-9 " name="empresa"  value="<?php echo $dta['ap_empresa'] ?>">
						    		</div>
						    		<div class="col-md-8" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Destinatario <font style="color: red">*</font></strong>
										<input class="form-control col-md-12 " name="persona"  value="<?php echo $dta['persona'] ?>">
						    		</div>
						    		<div class="col-md-4" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Teléfono <font style="color: red">*</font></strong>
										<input class="form-control col-md-12" name="telefono"  value="<?php echo $dta['telefono'] ?>">
						    		</div>

						    		<div class="col-md-6" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Dirección <font style="color: red">*</font></strong>
										<input class="form-control col-md-12" name="direccion"  value="<?php echo $dta['direccion'] ?>">
						    		</div>						    		

						    		<div class="col-md-6" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Referencia <font style="color: red">*</font></strong>
										<input class="form-control col-md-12" name="referencia"  value="<?php echo $dta['referencia'] ?>">
						    		</div>

						    		<div class="col-md-4" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Departamento <font style="color: red">*</font></strong>
										<select class="form-control input-xs" id="prov" onchange="provi($(this).val(),'idprovi');datos($('#prov option:selected').text(),'departamento');">
					                        <option value="<?php echo substr($dta['ap_ubigeo'] , 0, -4); ?>"><?php echo ($dta['ap_departamento']!=''?$dta['ap_departamento']:'Seleccione') ?>
					                        <option value="01">AMAZONAS</option>
					                        <option value="02">ÁNCASH</option>
					                        <option value="03">APURÍMAC</option>
					                        <option value="04">AREQUIPA</option>
					                        <option value="05">AYACUCHO</option>
					                        <option value="06">CAJAMARCA</option>
					                        <option value="07">CALLAO</option>
					                        <option value="08">CUSCO</option>
					                        <option value="09">HUANCAVELICA</option>
					                        <option value="10">HUÁNUCO</option>
					                        <option value="11">ICA</option>
					                        <option value="12">JUNIN </option>
					                        <option value="13">LA LIBERTAD</option>
					                        <option value="14">LAMBAYEQUE</option>
					                        <option value="15">LIMA</option>
					                        <option value="16">LORETO</option>
					                        <option value="17">MADRE DE DIOS</option>
					                        <option value="18">MOQUEGUA</option>
					                        <option value="19">PASCO</option>
					                        <option value="20">PIURA</option>
					                        <option value="21">PUNO</option>
					                        <option value="22">SAN MARTÍN</option>
					                        <option value="23">TACNA</option>
					                        <option value="24">TUMBRES</option>
					                        <option value="25">UCAYALI</option>
				                    </select>
						    		</div>

						    		<div class="col-md-4" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Provincia <font style="color: red">*</font></strong>

										<select class="form-control input-xs" id="idprovi" onchange="dist($(this).val(), 'iddist'); datos($('#idprovi option:selected').text(),'provincia')">
				                        
				                        <option value="<?php echo substr($dta['ap_ubigeo'] , 0, -4); ?>"><?php echo ($dta['ap_provincia']!=''?$dta['ap_provincia']:'Seleccione') ?>
	            						</option>

				                    	</select>

						    		</div>	
						    		<div class="col-md-4" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Distrito <font style="color: red">*</font></strong>
										<select class="form-control input-xs" id="iddist" onchange="datos($(this).val(),'ubigeo');datos($('#iddist option:selected').text(),'distrito') ">
				                        <option value="<?php echo substr($dta['ap_ubigeo'] , 4, 0); ?>"><?php echo ($dta['ap_distrito']!=''?$dta['ap_distrito']:'Seleccione') ?>
	            						</option>
				                    	</select>
						    		</div>

						    		<input type="hidden" name="departamento" id="departamento" value="<?php echo $dta['ap_departamento'] ?>">
						    		<input type="hidden" name="provincia" id="provincia" value="<?php echo $dta['ap_provincia'] ?>">
						    		<input type="hidden" name="distrito" id="distrito" value="<?php echo $dta['ap_distrito'] ?>">
						    		<input type="hidden" name="idapoyo"  value="<?php echo $s02; ?>">
						    		<input type="hidden" name="idorden"  value="<?php echo $dta['idorden']; ?>">

						    		<div class="col-md-4" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Ubigeo <font style="color: red">*</font></strong>
										<input class="form-control col-md-12" name="ubigeo" id="ubigeo"  value="<?php echo $dta['ap_ubigeo'] ?>">
						    		</div>	

						    		<div class="col-md-4" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Codigo Postal <font style="color: red">*</font></strong>
										<input class="form-control col-md-12" name="codpostal"  value="<?php echo $dta['ap_codpostal'] ?>">
						    		</div>

						    		<div class="col-md-4" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Peso <font style="color: red">*</font></strong>
										<input class="form-control col-md-12" name="peso"  value="<?php echo $dta['ap_peso'] ?>">									
						    		</div>

						    		<div class="col-md-8" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Cargo <font style="color: red">*</font></strong>
										<input class="form-control col-md-12 " name="ap_cargo"  value="<?php echo $dta['ap_cargo'] ?>">
						    		</div>
						    		<div class="col-md-4" style="padding-top: 10px;">
						    			<strong class="col-md-12" style="padding-top: 5px;">Código <font style="color: red">*</font></strong>
										<input class="form-control col-md-12" name="ap_codigo"  value="<?php echo $dta['ap_codigo'] ?>">
						    		</div>
						    		
								</div>
							</div>
							<button style="display: none;" id="sub_mitR" type="submit"></button>
						</fieldset>
						<?php endforeach; } ?>					
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="$('#sub_mitR').click();">
			<i class="fa fa-save"></i>
			Guardar
		</button>
	</div>
</div>

<script>
	sel2('prov',5);sel2('idprovi',5);sel2('iddist',5);
	function datos(id,id2) {
		$('#'+id2).val(id);
	}

</script>