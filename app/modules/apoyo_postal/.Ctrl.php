<?php
    class Ctrl {
        public function __construct() { } 

        public function Exportar($dt){            
           ?>
                <script>
                    location.href ="https://sistemas.faskex.com/app/modules/apoyo_postal/components/Exportar.php?id=<?php echo explode('-/', $dt)[0] ?>&code=<?php echo explode('-/', $dt)[1] ?>&cotiza=<?php echo explode('-/', $dt)[2] ?>&fecha=<?php echo explode('-/', $dt)[3] ?>&cliente=<?php echo explode('-/', $dt)[4] ?>&servicio=<?php echo explode('-/', $dt)[5] ?>";
                </script>
           <?php   
        }

        public function update1($dt){
           $class = new Mod();
            $insert = $class->update1($dt);           
            $cliente =  explode('-/', $dt)[6];          
            if($insert){     
                ?>
               <script>
                        aviso('danger','No hay datos para registrar.','Error!');
                    </script>
                <?php
            }else{ 
                ?>
                 <script>
                vAjax('apoyo_postal','tbl_apoyo_postal',<?php echo  $cliente; ?>,'lista');
                aviso('info','Item actualizado correctamente!','Correcto!');                                
                
                    </script>  

                <?php
            }
        }

        public function update2($dt){
           $class = new Mod();
            $insert = $class->update2($dt);           
            if($insert){     
                ?>
               <script>
                        aviso('danger','No hay datos para registrar.','Error!');
                    </script>
                <?php
            }else{ 
                ?>
                 <script>                            
                vAjax('apoyo_postal','tbl_apoyo_postal',<?php echo  $dt['idorden']; ?>,'lista');
                aviso('info','Item actualizado correctamente!','Correcto!');                
                $('#myModal5').modal('hide');
                    </script>                  
                <?php
            }
        }

         public function estado($dt){
            $class = new Mod();
            $insert = $class->estado($dt);           
            $orden =  explode('-/', $dt)[1];          
            if($insert){     
                ?>
               <script>
                        aviso('danger','No hay datos para registrar.','Error!');
                </script>
                <?php
            }else{ 
                ?>
                 <script>
                aviso('info','Aprobado correctamente!','Correcto!');                
                vAjax('apoyo_postal','mod1',<?php echo  $orden; ?>,'modal3')                
                    </script>                               
                <?php
            }
        }

		public function mod1($id){     
            return gList('apoyo_postal/components/mod1',$id,'orden_trabajo'); 
        }

        public function mod2($id){     
            return gList('apoyo_postal/components/mod2',$id,'item_apoyo'); 
        }
       
        public function tbl_apoyo_postal($id){     
            return gList('apoyo_postal/components/tbl_apoyo_postal',$id,'apoyo_postal','orden_trabajo');             
            ?>
            <script>aviso('info','Cargando Datos ');</script>
            <?php                
        }

         public function tableInicio($id){     
            return gList('apoyo_postal/components/table-inicio',0,'lista_orden');             
                           
        }

        public function excel($id){  
            return gList($_POST['nom'].'/components/excel/excel',$id);     
        }
        public function envio($dt){
            return gList($_POST['nom'].'/components/envio',$dt); 
        }         
    }

?> 
 