<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList('manifiestos/components/table1',$dt,'tabla1'); 
        }
        public function tabla2($dt){     
            return gList('manifiestos/components/table2',$dt,'sel1'); 
        }
       	public function mod1($dt){     
            return gList('manifiestos/components/mod1',$dt,'sel2','mod1','mod1_2'); 
        }
        public function mod2($dt){     
            return gList('manifiestos/components/mod2',$dt,'sel8','sel9'); 
        }
        
        public function print($id){     
            ?>
                <script>
                    window.open('<?php echo __IP__.__HOME__.__MOD__; ?>manifiestos/print.php?id=<?php echo $id ?>', "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no");
                </script>
            <?php
        }
        public function insert1($dt){
            $class = new Mod();
            $insert = $class->insert1($dt);

            if($insert){     
                ?>
                   <script>
                        vAjax('manifiestos','mod1','frm1','modal3');
                        vAjax('manifiestos','tabla1','frm1','tbl1')
                        aviso('info','Manifiesto generado correctamente!','Correcto!');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','No hay carga para generar el manifiesto','Error!');
                    </script>
                <?php
            }
        }
        public function del1($dt){
            $class = new Mod();
            $insert = $class->del1($dt);
            if($insert){     
                ?>
                   <script>
                        vAjax('manifiestos','tabla1','frm1','tbl1')
                        aviso('info','Manifiesto generado correctamente!','Correcto!');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al generar manifiesto','Error!');
                    </script>
                <?php
            }
        }
        public function salida($dt){
            $class = new Mod();
            $insert = $class->salida($dt);
            if($insert){     
                ?>
                   <script>
                        $('#myModal4').modal('hide');
                        aviso('info','Confirmacion de envio generado correctamente!','Correcto!');
                        vAjax('manifiestos','tabla1','frm1','tbl1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al generar confirmación','Error!');
                    </script>
                <?php
            }
        }
        public function llegada($dt){
            $class = new Mod();
            $insert = $class->llegada($dt);
            if($insert){     
                ?>
                   <script>
                        $('#myModal4').modal('hide');
                        aviso('info','Confirmacion de llegada, generado correctamente!','Correcto!');
                        vAjax('manifiestos','tabla1','frm1','tbl1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al generar confirmación','Error!');
                    </script>
                <?php
            }
        }
    }//--> fin clase
?> 