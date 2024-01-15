<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h4 class="modal-title" id="myModalLabel"><b>LINK DE DESCARGA</b></h4>
</div>

<div class="modal-body"><div class="row">
	<div class="col-md-12">
		<div role="content">
			<div class="panel panel-default">
                <div class="panel-body" style="padding-bottom: 0px; padding-top: 2px;">
                    <br>
                    <div class="col-md-2">
                        <b>LINK</b>
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
                      	<input class="form-control input-xs" tabindex="-1" id="idlink" value="<?php echo $url ?>" readonly="" onclick="$('#idlink').select()">
					</div>
                    <br><br>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-info" onclick="vAjax('reportes-ventas','mod2',<?php echo explode('-/', $s02)[0] ?>,'modal')">
		<i class="fa fa-reply"></i>
		<b> VOLVER</b>
	</button>					
	<button class="btn btn-default" onclick="$('#myModal').modal('hide');">
		<b>CERRAR</b>
	</button>
</div>