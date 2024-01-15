<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h6 class="modal-title">Agregar a la Venta</h6>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <form id="inspr">
                <input type="hidden" value="2" name="tp">
                <input type="hidden" value="<?php echo explode('-/', $s02)[2] ?>" name="tpp">
                <div style="display: " id="dtprod">
                    <div class="col-md-12" id="busqp">
                        <label>Producto/Servicio Seleccionado</label>
                        <div class="input-group input-group-sm">
                            <div class="icon-addon addon-sm">
                                <input type="text" class="form-control" value="<?php echo explode('-/', $s02)[1] ?>" id="prodsel" name="" readonly="">
                            </div>
                            <span class="input-group-btn">
                                <button class="btn btn-link" type="button" onclick="$('#myModal1').modal('hide');$('#myModal4').modal('show');$('#bus_prod').select()">Cambiar</button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-6">
                        <label>Afectación I.G.V.</label>
                        <select class="form-control" disabled="">
                            <option>Gravado - Operación Onerosa</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Precio por Presentación</label>
                        <select class="form-control" id="presp" onchange="selp($(this).val())">
                            
                            <?php 
                                if($dt1){ $tt='0.00';$med=0;$pres=0;
                                    foreach ($dt1 as $dta1): 
                                        if($tt=='0.00'){$tt=number_format($dta1['pre_precio'],2);$med=$dta1['idmedida'];$pres=$dta1['idpresentacion'];}
                                        ?>
                                            <option value="<?php echo $dta1['idpresentacion'].'-'.number_format($dta1['pre_precio'],2).'-'.ucwords(strtolower($dta1['idmedida'])); ?>">
                                                <?php echo ucwords(strtolower(utf8_encode($dta1['pre_descrip']))).' - ['.$dta1['pre_unidades'].' '.ucwords(strtolower($dta1['idmedida'])) ?>. ]</option>
                                        <?php 
                                    endforeach; 
                                }else{
                                    if (explode('-/', $s02)[3]) {
                                        $tt=number_format(explode('-/', $s02)[3], 2);
                                    }else{
                                        $tt='0.00';
                                    }
                                    
                                    ?><option value="0">Sin Presentación</option><?php
                                }
                            ?>

                        </select>
                        <input type="hidden" name="paq_medida" value="<?php echo $med ?>" id="idmed">
                        <input type="hidden" name="prod" value="<?php echo explode('-/', $s02)[0] ?>" id="bprod">
                        <input type="hidden" name="idpres" value="<?php echo $pres ?>" id="idpres">
                    </div>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-6">
                       
                    </div>
                    <div class="col-md-3">
                        <label>Cantidad</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" onclick="$('#ddcant').val($('#ddcant').val()-1)"><i class="glyphicon glyphicon-minus"></i></button>
                            </span>
                            <div class="icon-addon addon-sm">
                                <input type="number" name="cant" value="1" id="ddcant" class="form-control" style="text-align: center; padding: 0;">
                            </div>
                            <span class="input-group-btn">
                                <button class="btn btn-success" onclick="$('#ddcant').val(parseInt($('#ddcant').val())+1)" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Precio Unit.</label>
                        <input type="number" style="text-align: right;" id="tprec" value="<?php echo $tt ?>" name="total" class="form-control">
                    </div>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-12">
                        <div class="widget-body">
                            <div class="panel-group smart-accordion-default" id="accordion">
                                <h4 class="panel-title" style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
                                    <a data-toggle="collapse" style="    text-align: left;" data-parent="#accordion" href="#collA" onclick="return false;" aria-expanded="false" class="btn btn-link"> <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                        <i class="fa fa-lg fa-angle-up pull-right"></i> Informacion adicional
                                    </a>
                                </h4>
                                <div id="collA" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body no-padding">
                                        <div class="col-md-12">
                                            <div class="col-md-12 text-info" style="margin-top: 10px"><b>Descuento</b></div>
                                            <div class="col-md-8"><input type="text" class="form-control" name="d_desc" placeholder="Descripción"></div>
                                            <div class="col-md-4"><input type="text" class="form-control" name="p_desc" placeholder="S/ 0.00" style="text-align: right;" name=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
       </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" onclick="$('#myModal1').modal('hide');$('#myModal4').modal('show');$('#bus_prod').select()">Cancel</button>
    <button class="btn btn-primary" type="button" onclick="vAjax('facturacion','insert6','inspr');">
        <i class="fa fa-save"></i>
        Guardar
    </button>
</div>
<script> 
    function selp(id){
        vd=id.split('-');
        $('#tprec').val(vd[1]);
        $('#idmed').val(vd[2]);
        $('#idpres').val(vd[0]);
    }
</script>

