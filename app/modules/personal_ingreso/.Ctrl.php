<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',$dt,'tabla1'); 
        }
        public function sel1($dt){     
            return gList($_POST['nom'].'/components/sel1',$dt,'sel1'); 
        }
        public function mod1($dt){     
            if ($dt) {
                return gList($_POST['nom'].'/components/mod1',$dt,'mod1','mod1_2','mod1_3'); 
            }else{
                return gList($_POST['nom'].'/components/mod1',$dt,'mod1','mod1_2'); 
            }
        }
        public function insert1($dt){
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?><script>aviso('info','Personal ingresado correctamente');$('#myModal1').modal('hide');vAjax('personal_ingreso','tabla1','frm1','tbl')</script><?php
            }else{
                ?>
                    <script> aviso('danger','Error al guardar a nuevo personal!.');</script>
                <?php
            }
        }
        public function del1($dt){
            $class = new Mod();
            $ts = $class->del1($dt);
            if ($ts) {
                ?><script>aviso('info','Ingreso eliminado correctamente');$('#myModal1').modal('hide');vAjax('personal_ingreso','tabla1','frm1','tbl')</script><?php

            }else{
                ?>
                    <script> aviso('danger','Error al guardar a nuevo personal!.');</script>
                <?php
            }
        }
    }//--> fin clase
?> 
 