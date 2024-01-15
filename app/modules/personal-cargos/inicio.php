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
        <h2>Listado de Cargos Registrados</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-clientes_listar"><script>vAjax('personal-cargos','tabla1',0,'clientes_listar');</script></div>
    </div>
</div>