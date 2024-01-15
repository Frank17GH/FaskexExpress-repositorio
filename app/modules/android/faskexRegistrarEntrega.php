<?PHP
$hostname_localhost ="localhost";
$database_localhost ="fasktech_sistema";
$username_localhost ="fasktech_sistema";
$password_localhost ="vR_LQ3#W]haa";
$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	$estado = $_POST["estado"];
	$idtipo = $_POST["idtipo"];
	$IdApoyo = $_POST["idapoyo"];
	$img1 = $_POST["img1"];
	$img2 = $_POST["img2"];
	$img3 = $_POST["img3"];
	$img4 = $_POST["img4"];
	$img5 = $_POST["img5"];	

	$motivo = $_POST["motivo"];			
	$entrega = $_POST["entrega"];
	$nota = $_POST["nota"];	


	$sql="UPDATE despacho_det SET idmotivo=".$motivo.",identrega=".$entrega.",dd_fecha= now(),dd_estado='".$estado."',dd_nota='".$nota."',dd_img1='".$img1."',dd_img2='".$img2."',dd_img3='".$img3."',dd_img4='".$img4."',dd_img5='".$img5."' where idapoyo='".$IdApoyo."'";

	
	if($idtipo==2){		
 	   		
 	   	$sql1="UPDATE comprobante_det a SET est_paq='".$estado."' WHERE a.iddet = '".$IdApoyo."'";	 

 	}else {
 					
 		$sql1="UPDATE apoyo_postal a SET estado='".$estado."'  WHERE a.idapoyo = '".$IdApoyo."'"; 
 	}


    mysqli_query($conexion,$sql) or die (mysqli_error());
    mysqli_query($conexion,$sql1) or die (mysqli_error());

	mysqli_close($conexion);



?>



