<?php 
    require_once "../../../recursos/db.class.php";
    require_once "../.Model.php";

    $class = new Mod();
    $data='';

    switch ($_GET['t']) {
      case '1':
          foreach ($class->sel1() as $dta): 
              $data=$data.'{
                          "id": "'.$dta['id'].'",
                          "value": "'.utf8_encode($dta['series']).'"
                        },';  
          endforeach; 
          echo "[".substr($data, 0, -1)."]";       
      break;

      case '2':
          foreach ($class->sel2($_GET['ser']) as $dta): 
              $data=$data.'{
                          "num": "'.str_pad($dta['num'], 6, "0", STR_PAD_LEFT).'"
                        },';  
          endforeach;
          echo "[".substr($data, 0, -1)."]";        
      break;

      case '3':
          foreach ($class->cotizacion($_GET['num'],$_GET['ser']) as $dta): 

              $data=$data.'{
                          "idcotizacion": "'.$dta['idcotizacion'].'",
                          "fecha"  : "'.$dta['co_fecha'].'",
                          "nombres": "'.preg_replace("[\n|\r|\n\r]", "", $dta['cl_nombres']).'",
                          "ruc": "'.preg_replace("[\n|\r|\n\r]", "", $dta['cl_numdoc']).'",
                          "correo": "'.$dta['cl_correo'].'",
                          "direccion": "'.trim(preg_replace('/\s+/', ' ', $dta['cl_direccion'])).'",
                          "telefono": "'.$dta['cl_telefono'].'",
                          "carea": "'.$dta['ar_nombre'].'",
                          "cnombres": "'.$dta['co_nombres'].'",
                          "ctelefono": "'.$dta['co_telefono'].'",
                          "ccorreo": "'.$dta['co_correo'].'",
                           "servicio": "'.$dta['co_texto'].'"
                        },';  
          endforeach; 
          echo "[".substr($data, 0, -1)."]";    
      //    print_r(json_decode("[".substr($data, 0, -1)."]"));  
      break; 

      case '4': 
          $data='{"id":"0","value":"Seleccione Distrito"},';
          foreach ($class->list_distritos($_GET['id']) as $dta): 
              $data.='{
                              "id": "'.$dta['iddistrito'].'",
                              "value": "'.($dta['nombre']).'"
                            },';  
          endforeach;  
          echo "[".substr($data, 0, -1)."]";     
      break;   

       case '5': 
          $data='{"id":"0","value":"Seleccione Destino Local"},';
          foreach ($class->list_origen() as $dta): 
              $data.='{
                              "id": "'.$dta['re_cobertura'].'",     
                              "value": "'.($dta['re_nombre']).'"
                            },';  
          endforeach;  
          echo "[".substr($data, 0, -1)."]";     
      break;  

      case '6': 
          $data='{"id":"1","value":"Seleccione Destino Nacional"},';
          foreach ($class->list_destino() as $dta): 
              $data.='{
                              "id": "'.$dta['ren_cobertura'].'",     
                              "value": "'.($dta['ren_nombre']).'"
                            },';  
          endforeach;  
          echo "[".substr($data, 0, -1)."]";     
      break; 

      case '7': 
        function number_of_working_dates($from, $days) {
      $workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
      $holidayDays = ['*-12-25', '*-01-01', '2013-12-24', '2013-12-25']; # variable and fixed holidays

      $from = new DateTime($from);
      $dates = [];
      $dates[] = $from->format('Y-m-d');
    while ($days) {
        $from->modify('+1 day');

        if (!in_array($from->format('N'), $workingDays)) continue;
        if (in_array($from->format('Y-m-d'), $holidayDays)) continue;
        if (in_array($from->format('*-m-d'), $holidayDays)) continue;

        $dates[] = $from->format('Y-m-d');
        $days--;
    }
    return $dates;
}

//print_r( number_of_working_dates('2015-12-23', 10) );
$dates = number_of_working_dates(date("Y-m-d"), 30);
       
      $liqui = $_GET['dev']-1 ;
 
              $data.='{
                              "inicio": "'.$dates[1].'",     
                              "vence": "'.$dates[$_GET['ven']].'",
                              "devol": "'.$dates[$_GET['dev']].'",
                              "liqui": "'.$dates[$liqui].'"
                            },';  
          
          echo "[".substr($data, 0, -1)."]";     
      break; 

    }
   
?>