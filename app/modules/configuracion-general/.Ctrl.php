<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList('configuracion-general/components/table1',$dt,'tabla1'); 
        }
        public function tabla2($data){     
            return gList('configuracion-general/components/table2',0); 
        }
        public function tabla3($data){     
            return gList('configuracion-general/components/table3',0,'giros'); 
        }
        public function mod1($dt){
            return gList('configuracion-general/components/mod1',0,'giros2'); 
        }
        public function mod2($dt){     
            return gList('configuracion-general/components/mod2',$dt,'view','giros2'); 
        }
        public function mod3($dt){     
            return gList('configuracion-general/components/mod3',$dt,'mod3'); 
        }
        public function mod4($dt){     
            return gList('configuracion-general/components/mod4',$dt,'mod4','mod4_2'); 
        }
        public function mod5($dt){     
            return gList('configuracion-general/components/mod5',$dt,'mod5_2'); 
        }
        public function mod6($dt){     
            return gList('configuracion-general/components/mod6',$dt,'mod6'); 
        }
        public function comp1($dt){     
            return gList('configuracion-general/components/comp1',$dt,'comp1'); 
        }
        public function insert1($dt){
            $class = new Mod();
            $insert = $class->insert1($dt);

            if($insert){     
                ?>
                   <script>
                       aviso('info','Local guardado correctamente!','Correcto!');
                       $('#myModal1').modal('hide');$('#div-modal').empty();
                       vAjax('configuracion-general','tabla1',0,'tabla1');
                       vAjax('home','locales',0,'locales');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Sucursal ya existe','Error!');
                    </script>
                <?php
            }
        }
        public function insert2($dt){
            $class = new Mod();
            $insert = $class->insert2(explode('-/', $dt)[0],explode('-/', $dt)[1]);

            if($insert){     
                ?>
                   <script>
                       aviso('info','Local guardado correctamente!','Correcto!');
                       vAjax('configuracion-general','tabla3',0,'tabla3');
                       vAjax('configuracion-general','mod4',<?php echo explode('-/', $dt)[1] ?>,'modal1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al dividir grupo.','Error!');
                    </script>
                <?php
            }
        }
        public function insert3($dt){
            $class = new Mod();
            $insert = $class->insert3(explode('-/', $dt)[0],explode('-/', $dt)[1]);

            if($insert){     
                ?>
                   <script>
                       aviso('info','Serie agregada correctamente!','Correcto!');
                       vAjax('configuracion-general','comp1',$('#idlocall').val()+'-/'+$('#idsers1').val(),'sers');
                       bfalt($('#idsers1').val(),$('#idlocall').val());
                       vAjax('configuracion-general','tabla1',$('#idlocs').val(),'tabla1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al dividir grupo.','Error!');
                    </script>
                <?php
            }
        }
        public function insert4($dt){
            $ser=explode('-/', $dt)[0];
            $tip=explode('-/', $dt)[1];
            $class = new Mod();
            $insert = $class->insert4($ser,$tip);

            if($insert){     
                ?>
                   <script>
                       aviso('info','Serie agregada correctamente!','Correcto!');
                       $("#detser").append('<tr id="<?php echo $tip  ?>">'+
                                                '<td><?php echo $tip  ?></td>'+
                                                '<td><a class="btn btn-danger btn-xs" onclick="confir(\'Confirmación\',\'Seguro que deseas eliminar la serie seleccionada?\',\'configuracion-general\',\'del4\',\'0-/<?php echo $tip  ?>\',\'remove\')">Eliminar</a></td>'+
                                            '</tr>');
                       vAjax('configuracion-general','tabla2',0,'tabla2');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('warning','La serie ingresada ya existe.','Error!');$('#nSer').select();
                    </script>
                <?php
            }
        }
        public function insert5($dt){
            $class = new Mod();
            $insert = $class->insert5($dt); 
            if($insert){     
                ?>
                   <script>
                       aviso('info','Giro registrado correctamente!','Correcto!');
                       vAjax('configuracion-general','tabla3',0,'tabla3');
                       $('#myModal1').modal('hide');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al registrar el giro.','Error!');
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
                       aviso('info','Local eliminado correctamente!','Correcto!');
                       $('#myModal1').modal('hide');$('#div-modal').empty();
                       vAjax('configuracion-general','tabla1',0,'tabla1');
                       vAjax('home','locales',0,'locales');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al eliminar el local.','Error!');
                    </script>
                <?php
            }
        }
        public function del2($dt){
            $class = new Mod();
            $id=explode('-/', $dt)[0];
            $insert = $class->del2($id); 
            if($insert){     
                ?>
                   <script>
                       aviso('info','CPE retirado correctamente!','Correcto!');
                       $('#ttr<?php echo $id ?>').remove();
                       vAjax('configuracion-general','tabla3',0,'tabla3');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al dividir grupo.','Error!');
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
                        aviso('info','Serie retirado correctamente!','Correcto!');
                        vAjax('configuracion-general','comp1',$('#idlocall').val()+'-/'+$('#idsers1').val(),'sers');
                        bfalt($('#idsers1').val(),$('#idlocall').val());
                        vAjax('configuracion-general','tabla1',$('#idlocs').val(),'tabla1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al dividir grupo.','Error!');
                    </script>
                <?php
            }
        }
        public function del4($dt){
            $id=explode('-/', $dt)[1];
            $class = new Mod();
            $insert = $class->del4($id); 
            if($insert){     
                ?>
                   <script>
                        aviso('info','Serie retirada correctamente!','Correcto!');
                        $('#<?php echo $id ?> ').remove();
                        vAjax('configuracion-general','tabla2',0,'tabla2');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al dividir grupo.','Error!');
                    </script>
                <?php
            }
        }
    }
?> 
 