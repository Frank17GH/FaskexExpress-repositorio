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
    	  $code2 =$ts1['etiqueta'] ;
    	      ?>     <script>                       
                        aviso('info','Etiquetas 1" generadas correctamente!','Correcto!');
                    </script>
                    <?php 
    ?>    
	      <div  id="field" >
	      		<div class="gra">
	      			<div style="width: 65%; float:left; "><?php echo $ts1['servicio']; ?></div>
					<div style="width: 35%; float:right"><?php echo $ts1['fecha_inicio'],'/', $ts1['fecha_fin']  ?></div>
				</div>	      		
				<center><img src="data:image/png;base64,<?php echo base64_encode($generator->getBarcode($code2, $type)) ?>"></center>
				<div style="letter-spacing: 6px;margin-left:3px;font-size: 5px;padding:1px;" ><?php echo $code2; ?></div>
				<div class="peq">Cliente: <?php echo $ts1['cliente'] ?></div>
				<div class="peq">Destinatario: <?php echo $ts1['persona'] ?></div>
				<div class="peq">Celular: <?php echo $ts1['telefono'] ?></div>
				<div class="peq">Direccion: <?php echo $ts1['direccion'] ?></div>	
				<div class="peq">Referecia: <?php echo $ts1['referencia'] ?></div>			
				<div class="peq">Distrito: <?php echo $ts1['distrito'] ?></div>				
				<div class="peq">Tipo: <?php echo $ts1['tipo']==1?'Documentos': 'Muestras' ?></div>					
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
		height: 113px;
	   	width: 151px;	   
		float:left;
		margin: 2px;
		border-radius: 2px;
	    border-width: 1px;
	  	border-style: solid;
	  	border-color: black;
	  	break-inside: avoid;
	}
 #field img{
    height:20px;
    width: 140px;
    margin: 1px;
}
.peq{
		font-size: 6px;
		margin-left:5px;
  		padding:1px;

	}
.gra{
	font-size: 5px;
	margin-left:5px;
	margin-right:5px;
	padding:2px;

}

</style>