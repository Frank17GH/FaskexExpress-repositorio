<?php 
    require_once "../../../recursos/db.class.php";
    require_once "../.Model.php";
    $data='';
    $class = new Mod(); 
    if ($_GET['st']==1) {
        foreach ($class->mod5(explode('-/', $_GET['idloc'])[0],$_GET['idcomp']) as $resul):
            $data.='{
                        "idser": "'.$resul['idseries'].'",
                        "tipo": "'.$resul['se_tipo'].'"
                    },';   
        endforeach;
    }
    if (isset($data) && $data!='') {echo "[".substr($data, 0, -1)."]";}
?>  