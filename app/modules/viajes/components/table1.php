<!--<input type="button" value="nombre" onclick="tver(1,1)">-->
<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-hide="esconder" style="width:5px">#</th>
            <th data-hide="esconder">Origen</th>
            <th data-hide="esconder">Destino</th>
            <th data-hide="esconder" style="width:5px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($dt1){
                $c = 1;
                foreach ($dt1 as $data): 
                    ?>
                        <tr>
                            <td style="vertical-align: middle;"><?php echo $c; ?></td>
                            <td>
                                <b><?php echo strtoupper(strtolower($data[direccion_origen])); ?></b>
                                <br>
                                <span class="label label-success">
                                    <?php echo $data[ubi_origen]; ?>
                                </span>
                            </td>
                            <td>
                                <b><?php echo strtoupper(strtolower($data[direccion_destino])); ?></b>
                                <br>
                                <span class="label label-success">
                                    <?php echo $data[ubi_destino]; ?>
                                </span>
                            </td>
                            <td style="vertical-align: middle;">
                                <div class="btn-group display-inline pull-right text-align-left hidden-tablet">
                                    <button class="btn btn-xs btn-default dropdown-toggle" onclick="vAjax('viajes','mod1',<?php echo $data[id]; ?>,'modal1')">
                                        <i class="fa fa-trash fa-lg"></i> Eliminar
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript"> table(1,50,1); </script> 
