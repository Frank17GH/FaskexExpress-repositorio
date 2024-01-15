<?php
    class Ctrl {
        public function __construct() { } 
        public function rep_guias(){
            return gList($_POST['nom'].'/inicio', 0, 'sucursales'); 
        }
        public function vComp($id){
            return gList($_POST['nom'].'/components/detalleGuia',$id,'guia', 'detalleGuia'); 
        }
         public function tabla1($dt){     
            return gList($_POST['nom'].'/components/table1',$dt,'tabla1'); 
        }
        public function delGuia($dt){
            $class = new Mod();
            $ts = $class->delGuia($dt);
            if ($ts) {
                ?>
                    <script type="text/javascript">
                        aviso('info','Guía de remisión eliminada correctamente!.');
                        vAjax('rep_guias','tabla1','frm_repguia','listGuia');
                    </script>
                <?php
            }
        }
        public function anular($dt){
            $class = new Mod();
            $ts = $class->anular($dt);
            if ($ts[0]>0) {
                ?>
                    <script type="text/javascript">
                        aviso('info','Nota de Crpedito generada correctamente!.');
                        vAjax('rep_guias','vComp',<?php echo $ts[0] ?>,'modal');vAjax('rep_guias','tabla1','frm_repvent','list_rpvtn');
                    </script>
                <?php
            }
        }
        public function actDetalle($dt){
            $class = new Mod();
            $ts = $class->actDetalle($dt);
            if ($ts) {
                ?>
                    <script type="text/javascript">
                        aviso('info','Actualizado correctamente!.');
                    </script>
                <?php
            }
        }
    }//--> fin clase
?> 