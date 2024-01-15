<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm_prod">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-10">
                </div>
                <div class="col-md-2" style="text-align: right;">
                    <div class="btn-group">
                        <a class="btn btn-labeled btn-primary" onclick="vAjax('personal-cargos','mod1',1,'modal1');"> <span class="btn-label"><i class="fa fa-plus"></i></span><b>Nuevo</b>&nbsp;&nbsp;</a>
                    </div>
                </div>
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                </div>
            </div><br>
        </form>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-mortar-board"></i> </span>
        <h2>Listado Servicios Registrados</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <button class="dt-button buttons-copy buttons-html5 bttn_copy" type="button" onclick="vAjax('configuracion-cotizacion','mod2',0,'modal1');"><span><b>NUEVO</b></span></button>
        </div>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <div id="buttons1">
            </div>
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl1"><script>vAjax('configuracion-cotizacion','tabla1',0,'tbl1');</script></div>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-mortar-board"></i> </span>
        <h2>Categoría de descripción</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <div id="buttons1">
                <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
            </div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl2"><script>vAjax('configuracion-cotizacion','tabla2',0,'tbl2');</script></div>
    </div>
</div>

<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-mortar-board"></i> </span>
        <h2>RECOJO Y ENTREGA LOCAL</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <div id="buttons1">
                <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Nuevo</span></button>
            </div>            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl3"><script>vAjax('configuracion-cotizacion','tabla_local',0,'tbl3');</script></div>
    </div>
</div>

<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-mortar-board"></i> </span>
        <h2>ENTREGA NACIONAL</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <div id="buttons1">
                <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Nuevo</span></button>
            </div>            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl4"><script>vAjax('configuracion-cotizacion','tabla_nacional',0,'tbl4');</script></div>
    </div>
</div>