<?php 
 
 session_start();
    require_once "../../recursos/db.class.php";
    require_once "./.Model.php";

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
      case '2': 

               $data='{"id":"","value":"[Seleccione Cargo]"},';
              foreach ($class->selCargos($_GET['id']) as $dta): 

                  $data.='{
                                  "id": "'.$dta['idpersonalcargo'].'",
                                  "value": "'.mb_strtoupper(utf8_encode($dta['ca_descripcion'])).'"
                          },';  
              endforeach;  
              echo "[".substr($data, 0, -1)."]";     
      break;  

       case '3': 
          $data1='{"id":"","value":"[Seleccione Responsable]"},';
          foreach ($class->selPersonal($_GET['id']) as $dta): 
              $data1.='{
                              "id": "'.$dta['idpersonal'].'",
                              "value": "'.mb_strtoupper(utf8_encode($dta[pe_apellidos].', '.$dta[pe_nombres])).'"
                            },';  
          endforeach;  
          echo "[".substr($data1, 0, -1)."]";     
      break;     


  }





                
?>
