<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>NUEVO LOCAL</b></h4>
</div>
<div class="modal-body">
	<form class="form-horizontal" action="javascript: savLoc(); " id="frm1">
		<div class="row">
			<div role="content">
				<div class="widget-body">
					<input type="hidden" name="tp" value="0">
					<div class="col-md-12">	
						<div class="col-md-12">		
							<fieldset>
								<input name="authenticity_token" type="hidden">
								<div class="form-group">
									<label><b>Código</b></label>
									<input class="form-control" placeholder="Código obtenido en SUNAT de la clave sol." name="codigo">
								</div>
								<div class="form-group">
									<label><b>GIRO</b></label>
									<select class="form-control" name="giro">
				                        <?php 
				                        	foreach ($dt1 as $dta1):
				                        		?><option value="<?php echo $dta1[idgiros]?>"><?php echo $dta1[gi_nombre]?></option><?php
				                        	endforeach; 
				                        ?>
				                    </select>
								</div>
								<div class="form-group">
									<label><b>ABREVIATURA</b></label>
									<input class="form-control" id="idabrev" name="abreviatura">
								</div>
								<div class="form-group">
									<label><b>DIRECCION</b></label>
									<input class="form-control" id="iddir" name="direccion">
								</div>
								<div class="form-group">
									<label><b>CORREO</b></label>
									<input class="form-control" name="correo">
								</div>
								
								<div class="form-group">
									<label><b>DEPARTAMENTO</b></label>
									<select class="form-control input-xs" id="prov" onchange="provi($(this).val(),'idprov')">
				                        <option value="0">Seleccione un Departamento</option>
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
								<div class="form-group">
									<label><b>PROVINCIA</b></label>
									<select class="form-control input-xs" id="idprov" onchange="dist($(this).val(),'iddist')">
				                        <option value="0">Seleccione un Departamento</option>
				                    </select>
								</div>
								<div class="form-group">
									<label><b>DISTRITO</b></label>
									<select class="form-control input-xs" id="iddist" name="ciudad" onchange="kilo_($(this).val());">
				                        <option value="0">Seleccione una Provincia</option>
				                    </select>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			
			<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>Guardar</button>
			<button class="btn btn-default" onclick="$('#myModal').modal('hide');">Cancelar</button>
		</div>
	</form>
</div>
<script type="text/javascript">sel2('prov',1);sel2('idprov',1);sel2('iddist',1);</script>