<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel">PROCESO DE CIERRE</h6>
</div>

<div class="modal-body">
	<div class="col-md-12">
		<div role="content">
            <form id="frm4">
            	
            </form>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-danger" type="button" onclick="confir('Confirmación','Seguro que deseas cerrar la caja actual?','caja','cerrar',<?php echo $s02 ?>,'archive')">
		<i class="fa fa-archive"></i>
		<b> CERRAR CAJA</b>
	</button>					
	<button class="btn btn-default" data-dismiss="modal">
		<b>CERRAR</b>
	</button>
</div>