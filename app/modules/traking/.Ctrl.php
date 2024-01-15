<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',$dt,'tabla1'); 
        }
        public function mod1($dt){     
            return gList($_POST['nom'].'/components/mod1',$dt,'select3'); 
        }
        public function mod2($dt){     
            return gList($_POST['nom'].'/components/mod2',$dt,'select3'); 
        }
        public function entregado($dt){
            $class = new Mod();
            $insert = $class->entregado($dt);
            if($insert){     
                ?>
                   <script>
                        aviso('info','Entrega guardada!','Correcto!');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error','Error!');
                    </script>
                <?php
            }
        }
        public function verifica($dt){
            $class = new Mod();
            $insert = $class->verifica($dt);
            if($insert){     

                ?><input type="hidden" value="1" id="cdver">
                   <script>
                        aviso('info','El codigo ingresado es correcto!','Correcto!');
                    </script>
                <?php
            }else{
                ?><input type="hidden" value="0" id="cdver">
                    <script>
                        aviso('danger','El codigo ingresado es incorrecto','Error!');
                    </script>
                <?php
            }
        }
    }//--> fin clase
?> 
 