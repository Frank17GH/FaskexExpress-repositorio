<?php 
   require_once "../../../recursos/db.class.php";
    require_once "../.Model.php";

    $class = new Mod();
    $data='';

    switch ($_GET['t']) {
      case '1':
          $dta1 = $class->paquete($_GET['comp'],$_GET['amb']);

       if($dta1){ 

         foreach ($dta1 as $dta): 
            $data=$data.'{
                          "idapoyo": "'.$dta['idapoyo'].'",
                          "persona"  : "'.$dta['persona'].'",
                          "direccion"  : "'.$dta['direccion'].'",
                           "distrito": "'.$dta['distrito'].'"
                        },';  
          endforeach; 
          echo "[".substr($data, 0, -1)."]";     
            }else{ ?>
                <script>
                aviso('danger','Paquete no habilitado o ya se encuentra asignado','Error!');
                </script>
            <?php }     
      break; 
   }
?>
