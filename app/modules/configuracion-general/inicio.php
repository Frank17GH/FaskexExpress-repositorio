<?php  require_once '../../recursos/db.class.php';?>
<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
        <form class="form-horizontal">
            <fieldset>
                <legend>Configuración General</legend>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Empresa</label>
                        <div class="col-md-6">
                            <input class="form-control" value="<?php echo __RAZON__ ?>" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">R.U.C.</label>
                        <div class="col-md-6">
                            <input class="form-control" value="<?php echo __RUC__ ?>" type="text" readonly>
                        </div>
                    </div>
                    
            </fieldset>               
                            
            <div class="form-group" style="margin-bottom: 3px;">

                
            </div>
        </form>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-institution"></i> </span>
        <h2>Listado de Giros Registrados</h2>
        <div class="widget-toolbar hidden-mobile" role="menu"> 
            <a class="dt-button buttons-copy buttons-html5 bttn_copy" onclick="vAjax('configuracion-general','mod1',0,'modal1');">
                <span>Nuevo Giro</span>
            </a>
            <span id="buttons3"></span>
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tabla3">
            <script>vAjax('configuracion-general','tabla3',0,'tabla3');</script>
        </div>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-tag"></i> </span>
        <h2>Listado de Locales Registrados</h2>
        <div class="widget-toolbar hidden-mobile" role="menu"> 
            <select class="form-control input-xs" id="idlocs" style="margin-top: 4px;">
                <option value="0">Todos</option>
            </select>
            
        </div>
        <div class="widget-toolbar hidden-mobile" role="menu"> 
            <a class="dt-button buttons-copy buttons-html5 bttn_copy" onclick="vAjax('configuracion-general','mod1',0,'modal1');">
                <span>Nuevo Local</span>
            </a>
            <span id="buttons1"></span>
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tabla1">
            <script>vAjax('configuracion-general','tabla1',$('#idlocs').val(),'tabla1');</script>
        </div>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-files-o"></i> </span>
        <h2>Listado de Series Registradas</h2>
        <div class="widget-toolbar hidden-mobile" role="menu"> 

            <span id="buttons2"></span>
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tabla2">
            <script>vAjax('configuracion-general','tabla2',0,'tabla2');</script>
        </div>
    </div>
</div>