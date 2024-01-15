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
                        aviso('info','Cargos generados correctamente!','Correcto!');
                    </script>
                    <?php 
    ?>    
	       <div  id="field" >

	       	<div style="width: 58%; float:left; padding-top: 3px; ">	       		
				<div class="peq">Cliente: <?php echo $ts1['cliente'] ?></div>
				<div class="peq">Destinatario: <?php echo $ts1['persona'] ?></div>
				<div class="peq">Celular: <?php echo $ts1['telefono'] ?></div>
				<div class="peq">Direccion: <?php echo $ts1['direccion'].','.$ts1['distrito'] ?></div>
				<div class="peq">Referencia: <?php echo $ts1['referencia'] ?></div>								
			</div>

			<div style="width: 42%; float:right;padding-top: 3px;">
				<div class="gra">
					<div style="width: 100%; float:center; "><center><?php echo $ts1['servicio']; ?></center></div>
					
				</div>

				<div class="gra">

					<div style="width: 100%; float:center"><center><?php echo $ts1['fecha_inicio'],' / ', $ts1['fecha_fin']  ?> </center></div>

				</div>

			
				<div class="gra"><center><img src="data:image/png;base64,<?php echo base64_encode($generator->getBarcode($code2, $type)) ?>"></center></div>
				<div style="letter-spacing: 6px;margin-left:3px;font-size: 8px;padding:1px;" ><?php echo $code2; ?></div>
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
		border-radius: 1px;
	}
	#display{		
		
	}
	#field{		
	    height: 240px;
	    width: 535px;
	    background:url("https://sistemas.faskex.com/app/recursos/img/cargo.JPG") ;
	    background-size: 535px 240px;
		float:left;
		margin: 1px;
		border-radius: 0px;
	    border-width: 1px;
	  	border-style: solid;
	  	border-color: black;
	  	break-inside: avoid;
	}
 #field img{
    height:25px;
    width: 200px;   
}
.peq{
		text-align: left;
		font-size: 9px;
		margin-left: 55px;
		padding: 1px; 		
	}
.gra{

	font-size: 7px;
	font-weight: bold;	
	margin-right: 10px;
	padding: 2px;
	

}

</style>

