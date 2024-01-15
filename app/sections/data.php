<?php 
    require_once "../recursos/db.class.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $cn = new database(); 
    date_default_timezone_set('America/Lima');
    $fe=date('Y-m-d');
    if ($_GET['st']==2) {
        $dia=0;
        $dt1 = $cn->select("SELECT (SELECT count(idcomprobante) from comprobante where co_SUNAT=1 and co_tipo!='02') as enviado,(SELECT count(idcomprobante) from comprobante where co_SUNAT=2 and co_tipo!='02') as error,(SELECT count(idcomprobante) from comprobante where co_SUNAT=0 and co_tipo!='02') as pend,(SELECT DATE_FORMAT(co_fecha, '%Y-%m-%d') from comprobante where (co_SUNAT=0 and co_tipo!='02') or co_SUNAT=2 and co_tipo!='02' limit 1) as dias, (select count(*) from guia_remision WHERE gu_tipo='09' and gu_SUNAT=0) as guia, (SELECT count(*) from comprobante where co_tipo!='02' and co_SUNAT=0 and co_anulacion=1) as anula");    
        if($dt1){
            foreach ($dt1 as $dta): 
                
                if ($dta['dias']) {
                    $fecha1= new DateTime(date("Y-m-d", strtotime($dta['dias'])));
                    $fecha2= new DateTime(date('Y-m-d'));
                    $diff = $fecha1->diff($fecha2);
                    $dia=7-$diff->days;
                }
                $det='[{
                          "raz": "'.__RAZON__.'",
                          "vers": "'.__VERS__.'",
                          "pend": "'.$dta['pend'].'",
                          "err": "'.$dta['error'].'",
                          "env": "'.$dta['enviado'].'",
                          "vigu": "'.$dta['guia'].'",
                          "vian": "'.$dta['anula'].'",
                          "dias": "'.$dia.'"
                  }]';
            endforeach; 
        }
        echo  $det;
    }elseif ($_GET['st']==3) {
        include '../../../public_html/cpe/serv3.php';
    }
?>