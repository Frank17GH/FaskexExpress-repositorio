<table class="table table-bordered">
	<thead>
		<tr>
			<th colspan="4"><center>DESTINOS DEL CONDUCTOR</center></th>
		</tr>
		<tr>
			<th style="width: 50px; text-align: center;">#</th>
			<th style="text-align: center;width: 100%">DESTINO</th>
			<th style="width: 5px; text-align: center;">Estado</th>
			<th style="width: 5px; text-align: center;">Acc.</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$cc=1;
			foreach ($dt1 as $dta1): 
				?>
					<tr>
						<td style="width: 50px; text-align: center;"><?php echo $cc ?></td>
						<td style="text-align: center;"><?php echo mb_strtoupper($dta1[nom]) ?></td>
						<td style="width: 50px; text-align: center;">
							<a class="btn btn-<?php echo ($dta1[de_estado])?'success':'danger' ?> btn-xs" href="javascript:void(0);" onclick="confir('Confirmación','Seguro que deseas eliminar la serie seleccionada?','configuracion-general','del4','0-/B101','remove')"> <?php echo ($dta1[de_estado])?'Activo':'Inactivo' ?> </a>
						</td>
						<td style="width: 50px">
							<a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="confir('Confirmación','Seguro que deseas eliminar el destino seleccionado?','rutas','del2','<?php echo $s02 ?>-/<?php echo $dta1[iddestinos] ?>','remove')"><i class="fa fa-trash-o"></i> Eliminar</a>
						</td>
					</tr>
				<?php
				$cc++;
			endforeach;
		?>
		<tr>
			<td colspan="2">
				<select class="form-control input-xs" id="addloc">
					<?php 
						if ($dt2) {
							foreach ($dt2 as $dta2): 
								?><option value="<?php echo $dta2[idlocales] ?>"><?php echo mb_strtoupper(utf8_encode($dta2[nom]).' [ '.$dta2[lo_abreviatura].' ]') ?></option><?php
							endforeach;
						}
					?>
				</select>
			</td>
			<td colspan="2">
				<a class="btn btn-success btn-xs" onclick="vAjax('rutas','insert2','<?php echo $s02 ?>-/'+$('#addloc').val())" href="javascript:void(0);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-plus"></i> Agregar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			</td>
		</tr>
	</tbody>
</table>