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
                          "tipo"  : "'.$dta['tipo'].'",
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

               $data='{"id":"0","value":"[Seleccione Cargo]"},';
              foreach ($class->selCargos($_GET['id']) as $dta): 

                  $data.='{
                                  "id": "'.$dta['idpersonalcargo'].'",
                                  "value": "'.mb_strtoupper(utf8_encode($dta['ca_descripcion'])).'"
                          },';  
              endforeach;  
              echo "[".substr($data, 0, -1)."]";     
      break;  

       case '3': 
          $data1='{"id":"0","value":"[Seleccione Responsable]"},';
          foreach ($class->selPersonal($_GET['id'],$_GET['tp']) as $dta): 
              $data1.='{
                              "id": "'.$dta['idpersonal'].'",
                              "value": "'.$dta['nombres'].'"
                            },';  
          endforeach;  
          echo "[".substr($data1, 0, -1)."]";     
      break; 

     case '4':
          foreach ($class->series($_GET['cpe']) as $dta): 
              $data=$data.'{
                          "id": "'.$dta['id'].'",                          
                          "serie": "'.utf8_encode($dta['series']).'"
                        },';  
          endforeach; 
          echo "[".substr($data, 0, -1)."]";       
      break;

      case '5':
          foreach ($class->correlativos($_GET['ser']) as $dta): 
              $data=$data.'{
                          "num": "'.str_pad($dta['num'], 6, "0", STR_PAD_LEFT).'"
                        },';  
          endforeach;
          echo "[".substr($data, 0, -1)."]";        
      break;

      case '6':
        $data='{"id":"0","value":"[Seleccione Distrito]"},';
          foreach ($class->selAmbitoDistrito($_GET['id']) as $dta): 
              $data=$data.'{
                          "id": "'.$dta['id'].'",
                          "value": "'.$dta['distrito'].'" 
                        },';  
          endforeach;
          echo "[".substr($data, 0, -1)."]";        
      break;

      case '7':
        $data='{"id":"0","value":"[Seleccione Destino]"},';
          foreach ($class->emp_destino($_GET['id']) as $dta): 
              $data=$data.'{
                          "id": "'.$dta['id'].'",
                          "value": "'.$dta['nombre'].'" 
                        },';  
          endforeach;
          echo "[".substr($data, 0, -1)."]";        
      break;

      //-'.utf8_encode($dta['value']).'



   }
?>
