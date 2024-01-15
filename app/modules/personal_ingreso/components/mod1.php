
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel"><?php if($s02){echo 'DETALLE DE INGRESO';}else{echo 'NUEVO INGRESO';} ?></h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="widget-body">
					<form class="form-horizontal" action="javascript: vAjax('personal_ingreso','insert1','frm1'); " id="frm1">
						<input type="hidden" value="<?php echo $s02 ?>" name="fun">
						<fieldset>
							<div class="form-group">
								<div class="col-md-4">
									<label><b>D.N.I.</b></label>
								    <div class="input-group input-group">
								        <div class="icon-addon addon">
								            <input type="text" id="iddnii" class="form-control" value="<?php echo $dt3[0]['pe_dni'] ?>" <?php if($s02){echo 'readonly';} ?> autocomplete="off">
								        </div>
								        <span class="input-group-btn">
								            <button class="btn btn-default" type="button" onclick="buscaP($('#iddnii').val());"><i class="fa fa-search"></i></button>
								        </span>
								    </div>
								</div>
								<div class="col-md-8">
									<label><b>Nombres</b></label>
									<input style="text-align: center;" type="text" class="form-control" id="idnom" value="<?php echo $dt3[0]['pe_apellidos'].', '.$dt3[0]['pe_nombres'] ?>" readonly >
									<input type="hidden" value="<?php if($dt3[0]['idpersonal']){echo $dt3[0]['idpersonal']; }else{echo '0';} ?>" id="idid" name="id">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<label><b>Cargo</b></label> <?php echo $dt3[0]['idpersonalcargo'];  ?>
									<select class="form-control" name="cargo">
										<option value="">Seleccione un cargo</option>
										<?php 
											if($dt1){
											    foreach ($dt1 as $dta1): 
											        ?><option value="<?php echo $dta1[idpersonalcargo] ?>" <?php echo ($dt3[0]['idpersonalcargo']==$dta1['idpersonalcargo'])?'selected':'' ?>><?php echo mb_strtoupper($dta1[ca_descripcion]) ?></option><?php 
											    endforeach; 
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<label><b>Giro</b></label>
									<select class="form-control" name="giro" id="idggr" onchange="vAjax('personal_ingreso','sel1',$(this).val()+'-/<?php echo $dt3[0]['idlocales'] ?>','detsede')">
										<?php 
											if($dt2){
											    foreach ($dt2 as $dta2): 
											        ?><option value="<?php echo $dta2[idgiros] ?>" <?php echo ($dt3[0]['idgiros']==$dta2[idgiros])?'selected':'' ?>><?php echo $dta2[gi_nombre] ?></option><?php 
											    endforeach; 
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<label><b>Sede</b></label>
									<div id="div-detsede">
										<select class="form-control" name="sede">
											
										</select>
									</div>
									<script>vAjax('personal_ingreso','sel1',$('#idggr').val()+'-/<?php echo $dt3[0]['idlocales'] ?>','detsede')</script>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<label><b>Sede</b></label>
									<div >
										<select class="form-control" name="distrito" id="distrito">
											<option value="">Selecione Ubicacion</option>
											<?php 
						                        $ts = $class->sel_Distrito();
						                        foreach ($ts as $ts1): 
						                            ?><option value="<?php echo $ts1['iddistrito'] ?>" <?php echo ($ts1[iddistrito]==$dt3[0][iddistrito])?'selected':''; ?>><?php echo $ts1[distrito] ?></option><?php 
						                         endforeach;
						                    ?> 
										</select>
									</div>
									
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label><b>Inicio</b></label>
									<input class="form-control" type="date" name="inicio" value="<?php echo ($dt3[0]['co_inicio'])?$dt3[0]['co_inicio']:date('Y-m-'.'01') ?>">
								</div>
								<div class="col-md-6">
									<label><b>Fin</b></label>
									<input class="form-control" type="date" name="fin" value="<?php echo ($dt3[0]['co_fin'])?$dt3[0]['co_fin']:date('Y-m-'.'01',strtotime(date('Y-m-d').'+ 1 month')) ?>">
								</div>
								<div class="col-md-6"></div>
								<div class="col-md-6" style="text-align: center;">
									<label class="checkbox">
										<input type="checkbox" name="indefinido">
										<i></i> Indeterminado
									</label>
								</div>
							</div>
							<?php 
								if ($s02) {
									?>
										<div class="form-group">
											<div class="col-md-12">
												<a class="btn btn-danger btn-xs" href="javascript:void(0);" style="width: 100%" onclick="confir('Confirmación','Seguro que deseas eliminar el ingreso?','personal_ingreso','del1',<?php echo $s02 ?>,'remove')"><i class="fa fa-trash-o"></i>  Eliminar Ingreso</a>
											</div>
										</div>
									<?php
								}
							?>
							
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
			<i class="fa fa-save"></i> Guardar
		</button>
	</div>
</div>
<script type="text/javascript">
	sel2('distrito',1);
	function buscaP(dni){
        $.getJSON("app/modules/personal-listar/components/data.php?doc="+dni, function(jd) {
            $('#idid').val(jd.id);
            $('#idnom').val(jd.nombres);
        });
}
</script>