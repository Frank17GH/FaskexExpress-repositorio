<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h6 class="modal-title">AGREGAR NUEVO ENVIO</h6>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" style="padding: 5px;">
            <form id="frm5">
                <input type="hidden" value="<?php echo $s02 ?>" name="tp">
                <div class="panel panel-default" style="padding: 5px;">
                    <legend style="margin-top: -6px;">&nbsp;&nbsp;<span class="glyphicon glyphicon-import"></span> DESTINATARIO <a style="    margin-top: -6px;" href="javascript:void(0);" onclick="FClient(1,2)" class="btn btn-link">[+ Nuevo]</a></legend>
                    <div class="form-group" style="margin-bottom: 3px;">
                        <div class="col-md-8">
                            <div class="form-group">
                            <input class="form-control input-xs" placeholder="Nombre Destino" id="nomClient2" ondblclick="$(this).prop('readonly',false).select();" name="recibe_nombre" type="text" readonly="">
                            <input type="hidden" id="idClient2" name="recibe_id" value="0">
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="icon-addon addon-md">
                                <input type="number" placeholder="RUC/DNI Destino" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="numDni2" autofocus="" name="recibe_doc" onkeydown=" if (event.keyCode === 13){FClient(0,2);return false}">
                                <label for="email" style="padding: 4px 0;" class="glyphicon glyphicon-search input-xs" rel="tooltip" title="" data-original-title="email"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="text" placeholder="Correo Destino" ondblclick="$(this).prop('readonly',false).select();" class="form-control input-xs" id="nomCorr2" name="recibe_corr" readonly="">
                        </div>
                        <div class="col-md-6" style="    margin-bottom: 3px;">
                            <div class="input-group" id="a6">
                                <span class="input-group-addon" style="padding: 0px 10px;">
                                    <span class="glyphicon glyphicon-phone"></span>
                                </span>
                                <input type="text" placeholder="Teléfono Destino" ondblclick="$(this).prop('readonly',false).select();" class="form-control input-xs" id="nomTel2" name="recibe_tel" readonly=""> 
                            </div>
                        </div>
                        <br><br>
                    </div><br>
                </div>
                <div class="col-sm-8">
                    <div class="col-md-6">
                        <legend>&nbsp;&nbsp;<i class="fa fa-map-marker fa-fw "></i> Ubicación de Envio</legend>
                    </div>
                    <div class="col-md-6" style="text-align: center;">
                        <a class="btn btn-default  active tdoc2" onclick="cmbo2(1)" id="tenvi1">
                            <span>Domicilio</span> 
                        </a>
                        <a class="btn btn-default  tdoc2" onclick="cmbo2(2)" id="tenvi2">
                            <span>Agencia</span>  
                        </a>
                        <input type="hidden" value="1" id="tenvi" name="tipo_entrega">
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-4">
                        <select class="form-control input-xs" id="prov" onchange="provi($(this).val(),'idprov')">
                            <option value="0">Seleccione un Departamento</option>
                            <?php 
                                $class = new Mod();
                                $ts = $class->sel1($dt);
                                foreach ($ts as $ts1): 
                                    ?><option value="<?php echo $ts1[iddepartamento] ?>"><?php echo $ts1[nombre] ?></option><?php
                                 endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control input-xs" id="idprov" onchange="dist($(this).val(),'iddist')">
                            <option value="0">Seleccione un Departamento</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control input-xs" id="iddist" name="recibe_dist" onchange="kilo_($(this).val());">
                            <option value="0">Seleccione una Provincia</option>
                        </select>
                        <input type="hidden" id="kb" value="0">
                        <input type="hidden" id="ka" value="0">
                        <input type="hidden" id="edom" value="0">
                        <input type="hidden" id="pps" value="0">
                    </div>
                    <div class="col-md-12 edom" style="padding: 12px;">
                        <div class="input-group">
                            <input type="text" class="form-control input-xs" placeholder="Dirección de entrega" id="nomDir2" name="recibe_dir" readonly="">
                            <div class="input-group-btn">
                                <button class="btn btn-default input-xs btnm2" disabled="" onclick="$('#nomDir2').prop('readonly',false).select();return false">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 edom">
                        <textarea class="form-control " name="recibe_observ" placeholder="Información referente a la dirección donde se enviara la encomienda"></textarea>
                    </div>
                    <div class="col-md-12">
                       <hr>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-6" style="display: none" id="idclav">
                        <center><label><b>CLAVE DE RECOJO</b></label></center>
                        <div class="input-group">
                            <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-keyboard-o"></i></span>
                            <input class="form-control input-lg tot" autocomplete="off" name="pass" type="password" style="text-align: center;" onclick="$(this).select()" id="idclavv" onkeyup="vercant($(this).val())">
                            <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                        </div>
                        <p class="note"><strong>Nota:</strong> El <b>REMITENTE</b> debe de escribir la clave que debe utilizar el <b>DESTINATARIO</b>, para poder recoger la encomienda.</p>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="well well-sm well-light col-sm-4">
                    <div class="col-md-8">
                        <legend>&nbsp;&nbsp;<i class="fa fa-dropbox fa-fw "></i>Encomienda</legend>
                    </div>
                    <div class="col-md-4" style="text-align: center;">
                        <a class="btn btn-default btn-lg active tdoc" style="padding: 2px 6px;" id="tpq1" onclick="cmbo(1)">
                            <img style="    width: 25px;" src="app/recursos/img/sobre.png">
                        </a>
                        <a class="btn btn-default btn-lg tdoc" id="tpq2" style="padding: 2px 6px;" onclick="cmbo(2)">
                            <img style="width: 25px;" src="app/recursos/img/paquete.png">
                        </a>
                        <input type="hidden" id="idtp" value="1" name="paq_tipo">
                    </div>
                    <div class="col-md-12"></div>
                    <label class="col-md-3 control-label" style="text-align: left;">
                        <h6 style="margin: 0px"><b>Peso</b></h6>
                    </label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" onkeyup="prprec()" value="1" id="dtpeso" name="paq_peso">
                    </div>
                    <div class="col-md-5">
                        <select class="form-control" name="paq_medida" id="idpeso" onchange="prprec()" style="display: none">
                            <option value="KG">Kilogramos</option>
                            <option value="G" selected="">Gramos</option>
                        </select>
                        <font id="idgr" style="font-size: 18px">(Gr)</font>
                    </div>
                    <div class="col-md-12"><br></div>
                    <div class="col-md-12">
                        <textarea class="form-control" id="dtdescrip" placeholder="Que estas enviando?" name="paq_descrip"></textarea>
                    </div>
                    <div class="col-md-12"><br></div>
                    <div id="tpqd2" class="detpq" style="display: none">
                        <div class="col-md-4" style="text-align: center;">
                            <img style="width: 80px" src="app/recursos/img/caja_ancho.png" onclick="cmbo(2)">
                            <input type="number" class="form-control" placeholder="Ancho (cm)" id="dtancho" onkeyup="prprec()" value="0" name="paq_ancho">
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <img style="width: 80px" src="app/recursos/img/caja_largo.png" onclick="cmbo(2)">
                            <input type="number" class="form-control" placeholder="Largo (cm)" id="dtlargo" onkeyup="prprec()" value="0" name="paq_largo">
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <img style="width: 80px" src="app/recursos/img/caja_alto.png" onclick="cmbo(2)">
                            <input type="number" class="form-control" placeholder="Alto (cm)" id="dtalto" onkeyup="prprec()" value="0" name="paq_alto"><input type="hidden" id="dtvol" value="0">
                        </div>
                        <div class="col-md-12"><hr>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon" style="padding: 0px 10px;"><b class="mon">S/.</b></span>
                            <input class="form-control input-lg tot" id="total" onclick="$(this).select();" autocomplete="off" value="0" type="number" style="text-align: right;" name="total">
                            <span class="input-group-addon" style="padding: 0px 10px;"><i class="fa fa-check"></i></span>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button class="btn btn-primary" type="button" onclick="FENC()">
        <i class="fa fa-save"></i>
        Guardar
    </button>
</div>
<script> sel2('prov');sel2('idprov');sel2('iddist');</script>