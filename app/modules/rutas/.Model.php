<?php 
    class Mod extends database{
        public function tabla1(){ 
            return $this->select("SELECT r.idrutas, ve_marca, ve_modelo, ve_placa, ve_estado, CONCAT(pe_apellidos, ', ',pe_nombres) as pers, r.idlocales from vehiculos v inner join rutas r on v.idvehiculos=r.idvehiculos inner join personal p on r.idpersonal=p.idpersonal inner join adm_locales al on r.idlocales=al.idlocales");
        }
        public function sel2($dt){ 
            return $this->select("SELECT * FROM vehiculos where ve_estado=1");
        }
        public function sel3(){ 
            return $this->select("SELECT * from personal");
        }
        public function mod2_2($id){ 
            return $this->select("SELECT CONCAT(cd.nombre,' - ',cp.nombre,' - ', cdd.nombre) as nom, de_estado , rd.iddestinos from rutas_destinos rd inner join adm_locales al on rd.idlocales=al.idlocales inner join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito inner join ciudad_provincia cp on cd.idprovincia=cp.idprovincia inner join ciudad_departamento cdd on cp.iddepartamento=cdd.iddepartamento WHERE idrutas=".$id);
        }
        public function mod2_3($id){ 
            return $this->select("SELECT CONCAT(cd.nombre,' - ',cp.nombre,' - ', cdd.nombre) as nom, al.idlocales, lo_abreviatura from adm_locales al inner join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito inner join ciudad_provincia cp on cd.idprovincia=cp.idprovincia inner join ciudad_departamento cdd on cp.iddepartamento=cdd.iddepartamento WHERE al.idgiros=".$_SESSION[fasklog][idgiros]." and al.idlocales not in (SELECT rd.idlocales from rutas rr inner join rutas_destinos rd on rr.idrutas=rd.idrutas where rd.idrutas=".$id.") order by nom asc");
        }
        public function sel4(){ 
            return $this->select("SELECT DISTINCT nombre, iddepartamento from ciudad_departamento where iddepartamento in (SELECT cd.iddepartamento from adm_locales al inner join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito)");
        }
        public function mod2($d){ 
            return $this->select("SELECT r.idrutas, ve_placa, CONCAT(pe_apellidos, ', ',pe_nombres) as pers,ru_estado from vehiculos v inner join rutas r on v.idvehiculos=r.idvehiculos inner join personal p on r.idpersonal=p.idpersonal WHERE r.idrutas=".$d);
        }
        public function insert2($d){ 
            return $this->insertar("INSERT INTO rutas_destinos(idrutas, idlocales, fecha, de_estado) VALUES (".explode('-/', $d)[0].",".explode('-/', $d)[1].",NOW(),1)");
        }
        public function insert1($d){
        	if ($d[dist]) {
        		return $this->ejecutar("INSERT INTO rutas(idpersonal, idvehiculos, idlocales, ru_fecha_crea, ru_user_crea) SELECT ".$d[conduct].",".$d[vehi].",".$d[dist].",'".date('Y-m-d')."',".$_SESSION[fasklog][iduser]." FROM DUAL WHERE NOT EXISTS (SELECT idrutas FROM rutas WHERE idpersonal=".$d[conduct]." and idvehiculos=".$d[vehi]." and idlocales=".$d[dist].");");
        	}else{
        		return false;
        	}
        }
        public function del1($d){
            return $this->ejecutar("DELETE FROM rutas WHERE idrutas=".$d." AND NOT EXISTS(SELECT idguia FROM guia_remision gr WHERE gr.idrutas = ".$d.")");
        }
        public function del2($d){
            return $this->ejecutar("DELETE FROM rutas_destinos WHERE iddestinos=".explode('-/', $d)[1]);
        }
    }
 ?>