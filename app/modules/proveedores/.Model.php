<?php 
    class Mod extends database{
        public function tabla1(){ 
            return $this->select("SELECT idclientes, cl_numdoc, iddepartamento, idprovincia, p.iddistrito, cd.nombre,  cl_tipodoc, cl_nombres, cl_estado from clientes p left join ciudad_distrito cd on p.iddistrito=cd.iddistrito WHERE cl_tipo=1");
        }
        public function del1($id){ 
            return $this->ejecutar("DELETE FROM proveedores_contacto WHERE idcontacto=".$id);
        }
        public function del2($id){ 
            return $this->ejecutar("DELETE FROM proveedores WHERE idproveedores=".$id);
        }
        public function sel1(){ 
            return $this->select("SELECT * from ciudad_departamento");
        }
        public function sel2($id){ 
            return $this->select("SELECT * from ciudad_provincia WHERE iddepartamento=".$id);
        }
        public function sel3($id){ 
            return $this->select("SELECT * from ciudad_distrito WHERE idprovincia=".$id);
        }
        public function mod2($id){ 
            return $this->select("SELECT idclientes, cl_numdoc, iddepartamento, idprovincia, p.iddistrito, cd.nombre, cl_estado, cl_tipodoc, cl_nombres,  cl_fecha_crea, cl_fech_mod, c.user as user, cc.user as user2, cl_telefono, cl_correo, cl_direccion from clientes p left join conf_user c on p.cl_user=c.iduser left join conf_user cc on p.cl_user_mod=cc.iduser left join ciudad_distrito cd on p.iddistrito=cd.iddistrito WHERE idclientes=".$id);
        }
        public function mod2_1($id){ 
            return $this->select("SELECT * from contacto WHERE idclientes=".$id);
        }
        public function insert2($dt){ 
            return $this->insertar("INSERT INTO proveedores_contacto(idproveedores, co_nombres, co_area, co_telefono) SELECT ".$dt['id'].",'".$dt['nom']."','".$dt['area']."','".$dt['tel']."' from dual WHERE NOT EXISTS (SELECT * FROM contacto WHERE co_nombres = '".$dt['nom']."' and co_area='".$dt['area']."' and idclientes=".$dt['id']." and co_telefono='".$dt['tel']."') LIMIT 1");
        }
        public function insert1($dt){ 
            if ($dt['id']) {
               return $this->ejecutar("UPDATE clientes SET cl_nombres='".$dt['nom']."', cl_numdoc='".$dt['doc']."', cl_fech_mod='".date('Y-m-d')."', cl_user_mod=".$_SESSION['fasklog']['iduser'].", cl_direccion='".$dt['dir']."', cl_telefono='".$dt['tel']."',cl_ciiu='".$dt['ciiu']."',cl_giro='".$dt['giro']."', iddistrito='".$dt['recibe_dist']."', cl_correo='".$dt['correo']."' WHERE idproveedores=".$dt['id']);
            }else{
                return $this->insertar("INSERT INTO clientes(cl_tipodoc, cl_numdoc, cl_nombres, cl_nombre_com, cl_telefono, cl_direccion, cl_user, cl_fecha_crea, cl_user_mod, cl_fech_mod, cl_ciiu, cl_giro, iddistrito, cl_correo, cl_tipo) SELECT ".$dt[tdoc].",'".$dt[doc]."', '".$dt[nom]."', '".$dt[nomCom]."', '".$dt[tel]."', '".$dt[dir]."', ".$_SESSION[fasklog][iduser].", now(), ".$_SESSION['fasklog']['iduser'].", now(), '".$dt[ciiu]."','".$dt[giro]."', '".$dt[recibe_dist]."', '".$dt[corr]."',1 FROM dual WHERE NOT EXISTS (SELECT * FROM proveedores WHERE cl_numdoc='".$dt[doc]."')");
            }
        }
    }
 ?>