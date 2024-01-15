<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',$dt,'tabla1'); 
        }
        public function tabla3($dt){     
            return gList($_POST['nom'].'/components/table3',$dt,'tabla3'); 
        }
        public function mod1($dt){     
            return gList($_POST['nom'].'/components/mod1',$dt,'mod1','tabla3'); 
        }
        public function mod2($id){     
            return gList($_POST['nom'].'/components/mod2',$id,'mod2'); 
        }
        public function mod3($dt){     
            return gList($_POST['nom'].'/components/mod3',$dt,'select3'); 
        }
        public function print($id){     
            ?>
                <script>
                    window.open('<?php echo __IP__.__HOME__.__MOD__; ?>mensajero/print.php?id=<?php echo $id ?>', "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no");
                </script>
            <?php
        }
               
        public function insert1($dt){
            $class = new Mod();
            $insert = $class->insert1($dt);

            if($insert){     
                ?>
                   <script>
                        vAjax('mensajero','tabla1','frm1','tbl1');
                        $('#myModal3').modal('hide');
                        aviso('info','Hoja de ruta generado correctamente!','Correcto!');

                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','No se puede generar hoja de ruta','Error!');
                    </script>
                <?php
            }
        }
          public function entregado($dt){
            $class = new Mod();
            $insert = $class->entregado($dt);
            if($insert){     
                ?>
                   <script>
                        aviso('info','Entrega guardada!','Correcto!');
                        $('#myModal2').modal('hide');
                       $('#myModal3').modal('hide');
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
       
    }//--> fin clase
?> 