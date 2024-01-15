<?php session_start();
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();
    $exc = $class->verifica($dt);
    if ($exc[0]['can']==0) {
        ?>
          <center><i>No Existe una caja creada, Click <a onclick="vAjax('caja','mod6',1,'modal1');" href="javascript:void(0);">Aqui</a> para crear.</i></center>
          <script>vAjax('caja','mod6',1,'modal1');</script>
        <?php
    }else{

       ?>   
          <div id="div-dtvs"></div>
       		<input type="hidden" id="idcaja" value="<?php echo $exc[0]['can'] ?>">
       		<div class="col-md-12" style="padding: 19px">
       			  <legend>&nbsp;&nbsp; <i class="fa fa-money"></i> <b>MOVIMIENTOS DE CAJA</b> </legend>
       		</div>
          <form id="frm3">
              <input type="hidden" name="id" value="<?php echo $exc[0]['can'] ?>">
              <div class="col-md-2">
                <label><b>Inicio</b></label>
                    <input type="date" class="form-control input-xs" name="inicio" value="<?php echo date('Y-m-d', strtotime($exc[0]['ca_fecha'])) ?>" onchange="sel002();vAjax('caja','tbl1','frm3','tbl1')" id="minicio">
              </div>
              <div class="col-md-2">
                <label><b>Fin</b></label>
                    <input type="date" class="form-control input-xs" name="fin" onchange="vAjax('caja','tbl1','frm3','tbl1')" value="<?php echo date('Y-m-t') ?>">
              </div>

              <div class="col-md-2">
                  <label><b>Movimientos</b></label>
                  <select class="form-control input-xs" name="tipo" id="idttp" onchange="sel001();vAjax('caja','tbl1','frm3','tbl1');">
                      <option value="0">-- todos</option>
                      <option value="1">Ingresos</option>
                      <option value="2">Egresos</option>
                  </select>
              </div>
              <div class="col-md-2">
                  <label><b>Nomenclaturas</b></label>
                  <select class="form-control input-xs asdd" name="nomen" onchange="vAjax('caja','tbl1','frm3','tbl1')">
                      <option value="0">-- todas</option>
                      <?php 
                          $class2 = new Mod();
                          $ts1 = $class2->sel1($dt);
                          foreach ($ts1 as $dta): 
                              ?>
                                  <option value="<?php echo $dta[idnomenclatura] ?>"><?php echo $dta[no_nombre] ?></option>
                              <?php
                          endforeach; 
                      ?>
                  </select>
              </div>
              
              <div class="col-md-2">
                  <label><b>Estados</b></label>
                  <select class="form-control input-xs asdd" name="estado" onchange="vAjax('caja','tbl1','frm3','tbl1')">
                      <option value="0">-- todos</option>
                      <option value="1">Por rendir</option>
                      <option value="2">Rendido</option>
                  </select>
              </div>
              
              <div class="col-md-2" style="text-align: center;">
                <label><br></label>
                  <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="vAjax('caja','mod2',<?php echo $exc[0]['can'] ?>,'modal1');" style="width: 100%"><i class="fa fa-minus"></i> <b>EGRESO </b></a><br><br>
              </div>
                  <div class="col-md-12"><br></div>
              </form>
       		<script>vAjax('caja','res','frm3','dtvs');</script>
       		
    			<div class="col-md-12">
      				<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
      					  <header>
      				        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-book"></i> </span>
      				        <h2>Detalle</h2>
      				        <div class="widget-toolbar hidden-mobile" role="menu">
        				        	<div id="buttons1">
        				        		  <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        				        	</div>
      				        </div>
      				    </header>
      				    <div>
      				        <div class="jarviswidget-editbox"></div>
      				        <div class="widget-body no-padding" id="div-tbl1"><script>vAjax('caja','tbl1','frm3','tbl1');</script></div>
      				    </div>
      				</div>
          </div>
        <?php
    }
?>
<script>
    function sel001(){
      if ($('#idttp').val()==1) {
        $(".asdd").val("0").prop('disabled',true);
      }else{
        $(".asdd").prop('disabled',false);
       
    }
      }
      function sel002(){
        if ($('#id_fech').val()>$('#minicio').val()) {
            aviso('success','La fecha de inicio no puede ser menor que la fecha de creacion de la caja.');
            $('#minicio').val($('#id_fech').val())
        }
    }
</script>
