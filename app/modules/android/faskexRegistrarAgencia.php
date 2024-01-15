<?PHP
include_once "conexion.php";
		
	$iddespacho = $_POST["iddespacho"];
	$fecha = $_POST["fecha"];
	$nota = $_POST["nota"];

	if($fecha!=null){		
	$sql="UPDATE despacho SET 
 		de_fecha_destino='".$fecha."',
 		de_nota='".$nota."'
 		where iddespacho='".$iddespacho."'";
 	$result = mysqli_query($conexion,$sql) or die (mysqli_error()); 	
	echo $result;	 	
 	}else{
 		echo "0";
 	}
 	mysqli_close($conexion);
?>
