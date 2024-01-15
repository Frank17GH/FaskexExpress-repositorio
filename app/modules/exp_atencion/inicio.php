<?php 
session_start();
include '../../recursos/db.class.php';
include '.Model.php';
$model = new Mod();
$dias = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
$mes = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
?>  
<!-- HEADER -->
    <div class="col-md-12" >
        <div class="col-md-12"><legend>&nbsp;&nbsp; <i class="fa fa-pencil"></i> <b>ATENCION AL CLIENTE</b></legend> </div>    
    </div>
<!-- END HEADER -->

<!-- BODY -->
<form id="frm_apoyo" class="form-horizontal" action="javascript:vAjax('exp_atencion','tbl_atencion','frm_apoyo','atencion');" >
    <div class="panel panel-default">
        <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
            <div style="display:none">
                <input type="text" name="idorden" id="idorden">
                <input type="text" name="numorden" id="numorden">
                <input type="text" name="numcot" id="numcot">
                <input type="text" name="numord" id="numord">
                <input type="hidden" value="C128" id="type">
                <input type="text" name="idlocal" id="local" value="<?php echo $_SESSION['fasklog']['local_pre'] ?>">
                <span id="optc" style="display:">asdad</span>
            </div>

            <div class="form-group" style="margin-bottom: 6px">
                     
                <div class="col-md-2" >
                    <b>Locales</b>
                    <select  class="form-control input-xs" name="id_locales" id="idlocal" onchange="serie_atencion($('#idlocal').val(),$('#documento').val());vAjax('exp_atencion','tbl_atencion','frm_apoyo','atencion');">
                        <option value="">[ -- Todos los Locales -- ]</option>
                        <?php                     
                            $ts1 = $model->Locales();
                            foreach ($ts1 as $dta): ?>
                                <option value="<?php echo $dta[idlocales] ?>"><?php echo $dta[lo_abreviatura] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2" >
                    <b>Tipo de Documento</b>            
                    <select  class="form-control input-xs" name="tipo_documento" id="documento" onchange="vfact($('#documento').val());vAjax('exp_atencion','tbl_atencion','frm_apoyo','atencion');">                     
                        <option value="0">[ -- Todos los Documentos -- ]</option>
                        <option value="01">FACTURA</option>
                        <option value="03">BOLETA</option>
                        <option value="99">ORDEN DE SERVICIO</option>
                        <option value="99">GUIA DE SALIDA</option>
                    </select>                                    
                </div>
                <div class="col-md-2" >
                    <b>Serie</b>  
                    <select name="serie" id="view2" class="form-control input-xs" onchange="vAjax('exp_atencion','tbl_atencion','frm_apoyo','atencion')">
                        <option value="0">[ -- Todas las series -- ]</option>                                                                                             
                    </select>                                                         
                </div> 
                <div class="col-md-2" >
                    <b>Correlativo</b>
                    <input type="text"  name="nro_comprobante" id="orden" class="form-control input-xs"  onkeydown=" if(event.keyCode === 13){ Orden($(this).val(),$('#view2').val()); $('#numorden').val($(this).val());$('#contenedor').hide();$('#formato').val($('#formato option:first').val());vAjax('exp_atencion','tbl_atencion','frm_apoyo','atencion'); return false; }" placeholder="Todas los correlativos" class="form-control " >                
                </div>

                <div class="col-md-2" >
                    <b>Estados</b>            
                    <select name="estado"  class="form-control input-xs" onchange="vAjax('exp_atencion','tbl_atencion','frm_apoyo','atencion')">
                        <option value="0">[ -- Todos los Estados -- ]</option>
                        <option value="2">PENDIENTES</option>
                        <option value="3">MOTIVADOS</option>
                        <option value="4">ENTREGADOS</option>
                    </select>                                         
                </div> 

                <div class="col-md-2 mb-3">
                    <b>Rango Fecha</b> 
                    <select class="form-control input-xs" onchange="fil_fecha($('#idtin').val())" id="idtin" name="filtro_fecha">
                        <option selected="">[-- Toda las fechas --]</option>
                        <option value="1">Diario</option>
                        <option value="2">Mensual</option>
                        <option value="3">Anual</option>
                        <option value="4">Rango</option>
                    </select>
                </div>

            </div>

            <div class="form-group" style="margin-bottom: 12px">       
                <div class="col-md-3">
                    <b>Cliente</b>                             
                    <div class="input-group">
                        <input name="nombre" id="cliente" type="text"  class="form-control input-xs" placeholder="Datos de Cliente" disabled>                                
                        <span class="input-group-addon" style="padding: 0px 10px;">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>                       
                </div>

                <div class="col-md-3">
                    <b>Servicio</b>
                    <div class="input-group">
                        <select name="idservicio" class="form-control input-xs" id="servicio" disabled></select>
                        <span class="input-group-addon" style="padding: 0px 10px;">
                            <i class="fa fa-map"></i>
                        </span>
                    </div>            
                </div>

                <div class="col-md-2">
                    <b>Fecha</b>
                    <div class="input-group">
                        <input id="fecha"  type="text" class="form-control input-xs" disabled >
                        <span class="input-group-addon" style="padding: 0px 10px;">
                            <i class="fa fa-map"></i>
                        </span>
                    </div>                         
                </div>

                <div class="col-md-1 mb-3" id="div_dia" style="display:none ">
                    <b>Dia</b>
                    <select class="form-control input-xs" onchange="vAjax('exp_atencion','tbl_atencion','frm_apoyo','atencion')" name="dia">
                        <?php 
                            for ($i=0; $i < 31; $i++) { 
                                ?>
                                    <option value="<?php echo $dias[$i] ?>" 
                                        <?php if($dias[$i]==date('d')){echo 'selected';} ?>><?php echo $dias[$i] ?>
                                    </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="col-md-2 " id="div_mes" style="display:none ">
                    <b>Mes</b>
                    <select class="form-control input-xs" onchange="vAjax('exp_atencion','tbl_atencion','frm_apoyo','atencion')" name="mes">
                        <?php 
                            for ($i=0; $i < 12; $i++) { 
                                ?>
                                    <option value="<?php echo $i+1 ?>" 
                                        <?php if($i+1==intval(date('m'))){echo 'selected';} ?>><?php echo $mes[$i] ?>
                                    </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-1 " id="div_anio" style="display: none">
                    <b>Año</b>
                    <select class="form-control input-xs" onchange="vAjax('exp_atencion','tbl_atencion','frm_apoyo','atencion')" name="anio">
                        <?php 
                            $anio=intval(date('Y'))+1;
                            for ($i=2019; $i <=$anio; $i++) { 
                                ?>
                                    <option value="<?php echo $i ?>" <?php echo ($i==date('Y'))?'selected':'' ?>><?php echo $i ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="col-md-2 mb-3" id="div_inicio" style="display: none">
                    <b>Fecha Inicio</b>
                        <input type="date" class="form-control input-xs" value="<?php echo date('Y-m').'-01'; ?>" name="inicio" onchange="vAjax('mark_reporte','tabla1','frm1','tbl1');">
                </div>
                <div class="col-md-2 mb-3" id="div_fin" style="display: none">
                    <b>Fecha Fin</b>
                        <input type="date" class="form-control input-xs" value="<?php echo date('Y-m-t') ?>" name="fin" onchange="vAjax('mark_reporte','tabla1','frm1','tbl1');">
                </div>        
            </div>

            <div class="form-group"> 

                <div class="col-md-4"></div>

                <div class="col-md-5">
                    <a class="btn btn-sm btn-danger">Limpiar </a>
                    <button type="submit" class="btn btn-labeled btn-primary" > <span class="btn-label"><i class="fa fa-save"></i></span>Buscar</button> 
                    <button type="button" id="total" class="btn btn-sm btn-info" onclick="vAjax('exp_salidaruta','mod_buscar',0,'modal3');">Buscar Despacho</button>                                  
                </div>

                <div class="col-md-3">
                                        
                </div>

            </div>

        </div>
    </div>
</form>     
<!-- END BODY -->

<!-- TABLE -->
    <div class="col-md-12 jarviswidget jarviswidget-color-blueDark" >
        <header>
            <h2>Registros </h2>
            <div class="widget-toolbar hidden-mobile" role="menu">
                <div id="buttons1">
                    <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"></button>
                </div>            
            </div>
        </header>        
        <div id ="div-atencion"></div>
    </div>
<!--END TABLE -->

<!-- SCRIP -->
<script type="text/javascript">
    

        function fil_fecha(id) {
            if(id==1){
                mostrar('dia');
                mostrar('mes');
                mostrar('anio');
                ocultar('inicio');
                ocultar('fin');
            }else if(id==2){
                ocultar('dia');            
                mostrar('mes');
                mostrar('anio');
                ocultar('inicio');
                ocultar('fin');
            }else if (id==3){
                ocultar('dia');            
                ocultar('mes');
                mostrar('anio');
                ocultar('inicio');
                ocultar('fin');
            }else if (id==4){
                ocultar('dia');            
                ocultar('mes');
                ocultar('anio');
                mostrar('inicio');
                mostrar('fin');
            }else{
                ocultar('dia');            
                ocultar('mes');
                ocultar('anio');
                ocultar('inicio');
                ocultar('fin');
            }
        }
        function mostrar(id) {
            $('#div_'+id).show();
            $('#btn_'+id).hide();
        }
        function ocultar(id) {
            $('#div_'+id).hide();
            $('#btn_'+id).show();
        }
    </script>
    <script type="text/javascript">
        serie_atencion(0,0);   
        vAjax('exp_atencion','tbl_atencion','frm_apoyo','atencion');
    </script>
<!-- END SCRIPT -->


<script type="text/javascript">

	
	

	var pagefunction = function() {

		
		// clears the variable if left blank
	    var table = $('#example').DataTable( {
	        "ajax": "data/dataList.json",
	        "bDestroy": true,
	        "iDisplayLength": 15,
	        "columns": [
	            {
	                "class":          'details-control',
	                "orderable":      false,
	                "data":           null,
	                "defaultContent": ''
	            },
	            { "data": "name" },
	            { "data": "est" },
	            { "data": "contacts" },
	            { "data": "status" },
	            { "data": "target-actual" },
	            { "data": "starts" },
	            { "data": "ends" },
	            { "data": "tracker" },
	        ],
	        "order": [[1, 'asc']],
	        "fnDrawCallback": function( oSettings ) {
		       runAllCharts()
		    }
	    } );


	     
	    // Add event listener for opening and closing details
	    $('#example tbody').on('click', 'td.details-control', function () {
	        var tr = $(this).closest('tr');
	        var row = table.row( tr );
	 
	        if ( row.child.isShown() ) {
	            // This row is already open - close it
	            row.child.hide();
	            tr.removeClass('shown');
	        }
	        else {
	            // Open this row
	            row.child( format(row.data()) ).show();
	            tr.addClass('shown');
	        }
	    });

	};
	
	


<?php
if($_SESSION['fasklog']['iduser']==31){
 }else { ?>

    <div class="row">
    
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center error-box">
                        <h1 class="error-text tada animated"><i class="fa fa-times-circle text-danger error-icon-shadow"></i> En Desarrollo...</h1>
                        <h2 class="font-xl"><strong>Oooops, Módulo en desarrollo!</strong></h2>
                        <br />
                        <p class="lead semi-bold">
                            <strong>Ha experimentado un error técnico. Pedimos disculpas.</strong><br><br>
                            <small>
                                Estamos trabajando arduamente para corregir este problema. Estaremos informado para que vuelva a intentar la búsqueda.
                            </small>
                        </p>
                       
                    </div>
    
                </div>
    
            </div>
    
        </div>
        
    </div>


<?php } ?>
