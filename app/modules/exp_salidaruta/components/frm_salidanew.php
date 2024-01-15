<?php 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();    
    $fecha_actual = date("d-m-Y");
?>
<!-- HEADER -->
    <legend>
        <div class="form-group" style="margin-bottom: 3px">
            <div class="col-md-4">
                &nbsp;&nbsp; <i class="fa fa-pencil"></i> <b>SALIDA A RUTA</b> 
            </div>
            <div class="col-md-8" style="vertical-align: middle;text-align: left;">

                <div class="col-md-3" style="display:<?php echo ($dt1[0]['de_serie'])?'':'none' ?>" >
                    <div class="form-group has-primary" style="margin-bottom: 0px" >
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon">Serie</span>
                                <input type="text" class="form-control input-sm" style="text-align: right;" value="<?php echo $dt1[0]['de_serie']
                                ?>" readonly >
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-md-3" style="display:<?php echo ($dt1[0]['de_serie'])?'none':'' ?>" >
                    <div class="form-group has-primary" style="margin-bottom: 0px" style="display:<?php echo ($dt1[0]['de_codigo'])?'':'none' ?>">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon">Serie</span>
                                <select  id="sserie" class="form-control input-sm" style="width: 100%;" ></select>   
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2" style="display:<?php echo ($dt1[0]['de_codigo'])?'':'none' ?>" >
                    <div class="form-group has-primary" style="margin-bottom: 0px">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon">N°</span>
                                <input type="text" class="form-control input-sm" style="text-align: right;" value="<?php echo $dt1[0]['de_codigo']
                                ?>" readonly >
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-3" style="display:<?php echo ($dt1[0]['de_codigo'])?'none':'' ?>" >
                    <div class="form-group has-primary" style="margin-bottom: 0px">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon">N°</span>
                                <input type="text" class="form-control input-sm" style="text-align: right;" id="snumero" name="de_codigo" readonly >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group has-primary" style="margin-bottom: 0px">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><input type="checkbox" class="custom-control-input" ></span>
                                <input id="fecha_inicio"  type="date" class="form-control input-sm" value="<?php echo ($dt1[0]['de_fecha'])?$dt1[0]['de_fecha']:date('Y-m-d') ?>" name="de_fecha" min="<?php echo date('Y-m-d'); ?>" onchange="sumar_fecha($('#dias').val());" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group has-primary" style="margin-bottom: 0px">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><input type="checkbox" class="custom-control-input" ></span>
                                <input type="time" class="form-control input-sm" style="text-align: center;" name="de_hora" value="<?php echo ($dt1[0]['de_hora'])?$dt1[0]['de_hora']: date('H:i') ?>" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>               
    </legend>                           
<!--END HEADER -->

