<?php 
    foreach ($dt1 as $dta): 
        ?>
            <div class="col-sm-12 col-md-12 col-lg-8 sortable-grid ui-sortable">
              <div class="panel panel-default" style="padding: 5px; padding: 20px">
                  <div class="row">
                      <legend style="margin-top: -6px;text-align: left;">
                           &nbsp;&nbsp; <i class="fa  fa-file-text-o"></i> <b>DETALLE DE CAJA</b> 
                      </legend>
                      <label class="col-md-3"><b>USUARIO: </b></label>
                      <div class="col-md-9">
                          <input type="text" class="form-control acc" id="id_us" value="<?php echo $dta[pe_apellidos].', '.$dta[pe_nombres] ?>" readonly>
                      </div>
                      <div class="col-md-12"></div>
                      <label class="col-md-3"><b>LOCAL: </b></label>
                      <div class="col-md-9">
                          <input type="text" class="form-control acc" id="id_loc" readonly value="<?php echo $dta[lo_abreviatura] ?>">
                      </div>
                      <div class="col-md-12"></div>
                      <label class="col-md-3"><b>FECHA CREACION: </b></label>
                      <div class="col-md-5">
                          <input type="date" class="form-control acc" id="id_fech" value="<?php echo date('Y-m-d', strtotime($dta[ca_fecha])) ?>" readonly>
                      </div>
                      <label class="col-md-1"><b>HORA: </b></label>
                      <div class="col-md-3">
                          <input type="text" class="form-control acc" id="id_hor" value="<?php echo date('H:i a', strtotime($dta[ca_fecha])) ?>" readonly>
                      </div>
                      <div class="col-md-12"><br></div>

                      <div class="col-md-12"><a class="btn btn-danger btn-lg" onclick="vAjax('caja','mod5',<?php echo $dta[idcaja] ?>,'modal1');" style="width: 100%" href="javascript:void(0);"><b>CERRAR CAJA</b></a></div>
                      <div class="col-md-12">
                        <br>
                        <a style="display: none; width: 100%" id="vElim" class="btn btn-warning btn-lg" onclick="confir('Confirmación','Seguro que deseas eliminar la caja actual?','caja','eliminar',<?php echo $dta[idcaja] ?>,'trash');" style="width: 100%" href="javascript:void(0);"><b>ELIMINAR CAJA</b></a></div>
                      
                  </div>
              </div>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-4 sortable-grid ui-sortable">
              <div class="panel panel-default" style="padding: 5px; padding: 20px">
                  <div class="row">
                        <legend style="margin-top: -6px;text-align: left;">
                            &nbsp;&nbsp; <i class="fa fa-money"></i> <b>RESUMEN DE CAJA</b> 
                        </legend>
                        <div id="aefect">
                            <label class="col-md-6"><b>Venta Efectivo</b></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control input-xs acc" id="m_efe" value="<?php $tt+=$dta[efectivo];echo number_format($dta[efectivo],2) ?>" style="text-align: right;" readonly>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div id="aizi">
                            <label class="col-md-6"><b>Venta P.O.S</b></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control input-xs acc" id="m_izi" value="<?php $tt+=$dta[izipay];echo number_format($dta[izipay],2) ?>" style="text-align: right;" readonly>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div id="atran">
                            <label class="col-md-6"><b>Venta Transferencia</b></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control input-xs acc" id="m_tran" value="<?php $tt+=$dta[transferencia];echo number_format($dta[transferencia],2) ?>" style="text-align: right;" readonly>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-12"></div>
                        <label class="col-md-6"><b>Egresos</b></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-xs acc" id="m_egre" value="<?php $tt-=$dta[egreso];echo number_format($dta[egreso],2) ?>" style="background-color: #c46a69;text-align: right; color: white" readonly>
                        </div>
                        <div class="col-md-12"></div>
                        <label class="col-md-6"><b>Ingresos</b></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-xs acc" id="m_ingre" value="<?php $tt+=$dta[ingreso];echo number_format($dta[ingreso],2) ?>" style="background-color: #cde0c4;text-align: right;" readonly>
                        </div>
                        <label class="col-md-6"><b>Total Acumulado</b></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-xs acc" id="m_tot" value="<?php $tt+=$dta[ingreso];echo number_format($dta[ingreso]-$dta[egreso],2) ?>" style="background-color: #57889c;text-align: right;color: white" readonly>
                        </div>
                        <label class="col-md-6"><b>Total Efectivo</b></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control input-xs acc" id="m_tot_caj" value="<?php $tt+=$dta[ingreso];echo number_format($dta[ingreso]-$dta[egreso]-$dta[efectivo],2) ?>" style="background-color: #57889c;text-align: right;color: white" readonly>
                        </div><br><br><br>
                  </div>
              </div>
         </div>
            
        <?php
    endforeach; 
?>
