<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable2" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">Cod</th>
            <th data-class="expand">Descripcion</th>
            <th data-hide="esconder">Series</th>
            <th data-hide="esconder" style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>01</td>
            <td>Facturas</td>
            <td>
                <?php 
                    $class = new Mod();
                    $ser = $class->vser('01');
                    if($ser){
                        echo $ser[0]['series'];
                    }
                ?>
            </td>
            <td style="vertical-align: middle;">
                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                    <button class="btn btn-xs btn-default dropdown-toggle" onclick="vAjax('configuracion-general','mod3',1,'modal1')">
                        <i class="fa fa-edit fa-lg"></i> Editar Series
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>03</td>
            <td>Boletas</td>
            <td>
                <?php 
                    $class = new Mod();
                    $ser = $class->vser('03');
                    if($ser){
                        echo $ser[0]['series'];
                    }
                ?>
            </td>
            <td style="vertical-align: middle;">
                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                    <button class="btn btn-xs btn-default dropdown-toggle" onclick="vAjax('configuracion-general','mod3',3,'modal1')">
                        <i class="fa fa-edit fa-lg"></i> Editar Series
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>07</td>
            <td>Notas Crédito</td>
            <td>
                <?php 
                    $class = new Mod();
                    $ser = $class->vser('07');
                    if($ser){
                        echo $ser[0]['series'];
                    }
                ?>
            </td>
            <td style="vertical-align: middle;">
                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                    <button class="btn btn-xs btn-default dropdown-toggle" onclick="vAjax('configuracion-general','mod3',7,'modal1')">
                        <i class="fa fa-edit fa-lg"></i> Editar Series
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>08</td>
            <td>Notas de Débito</td>
            <td>
                <?php 
                    $class = new Mod();
                    $ser = $class->vser('08');
                    if($ser){
                        echo $ser[0]['series'];
                    }
                ?>
            </td>
            <td style="vertical-align: middle;">
                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                    <button class="btn btn-xs btn-default dropdown-toggle" onclick="vAjax('configuracion-general','mod3',8,'modal1')">
                        <i class="fa fa-edit fa-lg"></i> Editar Series
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>09</td>
            <td>Guía de Remisión</td>
            <td>
                <?php 
                    $class = new Mod();
                    $ser = $class->vser('09');
                    if($ser){
                        echo $ser[0]['series'];
                    }
                ?>
            </td>
            <td style="vertical-align: middle;">
                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                    <button class="btn btn-xs btn-default dropdown-toggle" onclick="vAjax('configuracion-general','mod3',9,'modal1')">
                        <i class="fa fa-edit fa-lg"></i> Editar Series
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>06</td>
            <td>Guía de Salida</td>
            <td>
                <?php 
                    $class = new Mod();
                    $ser = $class->vser('06');
                    if($ser){
                        echo $ser[0]['series'];
                    }
                ?>
            </td>
            <td style="vertical-align: middle;">
                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                    <button class="btn btn-xs btn-default dropdown-toggle" onclick="vAjax('configuracion-general','mod3',6,'modal1')">
                        <i class="fa fa-edit fa-lg"></i> Editar Series
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>99</td>
            <td>Orden de Servicio</td>
            <td>
                <?php 
                    $class = new Mod();
                    $ser = $class->vser('99');
                    if($ser){
                        echo $ser[0]['series'];
                    }
                ?>
            </td>
            <td style="vertical-align: middle;">
                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                    <button class="btn btn-xs btn-default dropdown-toggle" onclick="vAjax('configuracion-general','mod3',99,'modal1')">
                        <i class="fa fa-edit fa-lg"></i> Editar Series
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>04</td>
            <td>Cotizacion</td>
            <td>
                <?php 
                    $class = new Mod();
                    $ser = $class->vser('04');
                    if($ser){
                        echo $ser[0]['series'];
                    }
                ?>
            </td>
            <td style="vertical-align: middle;">
                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                    <button class="btn btn-xs btn-default dropdown-toggle" onclick="vAjax('configuracion-general','mod3',99,'modal1')">
                        <i class="fa fa-edit fa-lg"></i> Editar Series
                    </button>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<script type="text/javascript"> table(2,50,1); </script> 