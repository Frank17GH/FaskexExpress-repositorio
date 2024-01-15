<?php 
    session_start();
    require_once "../../../recursos/db.class.php";
    require_once "../.Model.php";

    $class = new Mod();
    
    $data='';
    switch ($_GET['t']) {
      case '1': 
          $cpe='';$ser='';
          foreach ($class->comp1() as $dta): 
              $cpe.='{
                        "cod": "'.$dta['cod'].'",
                        "icon": "'.$dta['cpe_icon'].'",
                        "descrip": "'.$dta['cpe_abre'].'"
                      },';  
          endforeach;
          $dt2=$class->comp1_2();
          if ($dt2) {
            foreach ($dt2 as $dta): 
              $ser.='{
                        "tip": "'.$dta['tipo'].'",
                        "ser": "'.$dta['idseries'].'"
                      },';  
          endforeach;
          }
          
          $cpe='"cpe":['.substr($cpe, 0, -1).']';
          $ser='"series":['.substr($ser, 0, -1).']';
          $data='{'.$cpe.','.$ser.'},';
          echo "[".substr($data, 0, -1)."]";
      break;
    }
?>