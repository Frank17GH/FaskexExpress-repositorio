<?PHP

$hostname_localhost ="localhost";
$database_localhost ="fasktech_sistema";
$username_localhost ="fasktech_sistema";
$password_localhost ="vR_LQ3#W]haa";


$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	$estado = $_POST["estado"];

	$IdApoyo = $_POST["idapoyo"];

	$motivo = $_POST["motivo"];

	$cargo = $_POST["cargo"];

	$tipo = $_POST["tipo"];

	$inmueble = $_POST["inmueble"];

	$piso = $_POST["piso"];

	$color = $_POST["color"];

	$puerta = $_POST["puerta"];

	$observaciones = $_POST["observaciones"];

	
 	if($estado==2){
 		$sql="UPDATE `apoyo_postal` SET estado=6, `motivo` = '".$motivo."', `tipo` = '".$tipo."', `cargo` = '".$cargo."', `Inmueble` = '".$inmueble."', `piso` = '".$piso."', `color` = '".$color."', `puerta` = '".$puerta."', `observaciones` = '".$observaciones."' WHERE `apoyo_postal`.`idapoyo` = '".$IdApoyo."'";	 
 	}else {
 		$sql="UPDATE `apoyo_postal` SET estado=7, `motivo` = 0, `tipo` = 0, `cargo` = '".$cargo."', `Inmueble` = 0, `piso` = 0, `color` = 0, `puerta` = 0, `observaciones` = '".$observaciones."' WHERE `apoyo_postal`.`idapoyo` = '".$IdApoyo."'";
	 
 	}
	

    
    mysqli_query($conexion,$sql) or die (mysqli_error());


	mysqli_close($conexion);

/*

$hostname_localhost ="localhost";
$database_localhost ="fasktech_sistema";
$username_localhost ="fasktech_sistema";
$password_localhost ="vR_LQ3#W]haa";


$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	//$motivo = $_POST["motivo"];
	//$tipo = $_POST["tipo"];
	//$cargo = $_POST["cargo"]; //foto
	//$inmueble = $_POST["inmueble"];
	//$piso = $_POST["piso"];
	//$color = $_POST["color"];
	//$puerta = $_POST["puerta"];
	//$observaciones = $_POST["observaciones"];
	//$idapoyo = $_POST["idapoyo"];

	$motivo = "1";
	$tipo = "1";
	$cargo = "sakjdhasjdfhasldkjfhalskdfjhalsdjkfhafj";
	$inmueble = "1";
	$piso = "1";
	$color ="1";
	$puerta = "1";
	$observaciones = "prueba 94";
	$idapoyo = "94";


	$sql="UPDATE apoyo_postal SET 
		motivo = ?, 
		tipo = ?, 
		cargo = ?, 
		inmueble = ?, 
		piso = ?, 
		color = ?,
		puerta = ?, 
		observaciones = ?
		WHERE idapoyo = ?";

	 ;

 $stm->bind_param('ss',$motivo,$tipo,$cargo,$inmueble,$piso$color,$puerta,$observaciones,$idapoyo);
$stm->execute();

$resultado = $stm->get_result();
if($fila = $resultado->fetch_assoc()){	
	echo "registrado";
}else{
	echo "fallo";
}

$stm->close();

$conexion->close();
		



*/


?>



