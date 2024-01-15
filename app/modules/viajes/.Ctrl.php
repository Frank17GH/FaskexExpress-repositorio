<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList('viajes/components/table1',0,'tabla1'); 
        }
        public function mod1($dt){     
        	return gList('viajes/components/mod1',$dt,'sel1','sel2','sel3'); 
        }
        

        public function insert1($dt){     
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Viaje agreado correctamente');
                        vAjax('viajes','tabla1',0,'tbl1');
                        $('#myModal1').modal('hide');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Error al agregar el vehiculo');</script>
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
                        vAjax('viajes','tabla1',0,'tbl1');
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
 