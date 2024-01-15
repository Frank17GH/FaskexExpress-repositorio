<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',0,'tabla1'); 
        }
        public function mod1($dt){     
            return gList($_POST['nom'].'/components/mod1',$dt,'mod1','mod1_2'); 
        }
        public function mod2($dt){     
            return gList($_POST['nom'].'/components/mod2',$dt,'mod2','mod2_1'); 
        }
        public function mod3($dt){     
            return gList($_POST['nom'].'/components/mod3',$dt,'mod3'); 
        }
        public function up1($dt){     
            $class = new Mod();
            $ts = $class->up1($dt);
            if ($ts) {
                ?><script>aviso('info','Contrato actualizado');vAjax('personal_contratos','mod1',<?php echo $dt[idpers] ?>,'modal5');;vAjax('personal_contratos','tabla1','frm1','tbl')</script><?php

            }else{
                ?><script> aviso('danger','Error al guardar contrato!.');</script><?php
            }
        }
        
        public function insert1($dt){     
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?><script>aviso('info','Contrato ingresado correctamente');</script><?php

            }else{
                ?><script> aviso('danger','Error al guardar a nuevo personal!.');</script><?php
            }
        }
    }//--> fin clase
?> 
 