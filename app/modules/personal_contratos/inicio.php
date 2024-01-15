<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm1">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-10">
                    
                </div>
                <div class="col-md-2" style="text-align: right;">
                    <div class="btn-group">
                        <a class="btn btn-labeled btn-primary" onclick="vAjax('personal_contratos','mod1',1,'modal1');"> <span class="btn-label"><i class="fa fa-plus"></i></span><b>Nuevo</b>&nbsp;&nbsp;</a>
                    </div>
                </div>
                <div class="col-md-12"><br></div>
            </div>
        </form>
    </div>
    
    
</div>
<div class="row">
    <div class="col-md-12" style="text-align: right;">
        <a class="label label-danger" onclick="AT('REGULARIZAR')">REGULARIZAR: <font id="i_reg">0</font></a>
        <a class="label label-danger" onclick="AT('Vencido')">VENCIDO: <font id="i_venc">0</font></a>
        <a class="label label-warning" onclick="AT('Por Vencer')">POR VECER: <font id="i_xvenc">0</font></a>
        <a class="label label-primary" onclick="AT('')">TOTAL: <font id="i_tot">0</font></a>
    </div> 
    <div class="col-md-12"><br></div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
	<header>
        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-book"></i> </span>
        <h2>Listado de contratos registrado</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl"><script>vAjax('personal_contratos','tabla1','frm1','tbl');</script></div>
    </div>
</div>
<script type="text/javascript">
    function AT(st){ 
        var table = $('#dtable1').DataTable();
        table.search(st).draw();
        //$( "input[type=search]" ).val('aaaa');
    }
</script>