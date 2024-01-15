<?php
    class Ctrl {
        public function __construct() { } 

        public function tbl_temporal($dt){    
            return gList('exp_salidaruta/components/tbl_temporal',$dt,'tbl_temporal'); 
        }

        public function tbl_detalle($dt){    
            return gList('exp_salidaruta/components/tbl_detalle',$dt,'tbl_detalle'); 
        }

        public function tbl_buscar($dt){    
            return gList('exp_salidaruta/components/tbl_buscar',$dt,'mod_buscar'); 
        }

        public function mod_buscar($dt){              
            return gList('exp_salidaruta/components/mod_buscar');           
        }

        public function frm_salidanew($id){
            return gList('exp_salidaruta/components/frm_salidanew',$id,'salida_nuevo');              
        }
        
        public function frm_update($id){ 
            ?>
             <script>
                aviso('info','Cargando informacion!','Correcto!');  
                vAjax('exp_salidaruta','frm_salidanew',<?php echo $id ?>,'frm_nuevo');
                vAjax('exp_salidaruta','tbl_detalle',<?php echo $id ?>,'det');                    
                $('#myModal3').modal('hide');   
            </script>                
            <?php                
        } 

        public function del_temp($dt){     
            $class = new Mod();
            $insert = $class->del_temp($dt);
            if($insert){  ?>
                <script>
                aviso('info','Elemento quitado correctamente!','Correcto!');  
                vAjax('exp_salidaruta','tbl_temporal',0,'temp')                     
                </script>
            <?php }else{ ?>
                <script>
                    aviso('danger','Error al quitar Elemento.','Elemento se encuentra en otro proceso!');
                </script>
            <?php }
        }  

        public function salida_guardar($dt){     
            $class = new Mod();
            $ts = $class->salida_guardar($dt);
            if ($ts) { ?>
                <script>                    
                    aviso('info','Despacho creado correctamente');                       
                    vAjax('exp_salidaruta','frm_update',0);
                    vAjax('exp_salidaruta','tbl_temporal',0,'temp');
                </script>
            <?php }else{ ?>
                <script>
                    aviso('warning','Solicitar un token, para su Modificación');
                </script>
                <?php
            }
        }

        public function saveDet($dt){           
             $class = new Mod();
            $insert = $class->saveDet($dt);       
            if ($insert) {
                ?>
                    <script>
                        aviso('info','Paquete Agregado!');
                        vAjax('exp_salidaruta','tbl_temporal',0,'temp'); 
                    </script>
                <?php
            }else {
                ?>
                    <script>
                        aviso('warning','Paquete ya esta asignado o no disponible');
                   </script>
                <?php  
            }
            
        }      
        
        
        public function apo_agregar($dt){     
            $class = new Mod();
            $ts = $class->apo_agregar($dt);
            if ($dt['idapoyo']){
                if ($ts) {
                ?>
                    <script>                        
                        aviso('info','Item actualizado correctamente');                       
                        Orden($("#numorden").val());
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
                        Orden($("#numorden").val());
                    </script>
                <?php
                }else{
                    ?>
                        <script>aviso('warning','Los datos de Registro estan completos');</script>
                    <?php
                }

            }            
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
 