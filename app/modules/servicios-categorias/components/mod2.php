<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h2 class="modal-title" id="myModalLabel">
        <b>
            Editar categoría 
        </b>
    </h2>
</div>
<div class="modal-body">
    <form id="frm2" class="smart-form" novalidate="novalidate">
        <input type="hidden" name="id" value="<?php echo $s02 ?>">
        <?php
            if($dt1){
                foreach ($dt1 as $dta): 
                    ?>
                        <fieldset>
                            <div class="row">
                                <section class="col col-8">
                                    <label class="input">
                                        <input type="text" name="nombre" value="<?php echo $dta['ca_nombre'] ?>" placeholder="Nombre de categoría">
                                    </label>
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="estado">
                                            <option value="1" <?php if($dta['ca_estado']){echo 'selected';} ?>>Activo</option>
                                            <option value="0" <?php if(!$dta['ca_estado']){echo 'selected';} ?>>Inactivo</option>
                                        </select> <i></i> </label>
                                </section>
                            </div>
                        </fieldset>
                    <?php 
                endforeach; 
            }
        ?>
    </form>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" onclick="vAjax('productos-categorias','edit1','frm2');">
        <i class="fa fa-edit"></i>
        Guardar
    </button>
    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
        <i class="fa fa-remove"></i>
        Cancelar
    </button>
</div>
           