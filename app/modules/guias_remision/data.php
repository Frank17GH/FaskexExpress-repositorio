<?php 
  require_once "../../recursos/db.class.php";
  $data='';
  $cn = new database(); 
  $cn->conectar();    
  session_start();
  if ($_GET['t']==7) {
    // carga los productos en tabla temporal
      $resultado = $cn->select("SELECT gt.id, gt.codigo, um.descripcion, gt.nombre, gt.cantidad, gt.docref, gt.flete from guia_temp gt left join unidad_medida um on gt.medida=um.id where gt.usuario_id=".$_SESSION[fasklog][iduser]." order by gt.id asc");
      if($resultado){
          foreach ($resultado as $dta) {
              $data=$data.'{ 
                            "id": "'.$dta['id'].'",
                            "codigo": "'.$dta['codigo'].'",
                            "bien": "'.$dta['nombre'].'",
                            "medida": "'.$dta['descripcion'].'",
                            "cantidad": "'.$dta['cantidad'].'",
                            "docref": "'.$dta['docref'].'",
                            "flete": "'.$dta['flete'].'"
                          },';
          }
      }
  }elseif ($_GET['t']==4) {
     $resultado = $cn->select("
        SELECT vv.ve_placa as placa,
            vv.idvehiculos as placaid,
            ve_marca as marca,
            CONCAT(pe_apellidos, ', ', pe_nombres) as conductor,
            p.idpersonal as idp,
            p.pe_dni as licencia,
            p.pe_dni as dni,
            v.id,
            s.lo_direccion as origen,
            s2.lo_direccion as destino 
        from 
            viajes v 
            left join vehiculos vv on v.vehiculo_id=vv.idvehiculos
            inner join adm_locales s on v.localOrigen_id=s.idlocales 
            inner join adm_locales s2 on v.localDestino_id=s2.idlocales 
            left join personal p on v.persona_id=p.idpersonal 
        where 
            v.id=".$_GET['viaje']." 
        limit 1");
      foreach ($resultado as $dta) {
          $data=$data.'{
                          "placa": "'.$dta['placa'].'",
                          "idVehiculo": "'.$dta['placaid'].'",
                          "vehiculo": "'.$dta['marca'].'",
                          "licencia": "'.$dta['licencia'].'",
                          "idChofer": "'.$dta['idp'].'",
                          "chofer": "'.$dta['conductor'].'",
                          "chofer_dni": "'.$dta['dni'].'",
                          "origen_direccion": "'.$dta['origen'].'",
                          "destino_direccion": "'.$dta['destino'].'"
                        },';  
      }
    }
    echo "[".substr($data, 0, -1)."]";      
?>


