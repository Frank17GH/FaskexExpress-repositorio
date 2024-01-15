<script type="text/javascript">$('#div-modal4').empty()</script>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title"><?php $logo=""; if ($_SESSION[fasklog][idgiros]==97){$logo=97; }elseif ($_SESSION[fasklog][idgiros]==95) {
		$logo=95;
	}elseif ($_SESSION[fasklog][idgiros]==96) {
		$logo=96;
	}  ?>
	<span id="logo"> <img src="app/recursos/img/<?php echo $logo;?>.png" alt="SmartAdmin" style="margin-top: -15px; width: 160px;"> </span>
	<center><b>NUEVO CLIENTE</b></center></h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" action="javascript: vAjax('clientes','insert2','frm3'); " id="frm3">
						<input type="hidden" name="tp" value="<?php echo ($s02==3)?'':$s02; ?>">
						<input type="hidden" name="id" value="0">
						<fieldset>
							<div class="col-md-12">
								<div class="">
								    	<div class="form-group">
											<div class="col-md-6">
												<label>Tipo Doc.Identidad <font style="color: red">*</font></label>
												<div class="input-group input-group-md" style="width: 100%">
												    <select class="form-control" id="stdoc" name="tdoc" onchange="scamb()">
												    	<option value="1">DNI</option>
												    	<option value="6">RUC</option>
												    	<option value="4">PASAPORTE</option>
												    </select>
												</div>
											</div>
											<div class="col-md-6">
												<label>Número</label>
												<div class="input-group input-group-md">
												    <div class="icon-addon addon-md">
												        <input placeholder="#" name="doc" id="Dnni" value="" class="form-control" required="">
												    </div>
												    <span class="input-group-btn">
													    <button class="btn btn-default" type="button" onclick="buscaN($('#Dnni').val())">
													    	<i class="glyphicon glyphicon-search"></i> <font id="desb">RENIEC</font>
													    </button>
													</span>
												</div>
											</div>
											
											<div class="col-md-5"></div>
										</div>
										<div class="form-group">
											<div class="col-md-6">
												<label>Nombre<font style="color: red">*</font></label>
												<input class="form-control" name="nom" id="verNom" placeholder="Empresa Ejemplo S.R.L" required="">
											</div>
											<div class="col-md-6">
												<label>Nombre Comercial</label>
												<input class="form-control" name="nomCom" value="-" required="">
											</div>
										</div>
										<div class="form-group" style="display: none">
											<div class="col-md-2">
												<label>Giro</label>
												<input class="form-control" id="ciiu" name="ciiu" placeholder="####">
											</div>
											<div class="col-md-10">
												<label>Actividad Economica</label>
												<input class="form-control" id="vgiro" name="giro" placeholder="NOMBRE DE ACTIVIDAD ECONOMICA">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-4">
						                        <select class="form-control input-xs" id="prov2" onchange="provi($(this).val(),'idprov2')">
						                            <option value="0">Seleccione un Departamento</option>
						                            <?php 
						                                $class = new Mod();
						                                $ts = $class->sel1($dt);
						                                foreach ($ts as $ts1): 
						                                    ?><option value="<?php echo $ts1[iddepartamento] ?>"><?php echo $ts1[nombre] ?></option><?php
						                                 endforeach;
						                            ?>
						                        </select>
						                    </div>
						                    <div class="col-md-4">
						                        <select class="form-control input-xs" id="idprov2" onchange="dist($(this).val(),'iddist2')">
						                            <option value="0">Seleccione un Departamento</option>
						                        </select>
						                    </div>
						                    <div class="col-md-4">
						                        <select class="form-control input-xs" id="iddist2" name="recibe_dist">
						                            <option value="0">Seleccione una Provincia</option>
						                        </select>
						                    </div>
										</div>
										<div class="form-group">
											
											<div class="col-md-12">
												<label>Dirección</label>
												<textarea class="form-control" id="verDirr" name="dir" placeholder="Av. Ejemplo #99 Br Ejemplo" rows="2"></textarea>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-6">
												<label>Teléfonos</label>
												<input class="form-control" id="verTell" name="tel" placeholder="999999999 - 999999999">
											</div>
											<div class="col-md-6">
												<label>Fijo</label>
												<input class="form-control" name="fijo" placeholder="999 99 999">
											</div>
										</div>
										<div class="form-group">
											
											<div class="col-md-12">
												<label>Correo</label>
												<input class="form-control" name="corr" placeholder="ejemplo@web.com">
											</div>
										</div>
										
										
								</div>
							</div>
							<button style="display: none;" id="sub_mitR" type="submit"></button>
						</fieldset>
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
<script>$('#Dnni').val($('#numDni<?php echo ($s02==3)?'':$s02; ?>').val()).select();sel2('prov2');sel2('idprov2');sel2('iddist2');</script>