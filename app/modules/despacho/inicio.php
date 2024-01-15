<?php 
    include '../../recursos/db.class.php';
    include '.Model.php';
    $class = new Mod();
 
?>      
<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm1">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-10">
                    <div class="col-md-2">
                        <select class="form-control" onchange="vops()" id="idtin" name="repo">
                            <option value="1">Diario</option>
                            <option value="2" selected="">Mensual</option>
                            <option value="3">Anual</option>
                            <option value="4">Rango</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="tipo" onchange="vAjax('despacho','tabla1','frm1','tbl1')">
                            <option value="0">Todos --</option>
                            <?php 
                                date_default_timezone_set('America/Lima');
                                $dias = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
                                $mes = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
                            ?>
                        </select>
                    </div>
                    <script>
                        function vops(){
                            $('.vops').hide();
                            if($('#idtin').val()==1){
                                $('#rr_dia').show();$('#rr_mes').show();$('#rr_anio').show();
                            }else if($('#idtin').val()==2){
                                $('#rr_mes').show();$('#rr_anio').show();
                            }else if($('#idtin').val()==3){
                                $('#rr_anio').show();
                            }else if($('#idtin').val()==4){
                                $('#rr_in').show();$('#rr_fn').show();
                            }
                        }
                    </script>
                    <div class="col-md-2 vops" id="rr_dia" style="display: none">
                        <select class="form-control" onchange="vAjax('despacho','tabla1','frm1','tbl1')" name="dia">
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
                    <div class="col-md-2 vops" id="rr_mes">
                        <select class="form-control" onchange="vAjax('despacho','tabla1','frm1','tbl1')" name="mes">
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
                    <div class="col-md-2 vops" id="rr_anio">
                        <select class="form-control" onchange="vAjax('despacho','tabla1','frm1','tbl1')" name="anio">
                            <option value="2020">2020</option>
                            <option value="2021" selected>2021</option>
                            <option value="2022" selected>2022</option>
                        </select>
                    </div>
                    <div class="vops" id="rr_in" style="display: none">
                        <div class="col-md-1" style="margin-top: 6px; text-align: right;"><b>INICIO:</b></div>
                        <div class="col-md-3 ">
                            <input type="date" class="form-control" value="<?php echo date('Y-m').'-01'; ?>" name="inicio" onchange="vAjax('despacho','tabla1','frm1','tbl1');">
                        </div>
                    </div>
                    <div class="vops" id="rr_fn" style="display: none">
                        <div class="col-md-1" style="margin-top: 6px; text-align: right;"><b>FIN:</b></div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" value="<?php echo date('Y-m-t') ?>" name="fin" onchange="vAjax('despacho','tabla1','frm1','tbl1');">
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-2" style="text-align: right;">
                    <div class="btn-group">
                        <a class="btn btn-labeled btn-primary" onclick="vAjax('despacho','tabla1','frm1','tbl1')"> <span class="btn-label"><i class="fa fa-search"></i></span><b>Buscar</b>&nbsp;&nbsp;</a>
                    </div>
                </div>
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-12" style="text-align: center;">
                    <hr>
                                
                    <button class="btn btn-labeled btn-primary" type="button" onclick="vAjax('despacho','mRut',0,'modal3');"> <span class="btn-label"><i class="fa fa-plus"></i></span><b>Nuevo Despacho</b>&nbsp;&nbsp;</button>                                                
                                                   
                </div>
                
            </div><br>
        </form>
    </div>
</div>

<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
    <header>
        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-copy"></i></span>
        <h2>Despacho</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
            <div id="buttons1">
                <button class="dt-button buttons-copy buttons-html5 bttn_copy" onclick="vAjax('despacho','tabla1',0,'tbl1')" tabindex="0" aria-controls="dtable1" type="button"><span>Refrescar</span></button>
            </div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
 
        <div class="widget-body no-padding" id="div-tbl1"><script>vAjax('despacho','tabla1','frm1','tbl1');</script></div>
    </div>
</div>

