<?php 
    class Mod extends database{
        public function tabla1($dt){ 
        	$query="1=1";
        	if ($_SESSION[fasklog][local_pre]) {$query.=" and c.idlocales=".$_SESSION[fasklog][local_pre];}
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
            return $this->select("SELECT c.idcompras, c.co_tipo, co_serie, co_correlativo, cl_numdoc, cl_nombres, co_fecha, co_moneda, co_total, gi_nombre, gi_color from compras c left join clientes p on c.idproveedores=p.idclientes inner join adm_locales al on c.idlocales=al.idlocales left join conf_giros cg on al.idgiros=cg.idgiros WHERE ".$query);
        }
        public function mod1(){ 
            return $this->select("SELECT * from asiento WHERE as_estado=1");
        }
        public function del1($id){ 
            $del= $this->ejecutar("DELETE FROM compras WHERE idcompras=".$id);
            if ($del) {
            	return $this->ejecutar("DELETE FROM compras_det WHERE idcompras=".$id);
            }else{
            	return 0;
            }
        }
        public function mod2($dt){ 
            return $this->select("SELECT co_tipo, co_serie, co_correlativo, co_fecha, co_moneda, cl_numdoc, cl_nombres, CONCAT(c.idasiento,' - ',as_descripcion) AS asiento, co_total from compras c left join clientes cl on c.idproveedores=cl.idclientes left join asiento a on c.idasiento=a.idasiento WHERE idcompras=".$dt);
        }
        public function mod2_1($dt){ 
            return $this->select("SELECT de_tipo, de_cant, de_total, if(c.idproducto,pr_nombre, de_descrip) as det from compras_det c left join producto p on c.idproducto=p.idproducto WHERE idcompras=".$dt);
        }
        public function insert1($dt){ 
            echo "CALL compras_insert1(".$_SESSION[fasklog][iduser].",'".$dt[tdoc]."', 1, '".$dt[ser]."' ,".$dt[corr].", '".date('Y-m-d')."', ".$dt[prov].",'".$dt[mon]."', ".$_SESSION[fasklog][local_pre].")";

            return $this->proc("CALL compras_insert1(".$_SESSION[fasklog][iduser].",'".$dt[tdoc]."', 1, '".$dt[ser]."' ,".$dt[corr].", '".date('Y-m-d')."', ".$dt[prov].",'".$dt[mon]."', ".$_SESSION[fasklog][local_pre].")");
        }
        public function tabla2($dt){
            return $this->select("SELECT idtemp, te_tipo, te_cant, ct.idlocales, te_tipo_encomienda, te_nombre, if(ct.idproducto=0,te_descrip, pr_nombre) as te_descrip, te_unit, te_total from comprobante_temp ct left join producto p on ct.idproducto=p.idproducto where te_venta=0 and iduser=".$_SESSION[fasklog][iduser]);
        }
    }
 ?>

