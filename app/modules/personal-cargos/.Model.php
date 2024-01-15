<?php 
    class Mod extends database{
        public function tabla1(){ 
            return $this->select("SELECT idpersonalcargo, ca_descripcion,ca_estado,ca_ambito from personal_cargo pc");
        }
        public function view($dt){ 
            return $this->select("SELECT idpersonalcargo, ca_descripcion, ca_estado, c.pe_nombres as crea, fecha_create, cc.pe_nombres as actua, fecha_update, ca_ambito
                FROM personal_cargo p               
                left join personal c on p.user_create=c.idpersonal 
                left join personal cc on p.user_update=cc.idpersonal             
                where idpersonalcargo=".$dt);
        }
        public function personas($id){ 
            return $this->select("SELECT * from personal_contratos WHERE idpersonalcargo=".$id);
        }
        public function del1($id){ 
            return $this->ejecutar("DELETE FROM contacto WHERE idcontacto=".$id);
        }
        public function del2($id){ 
            return $this->ejecutar("DELETE FROM personal_cargo WHERE idpersonalcargo=".$id." AND NOT EXISTS(SELECT * FROM personal p WHERE p.idpersonalcargo = ".$id." limit 1)");
        }
        public function insert1($dt){ 
            return $this->insertar("INSERT INTO contacto(idpersona, co_nombres, co_area, co_telefono) SELECT ".$dt['id'].",'".$dt['nom']."','".$dt['area']."','".$dt['tel']."' from dual WHERE NOT EXISTS (SELECT * FROM contacto WHERE co_nombres = '".$dt['nom']."' and co_area='".$dt['area']."' and idpersona=".$dt['id']." and co_telefono='".$dt['tel']."') LIMIT 1");
        }
        public function insert2($dt){ 
            if ($dt['id']) {
               return $this->ejecutar("UPDATE `personal_cargo` SET `ca_ambito`='".$dt['ambito']."',`ca_descripcion`='".$dt['des']."', `ca_estado`=".$dt['estado'].",`user_update`=".$_SESSION['fasklog']['iduser'].",`fecha_update`=NOW() WHERE idpersonalcargo=".$dt['id']);
            }else{
                return $this->insertar("INSERT INTO `personal_cargo`(`ca_descripcion`, `ca_estado`, `user_create`, `fecha_create`, `user_update`, `fecha_update`, `ca_ambito`) SELECT '".$dt['des']."',".$dt['estado'].", ".$_SESSION['fasklog']['iduser'].", NOW(), ".$_SESSION['fasklog']['iduser'].", NOW(),".$dt['ambito']." FROM dual WHERE NOT EXISTS (SELECT * FROM personal_cargo WHERE ca_descripcion='".$dt['des']."')");
            }
            
        }
    }
 ?>