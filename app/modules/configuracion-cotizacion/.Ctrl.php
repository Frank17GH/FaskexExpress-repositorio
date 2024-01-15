<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',0,'tabla1'); 
        }
        public function tabla2($dt){     
            return gList($_POST['nom'].'/components/table2',0,'tabla2'); 
        }
        public function tabla_local($dt){     
            return gList($_POST['nom'].'/components/tabla_local',0,'tabla_local'); 
        }
        public function mod_local($dt){     
            return gList($_POST['nom'].'/components/mod_local',$dt,'tabla_local'); 
        }
        public function update_recojo($dt){     
            $class = new Mod();
            $ts = $class->update_recojo($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Actualizado correctamente');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','No se puede agregar.');</script>
                <?php
            }
        }
        public function insert_local($dt){     
            $class = new Mod();
            $ts = $class->insert_local($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Agregado  correctamente');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','No se puede agregar.');</script>
                <?php
            }
        }
      public function update_entrega($dt){     
            $class = new Mod();
            $ts = $class->update_entrega($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Actualizado  correctamente');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','No se puede agregar.');</script>
                <?php
            }
        }
        public function update_entrega_nacional($dt){     
            $class = new Mod();
            $ts = $class->update_entrega_nacional($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Actualizado  correctamente');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','No se puede agregar.');</script>
                <?php
            }
        }
        public function tabla_nacional($id){     
            return gList($_POST['nom'].'/components/tabla_nacional',$id,'tabla_nacional'); 
        }
        public function mod1($dt){     
            return gList($_POST['nom'].'/components/mod1',$dt,'mod1','mod1_2'); 
        }
        public function mod2($dt){     
            return gList($_POST['nom'].'/components/mod2',$dt); 
        }
        public function mod3($dt){     
            return gList($_POST['nom'].'/components/mod3',$dt,'mod3','mod3_2'); 
        }
        public function mod4($dt){     
            return gList($_POST['nom'].'/components/mod4',$dt,'mod4','mod4_2'); 
        }
        public function insert1($dt){     
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Caja aperturada correctamente');
                        vAjax('configuracion-cotizacion','mod1',<?php echo explode('-/', $dt)[0] ?>,'modal1');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');</script>
                <?php
            }
        }
        public function up1($dt){     
            $class = new Mod();
            $ts = $class->up1($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Servicio registrado correctamente');
                        vAjax('configuracion-cotizacion','mod1',<?php echo $dt['id'] ?>,'modal1');vAjax('configuracion-cotizacion','tabla1',0,'tbl1');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');</script>
                <?php
            }
        }
        public function insert2($dt){     
            $class = new Mod();
            $ts = $class->insert2($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Descripción guardada correctamente');
                        vAjax('configuracion-cotizacion','mod4',<?php echo explode('-/', $dt)[0] ?>,'modal5');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');</script>
                <?php
            }
        }
        public function insert3($dt){     
            $class = new Mod();
            $ts = $class->insert3($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Servicio guardado correctamente');
                        vAjax('configuracion-cotizacion','mod1',<?php echo $ts ?>,'modal1');
                        vAjax('configuracion-cotizacion','tabla1',0,'tbl1');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');</script>
                <?php
            }
        }
        public function insert4($dt){     
            $class = new Mod();
            $ts = $class->insert4($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Servicio guardado correctamente');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');</script>
                <?php
            }
        }
        public function del1($dt){     
            $class = new Mod();
            $ts = $class->del1($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Caja aperturada correctamente');vAjax('configuracion-cotizacion','mod1',$('#did').val(),'modal1');</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');</script>
                <?php
            }
        }
        public function del2($dt){     
            $class = new Mod();
            $ts = $class->del2($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Descripción eliminada correctamente');vAjax('configuracion-cotizacion','mod4',$('#zid').val(),'modal5');</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');</script>
                <?php
            }
        }
        public function del3($dt){     
            $class = new Mod();
            $ts = $class->del3($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Servicio eliminado correctamente');vAjax('configuracion-cotizacion','tabla1',0,'tbl1');$('#myModal1').modal('hide')</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');</script>
                <?php
            }
        }
    }//--> fin clase
?> 
 
