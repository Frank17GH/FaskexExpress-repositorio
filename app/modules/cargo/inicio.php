<?php 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();
 
?>          

<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header> 
        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-copy"></i></span>
        <h2>Descargo</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <div id="buttons1">
                <button class="dt-button buttons-copy buttons-html5 bttn_copy" onclick="vAjax('cargo','tabla1','0','tbl1')" tabindex="0" aria-controls="dtable1" type="button"><span>Refrescar</span></button>
            </div>            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
 
        <div class="widget-body no-padding" id="div-tbl1"><script>vAjax('cargo','tabla1','frm1','tbl1');</script></div>
    </div>
</div>

<script type="text/javascript">
    function mostrar(id) {               
        if (id != 6){
            $('#div_6').hide();
            $('#div_descargo').show();          
        }else {
            $('#div_'+id).show();
        }      
    }
</script>