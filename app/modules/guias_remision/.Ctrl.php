<?php

    class Ctrl {
        public function __construct() { } 
        public function guias_remision(){     
            return gList($_POST['nom'].'/guias_remision', 0, 'viajes', 'series'); 
        }
        public function facturarGuia(){     
            return gList($_POST['nom'].'/facturarGuia', 0); 
        }
        public function tabla1($data){     
            return gList($_POST['nom'].'/table1',0,'guias'); 
        }
        public function mostrarGuia($data){
            $class = new Mod();
            $tsArray = $class->mostrarGuia($data);
            if ($tsArray) {
                ?>
                    <script type="text/javascript">
                        $('#myModal').modal('hide');
                        aviso('info','Datos de la Guia cargados correctamente!.');
                        $('#idguia').val(<?php echo explode('-/', $data)[0] ?>);
                        $('#numDni1').val('<?php echo explode('-/', $data)[1] ?>');
                        FClient(0, 1);
                        FProd(4);
                    </script>
                <?php
            }
        }
        public function viewChoferes($id){
            return gList('guias_remision/viewChoferes',$id,'viewChoferes');
        }
        public function viewPlacas($id){
            return gList('guias_remision/viewPlacas',$id,'viewPlacas');
        }
        public function addprod($data){
            $class = new Mod();
            $tsArray = $class->addprod($data);
            if ($tsArray) {
                ?>
                    <script type="text/javascript">
                        aviso('info','Bien agregado correctamente!.');
                        $("#guia_codigoprod_0").val('').select();
                        $("#guia_nomprod_0").val('');
                        $("#guia_medidaprod_0").val('');
                        $("#guia_cantprod_0").val('');
                        
                        FGuia(4);
                    </script>
                <?php
            }
        }
        public function delbien($id){     
            $class = new Mod();
            $tsArray = $class->delbien($id);
            if ($tsArray) {
                ?>
                    <script type="text/javascript">
                        $("#tr_"+<?php echo $id ?>).remove();
                        aviso('info','Bien eliminado correctamente!.');
                        $('#guia_codigoprod').select();
                    </script>
                <?php
            }
        }
        public function guardar($data){     
            $class = new Mod();
            $tsArray = $class->guardar($data);
            print_r($tsArray);
            ?>
                <script type="text/javascript">
                    $("#nomClient2").val('');
                    $("#numDni2").val('');
                    $("#nomClient3").val('');
                    $("#numDni3").val('');
                    $("#bienes").html('');
                    confir('Comprobante emitido correctamente!','<i class="fa fa-clock-o"></i> <i>¿Imprimir comprobante: [ <?php echo $data['serie'].'-'.$tsArray['@num'] ?> ] ?</i>','documentos','printGuia',<?php echo $tsArray['@st'] ?>);
                </script>
            <?php
        }
    }//--> fin clase
?> 
 