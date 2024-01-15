<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm1">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-12" style="text-align: center;">
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                         <select class="form-control" name="estado" onchange="vAjax('servicios-categorias','tabla1','frm1','tab1')">
                            <option value="3">Todos</option>
                            <option value="1">Activos</option>
                            <option value="0">Inactivos</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-labeled btn-primary" onclick="vAjax('servicios-categorias','mod1',0,'modal1');"> <span class="btn-label"><i class="fa fa-plus"></i></span><b>Nuevo</b>&nbsp;&nbsp;</a>
                    </div>
                   
                    </div>
                </div>
            </div><br>
        </form>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
	<header>
        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-codepen txt-color-yellow"></i> </span>
        <h2>Listado de categorías registradas</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tab1"><script type="text/javascript">vAjax('servicios-categorias','tabla1','frm1','tab1');</script></div>
    </div>
</div>
