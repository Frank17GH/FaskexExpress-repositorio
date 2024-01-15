<?php 
include "../../recursos/db.class.php";
                            include ".Model.php";
                            $class = new Mod();                                 
                             session_start(); 
 ?>
<div class="panel panel-default">
    <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
        <form class="form-horizontal" id="frm1">
            <div class="form-group" style="margin-bottom: 3px;">
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <select class="form-control" onchange="vops();vAjax('reportes-ventas','tabla1','frm1','tbl1')" id="idtin" name="repo">
                            <option value="1">Diario</option>
                            <option value="2">Mensual</option>
                            <option value="3">Anual</option>
                            <option value="4" selected="">Rango</option>
                        </select>
                    </div>
                
                    <?php 
                        $dias = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
                        $mes = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
                    ?>
                   
                    <div class="col-md-2 vops" id="rr_dia" style="display: none">
                        <select class="form-control" onchange="vAjax('reportes-ventas','tabla1','frm1','tbl1')" name="dia">
                            <?php 
                                for ($i=0; $i < 31; $i++) { 
                                    ?>
                                        <option value="<?php echo $dias[$i] ?>" 
                                            <?php if($dias[$i]==date(d)){echo 'selected';} ?>><?php echo $dias[$i] ?>
                                        </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 vops" id="rr_mes" style="display: none">
                        <select class="form-control" onchange="vAjax('reportes-ventas','tabla1','frm1','tbl1')" name="mes">
                            <?php 
                                for ($i=0; $i < 12; $i++) { 
                                    ?>
                                        <option value="<?php echo $i+1 ?>" 
                                            <?php if($i+1==intval(date(m))){echo 'selected';} ?>><?php echo $mes[$i] ?>
                                        </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 vops" id="rr_anio" style="display: none">
                        <select class="form-control" onchange="vAjax('reportes-ventas','tabla1','frm1','tbl1')" name="anio">
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
                    <div class="vops" id="rr_in" style="display: ">
                        <div class="col-md-1" style="margin-top: 6px; text-align: right;"><b>INICIO:</b></div>
                        <div class="col-md-3 ">
                            <input type="date" class="form-control" value="<?php echo date('Y-m').'-01'; ?>" name="inicio" onchange="vAjax('reportes-ventas','tabla1','frm1','tbl1');">
                        </div>
                    </div>
                    <div class="vops" id="rr_fn" style="display: ">
                        <div class="col-md-1" style="margin-top: 6px; text-align: right;"><b>FIN:</b></div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" value="<?php echo date('Y-m-t') ?>" name="fin" onchange="vAjax('reportes-ventas','tabla1','frm1','tbl1');">
                        </div>
                    </div>
                    
                </div>
          
                
                <div class="col-md-12"><hr></div>
                <div class="col-md-3"></div>
                <div class="col-md-2">
                    <select class="form-control" name="local" onchange="vAjax('reportes-ventas','tabla1','frm1','tbl1')">
                        <option value="0">--Todos --</option>
                        <?php                            

                            $dt1 = $class->select1();
                            foreach ($dt1 as $dta1):
                                ?>
                                    <option value="<?php echo $dta1['idgiros'] ?>" <?php echo ($dta1['idgiros']== $_SESSION[fasklog][idgiros] )?'selected':'' ?>><?php echo $dta1['gi_nombre'] ?></option>
                                <?php
                            endforeach; 
                        ?>
                    </select>
                </div>
                 <div class="col-md-4 " style="display: ">
                    <select class="form-control" onchange="vAjax('reportes-ventas','tabla1','frm1','tbl1')" name="user">
                        <?php 
                           
                            $dt2 = $class->select2();$id=0;
                            foreach ($dt2 as $dta2):

                                if ($dta2['tp']) {
                                    if (!$id) {
                                        $id=1;
                                        ?><option value="0" selected="">-- Todos</option><?php
                                    }
                                    ?>
                                        <option value="<?php echo $dta2['iduser'] ?>"><?php echo mb_strtoupper($dta2['pe_apellidos'].', '.$dta2['pe_nombres']) ?></option>
                                    <?php
                                }elseif($dta2['iduser']==$_SESSION[fasklog][iduser]){
                                    ?>
                                        <option value="<?php echo $dta2['iduser'] ?>"><?php echo mb_strtoupper($dta2['pe_apellidos'].', '.$dta2['pe_nombres']) ?></option>
                                    <?php
                                }
                                
                            endforeach;
                        ?>
                    </select>
                </div>
            </div><br>
        </form>
    </div>
</div>
<div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
	<header>
        <span class="widget-icon"> <i class="fa fa-lg fa-fw fa-bar-chart-o"></i></span>
        <h2>Reporte de Ventas Registradas</h2>
        <div class="widget-toolbar hidden-mobile" role="menu">
        	<div id="buttons1">
        		<button class="dt-button buttons-copy buttons-html5 bttn_copy" tabindex="0" aria-controls="dtable1" type="button"><span>Importar</span></button>
        	</div>
            
        </div>
    </header>
    <div>
        <div class="jarviswidget-editbox"></div>
        <div class="widget-body no-padding" id="div-tbl1"><script>vAjax('reportes-ventas','tabla1','frm1','tbl1');</script></div>
    </div>
</div>
<script type="text/javascript">
    function redirect_by_post(purl, pparameters, in_new_tab) {
        pparameters = (typeof pparameters == 'undefined') ? {} : pparameters;
        in_new_tab = (typeof in_new_tab == 'undefined') ? true : in_new_tab;
        var form = document.createElement("form");
        $(form).attr("id", "reg-form").attr("name", "reg-form").attr("action", purl).attr("method", "post").attr("enctype", "multipart/form-data");
        if (in_new_tab) {
            $(form).attr("target", "_blank");
        }
        $.each(pparameters, function(key) {
            $(form).append('<input type="text" name="' + key + '" value="' + this + '" />');
        });
        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);
        return false;
    }
    function desc(ab){
        redirect_by_post('http://cpe.faskex.com/libs/desc.php', {
            data: ab
        }, true);
    }
    function desc2(ab){
        redirect_by_post('http://cpe.faskex.com/libs/desc2.php', {
            data: ab
        }, true);
    }

    
</script>