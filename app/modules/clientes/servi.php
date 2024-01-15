<?php
$data = file_get_contents("https://api.conta.club/sunat/".$_GET['doc']);
                $json = json_decode($data, true);
  
                if ($json) {
                    $resul= '{"num": "'.$_GET['doc'].'", "nom":"'.$json['RazonSocial'].'","dir":"'.$json['Direccion'].'","serv":"1"}';
                    echo $resul;
                }else {
                    $data = file_get_contents("https://dni.optimizeperu.com/api/persons/".$_GET['doc']."?format=json");
                    $json = json_decode($data, true);
                    if ($json) {
                        $resul= '{"num": "'.$json['dni'].'", "nom":"'.$json['first_name'].' '.$json['last_name'].' '.$json['name'].'","dir":"-","serv":"2"}';
                        echo $resul;
                    }else{
                        $data = file_get_contents("https://api.reniec.cloud/dni/".$_GET['doc']);
                        $json = json_decode($data, true);
                        if ($json) {
                            $resul= '{"num": "'.$json['dni'].'","nom":"'.$json['apellido_paterno'].' '.$json['apellido_materno'].' '.$json['nombres'].'","dir":"-","serv":"3"}';
                            echo $resul;
                        }
                    }
                }
    
?>
