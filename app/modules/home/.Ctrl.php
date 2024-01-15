<?php
    class Ctrl {
        public function __construct() { } 
        public function inicio(){     
            $class = new Mod();
            $Menu = $class->Menu();
             if(!@include(__SECTION__ .'inicio.php')) echo '<div class="content"><p class="help-select-item"><span class="icon icon-search"></span><span class="ng-binding"><b>VISTA</b>, no instalada, comuniquese con soporte técnico.</span></p></div>';
        }  
        public function inicio2(){     
            $class = new Mod();
            $Menu = $class->Menu();
             if(!@include(__SECTION__ .'inicio2.php')) echo '<div class="content"><p class="help-select-item"><span class="icon icon-search"></span><span class="ng-binding"><b>VISTA</b>, no instalada, comuniquese con soporte técnico.</span></p></div>';
        }


        public function mod2($dt){     
            return gList('home/components/mod2',$dt,'mod2'); 
        }
         public function up1($dt){
            if($dt[pass1]==$dt[pass2]){
                $class = new Mod();
                $insert = $class->up1($dt);
                if($insert){             
                    ?>
                       <script>
                           aviso('info','Usuario actualizado correctamente!','Correcto!');
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            aviso('danger','Error al actualizar Usuario.','Error!');
                        </script>
                    <?php
                }
            }else{
                ?>
                    <script>
                        aviso('warning','Las contraseñas no coinciden.','aviso!');
                        $('#pass2').val('');
                        $('#pass1').select();
                    </script>
                <?php
            }
        }

        public function locales($dt){     
            return gList('home/components/mod1',$dt,'giros'); 
        }
        public function vlocs($dt){      ?><script>$('.azz').removeClass('active');$('#a<?php echo $dt; ?>').addClass('active');</script><?php
            return gList('home/components/vlocs',$dt,'locales'); 

        }
        public function clocal($dt){
            $class = new Mod();
            $insert = $class->clocal(explode('-/', $dt)[0],explode('-/', $dt)[2]);
            if($insert){
                $_SESSION['fasklog']['local_pre']=explode('-/', $dt)[0];
                $_SESSION['fasklog']['lo_abreviatura']=explode('-/', $dt)[1];
                $_SESSION['fasklog']['idgiros']=explode('-/', $dt)[2];
                ?>
                   <script>
                       aviso('info','Local cambiado correctamente!','Correcto!');
                       $('#myModal').modal('hide');
                       $('#nomloc').html($('#nom<?php echo explode('-/', $dt)[0]?>').html());
                       $('#div-modal').empty();
                       $('#idLocal').val(<?php echo explode('-/', $dt)[0] ?>);
                       location.reload();
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al seleccionar local.','Error!');
                    </script>
                <?php
            }
        }
        public function salir(){     
            session_start();
            unset($_SESSION["fasklog"]);
            ?><script>location.href ="http://sistemas.faskex.com/";</script><?php
        }
    }//--> return gList2(__SECTION__.'principal',0); 
?>
