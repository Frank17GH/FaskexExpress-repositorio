<?php
    class Ctrl {
        public function tbl1($id){
            return gList('caja_general/components/tabla1',$id,'tbl1'); 
        }
        public function tbl2($id){
            return gList('caja_general/components/tabla2',$id,'tbl2'); 
        }
        public function mod2($id){
            return gList('caja_general/components/mod2',$id,'sel1','sel2','sel3'); 
        }
        public function insert1($dt){
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('success','Egreso regstrado correctamente');vAjax('caja_general','tbl1','frm1','tbl1');$('#myModal1').modal('hide');
                    </script>

                <?php

            }else{
                ?>
                    <script>aviso('warning','Error al registrar egreso');</script>
                <?php
            }
        }
    }//--> fin clase
?> 
 