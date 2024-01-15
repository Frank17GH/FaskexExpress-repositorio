<?php 
	mb_internal_encoding('UTF-8');
 	mb_http_output('UTF-8');

	require_once  "../../../recursos/db.class.php";
	include_once( "../.Model.php" );
	include_once "../../../recursos/qr/phpqrcode/qrlib.php";
	
    $funcion = new Mod(); 
    $tsArray= $funcion->printGuia($_GET['id']);
    $funcion = new Mod(); 
    $tsArray2= $funcion->printGuiaDet($_GET['id']);

	date_default_timezone_set('America/Lima');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo __RAZON__ ?> | IMPRESIÓN</title>
</head>
<style type="text/css">
	body{
	  	font-family: Arial Narrow;
	} 
	.line{
		position: relative;border-style: dashed;

	    background-color: #fff;border-width: 1px;
	}
	* {
  padding: 0;
  margin: 0;
  font-size: 11.5px;
  box-sizing: border-box;
  font-style: 500;
  font-family: Arial, Helvetica, sans-serif;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
}
.col-4 {
  width: 33.33%;
}
.col-6 {
  width: 50%;
}
.col-8 {
  width: 66.66%;
}

.report {
  width: 21cm;
  height: 29.7cm;
  background: #ffffff;
  align-items: center;
  justify-content: center;
  margin: 0 auto;
  text-transform: uppercase;
  font-size: 12.5px;
  font-weight: 500;
}

.center{
   text-align: center !important;
   justify-content: center !important;
}

.container {
  margin: 2.5mm 0mm 16.5mm 0mm;
  color: #474747;
}
p{
   padding: 4px;
}

header {
  display: grid;
  grid-template-columns: 550px 243px;
}

header > div {
  align-content: center;
  justify-content: center;
  text-align: center;
  align-items: center;
}

.b-d {
  border: 2px solid black;
  padding: 0.3rem;
}

h2{
  font-weight: 860;
}

.borde-b {
  border-bottom: 2px solid black;
  margin-top: 5px;
}
/* logotipo*/
header > div img {
 max-width: 350px;
 background-size: cover;
 object-fit: contain;
 height: 100px;
 width: 100%;
}

.t-rp{
padding-right: 10px !important; 
text-align: right !important;
}

.rows-img{
  max-width: 100%;  
  background-size: cover;
  background-position: center;
  margin: 0 auto;
}
.empresa {
  display: flex;
}

.bg-gray {
  background: black;
  color: white;
  padding: 5px;
}

.fch-container {
  border: 0.4px solid #9c9c9c;
  display: flex;
  justify-content: space-between;
  width: 100%;
  align-items: center;
  padding: 8px 10px;
}
.fch-heaedr {
  background-color: black;
  color: white;
  display: flex;
  justify-content: space-between;
  width: 100%;
  align-items: center;
  padding: 8px 10px;
}

label{
   display: flex;
   align-items: center;
   gap: 0.4rem;
   padding: 0.4rem 0px;
   text-transform: none;
   font-size: 12.5px;
   cursor: pointer;
}

.px-4{
  padding:  4px;
}

#customers {
  border-collapse: collapse;
  width: 100%;
  text-align: left;
  color: #474747;
  background: rgb(214, 237, 252);
  box-sizing: border-box;
  font-style: normal;
  font-size: 12.5px;
  line-height: 14px;
  padding: 10px;
  text-transform: uppercase;
}

#customers td,
#customers th {
  border: 1px solid #9c9c9c;
  padding: 7px;
  text-align: left;
}

#customers tr:nth-child(even) {
  background-color: #ffffff;
  color: #474747;
  font-weight: normal;
  text-align: center;
  padding: 10px;
}

#customers tr:hover {
  background: rgb(214, 237, 252);
}

#customers th {
  padding-top: 8px;
  padding-bottom: 8px;
  text-align: center;
  background: black;
  color: white;
  box-sizing: border-box;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
}

.bt-2 {
  border-top: black 2px solid;
}

