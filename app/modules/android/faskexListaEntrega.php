<?PHP
include_once "conexion.php";

$json=array();

$despacho=$_GET['despacho'];

	$consulta="SELECT a.idApoyo, 
	a.etiqueta as codigo,
	d.idtipo as idtipo,
	a.persona,
	a.ap_peso as dni,
	a.telefono,
	(SELECT  CONCAT(cd.nombre,' - ',cp.nombre,' - ',cde.nombre) as nombre FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=a.ap_ubigeo ) as distrito,
	a.direccion,
	a.referencia,
	If(d.dd_estado=4,'ENTREGADO',if(d.dd_estado=3, 'MOTIVADO','PENDIENTE') ) as estado  

	FROM despacho_det d 
	JOIN apoyo_postal a on d.idapoyo=a.idapoyo
    WHERE d.iddespacho = ".$despacho;

    $consulta2= "SELECT  
    dd.idapoyo as idApoyo,
    CONCAT(c.co_serie,'-',LPAD(c.co_correlativo,5,'0')) as codigo,
    dd.idtipo as idtipo,
    cd.de_nombre as persona,
    cd.de_peso as dni ,
     (select cl_telefono from clientes where idclientes=cd.idclientes ) as telefono,

    (SELECT  CONCAT(cd.nombre,' - ',cp.nombre,' - ',cde.nombre) as nombre FROM ciudad_distrito cd left join ciudad_provincia cp on cd.idprovincia = cp.idprovincia left join ciudad_departamento cde on cd.iddepartamento =cde.iddepartamento where cd.iddistrito=cd.idlocales ) as distrito ,

    cd.de_direccion as direccion,
    cd.de_obser as referencia,
    If(dd.dd_estado=4,'ENTREGADO',if(dd.dd_estado=3, 'MOTIVADO','PENDIENTE') ) as estado  

    from despacho_det dd 
    join comprobante_det cd on cd.iddet=dd.idapoyo
    join comprobante c on c.idcomprobante =  cd.idcomprobante
	WHERE dd.idtipo=2 and dd.iddespacho=".$despacho;



	$resultado=mysqli_query($conexion,$consulta);
	$resultado2=mysqli_query($conexion,$consulta2);
	
	while($registro=mysqli_fetch_array($resultado)){
		$json['entrega'][]=$registro;		
	}
	while($registro2=mysqli_fetch_array($resultado2)){
		$json['entrega'][]=$registro2;		
	}
	mysqli_close($conexion);
	echo json_encode($json);
?>