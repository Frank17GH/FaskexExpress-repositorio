<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList('servicios-categorias/components/table1',$dt,'tabla1'); 
        }
        public function mod1($dt){     
            return gList('servicios-categorias/components/mod1',$dt); 
        }
        public function mod2($dt){     
            return gList('servicios-categorias/components/mod2',$dt,'mod2'); 
        }
        public function insert1($dt){
            $class = new Mod();
	        if($class->insert1($dt)){     
                ?>
                   <script>
                       	aviso('info','Categoría guardada correctamente!','Correcto!');
                       	$('#myModal1').modal('hide');
                      	vAjax('servicios-categorias','tabla1','frm1','tab1');
                    </script>
                <?php
            }else{
                ?><script>aviso('danger','Error al guardar presentación.','Error!');</script><?php
            }
        }
        public function del1($dt){
            $class = new Mod();
	        if($class->del1($dt)){     
                ?>
                   <script>
                       	aviso('info','Categoría eliminada correctamente!','Correcto!');
                       	$('#tr_<?php echo $dt ?>').remove();
                    </script>
                <?php
            }else{
                ?><script>aviso('danger','Error al eliminar categoría.','Error!');</script><?php
            }
        }
        public function edit1($dt){
            $class = new Mod();
	        if($class->edit1($dt)){     
                ?>
                   <script>
                       	aviso('info','Categoría editada correctamente!','Correcto!');
                       	$('#myModal1').modal('hide');
                       	vAjax('servicios-categorias','tabla1','frm1','tab1');
                    </script>
                <?php
            }else{
                ?><script>$('#myModal1').modal('hide');aviso('warning','No se modificaron los datos.','Error!');</script><?php
            }
        }
    }//--> fin clase
?> 
 