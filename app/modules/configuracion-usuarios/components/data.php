<?php 
    session_start();
    require_once "../../../recursos/db.class.php";
    require_once "../.Model.php";

    $class = new Mod();
    
    $data='';
    switch ($_GET['t']) {
      case '1': 
          foreach ($class->sel4($_GET['dni']) as $dta): 
              $data='{
                        "id": "'.$dta[idpersonal].'",
                        "value": "'.$dta[nom].'"
                      },';  
          endforeach;
      break;
      case '2':
          foreach ($class->mod5($_GET['idloc'],$_GET['iduser']) as $resul):
            $data.='{
                        "id": "'.$resul['idlocales'].'",
                        "value": "'.$resul['lo_abreviatura'].'"
                    },';   
          endforeach;
      break;
    }
    echo "[".substr($data, 0, -1)."]";
?>