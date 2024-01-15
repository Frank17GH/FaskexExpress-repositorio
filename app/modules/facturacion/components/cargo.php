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
                        aviso('info','Cargos generados correctamente!','Correcto!');
                    </script>
                    <?php 
    ?>    
	       <div  id="field" >

	       	<div style="width: 60%; float:left; margin-top: 3px; ">
	       		
				<div class="peq" >Cliente: <?php echo $ts1['cliente'] ?></div>
				<div class="peq">Destinatario: <?php echo $ts1['destino'] ?></div>
				<div class="peq">Celular: <?php echo $ts1['telefono'] ?></div>
				<div class="peq">Direccion: <?php echo $ts1['de_direccion'].', '.$ts1['distrito'] ?></div>
				<div class="peq">Referencia: <?php echo $ts1['de_obser'] ?></div>								
			</div>

			<div style="width: 40%; float:right; margin-top: 3px; ">
				
				<div class="gra">
					<div style="width: 100%; float:left; "><center><?php echo $ts1['servicio']; ?></center></div>
					
				</div>

				<div class="gra">
					<div style="width: 100%; float:right"><center><?php 
						$mod_date = strtotime($ts1['fecha']."+ 2 days");
						echo $ts1['fecha'].' / '.date("d-m-Y",$mod_date); ?> </center></div>
				</div>
			
				<div class="gra"><center><img src="data:image/png;base64,<?php echo base64_encode($generator->getBarcode($code2, $tipo)) ?>"></center></div>
				<div style="letter-spacing: 11px;margin-left:3px;font-size: 8px;padding:1px;" ><?php echo $code2; ?></div>
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
    font-size: 6px;
}
.peq{
		text-align: left;
		font-size: 9px;
		margin-left: 55px;
		padding: 1px; 		
	}
.gra{

	font-size: 9px;
	font-weight: bold;	
	margin-right: 10px;
	padding: 3px;
	

}

</style>

