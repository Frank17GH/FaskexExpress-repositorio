<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',$dt,'tabla1'); 
        }
        public function tabla2($dt){     
            return gList($_POST['nom'].'/components/table2',$dt,'tabla2'); 
        }
       	public function mod1($dt){     
            return gList($_POST['nom'].'/components/mod1',$dt,'mod1'); 
        }
        public function mod2($dt){     
            return gList($_POST['nom'].'/components/mod2',$dt, 'mod2', 'mod2_1'); 
        }
        public function insert1($dt){     
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Compra registrada correctamente');
                        $('#myModal3').modal('hide');
                        vAjax('compras','tabla1','frm1','tbl1');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Verifique información');</script>
                <?php
            }
        }
        public function del1($dt){     
            $class = new Mod();
            $ts = $class->del1($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Compra eliminada correctamente');$('#myModal1').modal('hide');vAjax('compras','tabla1','frm1','tbl1');</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Verifique información');location.reload();</script>
                <?php
            }
        }
    }//--> fin clase
?> 
 