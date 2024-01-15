<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h6 class="modal-title">Agregar Producto ó Servicio</h6>
    <?php echo $s02,$s02["1"],$s02["2"]; ?>
</div>

<div class="modal-body">
    <div class="row">
       <div class="col-md-12">
        <form id="inspr">
            <input type="hidden" value="3" name="tp">
            <input type="hidden" value="0" name="prod" name="">
            <input type="hidden" value="<?php echo $s02 ?>" name="tpp" name="">
            <div class="col-md-12">
                <label><b>DESCRIPCIÓN</b></label>
                <textarea class="form-control" name="paq_descrip" style="width: 100%"></textarea>
            </div>
            <div class="col-md-12"><br></div> 
            <div class="col-md-3">
                <label><b>UND. MEDIDA</b></label>
                <select class="form-control" name="paq_medida">
                    <option value="UND">UND</option>
                    <option value="ZZ">SERVICIO</option>
                    <option value="NIU">SIN ESPECIFICAR</option>
                    
                </select>
            </div>
            <div class="col-md-3">
                <label>Cantidad</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button" onclick="$('#ddcant').val($('#ddcant').val()-1)"><i class="glyphicon glyphicon-minus"></i></button>
                    </span>
                    <div class="icon-addon addon-sm">
                        <input type="number" name="cant" value="1" id="ddcant" class="form-control" style="text-align: center; padding: 0;">
                    </div>
                    <span class="input-group-btn">
                        <button class="btn btn-success" onclick="$('#ddcant').val(parseInt($('#ddcant').val())+1)" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                    </span>
                </div>
            </div>
            <div class="col-md-3">
                <label><b>TOTAL S/</b></label>
                <input type="text" class="form-control" name="total">
            </div>
        </form>
            
       </div>
       </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button class="btn btn-primary" type="button" onclick="vAjax();">
        <i class="fa fa-save"></i>
        Guardar
    </button>
</div>
