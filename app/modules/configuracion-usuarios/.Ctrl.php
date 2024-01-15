<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){   
            return gList('configuracion-usuarios/components/table1',$dt,'tabla1'); 
        }
        public function mod1($dt){
            return gList('configuracion-usuarios/components/mod1',$dt,'view','mod4_2'); 
        }
        public function mod2($dt){
            return gList('configuracion-usuarios/components/mod2',$dt,'view','Menu'); 
        }
        public function mod3($dt){
            return gList('configuracion-usuarios/components/mod3',$dt,'sel1','tabla1','sel4'); 
        }
        public function mod4($dt){
            return gList('configuracion-usuarios/components/mod4',$dt,'mod4','mod4_2'); 
        }
        public function mod5($dt){
            return gList('configuracion-usuarios/components/mod5',$dt,'mod4_2'); 
        }
        public function comp1($dt){
            return gList('configuracion-usuarios/components/comp1',$dt,'mod5_2'); 
        }
        public function insert1($dt){     
            $class = new Mod();
            $ts = $class->insert1($dt);
            if($ts){     
                ?>
                   <script>
                       aviso('info','Usuario agregado correctamente!','Correcto!');
                       vAjax('configuracion-usuarios','tabla1','frm1','tbl1');
                       vAjax('configuracion-usuarios','mod1',<?php echo $ts ?>,'modal1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar al usuario.','Error!');
                    </script>
                <?php
            }
        }
        public function insert2($dt){     
            $class = new Mod();
            $ts = $class->insert2($dt);
            if($ts){     
                ?>
                   <script>
                       aviso('info','Local asignado correctamente!','Correcto!');
                        vAjax('configuracion-usuarios','mod1',<?php echo explode('-/', $dt)[1] ?>,'modal1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar el local.','Error!');
                    </script>
                <?php
            }
        }
        public function insert3($dt){     
            $class = new Mod();
            $ts = $class->insert3($dt);
            if($ts){     
                ?>
                   <script>
                       aviso('info','Giro de negocio agregado correctamente!','Correcto!');
                       vAjax('configuracion-usuarios','mod4',<?php echo explode('-/', $dt)[0] ?>,'modal1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar al usuario.','Error!');
                    </script>
                <?php
            }
        }
        public function insert4($dt){     
            $class = new Mod();
            $ts = $class->insert4($dt);
            if($ts){     
                ?>
                   <script>
                       aviso('info','Local agregado correctamente!','Correcto!');vLocs($('#idsers1').val());
                        aviso('info','Local retirado correctamente!','Correcto!');vAjax('configuracion-usuarios','comp1',$('#idlocall').val()+'-/'+$('#idsers1').val(),'locs');                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar al usuario.','Error!');
                    </script>
                <?php
            }
        }
        public function upVis($dt){     
            $class = new Mod();
            $ts = $class->upVis($dt);
            if($ts){     
                ?>
                   <script>
                       aviso('info','Usuario actualizado correctamente!','Correcto!');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al actualizar al usuario.','Error!');
                    </script>
                <?php
            }
        }
        
        public function del1($dt){     
            $class = new Mod();
            $insert = $class->del1(explode('-/', $dt)[0]);
            if($insert){     
                ?>
                   <script>
                       aviso('info','Local retirado correctamente!','Correcto!');vLocs($('#idsers1').val());
                       vAjax('configuracion-usuarios','comp1',$('#idlocall').val()+'-/'+$('#idsers1').val(),'locs')
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar contacto.','Error!');
                    </script>
                <?php
            }
        }
        public function del3($dt){     
            $class = new Mod();
            $insert = $class->del3($dt);
            if($insert){     
                ?>
                   <script>
                       aviso('info','Usuario Eliminado correctamente!','Correcto!');
                       $('#myModal1').modal('hide');
                       vAjax('configuracion-usuarios','tabla1','frm1','tbl1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar contacto.','Error!');
                    </script>
                <?php
            }
        }
        public function del2($dt){     
            $class = new Mod();
            $insert = $class->del2(explode('-/', $dt)[1]);
            if($insert){     
                ?>
                   <script>
                       aviso('info','Giro de negocio retirado correctamente!','Correcto!');
                       vAjax('configuracion-usuarios','mod4',<?php echo explode('-/', $dt)[0] ?>,'modal1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar contacto.','Error!');
                    </script>
                <?php
            }
        }
        public function up1($dt){     
            $class = new Mod();
            $ts1 = $class->up1($dt);
            if($ts1){     
                ?>
                   <script>
                       aviso('info','Usuario modificado correctamente!','Correcto!');
                       vAjax('configuracion-usuarios','mod1',<?php echo $dt['id'] ?>,'modal1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar contacto.','Error!');
                    </script>
                <?php
            }
        }
    }//--> fin clase
?> 
 