.mb-2 {
  margin-bottom: 0.3rem;
}
</style>
<body onload="window.print();" onafterprint="window.close();">
	<?php
  		foreach ($tsArray as $data): 
  			?>
  			<header>
		      	<div>
		        	<div class="borde-b">
		          		<div class="rows-img">
		            		<table style="width: 100%">
						  		<tr>
						  			<td >
						  				<img style="width: 220px;" src="../components/logo.jpg">
						  			</td>
						  			<td>
						  				<center><br>
						  					<b style="font-size: 16px">HORIZONTE CARGO EXPRESS S.A.C</b> <br>
						  					<font style="font-size: 12px">Telf.: (076)623491 - Cel.: 989510997 - Cel.: 948247847	<br>
											E-mail: horizontecargoexpresssac@hotmail.com <br>
											<B>PRINCIPAL:</B> Av. Via de evitamiento sur N° 1484
						  					<br>Cajamarca - Cajamarca - Cajamarca<br>
						  					<B>SUCURSAL:</B> Av. Morro de Arica N° 215 <br>Lima-Lima-Rimac</font></font>
						  				</center><br>
						  			</td>
						  		</tr>
				  			</table>
		          		</div>
		        	</div>
		      	</div>

      			<div class="flex-col">
        			<article class="b-d mb-2">
			          	<p>RUC | 20491817101 </p>
			          	<h2>GUÍA DE REMISIÓN <?php if($data['tipoGuia']=='09'){echo 'REMITENTE';}elseif($data['tipoGuia']=='31'){echo 'TRANSPORTISTA';} ?> ELECTRÓNICA</h2>
			          	<p><?php echo $data['serie'].'-'.$data['correlativo'] ?></p>
        			</article>
        			<article class=" b-d">
          				<p class="empresa">Fecha Emisión: <?php echo date('d/m/Y', strtotime($data['fechaEmision'])) ?></p>
        			</article>
      			</div>
    		</header>
  			<section class="row ">
		      	<div class="col-6 px-4">
		        	<div class="fch-container">
		          		<span><b>Fecha de Traslado :</b></span>
		          		<span><?php echo date('d/m/Y', strtotime($data['fechaTraslado'])) ?></span>
		        	</div>
		      	</div>
		      	<div class="col-6 px-4">
		        	<div class="fch-container">
		          		<span><b>Reg. CNG :</b></span>
		          		<span>0602221CNG</span>
		        	</div>
		      	</div>
		    </section>	

		    <section class="row ">
		      	<div class="col-6 px-4">
		        	<div class="fch-container">
		        		<table style="width: 100%;">
		        			<tr>
		        				<td>
		        					<span><b>Punto de Partida:</b> <?php echo $data['origenDireccion'] ?></span>
		        				</td>
		        			</tr>
		        			<tr>
		        				<td>
		        					<?php echo strtoupper($data['ubi_origen']); ?>
		        				</td>
		        			</tr>
		        		</table>
		          		
		        	</div>
		      	</div>
		      	<div class="col-6 px-4">
		        	<div class="fch-container">
		        		<table style="width: 100%;">
		        			<tr>
		        				<td>
		        					<span><b>Punto de Llegada:</b> <?php echo $data['destinoDireccion'] ?></span>
		        				</td>
		        			</tr>
		        			<tr>
		        				<td>
		        					<?php echo strtoupper($data['ubi_destino']); ?>
		        				</td>
		        			</tr>
		        		</table>
		        	</div>
		      	</div>
		    </section>	
		    <section class="row ">
		      	<div class="col-6 px-4">
		        	<div class="fch-container">
		          		<span><b><u>DATOS DEL REMITENTE</u><br><br> Nombre o Razón Social: </b> <?php echo $data['origenNombre'] ?></span>
		          		<span><b><?php if(strlen($data['origenDoc'])==8){echo 'DNI';}else{ echo 'RUC';} ?>:</b><?php echo $data['origenDoc'] ?></span>
		        	</div>
		      	</div>
		      	<div class="col-6 px-4">
		        	<div class="fch-container">
		          		<span><b><u>DATOS DEL DESTINATARIO</u><br><br> Nombre o Razón Social: </b> <?php echo $data['destinoNombre'] ?></span>
		          		<span><b><?php if(strlen($data['destinoDoc'])==8){echo 'DNI';}else{ echo 'RUC';} ?>:</b><?php echo $data['destinoDoc'] ?></span>
		        	</div>
		      	</div>
		    </section>
		    <section class="row ">
		      	<div class="px-4" style="width: 100%;">
		        	<div class="fch-container">
		          		
		          			<table style="width: 100%;">
		          					<tr>
		          							<td colspan="2">
		          									<span><b><u>UNIDAD DE TRANSPORTE Y CONDUCCIÓN</u></b></span><br><br> 
		          							</td>
		          					</tr>
		          					<tr>
		          							<td style="width: 50%;">
		          										<span><b>Marca y Número de Placa:</b><?php echo $data['vehiculoDescripcion1'] .' '.$data['vehiculoPlaca1'] ?></span><br>
		          										<span><b>N° de constancia de inscripción:</b><?php echo $data['autorizacion'] ?></span>
		          							</td>
		          							<td>
		          										<span><b>N° de Licencia(s) de Conducir:</b><?php echo $data['conductorLicencia1'] ?></span><br>
		          										<span><b>Costo Mínimo:</b>_______</span>
		          							</td>
		          					</tr>
		          			</table>
		          		
		        	</div>
		      	</div>
		    </section>
		    <section class="row ">
		    	<div class="px-4" style="width: 100%;">
		    			<table id="customers" class="px-4">
				        	<tr class="text-dec p-2">
				          		<th style="width: 5px;">N°</th>
				          		<th class="t-l">Descripción</th>
				          		<th style="width: 80px;">U. M.</th>
				          		<th style="width: 80px;">CANT.</th>
				        	</tr>
			        		<?php 
			        				$c = 1;
			        				$tt = 0;
			        				foreach ($tsArray2 as $detalle) {
													?>
															<tr>
																	<td><?php echo $c ?></td>
																	<td><?php echo $detalle['nombre']; if($detalle['docref']){ echo ', Según '.$detalle['docref'];} ?>.</td>
																	<td style="text-align: center;"><?php echo $detalle['medida'] ?></td>
																	<td style="text-align: center;"><?php $tt = $tt +$detalle['cantidad']; echo $detalle['cantidad'] ?></td>
															</tr>
			        						<?php
			        				}
			        		?>
      				</table>
		    	</div>
		    </section>
		    <section>
		    		<div class="col-6 px-4">
		        	<div class="fch-container">
		        			<table style="width: 100%;">
		        					<tr>
		        						<td>
		        								<span><b>Número de bultos:</b><?php echo $tt ?></span>
		        						</td>
		        					</tr>
		        					<tr>
		        						<td>
		        								<span><b>Unidad de Medida del Peso Bruto:</b><?php echo $data['unidadMedida'] ?></span>
		        						</td>
		        					</tr>
		        					<tr>
		        						<td>
		        								<span><b>Peso Bruto:</b><?php echo $data['peso'] ?></span>
		        						</td>
		        					</tr>
		        			</table>
		          		
		        	</div>

		      	</div>
		      	<div class="col-6 px-4" style="text-align: center;">
		      		<?php 
										 	//	$cod=$ruc.' |  |  |  |  |  |  | ';
												QRcode::png($data['qr'],"../../../recursos/qr/temp/".$data['serie'].'-'.$data['correlativo'].".png",QR_ECLEVEL_L,3,1);
												echo '<img style="width:100px" src="../../../recursos/qr/temp/'.$data['serie'].'-'.$data['correlativo'].'.png"/>';
											?>
		      	</div>

		      	
		    </section>	
		    <section class="row" style="margin-top: 162px;">
		      	<div class="px-4" style="width: 100%;">
		        	<div class="">

		          		
		          			<table style="width: 100%; ">	
								<tr>
									<td>
										<center>
											__________________________________ <br>	
											----
										</center>
											
									</td>
									<td>
										<center>
											__________________________________ <br>
											P. CONFOME DEL CLIENTE
										</center>
											
									</td>
								</tr>
							</table>
		          		<center>
		          			Representación impresa de la Guía de Remisión Transportista Electrónica, para consultar el documento visita la clave sol
		          		</center>
		        	</div>
		      	</div>
		    </section>
			
<?php
	endforeach; 
	 ?>

</body>
</html>