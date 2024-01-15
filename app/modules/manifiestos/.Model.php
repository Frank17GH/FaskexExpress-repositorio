<?php 
    class Mod extends database{
        public function tabla1($dt){
            if ($_SESSION[fasklog][local_pre]) {
                $query="(ma_origen=".$_SESSION[fasklog][local_pre]." or ma_destino=".$_SESSION[fasklog][local_pre].")";
            }else{
                $query='1=1';
            }
        	
        	//if ($dt['tipo']) {$query.=" and co_tipo=".$dt['tipo'];}
        	if ($dt['repo']==1) {
				$query.=" and DAY(m.fecha_envio)=".$dt['dia'];
				$query.=" and MONTH(m.fecha_envio)=".$dt['mes'];
        		$query.=" and YEAR(m.fecha_envio)=".$dt['anio'];
        	}elseif ($dt['repo']==2) {
        		$query.=" and MONTH(m.fecha_envio)=".$dt['mes'];
        		$query.=" and YEAR(m.fecha_envio)=".$dt['anio'];
        	}elseif ($dt['repo']==3) {
        		$query.=" and YEAR(m.fecha_envio)=".$dt['anio'];
        	}elseif ($dt['repo']==4) {
        		$query.=" and DATE_FORMAT(m.fecha_envio, '%Y-%m-%d') between '".$dt[inicio]."' and '".$dt[fin]."'";
        	}
            return $this->select("SELECT m.fecha_envio,m.idmanifiestos,ma_origen, ma_destino, CONCAT(p.pe_apellidos,', ',p.pe_nombres) as nom,user,ve_placa, ma_estado  from manifiestos m left join personal p on m.idpiloto=p.idpersonal left join conf_user cu on cu.iduser=m.iduser left join vehiculos v on m.idvehiculos=v.idvehiculos WHERE ".$query);
        }
        public function mod1($dt){
            return $this->select("SELECT CONCAT(p.pe_apellidos,', ',p.pe_nombres) as nom, p.idpersonal FROM rutas r inner join personal p on r.idpersonal=p.idpersonal");
        }
        public function mod1_2($dt){
            return $this->select("SELECT ve_marca, ve_modelo, ve_placa, idvehiculos FROM vehiculos");
        }
        public function sel1($dt){
            if ($dt) {
                return $this->select("SELECT c.idcomprobante,cd.idlocales ,co_serie , co_correlativo,de_nombre, de_descrip, co_total from comprobante c inner join comprobante_det cd on c.idcomprobante=cd.idcomprobante WHERE co_cargo=1 and c.iduser=".$_SESSION[fasklog][iduser]." and co_num_anula=0 and cd.idlocales=".$dt." and idmanifiestos=0 and (co_tipo='01' or co_tipo='03')");
            }else{
                return 0;
            }
        }
        public function sel2($dt){
            return $this->select('SELECT DISTINCT al.idlocales, gi_nombre, nombre from ciudad_distrito cd inner join adm_locales al on cd.iddistrito=al.lo_ciudad left join conf_giros cc on al.idgiros=cc.idgiros where al.idlocales in (SELECT distinct cd.idlocales from comprobante c inner join comprobante_det cd on c.idcomprobante=cd.idcomprobante inner join adm_locales al on cd.idlocales =al.idlocales WHERE c.iduser='.$_SESSION[fasklog][iduser].' and idmanifiestos=0 and co_cargo=1 and c.idlocales='.$_SESSION[fasklog][local_pre].')');
        }
        public function sel4($dt){
            return $this->select("SELECT CONCAT(cp.nombre,' - ',cdi.nombre) as ub from  ciudad_provincia cp inner join ciudad_distrito cdi on cp.idprovincia=cdi.idprovincia inner join adm_locales al on cdi.iddistrito=al.lo_ciudad where al.idlocales=".$dt);
        }
        public function sel5($dt){
            return $this->select("SELECT CONCAT(co_serie,'-',co_correlativo) AS ser, co_nombre_envia, de_tipo_encomienda, co_total, de_descrip FROM comprobante c inner join comprobante_det cd on c.idcomprobante=cd.idcomprobante where co_tipo='03' and idmanifiestos=".$dt);
        }
        public function sel6($dt){
            return $this->select("SELECT CONCAT(co_serie,'-',co_correlativo) AS ser, co_nombre_envia, de_tipo_encomienda, co_total, de_descrip FROM comprobante c inner join comprobante_det cd on c.idcomprobante=cd.idcomprobante where co_tipo='01' and co_num_anula=0 and idmanifiestos=".$dt);
        }
        public function sel7($dt){
            return $this->select("SELECT CONCAT(cd.nombre,' - ',cp.nombre,' - ',cdi.nombre) as ub from ciudad_departamento cd inner join ciudad_provincia cp on cd.iddepartamento=cp.iddepartamento inner join ciudad_distrito cdi on cp.idprovincia=cdi.idprovincia inner join adm_locales al on cdi.iddistrito=al.lo_ciudad where al.idlocales=".$dt);
        }
        public function sel8($id){
            return $this->select("SELECT cd.iddet, c.idcomprobante,cd.idlocales ,co_serie , co_correlativo,de_nombre, de_descrip, co_total,est_paq from comprobante c inner join comprobante_det cd on c.idcomprobante=cd.idcomprobante WHERE idmanifiestos=".$id);
        }
        public function sel9($id){
            return $this->select("SELECT CONCAT(pe_apellidos,', ',pe_nombres) AS nom, v.ve_placa,v.ve_modelo,v.ve_marca,v.idvehiculos,p.idpersonal, ma_estado from manifiestos m inner join vehiculos v on m.idvehiculos=v.idvehiculos inner join personal p on p.idpersonal=m.idpiloto where m.idmanifiestos=".$id);
        }
        public function printMani($dt){
            return $this->select("SELECT m.idmanifiestos,ma_origen, ma_destino, ve_marca, ve_modelo, ve_placa, CONCAT(pe_apellidos,', ',pe_nombres) AS nom, fecha_envio, ma_turno FROM manifiestos m inner join personal p on m.idpiloto=p.idpersonal inner join vehiculos v on m.idvehiculos=v.idvehiculos WHERE idmanifiestos=".$dt);
        }
        public function salida($dt){
            $id=$this->ejecutar("UPDATE manifiestos SET ma_estado=2 WHERE idmanifiestos=".$dt[id]);
            if ($id) {
                $dt= $this->ejecutar("UPDATE comprobante_det SET est_paq=2 WHERE FIND_IN_SET(iddet,'".substr($dt[detcc], 0, -1)."')");
                return $id;
            }else{
                return 0;
            }
        }
        public function llegada($dt){
            $id=$this->ejecutar("UPDATE manifiestos SET ma_estado=3 WHERE idmanifiestos=".$dt[id]);
            if ($id) {
                $dt =$this->ejecutar("UPDATE comprobante_det SET est_paq=3 WHERE FIND_IN_SET(iddet,'".substr($dt[detcc], 0, -1)."')");
                return $id;
            }else{
                return 0;
            }
        }
        public function del1($dt){
            $del= $this->ejecutar('DELETE FROM manifiestos where idmanifiestos='.$dt);
            if ($del) {
                return $this->ejecutar("UPDATE comprobante SET idmanifiestos=null WHERE idmanifiestos=".$dt); 
            }return 0;
        }
        public function insert1($dt){
            $dta1= $this->select("SELECT count(*) as cant from comprobante where FIND_IN_SET(idcomprobante,'".substr($dt[detcc], 0, -1)."') and idmanifiestos=0");
            if ($dta1[0][cant]){
                 $id=$this->insertar("INSERT INTO manifiestos(ma_origen, ma_destino, fecha_envio, idvehiculos, idpiloto, iduser,ma_turno) SELECT ".$_SESSION[fasklog][local_pre].",".$dt[destino].",'".$dt[fecha]."',".$dt[vehi].",".$dt[piloto].",".$_SESSION[fasklog][iduser].",'".$dt[turno]."' FROM dual WHERE EXISTS (SELECT idcomprobante from comprobante WHERE idmanifiestos=0)");
                if ($id) {
                    $dt=$this->ejecutar("UPDATE comprobante SET idmanifiestos=".$id." WHERE FIND_IN_SET(idcomprobante,'".substr($dt[detcc], 0, -1)."') and idmanifiestos=0");
                    return $id;
                }else{
                    return 0;
                }
            } 
        }
    }
 ?>

