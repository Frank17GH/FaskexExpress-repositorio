<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm1">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-3">
                    <input type="text" class="form-control" id="iddet" placeholder="Buscar segun criterio" name="cbusq" autocomplete="off" onkeyup="if (event.keyCode === 13){vAjax('traking','tabla1','frm1','tbl1');}">
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="tbusq" onchange="$('#iddet').select()">
                        <option value="1">Remito</option>
                        <option value="2">Consignado</option>
                        <option value="3">DNI/RUC</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="estado" onchange="$('#iddet').select()">
                        <option value="0">Todos los estados</option>
                        <option value="3" selected="">En Agencia</option>
                        <option value="4">Entregado</option>
                        <option value="2">En Ruta</option>
                        <option value="1">Por Cargar</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="entrega">
                        <option value="0">Todos los tipos de entrega</option>
                        <option value="2">Entrega en agencia</option>
                        <option value="1">Entrega en domicilio</option>                                
                    </select>
                </div>
                <div class="col-md-1">
                    <select class="form-control" name="anio">
                        < <?php 
                                                        $anio=intval(date('Y'))+1;
                                                        for ($i=2019; $i <=$anio; $i++) { 
                                                            ?>
                                                                <option value="<?php echo $i ?>" <?php echo ($i==date('Y'))?'selected':'' ?>><?php echo $i ?></option>
                                                            <?php
                                                        }
                                                    ?>
                    </select>
                </div>
                <div class="col-md-1" style="text-align: center;">
                    <a class="btn btn-success btn-sm" style="width: 100%" onclick="vAjax('traking','tabla1','frm1','tbl1');" href="javascript:void(0);"><i class="fa fa-search"></i> &nbsp;&nbsp;&nbsp;<b>Buscar</b></a>

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
        <span class="widget-icon"> <i class="fa fa-crosshairs"></i> </span>
        <h2>Traking de paquetes</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl1"><script>vAjax('traking','tabla1','frm1','tbl1');</script></div>
    </div>
</div>