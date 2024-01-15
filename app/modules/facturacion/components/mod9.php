<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h6 class="modal-title">AGREGAR SERVICIO</h6>
</div>
<div class="modal-body">
    <div class="row">
       <div class="col-md-12">
            <form id="vvprod">
                <input type="hidden" name="tpp" value="<?php echo $s02 ?>">
                <div class="form-group">
                    <div class="col-md-3">
                        <input id="casilla" style="display:none;">
                        <input class="form-control" name="bus_prod" placeholder="Buscar servicio" onkeyup="if(event.keyCode == 13) vAjax('facturacion','table3','vvprod','tbl3')">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="campos" onchange="vAjax('facturacion','table3','vvprod','tbl3')">
                            <option value="p.idproducto">Codigo Producto</option>
                            <option value="p.idmarca">Marca</option>
                            <option value="p.pr_modelo">Modelo</option>
                            <option value="pr_nombre">Descripcion </option>
                            <option value="pr_cod_fabr">Codigos Proveedores</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="local" onchange="vAjax('facturacion','table3','vvprod','tbl3')">
                            <?php 
                                if($dt2){
                                    foreach ($dt2 as $dta2): 
                                        ?>
                                        <option value="<?php echo $dta2[idlocales] ?>"><?php echo $dta2[lo_abreviatura].'('.$dta2[lo_direccion].')' ?></option>
                                        <?php 
                                    endforeach; 
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <select class="form-control" name="categoria" onchange="vAjax('facturacion','table3','vvprod','tbl3')">
                            <option value="0">Todas las categorias</option>
                            <?php 
                                if($dt1){
                                    foreach ($dt1 as $dta1): 
                                        ?>
                                        <option value="<?php echo $dta1[idcategoria] ?>"><?php echo $dta1[ca_nombre] ?></option>
                                        <?php 
                                    endforeach; 
                                }
                            ?>

                        </select>
                    </div>
                    <div class="col-md-1">
                        <select class="form-control" name="limite" onchange="vAjax('facturacion','table3','vvprod','tbl3')">
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="70">70</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                        </select>
                    </div>
                    <div class="col-md-1" style="zoom: 84%;  margin-top: 9px;">
                        <label class="ui-checkbox">
                            <input id="stock_busqueda" type="checkbox" onchange="vAjax('facturacion','table3','vvprod','tbl3')"><span>STOCK</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
           <hr>
        </div>
        <div class="col-md-12">
           <table class="table table-hover" style="font-size: 11px">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th style="width: 100%;">Descripción</th>
                        <th>Categoría</th>
                        <th>Local</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody id="div-tbl3">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button class="btn btn-primary" type="button">
        <i class="fa fa-save"></i>
        Guardar
    </button>
</div>
<script> $('#bus_prod').select();vAjax('facturacion','table4','vvprod','tbl3');
</script>