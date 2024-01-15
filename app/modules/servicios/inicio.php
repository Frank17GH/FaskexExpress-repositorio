<?php 
    include_once  "../../recursos/db.class.php";
    include_once( ".Model.php" ); 
    $class = new Mod();
    $dt1=$class->categorias();
?>
<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm1">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-12">  
                    <div class="col-md-3">
                        <input type="text" placeholder="Buscar" class="form-control" id="buscar" onkeyup="if(event.keyCode == 13) {buscarPDTS();$('#buscar').select();}">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" id="campos" onchange="buscar_por();">
                            <option value="0">[Todos lo campos]</option>
                            <option value="idproductos">Codigo Producto</option>
                            <option value="marca">Marca</option>
                            <option value="modelo">Modelo</option>
                            <option value="p.descripcion">Descripcion </option>
                            <option value="descripcion_corta">Descrip. corta</option>
                            <option value="cod_prov">Codigos Proveedores</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" id="categorias" onchange="buscarPDTS()">
                            <?php 
                                if($dt1){
                                    foreach ($dt1 as $dta): 
                                        ?>
                                            <option value="<?php echo $dta[idcategoria] ?>"><?php echo $dta[ca_nombre] ?></option>
                                        <?php 
                                    endforeach; 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                    </div> 
                    <div class="col-md-1" style="text-align: right;">
                        <div class="btn-group">
                            <a class="btn btn-labeled btn-primary" onclick="vAjax('servicios','mod1',0,'modal1');"> <span class="btn-label"><i class="fa fa-plus"></i></span><b>Nuevo</b>&nbsp;&nbsp;</a>
                        </div>
                    </div>
                    <div class="col-md-2"><br></div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
	<header>
        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-search txt-color-blue"></i> </span>
        <h2>Listado de servicios Registrados</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tab1"><script>vAjax('servicios','tabla1','frm1','tab1');</script></div>
    </div>
</div>
