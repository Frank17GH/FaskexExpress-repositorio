<?php
    include_once  "../../../recursos/db.class.php";
    include_once( "../.Model.php" );
    $val=0;$imagen=0;
    $class = new Mod(); 
    if (is_array($_FILES) && count($_FILES) > 0) {
        if (($_FILES["archivo"]["type"] == "image/pjpeg") || ($_FILES["archivo"]["type"] == "image/jpeg") || ($_FILES["archivo"]["type"] == "image/png") || ($_FILES["archivo"]["type"] == "image/gif")) {
            $imagen=explode('/', $_FILES["archivo"]["type"])[1];
        }
    }
    $ts1= $class->insert1($_POST['id'],$_POST['cod_prod'],$_POST['cod_fab'],$_POST['marca'],$_POST['cat'],$_POST['est'],$_POST['stock'],$_POST['nom'],$_POST['cost'],$_POST['stock_min'],$imagen,$_POST['medida'],$_POST['precio']);

    if ($ts1) {
        $nom=0;
        $val+=1;
        if (is_array($_FILES) && count($_FILES) > 0) {
            if (($_FILES["archivo"]["type"] == "image/pjpeg") || ($_FILES["archivo"]["type"] == "image/jpeg") || ($_FILES["archivo"]["type"] == "image/png") || ($_FILES["archivo"]["type"] == "image/gif")) {

                if ($_POST['id']!=0) {$nom=$_POST['id'];}else{$nom=$ts1;}
                $ruta="images/".$nom.'.'.explode('/', $_FILES["archivo"]["type"])[1];
                if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta)) {
                    $val+=1;
                } 
            } 
        }
        echo $val; 
    }else{
        echo 0;
    }
?>