<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList('personal-cargos/components/table1',0,'tabla1'); 
        }
        public function mod1($dt){     
            return gList('personal-cargos/components/mod1',$dt); 
        }
        public function mod2($dt){     
            return gList('personal-cargos/components/mod2',$dt,'view','personas'); 
        }
        public function mod3($dt){     
            return gList('personal-cargos/components/mod3',$dt,'contacto'); 
        }
        public function insert1($dt){     
            $class = new Mod();
            $insert = $class->insert1($dt);
            if($insert){     
                ?>
                   <script>
                       aviso('info','Contacto guardado correctamente!','Correcto!');
                       $('.nww').val('');
                       $("#detc").append('<tr id="tr<?php echo $insert; ?>"><td><?php echo $dt['nom'] ?></td><td><?php echo $dt['area'] ?></td><td><?php echo $dt['tel'] ?></td><td class="edit">'+
                                                    '<a class="btn btn-default input-xs" title="Eliminar" '+
                                                    'onclick="confir(\'Confirmacion\',\'Seguro que deseas eliminar el contacto '+
                                                    'seleccionado?\',\'clientes\',\'del1\',<?php echo $insert ?>,\'remove\')">'+
                                                       ' <i class="glyphicon glyphicon-trash"></i>'+
                                                    '</a>'+
                                                '</td></tr>');
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
         public function insert2($dt){     
            $class = new Mod();
            $insert = $class->insert2($dt);
            if($insert){     
                if ($dt['id']) {
                    ?>
                       <script>
                           aviso('info','Edición realizada correctamente!','Correcto!');
                            vAjax('personal-cargos','tabla1',0,'clientes_listar');
                           vAjax('personal-cargos','mod2',<?php echo $dt[id] ?>,'modal1');
                        </script>
                    <?php
                }else{
                    ?>
                       <script>
                           aviso('info','Cargo ingresado correctamente!','Correcto!');
                           vAjax('personal-cargos','tabla1',0,'clientes_listar');
                           $('#myModal1').modal('hide');
                        </script>
                    <?php
                }
            }else{

                ?>
                    <script>
                        aviso('warning','El D.N.I. ya se encuentra registrado.','Error!');
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
                       aviso('info','Contacto eliminado correctamente!','Correcto!');
                       $('#tr<?php echo $dt ?>').remove();
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
            $insert = $class->del2($dt);
            if($insert){     
                ?>
                   <script>
                       aviso('info','Cargo eliminado correctamente!','Correcto!');
                       $('#myModal1').modal('hide');
                           vAjax('personal-cargos','tabla1',0,'clientes_listar');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('warning','No se puede eliminar cargos que estan en utilización.','Error!');
                    </script>
                <?php
            }
        }
    }//--> fin clase
?> 
 