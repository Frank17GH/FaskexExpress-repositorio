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


    $ts1= $class->entregado($_POST['id'],$_POST['fecha'],$_POST['hora'],$imagen,$_POST['cajj']);   
   if ($ts1) {
        $nom=0;
        $val+=1;         

        if($_POST['img']){
                   unlink('imagen/'.$_POST['img']);

            if (is_array($_FILES) && count($_FILES) > 0) {
                if (($_FILES["archivo"]["type"] == "image/pjpeg") || ($_FILES["archivo"]["type"] == "image/jpeg") || ($_FILES["archivo"]["type"] == "image/png") || ($_FILES["archivo"]["type"] == "image/gif")) {
               
                    if ($_POST['id']!=0) { $nom=$_POST['id'];}else{$nom=$ts1;}

                    $ruta="imagen/".$nom.'.'.explode('/', $_FILES["archivo"]["type"])[1];
                    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta)) {
                        $val+=1;
                    } 
                } 
            }      
            echo $val; 

             }else {
                  if (is_array($_FILES) && count($_FILES) > 0) {
                if (($_FILES["archivo"]["type"] == "image/pjpeg") || ($_FILES["archivo"]["type"] == "image/jpeg") || ($_FILES["archivo"]["type"] == "image/png") || ($_FILES["archivo"]["type"] == "image/gif")) {
               
                    if ($_POST['id']!=0) { $nom=$_POST['id'];}else{$nom=$ts1;}

                    $ruta="imagen/".$nom.'.'.explode('/', $_FILES["archivo"]["type"])[1];
                    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta)) {
                        $val+=1;
                    } 
                } 
            }      
            echo $val; 
             }

    }else
    {
        echo 0;
    }
?>