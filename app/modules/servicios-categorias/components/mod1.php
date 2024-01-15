<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h2 class="modal-title" id="myModalLabel">
        <b>
            Nueva categoría 
        </b>
    </h2>
</div>
<div class="modal-body">
    <form id="frm1" class="smart-form" novalidate="novalidate">
        <fieldset>
            <div class="row">
                <section class="col col-8">
                    <label class="input">
                        <input type="text" name="nombre" placeholder="Nombre de categoría">
                    </label>
                </section>
                <section class="col col-4">
                    <label class="select">
                        <select name="estado">
                            <option value="1" selected="">Activo</option>
                            <option value="0">Inactivo</option>
                        </select> <i></i> </label>
                </section>
            </div>
        </fieldset>
    </form>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" onclick="vAjax('productos-categorias','insert1','frm1');">
        <i class="fa fa-edit"></i>
        Guardar
    </button>
    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
        <i class="fa fa-remove"></i>
        Cancelar
    </button>
</div>
           