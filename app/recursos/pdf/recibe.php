<?php   
  $nombre = $_FILES['userfile']['name'];
  $tipo_archivo = $_FILES['userfile']['type'];
  $tamano_archivo = $_FILES['userfile']['size'];
  $ruta = "pdf/";
  $ruta_del_archivo = $ruta.'aaaaa.xlsx';  
  $nombre_archivo=$_FILES['userfile']['name'];
  $cont=0;

if ($nombre_archivo!=''){
 console.log("%c? si existe archivo", "color: #148f32"); 
  if(move_uploaded_file($_FILES['userfile']['tmp_name'],$ruta_del_archivo)){     
    console.log("%c? se movio archivo", "color: #148f32"); 
    require_once('vendor/php-excel-reader/excel_reader2.php');
    require_once('vendor/SpreadsheetReader.php');   
    $mbd = new PDO("mysql:host=localhost;dbname=fasktech_sistema", "fasktech_sistema", "vR_LQ3#W]haa");         
    $Reader = new SpreadsheetReader($ruta_del_archivo);
    $sheetCount = count($Reader->sheets());
      
    for($i=0;$i<$sheetCount;$i++){          
      $Reader->ChangeSheet($i);
      foreach ($Reader as $Row){   
        $cont++;
        if(!isset($Row[0])){$Row[0]='';}

        if($cont=10 && $Row[0]!=''){
          $id = $Row[0]; 
          $empresa = $Row[2];         
          $persona = $Row[3];
          $direccion = $Row[4];
          $referencia = $Row[5];
          $telefono = $Row[6];
          $departamento = $Row[7];
          $provincia = $Row[8];
          $distrito = $Row[9];
          $ubigeo = $Row[10];
          $codpostal = $Row[11];
          $cargo = $Row[12];
          $codigo = $Row[13];
          $peso = $Row[14];
          $nota = $Row[15];
          
          if (!empty($id) ) {                  
            $consulta = $mbd->prepare("UPDATE apoyo_postal SET 
            ap_empresa = '".$empresa."',
            persona = '".$persona."',
            direccion = '".$direccion."',
            referencia = '".$referencia."',
            telefono = '".$telefono."',
            ap_departamento = '".$departamento."',
            ap_provincia = '".$provincia."',
            ap_distrito = '".$distrito."',
            ap_ubigeo = '".$ubigeo."',
            ap_codpostal = '".$codpostal."',
            ap_cargo = '".$cargo."',
            ap_codigo = '".$codigo."',
            ap_peso = '".$peso."',
            observaciones = '".$nota."' 
            WHERE idapoyo =".$id); 
            $consulta->execute();
            echo $consulta->rowCount() ; 
          } else{
            console.log("%c? No se actualizo bd", "color: #ed1c24");
          }
        }  
      }        
    }
  }
  else{
    console.log("%c? No se movio archivo", "color: #ed1c24");
  }
}else {   
    console.log("%c? No existe archivo", "color: #ed1c24");
}
 
?>