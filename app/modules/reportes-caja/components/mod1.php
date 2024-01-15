<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>ENVIO DE CORREO</b></h4>
</div>

<div class="modal-body"><div class="row">
	<div class="col-md-12">
		<div role="content">
			<div class="panel panel-default">
				<form id="frmEm">
					<div class="panel-body" style="padding-bottom: 0px; padding-top: 2px;">
                    <br>
                    <div class="col-md-2">
                        <b>Comprobante</b>
                    </div>
                    <div class="col-md-10">
                    	<?php 
                    	function encrypt($string, $key) {
						   $result = '';
						   for($i=0; $i<strlen($string); $i++) {
						      $char = substr($string, $i, 1);
						      $keychar = substr($key, ($i % strlen($key))-1, 1);
						      $char = chr(ord($char)+ord($keychar));
						      $result.=$char;
						   }
						   return base64_encode($result);
						}
                    		$ser=explode('-/', $s02)[1];
                    		$url="https://cpe.byproyet.com/?rlz=".encrypt($ser.'/'.__RUC__,"BYPRO");
                    	?>
                      	<input type="hidden" name="ruta" value="<?php echo $url ?>">
                      	<input type="hidden" name="fech" value="<?php echo explode('-/', $s02)[2]; ?>">
                      	<input class="form-control input-xs" name="comp" style="text-align: center;" value="<?php echo explode('-/', $s02)[1] ?>">
					</div>
					<div class="col-md-12"><br></div>
					
					<div class="col-md-2">
                        <b>Mail</b>
                    </div>
                    <div class="col-md-10">
                      	<input class="form-control input-xs" name="correo" placeholder="Escriba un correo valido">
					</div>
				</div> <br>
				</form>
                
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-default" onclick="vAjax('reportes-ventas','envio','frmEm')">
		<i class="fa fa-send-o"></i>
		<b>ENVIAR</b>
	</button>					
	<button class="btn btn-default" onclick="$('#myModal').modal('hide');">
		<b>CERRAR</b>
	</button>
</div>