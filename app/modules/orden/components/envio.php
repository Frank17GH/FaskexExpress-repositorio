<?php
//cambiar aqui el email
if (form_mail($_POST[para], $_POST[Asunto],
"Los datos introducidos en el formulario son:\n\n", $_POST[de])){
?><script> alert("Correo enviado correctamente!.");
	window.close();
	window.open("https://sistemas.faskex.com/#!/ventas/orden/");
	</script><?php
}else {
 ?><script> alert("Error en datos del correo!.");</script><?php
}

function form_mail($sPara, $sAsunto, $sTexto, $sDe)
{
	$bHayFicheros = 0;
	$sCabeceraTexto = "";
	$sAdjuntos = "";

	if ($sDe) 
		$sCabeceras = "From: ".FASKEX_." ORDEN DE SERVICIO"." <".$sDe.">";	
	$sCabeceras .= "MIME-version: 1.0\n";

	
	foreach ($_POST as $sNombre => $sValor)
	$sTexto = "Orden de Servicio - Faskex \n ";
	$sTexto .= "Serie-N° : ".$_POST[orden];
	$sTexto .= "\n Fecha : ".$_POST[fecha];
	$sTexto .= "\n Cliente : ".$_POST[cliente];
	$sTexto .= " \nContacto : ".$_POST[contacto];
	$sTexto .= "\n --------------------------------------------------------------------------------\n ";
	$sTexto .= " Servicio : ".$_POST[servicio];
	$sTexto .= "\n -------------------------------------------------------------------------------- \n ";
	$sTexto .= "Orden de Trabajo - Faskex \n ";
	$sTexto .= "Serie-N° : ".$_POST[trabajo];
	$sTexto .= "\n Detalle : \n".$_POST[Mensaje];
	//$sTexto = $sTexto."\n".$sNombre." : ".$sValor;

	foreach ($_FILES as $vAdjunto)
	{
	if ($bHayFicheros == 0)
		{
		$bHayFicheros = 1;
		$sCabeceras .= "Content-type: multipart/mixed;";
		$sCabeceras .= "boundary=\"--_Separador-de-mensajes_--\"\n";

		$sCabeceraTexto = "----_Separador-de-mensajes_--\n";
		$sCabeceraTexto .= "Content-type: text/plain;charset=iso-8859-1\n";
		$sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n";

		$sTexto = $sCabeceraTexto.$sTexto;
		}
	if ($vAdjunto["size"] > 0)
		{
		$sAdjuntos .= "\n\n----_Separador-de-mensajes_--\n";
		$sAdjuntos .= "Content-type: ".$vAdjunto["type"].";name=\"".$vAdjunto["name"]."\"\n";;
		$sAdjuntos .= "Content-Transfer-Encoding: BASE64\n";
		$sAdjuntos .= "Content-disposition: attachment;filename=\"".$vAdjunto["name"]."\"\n\n";

		$oFichero = fopen($vAdjunto["tmp_name"], 'r');
		$sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"]));
		$sAdjuntos .= chunk_split(base64_encode($sContenido));
		fclose($oFichero);
		}
	}

	if ($bHayFicheros)
	$sTexto .= $sAdjuntos."\n\n----_Separador-de-mensajes_----\n";
	return(mail($sPara, $sAsunto, $sTexto, $sCabeceras));
}

?>
<script>
	 var html=window.opener.getElementById("response").innerHTML,
  html="el envió del formulario finalizo con exito!"

</script>