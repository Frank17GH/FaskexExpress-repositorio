<form id="frmc" action="javascript: vAjax('clientes','insert1','frmc'); ">
    <input type="hidden" name="id" value="<?php echo $s02 ?>">
    <table style="width: 100%; font-size: 12px" class="table table-striped table-bordered table-hover dataTable no-footer">
        <tbody>        
            <tr><td colspan="7"><center><b>Entregas</b></center></td></tr>
            <tr>
                <th style="width: 5px">Item</th>
                <th style="width: 50px">Entrega</th>
                <th>Persona</th>
                <th>Direccion</th>
                <th style="width: 100px; "><b>Distrito</b></th>
                <th style="width: 100px; ">Telefono</th> 
                    <?php if($dt2){
                    foreach ($dt2 as $dta2): 
                 ?>
                 <th  <?php echo ($dta2['or_estado']=='0')? 'style="display:"':'style="display: none"'; ?> >Opc.</th>  
                <?php endforeach; } ?>                                                         
            </tr>
            <tbody id="detc">
              <?php if($dt1)  { foreach ($dt1 as $dta1): $id = $dta1['idapoyo']; ?>                            
                    <div >
                        <tr id="tr<?php echo $id ?>" >                                   
                            <td><?php echo $dta1['item'] ?></td>
                            <td><?php echo $dta1['entrega'] ?></td>
                            <td><?php echo $dta1['persona'] ?></td>
                            <td><?php echo $dta1['direccion'] ?></td>
                            <td><?php echo $dta1['distrito'] ?></td>
                            <td><?php echo $dta1['telefono'] ?></td>                                  
                            <td <?php echo ($dta1['estado']=='0')? 'style="display:"':'style="display: none"'; ?>><button type="button" class="btn btn-xs btn-warning" data-original-title="Edit Row"
                                onclick="javascript:$('#edit'+<?php echo $id ?>).show(); $('#tr'+<?php echo $id ?>).hide() "><i class="fa fa-pencil"></i></button>
                                <a class="btn btn-info btn-xs" href="javascript:void(0);" onclick="vAjax('apoyo_postal','mod2',<?php echo $id ?>,'modal5');"><i class="fa fa-pencil"></i></a>
                                <button type="button" class="btn btn-xs btn-default" ><i class="fa fa-save"></i></button>
                            </td>                        
                        </tr>
                    </div>                               
                        <tr  id="edit<?php echo $id ?>" style="display: none">

                            <td><?php echo $dta1['item'] ?></td> 
                            <td><?php echo $dta1['entrega'] ?></td>
                            <td><input id="no<?php echo $id ?>" value="<?php echo $dta1['persona'] ?>" class="form-control nww input-xs" required=""  placeholder="Apellidos y Nombres">
                                <input id="dn<?php echo $id ?>" value="<?php echo $dta1['dni'] ?>" class="form-control nww input-xs" required="" placeholder="Dni" >
                            </td>
                            <td><input id="t<?php echo $id ?>" value="<?php echo $dta1['direccion'] ?>" class="form-control nww input-xs" placeholder="Direccion" >
                                 <input id="ref<?php echo $id ?>" value="<?php echo $dta1['referencia'] ?>" class="form-control nww input-xs" required="" placeholder="Referencia" >

                            </td>
                            <td><input id="c<?php echo $id ?>" value="<?php echo $dta1['distrito'] ?>" class="form-control nww input-xs" ></td>
                            <td><input id="n<?php echo $id ?>" value="<?php echo $dta1['telefono'] ?>" class="form-control nww input-xs" type="text"></td>
                            <td >
                                <button type="button" class="btn btn-xs btn-default" data-original-title="Edit Row" onclick="javascript:$('#edit'+<?php echo $id ?>).hide(); $('#tr'+<?php echo $id ?>).show() "><i class="fa fa-pencil"></i>
                                </button>  

                                <button type="button" class="btn btn-xs btn-success" title="Save Row" onclick="vAjax('apoyo_postal','update1',<?php echo $id ?>+'-/'+$('#no'+<?php echo $id; ?>).val()+'-/'+$('#t'+<?php echo $id; ?>).val()+'-/'+$('#ref'+<?php echo $id; ?>).val()+'-/'+$('#c'+<?php echo $id; ?>).val()+'-/'+$('#n'+<?php echo $id; ?>).val()+'-/'+<?php echo $s02 ?>+'-/'+$('#dn'+<?php echo $id; ?>).val());"><i class="fa fa-save"></i></button>
                                       <ul class="dropdown-menu dropdown-menu-xs pull-right">
                                    <li>
                                        <a onclick="vAjax('apoyo_postal','mod1',0,'modal3')" ><i class="fa fa-plus fa-lg fa-fw txt-color-darken"></i> 
                                            <u>E</u>tiquetas</a>
                                    </li>
                                    <li>
                                        <a onclick="vAjax('apoyo_postal','mod1',0,'modal3')" ><i class="fa fa-plus fa-lg fa-fw txt-color-darken"></i> 
                                            <u>C</u>argo</a>
                                    </li>
                                </ul>
                            </td>
                        </tr>                               
                            <?php
                        endforeach; 
                    }
                ?>
            </tbody>                        
        </tbody>
    </table>
</form>

