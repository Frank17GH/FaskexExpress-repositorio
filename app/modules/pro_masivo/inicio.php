
<div class="col-md-12" style="padding: 5px">
    <legend>&nbsp;&nbsp; <i class="fa fa-pencil"></i> <b>DIGITACIÓN MASIVA </b> </legend>
</div>
<form id="frm_apoyo" action="javascript:vAjax('pro_masivo','apo_agregar','frm_apoyo')" class="form-horizontal"> 

<div class="col-md-1">
    <div class="form-group has-primary">        
        <div class="input-group">           
            <select name="tipo" id="vtip" class="form-control " onchange="javascript: aOrden(1);">
               <option value="1">Automatico</option>
               <option value="2">Manual</option>
            </select> 
        </div>        
    </div>
</div>

<div class="col-md-1">
    <div class="form-group has-primary">        
        <div class="input-group">           
            <input name="serie" id="vserie" type="text" required="" class="form-control "style="text-align: right;" readonly="">
        </div>        
    </div>
</div> 

<div class="col-md-1">
    <div class="form-group has-primary">        
        <div class="input-group">            
            <input type="text"  name="orden" id="orden" onkeydown=" if(event.keyCode === 13){ Orden($(this).val(),$('#vserie').val()); $('#numorden').val($(this).val()); return false; }" placeholder="# Orden " class="form-control" >                
        </div>        
    </div>
</div>

<div class="col-md-4">
    <div class="form-group has-primary">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="nombre" id="cliente" type="text"  class="form-control" placeholder="Datos de Cliente" disabled>                
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="form-group has-primary">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon">.</span>
                <select name="idservicio" class="form-control " id="servicio">                    
                </select>
            </div>
        </div>
    </div>
</div>

<div class="col-md-2">
    <div class="form-group has-primary">
        <div class="col-md-12">
            <div class="input-group">
                <span class="input-group-addon"><input type="checkbox" class="custom-control-input" ></span>
                 <input id="fecha"  type="text" class="form-control" disabled >
            </div>
        </div>
    </div>
</div>

<!-- DETALLES -->
<div id="div_masivo" style="display:none" class="tabbable tabs-below">        
         <input type="hidden" name="idorden" id="idorden">
         <input type="hidden" name="numorden" id="numorden">            

         <div id="div-frm_masivo"></div>
         <div class="modal-footer ml-auto ">
            <div class="col-md-7 ml-auto">
                <button type="button" id="total" class="btn btn-sm btn-info ">Cantidad Total: 0</button>  
                <button type="button" id="ingresado" class="btn btn-sm btn-secondary ">Total Ingresado : 0</button>
                <button onclick="confir('Confirmación','Desea generar base?','pro_masivo','apo_generar','frm_apoyo','remove')" type="button" id="total" class="btn btn-sm btn-success">Generar Base</button> 
            </div>
            <div class="btn-group">
                <a class="btn btn-labeled btn-danger" onclick="ocultar('masivo');ocultar('tbl-masivo')" > <span class="btn-label"><i class="fa fa-remove"></i></span><b>Cancelar</b></a>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-labeled btn-primary" > <span class="btn-label"><i class="fa fa-save"></i></span><b>Guardar</b></button>
            </div>
        </div>    
</div>
</form>

<div id="div_tbl-masivo" style="display:none" class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <h2>Listado de Entregas </h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <div id="buttons1">
                <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"></button>
            </div>            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl_data"></div>
    </div>
</div>
<script type="text/javascript">
     aOrden(1);
</script>

