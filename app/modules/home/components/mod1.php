<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 >SELECCIÓN DE LOCALES</h6>
</div>
<?php session_start(); ?>
<div class="modal-body">
	<div class="row">
		<div role="content">
			<div class="widget-body">
				<input type="hidden" name="tp" value="0">
				<div class="col-md-12">	
					<div class="col-md-12">
						<?php 
						    if ($dt1) {$id=0;
						    	foreach ($dt1 as $dt2): 
						    		if ($_SESSION[fasklog][idgiros]==$dt2[idgiros]) {$id=$dt2[idgiros];}
						    		?>
										<div class="col-md-4">
											<a class="btn btn-default btn-xs azz" href="javascript:void(0);" id="a<?php echo $dt2[idgiros] ?>" onclick="vAjax('home','vlocs',<?php echo $dt2[idgiros] ?>,'vlocs')">
												<img src="app/recursos/img/<?php echo $dt2[idgiros] ?>.png" style=" width: 160px; height: 53px">
											</a>
										</div>
						    		<?php
						    	endforeach;
						    }
						?>
						<div class="col-md-12"><hr></div>
					</div>
					
					<div id="div-vlocs">
						
					</div>
					<div class="col-md-12"><br></div>	
				</div>
			</div>
		</div>
	</div>
	
</div>
<div class="modal-footer">
	<div class="col-md-12">
		<button class="btn btn-<?php echo (!$_SESSION[fasklog][idgiros])?'primary':'default' ?>" onclick="vAjax('home','clocal','0-/TODOS LOS GIROS DE NEGOCIO-/0');" style="width: 100%">TODOS LOS GIROS DE NEGOCIO</button>
	</div>
	<div class="col-md-12"><br></div>
	<div class="col-md-12">
		<button class="btn btn-danger" data-dismiss="modal" style="width: 100%">CANCELAR SELECCIÓN DE LOCALES</button>
	</div>
		
</div>
<?php 
	if ($id) {
		?><script>vAjax('home','vlocs',<?php echo $id ?>,'vlocs');</script><?php
	}
 ?>
