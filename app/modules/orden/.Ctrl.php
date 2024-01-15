<?php
    class Ctrl {
        public function __construct() { } 
		public function mod1(){     
            return gList('orden/components/mod1'); 
        }
        public function cre_orden($dt){
            $class = new Mod();
            $ts = $class->cre_orden($dt);
            if ($ts) { ?>
                <script>  
                    location.reload();
                    aviso('info','Orden de Servicio creado correctamente');
                    aviso('info','Orden de Trabajo creado correctamente');
                    var d = '<?php echo $dt[correo_de ];?>'
                    var p = '<?php echo $dt[correo_para];?>'
                    var cl = '<?php echo $dt[cl_cliente];?>'
                    var co = '<?php echo $dt[co_contacto];?>'
                    var fe = '<?php echo $dt[fecha];?>'
                    var ser = '<?php echo $dt[servi];?>'
                    var servc = '<?php echo $dt[serie],' - ',$dt[numero];?>';
                    var traba = '<?php echo $dt[t_serie],' - ',$dt[t_numero];?>';

                    var detalle = '<?php $div = ""; $div .= '\n DIVICION DE HABILITADO : \n'; $div .='\t detalle: '.$dt[habil_nombre].' \n';  $div .='\t Observacion: '.$dt[habil_observacion].' \n';$div .= ' DIVICION DE DIGITACION : \n'; $div .='\t detalle: '.$dt[digit_nombre].' \n';  $div .='\t Observacion: '.$dt[digit_observacion].' \n'; $div .= ' DEPARTAMENTO DE OPERACIONES : \n'; $div .='\t detalle: '.$dt[opera_nombre].' \n';  $div .='\t Observacion:  '.$dt[opera_observacion].' \n'; echo $div;  ?>';

                     $('#myModal5').modal('show');                        
                        $("#div-modal5").html('<div class="modal-header"><button type="button" class="close"  onclick="location.reload()" aria-hidden="true">×</button>'+
                        '<h4 class="modal-title" id="myModalLabel"><center><b>[ORDEN DE SERVICIO CREADO CORRECTAMENTE ]</b></center></h4></div><div class="modal-body"><div class="row">'+
                        '<div class="col-md-12"><div class="well well-sm well-primary"><form class="form form-inline" id="apro" method=\'post\' action=\'app/modules/orden/components/envio.php\'  enctype="multipart/form-data" ><center> '+
                        '<h3>Adjuntar Base de Datos</h3>'+
                        '<input type="hidden" name="de" id="de" value="'+d+'"><input type="hidden" name="para" id="para" value="'+p+'"><input type="hidden" name="orden" value="'+servc+'"><input type="hidden" name="cliente"  value="'+cl+'"><input type="hidden" name="servicio"  value="'+ser+'"><input type="hidden" name="contacto"  value="'+co+'"><input type="hidden" name="fecha"  value="'+fe+'"><input type="hidden" name="trabajo"  value="'+traba+'"><input type="hidden" name="Asunto"  value="ENVIO AUTOMATICO - NUEVA ORDEN DE SERVICIO REGISTRADA - FASKEX" /><textarea style="display:none" name="Mensaje" cols="50" rows="10" >'+detalle+'</textarea>'+
                        '<input type="file" name="archivo1" id="archivo1" class="btn btn-default input-xs"> <br>'+
                        '<ul class="demo-btns"><li><input class="btn btn-info" type=\'submit\' value=\'Enviar\'>'+
                        '</li><li><a id="smart-mod-eg3" class="btn btn-danger" onclick="location.reload()"> Cerrar <i class="fa fa-remove"></i></a></li></ul></center></form> </div></div></div></div>');                                          
                    </script>
            <?php }else{ ?>
                <script>                    
                    aviso('warning','Verificar datos de Orden de Servicio');

                </script>
                <?php
            }
        }

        public function mod_trabajo(){     
            return gList('orden/components/mod_trabajo'); 
        }
        public function mod_recojo($id){     
            return gList('orden/components/mod_recojo'); 
        }
        public function mod_cuenta($id){     
            return gList('orden/components/mod_cuenta',$id,'mod_cuenta'); 
        }
        public function tabla_servicios($id){     
            return gList('orden/components/tabla_servicios',$id,'detalle');             
            ?>
            <script>aviso('info','Cargando servicios ');</script>
            <?php                
        }
        public function envio($dt){
            return gList($_POST['nom'].'/components/envio',$dt); 
        }

    }

?> 
 