<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	   ×
	</button>
	<h6><b>SERVICIO</b></h6>
</div>
<div class="modal-body">
    <form method="post" action="#" enctype="multipart/form-data" id="frm1">
        <input type="hidden" name="id" value="<?php echo $s02 ?>">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="col-md-4">
                    <label>CODIGO SERV.</label>
                    <input value="<?php echo $dt1[0]['pr_codigo'] ?>" name="cod_prod" type="text" placeholder="####" class="form-control input-sm" autocomplete="off">
                    <input type="hidden" value="0" name="marca">
                </div>
                <div class="col-md-8">
                    <label>CATEGORIA</label>
                    <select id="categoria" name="cat" class="form-control input-sm" required="">
                        <?php 
                            if($dt2){
                                foreach ($dt2 as $dta2): 
                                    ?>
                                        <option value="<?php echo $dta2['idcategoria'] ?>" <?php echo ($dt1[0]['idcategoria']==$dta2['idcategoria'])?'selected':'' ?>>
                                            <?php echo $dta2['ca_nombre'] ?>
                                        </option>
                                    <?php
                                endforeach; 
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-12"><br></div>
                <div class="col-md-12">
                    <label>DESCRIPCIÓN DEL SERVICIO</label>
                    <textarea class="form-control" name="nom" rows="3" data-bv-field="review"><?php echo $dt1[0]['pr_nombre'] ?></textarea>
                </div>
                <div class="col-md-12"><br></div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label>ESTADO</label>
                    <select name="est" class="form-control input-sm">
                        <option value="1" <?php if($dt1[0]['pr_estado']){echo 'selected';} ?>>ACTIVO</option>
                        <option value="0" <?php if(!$dt1[0]['pr_estado'] && $s02!=0){echo 'selected';} ?>>INACTIVO</option>
                    </select> <i></i>
                </div>
                <div class="col-md-4">
                    <label>PRECIO S/.</label>
                    <input value="<?php echo number_format($dt1[0]['pr_costo'],2) ?>" name="cost" style="text-align: right;" type="text" placeholder="Codigo Proveedor" class="form-control input-sm">
                    <input type="hidden" name="medida" value="ZZ">
                </div>
                <div class="col-md-12"><br></div>
            </div>
        </div>
  	</form>
</div>
<div class="modal-footer" style="padding: 8px;">
    <?php 
        if ($s02) {
            ?>
                <button class="btn btn-danger" onclick="confir('Confirmación','Seguro que deseas eliminar el servicio seleccionado?','servicios','del1',<?php echo $s02 ?>,'remove')">
                    <i class="fa fa-save"></i>
                    Eliminar
                </button>
            <?php
        }
    ?>
    
  	<button class="btn btn-primary" onclick="vAjax('servicios','insert1','frm1');">
	   	<i class="fa fa-save"></i>
		Guardar
	</button>
	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
		<i class="fa fa-remove"></i>
		Cerrar
	</button>
</div>