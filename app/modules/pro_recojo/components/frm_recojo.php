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
                &nbsp;&nbsp; <i class="fa fa-pencil"></i> <b>PROGRAMACION DE RECOJOS</b> 
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
    <div class=" col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
                <legend>Datos de Recojo</legend>                
                <div class="col-md-3">
                    <b>Ambito</b>
                    <div class="input-group">
                            <select name="viaje" class="form-control input-sm"  style="width: 100%;">
                                <option value="0">Seleccione</option>                       
                            </select>
                        <div class="input-group-btn">
                            <button class="btn btn-default input-xs" onkeydown=" " type="button">
                                <i class="fa fa-search"></i>
                            </button>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-3" > 
                    <b>Distrito Recojo</b>
                    <select class="form-control input-sm" style="height: 30px; font-size: 12px;" id="iddis" name="iddistrito"  onchange="selResponsable($(this).val(),'responsable',$('#ambito').val())" required>
                        <option>SELECCIONE DISTRITO</option>
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
                    <b>Responsable de Recojo</b>
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

                <div class="col-md-2">
                    <b>Fecha Recojo</b>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input id="fecha_fin"  type="date" class="form-control input-sm" value="<?php echo ($dt1[0]['de_fechacierre'])?$dt1[0]['de_fechacierre']:date("Y-m-d",strtotime($fecha_actual."+ 1 days"));?>" name="de_fechacierre" readonly>                
                    </div>
                </div>

                <div class="col-md-12">
                    <br>
                </div>

                <div class="col-md-3">
                    <b>Cliente</b>
                    <div class="input-group">
                        <input class="form-control input-xs" name="cliente" id="cliente" type="text">                        
                        <div class="input-group-btn">
                            <button class="btn btn-default input-xs" onkeydown=" " type="button">
                                <i class="fa fa-search"></i>
                            </button>
                            <button class="btn btn-default input-xs" type="button" onclick="vAjax('guias_remision','viewPlacas',0,'modal1');">
                                <i class="fa fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <b>Nombres / Razón Social</b>
                    <input type="text" placeholder="" name="" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id=" " readonly="">
                </div>                
                <div class="col-md-3">
                    <b>Teléfono</b>
                    <input type="text"  name="" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="" >
                </div>
                <div class="col-md-3">
                    <b>Solicita</b>
                    <div class="input-group">
                        <input class="form-control input-xs" name="" id="numDni4" type="text" onkeydown=" if (event.keyCode === 13){FClient(0, 4, 1);}">                        
                        <div class="input-group-btn">
                            <button class="btn btn-default input-xs" onclick="FClient(0, 4, 1);" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                            <button class="btn btn-default input-xs" type="button" onclick="vAjax('guias_remision','viewChoferes',0,'modal1');">
                                <i class="fa fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <br>
                </div>
                <div class="col-md-3">
                    <b>Preguntar por</b>
                    <input type="text" placeholder="" name="" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="" >
                </div>
                <div class="col-md-3">
                    <b>Celular</b>
                    <input type="text" placeholder="" name="" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="" >
                </div>
                            
                <div class="col-md-3">
                    <b>Direccion</b>
                    <input type="text" placeholder="" name="" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="" >
                </div>
                <div class="col-md-3">
                    <b>Distrito</b>
                    <select name="viaje" class="form-control input-sm" style="width: 100%;">
                        <option value="0">Seleccione</option>                       
                    </select>
                </div>
                <div class="col-md-12">
                    <br>
                </div>
                <div class="col-md-12">
                    <label><b>Observacion </b></label>
                    <textarea class="form-control" rows="2" id="" name=""></textarea>
                </div>                
                <div class="col-md-12">
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
                <legend>Datos de Entrega</legend>
                <div class="col-md-3">
                    <b>Ambito</b>
                    <div class="input-group">
                            <select name="viaje" class="form-control input-sm"  style="width: 100%;">
                                <option value="0">Seleccione</option>                       
                            </select>
                        <div class="input-group-btn">
                            <button class="btn btn-default input-xs" onkeydown=" " type="button">
                                <i class="fa fa-search"></i>
                            </button>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <b>Destinos DEP / PROV / DIST </b>
                    <select class="form-control input-sm" style="height: 30px; font-size: 12px;" id="iddis" name="iddistrito"  onchange="selResponsable($(this).val(),'responsable',$('#ambito').val())" required>
                        <option>SELECCIONE DISTRITO</option>
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
                <div class="col-md-5">
                    <b>Direccion</b>
                    <input type="text" placeholder="" name="" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="" >
                </div>                                                          
                <div class="col-md-12">
                    <br>
                </div>   
                
                <div class="col-md-3">
                    <b>Contacto </b>
                    <input type="text" placeholder="" name="" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="" >
                </div>
                
                <div class="col-md-2">
                    <b>Celular</b>
                    <input type="text" placeholder="" name="" autocomplete="off" style="font-weight: bold;" class="form-control input-xs" id="" >
                </div>  
                <div class="col-md-12">
                    <br>
                </div>  
              
                <div class="col-md-12">
                    <label><b>Detalle </b></label>
                    <textarea class="form-control" rows="2" id="" name=""></textarea>
                </div> 
                <br>                
                </div>
            </div>
        </div>
    </div>

    <div style="display:none">
        <input type="text" name="iddespacho" id="iddespacho" value="<?php echo $s02 ?>">  
        <input type="text" name="idapoyo" id="idapoyo" >  
        <input type="text" name="idtipo" id="tipo" >
        <input type="text" name="de_serie" id="serie" >
    </div>
    
    
    <div class="form-group">
        <div class="col-md-6"></div>
        
        <div class="col-md-4" >            
            <a class="btn btn-sm btn-default"  onclick="vAjax('exp_salidaruta','frm_update',0);">Limpiar</a>
            <a class="btn btn-sm btn-warning" style="display:<?php echo ($dt1[0]['de_codigo'])?'':'none' ?>">Actualizar</a>
            <button type="button" style="display:<?php echo ($dt1[0]['de_codigo'])?'none':'' ?>"   class="btn btn-labeled btn-primary" > <span class="btn-label"><i class="fa fa-save"></i></span>Guardar</button>                        
        </div>

        <div class="col-md-2">            
            <button type="button" id="total" class="btn btn-sm btn-info" >Buscar Recojo</button>                          
            <a class="btn btn-sm btn-success" style="display:<?php echo ($dt1[0]['de_codigo'])?'':'none' ?>"  >Imprimir</a>                            
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

