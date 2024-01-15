<?php 
    class Mod extends database{
        public function tabla1($dt){ 
           // return $this->select('SELECT * from clientes '.(($dt['temp'])?'WHERE cl_tipodoc='.$dt['temp']:''));            
            if ($dt['temp']) {$qy.=' and cl_tipodoc='.$dt['temp']; }
            return $this->select("SELECT * from clientes WHERE idgiros = ".$_SESSION[fasklog][idgiros]."".$qy);
        }
        public function view($dt){ 
            return $this->select("SELECT p.idclientes, cl_tipodoc, cl_numdoc, cl_nombres, cl_fecha_nacimiento, cl_fecha_creacion, cl_telefono,cl_fijo, cl_direccion, cl_web, cl_observaciones,  cl_fecha_crea, cl_fech_mod, pp.pe_apellidos as user, pe.pe_apellidos as user2,p.iddistrito, idprovincia, iddepartamento,cl_ciiu,cl_giro, cl_correo,cl_usuario,cl_contrasena from clientes p left join conf_user c on p.cl_user=c.iduser left join conf_user cc on p.cl_user_mod=cc.iduser left join personal pp on pp.idpersonal=cc.iduser left join personal pe on cc.iduser=pe.idpersonal left join ciudad_distrito cd on p.iddistrito=cd.iddistrito where p.idclientes=".$dt);
        }
        public function contacto($id){ 
            return $this->select("SELECT idcontacto, co_nombres, co_telefono, co_correo , co_nacimiento, ac.ar_nombre as area from contacto c join area_contacto ac on c.idarea = ac.idarea WHERE c.idclientes=".$id);
        }
        public function area($id){ 
            return $this->select("SELECT * from area_contacto WHERE idclientes=".$id);
        }
        public function del1($id){ 
            return $this->ejecutar("DELETE FROM contacto WHERE idcontacto=".$id);
        }
        public function del2($id){ 
            return $this->ejecutar("DELETE FROM clientes WHERE idclientes=".$id);
        }
        public function del3($id){ 
            return $this->ejecutar("DELETE FROM area_contacto WHERE idarea=".$id);
        }
        public function sel1(){ 
            return $this->select("SELECT DISTINCT nombre, iddepartamento from ciudad_departamento");
        }
        public function sel2($id){ 
            return $this->select("SELECT * from ciudad_provincia where iddepartamento='".$id."'");
        }
        public function sel3($id){ 
            return $this->select("SELECT * from ciudad_distrito WHERE idprovincia='".$id."'");
        }
        public function insert1($dt){  
            return $this->insertar("INSERT INTO contacto( `idclientes`, `idarea`, `co_nombres`, `co_cargo`, `co_telefono`, `co_correo`, `co_nacimiento`) SELECT ".$dt['id'].",".$dt['idarea'].",'".$dt['nom']."','".$dt['cargo']."','".$dt['tel']."','".$dt['email']."', '".$dt['nacimiento']."' from dual WHERE NOT EXISTS (SELECT * FROM contacto WHERE co_nombres = '".$dt['nom']."' and idarea=".$dt['idarea']." and idclientes=".$dt['id']." and co_telefono='".$dt['tel']."' and co_correo='".$dt['email']."') LIMIT 1");
        }

        public function update1($dt){  
            echo "UPDATE `contacto` SET `co_nombres`='".explode('-/', $dt)[1]."',`co_telefono`='".explode('-/', $dt)[2]."',`co_correo`='".explode('-/', $dt)[3]."',`co_nacimiento`='".explode('-/', $dt)[4]."' WHERE idcontacto = '".explode('-/', $dt)[0]."'";

            return $this->insertar("UPDATE `contacto` SET `co_nombres`='".explode('-/', $dt)[1]."',`co_telefono`='".explode('-/', $dt)[2]."',`co_correo`='".explode('-/', $dt)[3]."',`co_nacimiento`='".explode('-/', $dt)[4]."' WHERE idcontacto = '".explode('-/', $dt)[0]."'");
            return 1;
        }

        public function insert3 ($dt){

            echo "INSERT INTO `area_contacto`(`ar_nombre`,`ar_direccion`, `idclientes`) SELECT '".$dt['nombre']."','".$dt['dir']."',".$dt['id']." from dual WHERE NOT EXISTS (SELECT * FROM `area_contacto` WHERE ar_nombre = '".$dt['nombre']."' and ar_direccion='".$dt['dir']."' and idclientes = ".$dt['id']."  ) LIMIT 1";
            
            return $this->insertar(" INSERT INTO `area_contacto`(`ar_nombre`,`ar_direccion`, `idclientes`) SELECT '".$dt['nombre']."','".$dt['dir']."',".$dt['id']." from dual WHERE NOT EXISTS (SELECT * FROM `area_contacto` WHERE ar_nombre = '".$dt['nombre']."' and ar_direccion='".$dt['dir']."' and idclientes = ".$dt['id']."  ) LIMIT 1");
        }

        public function update_acceso($dt){

            $clave = md5($dt['pass']);

           
            return $this->ejecutar("UPDATE `clientes` SET `cl_usuario`='".$dt['user']."',`cl_contrasena`='$clave' WHERE idclientes=".$dt['id']);
        }

         public function update3($dt){
            echo "UPDATE `area_contacto` SET `ar_nombre`= '".explode('-/', $dt)[2]."', `ar_direccion`='".explode('-/', $dt)[1]."' WHERE idarea='".explode('-/', $dt)[0]."'";
            
            return $this->ejecutar("UPDATE `area_contacto` SET `ar_nombre`= '".explode('-/', $dt)[2]."', `ar_direccion`='".explode('-/', $dt)[1]."' WHERE idarea='".explode('-/', $dt)[0]."'");
            
        }
       

        public function insert2($dt){ 
            if ($dt['id']) {
                
               return $this->ejecutar("UPDATE clientes SET cl_nombres='".$dt['nom']."', cl_numdoc='".$dt['doc']."', cl_fech_mod=now(), cl_web='".$dt['web']."', cl_direccion='".$dt['dir']."', cl_telefono='".$dt['tel']."',cl_fijo='".$dt['fijo']."',cl_ciiu='".$dt['ciiu']."',cl_giro='".$dt['giro']."', iddistrito='".$dt['recibe_dist']."', cl_correo='".$dt['correo']."' WHERE idclientes=".$dt['id']);
            }else{
                return $this->insertar("INSERT INTO clientes(cl_tipodoc, cl_numdoc, cl_nombres, cl_nombre_com, cl_telefono,cl_fijo, cl_direccion, cl_web, cl_user, cl_fecha_crea, cl_user_mod, cl_fech_mod, cl_ciiu, cl_giro, iddistrito, cl_correo, idgiros) SELECT ".$dt[tdoc].",'".$dt[doc]."', '".$dt[nom]."', '".$dt[nomCom]."', '".$dt[tel]."', '".$dt[fijo]."', '".$dt[dir]."', '".$dt[web]."', ".$_SESSION[fasklog][iduser].", now(), ".$_SESSION['fasklog']['iduser'].", now(), '".$dt[ciiu]."','".$dt[giro]."', '".$dt[recibe_dist]."', '".$dt[corr]."',".$_SESSION[fasklog][idgiros]." FROM dual WHERE NOT EXISTS (SELECT * FROM clientes WHERE cl_numdoc='".$dt[doc]."')");
            }
            
        }
    }
 ?>

