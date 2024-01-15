<?php 
	$cc=0;
	foreach ($dt1 as $row):
		if (!$cc) { $cc=1;
		 	?>
		 		<div class="col-md-1"></div>
				<div class="col-md-10" style="padding: 5px;">
					<a href="javascript:void(0);" class="btn btn-<?php if($_SESSION['fasklog']['local_pre']==0 && $_SESSION['fasklog']['idgiros']>0){echo 'info';}else{echo 'default';} ?> btn-sm" onclick="vAjax('home','clocal','0-/Todos los locales del giro-/<?php echo $row['idgiros'] ?>');" id="nom0" style="width: 100%">TODOS LOS LOCALES</a>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-12"></div>
		 	<?php
		 } 
		?>
			<div class="col-md-1"></div>	
			<div class="col-md-10" style="padding: 5px;">
				<a href="javascript:void(0);" id="nom<?php echo $row['idlocales'] ?>" onclick="vAjax('home','clocal','<?php echo $row['idlocales'].'-/'.$row['lo_abreviatura'].'-/'.$row['idgiros'] ?>');" class="btn btn-<?php echo ($_SESSION['fasklog']['local_pre']==$row['idlocales'])?'info':'default' ?> btn-sm" style="width: 100%"><?php echo mb_strtoupper($row['lo_abreviatura']) ?></a>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-12"></div>
		<?php
	endforeach;
?>