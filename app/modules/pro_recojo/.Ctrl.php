<?php
    class Ctrl {
        public function __construct() { } 

        public function frm_recojo ($dt){    
            return gList($_POST['nom'].'/components/frm_recojo',$dt,'frm_recojo'); 
        }



        public function tbl_ ($dt){    
            return gList($_POST['nom'].'/components/tbl_',$dt,'tbl_'); 
        }

        

        public function sav_ ($dt){           
            $class = new Mod();
            $sav = $class->sav_ ($dt);       
            if ($sav) {  ?>
                <script>
                    aviso('info',' Agregado con éxito!');
                    
                </script>
            <?php } else { ?>
                <script>
                    aviso('warning','Verificar datos');
                </script>
            <?php }            
        }    

        public function del_ ($id){     
            $class = new Mod();
            $del = $class->del_temp($id);
            if($del){  ?>
                <script>
                    aviso('info','Eliminado correctamente!','Correcto!');  
                                       
                </script>
            <?php } else { ?>
                <script>
                    aviso('danger','Error al quitar Elemento.','Elemento se encuentra en otro proceso!');
                </script>
            <?php }
        }          
                         
        public function upd_ ($dt){     
            $class = new Mod();
            $upd = $class->upd_ ($dt);
            if ($dt['idapoyo']){
                if ($upd) { ?>
                    <script>                        
                        aviso('info','Item actualizado correctamente');                       
                        Orden($("#numorden").val());
                    </script>
                <?php }else{ ?>
                    <script>
                        aviso('warning','Verificar datos de actualizacion');
                    </script>
                <?php }

            } else {
                if ($ts) {  ?>
                    <script>
                        aviso('info','Item creada correctamente');
                        Orden($("#numorden").val());
                    </script>
                <?php }else{ ?>
                    <script>
                        aviso('warning','Los datos de Registro estan completos');
                    </script>
                <?php }
            }            
        }
    }
?> 
 