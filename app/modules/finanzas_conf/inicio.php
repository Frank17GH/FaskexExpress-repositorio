<div class="panel panel-default">
    <div class="panel-body" ><br>
        <form class="form-horizontal" id="frm1">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-12">
                    <legend><center>Configuración - FINANZAS</center></legend>
                </div>
                
            </div>
        </form>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-database"></i> </span>
        <h2>Categorías de Asientos Contables</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" type="button" onclick="vAjax('finanzas_conf','mod1',0,'modal1')"><span>Nueva Categoría</span></button>
        </div>
    </header>
    <div>
        <div class="widget-body no-padding" id="div-grid1"><script>vAjax('finanzas_conf','tabla1',0,'grid1');</script></div>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-book"></i> </span>
        <h2>Asientos Contables</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <a class="dt-button buttons-copy buttons-html5 bttn_copy" onclick="vAjax('finanzas_conf','mod2',0,'modal1');">
                <span>Nuevo Asiento</span>
            </a>
        </div>
        <div class="widget-toolbar hidden-mobile" role="menu">
            
            <div id="buttons1">
                
            </div>
            
        </div>
    </header>
    <div>
        <div class="widget-body no-padding" id="div-grid2"><script>vAjax('finanzas_conf','tabla2',0,'grid2');</script></div>
    </div>
</div>