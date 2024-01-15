<?php
    class Ctrl {
        public function __construct() { } 
        public function nota(){     
            return gList('nota/nota'); 
        }
       	public function emitir($dt){     
       		$ser=explode('-', $dt['numero'])[0];
       		$serie=$ser.'-'.intval(explode('-', $dt['numero'])[1]); 
            echo $ser;
            $class = new Mod();
            $ts = $class->emitir($dt,$serie);
            
            if($ts){     
                ?>
                   <script>
                       aviso('info','Nota emitida correctamente!','Correcto!');
                       vAjax('facturacion','mod1','0-/<?php echo $ts ?>','modal1');
                       $('.abb').val('');$(this).attr('readonly', false);$('#detnt').html('');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al emitir la nota.','Error!');
                    </script>
                <?php
            }
        }
    }//--> fin clase
?> 
 