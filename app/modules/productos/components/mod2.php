       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
          </button>
          <h2 class="modal-title" id="myModalLabel"><b><center>
            PRESENTACIONES
          </center></b></h2>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form action="javascript: vAjax('productos','insert2','frm1');" id="frm1">
                  <input type="hidden" name="id" value="<?php echo $s02 ?>">
                  <div class="col-md-4">
                      <select name="pres" class="form-control input-sm press">
                          <?php 
                              if($dt2){
                                  foreach ($dt2 as $dta2): 
                                      ?>
                                          <option value="<?php echo $dta2['idmedida'] ?>" <?php if($dta2['idmedida']=='NIU'){echo 'selected';} ?>><?php echo $dta2['me_descripcion'] ?></option>
                                      <?php 
                                   endforeach; 
                              }
                          ?>
                      </select>
                  </div>
                  <div class="col-md-4">
                      <input type="text" name="cant" placeholder="Cantidad" style="text-align: center;" class="form-control input-sm press">
                  </div>
                  <div class="col-md-4">
                      <input type="text" name="precio" placeholder="Precio" style="text-align: right;" class="form-control input-sm press">
                  </div>
                  <div class="col-md-12"></div>
                  <div class="col-md-8">
                      <input type="text" name="des" placeholder="Descripción" class="form-control input-sm press">
                  </div>
                  <div class="col-md-4">
                    <button class="btn btn-success btn-sm" style="width: 100%" type="submit">Guardar</button>
                  </div>
              </form>
                
                <div class="col-md-12"><hr></div>
            </div>

            
            <div class="form-group">
              <div class="col-md-12">
                <table style="width: 100%" class="table table-striped table-bordered table-hover dataTable no-footer font-xs">
                  <tr>
                    <td colspan="6"><center><b>Presentaciones registradas</b></center></td>
                  </tr>
                  <tr>
                    <th style="width:5px">Cód.</th>
                    <th>Und. Medida</th>
                    <td>Descripción</td>
                    <td style="width:5px">Cantidad</td>
                    <td style="width:5px">Precio</td>
                    <td style="width:5px">Acc</td>
                  </tr>
                    <?php 
                        if($dt1){
                            foreach ($dt1 as $dta1): 
                                ?><tr id="pr_<?php echo $dta1['idpresentacion']; ?>">
                                  <td><?php echo $dta1['idpresentacion']; ?></td>
                                  <td><?php echo $dta1['idmedida']; ?></td>
                                  <td><?php echo $dta1['pre_descrip']; ?></td>
                                  <td><?php echo $dta1['pre_unidades']; ?></td>
                                  <td><?php echo number_format($dta1['pre_precio'],2); ?></td>
                                  <td>
                                    <a class="btn btn-danger btn-xs" onclick="confir('Confirmación!','<i class=\'fa fa-clock-o\'></i> <i>¿Deseas eliminar el producto con id: #<?php echo $dta1['idpresentacion']; ?> ?</i>','productos','del1','<?php echo $dta1['idpresentacion']; ?>-/<?php echo $s02; ?>','times');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                  </td>
                                </tr>
                                <?php 
                            endforeach; 
                        }
                    ?>
                </table>
              </div>
            </div>
                  
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default"  data-dismiss="modal" aria-hidden="true">
            <i class="fa fa-remove"></i>
            Cerrar
          </button>
        </div>
  