<?php 
    class Mod extends database{
        public function tabla1($dt){
            $q='1=1';
            if ($dt['dep']) {$q.=' and cd.iddepartamento="'.$dt['dep'].'"';}
            if ($dt['prov']) {$q.=' and cp.idprovincia="'.$dt['prov'].'"';}
            if ($dt['recibe_dist']) {$q.=' and cdi.iddistrito="'.$dt['recibe_dist'].'"';}
            return $this->select("SELECT cd.iddepartamento as iddpto,cd.nombre as dpto,cd.ubigeo as ub1,cp.idprovincia as idprov, cp.nombre as prov,cp.ubigeo as ub2, cdi.iddistrito as iddist, cdi.nombre as dist,cdi.ubigeo ub3,kilo_base,kilo_adicional,envio_dom,precio_sobre FROM ciudad_departamento cd inner join ciudad_provincia cp on cd.iddepartamento=cp.iddepartamento inner join ciudad_distrito cdi on cp.idprovincia=cdi.idprovincia WHERE ".$q);
        }
        public function mod1($kb,$ka,$ed,$id,$psobr){
            return $this->ejecutar("UPDATE ciudad_distrito SET kilo_base='".$kb."', kilo_adicional='".$ka."', precio_sobre='".$psobr."', envio_dom='".$ed."' WHERE iddistrito=".$id);
        }
    }
 ?>