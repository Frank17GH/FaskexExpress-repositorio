<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList('rutas/components/table1',0,'tabla1'); 
        }
        public function tabla2($dt){     
            return gList('rutas/components/table2',$dt,'mod2_2','mod2_3'); 
        }
        public function mod1($dt){     
            return gList('rutas/components/mod1',0,'sel2','sel3'); 
        }
        public function mod2($dt){     
            return gList('rutas/components/mod2',$dt,'mod2'); 
        }
        public function insert1($dt){     
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?><script>$('#myModal1').modal('hide');aviso('info','Ruta creada correctamente');vAjax('rutas','tabla1',0,'tbl1');</script><?php
            }else{
                ?><script>aviso('warning','Error al crear ruta.');</script><?php
            }
        }
        public function insert2($dt){     
            $class = new Mod();
            $ts = $class->insert2($dt);
            if ($ts) {
                ?>
                    <script>
                        vAjax('rutas','tabla2','<?php echo explode('-/', $dt)[0] ?>','tbl2');
                    </script>
                <?php
            }else{
                ?><script>aviso('warning','Error al crear ruta.');</script><?php
            }
        }
        public function del1($dt){     
            $class = new Mod();
            $ts = $class->del1($dt);
            if ($ts) {
                ?><script>aviso('info','Ruta eliminada correctamente');vAjax('rutas','tabla1',0,'tbl1');</script><?php
            }else{
                ?><script>aviso('warning','No se puede eliminar una ruta que tiene guías emitidas');</script><?php
            }
        }
        public function del2($dt){     
            $class = new Mod();
            $ts = $class->del2($dt);
            if ($ts) {
                ?><script>aviso('info','Destino eliminado correctamente');vAjax('rutas','tabla2','<?php echo explode('-/', $dt)[0] ?>','tbl2');;</script><?php
            }else{
                ?><script>aviso('warning','No se puede eliminar una ruta que tiene guías emitidas');</script><?php
            }
        }
    }
?> 
 