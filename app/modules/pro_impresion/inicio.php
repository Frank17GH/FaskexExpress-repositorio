<?php 
session_start();
?>

<div class="panel panel-default">
  <div class="panel-body" style="padding-bottom: 0px; padding-top: 5px;">

<!-- HEADER -->
  <legend>
    <div class="form-group" style="margin-bottom: 50px">
      <div class="col-md-4">
        &nbsp;&nbsp; <i class="fa fa-pencil"></i> <b>IMPRESIONES</b>
      </div>
      <div class="col-md-8" id="view1" style="vertical-align: middle;text-align: left;">
      </div>
    </div>
  </legend>
<!-- FIN HEADER -->

<!-- BODY -->
  <form id="frm_apoyo" class="form-horizontal"> 
    <span id="optc" style="display:none;"></span>
    <div class="form-group">          
      
      <div class="col-md-2" >
        <b>Serie</b>               
        <div class="input-group">
          <span class="input-group-addon"></span>
            <select name="serie" id="view2" class="form-control input-sm" >
              <option value="" selected>Todas las series</option>
            </select>
        </div>      
      </div> 
              
      <div class="col-md-2" >
        <b>Correlativo</b>               
        <div class="input-group">
          <span class="input-group-addon">N°</span>
          <input type="text" style="text-align: right;"  name="orden" id="orden" onkeydown=" if(event.keyCode === 13){ Orden($(this).val(),$('#view2').val()); $('#numorden').val($(this).val());$('#contenedor').hide();$('#formato').val($('#formato option:first').val()); return false; }" placeholder="000000" class="form-control input-sm" >                
        </div>                
      </div> 

      <div class="col-md-3">
        <b>Cliente</b>
        <div class="form-group has-primary">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input name="nombre" id="cliente" type="text"  class="form-control input-sm" placeholder="Datos de Cliente" disabled>                
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <b>Servicios</b>
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
        <b>Fecha</b>
        <div class="form-group has-primary">
          <div class="col-md-12">
            <div class="input-group">                          
                  <input id="fecha"  type="text" class="form-control input-sm" disabled >
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-md-4">
          <div class="form-group has-primary">
              <div class="col-md-12">
                  <div class="input-group">
                      <span class="input-group-addon">.</span>
                      <select  class="form-control input-sm" id="formato"  onchange="tipoImpr($(this).val(),$('#numcot').val());$('#contenedor').show()">   
                          <option>[SELECCIONAR FORMATO]</option>
                          <option value="2">ETIQUETA 5 X 2.5 cm </option>                 
                          <option value="3">ETIQUETA 7.5 X 5 cm </option>                 
                          <option value="4">CARGOS A4 - 6 X Hoja (Horizontal)</option>
                      </select>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-sm-2">
          <div class="form-group">
              <div class="input-group">                                              
                  <span class="input-group-addon"><i class="fa fa-print fa-l fa-fw"></i></span>
                  <button class="btn dropdown-toggle btn-l btn-primary" type="button"  id="print" >Generar Impresion</button>
                
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
      <input type="text" name="idlocal" id="local" value="<?php echo $_SESSION['fasklog']['local_pre'] ?>">
    </div>  
  </form>    
<!-- END BODY -->
  </div>
</div>

<div class="col-sm-12">
  <div class="card-body" id="contenedor" style="display:;">
      <div id="display" >       
      </div>  
  </div>
</div>


<!-- SCRIPT -->
<script type="text/javascript">
    serie_doc($('#local').val());
    function tipoImpr(tipo,fbo){
        if(tipo==1){

            if (fbo!='0'){ 

                 $.ajax({
                    url:'app/modules/apoyo_postal/components/barcode.php',
                    method:"POST",
                    data:{type:$('#type').val(),id:$('#idorden').val()},
                    error:err=>{
                      console.log(err)
                    },
                    success:function(resp){
                      $('#display').html(resp)
                      $('#bcode-card .card-footer').show('slideUp')
                    }
                  })

            }else {
                $.ajax({
                    url:'app/modules/facturacion/components/barcode.php',
                    method:"POST",
                    data:{type:$('#type').val(),id:$('#idorden').val()},
                    error:err=>{
                      console.log(err)
                    },
                    success:function(resp){
                      $('#display').html(resp)
                      $('#bcode-card .card-footer').show('slideUp')
                    }
                  })
            }
         
    }else if(tipo==2){

        if (fbo!='0'){ 

             $.ajax({
        
            url:'app/modules/apoyo_postal/components/barcode2.php',
            method:"POST",
            data:{type:$('#type').val(),id:$('#idorden').val()},
                error:err=>{
                  console.log(err)
                },
                success:function(resp){
                  $('#display').html(resp)
                  $('#bcode-card .card-footer').show('slideUp')
                }
              })

        }else{

            $.ajax({
            url:'app/modules/facturacion/components/barcode2.php',
            method:"POST",
          data:{type:$('#type').val(),id:$('#idorden').val()},
            error:err=>{
              console.log(err)
            },
            success:function(resp){
              $('#display').html(resp)
              $('#bcode-card .card-footer').show('slideUp')
            }
          })

        }
        
    }else if(tipo==3){

        if (fbo!='0'){ 

         $.ajax({
        url:'app/modules/apoyo_postal/components/barcode3.php',
        method:"POST",
       data:{type:$('#type').val(),id:$('#idorden').val()},
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          $('#display').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
        }
      })

     }else {


         $.ajax({
            url:'app/modules/facturacion/components/barcode3.php',
            method:"POST",
          data:{type:$('#type').val(),id:$('#idorden').val()},
            error:err=>{
              console.log(err)
            },
            success:function(resp){
              $('#display').html(resp)
              $('#bcode-card .card-footer').show('slideUp')
            }
          })

         }

    }
    else if(tipo==4){

        if (fbo!='0'){ 
         $.ajax({
        url:'app/modules/apoyo_postal/components/cargo.php',
        method:"POST",
       data:{type:$('#type').val(),id:$('#idorden').val()},
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          $('#display').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
        }
      })

     }else {

        $.ajax({
            url:'app/modules/facturacion/components/cargo.php',
            method:"POST",
          data:{type:$('#type').val(),id:$('#idorden').val()},
            error:err=>{
              console.log(err)
            },
            success:function(resp){
              $('#display').html(resp)
              $('#bcode-card .card-footer').show('slideUp')
            }
          })

         }     
    }
}
    
    $('#print').click(function(){

    var openWindow = window.open("", "", "_blank");
      openWindow.document.write($('#display').parent().html());
      openWindow.document.write('<style>'+$('style').html()+'</style>');             
        openWindow.document.close();
      openWindow.focus();

   //  
                  
      setTimeout(function(){
       openWindow.print();
      },1000)
      setTimeout(function(){
      openWindow.close();
      },1000)
    })
</script>
<!-- END SCRIPT -->



