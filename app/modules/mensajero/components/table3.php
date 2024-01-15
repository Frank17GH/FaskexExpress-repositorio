 <table class="table table-hover">
	<tr>
		<th style="width: 2px">Seleccionar</th>	
		<th style="width: 1px">#</th>								
		<th>Consignatario</th>
		<th>Direccion</th>
		<th style="width: 5px">Tipo</th>
		<th style="width: 5px">Ver</th>
		
	</tr>
	<tbody id="idveri">
		<?php 
			$cc=0;$tt=0; $det='';
			foreach ($dt1 as $dta1): $cc++;
				?>
				<tr style="cursor: pointer;" onclick="checkcode(<?php echo $dta1[idcomprobante] ?>)" id="ttr<?php echo $dta1[idcomprobante] ?>">
					<td><input type="checkbox" id='che<?php echo $dta1[idcomprobante] ?>' chek></td>
					<td><?php echo $cc; ?></td>					
					<td><?php echo $dta1[de_nombre] ?></td>
					<td><?php echo $dta1[de_direccion] ?></td>													
				</tr>
				<?php
			endforeach; 
		?>
	</tbody>
</table>
<input type="text" value="" id='str' >
