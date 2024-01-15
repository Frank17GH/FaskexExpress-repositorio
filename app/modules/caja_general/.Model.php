<?php 
    class Mod extends database{
        public function tbl1($dt){ 
            $qy='cm.idcaja=0';
            if ($dt[nomen]) {$qy.=' and cm.idnomenclatura='.$dt[nomen];}
            if ($dt[estado]) {$qy.=' and mo_estado='.$dt[estado];}
            if ($dt[tipo]) {$qy.=' and mo_tipo='.$dt[tipo];}
            switch ($dt[tipo_fe]) {
                case 1:
                    $qy.=" and DATE_FORMAT(mo_fecha, '%Y-%m-%d')='".$dt[anio].'-'.str_pad($dt[mes], 2, "0", STR_PAD_LEFT).'-'.str_pad($dt[dia], 2, "0", STR_PAD_LEFT)."'";
                break;
                case 2:
                    $qy.=' and MONTH(mo_fecha)='.$dt[mes].' and YEAR(mo_fecha)='.$dt[anio];
                break;
                case 3:
                    $qy.=' and YEAR(mo_fecha)='.$dt[anio];
                break;
                case 4:
                    $qy.=" and DATE_FORMAT(mo_fecha, '%Y-%m-%d') between '".$dt[inicio]."' and '".$dt[fin]."'";
                break;
            }
            return $this->select("SELECT idmovimientos, pe_apellidos, pe_nombres, mo_tipo, mo_total, mo_descrip, mo_fecha, no_nombre, mo_estado,mo_tip_op from caja_movimientos cm left join caja_nomenclatura cn on cm.idnomenclatura=cn.idnomenclatura inner join personal p on cm.idpersonal=p.idpersonal WHERE ".$qy);
        }

        public function tbl2($dt){
              $qy='';
            switch ($dt[tipo_fe]) {
                case 1:
                    $qy.=" and DATE_FORMAT(co_fecha, '%Y-%m-%d')='".$dt[anio].'-'.str_pad($dt[mes], 2, "0", STR_PAD_LEFT).'-'.str_pad($dt[dia], 2, "0", STR_PAD_LEFT)."'";
                break;
                case 2:
                    $qy.=' and MONTH(co_fecha)='.$dt[mes].' and YEAR(mo_fecha)='.$dt[anio];
                break;
                case 3:
                    $qy.=' and YEAR(co_fecha)='.$dt[anio];
                break;
                
            }
           
            return $this->select("SELECT c.idcaja,(SELECT sum(co_total) from comprobante  WHERE (co_tipo_pago=1 or co_tipo_pago=5)  and co_sCaja=1 ".$qy." and idcaja=c.idcaja) as efectivo,pe_apellidos, 
                    pe_nombres, 
                    lo_abreviatura, 
                    ca_fecha  
                from caja c inner join conf_user cu on c.iduser=cu.iduser inner join personal p on cu.iduser=p.idpersonal left join adm_locales al on c.idlocales=al.idlocales
                ");
        }
            
        
        public function insert1($dt){ 
            if ($dt[nomen]==1) {
                return $this->insertar("INSERT INTO caja_movimientos(iduser, idpersonal, mo_tipo, mo_descrip, mo_total, mo_fecha, idcaja, idnomenclatura, mo_tip_op, mo_nro_op) VALUES (".$_SESSION['fasklog']['iduser'].",".explode('-', $dt[cajero])[1].",2,'".$dt[descrip]."',".$dt[monto].",NOW(),0,".$dt[nomen].",".$dt[tip_op].",'".$dt[nro_op]."'),(".$_SESSION['fasklog']['iduser'].",".$_SESSION['fasklog']['iduser'].",1,'".$dt[descrip]."',".$dt[monto].",NOW(),".explode('-', $dt[cajero])[0].",".$dt[nomen].",".$dt[tip_op].",'".$dt[nro_op]."')");
                
            }else{ 
                return $this->insertar("INSERT INTO caja_movimientos(iduser, idpersonal, mo_tipo, mo_descrip, mo_total, mo_fecha, idcaja, idnomenclatura, mo_tip_op, mo_nro_op) VALUES (".$_SESSION['fasklog']['iduser'].",".explode('-', $dt[cajero])[1].",2,'".$dt[descrip]."',".$dt[monto].",NOW(),0,".$dt[nomen]."),(".$_SESSION['fasklog']['iduser'].",".$_SESSION['fasklog']['iduser'].",1,'".$dt[descrip]."',".$dt[monto].",NOW(),1,".$dt[nomen].",".$dt[tip_op].",'".$dt[nro_op]."')");
            }
        }
        public function sel1(){ 
            return $this->select("SELECT * FROM caja_nomenclatura WHERE estado=1");
        }
        public function sel2(){ 
            return $this->select("SELECT * FROM personal");
        }
        public function sel3(){ 
            return $this->select("SELECT idpersonal, pe_dni, CONCAT(pe_apellidos,', ', pe_nombres) as nom,al.lo_abreviatura, cd.nombre as dist,c.idcaja as caj FROM caja c inner join personal p on c.iduser=p.idpersonal left join adm_locales al on c.idlocales=al.idlocales left join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito where c.estado=1");
        }
    }
 ?>


