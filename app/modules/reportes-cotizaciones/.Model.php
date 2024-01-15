<?php 
    class Mod extends database{
        public function tabla1($dt){ 
        	$query="1=1";
        	if ($dt['local']) {$query.=" and al.idgiros=".$dt['local'];}
        	if ($dt['repo']==1) {
				$query.=" and DAY(co_fecha)=".$dt['dia'];
				$query.=" and MONTH(co_fecha)=".$dt['mes'];
        		$query.=" and YEAR(co_fecha)=".$dt['anio'];
        	}elseif ($dt['repo']==2) {
        		$query.=" and MONTH(co_fecha)=".$dt['mes'];
        		$query.=" and YEAR(co_fecha)=".$dt['anio'];
        	}elseif ($dt['repo']==3) {
        		$query.=" and YEAR(co_fecha)=".$dt['anio'];
        	}elseif ($dt['repo']==4) {
        		$query.=" and DATE_FORMAT(co_fecha, '%Y-%m-%d') between '".$dt['inicio']."' and '".$dt['fin']."'";
        	}
            return $this->select("SELECT c.idcotizacion, cl_numdoc, cl_nombres, co_fecha, co_total, gi_nombre, gi_color from cotizacion c left join clientes cc on c.idclientes=cc.idclientes inner join adm_locales al on c.idlocales=al.idlocales left join conf_giros cg on al.idgiros=cg.idgiros WHERE ".$query);
        }
        public function select1(){ 
            return $this->select("SELECT gi_nombre, cg.idgiros from conf_giros cg inner join conf_user_giros cu on cg.idgiros=cu.idgiros WHERE iduser=".$_SESSION[fasklog][iduser]);
        }
    }
 ?>

