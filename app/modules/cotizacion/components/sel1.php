<select class="form-control input-xs" onchange="vAjax('cotizacion','sel2',$(this).val()+'-/'+$('#numDni').val(),'sel2');">
	<option value="0">Seleccione un Sub Servicio</option>
	<?php 
		foreach ($dt1 as $dta1): 
			?><option value="<?php echo $dta1[iddet] ?>"><?php echo $dta1[de_descripcion] ?></option><?php
		endforeach; 
	?>
</select>
