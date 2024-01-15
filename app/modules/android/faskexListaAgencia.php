
<?PHP
include_once "conexion.php";

$json=array();

$usuario=$_GET['user'];

$consulta="SELECT
d.iddespacho,
CONCAT(d.de_serie,'-',d.de_codigo) as codigo,
d.de_fecha as fechaInicio,
(SELECT cd.nombre FROM  ciudad_distrito cd where cd.iddistrito=al.lo_ciudad ) as origen,
(SELECT cd.nombre FROM ciudad_distrito cd where cd.iddistrito=d.iddistrito ) as destino,
et.em_nombre as agencia,
CONCAT('Dir: ',et.em_direccion,'.Ref: ',et.em_referencia,'-',et.em_telefono) direccion,
(SELECT count(dt.iddet) FROM despacho_det dt WHERE dt.iddespacho=d.iddespacho) as cantidad,
if (d.de_ambito=1,'LOCAL','NACIONAL') as ambito,
d.de_observacion as nota,
d.de_codigorecojo as codigoRecojo
FROM despacho d
LEFT JOIN emp_transporte et on d.idempresa = et.idempresa
LEFT JOIN adm_locales al on d.local = al.idlocales
WHERE d.de_fecha_destino IS NULL and  d.idpersonal =".$usuario;

$resultado=mysqli_query($conexion,$consulta);    
    while($registro=mysqli_fetch_array($resultado)){
        $json['agencia'][]=$registro;        
    }
    mysqli_close($conexion);
    echo json_encode($json);
?>