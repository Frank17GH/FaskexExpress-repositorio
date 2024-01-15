<?php 
    require_once "../recursos/db.class.php";
    $cn = new database(); 
    $dt1 = $cn->ejecutar("UPDATE comprobante set beta=1;"); 
?>