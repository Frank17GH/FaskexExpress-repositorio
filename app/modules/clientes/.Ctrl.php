<?php
    class Ctrl {
        public function __construct() { } 
        public function clientes(){
            return gList('clientes/clientes'); 
        }
        public function tabla1($dt){     
            return gList('clientes/components/table1',$dt,'tabla1'); 
        }
        public function tbl_contacto($id){     
          return gList('clientes/components/tbl_contacto',$id,'contacto'); 
        }
        public function mod1($dt){     
            return gList('clientes/components/mod1',$dt); 
        }
        public function mod2($dt){     
            return gList('clientes/components/mod2',$dt,'view','contacto','area'); 
        }
        public function mod3($dt){     
            return gList('clientes/components/mod3',$dt,'contacto'); 
        }
        public function insert1($dt){     
            $class = new Mod();
            $insert = $class->insert1($dt);
            if($insert){     
                ?>
              <script>
              aviso('info','Contacto guardado correctamente!','Correcto!');
              $('.nww').val('');
              $("#detc").append('<tr id="tr<?php echo $insert; ?>"><td><?php echo $dt['nom'] ?></td><td><?php echo $dt['idarea'] ?></td><td><?php echo $dt['tel'] ?></td><td><?php echo $dt['email'] ?></td><td><?php echo $dt['nacimiento'] ?></td><td class="edit">'+
               '<a class="btn btn-default input-xs" title="Eliminar" '+
               'onclick="confir(\'Confirmacion\',\'Seguro que deseas eliminar el contacto '+
               'seleccionado?\',\'clientes\',\'del1\',<?php echo $insert ?>,\'remove\')">'+
               ' <i class="glyphicon glyphicon-trash"></i>'+
               '</a>'+
               '</td></tr>');
                    </script>
                <?php
            }else{
                ?>
                 <script>
                        aviso('danger','Error al guardar contacto.','Error!');
                    </script>
                <?php
            }
        }
        public function update1($dt){
           $class = new Mod();
            $insert = $class->update1($dt);           
            $cliente =  explode('-/', $dt)[5];          
            if($insert){     
                ?>
               <script>
                        aviso('danger','No hay datos para registrar.','Error!');
                    </script>
                <?php
            }else{ 
                ?>
                 <script>
              aviso('info','Contacto actualizado correctamente!','Correcto!');                
            
                vAjax('clientes','tbl_contacto',<?php echo  $cliente; ?>,'contacto');
                    </script>
                  
                <?php
            }
        }

        public function insert3($dt){
           $class = new Mod();
            $insert = $class->insert3($dt);
            if($insert){     
                ?>
              <script>
              aviso('info','Área guardado correctamente!','Correcto!');
              $('.nww').val('');
              $("#deta").append('<tr id="tr<?php echo $insert; ?>"><td><?php echo $dt['dir'] ?></td><td><?php echo $dt['nombre'] ?></td><td class="edit">'+
               '<a class="btn btn-xs btn-danger" title="Eliminar" '+
               'onclick="confir(\'Confirmacion\',\'Seguro que deseas eliminar área '+
               'seleccionado?\',\'clientes\',\'del3\',<?php echo $insert ?>,\'remove\')">'+
               ' <i class="glyphicon glyphicon-trash"></i>'+
               '</a>'+
               '</td></tr>');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar área.','Error!');
                    </script>
                <?php
            }
        }

        public function update3($dt){
           $class = new Mod();
            $insert = $class->update3($dt);
            $id = explode('-/', $dt)[0];
            $dir = explode('-/', $dt)[1];
            $area = explode('-/', $dt)[2];
            $cliente = explode('-/', $dt)[3];
            
            if($insert){     
                ?>
              <script>
              aviso('info','Área actualizado correctamente!','Correcto!');                
               $('#edit'+<?php echo $id ?>).hide();
              $("#tr"+<?php echo $id; ?>).replaceWith('<tr id="tr<?php echo $id; ?>"><td><?php echo $dir; ?></td><td><?php echo $area ?></td><td class="edit">'+
               '<button type="button" class="btn btn-xs btn-danger" title="Eliminar" '+
               'onclick="confir(\'Confirmacion\',\'Seguro que deseas eliminar área '+
               'seleccionado?\',\'clientes\',\'del3\',<?php echo $insert ?>,\'remove\')">'+
               ' <i class="glyphicon glyphicon-trash"></i>'+
               '</button>'+
               '</td></tr>');
                vAjax('clientes','tbl_contacto',<?php echo  $cliente; ?>,'contacto');

                    </script>
                <?php
            }else{ 
                ?>
                    <script>
                        aviso('danger','No hay datos para registrar.','Error!');
                    </script>
                <?php
            }
        }
       

         public function insert2($dt){     
            $class = new Mod();
            $insert = $class->insert2($dt);
            if($insert){     
                if ($dt['id']) {
                    ?>
                       <script>
                           aviso('info','Edición realizada correctamente!','Correcto!');
                           vAjax('clientes','tabla1','frm1','grid1');
                           $('#myModal5').modal('hide');
                        </script>
                    <?php
                }else{
                    if ($dt['tp']==1) {
                        ?>
                           <script>
                               aviso('info','Cliente ingresado correctamente!','Correcto!');
                               vAjax('clientes','tabla1','frm1','grid1');
                               vAjax('clientes','mod2',<?php echo $insert ?>,'modal1');
                               $('#myModal5').modal('hide');
                            </script>
                        <?php
                    }else{

                        ?>
                           <script>
                               aviso('info','Cliente ingresado correctamente!','Correcto!');
                            $('#numDni<?php echo $dt['tp']; ?>').val(<?php echo $dt['doc']; ?>);
                               FClient(0, <?php echo $dt['tp']; ?>);
                               $('#myModal5').modal('hide');$('#myModal1').modal('hide');
                            </script>
                        <?php
                    }
                    
                }
            }else{

                ?>
                    <script>
                        aviso('warning','El D.N.I. ya se encuentra registrado.','Error!');
                    </script>
                <?php
            }
        }

        public function update_acceso($dt){
           $class = new Mod();
            $update = $class->update_acceso($dt);
            if($update){ ?>
               <script>
                  aviso('info','Acceso Asignado  correctamente!','Correcto!');                 
                </script>
              <?php
            }else{ ?>
              <script>
                aviso('danger','Error al asiganr acceso.','Error!');
              </script>
                <?php
            }
        }
        
        public function del1($dt){     
            $class = new Mod();
            $insert = $class->del1($dt);
            if($insert){     
                ?>
                   <script>
                       aviso('info','Contacto eliminado correctamente!','Correcto!');
                       $('#tr<?php echo $dt ?>').remove();
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar contacto.','Error!');
                    </script>
                <?php
            }
        }
        public function del2($dt){     
            $class = new Mod();
            $insert = $class->del2($dt);
            if($insert){     
                ?>
                   <script>
                       aviso('info','Cliente eliminado correctamente!','Correcto!');
                       $('#myModal1').modal('hide');
                       vAjax('clientes','tabla1',0,'clientes_listar');
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error al guardar contacto.','Error!');
                    </script>
                <?php
            }
        }

        public function del3($dt){     
            $class = new Mod();
            $insert = $class->del3($dt);
            if($insert){     
                ?>
                   <script>
                       aviso('info','Área eliminada correctamente!','Correcto!');
                       $('#tr<?php echo $dt ?>').remove();
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        aviso('danger','Error el área tiene relacion con un contacto.','Error!');
                    </script>
                <?php
            }
        }
    }//--> fin clase
?> 
 