'use strict';
angular.module('byproyet', ['ngRoute']);
angular.module('byproyet').config(['$routeProvider',
    function config($routeProvider) {
      $routeProvider.
        when('/inicio', {
          templateUrl: 'app/modules/home/inicio.php',
        }).// MODULO DE VENTAS ---------------------------------------------------->
        when('/ventas/orden/', {
          templateUrl: 'app/modules/orden/inicio.php',
          controller: "appCtrl"
        }).// MODULO FASKESS EXPRESS MODULE ---------------------------------------------------->
        when('/procesos/pro_recojo/', {
          templateUrl: 'app/modules/pro_recojo/inicio.php',
          controller: "appCtrl"
        }).
        when('/procesos/exp_atencion/', {
          templateUrl: 'app/modules/exp_atencion/inicio.php',
          controller: "appCtrl"
        }).
        when('/procesos/pro_masivo/', {
          templateUrl: 'app/modules/pro_masivo/inicio.php',
          controller: "appCtrl"
        }).
        when('/procesos/pro_carga/', {
          templateUrl: 'app/modules/pro_carga/inicio.php',
          controller: "appCtrl"
        }).
        when('/procesos/pro_impresion/', {
          templateUrl: 'app/modules/pro_impresion/inicio.php',
          controller: "appCtrl"
        }).
        when('/procesos/exp_salidaruta/', {
          templateUrl: 'app/modules/exp_salidaruta/inicio.php',
          controller: "appCtrl"
        }).
        when('/procesos/exp_descargop/', {
          templateUrl: 'app/modules/exp_descargop/inicio.php',
          controller: "appCtrl"
        }).
        when('/procesos/exp_descargom/', {
          templateUrl: 'app/modules/exp_descargom/inicio.php',
          controller: "appCtrl"
        }).


        //PERSONAL 
         when('/personal/recojo/', {
          templateUrl: 'app/modules/personal/inicio.php',
          controller: "appCtrl"
        }).
          when('/personal/entrega/', {
          templateUrl: 'app/modules/personal/inicio2.php',
          controller: "appCtrl"
        }).          
           // FIN PERSONAL
        when('/ventas/guias_remision/', {
          templateUrl: 'app/modules/guias_remision/inicio.php',
          controller: "appCtrl"
        }).
        when('/ventas/manifiestos/', {
          templateUrl: 'app/modules/manifiestos/inicio.php',
          controller: "appCtrl"
        }).
        when('/ventas/facturacion/', {
          templateUrl: 'app/modules/facturacion/inicio.php',
          controller: "appCtrl"
        }).
        when('/ventas/facturacion-ps/', {
          templateUrl: 'app/modules/facturacion-ps/inicio.php',
          controller: "appCtrl"
        }).
        when('/ventas/cotizacion/', {
          templateUrl: 'app/modules/cotizacion/inicio.php',
          controller: "appCtrl"
        }).
        when('/ventas/caja/', {
          templateUrl: 'app/modules/caja/inicio.php',
          controller: "appCtrl"
        }).
        when('/personal/contratos/', {
          templateUrl: 'app/modules/contratos/inicio.php',
          controller: "appCtrl"
        }).
        when('/ventas/traking/', {
          templateUrl: 'app/modules/traking/inicio.php',
          controller: "appCtrl"
        }).// MODULO DE LOGISTICA ------------------------------------------------->
        when('/ventas/clientes-listar/', {
          templateUrl: 'app/modules/clientes/inicio.php',
          controller: "appCtrl"
        }).
        when('/logistica/proveedores/', {
          templateUrl: 'app/modules/proveedores/inicio.php',
          controller: "appCtrl"
        }).
        when('/logistica/compras/', {
          templateUrl: 'app/modules/compras/inicio.php',
          controller: "appCtrl"
        }).
        when('/logistica/productos-categorias/', {
          templateUrl: 'app/modules/productos-categorias/inicio.php',
          controller: "appCtrl"
        }).
        when('/logistica/vehiculos/', {
          templateUrl: 'app/modules/vehiculos/inicio.php',
          controller: "appCtrl"
        }).
        when('/logistica/productos/', {
          templateUrl: 'app/modules/productos/inicio.php',
          controller: "appCtrl"
        }).
        when('/logistica/servicios/', {
          templateUrl: 'app/modules/servicios/inicio.php',
          controller: "appCtrl"
        }).
        when('/productos/productos-categorias/', {
          templateUrl: 'app/modules/productos-categorias/inicio.php',
          controller: "appCtrl"
        }).// MODULO DE PERSONAL -------------------------------------------------->
        when('/personal/personal-cargos/', {
          templateUrl: 'app/modules/personal-cargos/inicio.php',
          controller: "appCtrl"
        }).when('/personal/personal_contratos/', {
          templateUrl: 'app/modules/personal_contratos/inicio.php',
          controller: "appCtrl"
        }).when('/personal/personal_ingreso/', {
          templateUrl: 'app/modules/personal_ingreso/inicio.php',
          controller: "appCtrl"
        }).// MODULO DE OPERACIONES ----------------------------------------------->
        when('/operaciones/rutas/', {
          templateUrl: 'app/modules/rutas/inicio.php',
          controller: "appCtrl"
        }).
        when('/operaciones/mensajero/', {
          templateUrl: 'app/modules/mensajero/inicio.php',
          controller: "appCtrl"
        }).
        when('/operaciones/apoyo_postal/', {
          templateUrl: 'app/modules/apoyo_postal/inicio.php',
          controller: "appCtrl"
        }).
        when('/operaciones/despacho/', {
          templateUrl: 'app/modules/despacho/inicio.php',
          controller: "appCtrl"
        }).
        when('/operaciones/cargo/', {
          templateUrl: 'app/modules/cargo/inicio.php',
          controller: "appCtrl"
        }).
        when('/operaciones/control/', {
          templateUrl: 'app/modules/control/inicio.php',
          controller: "appCtrl"
        }).

        when('/personal/personal-listar/', {
          templateUrl: 'app/modules/personal-listar/inicio.php',
          controller: "appCtrl"
        }).
        // MODULO DE FINANZAS ---------------------------------------------------->
        when('/finanzas/caja/', {
          templateUrl: 'app/modules/caja/inicio.php',
          controller: "appCtrl"
        }).
        when('/finanzas/finanzas_conf/', {
          templateUrl: 'app/modules/finanzas_conf/inicio.php',
          controller: "appCtrl"
        }).
        when('/finanzas/facturacion/', {
          templateUrl: 'app/modules/facturacion/inicio.php',
          controller: "appCtrl"
        }).
        when('/finanzas/notas/', {
          templateUrl: 'app/modules/notas/inicio.php',
          controller: "appCtrl"
        }).// MODULO DE GERENCIA ------------------------------------------------>
        when('/gerencia/caja_general/', {
          templateUrl: 'app/modules/caja_general/inicio.php',
          controller: "appCtrl"
        }).// MODULO DE REPORTES ------------------------------------------------>
        when('/reportes/reportes-ventas/', {
          templateUrl: 'app/modules/reportes-ventas/inicio.php',
          controller: "appCtrl"
        }).
        when('/reportes/reportes-anulaciones/', {
          templateUrl: 'app/modules/reportes-anulaciones/inicio.php',
          controller: "appCtrl"
        }).
        when('/reportes/reportes-cotizaciones/', {
          templateUrl: 'app/modules/reportes-cotizaciones/inicio.php',
          controller: "appCtrl"
        }).
        when('/reportes/reportes-caja/', {
          templateUrl: 'app/modules/reportes-caja/inicio.php',
          controller: "appCtrl"
        }).
        when('/reportes/reportes-guias/', {
          templateUrl: 'app/modules/reportes-guias/inicio.php',
          controller: "appCtrl"
        }).
        when('/reportes/reportes-pendientes/', {
          templateUrl: 'app/modules/reportes-pendientes/inicio.php',
          controller: "appCtrl"
        }).// MODULO DE CONFIGURACION ------------------------------------------->
        when('/configuracion/configuracion-usuarios/', {
          templateUrl: 'app/modules/configuracion-usuarios/inicio.php',
          controller: "appCtrl"
        }).
        when('/configuracion/configuracion-general/', {
          templateUrl: 'app/modules/configuracion-general/inicio.php',
          controller: "appCtrl"
        }).
        when('/configuracion/viajes/', {
          templateUrl: 'app/modules/viajes/inicio.php',
          controller: "appCtrl"
        }).
        when('/configuracion/configuracion-calculadora_de_precios/', {
          templateUrl: 'app/modules/configuracion-calculadora_de_precios/inicio.php',
          controller: "appCtrl"
        }).
        when('/configuracion/configuracion-cotizacion/', {
          templateUrl: 'app/modules/configuracion-cotizacion/inicio.php',
          controller: "appCtrl"
        }).
        otherwise('/inicio');
    }
  ]).controller("appCtrl", function($scope,$location){
        var link = $location.absUrl().split('#!')[1].split('/');
        $('#hf_1').html(link[1]);
        $('#hf_2').html(link[2].split('-')[1]);
        $('.menu').removeClass('active open');

        $('.pp'+link[1]).hide();
        $('.vvv').remove('active open');
        $('.v'+link[2]).addClass('active');
        if (link[2]) {
            $('.v'+link[1]).addClass('open active');
        }else{
            $('.v'+link[1]).addClass('active');
        }
        $('.pp'+link[1]).show();
        $('#div-modal1,#div-modal2,#div-modal3,#div-modal4,#div-modal5').empty();
        if (!$("#"+link[2])[0]) {
          location.href ="http://sistemas.faskex.com/";
        }
  });
