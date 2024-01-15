<?php
    class Ctrl {
        public function __construct() {
         }
                 
        public function insert1($dt){     
            $class = new Mod();
            $ts = $class->insert1($dt);
            if ($ts) {
                ?>
                    <script> 
                        var t = <?php echo $ts['@id']; ?>                     
                        $('#myModal5').modal('show');                        
                        $("#div-modal5").html('<div class="modal-header"><button type="button" class="close"  onclick="location.reload()" aria-hidden="true">×</button>'+
                                    '<h4 class="modal-title" id="myModalLabel"><center><b>[COTIZACION CREADA CORRECTAMENTE ]</b></center></h4></div><div class="modal-body"><div class="row">'+
                                    '<div class="col-md-12"><div class="well well-sm well-primary"><form class="form form-inline" id="apro" ><center> '+
                                    '<h3>¿Deseas Aprobarlo?</h3><br><ul class="demo-btns"><li><a  class="btn btn-info" onclick="vAjax(\'cotizacion\',\'aprobar\','+t+');"> SI <i class="fa fa-check"></i></a>'+
                                    '</li><li><a id="smart-mod-eg3" class="btn btn-danger" onclick="location.reload()"> NO <i class="fa fa-remove"></i></a></li></ul></center></form></div></div></div></div>');              
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Verificar campos .');</script>
                <?php
            }
        }

        
        public function anular($dt){     
            $class = new Mod();
            $ts = $class->anular($dt);
            if ($ts) {
                ?>
                <script>aviso('warning','Verifique información');
                    location.reload();</script>
                <?php
            }else{
                ?>
                <script>
                    aviso('info','Cotizacion anulado correctamente');
                    var t = <?php echo $dt; ?>                     
                        $('#myModal5').modal('show');                        
                        $("#div-modal5").html('<div class="modal-header"><button type="button" class="close"  onclick="location.reload()" aria-hidden="true">×</button>'+
                                    '<h4 class="modal-title" id="myModalLabel"><center><b>[COTIZACION ANULADA CORRECTAMENTE ]</b></center></h4></div><div class="modal-body"><div class="row">'+
                                    '<div class="col-md-12"><div class="well well-sm well-primary"><form class="form form-inline" id="apro" ><center> '+
                                    '<h3>¿Deseas agregar algun comentario?</h3><br><input type="hidden" name="id" value="'+t+'"><textarea name="observacion" class="form-control " placeholder="Detalle" rows="6"></textarea> <ul class="demo-btns"><li><a  class="btn btn-info" onclick="vAjax(\'cotizacion\',\'anular_1\',\'apro\');"> Agregar <i class="fa fa-check"></i></a>'+
                                    '</li><li><a id="smart-mod-eg3" class="btn btn-danger" onclick="location.reload()"> NO <i class="fa fa-remove"></i></a></li></ul></center></form></div></div></div></div>');  
                </script> 
                <?php
            }
        }

        public function anular_1($id){    
            $class = new Mod();
            $ts = $class->anular_1($id);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Observacion agregada correctamente');
                        location.reload();
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('info','Observacion agregada correctamente');
                        location.reload();
                    </script>
                <?php
            }
        }

        public function update_cot($dt){    
            $class = new Mod();
            $ts = $class->update_cot($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Actualizado  correctamente');
                        location.reload();
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('info','Actualizado  correctamente');
                        location.reload();
                    </script>
                <?php
            }
        }

        

        public function tabla_uservicios($id){     
            return gList('cotizacion/components/tabla_uservicios',$id,'detalle');             
            ?>
            <script>aviso('info','Cargando servicios ');</script>
            <?php                
        }

        public function aprobar($id){    
            $class = new Mod();
            $ts = $class->aprobar($id);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Cotizacion aprobada correctamente');
                        location.reload();
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('info','Cotizacion aprobada correctamente');
                        location.reload();
                    </script>
                <?php
            }
        }

        public function upd_item($id){    
            $class = new Mod();
            $ts = $class->upd_item($id);
            if ($ts) {
                ?>
                <script>
                     aviso('info','Servicio Actualizado correctamente');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('info','Servicio Actualizado correctamente');
                    </script>
                <?php
            }
        }

   
        public function mod_servicio($id){
            return gList($_POST['nom'].'/components/mod_servicio',$id,'detalle'); 
        }
        public function mod_detservicio($dt){ 
            return gList($_POST['nom'].'/components/mod_detservicio',$dt,'mod_detservicio'); 
        }
        public function table1($id){
            return gList($_POST['nom'].'/components/table1',$id,'ser_det'); 
        }
        public function tabla2(){
            return gList('cotizacion/components/table2');
        }
        public function insert2($dt){    
            $class = new Mod();
            $ts = $class->insert2($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Servicio agregado correctamente');
                        $('#myModal5').modal('hide');                        
                        vAjax('cotizacion','tabla2',0,'temp');                        
                    </script>
                <?php
            }else{
                ?>
                     <script>aviso('warning','Verificar campos ');
                    </script>
                <?php
            }
        }
        public function insert3($dt){    
            $class = new Mod();
            $ts = $class->insert3($dt);
            if ($ts) {
                ?>
                    <script>
                        aviso('info','Servicio agregado correctamente');
                        vAjax('cotizacion','mod1',<?php echo $dt['idcotizacion'];?>,'modal2');                        
                        $('#myModal3').modal('hide');                       
                    </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Verificar campos ');
                    </script>
                <?php
            }
        }
        public function mod111($id){
            return gList($_POST['nom'].'/components/mod1',$id,'mod1', 'mod1_2'); 
        }       
        public function mod1($id){
            return gList($_POST['nom'].'/components/mod1',$id,'cotizacion'); 
        }
        public function mod2($id){
            return gList($_POST['nom'].'/components/mod2',0,'servicios'); 
        }
        public function mod3($id){
            return gList($_POST['nom'].'/components/mod3',$id,'mod3','verificar'); 
        }
         public function mod_editser($id){
            return gList($_POST['nom'].'/components/mod_editser',$id,'mod3_1'); 
        }
        public function mod4($id){
            return gList($_POST['nom'].'/components/mod4'); 
        }
        public function sel1($id){
            return gList($_POST['nom'].'/components/sel1',$id,'sel1'); 
        }
        public function selnom($id){
            return gList($_POST['nom'].'/components/selnom',$id,'selnom'); 
        }
        public function selamb($id){
            return gList($_POST['nom'].'/components/selamb',$id,'selamb'); 
        }                 
        public function sel2($id){
            return gList($_POST['nom'].'/components/sel2',$id,'detalle','sel2'); 
        }
        public function print($id){
            ?>
                <script>
                    window.open('http://sistemas.faskex.com/app/modules/cotizacion/components/print.php?id=<?php echo $id ?>', "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no");
                </script>
            <?php
        }

        

        public function del_det($dt){     
            $class = new Mod();
            $ts = $class->del_det($dt);
            if ($ts) {
                ?>
                <script>                    
                    aviso('info','Servicio quitado correctamente');                                        
                    var id = '<?php echo explode('-/', $dt)[1];?>'
                    vAjax('cotizacion','mod1',id,'modal2');
                </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Verifique información');                   
                   </script>
                <?php
            }
        }

        public function del1($dt){     
            $class = new Mod();
            $ts = $class->del1($dt);
            if ($ts) {
                ?>
                <script>
                    aviso('info','Servicio quitado correctamente');                     
                    vAjax('cotizacion','tabla2',0,'temp');               
                </script>
                <?php
            }else{
                ?>
                    <script>aviso('warning','Verifique información');
                    location.reload();</script>
                <?php
            }
        }

        public function del_temp(){     
            $class = new Mod();
            $ts = $class->del_temp();
            if ($ts) {
                ?>
                <script>
                    aviso('info','Limpiados correctamente');                     
                    vAjax('cotizacion','tabla2',0,'temp');               
                </script>
                <?php
            }else{
                ?>
                <script>
                    aviso('warning','No se encontraron temporales');
                    vAjax('cotizacion','tabla2',0,'temp');
                </script>
                <?php
            }
        }
        
    }//--> fin clase
?> 
 