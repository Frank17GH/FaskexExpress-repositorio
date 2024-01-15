<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h5 class="modal-title" id="myModalLabel"><b>DETALLE DE LOCAL</b></h5>
</div>
<div class="modal-body">
	<form class="form-horizontal" action="javascript: savLoc() " id="frm1">
		<div class="row">
			<div role="content">
				<div class="widget-body">
					
					<div class="col-md-12">
						<div class="col-md-12">
							<fieldset>
								<?php 
						            if($dt1){
						                foreach ($dt1 as $data): ?>
											<input type="hidden" name="tp" value="<?php echo $data['idlocales']; ?>">
											<div class="form-group">
												<label><b>CÓDIGO</b></label>
												<input class="form-control disp" type="text" name="codigo" value="<?php echo $data[lo_codigo]; ?>" disabled>
											</div>
											
											
											<div class="form-group">
												<label><b>ABREVIATURA</b></label>
												<input class="form-control disp" value="<?php echo mb_strtoupper($data[lo_abreviatura]); ?>" name="abreviatura" disabled>
											</div>
											<div class="form-group">
												<label><b>GIRO</b></label>
												<select class="form-control" name="giro">
							                        <?php 
							                        	foreach ($dt2 as $dta2):
							                        		?><option value="<?php echo $dta2[idgiros]?>" <?php echo ($dta2[idgiros]==$data[idgiros])?'selected':''; ?>><?php echo $dta2[gi_nombre]?></option><?php
							                        	endforeach; 
							                        ?>
							                    </select>
											</div>
											<div class="form-group">
												<label><b>DIRECCIÓN</b></label>
												<input class="form-control disp" value="<?php echo mb_strtoupper($data[lo_direccion]); ?>" name="direccion" disabled>
											</div>
											<div class="form-group">
												<label><b>CORREO</b></label>
												<input class="form-control disp" value="<?php echo mb_strtoupper($data[lo_mail]); ?>" name="correo" disabled>
											</div>
											<div class="form-group">
												<label><b>DEPARTAMENTO</b></label>

												<select class="form-control input-xs disp" id="prov" onchange="provi($(this).val())" disabled="">
							                        <option value="0">Seleccione un Departamento</option>
							                        <?php 
							                        	$class = new Mod();
            											$fdep = $class->sel1(); 
            											foreach ($fdep as $dep):
            												?><option value="<?php echo $dep[iddepartamento] ?>" <?php echo ($dep[iddepartamento]==substr($data[dist], 0, -4))?'selected':''; ?>><?php echo $dep[nombre] ?></option><?php
            											endforeach; 
							                        ?>
							                    </select>
											</div>
											<div class="form-group">
												<label><b>PROVINCIA</b></label>
												<select class="form-control input-xs disp" id="idprov" onchange="dist($(this).val())" disabled="">
							                        <option value="0">Seleccione un Departamento</option>
							                        <?php 
							                        	$class = new Mod();
							                        	if(!$data[dep]){$data[dep]=0;}
            											$fdep = $class->sel2(substr($data[dist], 0, -4)); 
            											foreach ($fdep as $prov):
            												?><option value="<?php echo $prov[idprovincia] ?>" <?php echo ($prov[idprovincia]==substr($data[dist], 0, -2))?'selected':''; ?>><?php echo $prov[nombre] ?></option><?php
            											endforeach; 
							                        ?>
							                    </select>
											</div>
											<div class="form-group">
												<label><b>DISTRITO - <?php echo $data[dist] ?></b></label>
												<select class="form-control input-xs disp" id="iddist" name="ciudad" onchange="kilo_($(this).val());" disabled="">
							                        <option value="0">Seleccione una Provincia</option>
							                        <?php 
							                        	$class = new Mod();
							                        	if(!$data[prov]){$data[prov]=0;}
            											$fdep = $class->sel3($data[dist]); 
            											foreach ($fdep as $dist):
            												?><option value="<?php echo $dist[iddistrito] ?>" <?php echo ($dist[iddistrito]==$data[dist])?'selected':''; ?>><?php echo $dist[nombre] ?></option><?php
            											endforeach; 
							                        ?>
							                    </select>
											</div>
											<div class="form-group">
												<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
												<table class="table table-striped table-bordered table-hover" id="dtable2" width="100%">
												    <thead>
												        <tr>
												            <th data-hide="esconder" style="width:5px">Cod</th>
												            <th data-class="expand">Descripcion</th>
												            <th data-hide="esconder">Series</th>
												        </tr>
												    </thead>
												    <tbody>
												        <tr>
												            <td>01</td>
												            <td>Facturas</td>
												            <td>
												                <?php 
												                    $class = new Mod();
												                    $ser = $class->vser2($s02,'01');
												                    if($ser[0][series]){
												                        echo $ser[0][series];
												                    }else{
												                    	?><i>No existen series asociadas</i><?php
												                    }
												                ?>
												            </td>
												            
												        </tr>
												        <tr>
												            <td>03</td>
												            <td>Boletas</td>
												            <td>
												                <?php 
												                    $class = new Mod();
												                    $ser = $class->vser2($s02,'03');
												                    if($ser[0][series]){
												                        echo $ser[0][series];
												                    }else{
												                    	?><i>No existen series asociadas</i><?php
												                    }
												                ?>
												            </td>
												        </tr>
												        <tr>
												            <td>07</td>
												            <td>Notas Crédito</td>
												            <td>
												                <?php 
												                    $class = new Mod();
												                    $ser = $class->vser2($s02,'07');
												                    if($ser[0][series]){
												                        echo $ser[0][series];
												                    }else{
												                    	?><i>No existen series asociadas</i><?php
												                    }
												                ?>
												            </td>
												        </tr>
												        <tr>
												            <td>08</td>
												            <td>Notas de Débito</td>
												            <td>
												                <?php 
												                    $class = new Mod();
												                    $ser = $class->vser2($s02,'08');
												                    if($ser[0][series]){
												                        echo $ser[0][series];
												                    }else{
												                    	?><i>No existen series asociadas</i><?php
												                    }
												                ?>
												            </td>
												        </tr>
												        <tr>
												            <td>99</td>
												            <td>Orden de Servicio</td>
												            <td>
												                <?php 
												                    $class = new Mod();
												                    $ser = $class->vser2($s02,'99');
												                    if($ser[0][series]){
												                        echo $ser[0][series];
												                    }else{
												                    	?><i>No existen series asociadas</i><?php
												                    }
												                ?>
												            </td>
												        </tr>
												    </tbody>
												</table>
											</div>
									 	<?php endforeach; 
							        }
							    ?>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-primary" type="button" onclick="$(this).hide();$('.edit').show();$('.disp').prop('disabled', false)"><i class="fa fa-edit"></i> Editar</button>
			<button class="btn btn-danger edit" type="button" onclick="confir('Eliminacion','¿Seguro que deseas eliminar el cliente seleccionado?','configuracion-general','del1',<?php echo $data['idlocales']; ?>,'remove');" style="display: none"><i class="fa fa-remove"></i> Eliminar</button>
			<button class="btn btn-primary edit" type="submit" style="display: none"><i class="fa fa-save"></i> Guardar</button>
			<button class="btn btn-default" data-dismiss="modal"> Cancelar</button>
		</div>
	</form>
</div>
<script type="text/javascript">sel2('prov',1);sel2('idprov',1);sel2('iddist',1);</script>