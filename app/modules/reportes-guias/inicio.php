<div class="tabbable tabs-below">
    <div class="tab-content padding-10">
        <div class="row show-grid">
            <div class="col-md-12">
                <section id="widget-grid" class="">
                    <div class="row">
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;">
                                    <br>
                                    <form class="form-horizontal" id="frm_repguia">
                                        <div class="form-group" style="margin-bottom: 3px;">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="sucursal">
                                                    <option value="0">Todos</option>
                                                    <?php 
                                                        foreach ($dt1 as $dta1) {
                                                            ?><option value="<?php echo $dta1['id'] ?>" <?php if($_SESSION['pan']['local_id']==$dta1['id']){echo 'selected';} ?>><?php echo $dta1['nombre'] ?></option><?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" onchange="vAjax('reportes-guias','tabla1','frm_repguia','listGuia')" name="f_r1" value="<?php echo date('Y-m-d') ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" onchange="vAjax('reportes-guias','tabla1','frm_repguia','listGuia')" name="f_r2" value="<?php echo date('Y-m-d') ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <a class="btn btn-primary btn-sm" style="width:100%" onclick="vAjax('reportes-guias','tabla1','frm_repguia','listGuia')">Buscar</a>
                                            </div>
                                        </div><br>
                                    </form>
                                </div>
                            </div>
                            <br>
                            
                        </div>
                            <div class="jarviswidget jarviswidget-color-blueDark" data-widget-editbutton="false">
                                <header>
                                    <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                                    <h2>Guías Filtradas</h2>
                                </header>
                                <div>
                                    <div class="widget-body no-padding" id="div-listGuia"></div>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
                <script type="text/javascript">
                    vAjax('reportes-guias','tabla1','frm_repguia','listGuia');
                </script>
            </div>
        </div>
    </div>
</div>