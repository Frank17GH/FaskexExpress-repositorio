<?php
    class Ctrl {
        public function __construct() { } 
        
        public function apo_tabla($id){     
            return gList('pro_masivo/components/apo_tabla',$id,'apo_tabla'); 
        }
        public function apo_agregar($dt){     
            $class = new Mod();
            $ts = $class->apo_agregar($dt);
            if ($dt['idapoyo']){
                if ($ts) {
                ?>
                    <script>                        
                        aviso('info','Item actualizado correctamente');                       
                        Orden($("#numorden").val(),$("#vserie").val());
                    </script>
                <?php }else{ ?>
                        <script>aviso('warning','Verificar datos de actualizacion');</script>
                    <?php
                }

            } else {

                 if ($ts) {
                ?>
                    <script>
                        aviso('info','Item creada correctamente');
                        Orden($("#numorden").val(),$("#vserie").val());
                    </script>
                <?php
                }else{
                    ?>
                        <script>aviso('warning','Los datos de Registro estan completos');</script>
                    <?php
                }

            }            
        }

        public function mod1($id){             	
        	return gList('pro_masivo/components/mod1',$id,'apo_detalle');         	
        }
        public function mod_registros($dt){              
            return gList('pro_masivo/components/mod_registros',$dt,'cu_detalle');           
        }

        public function del_apoyo($id){     
            $class = new Mod();
            $ts = $class->del_apoyo($id);
            if ($ts) {
                ?>
                <script>
                    aviso('info','Elemento quitado correctamente'); 
                    Orden($("#numorden").val());                    
                </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('warning','Error, elemento no puede eliminarse');
                    </script>
                <?php
            }
        }

        public function apo_generar($dt){     
            $class = new Mod();
            $ts = $class->apo_generar($dt);
            if ($ts) {
                ?>
                <script>
                    aviso('info','Base Genarada correctamente'); 
                    Orden($("#numorden").val());                    
                </script>
                <?php
            }else{
                ?>
                <script>
                    aviso('warning','Error, Verificar el numero de registros');
                </script>
                <?php
            }
        }



    }
?> 
 