function frmT(id){
  if (isNaN(id)) {
    if (id.indexOf('-/') != -1) {
      return id;
    }else{
        var data = { };
        $.each($('#'+id).serializeArray(), function() {
            data[this.name] = this.value;
        });
        return data;
    }
  }else{
    return id;
  }
}
function logout(nom){
    $.SmartMessageBox({
        title : "<span class='MsgTitle'><i class='fa fa-sign-out txt-color-orangeDark'></i><span class='txt-color-orangeDark'><strong> "+nom+"</strong></span>, ¿Deseas cerrar sesión?</span>",
        content : "Puede mejorar aún más la seguridad después de cerrar la sesión, cerrando el sistema.",
        buttons : '[No][Si]'
    }, function(ButtonPressed) {
      if (ButtonPressed === "Si") {
          vAjax('home','salir',0)
      }
      if (ButtonPressed === "No") {
          $.smallBox({
              title : "Acción Cancelada!",
              content : "<i class='fa fa-clock-o'></i> <i>Se ha cancelado el cierre de sesión.</i>",
              color : "#C46A69",
              iconSmall : "fa fa-times fa-2x fadeInRight animated",
              timeout : 4000
          });
      }
    });
}
function confir(tit,det,nom,fun,id,ic){
    $('#divSmallBoxes').empty();
    $.smallBox({
        title : tit,
        content : det+" <p class='text-align-right'><a onclick='vAjax("+'"'+nom+'"'+","+'"'+fun+'"'+","+'"'+id+'"'+","+'"alerta"'+")' class='btn btn-primary btn-sm'>SI</a> <a onclick='$("+'".danger"'+").removeClass("+'"danger"'+");' class='btn btn-danger btn-sm'>NO</a></p>",
        color : "#296191",
        timeout: 16000,
        icon : "fa fa-"+ic+" swing animated"
    });
}
function vAjax(nom,fun,frm,div='alerta'){
    if (div=='modal1') {$('#myModal1').modal('show');}
    if (div=='modal2') {$('#myModal2').modal('show');}
    if (div=='modal3') {$('#myModal3').modal('show');}
    if (div=='modal4') {$('#myModal4').modal('show');}
    if (div=='modal5') {$('#myModal5').modal('show');}
    $('#div-'+div).html('<div class="modal-body"><center><img src="app/recursos/img/loa.gif" style="width: 70px;"></center></div>').load('vajax.php',{nom,fun,data:frmT(frm)});
    return false;
}
function sel2(id,tip=0){
    if (!tip) {
        $("#"+id).select2({width: '100%'});

    }else{
        $("#"+id).select2({dropdownParent: $('#myModal'+tip), width: '100%'});
        
    }
}
function aviso(tip,msje){
    $('#divSmallBoxes').empty();
    switch (tip){case 'info': tip="#296191";break;case 'danger': tip="#C46A69";break;case 'warning': tip="#9b711a";break; case 'success': tip="#739e73";break;}
    $.smallBox({
        title : msje,
        content : "<i class='fa fa-clock-o'></i> <i>2 seconds desaparecera...</i>",
        color : tip,
        iconSmall : "fa fa-thumbs-up bounce animated",
        timeout : 2000
    });
}
function table(id,max=0,ord=0,searc='',tarr){
    tarr=tarr || [];
    var responsiveHelper_datatable_col_reorder = undefined;
    var breakpointDefinition = { tablet : 1024, esconder : 480 };
    $('#dtable'+id).dataTable({
        "columnDefs": [
            {
                "targets": tarr,
                "visible": false,
                "searchable": false
            }
        ],
        "pageLength": max,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
            { "extend": 'copy', "text":'Copiar',"className": 'btn btn-default btn-xs',exportOptions: {
                    columns: [ 0, ':visible' ]}},
            { "extend": 'excel', "text":'Excel',"className": 'btn btn-default btn-xs',exportOptions: {
                    columns: [ 0, ':visible' ]} },
            { "extend": 'print', "text":'Imprimir',"className": 'btn btn-default btn-xs',exportOptions: {
                    columns: [ 0, ':visible' ]} },
        ],
        "oLanguage": {
            "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>',
            "sInfo": "Viendo <b>_END_</b> registros (del _START_ al _END_ ( _TOTAL_ total.)",
            "sZeroRecords": "No hay datos para mostrar :(",
            "sLengthMenu": "<b>Viendo</b> _MENU_ <b>por página</b>",
            "sInfoFiltered": " - Filtrado de _MAX_ registros)",
            "oPaginate": {                       
              "sNext": '<b>Siguiente</b>',
              "sPrevious": '<b>Atrás</b>'
            },
            buttons: {
              copy: 'Copiar',print:'imprimir',
            }
        }, 
        "order": [[ ord, "desc" ]],
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-4'f><'col-sm-4 text-align-right'><'col-sm-4 col-xs-4 hidden-xs'l>r>"+
        "t"+
        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",    

        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_datatable_col_reorder) {
            responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#dtable'+id), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_datatable_col_reorder.respond();
        }     
      });
      var table = $('#dtable'+id).DataTable();
      table.search(searc).draw();
      var buttons = new $.fn.dataTable.Buttons(table, {buttons: [
          { "extend": 'copy','className': 'bttn_copy', "text":'Copiar',exportOptions: {
             columns: [ 0, ':visible' ]}},
          { "extend": 'excel','className': 'bttn_copy', "text":'Excel',exportOptions: {
             columns: [ 0, ':visible' ]} },
          { "extend": 'print','className': 'bttn_copy', "text":'Imprimir',exportOptions: {
              columns: [ 0, ':visible' ]} }
      ]
    }).container().appendTo($('#buttons'+id).empty());
}
function vUltf(){
  var det='';
    $.ajax({
        url: "app/modules/facturacion/components/data.php?t=9",
        dataType: 'json', //tipo de datos retornados
        type: 'post' //enviar variables como post
    }).done(function (data){
        $.each($.parseJSON(JSON.stringify(data)), function(){ 
          det+='<li class="divider"></li><li><a href="javascript:void(0);"  onclick ="vAjax(\'facturacion\',\'mod1\',\'0-/'+this['id']+' \',\'modal1\');"><i class="fa '+this['icon']+' fa-1x"></i> '+this['value']+'</a></li>';
        }); $("#ultifact").html(det+'<li class="divider"></li><li><a><i class="fa fa-power-off"></i> CERRAR</a></li>');
    }).fail(function(){
        $('#ultifact').html('<li><a><i>No hay comprobantes emitidos</i></a></li><li class="divider"></li><li><a><i href="javascript:void(0);"  class="fa fa-power-off"></i> CERRAR</a></li>');
    });
}
function tver(tble,atrib){
    var table = $('#dtable'+tble).DataTable();
    var column = table.column(atrib);
    column.visible( ! column.visible() );
}