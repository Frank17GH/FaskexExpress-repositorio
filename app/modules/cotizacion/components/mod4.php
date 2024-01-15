<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h6 class="modal-title">Agregar Cita</h6>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
<?php if($dt1) {
      $iddet=$dt1 [0]['iddet'];
}else {$d='';} 
 ?>
            <form id="inspr">
                <div style="display: " >
                    <div class="col-md-6" >
                        <label>Cita con : </label>
                       <input type="hidden" name="idprod" value="<?php echo $iddet; ?>">
                        <div class="input-group input-group-sm">
                            <div class="icon-addon addon-sm">
                                <input type="text" class="form-control" value=" <?php echo $de_descripcion; ?>"  name="" readonly="">
                            </div> 
                        </div>
                    </div>  
                    <div class="col-md-6" >
                    <label>Fecha : </label>
                       <input type="hidden" name="idprod" value="<?php echo $iddet; ?>">
                        <div class="input-group input-group-sm">
                            <div class="icon-addon addon-sm">
                                <input type="date" class="form-control" value=""  name="" >
                            </div> 
                        </div>
                    </div>                              
                                       
                     <div class="col-md-12" >
                    <label>Observacion: </label>
                    <textarea class="form-control" value=""  name=""  >
                                </textarea>                      
                    </div>
                                                                      

                 
                </div>
            </form>
       </div>
    </div>
</div>
<div class="modal-footer">

    <button class="btn btn-primary" type="button" onclick="vAjax('cotizacion','inse','inspr');">
        <i class="fa fa-save"></i>
        Guardar
    </button>
</div>
