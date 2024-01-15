<?php 
    class Mod extends database{
        public function tabla1($dt){
            $qy=' and (m.ma_origen='.$_SESSION[fasklog][local_pre].' or m.ma_destino='.$_SESSION[fasklog][local_pre].')'; 
            if ($dt[entrega]) {$qy.=' and de_tipo_entrega='.$dt[entrega];}
            if ($dt[cbusq]) {
                switch ($dt[tbusq]) {
                    case '1':
                        $qy.=' and cd.iddet='.intval($dt[cbusq]);
                    break;
                    case '2':
                        $qy.=" and cd.de_nombre like '%".$dt[cbusq]."%'";
                    break;
                    case '3':
                        $qy.=" and cd.de_ruc = '".$dt[cbusq]."'";
                    break;
                }
            }
            if ($dt[estado]) {$qy.=' and est_paq='.$dt[estado];}
            return $this->select("SELECT cd.iddet, de_nombre, de_ruc, de_tipo_encomienda, nombre, ma_estado, est_paq, DATE_FORMAT(c.co_fecha, '%Y%-%m-%d') as co_fecha, de_tipo_entrega, cd.idlocales as dest from comprobante_det cd inner join comprobante c on cd.idcomprobante=c.idcomprobante left join adm_locales al on c.idlocales=al.idlocales left join ciudad_distrito cdd on al.lo_ciudad=cdd.iddistrito inner join manifiestos m on c.idmanifiestos=m.idmanifiestos where YEAR(c.co_fecha)='".$dt[anio]."' and de_tipo=1 ".$qy." ORDER BY co_fecha desc");
        }
        public function select1(){ 
            return $this->select("SELECT gi_nombre, cg.idgiros from conf_giros cg inner join conf_user_giros cu on cg.idgiros=cu.idgiros WHERE iduser=".$_SESSION[fasklog][iduser]);
        }
        public function local($id){ 
            return $this->select("SELECT nombre from adm_locales al inner join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito WHERE idlocales=".$id);
        }
        public function select2(){ 
            return $this->select("SELECT DISTINCT al.idlocales, nombre FROM adm_locales al inner join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito WHERE idgiros=".$_SESSION[fasklog][idgiros]);
        }
        public function select3($dt){ 
            return $this->select("SELECT iddet, de_nombre, de_ruc, de_tipo_entrega,fecha_entrega, co_tipo_pago, co_total from comprobante_det cd inner join comprobante c on cd.idcomprobante=c.idcomprobante WHERE cd.iddet=".$dt);
        }
        public function verifica($dt){ 
            return $this->select("SELECT de_clave from comprobante_det WHERE iddet=".explode('-/', $dt)[0]." and de_clave=".explode('-/', $dt)[1]);
        }
        public function entregado($dt){ 
            if ($dt[cajj]) {
                return $this->ejecutar("UPDATE comprobante_det cd inner join comprobante c on cd.idcomprobante=c.idcomprobante SET est_paq=4,co_tipo_pago=5, idcaja=(SELECT idcaja from caja where iduser=".$_SESSION[fasklog][iduser]." and estado=1 AND idlocales=".$_SESSION[fasklog][local_pre]." LIMIT 1), fecha_entrega='".$dt[fecha].' '.$dt[hora]."' WHERE iddet=".$dt[id]);
            }else{
                return $this->ejecutar("UPDATE comprobante_det SET est_paq=4, fecha_entrega='".$dt[fecha].' '.$dt[hora]."' WHERE iddet=".$dt[id]);
            }
        }
    }
 ?>