<?PHP
$hostname_localhost ="localhost";
$database_localhost ="fasktech_sistema";
$username_localhost ="fasktech_sistema";
$password_localhost ="vR_LQ3#W]haa";
$json=array();
$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

$usuario=$_GET['usuario'];

	$consulta="SELECT  a.idApoyo, a.etiqueta as codigo,a.persona,a.dni,a.telefono,a.distrito,a.direccion,a.referencia  FROM `despacho_det` d 
	join apoyo_postal a on d.idapoyo=a.idapoyo
	join despacho ds on ds.iddespacho = d.iddespacho
	where ds.de_tipo = 1  and ds.idpersonal = ".$usuario;
	$resultado=mysqli_query($conexion,$consulta);
	
	while($registro=mysqli_fetch_array($resultado)){
		$json['recojo'][]=$registro;		
	}
	mysqli_close($conexion);
	echo json_encode($json);
?>