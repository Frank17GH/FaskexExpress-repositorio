<?php 
    class Mod extends database{
        public function tabla1($dt){ 
        	$qy="1=1";
            $qy1="";
            $qy2="";
        	if ($dt['local']) {$qy.=" and c.idlocales=".$dt['local'];}
        	if ($dt['repo']==1) {
				$qy.=" and DAY(ca_fecha)=".$dt['dia'];
				$qy.=" and MONTH(ca_fecha)=".$dt['mes'];
        		$qy.=" and YEAR(ca_fecha)=".$dt['anio'];

                $qy1.=" and DAY(c1.mo_fecha)=".$dt['dia'];
                $qy1.=" and MONTH(c1.mo_fecha)=".$dt['mes'];
                $qy1.=" and YEAR(c1.mo_fecha)=".$dt['anio'];

                $qy2.=" and DAY(c2.mo_fecha)=".$dt['dia'];
                $qy2.=" and MONTH(c2.mo_fecha)=".$dt['mes'];
                $qy2.=" and YEAR(c2.mo_fecha)=".$dt['anio'];
        	}elseif ($dt['repo']==2) {
        		$qy.=" and MONTH(ca_fecha)=".$dt['mes'];
        		$qy.=" and YEAR(ca_fecha)=".$dt['anio'];

                $qy1.=" and MONTH(c1.mo_fecha)=".$dt['mes'];
                $qy1.=" and YEAR(c1.mo_fecha)=".$dt['anio'];

                $qy2.=" and MONTH(c2.mo_fecha)=".$dt['mes'];
                $qy2.=" and YEAR(c2.mo_fecha)=".$dt['anio'];
        	}elseif ($dt['repo']==3) {
        		$qy.=" and YEAR(ca_fecha)=".$dt['anio'];
                $qy1.=" and YEAR(c1.mo_fecha)=".$dt['anio'];
                $qy2.=" and YEAR(c2.mo_fecha)=".$dt['anio'];
        	}elseif ($dt['repo']==4) {
        		$qy.=" and DATE_FORMAT(ca_fecha, '%Y-%m-%d') between '".$dt['inicio']."' and '".$dt['fin']."'";
                $qy1.=" and DATE_FORMAT(c1.mo_fecha, '%Y-%m-%d') between '".$dt['inicio']."' and '".$dt['fin']."'";
                $qy2.=" and DATE_FORMAT(c2.mo_fecha, '%Y-%m-%d') between '".$dt['inicio']."' and '".$dt['fin']."'";
        	}
           
            return $this->select("SELECT c.idcaja, ca_fecha,ca_cierre, estado, CONCAT(pe_apellidos,', ',pe_nombres) AS nom, lo_abreviatura, 
                (SELECT sum(if(mo_real,mo_real,mo_total)) from caja_movimientos c1 WHERE c1.idcaja=c.idcaja and c1.mo_tipo=1 ".$qy1.") as ingre, 
                (SELECT sum(if(mo_real,mo_real,mo_total)) from caja_movimientos c2 WHERE c2.idcaja=c.idcaja and c2.mo_tipo=2 ".$qy2.") as egre, 
                (SELECT sum(co_total) from comprobante ce where ce.idcaja=c.idcaja and co_sCaja=1) as vent from caja c inner join personal p on c.iduser=p.idpersonal left join adm_locales al on c.idlocales=al.idlocales  WHERE ".$qy);
        }
        public function sel1(){ 
            if ($_SESSION['fasklog']['tipo']==0) {
                return $this->select("SELECT * FROM adm_locales");
            }else{
                return $this->select("SELECT * FROM adm_locales al inner join conf_user_locales cl on al.idlocales= cl.idlocales WHERE iduser=".$_SESSION['fasklog']['iduser']);
            }
        }
    }
 ?>

