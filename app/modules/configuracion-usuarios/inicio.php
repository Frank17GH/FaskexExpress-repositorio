
<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm1">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="tipo" onchange="vAjax('configuracion-usuarios','tabla1','frm1','tbl1');">
                        <?php 
                            if(!$_SESSION['fasklog']['tipo']){
                                ?>
                                    <option value="0">Super Usuario</option>
                                <?php
                            } 
                        ?>
                        
                        <option value="1" selected="">Usuario Directo</option>
                    </select>
                </div>
                <div class="col-md-2" style="text-align: center;">
                    <div class="btn-group">
                        <a class="btn btn-labeled btn-primary" onclick="vAjax('configuracion-usuarios','mod3',0,'modal1');"> <span class="btn-label"><i class="fa fa-plus"></i></span><b>Nuevo</b>&nbsp;&nbsp;</a>
                    </div>
                </div>
                <div class="col-md-12">
                </div>
            </div><br>
        </form>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
	<header>
        <span class="widget-icon"> <i class="fa fa-key"></i> </span>
        <h2>Listado de Usuarios Registrados</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl1"><script>vAjax('configuracion-usuarios','tabla1','frm1','tbl1');</script></div>
    </div>
</div>