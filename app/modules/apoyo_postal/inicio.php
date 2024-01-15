<?php 
    include '../../recursos/db.class.php';
   
?>


<!-- TABLA DE ORDEN DE SERVICIO  -->
</div>
</div>
    <div class="jarviswidget" data-widget-editbutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-book"></i> </span>
            <h2>Apoyo Postal</h2>
            <div class="widget-toolbar hidden-mobile" role="menu">
                <div id="buttons1">
                    <button type="button" class="dt-button buttons-copy buttons-html5 bttn_copy" onclick="vAjax('apoyo_postal','tableInicio',0,'inicio');"  tabindex="0" aria-controls="dtable1" type="button"><span>Refrescar</span></button>
                </div>
                
            </div>
        </header>


        <div>
            <div class="jarviswidget-editbox"></div>
            <div class="widget-body no-padding">
                <div id ="div-inicio"></div>
                    <script>vAjax('apoyo_postal','tableInicio',0,'inicio');</script> 
                </div>
            </div>
        </div>
    </div> 


