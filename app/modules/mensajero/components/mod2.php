
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title">VERIFICACIÓN DE ENTREGA</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<form class="form-horizontal" id="frm3">
					<input type="hidden" name="id" value="<?php echo $s02 ?>">
					<fieldset>									
					
						<table class="table table-striped table-bordered table-hover" id="dtable1" width="100%">
    <thead>
        <tr>
            <th data-class="expand" style="width: 5px"><center>REMITO</center></th>
            <th data-class="expand" style="width: 5px"><center>DNI</center></th>
            <th data-class="expand"><center>CONSIGNADO</center></th>
            <th data-hide="esconder" style="width:5px">ENVIO</th>
            <th data-hide="esconder" style="width:5px">TIPO</th>
            <th data-hide="esconder" style="width:5px">ORIGEN</th>
            <th data-hide="esconder" style="width:5px">DESTINO</th>
            <th data-hide="esconder" style="width:15px">DIRECCION</th>
            <th data-hide="esconder" style="width:5px">ENTREGA</th>
            <th data-hide="esconder" style="width:5px">ESTADO</th>
        </tr>
    </thead>
    <tbody style="font-size: 12px">
        <?php 
            if($dt1){
                foreach ($dt1 as $dta1): 
                    ?>
                        <tr>
                            <td><?php echo str_pad($dta1[iddet], 8, "0", STR_PAD_LEFT); ?></td>
                            <td><?php echo $dta1[de_ruc]; ?></td>
                            <td><?php echo mb_strtoupper($dta1[de_nombre]); ?></td>
                            <td style="text-align: center;">
                                <?php 
                                    $fecha1 = new DateTime(date('Y-m-d', strtotime($dta1[co_fecha])) );
                                    $fecha2 = new DateTime(date('Y-m-d'));
                                    $resultado = $fecha1->diff($fecha2);
                                    $dias=$resultado->format('(%a)');
                                    echo date('d/m/Y', strtotime($dta1[co_fecha]));
                                    if ($dias<10) {
                                       ?><br><font style="color:green"><b><?php echo $dias; ?></b></font><?php
                                    }elseif($dias>10 && $dias<15){
                                        ?><br><font><b><?php echo $dias; ?></b></font><?php
                                    }else{
                                        ?><br><font><b><?php echo $dias; ?></b></font><?php
                                    }
                                ?>
                            </td>
                            <td style="white-space:nowrap;">
                                <?php 
                                    if ($dta1[de_tipo_encomienda]==1) {
                                        ?><i class="fa fa-file txt-color-orange fa-lg"></i> <b>(SOBRE)</b><?php
                                    }else{
                                        ?><i><img style="width: 21px;" src="app/recursos/img/paquete.png"></i> <b>(PAQUETE)</b><?php
                                    }
                                ?>
                            </td>
                            <td style="white-space:nowrap;"><?php echo mb_strtoupper(utf8_encode($dta1[nombre])); ?></td>
                            <td style="white-space:nowrap;">
                                <?php 

                                    $class = new Mod();
                                    $local = $class->local($dta1[dest]);
                                    echo mb_strtoupper(utf8_encode($local[0]['nombre'])); 
                                ?>
                            </td>
                            <td style="white-space:nowrap;">
                                <?php                                    
                                    echo mb_strtoupper(utf8_encode($dta1['de_direccion'])); 
                                ?>
                            </td>
                            <td><?php if($dta1[de_tipo_entrega]==1){echo '<span class="badge bg-color-greenLight">Domicilio</span>';}elseif($dta1[de_tipo_entrega]==2){echo '<span class="badge bg-color-darken">Agencia</span>';}; ?></td>
                            <td>
                                <?php 
                                    if ($dta1[est_paq]==5) {
                                        ?>
                                            <a class="label bg-color-magenta" style="font-size: 100%;" onclick="vAjax('mensajero','mod3',<?php echo $dta1[iddet] ?>,'modal2')"><i class="fa fa-lg fa-fw fa-location-arrow"></i> EN REPARTO</a>                                           
                                        <?php
                                    }elseif ($dta1[est_paq]==4) {
                                        ?>
                                            <a class="label label-success" style="font-size: 100%;" onclick="vAjax('mensajero','mod3',<?php echo $dta1[iddet] ?>,'modal2')"><i class="fa fa-lg fa-fw fa-check"></i> ENTREGADO</a>
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php 
                endforeach; 
            }
        ?>
    </tbody>
</table>
<script type="text/javascript">table(1,50,1); </script> 
						<input type="hidden" value="" id='idet' name="detcc">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  dta1-dismiss="modal">Cancel</button>
		<?php 
			if($dt2[0][ma_estado]==1){
				?>
					<button class="btn btn-primary" type="button" onclick="vAjax('manifiestos','salida','frm3');">
						<i class="fa fa-save"></i>
						Guardar
					</button>
				<?php
			}elseif ($dt2[0][ma_estado]==2) {
				?>
					<button class="btn btn-primary" type="button" onclick="vAjax('manifiestos','llegada','frm3');">
						<i class="fa fa-save"></i>
						Guardar
					</button>
				<?php
			} 
		?>
		
	</div>
</div>
<script>
	$('#barc').select();
	function barcode(id){
		if ($('#ttr'+id).hasClass("success")) {
			$('#ttr'+id).removeClass('success');
		}else{
			$('#ttr'+id).addClass('success');
		}
		$('#barc').val('');calc();
	}
	function calc(){
		var tot='';
		$('#idveri tr').each(function () {
			id=$(this).find("td").eq(1).html();
			if ($('#ttr'+id).hasClass("success")) {
				tot+=id+',';
			}
			$('#idet').val(tot);
		});
	}
</script>