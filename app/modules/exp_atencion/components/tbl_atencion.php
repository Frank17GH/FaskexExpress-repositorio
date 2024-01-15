<table id="example" class="table table-hover table-responsive  display projects-table table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <tr>                                
        <th></th>
        <th>Ambito</th>
        <th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Detalle</th>      
        <th>Documento</th>                    
        <th >Ent.</th>
        <th >Mot.</th>
        <th >Pend.</th>    
        <th >Total</th>
        <th>Estado</th>
        <th>Cargos</th>        
        <th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Fecha Inicio</th>
        <th><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Fecha Fin</th>                
        <!-- <th><i class="fa fa-circle text-danger font-xs"></i> Acc.</th>         -->
    </tr>
    <tbody>
        <?php 
            if ($dt1) {
                $cc=0;

                foreach ($dt1 as $dta1): $cc++;
                    ?>
                    <tr style="cursor: pointer;">
                        <td class=" inbox-table-icon-"><a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-user"></i></a></td>
                        <td><?php echo ($dta1[or_tipo]=='1')?'Local':'Nacional'; ?></td>
                        <td class="sorting_1"><?php echo $dta1[cliente] ?><br>
                        <small class="text-muted">Fecha Ingreso : </small><?php echo $dta1[fecha_ingreso] ?><small class="text-muted"> Fecha Corte : </small><?php echo date("d/m/Y", strtotime($dta1[fecha_devolucion]))  ?><br>
                        <small class="text-muted">Origen : </small><?php echo $dta1[nombre] ?> <small class="text-muted"> Destino : </small><?php echo $dta1[distrito] ?></td>
                        
                        <td><?php echo $dta1[co_serie].'-'.$dta1[co_correlativo] ?> </td>                        
                        
                        <td class=" inbox-table-icon"><?php echo $dta1[entregado] ?></td>
                        <td class=" inbox-table-icon"><?php echo $dta1[motivado] ?></td>
                        <td class=" inbox-table-icon"><?php echo $dta1[pendiente] ?></td>
                        <td class=" inbox-table-icon"><?php echo $dta1[total] ?></td>
                        <td><?php echo ($dta1[pendiente]=='0')?'<span class="label label-success">Entregado</span>' : '<span class="label label-warning">Pendiente</span>' ?> <br><div class="progress progress-xs" data-progressbar-value="15"><div class="progress-bar"></div></div></td>                                               
                        <td class=" inbox-table-icon"> <a onclick="vAjax('exp_descargop','mod_Descargo',<?php echo "'".$dta1['idapoyo']."-/".$dta1['idtipo']."'" ?> ,'modal4')" class="btn btn-default txt-color-teal"><i class="glyphicon glyphicon-camera"></a></td>                                                
                        <td><?php echo date("d/m/Y", strtotime($dta1['fecha_inicio']))  ?></td>                                 
                        <td><?php echo date("d/m/Y", strtotime($dta1['fecha_vencimiento'])) ?></td>                                                                                             
                        <!-- <td><div class="btn-group display-inline pull-right text-align-left hidden-tablet ">
							<button class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								Opciones <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li>
									<a href="javascript:void(0);">Ver Comprobante</a>
								</li>
								<li>
									<a href="javascript:void(0);">Ver Cargos</a>
								</li>
								<li>
									<a href="javascript:void(0);">Imprimir Cargo </a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="javascript:void(0);">Enviar Cargo</a>
								</li>
							</ul>
						</div></td>                         -->
                    </tr>
                                    
                    <?php
                endforeach;
            }?>

<?php 
            if ($dt2) {
                $cc=0;

                foreach ($dt2 as $dta2): $cc++;
                    ?>
                    <tr style="cursor: pointer;">
                        <td class=" inbox-table-icon"><a href="javascript:void(0);" class="btn btn-success btn-circle"><i class="fa fa-file-text"></i></a></td>                        
                        <td><?php echo ($dta2[or_tipo]=='1')?'Local':'Nacional'; ?></td>
                        <td class="sorting_1"><?php echo $dta2[cl_nombres] ?><br>
                        <small class="text-muted">Fecha Ingreso : </small><?php echo $dta2[fecha_ingreso] ?><small class="text-muted"> Fecha Corte : </small><?php echo $dta2[fecha_devolucion] ?><br>
                        <small class="text-muted">Sede : </small><?php echo $dta2[nombre] ?></td>
                        
                        <td><?php echo $dta2[or_serie].'-'.$dta2[or_numero] ?> </td>                        
                        
                        <td class=" inbox-table-icon"><?php echo $dta2[entregado] ?></td>
                        <td class=" inbox-table-icon"><?php echo $dta2[motivado] ?></td>
                        <td class=" inbox-table-icon"><?php echo $dta2[pendiente] ?></td>
                        <td class=" inbox-table-icon"><?php echo $dta2[total] ?></td>
                        <td><?php echo ($dta2[pendiente]=='0')?'<span class="label label-success">Entregado</span>' : '<span class="label label-warning">Pendiente</span>' ?> <br><div class="progress progress-xs" data-progressbar-value="15"><div class="progress-bar"></div></div></td>                                               
                        <td class=" inbox-table-icon"> <a onclick="vAjax('exp_descargop','mod_Descargo','318-/1','modal4')" class="btn btn-default txt-color-teal"><i class="glyphicon glyphicon-camera"></a></td>                                                
                        <td><?php echo $dta2[fecha_inicio] ?></td>                                 
                        <td><?php echo $dta2[fecha_vencimiento] ?></td>                                                                                             
                        <td><div class="btn-group display-inline pull-right text-align-left hidden-tablet ">
							<button class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								Opciones <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li>
									<a href="javascript:void(0);">Ver Comprobante</a>
								</li>
								<li>
									<a href="javascript:void(0);">Ver Cargos</a>
								</li>
								<li>
									<a href="javascript:void(0);">Imprimir Cargo </a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="javascript:void(0);">Enviar Cargo</a>
								</li>
							</ul>
						</div></td>                        
                    </tr>
                                     
                    <?php
                endforeach;
            }?>
           
    </tbody>                                    
</table>