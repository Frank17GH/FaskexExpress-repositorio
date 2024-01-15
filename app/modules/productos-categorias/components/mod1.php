<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h6 class="modal-title" id="myModalLabel">NUEVA CATEGORÍA</b>
    </h6>
</div>
<div class="modal-body">
    <div class="row">
        <form id="frm1" class="smart-form" novalidate="novalidate">
            <section class="col col-8">
                <label class="input"> <i class="icon-append fa fa-question-circle"></i>
                    <input type="text" name="nombre" placeholder="Nombre de categoría">
                    <b class="tooltip tooltip-top-right">
                        <i class="fa fa-warning txt-color-teal"></i> Nombre que tendra la categoria para agrupar productos y/o servicios.
                    </b> 
                </label>
            </section>
            <section class="col col-4">
                <label class="select">
                    <select name="estado">
                        <option value="1" selected="">Activo</option>
                        <option value="0">Inactivo</option>
                    </select> <i></i> 
                </label>
            </section>
            <section class="col col-8"></section>
            <section class="col col-4">
                <label class="select">
                    <select name="tipo">
                        <option value="1" selected="">SERVICIOS</option>
                        <option value="0">PRODUCTOS</option>
                    </select> <i></i> 
                </label>
                <div class="note">
                    <strong>NOTA:</strong> Seleccione si la categoría agrupara productos ó servicios.
                </div>
            </section>
        </form>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" onclick="vAjax('productos-categorias','insert1','frm1');">
        <i class="fa fa-edit"></i> GUARDAR
    </button>
    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
        <i class="fa fa-remove"></i> CANCELAR
    </button>
</div>
           