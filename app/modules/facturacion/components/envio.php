<?php 

    if ($s02) {
        $data["comp_serie_corr"]=$s02['comp'];
        $data["comp_fech_emi"]=$s02['fech'];
        $link=$s02['ruta'];
        $to=trim($s02['correo']);
    }

    
    $from = 'cpe@fasktech.com';
    $subject = 'Documento: '.$data["comp_serie_corr"].' de '.__RAZON__; 
        
    if($s02['tipo']=='01'){$dff= 'FACTURA';}elseif ($s02['tipo']=='03') {$dff='BOLETA';}elseif ($s02['tipo']=='07'){$dff='NOTA DE CREDITO';}elseif ($s02['tipo']=='08'){$dff='NOTA DE DEBITO';}elseif ($s02['tipo']=='09'){$dff='GUIA DE REMISION';}
    ob_start();
    require_once 'mail.php';
    $htmlContent=ob_get_clean();
    $headers = "From: ".__RAZON__." FACTURACION"." <".$from.">";
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    $message = "--{$mime_boundary}\n"."Content-Type: text/html; charset=\"UTF-8\"\n"."Content-Transfer-Encoding: 7bit\n\n".$htmlContent."\n\n";
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    $mail = @mail($to, $subject, $message, $headers, $returnpath); 

    if ($mail) {
        // $ser=explode('-', $data["comp_serie_corr"])[0];
        // $num=intval(explode('-', $data["comp_serie_corr"])[1]);
        // $mysqli = new mysqli("localhost","transpor_intra","oTa93{^0","transpor_intra");
        // $result = $mysqli->query("UPDATE comprobante SET CORR=1 and idCorreo='".$to."' where Serie=".$ser." and Numero=".$num);
        // $data = $result->fetch_assoc();

       
        ?><script type="text/javascript"> aviso('info','Correo enviado correctamente!.');</script><?php
    }

?>