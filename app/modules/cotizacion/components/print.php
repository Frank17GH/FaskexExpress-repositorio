<?php 
    require_once  "../../../recursos/db.class.php";
    include_once( "../.Model.php" );
    $funcion = new Mod(); 
    $ts1= $funcion->sel2($_GET['id']);    
    $mes = array(0, 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cotizacion | <?php echo __COM__ ?></title>
</head>
<body onload="window.print();" onafterprint="window.close();">
    <?php foreach ($ts1 as $dta): ?>
    <style type="text/css">
        .bg-registro {
            background-image: url("http://sistemas.faskex.com/app/recursos/img/print/cotizador_1.png");background-repeat: repeat-y;
            min-height: 98.5vh;
            background-size: cover;
            position: absolute;
            padding:0;
            width:100%;
            height:99%;
            margin:0;
            filter:alpha(opacity=90);
            opacity:.90;
            page-break-inside:auto;
            font-family: Arial, Helvetica, sans-serif;
        } 
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
          font-size: 12px;
        }

        #customers tr:nth-child(even){
            background-color: color: #f2f2f2;;
             }

        #customers tr:hover {background-color: #ddd;}

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #002B4D;
          color: white;
          font-size: 13px;
        }
    </style>
    <section class="bg-registro">
        <div class="col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-12 col-sm-10 col-md-10 col-lg-10 registrat">
        <section>
            <form action='' method="POST">
                <div class="farciment-formulari">
                    <div style="padding: 30px; text-align: justify;"><br><br><br><br>
                        <p style="text-align: right;">
                            <?php echo $dta[lugar] ?>, <?php echo date('d', strtotime($dta[co_fecha])) ?> de <?php echo $mes[date('n', strtotime($dta[co_fecha]))] ?> del <?php echo date('Y', strtotime($dta[co_fecha])) ?>
                        </p>
                        <p>
                            <b style="color: #002B4D;line-height: 23px ">Señor(a):</b><br> 
                            <b style="line-height: 20px ;">
                                <?php echo mb_strtoupper(mb_strtolower($dta[co_nombres])) ?> 
                                <br>Area:
                                <?php echo  $dta[ar_nombre]; ?> <br>
                                Responsable:
                            </b>  
                                <?php echo $dta[cl_nombres]; ?>  
                        </p>
                        <p>
                            <b style="color: #002B4D;">Presente.-</b><br>
                            Por medio de la presente saludarla y a la vez poder enviarle nuestra cotización de acuerdo a sus necesidades:<br><br>

                            <b>FASK EXPRESS S.A.C.</b> es una empresa 100% peruana, cuyo objeto social es brindar Servicios Logísticos de Mensajería, Courier, Paquetería, Gestión Documentaria y Outsorcing a nivel nacional. <br><br>

                            Nuestro espíritu positivo pone a nuestros clientes en el centro de lo que hacemos, entregar un servicio de calidad es nuestra prioridad y parte de nuestro ADN. 
                            <br>
                            Por medio de la presente nos es grato cotizarle lo siguiente:
                        </p>
                    
                    <CENTER><b style="color: #002B4D;"> SERVICIO DE <?php echo $dta [co_texto]; ?>  </b></CENTER><br>                    
                   
                    <table id="customers"  width="100%">
                    <thead>
                        <tr>
                            <th data-hide="esconder" style="width:5px">Item</th>
                            
                            <th data-class="expand" style="width:150px" ><center>Sub-Servicio</center></th>
                            <th data-class="expand" ><center>Detalle</center></th>
                            <th data-hide="esconder" style="width:5px">Cant.</th>
                            <th data-hide="esconder" style="width:5px">Precio</th>                                
                            <th data-hide="esconder" style="width:50px">Total sin IGV</th>                               
                        </tr>
                    </thead><tbody>
                        <?php 
                        $funcion = new Mod(); 
                        $dt2= $funcion->detalle($_GET['id']);                           
                            if($dt2){$cc=0; $total = 0; $valor = 0; 
                                foreach ($dt2 as $dta2): $cc++; 
                                     $total+= $dta2[total];
                                    ?>
                            <tr>
                                <td><?php echo$cc; ?></td>                                
                                <td><?php echo $dta2[de_descripcion],'-',$dta2[tipo_entrega]; ?></td>
                                <td> 
                                <?php if ($dta2[idambito]==1||$dta2[idambito]==2 ) { 
                                    echo "Recojo:",$dta2[tipo_recojo],"= S/", $dta2[precio_recojo] ;}
                                 ?>
                                </td>                            
                                <td> <center>
                                    <?php echo $dta2[cantidad]; ?>
                                    </center>
                                </td>
                            <td><?php echo "<b>S/.</b>",$dta2[precio_entrega];?></td>
                            <td><b class="mon">S/.</b><?php echo  number_format($dta2[total],2,'.','') ; ?></td>
                                                                                   
                        </tr>
                                    <?php 
                                endforeach; 
                            }
                        ?>
                    </tbody>
                </table> 
                <div style="float: right;padding-top: 5px;">
                 <table id="customers" style="width: 250px;"  >
                    <tbody>
                         <tr>
                             <th style="padding-top: 2px; padding-bottom: 1px;">SUB-TOTAL</th>
                             <td style="width:100px;font-size: 15px;" ><b>S/</b><?php  echo number_format($total, 2, '.', ''); ; ?></td>
                         </tr>
                         <tr>
                             <th style="padding-top: 2px; padding-bottom: 1px;">IGV</th>
                             <td style="font-size: 15px;" ><b>S/</b><?php echo number_format( $igv=$total*0.18, 2, '.', ''); ?></td>
                         </tr>
                         <tr>
                             <th style="padding-top: 2px; padding-bottom: 1px;">TOTAL</th>
                             <td style="font-size: 15px;" ><b>S/</b><?php echo number_format($total+$igv, 2, '.', '');  ?></td>
                         </tr>
                     </tbody>
                 </table>   
                </div><br><br><br><br><br><br><br>

                <b style="color: #002B4D;">Detalle del Servicio</b><br>
                <?php  $ts2= $funcion->listar_detalle($dta[servicios],1);
                     foreach ($ts2 as $dta2): ?>
                        <li style="line-height: 23px ; margin-left: 30px;" type="disc"><?php echo $dta2[ad_descrip] ?></li> 
                <?php endforeach; ?>

                
                <?php  $ts3= $funcion->listar_detalle($dta[servicios],3);
                    if ($ts3) { ?>
                        <br><b style="color: #002B4D;">Proceso Operativo </b><br> <?php 
                     foreach ($ts3 as $dta2): ?>
                        <li style="line-height: 23px ; margin-left: 30px;" type="disc"><?php echo $dta2[ad_descrip] ?></li> 
                <?php endforeach; }  ?>

                 

                <?php $ts2= $funcion->listar_detalle($dta[servicios],5);
                     foreach ($ts2 as $dta2): ?>
                        <br><b style="color: #002B4D;">Nota</b><br>
                        <li style="line-height: 23px ;  margin-left: 30px;" type="disc"><?php echo $dta2[ad_descrip] ?></li> 
                <?php endforeach; ?>

                <br><b style="color: #002B4D">Formas de pago</b><br>
                <?php  $ts2= $funcion->listar_detalle($dta[servicios],4);
                     foreach ($ts2 as $dta2): ?>
                        <li style="line-height: 23px;  margin-left: 30px;" type="disc"><?php echo $dta2[ad_descrip] ?></li> 
                <?php endforeach; ?>
                                        <br>
                                        <p>
                                            Para mayor información, consulta o visita no dude en comunicarse a nuestra central (01) 719-6218 y con gusto lo atenderemos o coordinaremos una entrevista personal o telefónica.
                                        </p>
                                        <p>
                                            Sin otro en particular y a la espera de su comunicación, quedamos de usted. 
                                        </p>
                                        <p>
                                            Atentamente,
                                        </p>
                                    </div>

                                    <img style="width:650px; height: 160px;" src="http://sistemas.faskex.com/app/recursos/img/print/att-danny.png">
                                    

                                </div>
                            </form>
                       </section>
                   </div>
                </section>
            </body>
            </html>
        <?
    endforeach; 
?>
</body>
</html> 
