<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',0,'tabla1'); 
        }

         public function tabla2($dt){     
            return gList($_POST['nom'].'/components/table2',$dt,'tabla2'); 
        }

        public function mod1($dt){     
            return gList($_POST['nom'].'/components/mod1',$dt); 
        }
        public function mod2($dt){     
            if ($dt) {
                return gList($_POST['nom'].'/components/mod2',$dt,'mod2'); 
            }else{
                return gList($_POST['nom'].'/components/mod2',$dt); 
            }
            
        }
        public function del1($dt){
            $class = new Mod();
            $ts = $class->del1($dt);
            if ($ts) {
                ?><script>aviso('info','Personal eliminado correctamente');$('#myModal5').modal('hide');vAjax('personal-listar','tabla1',0,'tbl');</script><?php

            }else{
                ?><script> aviso('danger','Error al guardar a nuevo personal!.');</script><?php
            }
        }

        public function del2($dt){
            $class = new Mod();
            $ts = $class->del2($dt);
            if ($ts) {
                ?><script>aviso('info','Derechohabiente eliminado correctamente');
                $('#tr1_<?php echo $dt ?>').remove();
                </script><?php

            }else{
                ?><script> aviso('danger','Error al guardar a nuevo personal!.');</script><?php
            }
        }

        public function nderecho($dt){
            $class = new Mod();
            $ts = $class->nderecho($dt);
            if ($ts) {
                ?><script>aviso('info','Personal agregado correctamente');
                $('.nd').val('');
                vAjax('personal-listar','tabla2',<?php echo explode('-/', $dt)[3] ?>,'derecho');</script><?php

            }else{
                ?><script> aviso('danger','Error al guardar Derechohabiente!.');</script><?php
            }
        }


        public function up1($dt){
            $class = new Mod();
            $ts = $class->up1($dt);
            if ($ts) {
                ?><script>aviso('info','Personal editado correctamente');vAjax('personal-listar','tabla1',0,'tbl');</script><?php

            }else{
                ?><script> aviso('danger','Error al guardar personal!.');</script><?php
            }
        }
    }//--> fin clase
?> 
 