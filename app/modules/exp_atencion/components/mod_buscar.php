<div class="modal-header" style="padding: 10px;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h4 class="modal-title" id="myModalLabel">Salidas a Ruta</h4>
</div>

<div class="modal-body">
    <div class="col-md-12" style="padding-bottom: 10px;" >
        <div class="input-group">
             <input type="text" name="" id="nomC" class="form-control" placeholder="0001" onkeyup="vAjax('exp_salidaruta','tbl_buscar',$(this).val(),'tbl_buscar')" >   
             <span class="input-group-addon" style="padding:4px"><button type="button" id="total" class="btn btn-xs btn-success" >Buscar</button></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id ="div-tbl_buscar"></div><script>vAjax('exp_salidaruta','tbl_buscar',0,'tbl_buscar');</script> 
        </div>
    </div>
</div>