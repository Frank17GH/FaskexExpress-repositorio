<?php 
    class Mod extends database{

         public function mod2($dt){ 
                return $this->select("SELECT pe_dni,concat(pe_apellidos,', ',pe_nombres) as nombre,pe_mail,user,pass FROM conf_user u join personal p on u.iduser=p.idpersonal WHERE u.iduser=".$_SESSION['fasklog']['iduser']);
        }

        public function up1($dt){ 
             return $this->ejecutar("UPDATE conf_user  u join personal p on u.iduser=p.idpersonal  set pe_mail='".$dt[pe_mail]."',user='".$dt[user]."', pass= '".$dt[pass1]."'   WHERE u.iduser=".$_SESSION[fasklog][iduser]);
        }

        public function Menu(){ 
            if ($_SESSION['fasklog']['tipo']==0) {
                return $this->select("SELECT idmenu,nombre,icon,vista,pos,(SELECT count(*) from conf_menu WHERE icon=cm.idmenu) as prins FROM conf_menu cm WHERE icon NOT REGEXP '^[0-9]+$' ORDER BY pos");
            }else{
                return $this->select("SELECT idmenu,nombre,icon,vista,pos,(SELECT count(*) from conf_menu WHERE icon=cm.idmenu) as prins FROM conf_menu cm WHERE icon NOT REGEXP '^[0-9]+$' and FIND_IN_SET(idmenu, (SELECT Menu from conf_user WHERE iduser=".$_SESSION['fasklog']['iduser'].")) ORDER BY pos");
            }
      		
        }
        public function SubMenu($id){ 
            if ($_SESSION['fasklog']['tipo']==0) {
                return $this->select("SELECT * FROM conf_menu WHERE icon='".$id."' ORDER BY pos");
            }else{
                return $this->select("SELECT * FROM conf_menu WHERE icon='".$id."' and FIND_IN_SET(idmenu,(SELECT SubMenu from conf_user WHERE iduser=".$_SESSION['fasklog']['iduser'].")) ORDER BY pos");
            }
            
        }
        public function locales($id){ 
            if ($_SESSION['fasklog']['tipo']==0) {
                return $this->select("SELECT * FROM adm_locales WHERE idgiros=".$id);
            }else{
                return $this->select("SELECT al.idlocales, al.lo_abreviatura, al.idgiros FROM adm_locales al inner join conf_user_locales cl on al.idlocales= cl.idlocales WHERE al.idgiros=".$id." and  iduser=".$_SESSION['fasklog']['iduser']);
            }
            
        }
        public function clocal($id1,$id2){ 
          
                return $this->ejecutar("UPDATE conf_user SET local_pre=".$id1.", idgiros=".$id2." where iduser=".$_SESSION['fasklog']['iduser']);
        }
        public function giros($dt){ 
                return $this->select("SELECT * FROM conf_giros cg inner join conf_user_giros cu on cg.idgiros=cu.idgiros WHERE iduser=".$_SESSION['fasklog']['iduser']);
        }
        public function users($user,$pass){
            $query= $this->select("SELECT iduser,trato,pe_nombres,pe_apellidos,Menu,SubMenu,lo_abreviatura,local_pre,tipo, l.idlocales, l.idgiros, c.us_rol as rol, g.gi_direccion , p.pe_mail as correo,l.lo_ciudad as distrito
                FROM conf_user c inner 
                join personal p on c.iduser=p.idpersonal 
                left join adm_locales l on c.local_pre=l.idlocales 
                inner join conf_giros g on l.idgiros = g.idgiros 
                WHERE user='".$user."' AND pass='".$pass."' AND estado=1");
            return $query[0];
        }
    }
?>