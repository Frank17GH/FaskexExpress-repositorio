<?php 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();    
?>

<div class="form-group">
	<input type="hidden" name="iddespacho" value="<?php echo $s02 ?>">        
    <div class="col-md-2">
        <div class="form-group has-primary"> 
            <div class="col-md-12">       
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-num"></i></span>
                    <select class="form-control" onchange="selCargo($(this).val(),'puesto');selResponsable(0,'responsable');" id="ambito" name="de_ambito" required>
                        <option value="" >[Seleccionar Ambito]</option>
                        <option value="1" <?php echo ($dt1[0]['de_ambito']==1)?'selected':'' ?> >LOCAL</option>
                        <option value="2" <?php echo ($dt1[0]['de_ambito']==2)?'selected':'' ?>>NACIONAL</option>
                        </option>                         
                    </select>
                </div>
            </div>        
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group has-primary">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <select class="form-control" onchange="selResponsable($(this).val(),'responsable')" id="puesto" name="idcargo" required>
                        <option value="">[Seleccionar Cargo]</option>
                         <?php if ($s02){
                            $class = new Mod();
                            $fdep = $class->selCargos($dt1[0]['de_ambito']); 
                            foreach ($fdep as $dep):
                                ?><option value="<?php echo $dep[idpersonalcargo] ?>" <?php echo ($dep[idpersonalcargo]==$dt1[0]['idcargo'])?'selected':''; ?>><?php echo $dep[ca_descripcion] ?></option><?php
                            endforeach; 
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group has-primary">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>                            
                    <select class="form-control"  id="responsable" name="idpersonal" required>
                            <option value="">[Seleccionar Responsable]</option>
                             <?php if ($s02){
                            $class = new Mod();
                            $fper = $class->selPersonal($dt1[0]['idcargo']); 
                            foreach ($fper as $dper):
                                ?><option value="<?php echo $deper[idpersonal] ?>" <?php echo ($dper[idpersonal]==$dt1[0]['idpersonal'])?'selected':''; ?>><?php echo $dper[pe_apellidos].','.$dper[pe_nombres] ?></option><?php
                            endforeach; 
                            }
                        ?>
                    </select>   
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group has-primary">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><input type="checkbox" class="custom-control-input" ></span>
                     <input id="fecha_inicio"  type="date" class="form-control" value="<?php echo ($dt1[0]['de_fecha'])?$dt1[0]['de_fecha']:date('Y-m-d') ?>" name="de_fecha" onchange="sumar_fecha($('#dias').val());" >
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group has-primary">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><input type="checkbox" class="custom-control-input" ></span>
                     <input type="time" class="form-control" style="text-align: center;" name="de_hora" value="<?php echo ($dt1[0]['de_hora'])?$dt1[0]['de_hora']: date('H:i') ?>" >
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group" >
    <div class="col-md-2">
        <div class="form-group has-primary">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon">Dias</span>
                    <input type="number" class="form-control" name="de_dias" id="dias" placeholder="Dia Perm." value="<?php echo ($dt1[0]['de_dias'])?$dt1[0]['de_dias']:1?>" onkeyup="sumar_fecha($(this).val());" min="1" pattern="^[0-9]+" >
                </div> 
            </div>           
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group has-primary">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon">Fecha Cierre</span>
                     <input id="fecha_fin"  type="date" class="form-control" value="<?php echo ($dt1[0]['de_fechacierre'])?$dt1[0]['de_fechacierre']:date('Y-m-d') ?>" name="de_fechacierre" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group has-primary">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon">movilidad</span>
                     <input id=""  type="number" step="0.01" class="form-control" value="<?php echo ($dt1[0]['de_movilidad'])? $dt1[0]['de_movilidad']: 0  ?>" placeholder="S/0.00" name="de_movilidad" min="0" pattern="^[0-9]+" >
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group has-primary">
            <div class="col-md-12">                    
                <select class="form-control input-xs" id="iddis" name="iddistrito">
                    <option value="0">SELECCIONAR DISTRITO</option>                                                     
                   <?php 
                        $ts = $class->dis_tabla();
                        foreach ($ts as $ts1): 
                            ?><option value="<?php echo $ts1['iddistrito'] ?>" <?php echo  ($ts1[iddistrito]==$dt1[0][iddistrito])?'selected':''; ?>><?php echo $ts1[nombre] ?></option><?php 
                         endforeach;
                    ?> 
                </select>                
            </div>
        </div>
    </div>

    <div class="col-md-3">  
        <div class="form-group has-primary">
            <div class="col-md-12">                  
                <input type="text" class="form-control" placeholder="Observacion" value="<?php echo $dt1[0]['de_observacion']?>" name="de_observacion" >             
            </div>
        </div>
    </div>
</div>

<div class="form-group" >
    <div class="col-md-3"> 
        <input type="hidden" name="idapoyo" id="idapoyo">
    </div>
    <label class="col-md-2 control-label"><b>Codigo de Barra </b></label>
    <div class="col-md-2">  
        <div class="form-group has-primary">
            <div class="col-md-12">
                <div class="input-group">
                     <input type="text" name="" id="nomC" class="form-control" placeholder="OA01-00000012-1" onkeypress="if(event.keyCode == 13){ vPaquete();}" >   
                     <span class="input-group-addon" style="padding:4px"><button  id="total" class="btn btn-xs btn-success" onclick="vPaquete();">Buscar</button></span>
                </div>
            </div>
        </div>
    </div> 
    <label class="col-md-3 control-label"><b>Serie</b></label>
    <div class="col-md-2">
        <div class="form-group has-primary">
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon">D001</span>
                      <input type="text" class="form-control" value="<?php 
                            $class = new Mod();
                            $cod = $class->codigo(); 
                            echo ($dt1[0]['de_codigo'])? $dt1[0]['de_codigo']: str_pad($cod[0]['codigo'], 8, "0", STR_PAD_LEFT) ;                            
                        ?> " name="de_codigo" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    sel2('iddis',0);

    function sumar_fecha(day){

        var fecha = new Date($('#fecha_inicio').val());
        var tiempo = fecha.getTime(); 
       var milisegundos = parseInt(day*24*60*60*1000);
       var total = fecha.setTime(tiempo+milisegundos);
        var dia=fecha.getDate();
        var mes = fecha.getMonth()+1;
        var anio = fecha.getFullYear();
        var d=("0"+dia).slice(-2);
        var m=("0"+mes).slice(-2);
        var modi = anio+"-"+m+"-"+d;
        $('#fecha_fin').val(modi);
    }
</script>

