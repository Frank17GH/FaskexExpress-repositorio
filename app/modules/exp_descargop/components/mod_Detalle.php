<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
    </button>
    <h5 class="modal-title" id="myModalLabel"><center><b>DETALLE DE ENTREGA</b></center></h5>
</div>
<?php foreach ($dt1 as $key => $data1): ?>
<div class="modal-body">
    <div class="well well-sm well-primary">
        <form class="smart-form"  id="f_viaj">              
            <fieldset>
                <div class="col-md-3">
                    <label class="label">
                        <?php 
                            switch ($data1[dd_estado]) {
                                case 0:
                                    ?><span class="label label-danger" style="font-size: 100%"><i class="fa fa-warning"></i> PENDIENTE</span><?php
                                    break;
                                case 2:
                                    ?><span class="label label-warning" onclick="vAjax('exp_descargop','mod_Detalle',<?php echo $dta1['iddet'] ?>,'modal3');" style="font-size: 100%">&nbsp;&nbsp;<i class="fa fa-road"></i> MOTIVADO&nbsp;&nbsp;</span><?php
                                    break;
                                case 1:
                                    ?><span class="label label-success" style="font-size: 100%"><i class="fa fa-check"></i> ENTREGADO</span><?php
                                    break;
                            }
                        ?>
                    </label>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md-4">
                    <label class="label"><b>MOTIVO: </b>
                        DIRECCION INCORRECTA
                    </label>
                </div>

                <div class="col-md-4">
                    <label class="label"><b>ENTREGA: </b> 
                        BAJO PUERTA
                    </label>
                </div>                          

                <div class="col-md-12"><br></div>

                <div class="col-md-8">

                    <label class="label"><b>OBSERVACIONES: </b> <?php echo $data1['dd_nota'] ?></label>

                </div>  
                <div class="col-md-4">

                    <label class="label"><b>FECHA ENTREGA: </b><?php echo $data1['dd_fecha'] ?> </label>

                </div>

            </fieldset>

        </form>
    </div>  

    <div class="well well-sm well-primary ">
        <fieldset>
            <div class="col-md-4">
                <div class="alert alert-default fade in">   
                    <img id="imgC" src="<?php echo $data1[dd_img1]; ?>" style="margin-top: 15px; width: 100%; height: 270px;">
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="alert alert-default fade in">   
                    <img id="imgC" src="<?php echo $data1[dd_img2]; ?>" style="margin-top: 15px; width: 100%; height: 270px;">
                </div>
            </div>

            <div class="col-md-4">
                <div class="alert alert-default fade in">   
                    <img id="imgC" src="<?php echo $data1[dd_img3]; ?>" style="margin-top: 15px; width: 100%; height: 270px;">
                </div>
            </div>

            <div class="col-md-4">
                <div class="alert alert-default fade in">   
                    <img id="imgC" src="<?php echo $data1[dd_img4]; ?>" style="margin-top: 15px; width: 100%; height: 270px;">
                </div>
            </div>

            <div class="col-md-4">
                <div class="alert alert-default fade in">   
                    <img id="imgC" src="<?php echo $data1[dd_img5]; ?>" style="margin-top: 15px; width: 100%; height: 270px;">
                </div>
            </div>
        </fieldset>
    </div>
    
</div>
<?php endforeach ?>

