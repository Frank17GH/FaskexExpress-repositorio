<?PHP
$hostname_localhost ="localhost";
$database_localhost ="fasktech_sistema";
$username_localhost ="fasktech_sistema";
$password_localhost ="vR_LQ3#W]haa";

$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);


$user=$_POST['user'];
$pass = $_POST['pass'];

//$user = "KAYAY";
//$pass = "KAYAY";

$stm=$conexion->prepare("SELECT iduser,trato,pe_nombres,pe_apellidos,local_pre,tipo,l.idlocales,l.idgiros,c.us_rol as rol, p.pe_mail as correo 
		FROM conf_user c inner join personal p on c.iduser = p.idpersonal 
		left join adm_locales l on c.local_pre = l.idlocales 
		inner join conf_giros g on l.idgiros = g.idgiros  WHERE user=? and pass=? ");

$stm->bind_param('ss',$user,$pass);
$stm->execute();

$resultado = $stm->get_result();
if($fila = $resultado->fetch_assoc()){	
	$json['usuario'][]=$fila;
	echo json_encode($json,JSON_UNESCAPED_UNICODE);
}else{
	echo "registra";
}

$stm->close();

$conexion->close();
		

?>



