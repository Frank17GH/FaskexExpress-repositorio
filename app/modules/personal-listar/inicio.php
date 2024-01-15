<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm_prod">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-10">
                </div>
                <div class="col-md-2" style="text-align: right;">
                    <div class="btn-group">
                        <a class="btn btn-labeled btn-primary" onclick="vAjax('personal-listar','mod2',0,'modal5');;"> <span class="btn-label"><i class="fa fa-plus"></i></span><b>Nuevo</b>&nbsp;&nbsp;</a>
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
        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-book"></i> </span>
        <h2>Listado de Personal Registrado</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl"><script>vAjax('personal-listar','tabla1',0,'tbl');</script></div>
    </div>
</div>