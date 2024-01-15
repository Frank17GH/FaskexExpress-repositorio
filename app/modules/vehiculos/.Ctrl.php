<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList('vehiculos/components/table1',0,'tabla1'); 
        }
        public function mod1($dt){     
        	if ($dt) {
        		return gList('vehiculos/components/mod1',$dt,'sel1','sel2'); 
        	}else{
        		return gList('vehiculos/components/mod1',$dt,'sel1'); 
        	}
        }
        public function mod2($dt){     
            return gList('vehiculos/components/mod2',$dt,'mod2','sel3'); 
        }
        public function mod3($dt){     
            return gList('vehiculos/components/mod3',$dt,'mod3','sel4'); 
        }
         public function mod4($dt){     
            return gList('vehiculos/components/mod4',$dt,'mod4','sel3'); 
        }
         public function mod5($dt){     
            return gList('vehiculos/components/mod5',$dt,'mod5'); 
        }
        public function img($dt){     
            return gList('vehiculos/components/img',$dt); 
        }
        public function insert1($dt){     
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Vehiculo agreado correctamente');
                        vAjax('vehiculos','tabla1',0,'tbl1');
                        $('#myModal1').modal('hide');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Error al agregar el vehiculo');</script>
                <?php
            }
        }
        public function insert2($dt){     
            $class = new Mod();
            $ts = $class->insert2($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','SOAT agreado correctamente');
                        vAjax('vehiculos','mod2',<?php echo $dt['id'] ?>,'modal4');
                        vAjax('vehiculos','tabla1',0,'tbl1')
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Error al agregar el SOAT');</script>
                <?php
            }
        }
        public function insert3($dt){     
            $class = new Mod();
            $ts = $class->insert3($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Revisión Técnica agreada correctamente');
                        vAjax('vehiculos','mod3',<?php echo $dt['id'] ?>,'modal4');
                        vAjax('vehiculos','tabla1',0,'tbl1')
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Error al agregar la Revisión Técnica');</script>
                <?php
            }
        }
        public function del1($dt){     
            $class = new Mod();
            $ts = $class->del1($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Vehiculo eliminado correctamente');
                        vAjax('vehiculos','tabla1',0,'tbl1');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','No se puede eliminar un vehiculo que esta asignado a una ruta activa');</script>
                <?php
            }
        }
        public function del2($dt){     
            $class = new Mod();
            $ts = $class->del2($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','SOAT eliminado correctamente');
                        $('#ttr<?php echo $dt;?>').remove();
                        vAjax('vehiculos','tabla1',0,'tbl1')
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','No se puede eliminar un vehiculo que esta asignado a una ruta activa');</script>
                <?php
            }
        }
        public function del3($dt){     
            $class = new Mod();
            $ts = $class->del3($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Revisión Técnica eliminada correctamente');
                        $('#ttr<?php echo $dt;?>').remove();
                        vAjax('vehiculos','tabla1',0,'tbl1')
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','No se puede eliminar un vehiculo que esta asignado a una ruta activa');</script>
                <?php
            }
        }
    }//--> fin clase
?> 
 