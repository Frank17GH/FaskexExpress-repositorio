<?php 
    session_start();
    require_once "../../../recursos/db.class.php";
    require_once "../.Model.php";
    $class = new Mod();
  if ($_GET['t']==3) {
    //carga el correlativo segun numero de serie
      $resultado = $cn->consulta("SELECT LPAD(Numero+1,8,'0') from comprobante where  TipDocEmisor='".explode("-", $_GET['serie'])[0]."' and Serie='".explode("-", $_GET['serie'])[1]."' ORDER BY ID DESC LIMIT 1");
      while ($resul=$resultado->fetch_array()) {
          $data=$data.'{
                         "value": "'.$resul[0].'"
                        },';  
      }
      if ($data=='') {
          $data=$data.'{
                         "value": "00000001"
                        },';  
      }     
        echo "[".substr($data, 0, -1)."]";                
  }elseif ($_GET['t']==2) {
      $serie=explode('-', $_GET['id'])[0];
      $num=intval(explode('-', $_GET['id'])[1]);
      foreach ($class->sel2($serie,$num) as $dta):
      if($dta['co_tipo_encomienda']==1){$dta['co_tipo_encomienda']=' (DOCUMENTOS)';}else{$dta['co_tipo_encomienda']=' (PAQUETE)';} 
          $data=$data.'{
                         "id": "'.$dta['idcomprobante'].'",
                         "nom": "'.$dta['co_nombre_envia'].'",
                         "nc": "'.$dta['co_estado'].'",
                         "doc": "'.$dta['co_ruc_envia'].'",
                         "dir": "'.$dta['co_direcc_envia'].'",
                         "corr": "'.$dta['co_correo_envia'].'",
                         "des": "ENCOMIENDA'.$dta['co_tipo_encomienda'].'",
                         "total": "'.number_format($dta['co_total'], 2,'.', '').'"
                        },';  
      endforeach;  
      echo "[".substr($data, 0, -1)."]";             
  }elseif ($_GET['t']==1) {
    //carga el correlativo segun numero de serie
    $ts=$class->sel1($_GET['tipo']);
      foreach ($ts as $dta): 
          $data=$data.'{
                         "ser": "'.$dta['ser'].'",
                         "corr": "'.str_pad($dta['corr'], 8, "0", STR_PAD_LEFT).'"
                        },';  
      endforeach;  
      echo "[".substr($data, 0, -1)."]";                
  }
?>


