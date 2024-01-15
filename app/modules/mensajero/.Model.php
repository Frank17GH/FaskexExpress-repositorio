<?php 
    class Mod extends database{
               
        public function tabla1($dt){
            if ($_SESSION[fasklog][local_pre]) {
                $query="hr.idlocales=".$_SESSION[fasklog][local_pre];
            }else{
                $query='1=1';
            }        	
        	//if ($dt['tipo']) {$query.=" and co_tipo=".$dt['tipo'];}
        	if ($dt['repo']==1) {
				$query.=" and DAY(ru_fecha)=".$dt['dia'];
				$query.=" and MONTH(ru_fecha)=".$dt['mes'];
        		$query.=" and YEAR(ru_fecha)=".$dt['anio'];
        	}elseif ($dt['repo']==2) {
        		$query.=" and MONTH(ru_fecha)=".$dt['mes'];
        		$query.=" and YEAR(ru_fecha)=".$dt['anio'];
        	}elseif ($dt['repo']==3) {
        		$query.=" and YEAR(ru_fecha)=".$dt['anio'];
        	}elseif ($dt['repo']==4) {
        		$query.=" and DATE_FORMAT(ru_fecha, '%Y-%m-%d') between '".$dt[inicio]."' and '".$dt[fin]."'";
        	}
            return $this->select("SELECT hr.idhojaruta,  pe_nombres, pe_apellidos, ru_fecha, SUM(IF(d.est_paq = 4,'1','0')) as entregado,  SUM(IF(d.est_paq = 5,'1','0')) as pendiente FROM comprobante_det d join hoja_ruta hr on d.idhojaruta = hr.idhojaruta join personal p on hr.idpersonal=p.idpersonal WHERE ".$query." GROUP BY hr.idhojaruta ");
        }

        public function mod1($dt){
            return $this->select('SELECT p.idpersonal, pe_dni, pe_nombres, pe_apellidos, co_mensajero FROM personal p inner join personal_contratos pc on p.idpersonal=pc.idpersonal WHERE co_liquidado=1 and pc.idlocales = '.$_SESSION[fasklog][local_pre].'');
        }
        public function mod2($id){
            return $this->select("SELECT cd.iddet, de_nombre, de_ruc, de_tipo_encomienda, nombre, ma_estado, est_paq, c.co_fecha, de_tipo_entrega,de_direccion, cd.idlocales as dest from comprobante_det cd inner join comprobante c on cd.idcomprobante=c.idcomprobante left join adm_locales al on c.idlocales=al.idlocales left join ciudad_distrito cdd on al.lo_ciudad=cdd.iddistrito inner join manifiestos m on c.idmanifiestos=m.idmanifiestos  WHERE idhojaruta='".$id."'");
        }
        public function select3($dt){ 
            return $this->select("SELECT iddet, de_nombre, de_ruc, de_tipo_entrega,fecha_entrega, co_tipo_pago, co_total, de_imagen from comprobante_det cd inner join comprobante c on cd.idcomprobante=c.idcomprobante WHERE cd.iddet=".$dt);
        }
         public function local($id){ 
            return $this->select("SELECT nombre from adm_locales al inner join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito WHERE idlocales=".$id);
        }
        public function tabla3($dt){
            return $this->select("SELECT d.iddet,c.idcomprobante, de_nombre,de_direccion, de_tipo_encomienda from comprobante c join comprobante_det d on c.idcomprobante = d.idcomprobante WHERE idhojaruta=0 and c.co_cargo = 1 and d.est_paq = 3 and d.de_tipo_entrega = 1  and d.idlocales='".$_SESSION[fasklog][local_pre]."'  ");
        }

        public function mod1_2($dt){
            return $this->select('SELECT iddet,c.idcomprobante, cd.de_nombre, cd.de_direccion FROM comprobante_det cd inner join comprobante c on c.idcomprobante=cd.idcomprobante WHERE idhojaruta=0 and est_paq=3 and cd.idlocales='.$_SESSION[fasklog][local_pre]);
        }

        public function entregado($id, $fecha, $hora, $imagen, $cajj )
        {
            if ($cajj) {
                return $this->ejecutar("UPDATE comprobante_det cd inner join comprobante c on cd.idcomprobante=c.idcomprobante SET est_paq=4,co_tipo_pago=5, idcaja=(SELECT idcaja from caja where iduser=".$_SESSION[fasklog][iduser]." and estado=1 AND idlocales=".$_SESSION[fasklog][local_pre]." LIMIT 1), fecha_entrega='".$fecha.' '.$hora."' WHERE iddet=".$id);
            }else{
                return $this->ejecutar("UPDATE comprobante_det SET est_paq=4, de_imagen='.$imagen',fecha_entrega='".$fecha.' '.$hora."' WHERE iddet=".$id);
            }
        }

        public function insert1($dt){
            if($dt[detcc]){
                $id=$this->insertar("INSERT INTO hoja_ruta(idpersonal, ru_fecha, ru_hora,idlocales) SELECT ".$dt[mensajero].",'".$dt[fecha]."', '".$dt[hora]."',".$_SESSION[fasklog][local_pre]." FROM dual WHERE NOT EXISTS (SELECT idpersonal from hoja_ruta WHERE idpersonal=".$dt[mensajero]." and ru_hora='".$dt[hora]."' and ru_fecha='".$dt[fecha]."')");           
                if ($id) {
                    $dt=$this->ejecutar("UPDATE comprobante_det SET est_paq =5 ,idhojaruta=".$id."  WHERE FIND_IN_SET(iddet,'".substr($dt[detcc], 0, -1)."')");
                    return $id;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }           
        }

         public function printHoja($id){
            return $this->select("SELECT idhojaruta, CONCAT(ru_fecha,'  ',ru_hora) as ru_fecha, CONCAT(p.pe_nombres,' ',p.pe_apellidos) as nombres, al.lo_abreviatura as ubicacion
            FROM hoja_ruta hr 
            JOIN personal p ON hr.idpersonal = p.idpersonal  
            join adm_locales al on hr.idlocales = al.idlocales 
            WHERE  idhojaruta='".$id."' and hr.idlocales='".$_SESSION[fasklog][local_pre]."'
            ");
        }

           public function sel1($id){
            return $this->select("SELECT cd.iddet, de_nombre,de_direccion, de_tipo_encomienda,  SUM(IF(de_tipo_encomienda = 1,'1','0')) as sobre, SUM(IF(de_tipo_encomienda = 2,'1','0')) as caja  from comprobante_det cd inner join comprobante c on cd.idcomprobante=c.idcomprobante left join adm_locales al on c.idlocales=al.idlocales left join ciudad_distrito cdd on al.lo_ciudad=cdd.iddistrito inner join manifiestos m on c.idmanifiestos=m.idmanifiestos WHERE idhojaruta='".$id."' ");
        }




    }
 ?>