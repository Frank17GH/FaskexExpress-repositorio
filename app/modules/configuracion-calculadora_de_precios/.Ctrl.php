<?php
    class Ctrl {
        public function __construct() { } 
        public function tabla1($dt){     
            return gList('configuracion-calculadora_de_precios/components/table1',$dt,'tabla1'); 
        }
        public function mod1($dt){    
        	$dt=explode('-/', $dt);
            $class = new Mod();
            $ts = $class->mod1($dt[0],$dt[1],$dt[2],$dt[3],$dt[4]);
            if ($ts) {
                ?>
                    <script>
                    	aviso('info','Datos actualizados correctamente correctamente');
                    	$('#tr<?php echo $dt[2] ?>').removeClass('danger');
                	</script>
                <?php
            }else{
            	?>
                    <script>
                    	aviso('danger','Error al actualizar datos');
                    	$('#tr<?php echo $dt[2] ?>').removeClass('danger');
                	</script>
                <?php
            }
        }
    }
?> 
 