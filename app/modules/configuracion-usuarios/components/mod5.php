<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title" id="myModalLabel">ASIGNACIÓN DE LOCALES A USUARIO</h6>
</div>
<div class="modal-body">
	<input type="hidden" value="<?php echo $s02 ?>" id="idlocall">
	<div class="row">
		<div role="content">
			<div class="col-md-12">
				<div class="col-md-1"></div>
				<div class="col-md-8">
					<select class="form-control" id="idsers1" onchange="vLocs($(this).val())">
						<option value="0">Seleccione un giro de negocio</option>
						<?php 
    						if($dt1){
       							foreach ($dt1 as $dta): 
       								?>
      									<option value="<?php echo $dta[idgiros] ?>"><?php echo $dta['gi_nombre'] ?></option>
       								<?php
       							endforeach; 
       						}
       					?>
       				</select>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="col-md-12"></div>
			<div class="col-md-12">
				<div class="col-md-1"></div>
				<div class="col-md-8">
					<select class="form-control" id="idsers2">
						
       				</select>
				</div>
				<div class="col-md-2">
					<button class="btn btn-success btn-sm" type="button" onclick="vAjax('configuracion-usuarios','insert4',$('#idsers2').val()+'-/<?php echo $s02; ?>')">
						<span class="glyphicon glyphicon-floppy-disk"></span> Agregar
					</button>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="col-md-12"><br></div>
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="width: 5px">#</th>
							<th>Local</th>
							<th>Ciudad</th>
							<th style="width: 5px">Acciones</th>
						</tr>
					</thead>
					<tbody id="div-locs">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-default" onclick="vAjax('configuracion-usuarios','mod1',<?php echo $s02 ?>,'modal1');">
			<i class="fa fa-undo"></i>
			Volver
		</button>
</div>
<script>
	function vLocs(idcomp){
		var det='';
		$.ajax({
            url: "app/modules/configuracion-usuarios/components/data.php?t=2&idloc="+idcomp+'&iduser=<?php echo $s02 ?>',
            dataType: 'json', //tipo de datos retornados
            type: 'post' //enviar variables como post
        }).done(function (data){
            $.each($.parseJSON(JSON.stringify(data)), function(){ 
            	det+='<option value="'+this['id']+'">'+this['value']+'</option>';
            });
            $('#idsers2').html(det);
            
        }).fail(function(){
            $('#idsers2').empty();
        });vAjax('configuracion-usuarios','comp1','<?php echo $s02 ?>-/'+$('#idsers1').val(),'locs')
	}
</script>