<?php
    class Ctrl {
        public function __construct() { } 
        public function guia_varias(){
            return gList('guia_varias/inicio',0); 
        }
        public function tabla1($dt){     
            return gList('guia_varias/table_mov',$dt,'tabla1'); 
        }
        public function valesCliente($id){
            return gList('guia_varias/table_mov',$id,'valesCliente');
        }
        public function valesClienteFac($id){
            return gList('guia_varias/detprins',$id,'valesClienteFac');
        }
        public function vCaja($id){ 
            return gList('guia_varias/vCaja',$id,'vCaja','ingresos','egresos','ventas'); 
        }
        public function vMCaja($id){ 
            return gList('guia_varias/vmcaja',$id,'detGuia'); 
        }
        public function vMov($data){  
             return gList('guia_varias/vMov'); 
        }
        public function vDetP(){
            return gList('guia_varias/detprins',0,'resumen','pendientes');
        }
        public function Seleccionguia($id){
            $class = new Mod();
            $tsArray = $class->Seleccionguia($id);
            print_r($tsArray);
            if ($tsArray>0) {
                ?>
                    <script type="text/javascript">
                        sAlert('info','Factura Actualizada!');
                        vAjax('guia_varias','valesCliente',$("#idClientCP").val(),'detCPrins');
                        vAjax('guia_varias','valesClienteFac',$("#idClientCP").val(),'Detalle_v');
                    </script>
                <?php
            }
        }
        public function savFac($data){
            date_default_timezone_set('America/Lima');
            $fecha=date("Y-m-d H:i:s");
            // $start_ts = strtotime($data[fec_val]); 
            // $end_ts = strtotime(date("d-m-Y")); 
            // $diff = ($end_ts - $start_ts)/86400; 
            // $fecha=$data[fec_val]."T".$hora;
            $diff = 0; 

            if ($diff<=5 && $diff>=0) {
                $class = new Mod();
                $tsArray = $class->savFac($data,$fecha);
                print_r($tsArray);
                if ($tsArray>0) {
                    print_r($tsArray);
                    ?>
                        <script type="text/javascript">
                            sAlert('info','Venta Registrada!');
                            $("#fec_val").val('<?php echo date("Y-m-d");?>');
                            vAjax('guia_varias','valesCliente',$("#idClientCP").val(),'detCPrins');
                            vAjax('guia_varias','valesClienteFac',$("#idClientCP").val(),'Detalle_v');
                            aVentas(4);
                            //vAjax('ventas','vPrintA4',<?php //echo $tsArray[0] ?>,'alerta');
                            vAjax('facturacion','vPrint',<?php echo $tsArray[1] ?>,'alerta');
                        </script>
                    <?php
                }
            } else {
                ?>
                    <script type="text/javascript">
                        sAlert('warning','Fecha no valida');
                    </script>
                <?php
            }
            
        }
        public function nMov($data){
            $class = new Mod();
            $tsArray = $class->nMov($data);
            if ($tsArray>0) {
                ?>
                    <script type="text/javascript">
                        sAlert('info','Cliente guardado correctamente!');
                        $('#myModal').modal('hide');
                        Fguia_varias();
                    </script>
                <?php
            }else{
                ?>
                    <script type="text/javascript">
                        sAlert('danger','Error al guardar el nuevo movimiento');
                <?php     
            }
        }
        public function actGuia($data){
            $class = new Mod();
            $tsArray = $class->actGuia($data);
            if ($tsArray>0) {
                ?>
                    <script type="text/javascript">
                        sAlert('info','Guia Actualizada');
                        $('#myModal').modal('hide');
                        vAjax('guia_varias','valesCliente',$("#idClientCP").val(),'detCPrins');
                        vAjax('guia_varias','valesClienteFac',$("#idClientCP").val(),'Detalle_v');
                    </script>
                <?php
            }else{
                ?>
                    <script type="text/javascript">
                        sAlert('danger','Error al guardar el nuevo movimiento');
                <?php     
            }
        }
        public function Cancel($data){  
            $class = new Mod();
            $tsArray = $class->Cancel($data);   
            if ($tsArray[0][0]) {
                ?>
                    <script type="text/javascript">
                        sAlert('info','Acción Cancelada correctamente->');
                        Fguia_varias();
                        Fcaja_resumen();
                        vAjax('caja_resumen','detCaja',<?php echo $data ?>,'detCaja');
                    </script>
                <?php
            }else{
                ?>
                    <script type="text/javascript">
                        sAlert('danger','No se puede cambiar el estado, debido a que ya hay una caja activa');
                    </script>
                <?php
            }
        }
        public function savCaja($data){  
            $class = new Mod();
            $tsArray = $class->savCaja($data);   
            if ($tsArray[0][0]) {
                ?>
                    <script type="text/javascript">
                        sAlert('info','Acción Cancelada correctamente->');
                        $('#myModal').modal('hide');
                        Fguia_varias();
                        Fcaja_resumen();
                        vAjax('caja_resumen','detCaja',<?php echo $tsArray[0][0] ?>,'detCaja');
                    </script>
                <?php
            }else{
                ?>
                    <script type="text/javascript">
                        sAlert('danger','No se puede cambiar el estado, debido a que ya hay una caja activa');
                    </script>
                <?php
            }
        }
    }//--> fin clase
?> 
 