<form id="frmc" action="javascript: vAjax('clientes','insert1','frmc'); ">
    <input type="hidden" name="id" value="<?php echo $s02 ?>">
    <table style="width: 100%; font-size: 12px" class="table table-striped table-bordered table-hover dataTable no-footer">
        <tbody>
            <tr>
                <td colspan="6"><center><b>Contactos</b></center></td>
            </tr>
            <tr>
                <th style="width: 180px;"><b>Nombres</b></th>
                <td><b>Área</b></td>
                <td><b>Teléfono</b></td>
                <td><b>Correo</b></td>
                <td><b>Nacimiento</b></td>
                <td style="width: 50px;">Opc.</td>
            </tr>
            <tbody id="detc">
                <?php 
                    if($dt1){
                        foreach ($dt1 as $dta1): 
                            $id = $dta1['idcontacto'];  
                            ?>
                                <tr id="tr<?php echo $id ?>">
                                   
                                        <td><?php echo $dta1['co_nombres'] ?></td>
                                        <td><?php echo $dta1['area'] ?></td>
                                        <td><?php echo $dta1['co_telefono'] ?></td>
                                        <td><?php echo $dta1['co_correo'] ?></td>
                                        <td><?php echo $dta1['co_nacimiento'] ?></td>                                   

                                        <td >
                                            <button type="button" class="btn btn-xs btn-warning" data-original-title="Edit Row"
                                            onclick="javascript:$('#edit'+<?php echo $id ?>).show(); $('#tr'+<?php echo $id ?>).hide() "><i class="fa fa-pencil"></i></button>
                                            <button type="button" class="btn btn-xs btn-default" ><i class="fa fa-save"></i></button>
                                        </td>
                                </tr>
                                <tr  id="edit<?php echo $dta1['idcontacto'] ?>" style="display: none">                                       
                                        <td><input id="no<?php echo $id ?>" value="<?php echo $dta1['co_nombres'] ?>" class="form-control nww input-xs" required=""></td>
                                        <td><?php echo $dta1['area'] ?></td>
                                        <td><input id="t<?php echo $id ?>" value="<?php echo $dta1['co_telefono'] ?>" class="form-control nww input-xs"  ></td>
                                        <td><input id="c<?php echo $id ?>" value="<?php echo $dta1['co_correo'] ?>" class="form-control nww input-xs" ></td>
                                        <td><input id="n<?php echo $id ?>" value="<?php echo $dta1['co_nacimiento'] ?>" class="form-control nww input-xs" type="date"  ></td>
                                        <td >
                                          <button type="button" class="btn btn-xs btn-default" data-original-title="Edit Row"
                                            onclick="javascript:$('#edit'+<?php echo $id ?>).hide(); $('#tr'+<?php echo $id ?>).show() "><i class="fa fa-pencil"></i></button>
                                            <button type="button" class="btn btn-xs btn-success" title="Save Row" onclick="vAjax('clientes','update1',<?php echo $id ?>+'-/'+$('#no'+<?php echo $id; ?>).val()+'-/'+$('#t'+<?php echo $id; ?>).val()+'-/'+$('#c'+<?php echo $id; ?>).val()+'-/'+$('#n'+<?php echo $id; ?>).val()+'-/'+<?php echo $s02 ?>);"><i class="fa fa-save"></i></button>
                                        </td>
                                    
                                </tr>                               

                            <?php
                        endforeach; 
                    }
                ?>
            </tbody>                        
            <tr >
                <td><input class="form-control nww input-xs" name="nom" required=""></td>
                <td>
                    <select class="form-control input-xs"  name="idarea" required="">
                        <option >Seleccione área</option>
                            <?php 
                                $class = new Mod();
                                $ts = $class->area($s02);
                                foreach ($ts as $ts1): 
                                    ?><option value="<?php echo $ts1[idarea] ?>"> <?php echo $ts1[ar_nombre] ?></option><?php
                                 endforeach;
                            ?>
                    </select>                           
                </td>
                <td><input class="form-control nww input-xs" name="tel" ></td>
                <td><input class="form-control nww input-xs" name="email" ></td>
                <td><input class="form-control nww input-xs" type="date" name="nacimiento" ></td>
                <td>                                
                    <button class="btn btn-sm btn-success" >
                    <i class="fa fa-save fa-1x"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</form>