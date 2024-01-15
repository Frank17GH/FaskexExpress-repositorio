<?PHP
$hostname_localhost ="localhost";
$database_localhost ="fasktech_sistema";
$username_localhost ="fasktech_sistema";
$password_localhost ="vR_LQ3#W]haa";

$json=array();

$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		$consulta="SELECT 
		d.iddespacho as idDespacho, 
		d.de_codigo as codigo, 
		d.de_fecha as fecha, d.de_hora, 
		d.de_tipo as tipo, 
		d.de_observacion, CONCAT(p.pe_apellidos,', ', p.pe_nombres) As responsable, (SELECT count(dt.iddet) FROM despacho_det dt WHERE dt.iddespacho=d.iddespacho) as cantidad, pca.ca_descripcion as tper FROM `despacho` d join personal p on d.idpersonal = p.idpersonal join personal_contratos pc on p.idpersonal = pc.idpersonal join personal_cargo pca on pc.idpersonalcargo = pca.idpersonalcargo";
		$resultado=mysqli_query($conexion,$consulta);
		
		while($registro=mysqli_fetch_array($resultado)){
			$json['despacho'][]=$registro;
			//echo $registro['id'].' - '.$registro['nombre'].'<br/>';
		}
		mysqli_close($conexion);
		echo json_encode($json);
?>