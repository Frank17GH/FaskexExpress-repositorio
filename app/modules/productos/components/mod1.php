<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	   ×
	</button>
	<h6><b>PRODUCTO</b></h6>
</div>
<div class="modal-body">
    <form method="post" action="#" enctype="multipart/form-data" id="formdata">
  
        <input type="hidden" name="id" value="<?php echo $s02 ?>">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="col-sm-12" style="text-align: center;">
                    <a href="javascript:void(0);" class="btn btn-default input-sm">Kardex</a>
                    <a href="javascript:void(0);" class="btn btn-info input-sm" onclick="vAjax('productos','mod2',<?php echo $s02 ?>,'modal2');">Precios por Presentación</a>
                    <a href="javascript:void(0);" class="btn btn-default input-sm">Movimientos de Stock</a>
                    <hr>
                </div>    
                <div class="col-md-4">
                    <label>CODIGO PROD.</label>
                    <input value="<?php echo $dt1[0]['pr_codigo'] ?>" name="cod_prod" type="text" placeholder="Codigo Proveedor" class="form-control input-sm" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label>CODIGO F.</label>
                    <input value="<?php echo $dt1[0]['pr_cod_fabr'] ?>" name="cod_fab" type="text" placeholder="Codigo Fabricante" class="form-control input-sm" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label>MARCA</label>
                    <select id="selmark" name="marca" class="form-control input-sm" required="">
                        <?php 
                            if($dt3){
                                foreach ($dt3 as $dta3): 
                                    ?>
                                        <option value="<?php echo $dta3['idmarca'] ?>" <?php echo ($dt1[0]['idmarca']==$dta3['idmarca'])?'selected':'' ?>><?php echo mb_strtoupper(utf8_encode($dta3['ma_descripcion'])) ?></option>
                                    <?php
                                endforeach; 
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-12"><br></div>
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <label>ESTADO</label>
                    <select name="est" class="form-control input-sm">
                        <option value="1" <?php if($dt1[0]['pr_estado']){echo 'selected';} ?>>Activo</option>
                        <option value="0" <?php if(!$dt1[0]['pr_estado']){echo 'selected';} ?>>Inactivo</option>
                    </select> <i></i>
                </div>
                <div class="col-md-4">
                    <label>STOCK MIN.</label>
                    <input value="<?php echo $dt1[0]['pr_min'] ?>" autocomplete="off" name="stock_min" type="text" placeholder="0" class="form-control input-sm">
                </div>
                <div class="col-md-12"><br></div>
                <div class="col-md-12">
                    <label>NOMBRE DE PRODUCTO</label>
                    <textarea class="form-control" name="nom" rows="3" data-bv-field="review"><?php echo $dt1[0]['pr_nombre'] ?></textarea>
                </div>
                <div class="col-md-12"><br></div>
                <div class="col-md-4">
                    <label>COSTO S/.</label>
                    <input value="<?php echo number_format($dt1[0]['pr_costo'],2) ?>" name="cost" style="text-align: right;" type="text" placeholder="Codigo Proveedor" class="form-control input-sm">
                </div>
                <div class="col-md-4" style="display: <?php echo ($s02)?'none':''; ?>">
                    <label>UNIDAD MEDIDA</label>
                    <select class="form-control" name="medida">
                        <option value="UND">UND</option>
                    </select>
                </div>
                <div class="col-md-4" style="display: <?php echo ($s02)?'none':''; ?>">
                    <label>PRECIO VENTA S/</label>
                    <input style="text-align: right;" type="text" class="form-control input-sm" name="precio" value="0">
                </div>
                <div class="col-md-12"><br></div>
                <div class="col-md-12" style="text-align: center;">
                    <div class="col-md-3"></div>
                     <div class="col-md-3" style="display: <?php echo ($s02)?'none':''; ?>">
                        <label>STOCK INICIAL</label>
                         <input type="text" class="form-control" style="text-align: center;" value="0" autocomplete="off" name="stock" placeholder="Stock Inical">
                     </div>
                     <div class="col-md-3"><label><br></label>
                         <span class="label bg-color-darken txt-color-white font-xl">STOCK: <?php echo $dt1[0]['pr_stock'] ?></span>
                     </div>
                    
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="col-sm-12">
                    <label>IMAGEN: </label>

                </div>
                <div class="col-sm-12" style="text-align: center;">
                    <div class="col-sm-12">
                        <?php 
                            if ($dt1[0]['pr_imagen']) {
                                ?><img id="blah" style="width: 300px" src="app/modules/productos/components/images/<?php echo $s02.$dt1[0]['pr_imagen'] ?>" alt="Tu imagen" /><input type="hidden" value="<?php echo $dt1[0]['pr_imagen']; ?>" name="imgnn"><?php
                            }else{
                                ?><img id="blah" style="width: 300px" src="https://via.placeholder.com/150" alt="Tu imagen" /><input type="hidden" value="0" name="imgnn"><?php
                            }
                        ?>
                        
                    </div>
                    <div class="col-sm-12">
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <span class="btn btn-default input-sm">
                            Click para seleccionar imagen
                            <input type='file' id="imgInp" name="archivo" style="width:100%;height:100%;position:absolute;top:0;left:0;opacity:0;cursor:pointer;" />
                        </span>

                    </div>
                    <div class="col-sm-12">
                        <br>
                    </div>
                    
                    <div class="col-sm-12">
                    <?php 
                        if($dt1[0]['pr_estado']){
                            ?>
                                <div class="alert alert-success fade in">
                                    <center>ACTIVO</center>
                                </div>
                            <?php
                        }else{
                            ?>
                                <div class="alert alert-danger fade in">
                                    <center>INACTIVO</center>
                                </div>
                            <?php
                        }
                    ?>
                </div>

                </div>
                
            </div>
        </div>
  	</form>
</div>
<div class="modal-footer" style="padding: 8px;">
  	<button class="btn btn-primary" onclick="subir()">
	   	<i class="fa fa-save"></i>
		Guardar
	</button>
	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
		<i class="fa fa-remove"></i>
		Cerrar
	</button>
</div>
<script type="text/javascript">
    function subir(){
        var datos = $(this).serializeArray(); //datos serializados
        var imagen = new FormData($("#formdata")[0]);
        $.each(datos,function(key,input){
            imagen.append(input.name,input.value);
        });
        $.ajax({
            type:'post', 
            url:'app/modules/productos/components/upload.php',
            data:imagen, //enviamos imagen
            contentType:false,
            processData:false
        }).done(function(valor){
            valor=valor.trim();
            console.log(valor);
            if (valor==1) {aviso('warning','Guardado correctamente, la imagen no se pudo cargar');vAjax('productos','tabla1',0,'tab1');}else if(valor==2){aviso('success','Guardado Correctamente.');vAjax('productos','tabla1',0,'tab1');}else{
                aviso('danger','Error al Guardar.');
            }
        }).fail(function(data){
            console.log(data);
            aviso('danger','Error al Guardar.');
     });

    }
    function readImage (input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#blah').attr('src', e.target.result); // Renderizamos la imagen
          }
          reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function () {
    // Código a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
  });
</script>