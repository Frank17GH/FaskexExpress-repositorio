<?php
    class Ctrl {
        public function __construct() { } 
        public function comp1($id){
            return gList($_POST['nom'].'/components/comp1',$id,'comp1'); 
        }
        public function mod1($id){
            return gList($_POST['nom'].'/components/mod1',$id,'mod1','mod1_2'); 
        }
        public function table2($id){
            return gList($_POST['nom'].'/components/table2',$id,'dtprod'); 
        }
        public function table3($id){ 
            return gList($_POST['nom'].'/components/table3',$id,'table3'); 
        }
        public function table4($id){ 
            return gList($_POST['nom'].'/components/table4',$id,'table4'); 
        }
        public function envio($dt){
            return gList($_POST['nom'].'/components/envio',$dt); 
        }
        public function mod2($id){     
            ?>
                <script>
                    window.open('<?php echo __IP__.__HOME__.__MOD__; ?><?php echo $_POST['nom'] ?>/printc.php?id=<?php echo $id ?>', "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no");
                </script>
            <?php
        }
        public function mod3($id){     
            ?>
                <script>
                    window.open('<?php echo __IP__.__HOME__.__MOD__; ?><?php echo $_POST['nom'] ?>/printA4.php?id=<?php echo $id ?>', "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no");
                </script>
            <?php
        }
        public function pguia1($id){     
            ?>
                <script>
                    window.open('<?php echo __IP__.__HOME__.__MOD__; ?><?php echo $_POST['nom'] ?>/pguia1.php?id=<?php echo $id ?>', "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no");
                </script>
            <?php
        }
        public function mod4($id){
            return gList($_POST['nom'].'/components/mod4',$id); 
        }
        public function mod5($id){
            return gList($_POST['nom'].'/components/mod2',$id); 
        }
        public function mod6($id){
            return gList($_POST['nom'].'/components/mod6',$id,'sel12'); 
        }
        public function mod7($id){
            return gList($_POST['nom'].'/components/mod7',$id,'comp9','comp10'); 
        }
        public function mod8($id){
            return gList($_POST['nom'].'/components/mod8',$id); 
        }
        public function mod9($id){
            return gList($_POST['nom'].'/components/mod9',$id,'comp9','comp10'); 
        }
        public function insert1($dt){     
            $class = new Mod();
            $tsArray = $class->insert1($dt);
            if ($tsArray['@num']) {
                $sSerie=$dt['serie'].'-'.str_pad($tsArray['@num'], 8, '0', STR_PAD_LEFT);
                if ($tsArray['@num']==(int)$dt['correlativo']) {
                    ?>
                    <script>
                        avent($('#view2').val());
                        reSUN();
                        vAjax('facturacion','mod1','1-/<?php echo $tsArray['@st'] ?>','modal1');
                        vAjax('facturacion','table2',1,'prods');
                      //  Envi(<?php echo $tsArray['@st'] ?>);
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        avent($('#view2').val());
                        vAjax('facturacion','mod1','2-/<?php echo $tsArray['@st'] ?>','modal1');
                        vAjax('facturacion','table2',1,'prods');
                    </script>
                    <?php
                }
            }else{
                ?>
                    <script> aviso('danger','Error al guardar venta!.');</script>
                <?php
            }
        }
        public function insert2($dt){     
            $class = new Mod();
            $ts = $class->insert2($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Caja aperturada correctamente');</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');location.reload();</script>
                <?php
            }
        }
        public function del2($dt){     
            $class = new Mod();
            $ts = $class->del2($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Comprobante anulado correctamente');Envi('2-<?php echo $dt ?>')</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');location.reload();</script>
                <?php
            }
        }
        public function del3($dt){     
            $class = new Mod();
            $ts = $class->del3($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','Registro eliminado correctamente');vAjax('reportes-ventas','tabla1','frm1','tbl1');</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Ya hay una caja aperturada.');location.reload();</script>
                <?php
            }
        }
        public function eliminar($dt){     
            $class = new Mod();
            $ts = $class->eliminar($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','CPE eliminado correctamente');vAjax('reportes-ventas','tabla1','frm1','tbl1');</script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Error al eliminar el CPE');location.reload();</script>
                <?php
            }
        }
        public function insert3($dt){    
            $class = new Mod();
            $ts = $class->insert3($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Encomienda registrada correctamente');
                        vAjax('facturacion','table2',1,'prods');$('#myModal3').modal('hide');
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Solo puedes hacer 01 envio de CARGO por comprobante');</script>
                <?php
            }
        }
        public function insert4($dt){    
            $class = new Mod();
            $ts = $class->insert4($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','GRE - REMITENTE registrada correctamente');vAjax('facturacion','mod1','0-/<?php echo $dt ?>','modal1');</script>

                <?php
            }
        }
        public function insert5($dt){    
            $class = new Mod();
            $ts = $class->insert5($dt);
            if ($ts) {
                ?>
                    <script>aviso('info','GRE - TRANSPORTISTA registrada correctamente');vAjax('facturacion','mod1','0-/<?php echo $dt ?>','modal1');</script>

                <?php
            }
        }
        public function insert6($dt){    
            $class = new Mod();
            $ts = $class->insert3($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Producto agregado correctamente');
                        $('#myModal1').modal('hide');
                        vAjax('facturacion','table2',<?php echo $dt[tpp] ?>,'prods');$('#myModal4').modal('hide');
                    </script>

                <?php
            }else{
                ?>
                     <script>aviso('warning','No se puede agregar productos, porque se tiene una venta de CARGO en curso');$('#myModal1').modal('hide');</script>
                <?php
            }
        }
        public function del1($id){     
            $class = new Mod();
            $tsArray = $class->del1($id);
            if ($tsArray) {
                ?>
                    <script>
                        $("#tr_<?php echo $id ?>").remove();
                        actTot();
                        aviso('info','Item eliminado correctamente!.');
                    </script>
                <?php
            }
        }
    }//--> fin clase
?> 
 