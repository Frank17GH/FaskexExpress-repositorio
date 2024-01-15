<?php 
mb_internal_encoding('UTF-8');
	require_once  "../../recursos/db.class.php";
	include_once( ".Model.php" );
		require_once('letras.php');
    $funcion = new Mod(); 
   $tsArray= $funcion->vDetalle($_GET['id']);
    $funcion = new Mod(); 
    $tsArray2= $funcion->vDet($_GET['id']);
	
	date_default_timezone_set('America/Lima');

foreach ($tsArray as $data): ?>
	<?php  
	$total=number_format($data['cantidad'], 2);
	$fecha=date("Y-m-d", strtotime($data['de_fecha']));
	?> 

<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $ruc ?>-M-<?php echo str_pad($_GET['id'], 6, "0", STR_PAD_LEFT)?></title>
</head>
<style type="text/css">
	body{
	  	font-family: Arial Narrow;
	} 
	.line{
		position: relative;border-style: dashed;

	    background-color: #fff;border-width: 1px;
	}
		@page {
  set_paper: array(0,0,612.00,792.00),'landscape';
}
</style>


<meta charset="utf-8">


<body onload="window.print();" onafterprint="window.close();" >
  		<table>
  			<tr>
  				<td style="width: 70%;font-size: 12px;line-height: 17px;" colspan="2">
  					<img style="width: 50%;" src="../../recursos/img/faskex-200.png">
  					
  					
  				</td>
  				<td style="width: 29%;vertical-align: top;">
  					<table style="border: 1px solid black; width: 100%;border-spacing: 0 1.2em;font-size: 18px;border-radius: 20px;top: 0px">
  						
  						<tr>
  							<td>
  								<b><center>GUIA DE DESPACHO</center></b>
  							</td>
  						</tr>
  						<tr>
  							<td>
  								<center><b>M-<?php echo str_pad($_GET['id'], 6, "0", STR_PAD_LEFT)?></b></center>
  							</td>
  						</tr>
  					</table>
  				
  				</td>
  			</tr>
  		</table>
  			<hr>
  				<table style="width: 100%;font-size: 12px">
  					<tr>
  						<td style="width: 70px; vertical-align: top">
							<b>Responsable </b></td>
		  				<td style="width: 10px;vertical-align: top;">:</td>
		  				<td><?php echo strtoupper($data['responsable']); ?></td>
		  				<td style="width: 90px;vertical-align: top;"><b>Tipo </b></td>
		  				<td style="width: 10px;vertical-align: top;">:</td>
		  				<td style="width: auto;vertical-align: top;"><?php echo $data['tper'] ?></td>
  					</tr>
  					<tr>
  						<td style="width: 70px;vertical-align: top;"><b>Entrega </b></td>
		  				<td style="width: 10px">:</td>
		  				<td><?php if ($data['de_tipo']=="0"){ echo "Local" ; }else { echo "Nacional" ; } ?></td>
		  				<td style="width: 90px"><b>Fecha </b></td>
		  				<td style="width: 10px">:</td>
		  				<td style="width: auto"><?php echo $data['de_fecha']." - ".$data['de_hora'] ?></td>
  					</tr>
  					<tr>
  						<td style="width: 70px;">
							<b>Observacion: </b></td>
		  				<td style="width: 10px">:</td>
		  				<td><?php echo $data['de_observacion']; ?></td>		  			
  					</tr>
  					<tr>
  						<td colspan="6" style="height: 15px;"></td>
  					</tr>  					
  				</table>
  				<hr>

			<table style="border: 0.1px solid #000000;
	                text-align: left;border-collapse: collapse;
	                width: 100%;font-size: 11px;">
	          <tr>
	          	<th style="padding: 3px; background: #dfdede;border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 11px;text-align: center; width: 4%;">item</th>
	            <th style="padding: 3px; background: #dfdede;border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 11px;text-align: center; width: 4%;">Orden</th>
	            <th style="padding: 3px; background: #dfdede;border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 11px;text-align: center; width: 14%;">Fec.venc</th>
	            <th style="padding: 3px; background: #dfdede;border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 11px;text-align: center; width: 27%;">Cliente</th>
	            <th style="padding: 3px; background: #dfdede;border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 11px;text-align: center; width: 27%;">Documento</th>
	            <th style="padding: 3px; background: #dfdede;border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 11px;text-align: center; width: 12%;">Cantidad</th>
	           
	          </tr>
	          <?php $cc=0;$total=0;?>
  				<?php foreach ($tsArray2 as $dt):$cc++;$total+=$dt['cantidad'];  ?>
			  		<tr>
			  			<td style="border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 10px;padding: 3px;"><?php echo $cc; ?></td>
			  			<td style="border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 10px;padding: 3px;"><?php echo $dt['etiqueta'] ?></td>
			  			<td style="border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 10px;padding: 3px;"><?php echo $dt['fecha_vencimiento'] ?></td>
			  			<td style="border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 10px;padding: 3px;"><?php echo $dt['cl_nombres'] ?></td>
			  			<td style="border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 10px;padding: 3px;"><?php if ($dt['or_producto']=="1"){ echo "Documentos" ; }else { echo "Muestras" ; } ?></td>
			  			<td style="border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 10px;padding: 3px;"><?php echo $total;?></td>
			  			
			  		</tr>
			  	<?php endforeach ?>
	      	</table>
	      	<br>
	      	<br>

	      	<div style="width: 70%;display: inline-flex;font-size: 12px;">
	      		<b>SON: </b>
	      	</div> 

	      	<div style="width: 29%;display: inline-flex;">
	      		<table style="border: 0.1px solid #000000;
	                text-align: left;border-collapse: collapse;
	                width: 100%;font-size: 11px;">
		          	<tr>
		            	<th style="padding: 3px; background: #dfdede;border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 11px;width: 50%;">TOTAL REGISTROS</th>
		            	<th style="padding: 3px;border: 0.1px solid #000000;color: #000000;text-align: left;font-size: 11px;width: 50%;text-align: right;"><?php echo number_format($total) ?></th>
		        	</tr>
		        	
		        </table>
	      	</div>
<?php
	endforeach; 
	 ?>

</body>
</html>
