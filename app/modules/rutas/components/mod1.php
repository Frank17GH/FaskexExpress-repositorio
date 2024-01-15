
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b><h6>NUEVA RUTA</h6></b></h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" id="frm1">
						<fieldset>
								<div class="form-group">
									<label class="col-md-4"><b>VEHICULO</b></label>
									<div class="col-md-8">
										<select name="vehi" style="" class="form-control edit">
											<?php 
									            if($dt1){
									                foreach ($dt1 as $dta1): 
									                    ?>
										                    <option value="<?php echo $dta1[idvehiculos] ?>">
										                    	<?php echo '[ '.$dta1[ve_placa].' ]  '.$dta1[ve_marca].' - '.$dta1[ve_modelo] ?>
									                    	</option>
														<?php 
									                endforeach; 
									            }
									        ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4"><b>CONDUCTOR</b></label>
									<div class="col-md-8">
										<select name="conduct" style="" class="form-control edit">
											<?php 
									            if($dt1){
									                foreach ($dt2 as $dta2): 
									                    ?>
									                    <option value="<?php echo $dta2[idpersonal] ?>"><?php echo $dta2[pe_apellidos].', '.$dta2[pe_nombres] ?></option>
														<?php 
									                endforeach; 
									            }
									        ?>
										</select>
									</div>
								</div>
								<div class="col-md-12"><hr></div>
								<div class="form-group">
									<label class="col-md-4"><b>DEPARTAMENTO</b></label>
									<div class="col-md-8">
										<select class="form-control input-xs" id="dep1" onchange="provi2($(this).val(),'prov1')">
				                            <option value="0">Seleccione un Departamento</option>
				                            <?php 
				                                $class = new Mod();
				                                $ts = $class->sel4();
				                                foreach ($ts as $ts1): 
				                                    ?><option value="<?php echo $ts1[iddepartamento] ?>"><?php echo $ts1[nombre] ?></option><?php
				                                 endforeach;
				                            ?>
				                        </select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4"><b>PROVINCIA</b></label>
									<div class="col-md-8">
										<select class="form-control input-xs" id="prov1" onchange="dist2($(this).val(),'dist1')">
				                            <option value="0">Seleccione un Departamento</option>
				                        </select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4"><b>DISTRITO</b></label>
									<div class="col-md-8">
										<select class="form-control input-xs" id="dist1" name="dist">
				                            <option value="0">Seleccione una Provincia</option>
				                        </select>
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
		<button class="btn btn-primary" type="button" onclick="vAjax('rutas','insert1','frm1')">
			<i class="fa fa-save"></i>
			Guardar
		</button>
	</div>
</div>
<script> sel2('dep1');sel2('prov1');sel2('dist1');</script>