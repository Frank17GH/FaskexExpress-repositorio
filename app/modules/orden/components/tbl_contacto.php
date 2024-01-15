<table style="width: 100%; font-size: 12px" class="table table-striped table-bordered table-hover dataTable no-footer">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4"><center><b>Contactos</b></center></td>
                                                    </tr>
                                                    <tr>
                                                        <th><b>Nombres</b></th>
                                                        <td><b>Área</b></td>
                                                        <td><b>Teléfono</b></td>
                                                        <td><b>Correo</b></td>
                                                        <td><b>Nacimiento</b></td>
                                                        <td style="width: 5px">Opc.</td>
                                                    </tr>
                                                    <tbody id="detc">
                                                        <?php 
                                                            if($dt2){
                                                                foreach ($dt2 as $dta2): 
                                                                    ?>
                                                                        <tr id="tr<?php echo $dta2['idcontacto'] ?>">
                                                                            <td><?php echo $dta2['co_nombres'] ?></td>
                                                                            <td><?php echo $dta2['area'] ?></td>
                                                                            <td><?php echo $dta2['co_telefono'] ?></td>
                                                                            <td><?php echo $dta2['co_correo'] ?></td>
                                                                            <td><?php echo $dta2['co_nacimiento'] ?></td>
                                                                            <td >
                                                                                <button class="btn btn-sm btn-danger " type="button" onclick="confir('Confirmación','Seguro que deseas eliminar el contacto seleccionado?','clientes','del1',<?php echo $dta2['idcontacto'] ?>,'remove')">
                                                                                    <span class="fa fa-trash-o"></span>
                                                                                </button>
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
                                                        <td><input class="form-control nww input-xs" name="tel" required=""></td>
                                                        <td><input class="form-control nww input-xs" name="email" required=""></td>
                                                        <td><input class="form-control nww input-xs" type="date" name="nacimiento" required=""></td>
                                                        <td>                                
                                                            <button class="btn btn-sm btn-success" >
                                                            <i class="fa fa-save fa-1x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>