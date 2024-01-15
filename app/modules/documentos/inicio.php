<div class="tabbable tabs-below">
    <div class="tab-content padding-10">
        <div class="row show-grid">
            <article class="col-sm-12 col-md-12 col-lg-4 sortable-grid ui-sortable">
                <div class="jarviswidget" id="wid-id-0">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-search"></i> </span>
                        <h2>Busqueda de Cajas</h2>
                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
                    </header>
                    <div role="content">
                        <div class="widget-body">
                            <form class="form-horizontal" id="verCajas">
                                <fieldset>
                                    <div class="col-md-6">
                                        <b>Desde</b>
                                        <input class="form-control input-sm" type="date" name="inicio" value="<?php echo ('Y-m-d') ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <b>Hasta</b>
                                        <input class="form-control input-sm" type="date" name="fin" value="<?php echo ('Y-m-d') ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-primary btn-sm" style="width:100%" onclick="vAjax('caja','newCaja',0,'modal')">Aperturar</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-primary btn-sm" style="width:100%" onclick="vAjax('caja','verCajas','verCajas','cajas')">Buscar</a>
                                    </div>
                                </fieldset>                
                            </form>
                        </div>
                    </div>
                </div>
            </article>
            <article class="col-sm-12 col-md-12 col-lg-8 sortable-grid ui-sortable">
                <div class="jarviswidget" id="wid-id-0">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-search"></i> </span>
                        <h2>Listado de Cajas</h2>
                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
                    </header>
                    <div role="content">
                        <div class="widget-body">
                            <form class="form-horizontal">
                                <fieldset>
                                    <div class="col-md-12" id="div-cajas">
                                            <script type="text/javascript">vAjax('caja','verCajas','verCajas','cajas');</script>
                                    </div>
                                </fieldset>                
                            </form>
                        </div>
                    </div>
                </div>
            </article>
            <div class="col-md-12" style="    margin-top: -30px;"><hr></div>
            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="div-detalleCaja">

            </article>
        </div>
    </div>
</div>
