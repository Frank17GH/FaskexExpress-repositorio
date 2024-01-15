<select class="form-control" name="sede">
	<?php 
		if($dt1){
			foreach ($dt1 as $dta1): 
				?>
					<option value="<?php echo $dta1[idlocales] ?>" <?php echo (explode('-/', $s02)[1]==$dta1[idlocales])?'selected':'' ?>>
						<?php echo $dta1[lo_abreviatura] ?>
					</option>
				<?php 
			endforeach; 
		}
	?>
</select>
