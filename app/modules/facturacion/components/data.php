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
      case '2':
          foreach ($class->comp2($_GET['id']) as $dta): 
              $data=$data.'{
                              "corr": "'.str_pad($dta['corr'], 8, "0", STR_PAD_LEFT).'"
                          },';  
          endforeach;   
          echo "[".substr($data, 0, -1)."]";    
      break;
      case '3':
          foreach ($class->sel3($_GET['num']) as $dta): 
              $data=$data.'{
                          "id": "'.$dta['idclientes'].'",
                          "nombres": "'.preg_replace("[\n|\r|\n\r]", "", $dta['cl_nombres']).'",
                          "correo": "'.$dta['cl_correo'].'",
                          "direccion": "'.trim(preg_replace('/\s+/', ' ', $dta['cl_direccion'])).'",
                          "telefono": "'.$dta['cl_telefono'].'"
                        },';  
          endforeach; 
          echo "[".substr($data, 0, -1)."]";    
      //    print_r(json_decode("[".substr($data, 0, -1)."]"));  
      break;
      case '4':
          foreach ($class->sel4($_GET['id']) as $dta): 
              $data=$data.'{
                          "id": "'.$dta['idcontacto'].'",
                          "value": "'.$dta['co_area'].'"
                        },';  
          endforeach; 
          echo "[".substr($data, 0, -1)."]";      
      break;
      case '5':
          foreach ($class->sel5($_GET['id']) as $dta): 
              $data=$data.'{
                              "value": "'.$dta['co_nombres'].'"
                            },';  
          endforeach;  
          echo "[".substr($data, 0, -1)."]";     
      break;
      case '6': 
          $data='{"id":"0","value":"Seleccione una provincia"},';
          foreach ($class->sel6($_GET['id']) as $dta): 
              $data.='{
                              "id": "'.$dta['idprovincia'].'",
                              "value": "'.mb_strtoupper($dta['nombre']).'"
                            },';  
          endforeach;  
          echo "[".substr($data, 0, -1)."]";     
      break;
      case '7': 
          $data='{"id":"0","value":"Seleccione un distrito"},';
          foreach ($class->sel7($_GET['id']) as $dta): 
              $data.='{
                              "id": "'.$dta['iddistrito'].'",
                              "value": "'.mb_strtoupper($dta['nombre']).'"
                            },';  
          endforeach;  
          echo "[".substr($data, 0, -1)."]";     
      break;
      case '8': 
           foreach ($class->sel8($_GET['id']) as $dta): 
              $data.='{
                              "kb": "'.$dta['kilo_base'].'",
                              "ka": "'.$dta['kilo_adicional'].'",
                              "ed": "'.$dta['envio_dom'].'",
                              "ps": "'.$dta['precio_sobre'].'"
                            },';  
          endforeach;  
          echo "[".substr($data, 0, -1)."]";     
      break;
      case '9': 
           foreach ($class->sel9() as $dta): 
              $data.='{
                              "id": "'.$dta['idcomprobante'].'",
                              "icon": "'.$dta['cpe_icon'].'",
                              "value": "'.$dta['co_serie'].'-'.str_pad($dta['co_correlativo'], 8, "0", STR_PAD_LEFT).' [ '.$dta['co_nombre_envia'].' ]"
                            },';  
          endforeach;  
          echo "[".substr($data, 0, -1)."]";     
      break;
      case '10': 
          $data='{"id":"0","value":"Seleccione un distrito"},';
          $ts=$class->sel10($_GET['id']);
          if ($ts) {
              foreach ($ts as $dta): 
              $data.='{
                              "id": "'.$dta['idlocales'].'",
                              "value": "'.mb_strtoupper(utf8_encode('[ '.$dta['nombre'])).' ] '.$dta['lo_abreviatura'].'"
                            },';  
              endforeach; 
          }
          echo "[".substr($data, 0, -1)."]";
      break;
      case '11': 
          $data='{"id":"0","value":"Seleccione una provincia"},';
          foreach ($class->sel11($_GET['id']) as $dta): 
              $data.='{
                              "id": "'.$dta['idprovincia'].'",
                              "value": "'.mb_strtoupper(utf8_encode($dta['nombre'])).'"
                            },';  
          endforeach; 
          echo "[".substr($data, 0, -1)."]";      
      break;
      case '12': 
          
      break;
      case '13': $data = array();
          foreach ($class->sel13($_POST['searchTerm']) as $dta): 
              $data[] = array("id"=>$dta['idproducto'], "text"=>$dta['pr_nombre']);

          endforeach; 
         echo json_encode($data);
      break;
      case '14':
          foreach ($class->sel14($_GET['dni']) as $dta): 
              $data=$data.'                         
                          {
                          "id": "'.$dta['idarea'].'",                          
                          "value": "'.$dta['ar_nombre'].'"
                        },';  
          endforeach; 
          $dat=$dat.'{
                          "id": "0",                          
                          "value": "Seleccione Área"
                            },';
          echo "[".substr($dat.$data, 0, -1)."]";      
      break;
      case '15':
       $data='{"id":"0","nombre":"Seleccione Resposable"},';
          foreach ($class->sel15($_GET['id']) as $dta): 
              $data.='{
                        "id": "'.$dta['idcontacto'].'",
                        "nombre": "'.mb_strtoupper(utf8_encode($dta['co_nombres'])).'"
                      },';  
          endforeach; 
          echo "[".substr($data, 0, -1)."]";          
      break;
      case '16':
       $data='{},';
          foreach ($class->sel16($_GET['id']) as $dta): 
              $data.='{
                        "correo": "'.$dta['co_correo'].'",
                        "telefono": "'.$dta['co_telefono'].'"
                      },';  
          endforeach; 
          echo "[".substr($data, 0, -1)."]";          
      break;

      case '17': 
          $cpe='';$ser='';
          foreach ($class->comp17() as $dta): 
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

      case '18': 
          // {"tip":"0","ser":"0"},
          $ser='';
          $cpe='';
          foreach ($class->comp17() as $dta): 
              $cpe.='{
                        "cod": "'.$dta['cod'].'",
                        "icon": "'.$dta['cpe_icon'].'",
                        "descrip": "'.$dta['cpe_abre'].'"
                      },';  
          endforeach;
          $dt2=$class->serie_atencion($_GET['id']);
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