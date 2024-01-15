<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',$dt,'tabla1'); 
        }
        public function mod1($dt){   
            return gList($_POST['nom'].'/components/mod1',$dt,'mod1','categorias'); 
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
                       vAjax('servicios','tabla1',0,'tab1');
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
        public function del1($dt){
            $class = new Mod();
            $aa=$class->del1($dt);
	        if($aa){     
                ?>
                   <script>
                       aviso('info','Servicio eliminado  correctamente!','Correcto!');
                       $('#myModal1').modal('hide');
                       vAjax('servicios','tabla1','frm1','tab1');
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
 