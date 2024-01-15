<?php date_default_timezone_set('America/Lima'); ?>
<div class="tabbable tabs-below">
    <div class="tab-content padding-10">
        <div class="col-md-12 row">
            <div class="page">
                <section id="widget-grid" class="">
                    <div class="widget-body" id="tanq_conf-r1">
                            <div class="col-md-7">
                                <div class="panel panel-primary">
                                  <div class="panel-heading">CLIENTE</div>
                                  <div class="panel-body">
                                    <form action="javascript: FFacGuias(3);" id="frm1_CP">
                                        <div class="form-group">
                                          <div class="col-md-12">
                                            <div class="input-group">
                                              <span class="input-group-addon">RUC / DNI: </span>
                                              <input id="ruc_cp" name="ruc_cp" class="form-control" placeholder="" type="text" required="">
                                              <span class="input-group-btn"><button class="btn btn-default"><i class="glyphicon glyphicon-filter"></i></button></span>
                                            </div>
                                          </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                          <div class="col-md-12">
                                            <div class="input-group">
                                              <span class="input-group-addon">Razón Social: </span>
                                              <input id="rs_cp" name="rs_cp" class="form-control" placeholder="" type="text" disabled="">
                                            </div>
                                          </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div  id="div-detCPrin">
                                        </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="panel panel-success">
                                  <div class="panel-heading">Despachos</div>
                                  <div class="panel-body">
                                    <form action="javascript: vAjax('guia_varias','savFac','frm2_CP');" id="frm2_CP" class="row">
                                        <div class="form-group" style="display: none;">
                                          <label class="col-md-6" style="margin-top: 8px;">Fecha: </label>
                                          <div class="col-md-6">
                                            <input type="date" name="fec_val" id="fec_val" class="form-control" value="<?php echo date("Y-m-d");?>">
                                          </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                          <div class="col-md-7">
                                            <div class="input-group">
                                                <input type="hidden" id="idClientCP" name="idClientCP">
                                                <select class="form-control" id="td_CP" name="td_CP" onchange="nSerie();">
                                                    <option value="1">01 | Orden de servicio</option>
                                                    <option value="1">02 | Factura Electrónica</option>
                                                    <option value="2">03 | Boleta Electrónica</option>
                                                </select>
                                            </div>
                                          </div>
                                          <input type="hidden" id="serie_oculta" name="">
                                          <div class="col-md-5">
                                            <div class="input-group">
                                              <span class="input-group-addon" id="s_cp">F003 </span>
                                              <input id="ns_cp" name="ns_cp" class="form-control" placeholder="" type="text" readonly="">
                                            </div>
                                          </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                          <div class="col-md-12">
                                            <div class="input-group">
                                              <span class="input-group-addon">Responsable</span>
                                              <input id="placas_vales" name="placas_vales" class="form-control"  type="text" >
                                            </div>
                                          </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="col-md-12" id="div-Detalle_">
                                        </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                                    
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    vAjax('guia_varias','valesCliente',0,'detCPrins');
    vAjax('guia_varias','valesClienteFac',0,'Detalle_v');
    setTimeout(function(){
      nSerie();
    },200);
    function nSerie(){
      $.getJSON(_mod+'facturacion/data.php?t=2&doc='+$("#td_CP").val(),function(data){
        $.each(data, function(id,value){
          $("#s_cp").text(this['value']);
          $("#serie_oculta").val(this['value']);
        });
        setTimeout(function(){
          aVentas(4);
        },300);
      });
    }
    function FFacGuias(dt){
      switch(dt){
          case 0:
              $("#nomClient").val('');
              $("#idClient").val('0');
              $("#idDir").empty();
              $("#idCorr").empty();
              $("#div-modal").empty();
              $(".btnm").prop( "disabled", true );
              dni=$("#numDni").val();
              if (dni=='') {
                  sAlert('warning','ingrese un numero valido!','Info!');$("#numDni").css('background-color','#b94a48').css('color','white');
                  $("#nomClient").val("");
                  $("#v_Correo").val("");
                  $("#v_dir").val("");
                  $("#tp_3").attr("disabled","");$("#tp_credito").attr("style","display: none;");
                  $("#tdoc").val(1);
                  aVentas(2);
                  $("#tp_1").click();
                  setTimeout(function(){$("#numDni").focus();},200);

              }else{
                  $.getJSON(_mod+'facturacion/data.php?t=4&dni='+dni+'&tp='+$("#tip_pago").val() ,function(data){
                      $.each(data, function(value){
                              if (this['value']==1) {
                                  $('#myModal').modal('show');
                                  $("#div-modal").html('<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                      '<h4 class="modal-title" id="myModalLabel"><center><b>[ INFO! CLIENTE NO ENCONTRADO ]</b></center></h4></div><div class="modal-body"><div class="row">'+
                      '<div class="col-md-12"><div class="well well-sm well-primary"><form class="form form-inline" id="1_frmCorr" ><center>'+
                      '<h3>Cliente no registrado, ¿Deseas registrarlo?</h3><br><ul class="demo-btns"><li><a href="#" id="ssi" class="btn btn-info" onclick="FFacGuias(1)"> SI <i class="fa fa-check"></i></a>'+
                      '</li><li><a href="#" id="smart-mod-eg3" class="btn btn-danger" onclick="$(\'#myModal\').modal(\'hide\');$(\'#numDni\').select()"> NO <i class="fa fa-remove"></i></a></li></ul></center></form></div></div></div></div>');
                         $('#myModal').on('shown.bs.modal', function() {$('#ssi').focus();});
                         }else{
                              $(".btnm").prop( "disabled", false );
                              $("#nomClient").val(this['value']);
                              $("#v_Correo").val(this['corr']);
                              $("#v_dir").val(this['dir']);
                              if (this['cred']==1) {$("#tp_3").removeAttr("disabled");$("#tp_credito").removeAttr("style");$("#pprs").removeAttr('style');progress(this['linea'],this['consumido']);} else {$("#tp_3").attr("disabled","");$("#tp_credito").attr("style","display: none;");$("#pprs").attr("style","display: none;");if ($("#tip_pago").val()=="3") {$("#tp_1").click();}}
                              $("#idClient").val(this['id']);$("#numDni").css('background-color','#cde0c4').css('color','black');
                               FDir(0);FCorr(0);
                              if (dni.length==11) {$("#tdoc").val(1);}else if(dni.length==8){$("#tdoc").val(2);} else {$("#tdoc").val(2);}
                              setTimeout(function(){aVentas(2);FProd(4);},300);
                              if (parseFloat($("#total").val())>0) {$("#tp_"+$("#tip_pago").val()).click();} else {$("#cod_comb").select();}
                          }
                      }); 
                  });
              }
             
          break;
          case 1:
          $("#div-modal").html('<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title" id="myModalLabel"><center><b>NUEVO CLIENTE</b></center></h4></div>'+
              '<div class="modal-body"><div class="row"><div class="col-md-12"><div role="content"><div class="jarviswidget-editbox"></div><div class="widget-body"><form class="form-horizontal" action="javascript: " id="8_frmnC" method="post">'+
              '<fieldset><div class="form-group"><label class="col-md-2">DNI / RUC</label><div class="col-md-5"><div class="input-group input-group-md"><div class="icon-addon addon-md"><input placeholder="#" name="dni" id="Dnni" value="'+$('#numDni').val()+'" class="form-control bst" ondblclick="$(\'.bst\').prop( \'readonly\', false );$(\'#veri\').val(0)"><input type="hidden" value="0" id="veri" name="veri">'+
              '</div><span class="input-group-btn"><button class="btn btn-default" type="button" onclick="CSunat($(\'#Dnni\').val(),1);"><i class="glyphicon glyphicon-search"></i></button></span></div></div><div class="col-md-1"></div></div>'+
              '<div class="form-group"><label class="col-md-2">Nombres</label><div class="col-md-10"><input class="form-control bst" id="verNom" name="nom" placeholder="Empresa Ejemplo S.R.L">'+
              '</div></div><div class="form-group"><label class="col-md-2">Teléfonos</label><div class="col-md-10"><input class="form-control" id="verTell" name="tel" placeholder="999999999 - 999999999"></div></div><div class="form-group"><label class="col-md-2">'+
              'Correo</label><div class="col-md-10"><input class="form-control" name="corr" placeholder="ejemplo@dominio.com"></div></div><div class="form-group"><label class="col-md-2">Dirección</label><div class="col-md-10">'+
              '<textarea class="form-control" id="verDirr" name="dir" placeholder="Av. Ejemplo #99 Br Ejemplo" rows="4"></textarea></div></div></fieldset></form></div></div></div></div><div class="modal-footer"><button class="btn btn-default" onclick="$(\'#myModal\').modal(\'hide\');">'+
              'Cancel</button><button class="btn btn-primary" id="sprs" onclick="savPers();"><i class="fa fa-save"></i>Guardar</button></div></div>');
          $('#Dnni').select();
          break;
          case 2:
              var data=$("#cid").val()+"//"+$("#ccor").val();
              $('#div-alerta').load('index.php',{nom:'clientes_listar',fun:'upCorreo',data});

              var data=$("#cid").val()+"//"+$("#cdir").val();
              $('#div-alerta').load('index.php',{nom:'clientes_listar',fun:'upDir',data});
              vAjax('clientes_listar','upCliente','fmr_mcl');
          break;
          case 3:
              $("#rs_cp").val('');
              $("#idClientCP").val('0');
              $("#corr_cp").val('');
              dni=$("#ruc_cp").val();
              if (dni=='') {
                  sAlert('warning','ingrese un numero valido!','Info!');$("#ruc_cp").css('background-color','#b94a48').css('color','white');

              }else{
                  var cl;
                  $.getJSON(_mod+'facturacion/data.php?t=4&dni='+dni,function(data){
                      $.each(data, function(value){
                          if (this['value']=="1") {
                              $("#rs_cp").val('');
                              $("#idClientCP").val('0');
                              $("#corr_cp").val('');
                              sAlert('warning','Cliente no se encuentra registrado','Error!');

                          }else{
                              $("#rs_cp").val(this['value']);
                              $("#corr_cp").val(this['corr']);
                              $("#idClientCP").val(this['id']);
                              vAjax('guia_varias','valesCliente',this['id'],'detCPrins');
                              vAjax('guia_varias','valesClienteFac',this['id'],'Detalle_v');
                          }
                      }); 
                  });
              }
              break;
              case 4:
              $("#rs_cpt").val('');
              $("#idClientCPT").val('0');
              $("#corr_cpt").val('');
              dni=$("#ruc_cpt").val();
              if (dni=='') {
                  sAlert('warning','ingrese un numero valido!','Info!');$("#ruc_cpt").css('background-color','#b94a48').css('color','white');

              }else{
                  $.getJSON(_mod+'facturacion/data.php?t=4&dni='+dni,function(data){
                      $.each(data, function(value){
                          if (this['value']==1) {
                              $("#rs_cpt").val('');
                              $("#idClientCPT").val('0');
                              sAlert('warning','Cliente no se encuentra registrado','Error!');

                          }else{
                              $("#rs_cpt").val(this['value']);
                              $("#nom_cl").val(this['value']);
                              $("#idClientCPT").val(this['id']);
                              $("#nom_cl").attr('readonly','readonly');
                              $("#tdoc_T").val(dni.length);       
                              if (dni.length==8) {
                                  $("#td_CPT").val(2);
                              } else {
                                  $("#td_CPT").val(1);
                              } 
                              aVentas(5);
                          }
                      }); 
                  });
              }
             
          break;
      }
  }
</script>
