<?php
require_once "../../../recursos/db.class.php";
require_once "../.Model.php";
require 'vendor/autoload.php';
extract($_POST);
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
$code2 ='';
?>    
<?php 
    $class = new Mod();
    $ts = $class->apoyo_postal($id);
    if ($ts[0]['persona']){
    	foreach ($ts as $ts1): 
    	  $code2 = $ts1['etiqueta'] ;
    	      ?>     <script>                       
                        aviso('info','Etiquetas 7.5 X 5 cm generadas correctamente!','Correcto!');
                    </script>
                    <?php 
    ?>    
	       <div  id="field" >

	       		<div class="peq">
	      			<div style="width: 50%; float:left; ">Tlf: <?php echo $ts1['telefono'] ?></div>
					<div style="width: 50%; float:right;"><?php $mod_date = strtotime($ts1['fecha']."+ 2 days");
						echo  $ts1['fecha_inicio'].' / '.$ts1['fecha_fin']; ?></div>
				</div>

				<div class="nom" ><center><?php echo $ts1['persona'] ?></center></div>

				<div class="red"><center><?php echo $ts1['de_direccion'].',Ref.'.$ts1['referencia'] ?></center></div>

				<div class="peq"><center><?php echo strtoupper($ts1['distrito']);?></center></div>		      		
				<center><img src="data:image/png;base64,<?php echo base64_encode($generator->getBarcode($code2, $type)) ?>"></center>				
				<div style="letter-spacing: 10px;margin-left:19px;font-size: 9px;padding:1px;" ><?php echo $code2; ?></div>

				<div class="nom"><center><?php echo $ts1['cliente'] ?></center></div>

				<div class="peq"><center>
					<?php echo $ts1['tipo']==1?'Documentos': 'Muestras' ?>
					</center>
				</div>
				<div class="peq">
					<div class="gra" style="width: 50%; float:right;text-align: right; margin-right: 8px;">
						<?php  echo ($ts1[tipo]==1)?'( SOBRE ) ':'( PAQUETE ) ';echo $ts1['ap_peso'].' kg'?>
					</div>									
				</div>
							
			</div>	        
	  <?php endforeach;
		
    } else {
     ?>	  <script>
    		aviso('danger','CARGAR BASE DE DATOS, ESTA INCOMPLETO.','Error!');
    		   </script>
    		   <div  id="field" >
	      		<h3>CARGAR BASE DE DATOS, PARA EVITAR ERRORES</h3>
	      	</div>
    		   <?php 
    }
    	?>	        


<style>
div{
		border-radius: 5px;
	}
	#display{
		max-height:188.97px;
		max-width:283.46px;
		padding: 0;
		margin: 0;
		
	}
	#field{		
		height: 188.97px;
	   width: 283.46px;	 
	   overflow: hidden;  
		float:left;		
		margin: 2px;
		border-radius: 10px;
	    border-width: 1px;
	  	border-style: solid;
	  	border-color: black;
	  	break-inside: avoid;
	}
 #field img{
    height:30px;
    width: 260px;
    padding:4px;
}
.nom{
		font-size: 14px;		
		font-weight: bold;	  		
		margin-top: 3px;	  


	}
	.red{
		width: 100%;
  		height: 10px;
  		overflow: hidden;
		font-size: 11px;
		margin-left:1px;  			  				
		margin-top: 2px;
		margin-bottom: 2px;
	}
.peq{
		font-size: 11px;
		margin-left:5px;
		width: 100%;
  		padding:2px;

	}
.gra{
	font-size: 10px;
	margin-left:5px;
	font-weight: bold;	
	padding:2px;
}

</style>