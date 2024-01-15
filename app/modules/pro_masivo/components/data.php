<?php 
   require_once "../../../recursos/db.class.php";
    require_once "../.Model.php";

    $class = new Mod();
    $data='';

    switch ($_GET['t']) {
      case '1':
          foreach ($class->ord_apoyo($_GET['ser'],$_GET['num']) as $dta):                           
             $data=$data.'{
                          "cliente": "'.$dta['cliente'].'",
                          "servicio"  : "'.$dta['servicio'].'",
                          "idservicio"  : "'.$dta['idservicio'].'",
                          "fecha": "'.$dta['fecha'].'",
                          "idorden": "'.$dta['idorden'].'",
                          "total": "'.$dta['total'].'",
                          "cotizacion": "'.$dta['cotizacion'].'",
                          "orden": "'.$dta['orden'].'",
                          "ingresado": "'.$dta['ingresado'].'"
                        },';             
          endforeach; 
          if ($dta['idorden']){
            echo "[".substr($data, 0, -1)."]";    
          }else {
            echo " ";    
           }              
      break; 
   }
?>
