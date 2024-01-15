<?php 
    class Mod extends database{
        public function sel1($tp){ 
            return $this->select("SELECT cl.idseries as ser, (SELECT ifnull(MAX(co_correlativo),0)+1 from comprobante co where co.co_tipo=se_tipo) as corr from conf_series cs inner join conf_series_locales cl on cs.idseries=cl.idseries WHERE se_tipo='".$tp."' and idlocales=".$_SESSION['fasklog']['local_pre']);
        }
        public function sel2($ser, $corr){ 
            return $this->select("SELECT * from comprobante WHERE co_serie='".$ser."' and co_correlativo=".$corr);
        }
        public function emitir($dt,$serie){ 
            $qy=$this->insertar("INSERT INTO comprobante(co_tipo, co_tipo_pago, co_serie, co_correlativo, co_fecha, co_igv, co_grav, co_total, co_docref, co_tipo_nota, co_glosa, co_tipo_docref, co_ruc_envia, co_nombre_envia, id_envia, co_correo_envia, co_direcc_envia, co_tel_envia, idlocales, co_tiket, co_SUNAT, co_SUNAT_det, co_moneda, iduser, idmanifiestos, idcaja, co_estado, co_fech_ref) SELECT '".$dt['tdoc']."', co_tipo_pago, '".$dt['ser']."', (SELECT ifnull(MAX(co_correlativo),0)+1 from comprobante co where co.co_serie='".$dt['ser']."' LIMIT 1), NOW(), co_igv, co_grav, '".$dt['total']."', '".$serie."', '".$dt['motivo']."', '".$dt['glosa']."', co_tipo, co_ruc_envia, co_nombre_envia, id_envia, co_correo_envia, co_direcc_envia, co_tel_envia, idlocales, '', '', '', co_moneda, ".$_SESSION['fasklog']['iduser'].", idmanifiestos, (SELECT idcaja from caja c where c.iduser=".$_SESSION['fasklog']['iduser']." and c.estado=1 and idlocales=".$_SESSION[fasklog][local_pre]."), 1, co_fecha from comprobante WHERE co_estado=1 and  idcomprobante=".$dt['idc']);
            if ($qy) {
                if (($dt['motivo']=='01' || $dt['motivo']=='02') && $dt['tdoc']=='07') {
                    $qy2=$this->insertar("INSERT INTO comprobante_det(de_tipo, idproducto, de_nombre, de_ruc, idclientes, de_tipo_entrega, idlocales, de_direccion, de_cant, de_unit, de_total, de_descrip, iduser, de_peso, de_ancho, de_largo, de_alto, de_tipo_encomienda, de_medida, idcomprobante) SELECT de_tipo, idproducto, de_nombre, de_ruc, idclientes, de_tipo_entrega, idlocales, de_direccion, de_cant, de_unit, de_total, de_descrip, iduser, de_peso, de_ancho, de_largo, de_alto, de_tipo_encomienda, de_medida, ".$qy." from comprobante_det WHERE idcomprobante=".$dt['idc']);
                    if ($qy2) {
                        return $qy; 
                    }else{
                        return 0;
                    }
                }elseif($dt['motivo']=='04'){
                    $qy2=$this->insertar("INSERT INTO comprobante_det(de_tipo, idproducto, de_nombre, de_ruc, idclientes, de_tipo_entrega, idlocales, de_direccion, de_cant, de_unit, de_total, de_descrip, iduser, de_peso, de_ancho, de_largo, de_alto, de_tipo_encomienda, de_medida, idcomprobante) VALUES (3, 0, '', '', 0, 0, 1, '', 1, '".$dt['total']."', '".$dt['total']."', '".$dt['glosa']."', 0, 0, 0, 0, 0, 0, 'ZZ', ".$qy.")");
                    if ($qy2) {
                        return $qy; 
                    }else{
                        return 0;
                    }
                }else{
                    return $qy;
                }
            }else{
                return 0;
            }
            
        }
    }
?>