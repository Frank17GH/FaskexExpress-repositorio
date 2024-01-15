<?php 
    class Mod extends database{
        public function tabla1($dt){ 
        	$query="1=1";
        	if ($dt['local']) {$query.=" and al.idgiros=".$dt['local'];}
            if ($dt['user']) {$query.=" and c.iduser=".$dt['user'];}
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
            return $this->select("SELECT c.idcomprobante,c.co_tipo_pago, c.co_tipo, co_serie, co_correlativo, co_ruc_envia, co_nombre_envia, co_fecha, co_moneda, co_SUNAT, co_total, gi_nombre, gi_color, co_vers, co_anulacion from comprobante c left join adm_locales al on c.idlocales=al.idlocales left join conf_giros cg on al.idgiros=cg.idgiros WHERE ".$query);
        }
        public function select1(){ 
            return $this->select("SELECT cg.gi_nombre  , cg.idgiros from conf_giros cg inner join conf_user_giros cu on cg.idgiros=cu.idgiros WHERE iduser=".$_SESSION[fasklog][iduser]);
        }
        public function select2(){ 
            return $this->select("SELECT iduser, pe_apellidos, pe_nombres, (SELECT cc.us_vtodo FROM conf_user cc where cc.iduser=".$_SESSION[fasklog][iduser].") as tp from conf_user c inner join personal p on c.iduser=p.idpersonal where estado=1 order by p.pe_apellidos asc");
        }
    }
 


