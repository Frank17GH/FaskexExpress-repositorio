<?php 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();    
?>
<!-- FORMULARIO -->
    <form id="frm_salida" class="form-horizontal">   
        <div class="panel panel-default">
            <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">                                   
                <div id="div-frm_nuevo"><script>vAjax('exp_salidaruta','frm_salidanew',0,'frm_nuevo');</script></div>                     
            </div> 
        </div> 
    </form>  
<!-- END FORMULARIO --> 
  
<!-- TABLAS -->
    <div class="col-md-4">    
        <div  class="jarviswidget jarviswidget-color-blueDark">
            <header><h2>ORDEN DE SERVICIO / COMPROBANTES - CARGADOS</h2>
                <div class="widget-toolbar hidden-mobile" role="menu">
                    <div id="buttons1">
                        <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"></button>
                    </div>            
                </div>
            </header>
            <div class="jarviswidget-editbox">            
            </div>
            <div id ="div-temp">
                <script>vAjax('exp_salidaruta','tbl_temporal',0,'temp');</script>        
            </div>
        </div>
    </div>

    <div class="col-md-8 jarviswidget jarviswidget-color-blueDark" >
        <header>
            <h2>Asignados </h2>
            <div class="widget-toolbar hidden-mobile" role="menu">
                <div id="buttons1">
                    <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"></button>
                </div>            
            </div>
        </header>

        <div class="jarviswidget-editbox"></div>

        <div id ="div-det"></div><script>vAjax('exp_salidaruta','tbl_detalle',0,'det');</script> 
    </div>
<!-- END TABLAS -->   

<!-- SCRIPT -->   
    <script type="text/javascript">
        function sumar_fecha(day){

            var fecha = new Date($('#fecha_inicio').val());
            fecha.setDate(fecha.getDate() + 1);
            var tiempo = fecha.getTime(); 
        var milisegundos = parseInt(day*24*60*60*1000);
        var total = fecha.setTime(tiempo+milisegundos);
            var dia=fecha.getDate();
            var mes = fecha.getMonth()+1;
            var anio = fecha.getFullYear();
            var d=("0"+dia).slice(-2);
            var m=("0"+mes).slice(-2);
            var modi = anio+"-"+m+"-"+d;
            $('#fecha_fin').val(modi);
        }
    </script>
<!-- END SCRIPT -->   



