<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">    
<!-- HEADER -->
    <div class="col-md-12" style="padding: 5px">
        <legend>&nbsp;&nbsp; <i class="fa fa-pencil"></i> <b>CARGA DE DATOS</b> </legend>
    </div>
<!-- END HEADER -->

<!-- BODY -->
    <form id="frm_apoyo" action="javascript:vAjax('pro_masivo','apo_agregar','frm_apoyo')" class="form-horizontal"> 
        <div class="form-group">

            <div class="col-md-1">                      
                <div class="input-group">           
                    <select name="tipo" id="vtip" class="form-control input-sm " onchange="javascript: aOrden(1);">
                    <option value="1">Automatico</option>
                    <option value="2">Manual</option>
                    </select> 
                </div>                        
            </div>

            <div class="col-md-1">                      
                <div class="input-group">           
                    <input name="serie" id="vserie" type="text" required="" class="form-control input-sm "style="text-align: right;" readonly="">
                </div>                
            </div>  

            <div class="col-md-1">                      
                <div class="input-group">            
                    <input type="text"  name="orden" id="orden" onkeydown=" if(event.keyCode === 13){ Orden($(this).val(),$('#vserie').val()); $('#numorden').val($(this).val()); return false; }" placeholder="# Orden " class="form-control" >                
                </div>                        
            </div>

            <div class="col-md-4">                
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input name="nombre" id="cliente" type="text"  class="form-control input-sm" placeholder="Datos de Cliente" disabled>                
                </div>                
            </div>

            <div class="col-md-3">
                <div class="form-group has-primary">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon">.</span>
                            <select name="idservicio" class="form-control input-sm " id="servicio">                    
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

            <div style="display:none">
                <input type="text" name="idorden" id="idorden">
                <input type="text" name="numorden" id="numorden">
                <input type="text" name="numcot" id="numcot">
                <input type="text" name="numord" id="numord">
                <input type="text" value="C128" id="type">
            </div>           
        </div>
    </form>

    <div class="tabbable tabs-below">                       
    
        <div id="cp-2" class="card border">
            <div class="card-header bg-info-600">
                Requisitos
            </div>
            <div class="card-footer bg-info-800 py-2">
                <li>El usurio debera descargar el formato predeterminado</li>
                <li>El usurio debera cargar el archivo .Exe con el formato establecido.</li>
                <li>.</li>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="input-group">         
                        <span class="input-group-addon"><i class="fa fa-download fa-l fa-fw"></i></span>
                        <button class="btn dropdown-toggle btn-l btn-default" type="button" onclick="vAjax('apoyo_postal','Exportar',$('#idorden').val()+'-/'+$('#numord').val()+'-/'+$('#numcot').val()+'-/'+$('#fecha').val()+'-/'+$('#cliente').val()+'-/'+$('#servicio').val());return false;">Formato BD</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-upload fa-l fa-fw"></i></span>
                        <button class="btn dropdown-toggle btn-l btn-default" type="button" onclick="vAjax('apoyo_postal','excel',$('#idorden').val(),'modal5');return false;">
                                <i class="fa "></i> Subir BD
                </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <div class="input-group">                        
                         <button onclick="confir('Confirmación','Desea generar base?','pro_masivo','apo_generar','frm_apoyo','remove')" type="button" id="total" class="btn btn-sm btn-success">Generar Base</button> 
                    </div>
                </div>
            </div>

            

        </div>
    </div>
    </div>
</div>

<!-- END BODY -->    

<!-- TABLE  -->
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
<!-- END TABLE  -->

<!-- SCRIPT -->
    <script type="text/javascript">
        aOrden(1);
    </script>
<!-- END SCRIPT -->
