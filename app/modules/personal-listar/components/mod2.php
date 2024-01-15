
<div class="modal-content" id="div-modal"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h6 class="modal-title" id="myModalLabel">DETALLE DE PERSONAL</h6>
	</div>

	<div class="modal-body">
		<div class="well well-light well-sm no-margin no-padding">
			<div class="row">
				<div class="col-sm-12">
					<div id="myCarousel" class="carousel fade profile-carousel">
						<div class="air air-bottom-right padding-10">
							<a href="https://web.whatsapp.com/send?phone=<?php echo trim($dt1[0][pe_telefono]) ?>&text=" target="_blank" class="btn txt-color-white" style="background-color: #00e676"><i class="fa fa-comments"></i> WHATSAPP</a>&nbsp; <a href="javascript:void(0);" class="btn txt-color-white bg-color-pinkDark btn-sm"><i class="fa fa-envelope"></i> CORREO</a>
						</div>
						<div class="carousel-inner" style="">
							<div class="item active" >
								<img src="<?php echo __REC__ ?>img/s2.jpg" alt="demo user">
							</div>
						</div>
					</div>
				</div>
				<form id="frm4">
					<input type="hidden" value="<?php echo $s02 ?>" name="id">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-3 profile-pic">
								<?php 
									if($dt1[0][pe_sexo]){
										?><img src="<?php echo __REC__ ?>img/profile.jpg" style="max-width: 150px;" alt="demo user"><?php
									}else{
										?><img src="<?php echo __REC__ ?>img/profile2.jpg" style="max-width: 150px;" alt="demo user"><?php
									}
								?>
								<div class="padding-10">
									<h4 class="font-md"><strong class="view"><?php echo $dt1[0][pe_dni] ?></strong>
										<input type="hidden" id="stdoc" value="1">

										<input type="text" class="form-control input-xs edit" onkeypress="if(event.keyCode == 13){ buscaN($('#Dnni').val()); }" onclick="$(this).select()"id="Dnni" name="dni" style="display: none; text-align: center; margin-bottom: -20px" value="<?php echo ($s02)?$dt1[0][pe_dni]:'00000000' ?>">
									<br>
									<small>D.N.I.</small></h4>
									<br>
									<h4 class="font-md"><strong class="view"><?php echo date('d/m/Y',strtotime($dt1[0][pe_nacimiento])) ?></strong>
										<input type="date" class="form-control input-xs edit" name="nacimiento" style="display: none; text-align: center; margin-bottom: -20px;" value="<?php echo $dt1[0][pe_nacimiento] ?>">
									<br>
									<small>Fecha de Nacimiento</small></h4>
									<br>
									<h4 class="font-md">
										<strong>
											<?php 
								
												  list($ano,$mes,$dia) = explode("-",date('Y-m-d',strtotime($dt1[0][pe_nacimiento])));
												  $ano_diferencia  = date("Y") - $ano;
												  $mes_diferencia = date("m") - $mes;
												  $dia_diferencia   = date("d") - $dia;
												  if ($dia_diferencia < 0 || $mes_diferencia < 0){
												    $ano_diferencia--;
												  echo  $ano_diferencia;
												}
											?> Años
										</strong>
									<br>
									<small>Edad</small></h4>
								</div>
							</div>
							<div class="col-sm-9">
								<h1 class="view"><font style="font-size: 20px"><?php echo $dt1[0][pe_apellidos] ?>, <span class="semi-bold"><?php echo $dt1[0][pe_nombres] ?></span></font>
								<br>
								<small> <?php echo $dt1[0][pe_academico_obs] ?></small></h1>
								<div class="edit" style="display: none">
									<div class="col-sm-12"><br></div>
									<div class="col-sm-6">
										<input type="text" id="verNom" class="form-control" value="<?php echo $dt1[0][pe_apellidos] ?>" placeholder="Apellidos" name="apellidos">
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control" value="<?php echo $dt1[0][pe_nombres] ?>" placeholder="Nombres" name="nombres">
									</div>
									<div class="col-sm-12"><br></div>
								</div>
								<hr>
							</div>
							<div class="col-sm-9">
								<div class="jarviswidget" id="wid-id-8" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">
									<header role="heading" style="    background: #ffffff;">
										<ul class="nav nav-tabs pull-right in">
											<li><a data-toggle="tab" href="#hb1" onclick="return false;"> Derechohabiente </a></li>
											<li><a data-toggle="tab" href="#hb2" onclick="return false;"> Profesional </a></li>
											<li><a data-toggle="tab" href="#hb3" onclick="return false;"> Laboral</a></li>
											<li class="active"><a data-toggle="tab" href="#hb4" onclick="return false;"> Personal</a></li>
										</ul>
										<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
									</header>
									<div role="content">
										<div class="tab-content">
											<div class="tab-pane" id="hb1">
													<div class="btn-group">
													
															<div class="col-md-4">
																<input type="text" id="p_dni"  placeholder="Dni" class="nd">
															</div>
															<div class="col-md-4">
																<input type="text" id="p_nombres" placeholder="Nombres y Apellidos" class="nd">
															</div>
															<div class="col-md-4">
																<input type="text" id="p_parentezco" placeholder="Parentezco" class="nd">
																
															</div>

															<div class="col-md-2">

            													<a class="btn btn-labeled btn-primary" onclick="vAjax('personal-listar','nderecho',$('#p_dni').val()+'-/'+$('#p_nombres').val()+'-/'+$('#p_parentezco').val()+'-/<?php echo $s02 ?>');;"> <span class="btn-label"><i class="fa fa-user"></i></span><b>Agregar</b>&nbsp;&nbsp;</a>
            												</div>
														
    												</div>
															
												<div class="tabbable tabs-below">
													<div class="tab-content padding-10">																				
														<div class="table-responsive">
															<table class="table table-bordered" >
																<thead >

																	<tr>
																		<th>DNI</th>
																		<th>Nombres</th>
																		<th>Parentezco</th>
																		<th>Acc.</th>
																	</tr>

																</thead>
																<tbody id="div-derecho"> 

																</tbody>
																<script type="text/javascript"> 
																	vAjax('personal-listar','tabla2',<?php echo $s02 ?>,'derecho');
																</script>
															</table>
														</div>
													</div>
													
												</div>
											</div>
											<div class="tab-pane" id="hb2">
												<div class="tabbable tabs-below">
													<div class="tab-content padding-10">
														<div class="row">
															<div class="col-md-4">
																<strong>GRADO ACADEMICO</strong>
																<select class="form-control input-xs rea" name="grado" disabled>
																	<option value="1" <?php if($dt1[0][pe_academico]==1){echo 'selected';} ?>>PRIMARIA INCOMPLETA</option>
																	<option value="2" <?php if($dt1[0][pe_academico]==2){echo 'selected';} ?>>PRIMARIA COMPLETA</option>
																	<option value="3" <?php if($dt1[0][pe_academico]==3){echo 'selected';} ?>>SECUNDARIA INCOMPLETA</option>
																	<option value="4" <?php if($dt1[0][pe_academico]==4){echo 'selected';} ?>>SECUNDARIA COMPLETA</option>
																	<option value="5" <?php if($dt1[0][pe_academico]==5){echo 'selected';} ?>>UNIVERSITARIA INCOMPLETA</option>
																	<option value="6" <?php if($dt1[0][pe_academico]==6){echo 'selected';} ?>>UNIVERSITARIA COMPLETA</option>
																</select>
															</div>
															<div class="col-md-8">
																<strong>PROFESION</strong>
																<input type="text" class="form-control input-xs rea" name="profesion" value="<?php echo $dt1[0][pe_academico_obs] ?>" disabled>
															</div>
															<div class="col-md-12"><br></div>
															<div class="col-md-4" style="display: <?php if($dt1[0][pe_academico]==6){echo 'block';}else{'none';} ?>">
																<strong>NRO CIP</strong>
																<input type="text" class="form-control input-xs rea" name="cip" value="<?php echo $dt1[0][pe_CIP] ?>" disabled>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="hb3">
												<div class="tabbable tabs-below">
													<div class="tab-content padding-10">
														<div class="row">
															<div class="col-md-5">
																<strong>BANCO - DEPOSITO</strong>
																<select class="form-control input-xs rea" disabled name="banco1">
																	<option value="1" <?php if($dt1[0][pe_tip_dep_bco]==1){echo 'selected';} ?>>BANCO CONTINENTAL</option>
																	<option value="2" <?php if($dt1[0][pe_tip_dep_bco]==2){echo 'selected';} ?>>BANCO INTERBANK</option>
																	<option value="3" <?php if($dt1[0][pe_tip_dep_bco]==3){echo 'selected';} ?>>BANCO DE CREDITO</option>
																	<option value="4" <?php if($dt1[0][pe_tip_dep_bco]==4){echo 'selected';} ?>>BANCO DE LA NACION</option>
																</select>
															</div>
															<div class="col-md-7">
																<strong>NUMERO DE CUENTA - DEPOSITO</strong>
																<input type="text" class="form-control input-xs rea" name="num1" value="<?php echo $dt1[0][pe_num_dep_bco] ?>" disabled>
															</div>
															<div class="col-md-12"><br></div>
															<div class="col-md-5">
																<strong>BANCO - CTS</strong>
																<select class="form-control input-xs rea" name="banco2" disabled>
																	<option value="1" <?php if($dt1[0][pe_tip_cts_bco]==1){echo 'selected';} ?>>BANCO CONTINENTAL</option>
																	<option value="2" <?php if($dt1[0][pe_tip_cts_bco]==2){echo 'selected';} ?>>BANCO INTERBANK</option>
																	<option value="3" <?php if($dt1[0][pe_tip_cts_bco]==3){echo 'selected';} ?>>BANCO DE CREDITO</option>
																	<option value="4" <?php if($dt1[0][pe_tip_cts_bco]==4){echo 'selected';} ?>>BANCO DE LA NACION</option>
																</select>
															</div>
															<div class="col-md-7">
																<strong>NUMERO DE CUENTA - CTS</strong>
																<input type="text" class="form-control input-xs rea" name="num2" value="<?php echo $dt1[0][pe_num_cts_bco] ?>" disabled>
															</div>
															<div class="col-md-12"><br></div>
															<div class="col-md-4">
																<strong>TIPO DE SANGRE</strong>
																<input type="text" class="form-control input-xs rea" name="sangre" style="text-align: center;" value="<?php echo $dt1[0][pe_tip_sangre] ?>" disabled>
															</div>
															<div class="col-md-4">
																<strong>TALLA ROPA</strong>
																<input type="text" class="form-control input-xs rea" name="ropa" style="text-align: center;" value="<?php echo $dt1[0][pe_ropa] ?>" disabled>
															</div>
															<div class="col-md-4">
																<strong>TALLA ZAPATO</strong>
																<input type="text" class="form-control input-xs rea" name="zapato" style="text-align: center;" value="<?php echo $dt1[0][pe_zapato] ?>" disabled>
															</div>
															<div class="col-md-12"><br></div>
															<div class="col-md-4">
																<strong>LICENCIA MOTO</strong>
																<select class="form-control input-xs rea" name="lmoto" disabled>
																	<option value="0" <?php if($dt1[0][pe_lmoto]==0){echo 'selected';} ?>>NO TIENE</option>
																	<option value="1" <?php if($dt1[0][pe_lmoto]==1){echo 'selected';} ?>>B-I</option>
																	<option value="2" <?php if($dt1[0][pe_lmoto]==2){echo 'selected';} ?>>B-IIa</option>
																	<option value="3" <?php if($dt1[0][pe_lmoto]==3){echo 'selected';} ?>>B-IIb</option>
																	<option value="4" <?php if($dt1[0][pe_lmoto]==4){echo 'selected';} ?>>B-IIc</option>
																</select>
															</div>
															<div class="col-md-8">
																<strong>Nº LICENCIA MOTO</strong>
																<input type="text" class="form-control input-xs rea" name="nauto" style="text-align: center;" value="<?php echo $dt1[0][pe_num_moto] ?>" disabled>
															</div>
															<div class="col-md-12"><br></div>
															<div class="col-md-4">
																<strong>LICENCIA AUTO</strong>
																<select class="form-control input-xs rea" name="lauto" disabled>
																	<option value="0" <?php if($dt1[0][pe_lauto]==0){echo 'selected';} ?>>NO TIENE</option>
																	<option value="1" <?php if($dt1[0][pe_lauto]==1){echo 'selected';} ?>>A-I</option>
																	<option value="2" <?php if($dt1[0][pe_lauto]==2){echo 'selected';} ?>>A-IIa</option>
																	<option value="3" <?php if($dt1[0][pe_lauto]==3){echo 'selected';} ?>>A-IIb</option>
																	<option value="4" <?php if($dt1[0][pe_lauto]==4){echo 'selected';} ?>>A-IIIa</option>
																	<option value="5" <?php if($dt1[0][pe_lauto]==5){echo 'selected';} ?>>A-IIIb</option>
																	<option value="6" <?php if($dt1[0][pe_lauto]==6){echo 'selected';} ?>>A-IIIc</option>
																</select>
															</div>
															<div class="col-md-8">
																<strong>Nº LICENCIA MOTO</strong>
																<input type="text" class="form-control input-xs rea" name="nmoto" style="text-align: center;" value="<?php echo $dt1[0][pe_num_auto] ?>" disabled>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane active" id="hb4">
												<div class="tabbable tabs-below">
													<div class="tab-content padding-10">
														<div class="row">
															<div class="col-md-6">
																<strong>SEXO</strong>
																<select class="form-control input-xs rea" name="sexo" disabled>
																	<option value="1" <?php echo ($dt1[0][pe_sexo])?'selected':'' ?>>Masculino</option>
																	<option value="0" <?php echo (!$dt1[0][pe_sexo])?'selected':'' ?>>Femenino</option>
																</select>
															</div>
															<div class="col-md-3">
																<strong>ESTADO CIVIL</strong>
																<select class="form-control input-xs rea" name="civil" disabled>
																	<option value="1" <?php if($dt1[0][pe_civil]==1){echo 'selected';} ?>>Soltero</option>
																	<option value="2" <?php if($dt1[0][pe_civil]==2){echo 'selected';} ?>>Conviviente</option>
																	<option value="3" <?php if($dt1[0][pe_civil]==3){echo 'selected';} ?>>Casado</option>
																</select>
															</div>
															<div class="col-md-3">
																<strong>Nº HIJOS</strong>
																<input type="text" class="form-control input-xs rea" name="hijos" style="text-align: center;" value="<?php echo $dt1[0][pe_hijos] ?>" disabled>
															</div>
															<div class="col-md-12"><br></div>
															<div class="col-md-6">
																<strong>TELÉFONOS</strong>
																<input type="text" class="form-control input-xs rea" name="telefonos" value="<?php echo $dt1[0][pe_telefono] ?>" disabled>
															</div>
															<div class="col-md-6">
																<strong>E-MAIL</strong>
																<input type="text" class="form-control input-xs rea" name="mail" value="<?php echo $dt1[0][pe_mail] ?>" disabled>
															</div>
															<div class="col-md-12"><br></div>
															<div class="col-md-12">
																<strong>DIRECCIÓN</strong>
																<textarea class="form-control input-xs rea" rows="2" name="direccion" disabled><?php echo $dt1[0][pe_direccion] ?></textarea>
															</div>
															<div class="col-md-12"><br></div>
															<div class="col-md-12">
																<strong><b style="color:red"><i class="fa fa-warning"></i> EN CASO DE EMERGENCIA :</b></strong>
																<textarea class="form-control input-xs rea" rows="2" name="emergencia" disabled><?php echo $dt1[0][pe_emergencia] ?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
		        
			</div>
		</div>
	</div>
				
	<div class="modal-footer">
		<div class="view">
			<button class="btn btn-primary" onclick="$('.edit').show();$('.view').hide();$('.rea').prop('disabled', false)">
				<i class="fa fa-edit"></i> EDITAR
			</button>
			<button class="btn btn-default"  data-dismiss="modal">
				<i class="fa fa-remove"></i> CERRAR
			</button>
		</div>
		<div class="edit" style="display: none">
			<?php 
				if ($s02) {
					?>
						<button class="btn btn-danger" type="button" onclick="confir('Confirmación','Seguro que deseas eliminar el personal seleccionado?','personal-listar','del1',<?php echo $s02 ?>,'remove')">
							<i class="fa fa-trash"></i> ELIMINAR
						</button>
					<?php
				}
			?>
			<button class="btn btn-primary" onclick="vAjax('personal-listar','up1','frm4')">
				<i class="fa fa-check"></i> GUARDAR
			</button>
							
			<button class="btn btn-default" onclick="$('.edit').hide();$('.view').show()">
				<i class="fa fa-remove"></i> CANCELAR
			</button>
		</div>
	</div>
</div>
<script> 
	if (!<?php echo $s02 ?>) {$('.edit').show();$('.view').hide();$('.rea').prop('disabled', false)}
</script>