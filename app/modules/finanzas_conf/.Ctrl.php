<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',$dt,'tabla1'); 
        }
        public function mod1($dt){     
            if ($dt) {
                return gList($_POST['nom'].'/components/mod1',$dt,'tabla1'); 
            }else{
                return gList($_POST['nom'].'/components/mod1'); 
            }
        }
        public function mod2($dt){     
            if ($dt) {
                return gList($_POST['nom'].'/components/mod2',$dt,'mod2','tabla2'); 
            }else{
                return gList($_POST['nom'].'/components/mod2',$dt,'mod2'); 
            }
        }
        public function tabla2($dt){     
            return gList($_POST['nom'].'/components/table2',$dt,'tabla2'); 
        }
        public function insert1($dt){     
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Categoria registrada correctamente');vAjax('finanzas_conf','tabla1',0,'grid1');$('#myModal1').modal('hide');</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Verifique información');location.reload();</script>
                <?php
            }
        }
        public function insert2($dt){     
            $class = new Mod();
            $ts = $class->insert2($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Asiento registrado correctamente');vAjax('finanzas_conf','tabla2',0,'grid2');$('#myModal1').modal('hide');</script>
                <?php
            }else{
                ?>
                <?php
            }
        }
        public function del1($dt){     
            $class = new Mod();
            $ts = $class->del1($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Categoria eliminada correctamente');vAjax('finanzas_conf','tabla1',0,'grid1');$('#myModal1').modal('hide');</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Error al eliminar categoría');location.reload();</script>
                <?php
            }
        }
        public function del2($dt){     
            $class = new Mod();
            $ts = $class->del2($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Asiento eliminado correctamente');vAjax('finanzas_conf','tabla2',0,'grid1');$('#myModal1').modal('hide');</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Error al eliminar el asiento');location.reload();</script>
                <?php
            }
        }
    }//--> fin clase
?> 
 