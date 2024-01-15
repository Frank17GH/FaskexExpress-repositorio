<?php 
    session_start();
    require_once "../../../recursos/db.class.php";
    require_once "../.Model.php";
    $class = new Mod();     
    $data='';
    switch ($_GET['t']) {
      
      case '1': 
          $data='{"id":"0","value":"Seleccione Nomenclatura"},';
          foreach ($class->selnom($_GET['id']) as $dta): 
              $data.='{
                              "id": "'.$dta['idnom'].'",
                              "value": "'.mb_strtoupper(utf8_encode($dta['no_nombre'])).'"
                            },';  
          endforeach;  
          echo "[".substr($data, 0, -1)."]";     
      break;
      case '2': 
          $data='{"id":"0","value":"Seleccione Ambito"},';
          foreach ($class->selamb($_GET['id']) as $dta): 
              $data.='{
                              "id": "'.$dta['idambito'].'-/'.$dta['idnom'].'",
                              "value": "'.mb_strtoupper(utf8_encode($dta['am_nombre'])).'"
                            },';  
          endforeach;  
          echo "[".substr($data, 0, -1)."]";     
      break;          
      case '3': 
          $data='{"id":"0","value":"Seleccione Sub-Servicio"},';
          $ts=$class->sel1($_GET['id']);
          if ($ts) {
              foreach ($ts as $dta): 
              $data.='{
                              "id": "'.$dta['iddet'].'",
                              "value": "'.utf8_encode('[ '.$dta['de_descripcion']).' ] "
                            },';  
              endforeach; 
          }
          echo "[".substr($data, 0, -1)."]";
      break;

      case '4':
          foreach ($class->serie() as $dta): 
              $data=$data.'{
                          "id": "'.$dta['id'].'",
                          "value": "'.utf8_encode($dta['series']).'"
                        },';  
          endforeach; 
          echo "[".substr($data, 0, -1)."]";       
      break;

      case '5':
          foreach ($class->correlativo($_GET['ser']) as $dta): 
              $data=$data.'{
                          "num": "'.str_pad($dta['num'], 6, "0", STR_PAD_LEFT).'"
                        },';  
          endforeach;
          echo "[".substr($data, 0, -1)."]";        
      break;
     
     
     
    }
?>