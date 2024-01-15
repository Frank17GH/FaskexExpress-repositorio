<?php 
    session_start();
    require_once "../../../recursos/db.class.php";
    require_once "../.Model.php";
    $class = new Mod();
    
    $data='';
    if ($_GET['doc']) {
        foreach ($class->buscar($_GET['doc']) as $dta): 
              $data=$data.'{
                          "id": "'.$dta['idpersonal'].'",
                          "nombres": "'.preg_replace("[\n|\r|\n\r]", "", $dta['nom']).'"
                          
                        },';  
          endforeach; 
          echo "".substr($data, 0, -1)."";
    }else{

    }
?>