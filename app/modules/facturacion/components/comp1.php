<br><?php 
	if($dt1){
		foreach ($dt1 as $dta1): 
		   	?>
		    	<a class="btn btn-default" href="javascript:void(0);"><i class="fa <?php echo $dta1['cpe_icon'] ?> fa-1x"></i> <br><?php echo $dta1['cpe_descrip'] ?></a>
		    <?php 
		endforeach; 
	}else{
		?>
			<tr>
				<td colspan="3"><center><i>No hay CPE registrados.</i></center></td>
			</tr>
		<?
	}
?>
<br><br>