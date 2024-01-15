<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',$dt,'tabla1'); 
        }
        public function mod1($dt){   
            return gList($_POST['nom'].'/components/mod1',$dt,'mod1','categorias','marcas'); 
        }
        public function mod2($dt){     
            return gList($_POST['nom'].'/components/mod2',$dt,'mod2','medida'); 
        }
        public function insert1($dt){
            $class = new Mod();
            if($class->insert1($dt)){     
                ?>
                   <script>
                       aviso('info','Producto agregado/actualizado correctamente!','Correcto!');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar producto.','Error!');
                    </script>
                <?php
            }
        }
        public function insert2($dt){
            $class = new Mod();
	        if($class->insert2($dt)){     
                ?>
                   <script>
                       aviso('info','Presentación guardada correctamente!','Correcto!');
                       $('.press').val('');
                       vAjax('productos','mod2',<?php echo $dt['id'] ?>,'modal2');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar presentación.','Error!');
                    </script>
                <?php
            }
        }
        public function del2($dt){
            $class = new Mod();
            $aa=$class->del2($dt);
            if($aa){     
                ?>
                   <script>
                       aviso('info','Producto eliminado correctamente!','Correcto!');
                       vAjax('productos','tabla1',0,'tab1');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('warning','No se puede eliminar el producto seleccionado.','Error!');
                    </script>
                <?php
            }
        }
        public function del1($dt){
            $class = new Mod();
            $aa=$class->del1(explode('-/', $dt)[0],explode('-/', $dt)[1]);
	        if($aa){     
                ?>
                   <script>
                       aviso('info','Presentación eliminada correctamente!','Correcto!');
                       $('#pr_<?php echo explode('-/', $dt)[0] ?>').remove();
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('warning','No se puede eliminar todas las presentaciones.','Error!');
                    </script>
                <?php
            }
        }
    }//--> fin clase
?> 
 