<!-- BODY -->
    <div style="display:none">
        <input type="text" name="iddespacho" id="iddespacho" value="<?php echo $s02 ?>">  
        <input type="text" name="idapoyo" id="idapoyo" >  
        <input type="text" name="idtipo" id="tipo" >
        <input type="text" name="de_serie" id="serie" >
    </div>
    
    <div class="form-group">
        <div class="col-md-2">
            <b>Ambito</b>               
            <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                <select class="form-control input-sm" onchange="selCargo($(this).val(),'puesto'); selResponsable(0,'responsable',0); selAmbitoDistrito($(this).val(),'iddis');" id="ambito" name="de_ambito" required>
                    <option value="" >[Seleccionar Ambito]</option>
                    <option value="1" <?php echo ($dt1[0]['de_ambito']==1)?'selected':'' ?> >LOCAL</option>
                    <option value="2" <?php echo ($dt1[0]['de_ambito']==2)?'selected':'' ?>>NACIONAL</option>
                    </option>                         
                </select>
            </div>            
        </div>

        <div class="col-md-3" > 
            <b>Distrito Destino</b>
            <select class="form-control input-sm" style="height: 30px; font-size: 12px;" id="iddis" name="iddistrito"  onchange="selResponsable($(this).val(),'responsable',$('#ambito').val())" required>
                <option>SELECCIONE DESITNO</option>
                <?php  if ($s02) {
                    $class = new Mod();
                    $ts = $class->Distrito();                       
                    foreach ($ts as $ts1): 
                        ?><option value="<?php echo $ts1['id'] ?>" <?php echo ($ts1['id']==$dt1[0]['iddistrito'])?'selected':''; ?>><?php echo $ts1['nombre'] ?></option><?php 
                    endforeach;
                }
                ?> 
            </select>                                    
        </div>
   
        <div class="col-md-4">
            <b>Responsable de Reparto</b>
            <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <select class="form-control input-sm"  id="responsable" name="idpersonal" required>
                    <option value="">[Seleccionar Responsable]</option>
                        <?php if ($s02){
                            $class = new Mod();
                            $fdep = $class->selPersonal($dt1[0]['iddistrito'],0); 
                            foreach ($fdep as $dep):
                                ?><option value="<?php echo $dep['idpersonal'] ?>" <?php echo ($dep['idpersonal']==$dt1[0]['idpersonal'])?'selected':''; ?>><?php echo $dep['nombres'] ?></option><?php
                            endforeach; 
                            }
                        ?>
                </select>                          
            </div>
        </div>

        <div class="col-md-3"> 
            <b>Observaciones</b>  
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-comment"></i></span>                  
                <input type="text" class="form-control input-sm" placeholder="Observacion" value="<?php echo $dt1[0]['de_observacion']?>" name="de_observacion" required>
            </div>
        </div>     
    </div>

    <div class="form-group">

        <div class="col-md-2">
            <b>Movilidad</b>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input id=""  type="number" step="0.01" class="form-control input-sm" value="<?php echo ($dt1[0]['de_movilidad'])? $dt1[0]['de_movilidad']: 0?>" placeholder="S/0.00" name="de_movilidad" min="0" pattern="^[0-9]+" >                
            </div>
        </div>            

        <div class="col-md-2">
            <b>Dias-Repartos</b>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                <input type="number" class="form-control input-sm" name="de_dias" id="dias" placeholder="Dia Perm." value="<?php echo ($dt1[0]['de_dias'])?$dt1[0]['de_dias']:1?>" onkeyup="sumar_fecha($(this).val());" min="1" pattern="^[0-9]+" >                
            </div>
        </div>

        <div class="col-md-2">
            <b>Fecha Cierre</b>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input id="fecha_fin"  type="date" class="form-control input-sm" value="<?php echo ($dt1[0]['de_fechacierre'])?$dt1[0]['de_fechacierre']:date("Y-m-d",strtotime($fecha_actual."+ 1 days"));?>" name="de_fechacierre" readonly>                
            </div>
        </div>
        
        <div class="col-md-3">
            <b>Agencia de Transporte</b>
            <select class="form-control input-sm" style="height: 30px; font-size: 12px;" id="empresa_id" onchange="selEmpresaDestino($(this).val(),'empresa_destino')" required>
                <option>SELECCIONE AGENCIA</option>                
                <?php 
                    $ts1 = $class->emp_transporte();
                    foreach ($ts1 as $ts1): 
                        ?><option value="<?php echo $ts1['id'] ?>" <?php echo ($ts1['id']==$dt1[0][empresa_id])?'selected':''; ?>><?php echo $ts1[nombre] ?></option><?php 
                    endforeach;
                ?> 
            </select>
        </div>

        <div class="col-md-3">
            <b>Destinos DEP / PROV / DIST </b>
            <select class="form-control input-sm" style="height: 30px; font-size: 12px;" id="empresa_destino" name="empresa_destino" required>
                <option>SELECCIONE DESTINO</option>
                 <?php 
                    // if ($s02){  
                    // $ts2 = $class->emp_destino();
                    // foreach ($ts2 as $ts1): 
                    //     ?><option value="<?php echo $ts1['id'] ?>" <?php echo ($ts1['id']==$dt1[0][empresa_id])?'selected':''; ?>><?php echo $ts1[nombre] ?></option><?php 
                    // endforeach;
                    //}
                ?>                 
            </select>
        </div>
                      
    </div>

    <div class="form-group">
        <div class="col-md-3"></div>

        <div class="col-md-3">
            
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                    <input type="text" id="iddnii" id="nomC" placeholder="Scannear Código" class="form-control input-sm"  autocomplete="off" onkeypress="if(event.keyCode == 13){ vPaquete($(this).val(),$('#ambito').val());}">
                    <span class="input-group-btn">
                    <button class="btn btn-default input-sm" type="button" onclick="vPaquete();"><i class="fa fa-search"></i></button>
                </span>            
            </div>
        </div>        

        <div class="col-md-4" >            
            <a class="btn btn-sm btn-default"  onclick="vAjax('exp_salidaruta','frm_update',0);">Limpiar</a>
            <a class="btn btn-sm btn-warning" style="display:<?php echo ($dt1[0]['de_codigo'])?'':'none' ?>">Actualizar</a>
            <button type="button" style="display:<?php echo ($dt1[0]['de_codigo'])?'none':'' ?>" onclick="vAjax('exp_salidaruta','salida_guardar','frm_salida')"  class="btn btn-labeled btn-primary" > <span class="btn-label"><i class="fa fa-save"></i></span>Guardar</button>                        
        </div>

        <div class="col-md-2">            
            <button type="button" id="total" class="btn btn-sm btn-info" onclick="vAjax('exp_salidaruta','mod_buscar',0,'modal3');">Buscar Despacho</button>                          
            <a class="btn btn-sm btn-success" style="display:<?php echo ($dt1[0]['de_codigo'])?'':'none' ?>"  onclick="vAjax('despacho','vPrintMan', $('#iddespacho').val());">Imprimir</a>                            
        </div>

    </div>  
<!-- END BODY -->
 
<!-- SCRIPT -->
    <script type="text/javascript">
        seriesNum(1,'06');
        sel2('iddis',0);
        sel2('empresa_id',0);
    </script>
<!-- END SCRIPT -->

