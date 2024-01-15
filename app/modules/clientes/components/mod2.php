<div class="modal-content" id="div-modal"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h4 class="modal-title"><center><b>DETALLE CLIENTE</b></center></h4>
	</div>

	<div class="modal-body">
		<div class="row">
			<form id="frms" class="form-horizontal">
				<input type="hidden" name="id" value="<?php echo $s02 ?>">
				<?php if($dt1){ $id=0;
                	foreach ($dt1 as $dta): 
                 ?>
					<div class="col-md-10">
						<div role="content">
							<div class="jarviswidget-editbox"></div>
							<div class="widget-body">
								<div  class="form-horizontal">
									<fieldset>											
										<div class="form-group">
											<strong class="col-md-2">
												<?php echo ($dta['cl_tipodoc']==1)?'D.N.I:':'R.U.C:'; ?>
											</strong>
											<div class="col-md-2 view">
												<span><?php echo $dta['cl_numdoc'] ?></span>
											</div>
											<div class="col-md-3 edit" style="display: none">
												<div class="input-group input-group-md">
												    <div class="icon-addon addon-md">
												        <input placeholder="#" name="doc" id="Dnni" value="<?php echo $dta['cl_numdoc'] ?>" class="form-control input-xs" required="">
												    </div>
												    <span class="input-group-btn">
													    <button class="btn btn-xs btn-default" type="button" onclick="buscaN($('#Dnni').val())">
													    	<i class="glyphicon glyphicon-search"></i>
													    </button>
													</span>
												</div>
											</div>
											<strong class="col-md-2"><?php echo ($dta['cl_tipodoc']==1)?'Nombres':'Razón Social'; ?>: </strong>
											<div class="col-md-5">
												<span class="view"><?php echo $dta['cl_nombres'] ?></span>
												<input class="form-control edit input-xs" id="verNom" name="nom" style="display: none" value="<?php echo $dta['cl_nombres'] ?>">
											</div>
										</div>

										<div class="form-group">
											<strong class="col-md-2">Teléfonos: </strong>
											<div class="col-md-2">
												<a  class="view" href="https://web.whatsapp.com/send?phone=51<?php echo $dta['cl_telefono'] ?>&text=" target="_blank"><img src="app/recursos/img/wp.png" width="22px"><?php echo $dta['cl_telefono'] ?></a>
												<input class="form-control edit input-xs" name="tel" style="display: none" value="<?php echo $dta['cl_telefono'] ?>">
											</div>
											<div class="col-md-2">													
												<a  class="view"  target="_blank" >
													<?php echo $dta['cl_fijo'] ?  : '# Fijo' ;?>
														
													</a> 
												<input class="form-control edit input-xs" name="fijo" style="display: none" value="<?php echo $dta['cl_fijo'] ?>" placeholer="#Fijo">
											</div>
											<strong class="col-md-1">Web: </strong>
											<div class="col-md-2">
												<span class="view"><a href="https://<?php echo $dta['cl_web'] ?>" target="_blank"><?php echo $dta['cl_web'] ?></a></span>
												<input class="form-control edit input-xs" name="web" style="display: none" value="<?php echo $dta['cl_web'] ?>">
											</div>

											<strong class="col-md-1">Correo: </strong>
											<div class="col-md-2">
												<span class="view"><?php echo $dta['cl_correo'] ?></span>
												<input class="form-control edit input-xs" name="correo" style="display: none" value="<?php echo $dta['cl_correo'] ?>">
											</div>
										</div>	

										<div class="form-group">
											<strong class="col-md-2">Giro: </strong>
											<div class="col-md-4 view">
												<span><?php echo '('.$dta['cl_ciiu'].') '.$dta['cl_giro'] ?></span>
											</div>

											<div class="edit" style="display: none">
												<div class="col-md-4">
													<input class="form-control input-xs" id="ciiu" name="ciiu" placeholder="####" value="<?php echo $dta['cl_ciiu'] ?>">
												</div>
												<div class="col-md-4">
													<input class="form-control input-xs" id="vgiro" name="giro" placeholder="NOMBRE DE ACTIVIDAD ECONOMICA" value="<?php echo $dta['cl_giro'] ?>">
												</div>
											</div>
										</div>
											
									</fieldset>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-2">							
						<div  class="form-horizontal">
							<fieldset>
								<div class="form-group">
									<div class="col-md-10">					
										<?php $img=""; ($dta['cl_tipodoc']==1)?$img="per":$img="emp"; ?>
										<img src="app/recursos/img/<?php echo $img;?>.png" style="width: 100%;">
									</div>				
								</div>
							</fieldset>
						</div>							
					</div>

					<div class="col-md-12">
						<div  class="form-horizontal">
							<fieldset>
							<div role="content">
								<div class="jarviswidget-editbox"></div>
								<div class="widget-body">
											<div class="form-group">
												<strong class="col-md-4">Departamento: </strong>
												<strong class="col-md-4">Provincia: </strong>
												<strong class="col-md-4">Distrito: </strong>								
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<select class="form-control input-xs" id="prov" onchange="provi($(this).val(),'idprov')">
						                            <option value="0">Seleccione un Departamento</option>
						                            <?php 
						                                $class = new Mod();
						                                $ts = $class->sel1();
						                                foreach ($ts as $ts1): 
						                                    ?><option value="<?php echo $ts1[iddepartamento] ?>" <?php echo ($ts1[iddepartamento]==$dta[iddepartamento])?'selected':''; ?>><?php echo $ts1[nombre] ?></option><?php
						                                 endforeach;
						                            ?>
						                        </select>
												</div>

												
												<div class="col-md-4">
													<select class="form-control input-xs" id="idprov" onchange="dist($(this).val(),'iddist')">
						                            <option value="0">Seleccione un Departamento</option>
						                            <?php 
								                        $class = new Mod();
								                        if(!$data[dep]){$data[dep]=0;}
	            										$fdep = $class->sel2($dta[iddepartamento]); 
	            										foreach ($fdep as $prov):
	            											?>
	            											<option value="<?php echo $prov[idprovincia] ?>" <?php echo ($prov[idprovincia]==$dta[idprovincia])?'selected':''; ?>><?php echo mb_strtoupper(utf8_encode($prov[nombre])) ?>
	            											</option><?php
	            										endforeach; 
								                    ?>
						                        </select>
												</div>

												
												<div class="col-md-4">
													<select class="form-control input-xs" id="iddist" name="recibe_dist">
							                            <option value="0">Seleccione una Provincia</option>
							                            <?php 
							                        		$class = new Mod();
            												$fdist = $class->sel3($dta[idprovincia]); 
            												foreach ($fdist as $dist):
            													?>
            													<option value="<?php echo $dist[iddistrito] ?>" <?php echo ($dist[iddistrito]==$dta[iddistrito])?'selected':''; ?>><?php echo mb_strtoupper(utf8_encode($dist[nombre])) ?>
            													</option>
            													<?php
            												endforeach; 
							                        	?>
							                        </select>
												</div>
											</div>

											<div class="form-group">
												<strong class="col-md-3">Dirección: </strong>
												<div class="col-md-8">
													<span class="view"><?php echo $dta['cl_direccion'] ?></span>
													<input class="form-control edit input-xs" id="verDirr" name="dir" style="display: none" value="<?php echo $dta['cl_direccion'] ?>">
												</div>
											</div>											
								</div>
							</div>
							</fieldset>
						</div>
					</div>
						
					<div class="col-md-12"></div>

					<div class="form-group">
						<div class="col-md-12"><hr style="width: 90%"></div>
					</div>

					<div class="form-group">
						<strong class="col-md-2">Creación: </strong>
						<div class="col-md-4">
							<span><?php echo $dta['user'] ?> <i>(<?php echo date("d/m/Y h:i a", strtotime($dta['cl_fecha_crea'])) ?>)</i></span>
						</div>
						<strong class="col-md-2">Modificación: </strong>
						<div class="col-md-4">
							<span><?php echo $dta['user2'] ?> <i>(<?php echo date("d/m/Y h:i a", strtotime($dta['cl_fech_mod'])) ?>)</i></span>
						</div>
					</div>
				<?php endforeach; } ?>
        	</form>

        	<div class="form-group">
				<div class="col-md-12"><hr style="width: 90%"></div>
			</div>

			<div class="col-sm-12">
				<div class="jarviswidget" id="wid-id-8" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">
					<header role="heading" style="    background: #ffffff;">
						<ul class="nav nav-tabs pull-right in">
							<li><a data-toggle="tab" href="#hb2" onclick="return false;"> Acceso </a></li>
							<li><a data-toggle="tab" href="#hb1" onclick="return false;"> Área </a></li>					
							<li class="active"><a data-toggle="tab" href="#hb4" onclick="vAjax('clientes','tbl_contacto',<?php echo $s02 ?>,'contacto');return false;"> Contactos</a></li>
						</ul>
						<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
					</header>

					<div role="content">
						<div class="tab-content">
					<!-- Acceso -->		
						<div class="tab-pane" id="hb2">
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<form id="acceso" action="javascript: vAjax('clientes','update_acceso','acceso'); ">
									<input type="hidden" name="id" value="<?php echo $s02 ?>">					
									<?php if($dt1){foreach ($dt1 as $dta1): ?>										
									<div class="form-group">
										<div class="col-md-5">
											<label>Usuario </label> 
											<input class="form-control nww input-xs"  name="user" placeholder="Ejm. Juan17" value="<?php echo $dta1['cl_usuario'] ?>">
										</div>
										<div class="col-md-5">
											<label>Contraseña</label>
											<input class="form-control nww input-xs" type="text" name="pass" placeholder="Minimo 8 digitos" value="<?php echo $dta1['cl_contrasena']  ?>">
										</div>
										<div class="col-md-2">
											<label>Acc.</label>
											<button class="btn btn-sm btn-success" >
											<i class="fa fa-save fa-1x"></i>
											</button>
										</div>
										<div class="col-sm-12"></div>
									</div>
        							<?php endforeach; } ?>					
								</form>
							</div>
						</div>
					
					<!-- Area -->			
						<div class="tab-pane" id="hb1">
							<div class="col-sm-4" ></div>
							<div class="col-sm-8">
								<form id="frma" action="javascript: vAjax('clientes','insert3','frma'); ">
									<input type="hidden" name="id" value="<?php echo $s02 ?>">
									<table style="width: 100%; font-size: 12px" class="table table-striped table-bordered table-hover dataTable no-footer">
										<tbody>
											<tr>
												<td colspan="4"><center><b>Áreas</b></center></td>
											</tr>

											<tr>							
												<th><b>Dirección</b></th>							
												<th><b>Nombre Área </b></th>							
												<td>Opc.</td>
											</tr>
											<tbody id="deta">
												<?php 
													if($dt3){
														$id=0;
						               					foreach ($dt3 as $dta3): 
						               					 $id = $dta3['idarea'];						               						
						               						?>
						               						
															<tr id="tr<?php echo $dta3['idarea'] ?>">
																<input type="hidden" name="uid" id="id<?php echo $id; ?>" value="<?php echo $dta3['idarea'] ?>">
									       						<td><?php echo $dta3['ar_direccion'] ?></td>
									       						<td><?php echo $dta3['ar_nombre'] ?></td>
									       						
									       						<td >
							                                        <button type="button" class="btn btn-xs btn-warning" title="Edit Row" onclick="javascript:$('#edit'+<?php echo $id ?>).show(); $('#tr'+<?php echo $id ?>).hide() "><i class="fa fa-pencil"></i></button>
							                                        <button type="button" class="btn btn-xs btn-default" title="Guardar" ><i class="fa fa-save"></i></button>
							                                         <button type="button" class="btn btn-xs btn-danger" title="Eliminar" onclick="confir('Confirmación','Seguro que deseas eliminar área seleccionada?','clientes','del3',<?php echo $dta3['idarea'] ?>,'remove')"><i class="glyphicon glyphicon-trash"></i></button>
							                                    </td>
										       				</tr>

										       				<tr  id="edit<?php echo  $id ?>" style="display: none">																
									       						<td>										       										
									       							<input class="form-control nww input-xs"  id="d<?php echo $id; ?>" required="" value="<?php echo $dta3['ar_direccion'] ?>" >
									       						</td>
									       						<td>
									       							<input class="form-control nww input-xs"  id="n<?php echo $id; ?>" required="" value="<?php echo $dta3['ar_nombre'] ?>" >							
									       						</td>
									       						<td >
							                                        <button type="button" class="btn btn-xs btn-default" title="Editar"onclick="javascript:$('#edit'+<?php echo $id ?>).hide(); $('#tr'+<?php echo $id ?>).show() "><i class="fa fa-pencil"></i></button>
							                                        <button type="button" class="btn btn-xs btn-success" title="Guardar" onclick="vAjax('clientes','update3',<?php echo $id; ?>+'-/'+$('#d'+<?php echo $id; ?>).val()+'-/'+$('#n'+<?php echo $id; ?>).val()+'-/'+<?php echo $s02 ?>);"><i class="fa fa-save"></i></button>
							                                         <button type="button" class="btn btn-xs btn-default" title="Eliminar" ><i class="glyphicon glyphicon-trash"></i></button>
							                                    </td>
										       				</tr>


						                					<?php endforeach; } ?>
													
											</tbody>						
											<tr >
												<td><input class="form-control nww input-xs" name="dir" required=""></td>
												<td><input class="form-control nww input-xs" name="nombre" required="" placeholder="Nombre Área"></td>							
												<td>								
													<button  type="submit" class="btn btn-xs btn-success" title="Guardar" >
													<i class="fa fa-save fa-1x"></i>
													</button>
												</td>
											</tr>
					       				</tbody>
					       			</table>
								</form>
							</div>
						</div>
					<!-- Contacto -->																									
						<div class="tab-pane active" id="hb4">
							<div class="tabbable tabs-below">
								<div class="tab-content padding-10">
									<div class="row">
										<div id ="div-contacto"></div>
										<script>vAjax('clientes','tbl_contacto',<?php echo $s02 ?>,'contacto');</script> 
									</div>
								</div>
							</div>
						</div>


						</div>
					</div>
				</div>
			</div>
			
		</div><br><br>
	</div>

	<div class="modal-footer">
		<div class="view">
			<button class="btn btn-primary" onclick="$('.edit').show();$('.view').hide()">
				<i class="fa fa-edit"></i>
				Editar
			</button>
			<button class="btn btn-default"  data-dismiss="modal">
				<i class="fa fa-remove"></i>
				Cerrar
			</button>
		</div>
		
		<div class="edit" style="display: none">
			<button class="btn btn-primary" onclick="vAjax('clientes','insert2','frms')">
				<i class="fa fa-check"></i>
				Guardar
			</button>
			<button class="btn btn-danger" type="button" onclick="confir('Confirmación','Seguro que deseas eliminar el cliente seleccionado?','clientes','del2',<?php echo $s02 ?>,'remove')">
				<i class="fa fa-trash"></i>
				Eliminar
			</button>
			<button class="btn btn-default" onclick="$('.edit').hide();$('.view').show()">
				<i class="fa fa-remove"></i>
				Cancelar
			</button>
		</div>
	</div>
</div>
<script> sel2('prov');sel2('idprov');sel2('iddist');</script>

