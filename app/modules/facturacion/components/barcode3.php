<?php
require_once "../../../recursos/db.class.php";
require_once "../.Model.php";
require 'vendor/autoload.php';
extract($_POST);
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
$code2 ='';
$tipo='C39';
?>    
<?php 
    $class = new Mod();
    $ts = $class->etiqueta($id);
    if ($ts){
    	foreach ($ts as $ts1): 
    	  $code2 = $ts1['serie'].'-'.str_pad($ts1['correlativo'], 8, "0", STR_PAD_LEFT) ;
    	      ?>     <script>                       
                        aviso('info','Etiquetas 7.5 X 5 cm generadas correctamente!','Correcto!');
                    </script>
                    <?php 
    ?>    
	       <div id="field" >
	      		
	      			<div class="peq">
	      				<div style="width: 50%; float:left; ">Tlf: <?php echo $ts1['telefono'] ?></div>
						<div style="width: 50%; float:right;"><?php $mod_date = strtotime($ts1['fecha']."+ 2 days");
						echo $ts1['fecha'].' / '.date("d-m-Y",$mod_date); ?></div>
					</div>

				<div class="nom" style="margin-top: 7px;"><center><?php echo $ts1['destino'] ?></center></div>
	       		
	       		<div class="red"><center><?php echo $ts1['de_direccion'].',Ref.'.$ts1['de_obser'] ?></center></div>	

	       		<div class="peq"><center><?php echo strtoupper($ts1['distrito']);?></center></div>										
	      		       	
				<center><img src="data:image/png;base64,<?php echo base64_encode($generator->getBarcode($code2, $tipo)) ?>"></center>

				<div style="letter-spacing: 13px;margin-left:19px;font-size: 9px;padding:1px;" ><?php echo $code2; ?></div>

				<div class="nom"><center><?php echo $ts1['cliente'] ?></center></div>

				<div class="peq"><center>
					<?php echo strtoupper($ts1['servicio']); ?>
					</center>
				</div>

				<div class="peq">
					<div class="gra" style="width: 50%; float:right;text-align: right; margin-right: 8px;">
						<?php  echo ($ts1[de_tipo_encomienda]==1)?'( SOBRE ) ':'( PAQUETE ) '; $kg=$ts1['peso']/1000; echo ($ts1['peso']>'999')? $kg.' Kg': $ts1['peso'].' Gr' ?>
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
    font-size: 6px;
    padding:4px;
}
.nom{
		font-size: 14px;		
		font-weight: bold;	  		
		padding:2px;	  		

	}
	.red{
		width: 100%;
  		height: 10px;
  		overflow: hidden;
		font-size: 11px;
		margin-left:1px;  			  				
		margin-top: 5px;
		margin-bottom: 5px;
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


