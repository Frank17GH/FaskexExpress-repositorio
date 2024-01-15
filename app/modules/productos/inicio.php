<?php 
    include_once  "../../recursos/db.class.php";
    include_once( ".Model.php" ); 
    $class = new Mod();
    $dt1=$class->categorias();
    $class = new Mod();
    $dt2=$class->marca();
    $class = new Mod();
    $dt3=$class->locales();
?>
<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm_prod">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-12">  <div class="table-filters">
            <div class="row">
                <form autocomplete="off" action="javascript: buscarPDTS()" id="form_prod" class="ng-pristine ng-valid">
                    
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
                    <div class="col-md-5">
                        <div class="col-md-6">
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
                            <select class="form-control" id="marcas" onchange="" style="display:none;">
                                <?php 
                                    if($dt2){
                                        foreach ($dt2 as $dta2): 
                                            ?>
                                            <option value="<?php echo $dta2[idmarca] ?>"><?php echo $dta2[ma_descripcion] ?></option>
                                            <?php 
                                        endforeach; 
                                    }
                                ?>  
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="tienda_buscar" onchange="buscarPDTS();">
                                <?php 
                                    if($dt3){
                                        foreach ($dt3 as $dta3): 
                                            ?>
                                                <option value="<?php echo $dta3[idlocales] ?>"><?php echo $dta3[lo_abreviatura].'( '.$dta3[lo_direccion].' )' ?></option>
                                            <?php 
                                        endforeach; 
                                    }
                                ?>  
                            </select>
                        </div>  
                    </div>
                    
                    <div class="col-md-2" style="text-align: -webkit-right;">
                      <label class="ui-checkbox"><input id="orden" type="checkbox" onchange="buscarPDTS()"><span>MÁS VENDIDOS</span></label>
                    </div>
                    <div class="col-md-4" style="margin-top: 12px;">
                      
                      <div class="col-md-6" style=" ">
                       <div class="checkbox">
                                                            <label>
                                                              <input type="checkbox" class="checkbox style-0" checked="checked">
                                                              <span>CON STOCK</span>
                                                            </label>
                                                        </div>
                      </div>
                      <div class="col-md-6" style=" ">
                        <label class="ui-checkbox" style="margin-top: 5px;"><input id="stock_minimo_busqueda" type="checkbox" onchange="buscarPDTS()"><span>STOCK MINIMO</span></label>
                      </div>
                    </div>
                    <div class="col-md-3" style="margin-top: 12px;">
                      <div class="col-md-6">
                        <label class="ui-checkbox" style="margin-top: 5px;"><input id="sin_stock" type="checkbox" onchange="buscarPDTS()"><span>SIN STOCK</span></label>
                      </div>
                      <div class="col-md-6">
                          <label class="ui-checkbox" style="margin-top: 5px;"><input id="activo_busqueda" type="checkbox" checked="" onchange="buscarPDTS()"><span>ACTIVO</span></label>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <p style="margin-top: 18px;">RANGO :</p>
                    </div>
                    <div class="col-md-2" style="margin-top: 12px;">
                      <input type="date" name="" class="form-control" value="2020-12-01" id="fe1" onchange="buscarPDTS()" disabled="disabled">
                    </div>
                    <div class="col-md-2" style="margin-top: 12px;">                  
                      <input type="date" name="" class="form-control" value="2020-12-31" id="fe2" onchange="buscarPDTS()" disabled="disabled">
                    </div>
                </form>
            </div>
        </div>
</div>



                <div class="col-md-10">
                </div>
                <div class="col-md-2" style="text-align: right;">
                    <div class="btn-group">
                        <a class="btn btn-labeled btn-primary" onclick="vAjax('productos','mod1',0,'modal3');"> <span class="btn-label"><i class="fa fa-plus"></i></span><b>Nuevo</b>&nbsp;&nbsp;</a>
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
        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> </span>
        <h2>Listado de productos Registrados</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tab1"><script type="text/javascript">vAjax('productos','tabla1',0,'tab1');</script></div>
    </div>
</div>
