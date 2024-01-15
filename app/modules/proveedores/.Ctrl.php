<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',0,'tabla1'); 
        }
        public function mod1($dt){     
            return gList($_POST['nom'].'/components/mod1',$dt); 
        }
        public function mod2($dt){     
            return gList($_POST['nom'].'/components/mod2',$dt,'mod2','mod2_1'); 
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
                       aviso('info','Cliente eliminado correctamente!','Correcto!');
                       $('#myModal1').modal('hide');
                       vAjax('proveedores','tabla1',0,'tbl1');
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
        public function insert1($dt){     
            $class = new Mod();
            $insert = $class->insert1($dt);
            if($insert){     
                ?>
                   <script>
                       aviso('info','Proveedor guardado correctamente!','Correcto!');
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
    }//--> fin clase
?> 
 