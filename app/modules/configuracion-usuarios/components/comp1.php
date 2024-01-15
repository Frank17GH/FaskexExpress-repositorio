<?php 
	if($dt1){$c=1;
		foreach ($dt1 as $dta2): 
		   ?>
		    	<tr>
		     		<td><?php echo $c; ?></td>
		     		<td><?php echo $dta2['lo_abreviatura'] ?></td>
		     		<td><?php echo $dta2['dist'] ?></td>
		     		<td><a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="vAjax('configuracion-usuarios','del1',<?php echo $dta2['id'];?>)">Eliminar</a></td>
		    	</tr>
		    <?php $c++;
		endforeach; 
	}else{
		?>
			<tr>
				<td colspan="3"><center><i>No hay datos registrados</i></center></td>
			</tr>
		<?
	}
?>