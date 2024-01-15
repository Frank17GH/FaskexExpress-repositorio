<?php

    class Ctrl {

        public function __construct() { } 

         public function tabla1($dt){    
            return gList('despacho/table1',$dt,'tabla1','vIndicador'); 
        }
         public function tabla2($dt){    
            return gList('despacho/table2',$dt,'tabla2'); 
        }
        public function tabla3($dt){    
            return gList('despacho/table3',$dt,'tabla2'); 
        }

         public function del1($dt){     
            $class = new Mod();
            $insert = $class->del1($dt);
            if($insert){ ?>
                <script>
                aviso('info','Paquete quitado correctamente!','Correcto!');  
                vAjax('despacho','tabla2',0,'lista')                     
                </script>
            <?php }else{ ?>
                <script>
                aviso('danger','Error al quitar paquete.','Error!');
                </script>
            <?php }
        }

         public function cre_despacho($dt){     
            $class = new Mod();
            $ts = $class->cre_despacho($dt);
            if ($ts) { ?>
                <script>                    
                    aviso('info','Despacho creado correctamente');  
                     $('#myModal3').modal('hide');  
                     vAjax('despacho','tabla1',0,'tbl1');
                </script>
            <?php }else{ ?>
                <script>
                    aviso('warning','Hay un problema.');
                </script>
                <?php
            }
        }   

        public function vPend($dt){     
            return gList('despacho/vPend',$dt); 
        }

        public function mRut($dt){     
            return gList('despacho/mRut',$dt,'mod1');            
        }

        public function saveDet($dt){           
             $class = new Mod();
            $insert = $class->saveDet($dt);       
            if ($insert) {
                ?>
                    <script>
                        aviso('info','Paquete Agregado!');
                        vAjax('despacho','tabla2',0,'lista'); 
                        document.getElementById("frm2").reset();                                                                     
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

        public function vDet($dt){     
            return gList('despacho/vDet',$dt,'vDetalle'); 
        }

        public function dIt($dt){
            $class = new Mod();
            $tsArray = $class->dIt($dt);
            if ($tsArray>0) {
                ?>
                    <script>
                        sAlert('info','Itinerario eliminado correctamente!');
                        $('#trl_<?php echo $dt ?>').remove();
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        sAlert('danger','Error al eliminar Itinerario');
                    </script>
                <?php     
            }
        }
        public function anularMani($dt){
            $class = new Mod();
            $tsArray = $class->anularMani($dt);
            if ($tsArray>0) {
                ?>
                    <script>
                        sAlert('info','Manifiesto Anulado');
                        vAjax('viajes','tabla1','frm_lviajes','list_viajes');
                    </script>
                <?php
            }
        }

        public function dRut($dt){
            $class = new Mod();
            $tsArray = $class->dRut($dt);
            if ($tsArray>0) {
                ?>
                    <script>
                        sAlert('info','Viaje eliminado correctamente!');
                        $('#myModal').modal('hide');
                        vAjax('viajes','tabla1','frm_lviajes','list_viajes');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        sAlert('danger','Error al eliminar Ruta');
                    </script>
                <?php     
            }
        }

        public function saveViaje($data){
            $class = new Mod();
            $tsArray = $class->saveViaje($data);
            if ($tsArray>0) {
                ?>
                    <script>
                        sAlert('info','Viaje creado correctamente!');
                        $('#myModal').modal('hide');
                        vAjax('viajes','tabla1','frm_lviajes','list_viajes');
                    </script>
                <?php
            }
        }

        public function upViaje($data){
            $class = new Mod();
            $tsArray = $class->upViaje($data);
            if ($tsArray>0) {
                ?>
                    <script>
                        sAlert('info','Viaje actualizado correctamente!');
                        $('#myModal').modal('hide');
                        vAjax('viajes','tabla1','frm_lviajes','list_viajes');
                    </script>
                <?php
            }
        }

        public function saveMani($dt){
        	$class = new Mod();
            $tsArray = $class->saveMani($dt);
            if ($tsArray>0) {
                ?>
                    <script>
                        sAlert('info','Manifiesto Registrado!');
                        vAjax('viajes','vMani',$("#idM").val(),'modal');
                        vAjax('viajes','tabla1','frm_lviajes','list_viajes');
                    </script>
                <?php
            }
        }

        public function vPrintMan($dt){
        	?><script type="text/javascript">
            window.open('http://<?php echo __IP__.__HOME__.__MOD__; ?>despacho/printMan.php?id=<?php echo $dt ?>', "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no,width="+(screen.availWidth)+",height ="+(screen.availHeight));
            </script><?php
        }

        public function copiaRuta($data){
            $class = new Mod();
            $tsArray = $class->copiaRuta($data);
            if ($tsArray>0) {
                ?>
                    <script>
                        sAlert('info','Ruta guardada correctamente!');
                        $('#myModal').modal('hide');
                        vAjax('viajes','tabla1',0,'list_rut');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        sAlert('info','La Ruta ya exisre!');
                    </script>
                <?php     
            }
        }
    }//--> fin clase
?> 

 