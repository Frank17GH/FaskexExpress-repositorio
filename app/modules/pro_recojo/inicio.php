<?php 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();    
?>
<!-- FORMULARIO -->
<form id="frm_salida" class="form-horizontal">   
        <div class="panel panel-default">
            <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">                                   
                <div id="div-frm_recojo"><script>vAjax('pro_recojo','frm_recojo',0,'frm_recojo');</script></div>                     
            </div> 
        </div> 
    </form>  
<!-- END FORMULARIO --> 

