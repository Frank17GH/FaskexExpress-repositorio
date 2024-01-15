<div class="modal-content" id="div-modal"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h4 class="modal-title" id="myModalLabel"><b>Accesos a local</b></h4>
	</div>
	<?php 
		foreach ($dt1 as $dta1):
			?>
				<form id="frm3">
					<input type="hidden" value="<?php echo $s02; ?>" name="id">
					<fieldset>
						<div class="form-group"><br><br>
							<label class="col-md-4"><b>NOMBRES</b></label>
							<div class="col-md-8">
								<font><?php echo $dta1[nom] ?></font>
							</div>
						</div>
					</fieldset>
					<div class="modal-body">
						<div class="row">
							<table class="table" id="tabusu">
								<thead>
									<tr class="encabezado">
										<th><center>#</center></th>
										<th ><center>PERMISO</center></th>
										<th style="display: none"></th>
										<th style="display: none"></th>
										<th style="width: 80px"><center>SI</center></th>
										<th style="width: 80px"><center>NO</center></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$cc=0; 
										foreach ($dt2 as $dta2): $cc++; 
											$class = new Mod();
					            			$st = $class->SubMenu($dta2['idmenu']);
					            			$ts=explode(',', $dta1['Menu']);
											?>
											<tr class="info">
												<td class="numero" style="vertical-align: middle;">
													<b># <?php echo $cc; ?></b>
												</td>
												<td style="vertical-align: middle;">
													<b><?php echo $dta2['nombre'] ?></b>
												</td>
												<td style="display: none" id="ma<?php echo $dta2['idmenu'] ?>"><?php if(in_array($dta2['idmenu'], $ts)){echo $dta2['idmenu'];}?></td>
												<td style="display: none" ></td>
												<td>
													<a onclick="cmo('<?php echo $dta2['idmenu'] ?>',1)" id="a<?php echo $dta2['idmenu'] ?>" class="btn btn-<?php  if(in_array($dta2['idmenu'], $ts)){echo 'info';}else{echo 'default';}?> btn-xs" href="javascript:void(0);" style="width: 100%">SI</a>
												</td>
												<td>
													<a onclick="cmo('<?php echo $dta2['idmenu'] ?>',0)" id="b<?php echo $dta2['idmenu'] ?>" class="btn btn-<?php if(in_array($dta2['idmenu'], $ts)){echo 'default';}else{echo 'info';}?> btn-xs" href="javascript:void(0);" style="width: 100%">NO</a>
												</td>
										    </tr>
										    <?php 
										    	$c2=0;
												foreach ($st as $sta): $c2++;
													$ts2=explode(',', $dta1['SubMenu']);
													?>
														<tr >
															<td class="numero2" style="vertical-align: middle;">
																&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cc.'.'.$c2; ?>
															</td>
															<td style="vertical-align: middle;">
																<?php echo $sta['nombre'] ?>
															</td>
															<td  style="display: none"></td>
															<td style="display:none " id="su<?php echo $sta['idmenu'] ?>"><?php if(in_array($sta['idmenu'], $ts2)){echo $sta['idmenu'];}?></td>
															<td>
																<a style="width: 100%" onclick="cmo2('<?php echo $sta['idmenu'] ?>',1)" id="a<?php echo $sta['idmenu'] ?>" class="btn btn-<?php if(in_array($sta['idmenu'], $ts2)){echo 'info';}else{echo 'default';}?> btn-xs" href="javascript:void(0);">SI</a>
															</td>
															<td>
																<a style="width: 100%" onclick="cmo2('<?php echo $sta['idmenu'] ?>',0)" id="b<?php echo $sta['idmenu'] ?>" class="btn btn-<?php if(in_array($sta['idmenu'], $ts2)){echo 'default';}else{echo 'info';}?> btn-xs" href="javascript:void(0);">NO</a>
															</td>
														</tr>
													<?php
												endforeach;
										endforeach;
									?>
								</tbody>  
							</table>
							<input type="hidden" name="menu" value="<?php echo $dta1['Menu'] ?>," id="menu">
							<input type="hidden" name="submenu" value="<?php echo $dta1['SubMenu'] ?>," id="subMenu">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" type="button" onclick="vAjax('configuracion-usuarios','upVis','frm3');">
							<i class="fa  fa-undo"></i>
							Guardar
						</button>
						<button class="btn btn-default" onclick="vAjax('configuracion-usuarios','mod1',<?php echo explode('-/', $s02)[0] ?>,'modal1');">
							<i class="fa  fa-undo"></i>
							Volver
						</button>
					</div>
				</form>
				
	<?php
		endforeach;
	?>
</div>
<script type="text/javascript">
	function cmo(id,tp){
		if (tp) {
			$('#b'+id).removeClass('btn-info').addClass('btn-default');
			$('#a'+id).addClass('btn-info');
			$('#ma'+id).html(id);
		}else{
			$('#a'+id).removeClass('btn-info').addClass('btn-default');
			$('#b'+id).addClass('btn-info');
			$('#ma'+id).html('');
		}
		var total='';
		$('#tabusu tr').each(function() {
    		//total = total+$(this).find("td").eq(1).html();    
    		if ($(this).find("td").eq(2).html()) {
    			total = total+$(this).find("td").eq(2).html()+',';  
    		}
    		
    	});
  		$('#menu').val(total);
		
	}
	function cmo2(id,tp){
		if (tp) {
			$('#b'+id).removeClass('btn-info').addClass('btn-default');
			$('#a'+id).addClass('btn-info');
			$('#su'+id).html(id);
		}else{
			$('#a'+id).removeClass('btn-info').addClass('btn-default');
			$('#b'+id).addClass('btn-info');
			$('#su'+id).html('');
		}
		var total='';
		$('#tabusu tr').each(function() {
    		//total = total+$(this).find("td").eq(1).html();    
    		if ($(this).find("td").eq(3).html()) {
    			total = total+$(this).find("td").eq(3).html()+',';  
    		}
    		
    	});
  		$('#subMenu').val(total);
	}
</script>