<?PHP
$hostname_localhost ="localhost";
$database_localhost ="fasktech_sistema";
$username_localhost ="fasktech_sistema";
$password_localhost ="vR_LQ3#W]haa";
$json=array();
$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
$user=$_GET['user'];
	$consulta="SELECT 
		d.iddespacho as idDespacho, 
		CONCAT(d.de_serie,'-',d.de_codigo )as codigo, 
		date_format(d.de_fecha, '%d-%m-%Y') as fecha, 
		d.de_hora, 
		if (d.de_ambito=1,'LOCAL','NACIONAL') as ambito, 
        if (d.de_tipo=1,'RECOJOS','ENTREGAS') as tipo, 
		d.de_observacion,
        (SELECT count(dt.iddet) FROM despacho_det dt WHERE dt.iddespacho=d.iddespacho) as cantidad,
        (SELECT count(dt.iddet) FROM despacho_det dt WHERE dt.iddespacho=d.iddespacho and dt.dd_estado=2) as pendiente,
        (SELECT count(dt.iddet) FROM despacho_det dt WHERE dt.iddespacho=d.iddespacho  and dt.dd_estado=3) as motivado,
        (SELECT count(dt.iddet) FROM despacho_det dt WHERE dt.iddespacho=d.iddespacho and dt.dd_estado=4) as entregado
        
        FROM despacho d 
        JOIN personal p on d.idpersonal = p.idpersonal 
        JOIN personal_contratos pc on p.idpersonal = pc.idpersonal 
        JOIN personal_cargo pca on pc.idpersonalcargo = pca.idpersonalcargo
        WHERE d.de_fecha_destino is not null and p.idpersonal =".$user;
	$resultado=mysqli_query($conexion,$consulta);
	
	while($registro=mysqli_fetch_array($resultado)){
		$json['despacho'][]=$registro;
		
	}
	mysqli_close($conexion);
	echo json_encode($json);
?>