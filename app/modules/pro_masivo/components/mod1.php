<?php $class = new Mod(); ?>
<!-- UPDATE  -->
<?php if($dt1){foreach ($dt1 as $dta1):  ?>
<div class="col-md-12">
    <div class="panel panel-default"><br>
        <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
                <input name="idapoyo" type="hidden" value="<?php echo $dta1['idapoyo'] ?>" >
            <div class="form-group" style="padding: 2px;">
                <label class="col-md-1 control-label"><b>Empresa</b></label>

                <div class="col-md-4">
                     <input name="empresa" id="empresa" type="text" class="form-control input-xs"  placeholder="Digite Nombre de Empresa" value="<?php echo $dta1['ap_empresa'] ?>" required>
                </div>

                <label class="col-md-1 control-label"><b>Destinatario</b></label>

                <div class="col-md-3">
                     <input name="persona" type="text" class="form-control input-xs"  placeholder="Digite Destinatario" value="<?php echo $dta1['persona'] ?>" required>
                </div>

                <label class="col-md-1 control-label"><b>Teléfono</b></label>

                <div class="col-md-2">
                     <input name="telefono" type="text" class="form-control input-xs"  placeholder="Telefono" value="<?php echo $dta1['telefono'] ?>"required>
                </div>
            </div>

            <div class="form-group" >
                <label class="col-md-1 control-label"><b>Distrito</b></label>
                <div class="col-md-4">                    
                    <select name="distrito" class="form-control input-xs" id="iddis" required>
                        <option value="0">SELECCIONAR DISTRITO</option>                                                     
                       <?php 
                            $ts = $class->dis_tabla();
                            foreach ($ts as $ts1): 
                                ?><option value="<?php echo $ts1['iddistrito'] ?>" <?php echo  ($ts1[iddistrito]==$dta1[ap_distrito])?'selected':''; ?>><?php echo $ts1[nombre] ?></option><?php 
                             endforeach;
                        ?> 
                    </select>                
                </div>
                
                <label class="col-md-1 control-label"><b>Dirección</b></label>

                <div class="col-md-3">
                     <input name="direccion" type="text" class="form-control "  placeholder="Dirección" value="<?php echo $dta1['direccion'] ?>" required>
                </div>

                 <label class="col-md-1 control-label"><b>Referencia</b></label>
                <div class="col-md-2">
                     <input name="referencia" type="text" class="form-control "  placeholder="Referencia" value="<?php echo $dta1['referencia'] ?>" required>
                </div>
            </div>

            <div class="form-group" style="padding: 1px;">

                <label class="col-md-1 control-label"><b>Observacion</b></label>

                <div class="col-md-4">
                     <input name="observacion" type="text" class="form-control input-xs"  placeholder="Observacion" value="<?php echo $dta1['observaciones'] ?>" required>
                </div> 

                <label class="col-md-1 control-label"><b>Cargo</b></label>

                <div class="col-md-2">
                     <input name="ap_cargo" type="text" class="form-control input-xs"  placeholder="Cargo" value="<?php echo $dta1['ap_cargo'] ?>"required>
                </div>

                <div class="col-md-2">
                     <input name="peso" type="text"  class="form-control input-xs"  placeholder="Peso" value="<?php echo $dta1['ap_peso'] ?>" required>
                </div>                

                <div class="col-md-2">
                     <input name="ap_codigo" type="text" class="form-control input-xs"  placeholder="Codigo" value="<?php echo $dta1['ap_codigo'] ?>"required>
                </div>                               
            </div>
            
        </div>
    </div>
</div> 
<!-- FIN UPDATE -->                   
<?php endforeach; }else { ?>
<!-- NUEVO -->    
<div class="col-md-12">
    <div class="panel panel-default"><br>
        <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
            <div class="form-group" style="padding: 2px;">
                <label class="col-md-1 control-label"><b>Empresa</b></label>

                <div class="col-md-4">
                     <input name="empresa" type="text" class="form-control input-xs"  placeholder="Digite Nombre de Empresa" required>
                </div>

                <label class="col-md-1 control-label"><b>Destino</b></label>

                <div class="col-md-3">
                     <input name="persona" type="text" class="form-control input-xs"  placeholder="Digite Destinatario" required>
                </div>

                <label class="col-md-1 control-label"><b>Teléfono</b></label>

                <div class="col-md-2">
                     <input name="telefono" type="text" class="form-control input-xs"  placeholder="Telefono" required>
                </div>
            </div>

            <div class="form-group" >
                <label class="col-md-1 control-label"><b>Distrito</b></label>
                <div class="col-md-4">                    
                    <select name="distrito" class="form-control input-xs" id="iddis">                             
                        <option value="0">SELECCIONAR DISTRITO</option>
                       <?php 
                            $ts = $class->dis_tabla();
                            foreach ($ts as $ts1): 
                                ?><option value="<?php echo $ts1['iddistrito'] ?>" <?php echo  ($ts1[iddistrito]==$dta1[iddistrito])?'selected':''; ?>><?php echo $ts1[nombre] ?></option><?php 
                             endforeach;
                        ?> 
                    </select>                
                </div>
                
                <label class="col-md-1 control-label"><b>Dirección</b></label>

                <div class="col-md-3">
                     <input name="direccion" type="text" class="form-control "  placeholder="Dirección" required>
                </div>

                 <label class="col-md-1 control-label"><b>Referencia</b></label>
                <div class="col-md-2">
                     <input name="referencia" type="text" class="form-control "  placeholder="Referencia" required>
                </div>

            </div>

            <div class="form-group" style="padding: 1px;">

                <label class="col-md-1 control-label"><b>Observacion</b></label>

                <div class="col-md-4">
                     <input name="observacion" type="text" class="form-control input-xs"  placeholder="Observacion" required>
                </div> 

                <label class="col-md-1 control-label"><b>Cargo</b></label>

                <div class="col-md-2">
                     <input name="ap_cargo" type="text" class="form-control input-xs"  placeholder="Cargo" required>
                </div>

                <div class="col-md-2">
                     <input name="peso" type="text"  class="form-control input-xs"  placeholder="Peso" required>
                </div>                

                <div class="col-md-2">
                     <input name="ap_codigo" type="text" class="form-control input-xs"  placeholder="Codigo" required>
                </div>                               
            </div>
            
        </div>
    </div>
</div>                     
<!-- FIN NUEVO -->
<?php } ?>                             	
<script>
sel2('iddis',0)
</script>

  