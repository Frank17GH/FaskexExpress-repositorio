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
    $ts = $class->etiqueta($id);
    if ($ts){
    	foreach ($ts as $ts1): 
    	  $code2 =  $ts1['serie'].'-'.str_pad($ts1['correlativo'], 8, "0", STR_PAD_LEFT) ;
    	      ?>     <script>                       
                        aviso('info','Etiquetas 5 X 2.5 cm generadas correctamente!','Correcto!');
                    </script>
                    <?php 
    ?>    
	       <div  id="field" >

	       		<div class="gra">
	      			<div style="width: 50%; float:left; ">Tlf: <?php echo $ts1['telefono'] ?></div>
					<div style="width: 50%; float:right;"><?php $mod_date = strtotime($ts1['fecha']."+ 2 days");
						echo $ts1['fecha'].' / '.date("d-m-Y",$mod_date); ?></div>
				</div>	       		
	       		<div class="nom"><center><?php echo $ts1['destino'] ?></center></div>
	       		<div class="red"><center><?php echo $ts1['de_direccion'].',Ref.'.$ts1['de_obser'] ?></center></div>	 							      		
	      		<div class="peq"><center><?php echo strtoupper($ts1['distrito']);?></center></div>	      			 				    				
				<center><img src="data:image/png;base64,<?php echo base64_encode($generator->getBarcode($code2, $type)) ?>"></center>
				<div style="letter-spacing: 4px;font-size: 7px;" ><center><?php echo $code2; ?></center></div>				
				<div class="nom"><center><?php echo $ts1['cliente'] ?></center></div>
				<div class="peq"><center><?php echo strtoupper($ts1['servicio']); ?></center></div>					
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
		border-radius: 1px;
	}
	#display{		
		
	}
	#field{
		
		height: 94.48px;
	    width: 188.97px;
	    overflow: hidden;	   
		float:left;
		margin: 3px;
		border-radius: 1px;
	    border-width: 0.1px;
	  	border-style: solid;
	  	border-color: black;
	  	break-inside: avoid;
	}
 #field img{
    height:20px;
    width: 160px;
    margin: 1px;
}
.peq{
		font-size: 8px;
		margin-left:1px;
  		padding:1px;

	}
.nom{
		font-size: 9px;		
		font-weight: bold;	  		
		padding:1px;	  		

	}
.red{
		width: 100%;
  		height: 10px;
  		overflow: hidden;
		font-size: 8px;
		margin-left:1px;  			  				
	}
.gra{
	font-size: 8px;
	margin-left:4px;
	margin-right:4px;
	padding:1px;

}

</style>



