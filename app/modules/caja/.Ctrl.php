<?php
    class Ctrl {
        public function __construct() { } 

       	public function mod1($id){
            return gList('caja/components/mod1',$id,'sel2'); 
        }
        public function mod2($id){
            return gList('caja/components/mod2',$id,'sel2','sel1'); 
        }
        public function mod3($id){
            return gList('caja/components/mod3',$id,'sel3','sel1'); 
        }
        public function mod4($id){
            return gList('caja/components/mod4',$id); 
        }
        public function res($dt){
            return gList('caja/components/resumen',$dt,'dtcaja'); 
        }
        public function mod5($id){
            return gList('caja/components/mod5',$id); 
        }
        public function mod6($id){
            return gList('caja/components/mod6',$id); 
        }
        public function mod7($id){
            return gList('caja/components/mod7',$id); 
        }
        public function tbl1($id){
            return gList('caja/components/tabla1',$id,'tbl1'); 
        }
        public function del1($dt){
            $class = new Mod();
            $ts = $class->del1($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('success','Ingreso eliminado correctamente');
                        $('#tr1_<?php echo $dt ?>').remove();recCaj($('#idcaja').val());
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
                        aviso('success','Comprobante guardado correctamente');
                        $('#myModal1').modal('hide');
                    </script>

                <?php

            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');</script>
                <?php
            }
        }
        public function apCaja($dt){
            $class = new Mod();
            $ts = $class->apCaja($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('success','Caja aperturada correctamente');location.reload();
                    </script>

                <?php

            }else{
                ?>
                    <script>aviso('warning','Ya existe una caja aperturada');location.reload();</script>
                <?php
            }
        }
        public function cerrar($dt){
            $class = new Mod();
            $ts = $class->cerrar($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('success','Caja cerrada correctamente');
                        location.reload();
                    </script>

                <?php

            }else{
                ?>
                    <script>aviso('warning','Error al cerrar caja.');</script>
                <?php
            }
        }
        public function eliminar($dt){
            $class = new Mod();
            $ts = $class->eliminar($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('success','Caja eliminada correctamente');
                        location.reload();
                    </script>

                <?php

            }else{
                ?>
                    <script>aviso('warning','Error al eliminar la caja.');</script>
                <?php
            }
        }
         public function del2($dt){     
            $class = new Mod();
            $ts = $class->del2($dt);
            if ($ts) {
                ?>
                    <script>aviso('success','Egreso Eliminado correctamente');
                    $('#tr2_<?php echo $dt ?>').remove();recCaj($('#idcaja').val());</script>

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
                    <script>aviso('success','Edicion realizada correctamente');
                    vAjax('caja','tbl1','frm3','tbl1')
                <?php

            }else{
                ?>
                    <script>aviso('warning','No se puede editar');</script>
                <?php
            }
        }
        public function insert1($dt){     
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?>
                    <script>
                    aviso('info','Movimiento guardar correctamente');
                    vAjax('caja','tbl1','frm3','tbl1');
                    recCaj($('#idcaja').val());$('#myModal1').modal('hide');</script>
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
                    aviso('info','Rendicion realizada correctamente');
                    vAjax('caja','tbl1','frm3','tbl1');
                    recCaj($('#idcaja').val());
                    vAjax('caja','mod3',<?php echo $dt[id] ?>,'modal1');
                </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');</script>
                <?php
            }
        }
    }//--> fin clase
?> 
 