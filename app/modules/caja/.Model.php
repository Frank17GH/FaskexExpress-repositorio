<?php date_default_timezone_set('America/Lima');
    class Mod extends database{
        public function tbl1($dt){ 
            $qy='cm.idcaja='.$dt[id];
            if ($dt[nomen]) {$qy.=' and cm.idnomenclatura='.$dt[nomen];}
            if ($dt[estado]) {$qy.=' and mo_estado='.$dt[estado];}
            if ($dt[tipo]) {$qy.=' and mo_tipo='.$dt[tipo];}
            $qy.=" and DATE_FORMAT(mo_fecha, '%Y-%m-%d') between '".$dt[inicio]."' and '".$dt[fin]."'";
            return $this->select("SELECT idmovimientos, pe_apellidos, pe_nombres, mo_tipo, if(mo_real,mo_real,mo_total) as tot, mo_descrip, mo_fecha, no_nombre, mo_estado, cn.idnomenclatura from caja_movimientos cm left join caja_nomenclatura cn on cm.idnomenclatura=cn.idnomenclatura inner join personal p on cm.idpersonal=p.idpersonal WHERE ".$qy." ORDER BY mo_fecha desc" );
        }
        public function insert1($dt){ 
            if ($dt[tipo]==1) {
                return $this->insertar("INSERT INTO caja_movimientos(iduser, idpersonal, mo_tipo, mo_descrip, mo_total, mo_fecha, idcaja, idnomenclatura, mo_estado) VALUES (".$_SESSION['fasklog']['iduser'].",".$dt[personal].",".$dt[tipo].",'".$dt[descrip]."',".$dt[monto].",'".$dt[fecha]."',".$dt[caja].",".$dt[nomen].",1)");
            }else{
                return $this->insertar("INSERT INTO caja_movimientos(iduser, idpersonal, mo_tipo, mo_descrip, mo_total, mo_fecha, idcaja, idnomenclatura) VALUES (".$_SESSION['fasklog']['iduser'].",".$dt[personal].",".$dt[tipo].",'".$dt[descrip]."',".$dt[monto].",'".$dt[fecha]."',".$dt[caja].",".$dt[nomen].")");
            }
        }
        public function insert2($dt){ 
            return $this->ejecutar("UPDATE caja_movimientos SET mo_estado=2,mo_real=".$dt['real'].",mo_tip_comp='".$dt['tipo']."', mo_ser_comp='".$dt[ser]."',mo_fecha_rendi='".date('Y-m-d')."' where idmovimientos=".$dt[id]);
        }
        public function apCaja($dt){ 
            return $this->insertar("INSERT INTO caja(idlocales, iduser, estado, ca_fecha) VALUES (".$_SESSION['fasklog']['local_pre'].",".$_SESSION['fasklog']['iduser'].",1,'".date('Y-m-d H:i:s')."')");
        }
        public function cerrar($dt){ 
            return $this->ejecutar("UPDATE caja SET estado=0 WHERE estado=1 and idcaja=".$dt);
        }
        public function verifica(){
            return $this->select("SELECT idcaja as can,ca_fecha from caja where estado=1 and iduser=".$_SESSION['fasklog']['iduser']." and idlocales=".$_SESSION['fasklog']['local_pre']);
        }
        public function del1($dt){
            return $this->ejecutar("DELETE FROM caja_movimientos where idmovimientos=".$dt);
        }
        public function del3($dt){
            return $this->ejecutar("UPDATE caja_movimientos SET mo_estado=1, mo_real=0, mo_ser_comp='' where idmovimientos=".$dt);
        }
        public function eliminar($dt){
            return $this->ejecutar("DELETE FROM caja where idcaja=".$dt);
        }
        public function del2($dt){
            return $this->ejecutar("DELETE FROM caja_movimientos where idmovimientos=".$dt);
        }
        public function up1($dt){
            return $this->ejecutar("UPDATE caja_movimientos SET idnomenclatura=".$dt[nomen].",mo_descrip='".$dt[descrip]."', mo_ser_comp='".$dt[ser]."' WHERE idmovimientos=".$dt[id]);
        }
        public function dtcaja($dt){
            return $this->select("SELECT c.idcaja,
                (SELECT sum(co_total) from comprobante  WHERE (co_tipo_pago=1 or co_tipo_pago=5) and idcaja=".$dt[id]." and co_sCaja=1) as efectivo,
                    (SELECT sum(co_total) from comprobante  WHERE co_tipo_pago=2 and idcaja=".$dt[id]." and co_sCaja=1) as transferencia,
                    (SELECT sum(co_total) from comprobante  WHERE co_tipo_pago=3 and idcaja=".$dt[id]." and co_sCaja=1) as izipay, 
                    (SELECT sum(if(mo_real,mo_real,mo_total)) from caja_movimientos WHERE idcaja=".$dt[id]." and DATE_FORMAT(mo_fecha, '%Y-%m-%d') between '".$dt[inicio]."' and '".$dt[fin]."' and mo_tipo=1) as ingreso,
                    (SELECT sum(if(mo_real,mo_real,mo_total)) from caja_movimientos WHERE idcaja=".$dt[id]." and DATE_FORMAT(mo_fecha, '%Y-%m-%d') between '".$dt[inicio]."' and '".$dt[fin]."' and mo_tipo=2) as egreso,
                    pe_apellidos, 
                    pe_nombres, 
                    lo_abreviatura, 
                    ca_fecha  
                from caja c inner join conf_user cu on c.iduser=cu.iduser inner join personal p on cu.iduser=p.idpersonal left join adm_locales al on c.idlocales=al.idlocales where idcaja=".$dt[id]);
        }
        public function sel1($num){ 
            return $this->select("SELECT * FROM caja_nomenclatura WHERE estado=1");
        }
        public function sel2($num){ 
            return $this->select("SELECT idpersonal, pe_apellidos, pe_nombres, pe_dni FROM personal where idpersonal in (SELECT idpersonal FROM personal_contratos pc WHERE pc.co_liquidado=1) ORDER BY pe_apellidos asc");
        }
        public function sel3($id){ 
            return $this->select("SELECT idmovimientos, pe_apellidos, pe_nombres, mo_tipo, mo_total, mo_descrip, mo_fecha, no_nombre, mo_estado,mo_real, mo_tip_comp, mo_ser_comp, mo_fecha_rendi, cn.idnomenclatura,mo_fecha_rendi from caja_movimientos cm left join caja_nomenclatura cn on cm.idnomenclatura=cn.idnomenclatura inner join personal p on cm.idpersonal=p.idpersonal WHERE idmovimientos=".$id);
        }
    }
 ?>

