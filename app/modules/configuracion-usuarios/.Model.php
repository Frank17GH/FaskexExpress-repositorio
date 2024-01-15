<?php 
    class Mod extends database{
        public function tabla1($dt){ 
            $tp=0;
            if (!isset($dt['tipo'])) {$tp=1;}else{$tp=$dt['tipo'];}

            if ($tp) {
                return $this->select('SELECT idpersonal,pe_dni, trato, pe_apellidos, pe_nombres, us_fecha_crea,c.estado FROM conf_user c inner join personal p on c.iduser=p.idpersonal WHERE tipo=1');
            }else{
                 return $this->select('SELECT idpersonal,pe_dni, trato, pe_apellidos, pe_nombres, us_fecha_crea,c.estado FROM conf_user c inner join personal p on c.iduser=p.idpersonal WHERE tipo=0');
            }
        }
        public function del1($id){ 
            return $this->ejecutar("DELETE FROM conf_user_locales WHERE iduserlocales=".$id);
        }
        public function del2($dt){ 
            return $this->ejecutar("DELETE FROM conf_user_giros WHERE idusergiros=".$dt);
        }
        public function del3($dt){ 
            return $this->ejecutar("UPDATE conf_user SET estado=2  WHERE iduser=".$dt);
        }
        public function mod4($id){ 
            return $this->select("SELECT * from conf_giros cg WHERE idgiros not in (select idgiros from conf_user_giros cu where cu.iduser=".$id.")");
        }
        public function mod4_2($id){  
            return $this->select("SELECT idusergiros, gi_nombre, cg.idgiros from conf_user_giros cu inner join conf_giros cg on cu.idgiros=cg.idgiros WHERE cu.iduser=".$id."");
        }
        public function mod5($idloc,$user){  
            return $this->select("SELECT * from adm_locales where idgiros=$idloc and  idlocales  not in (select cl.idlocales from conf_user_locales cl where cl.iduser=".$user.")");
        }
        public function mod5_2($loc){  
            return $this->select("SELECT iduserlocales as id, lo_abreviatura, di.nombre as dist, fecha_asignacion, lo_estado as est from conf_user_locales cu inner join adm_locales al on cu.idlocales=al.idlocales left join ciudad_distrito di on al.lo_ciudad=di.iddistrito where cu.iduser=".explode('-/', $loc)[0]." and al.idgiros=".explode('-/', $loc)[1]);
        }
        public function Menu(){ 
            return $this->select("SELECT idmenu,nombre,icon,vista,pos,(SELECT count(*) from conf_menu WHERE icon=cm.idmenu) as prins FROM conf_menu cm WHERE icon NOT REGEXP '^[0-9]+$' ORDER BY pos");
        }
        public function SubMenu($id){ 
            return $this->select("SELECT * FROM conf_menu WHERE icon='".$id."' ORDER BY pos");
        }
        public function insert1($dt){ 

            echo "INSERT INTO conf_user(iduser,user, pass, Menu, SubMenu, local_pre, estado, us_user_crea, us_fecha_crea, us_user_mod, us_fech_mod, us_caja, us_vtodo) VALUES (".$dt['iduser'].",'".$dt['user']."','".$dt['pass']."', 0,0,".$dt['local'].",1,'".$_SESSION['fasklog']['iduser']."',NOW(),'".$_SESSION['fasklog']['iduser']."',NOW(),".$dt['cajas'].",".$dt['vrepo'].")";

            $sql =$this->ejecutar("INSERT INTO conf_user(iduser,user, pass, Menu, SubMenu, local_pre, estado, us_user_crea, us_fecha_crea, us_user_mod, us_fech_mod, us_caja, us_vtodo) VALUES (".$dt['iduser'].",'".$dt['user']."','".$dt['pass']."', 0,0,".$dt['local'].",1,'".$_SESSION['fasklog']['iduser']."',NOW(),'".$_SESSION['fasklog']['iduser']."',NOW(),".$dt['cajas'].",".$dt['vrepo'].")");

            if ($sql) {
                 $sql2 =$this->ejecutar("INSERT INTO conf_user_giros(iduser, idgiros, usg_user_crea, usg_fecha_crea, usg_user_mod, usg_fecha_mod) VALUES (".$dt['iduser'].",(SELECT idgiros FROM adm_locales WHERE idlocales=".$dt['local']."),".$_SESSION[fasklog][iduser].",'".date('Y-m-d')."',".$_SESSION[fasklog][iduser].",'".date('Y-m-d')."')");
                 $sql3=$this->ejecutar("INSERT INTO conf_user_locales(iduser, idlocales, fecha_asignacion, estado) VALUES (".$dt['iduser'].",".$dt['local'].",NOW(),1)");
               return $dt['iduser'];
            }else{
                return 0;
            }
        }
        public function insert2($dt){ 
            return $this->ejecutar("INSERT INTO conf_user_locales(iduser, idlocales, fecha_asignacion, estado) SELECT  ".explode('-/', $dt)[1].",".explode('-/', $dt)[0].",NOW(),1 FROM DUAL WHERE NOT EXISTS (SELECT * from conf_user_locales WHERE iduser=".explode('-/', $dt)[1]." and idlocales=".explode('-/', $dt)[0].")");
        }
        public function insert3($dt){ 
            return $this->ejecutar("INSERT INTO conf_user_giros(iduser, idgiros, usg_user_crea, usg_fecha_crea, usg_user_mod, usg_fecha_mod) VALUES (".explode('-/', $dt)[0].",".explode('-/', $dt)[1].",".$_SESSION[fasklog][iduser].",NOW(), ".$_SESSION[fasklog][iduser].",now())");
        }
        public function insert4($dt){ 
            return $this->insertar("INSERT INTO conf_user_locales(iduser, idlocales, fecha_asignacion, estado) VALUES (".explode('-/', $dt)[1].",".explode('-/', $dt)[0].",NOW(), 1)");
        }
        public function upVis($dt){ 
            return $this->ejecutar("UPDATE conf_user SET Menu='".substr($dt[menu], 0, -1)."', SubMenu='".substr($dt[submenu], 0, -1)."' WHERE iduser=".$dt[id]);
        }
        public function sel1(){ 
            return $this->select('SELECT idlocales, lo_abreviatura,co.nombre as dist from adm_locales al left join ciudad_distrito co on al.lo_ciudad=co.iddistrito left join ciudad_provincia cp on co.iddistrito=cp.idprovincia');
        }
        public function sel2($dt){ 
            return $this->select('SELECT lo_abreviatura,  co.nombre as dist,estado,fecha_asignacion,iduserlocales,al.idlocales,cu.estado FROM conf_user_locales cu left join adm_locales al on cu.idlocales=al.idlocales left join ciudad_distrito co on al.lo_ciudad=co.iddistrito WHERE iduser='.$dt);
        }
        public function up1($dt){ 
            return $this->ejecutar("UPDATE conf_user SET user='".$dt['user']."', pass='".$dt['pass']."', estado=".$dt['est'].", us_caja=".$dt['cajas'].", us_vtodo=".$dt['vrepo']." WHERE iduser=".$dt['id']);
        }
        public function sel3(){ 
            return $this->select('SELECT lo_abreviatura,  co.nombre as dist,estado,fecha_asignacion,iduserlocales,al.idlocales,cu.estado FROM conf_user_locales cu left join adm_locales al on cu.idlocales=al.idlocales left join ciudad_distrito co on al.lo_ciudad=co.iddistrito WHERE iduser='.$dt);
        }
        public function view($dt){ 
            return $this->select("SELECT p.idpersonal, CONCAT(p.pe_apellidos,', ', p.pe_nombres) as nom, CONCAT(pp.pe_apellidos,', ', pp.pe_nombres) as crea, us_fecha_crea, CONCAT(pe.pe_apellidos,', ', pe.pe_nombres) as modi, us_fech_mod, u.Menu, u.SubMenu, user, us_correo,u.estado, pass, us_caja, us_vtodo from personal p inner join conf_user u on p.idpersonal=u.iduser left join personal pp on pp.idpersonal=u.us_user_crea left join personal pe on u.us_user_mod=pe.idpersonal where u.iduser=".$dt);
        }
        public function sel4($id){ 
            return $this->select("SELECT * FROM personal WHERE idpersonal not in (SELECT iduser from conf_user)");
        }
    }
 ?>