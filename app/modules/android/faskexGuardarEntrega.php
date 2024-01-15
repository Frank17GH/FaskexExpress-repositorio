<?PHP

$hostname_localhost ="localhost";
$database_localhost ="fasktech_sistema";
$username_localhost ="fasktech_sistema";
$password_localhost ="vR_LQ3#W]haa";

$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	$estado = $_POST["estado"];

	$IdApoyo = $_POST["idapoyo"];

	$motivo = $_POST["motivo"];
	$entrega = $_POST["entrega"];

	$cargo = $_POST["cargo"];

	$nota = $_POST["observaciones"];

	$img1 = $_POST["img1"];

	$img2 = $_POST["img2"];

	$img3 = $_POST["img3"];

	$img4 = $_POST["img4"];

	$img5 = $_POST["img5"];
	
 	if($estado==2){

 		$sql="UPDATE despacho_det SET idmotivo='',identrega='',dd_fecha= now(),dd_estado='".$estado."',dd_nota='".$nota."',dd_img1='".$img1."',dd_img2='".$img2."',dd_img3='".$img3."',dd_img4='".$img4."',dd_img5='".$img5."' where idapoyo='".$IdApoyo."'";

 		$sql="UPDATE apoyo_postal SET estado=6 WHERE apoyo_postal.idapoyo = '".$IdApoyo."'";	 
 	}else {
 		$sql="UPDATE despacho_det SET idmotivo='',identrega='',dd_fecha= now(),dd_estado='".$estado."',dd_nota='".$nota."',dd_img1='".$img1."',dd_img2='".$img2."',dd_img3='".$img3."',dd_img4='".$img4."',dd_img5='".$img5."' where idapoyo='".$IdApoyo."'";

 		$sql="UPDATE apoyo_postal SET estado=7 WHERE apoyo_postal.idapoyo = '".$IdApoyo."'";
 	
 	}
 
    mysqli_query($conexion,$sql) or die (mysqli_error());

	mysqli_close($conexion);



?>



