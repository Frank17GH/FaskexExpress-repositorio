<?php
    class Ctrl {        
        public function __construct() { } 

        public function frm_descargop($dt){    
            return gList($_POST['nom'].'/components/frm_descargop',$dt,'sel_mensajero'); 
        }
        public function tbl_descargop($dt){    
            return gList($_POST['nom'].'/components/tbl_descargop',$dt,'tbl_descargop','tbl_descargop_com'); 
        }
        public function tbl_descargop_pendientes($dt){    
            return gList($_POST['nom'].'/components/tbl_descargop_pendientes',$dt,'tbl_descargop_pendientes'); 
        }
        public function mod_Buscar($id)
        {
            return gList($_POST['nom'].'/components/mod_Buscar'); 
        }
        public function mod_Descargo($id)
        {
            return gList($_POST['nom'].'/components/mod_Descargo',$id,'mod_Descargo'); 
        }
        public function mod_Detalle($id)
        {
            return gList($_POST['nom'].'/components/mod_Detalle',$id,'mod_Detalle'); 
        }
        public function tbl_Buscar($id)
        {
            return gList($_POST['nom'].'/components/tbl_Buscar',$id,'tbl_Buscar','tbl_Buscar_com'); 
        }

        public function consultar_codigo($id)
        {
            $class = new Mod();
            $ts = $class->consultar_codigo($id);
            if ($ts) { ?>
                <script>                    
                    aviso('info','Encontrado ');  
                </script>
            <?php }else{ ?>
                <script>
                    aviso('warning','Documento no Encontrado');                    
                </script>
                <?php
            }  
        }

        public function upd_Entrega($dt){     
            $class = new Mod();
            $ts = $class->upd_Entrega($dt);
            if ($ts) { ?>
                <script>                    
                    aviso('info','Descargo guardado correctamente');  
                    
                </script>
            <?php }else{ ?>
                <script>
                    aviso('warning','No se realizaron cambios');
                   
                </script>
                <?php
            }
        } 


    }
?> 
 