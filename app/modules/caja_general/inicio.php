<?php 
    session_start();
    include '../../recursos/db.class.php';
    include '.Model.php';
?>
<div class="col-md-12" style="padding: 19px">
    <legend>&nbsp;&nbsp; <i class="fa fa-money"></i> <b>MOVIMIENTOS DE CAJA</b> </legend>
</div>
<div class="col-md-12">
    <form id="frm1">
        <div class="col-md-2"></div>
        
        <div class="col-md-2">
            <select class="form-control input-xs" name="tipo_fe" onchange="tipo_report($(this).val());vAjax('caja_general','tbl1','frm1','tbl1');vAjax('caja_general','tbl2','frm1','tbl2');">
                <option value="1">Dia</option>
                <option value="2">Mes</option>
                <option value="3">Año</option>
                <option value="4">Rango</option>
            </select>
        </div>
        <?php 
            $dia='';
            $dias=date('t');
            $mes = array('','ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SETIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE');
        ?>
        <div class="col-md-1 dia">
            <select class="form-control input-xs" name="dia" onchange="vAjax('caja_general','tbl1','frm1','tbl1');vAjax('caja_general','tbl2','frm1','tbl2');">
                <?php 
                  for ($i=1; $i <= $dias; $i++) { 
                      ?><option <?php echo ($i==date('d'))?'selected':'' ?>><?php echo $i; ?></option><?php
                  }
                ?>
            </select>
        </div>
        <div class="col-md-2 dia mes">
            <select class="form-control input-xs" name="mes" onchange="vAjax('caja_general','tbl1','frm1','tbl1');vAjax('caja_general','tbl2','frm1','tbl2');">
                <?php 
                  for ($i=1; $i <= 12; $i++) { 
                      ?><option value="<?php echo $i ?>" <?php echo ($i==date('m'))?'selected':'' ?>><?php echo $mes[$i]; ?></option><?php
                  }
                ?>
            </select>
        </div>
        <div class="col-md-2 dia mes anio">
            <select class="form-control input-xs" name="anio" onchange="vAjax('caja_general','tbl1','frm1','tbl1');vAjax('caja_general','tbl2','frm1','tbl2');">
                <?php 
                  for ($i=2020; $i <= 2025; $i++) { 
                      ?><option <?php echo ($i==date('Y'))?'selected':'' ?>><?php echo $i; ?></option><?php
                  }
                ?>
            </select>
        </div>
        <h6 class="col-md-1 dia dtrango" style="display: none; text-align: center;"><b>Inicio</b></h6>
        <div class="col-md-2 dia dtrango" style="display: none">
            
            <input type="date" class="form-control input-xs" name="inicio" value="<?php echo date('Y-m-01') ?>" onchange="vAjax('caja_general','tbl1','frm1','tbl1');" id="minicio">
        </div>
        <h6 class="col-md-1 dia dtrango" style="display: none"; text-align: center;><b>Fin</b></h6>
        <div class="col-md-2 dia dtrango" style="display: none">
            <input type="date" class="form-control input-xs" name="fin" onchange="vAjax('caja_general','tbl1','frm1','tbl1');" value="<?php echo date('Y-m-t') ?>">
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2" style="text-align: center;">
            <label><b>Movimientos</b></label>
            <select class="form-control input-xs" name="tipo" id="idttp" onchange="sel001();vAjax('caja_general','tbl1','frm1','tbl1');">
                <option value="0">-- todos</option>
                <option value="1">Ingresos</option>
                <option value="2">Egresos</option>
            </select>
        </div>
        <div class="col-md-2" style="text-align: center;">
            <label><b>Nomenclaturas</b></label>
            <select class="form-control input-xs asdd" name="nomen" onchange="vAjax('caja_general','tbl1','frm1','tbl1')">
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
        <div class="col-md-2" style="text-align: center;">
              <label><b>Estados</b></label>
              <select class="form-control input-xs asdd" name="estado" onchange="vAjax('caja_general','tbl1','frm1','tbl1')">
                  <option value="0">-- todos</option>
                  <option value="1">Por rendir</option>
                  <option value="2">Rendido</option>
              </select>
        </div>
        <div class="col-md-2" style="text-align: center;">
              <label><br></label>
              <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="vAjax('caja_general','mod2',0,'modal1');" style="width: 100%"><i class="fa fa-minus"></i> <b>EGRESO </b></a><br><br>
        </div>
        <div class="col-md-12"><br></div>
    </form>
</div>
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
      			<div class="widget-body no-padding" id="div-tbl1">
                <script>vAjax('caja_general','tbl1','frm1','tbl1');</script>
            </div>
      	</div>
    </div>
</div>
<div class="col-md-12">
    <div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
        <header>
            <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-book"></i> </span>
            <h2> Cajas </h2>
            <div class="widget-toolbar hidden-mobile" role="menu">
                <div id="buttons1">
                    <button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Refrescar</span></button>
                </div>
            </div>
        </header>
        <div>
            <div class="jarviswidget-editbox"></div>
            <div class="widget-body no-padding" id="div-tbl2">
                <script>vAjax('caja_general','tbl2','frm1','tbl2');</script>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
      function tipo_report(id){
          switch(id) {
              case '1':
                  $('.dia').show();$('.dtrango').hide();
                  break;
              case '2':
                  $('.dia').hide();$('.mes').show();
                  break;
              case '3':
                  $('.dia').hide();$('.anio').show();
                  break;
              case '4':
               $('.dia').hide();$('.dtrango').show();
                  break;
              
          }
      }
</script>