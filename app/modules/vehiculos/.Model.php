<?php 
    class Mod extends database{
        public function tabla1(){ 
            return $this->select("SELECT idvehiculos,ve_marca, ve_modelo, ve_placa, ve_estado,(SELECT so_fin from vehiculos_soat WHERE idvehiculos=v.idvehiculos order by so_fin desc limit 1) as soat,(SELECT re_fin from vehiculos_revision WHERE idvehiculos=v.idvehiculos order by re_fin desc limit 1) as revision from vehiculos v");
        }
        public function mod2($dt){ 
            return $this->select("SELECT idsoat, so_inicio, so_fin, so_costo, as_descripcion,so_certificado  from vehiculos_soat vs inner join aseguradora a on vs.idaseguradora=a.idaseguradora where idvehiculos=".$dt);
        }
        public function mod3($dt){ 
            return $this->select("SELECT vr.idrevision, re_inicio, re_fin,re_costo, re_descripcion, re_ruc,re_certificado from vehiculos_revision vr inner join vehiculo_empresas_rev er on vr.idemprev=er.idemprev where idvehiculos=".$dt);
        }
        public function mod4($dt){ 
            return $this->select("SELECT * FROM vehiculos_kilometro  where idvehiculo=".$dt);
        }
        public function mod5($dt){ 
            return $this->select("SELECT * from vehiculos_mantenimiento   where idvehiculo=".$dt);
        }
        public function sel1(){ 
            return $this->select("SELECT idvehiculosconfig, co_nombre from vehiculos_config order by idvehiculosconfig asc");
        }
        public function sel2($id){ 
            return $this->select("SELECT * from vehiculos where idvehiculos=".$id);
        }
        public function sel3($id){ 
            return $this->select("SELECT * from aseguradora");
        }
        public function sel4($id){ 
            return $this->select("SELECT * from vehiculo_empresas_rev");
        }
        public function del1($id){ 
           return $this->ejecutar("DELETE FROM vehiculos WHERE idvehiculos=".$id." AND NOT EXISTS(SELECT idvehiculos FROM rutas r WHERE r.idvehiculos = ".$id.")");
        }
        public function del2($id){ 
           return $this->ejecutar("DELETE FROM vehiculos_soat WHERE idsoat = ".$id);
        }
        public function del3($id){ 
           return $this->ejecutar("DELETE FROM vehiculos_revision WHERE idrevision = ".$id);
        }
        public function insert1($dt){ 
        	if ($dt[marca] && $dt[modelo] && $dt[placa]) {
        		if ($dt[id]) {
        			return $this->ejecutar("UPDATE vehiculos SET ve_marca='".$dt[marca]."',ve_modelo='".$dt[modelo]."',ve_placa='".$dt[placa]."',ve_inscripcion='".$dt['const']."',idvehiculosconfig=".$dt[config].",ve_user_mod=".$_SESSION[fasklog][iduser].",ve_fecha_mod='".date('Y-m-d')."',ve_estado=".$dt[estado]." WHERE idvehiculos=".$dt[id]);
        		}else{
        			return $this->insertar(" INSERT INTO vehiculos (ve_marca, ve_modelo, ve_placa, ve_inscripcion, idvehiculosconfig, ve_estado, ve_user_crea, ve_fecha_crea) SELECT '".$dt[marca]."', '".$dt[modelo]."', '".$dt[placa]."','".$dt['const']."',".$dt[config].",".$dt[estado].", ".$_SESSION[fasklog][iduser].",'".date('Y-m-d')."' FROM DUAL WHERE NOT EXISTS  (SELECT idvehiculos FROM vehiculos WHERE ve_placa='".$dt[placa]."')");
        		}
        	}
        }
        public function insert2($dt){ 
           return $this->insertar("INSERT INTO vehiculos_soat(so_inicio, so_fin, idvehiculos, idaseguradora, so_costo,so_certificado,so_uso,so_tipo) SELECT '".$dt[inicio]."','".$dt[fin]."', ".$dt[id].", ".$dt[aseg].", '".$dt[costo]."','".$dt[certificado]."','".$dt[uso]."','".$dt[tipo]."' FROM DUAL WHERE NOT EXISTS (SELECT idsoat FROM vehiculos_soat WHERE so_fin='".$dt[fin]."' and idvehiculos=".$dt[id].")");
        }
        public function insert3($dt){ 
        

           return $this->insertar("INSERT INTO vehiculos_revision(re_inicio, re_fin, idvehiculos, idemprev, re_costo, re_certificado,re_uso,re_tipo) SELECT '".$dt[inicio]."','".$dt[fin]."', ".$dt[id].", ".$dt[aseg].", '".$dt[costo]."','".$dt[certificado]."','".$dt[uso]."','".$dt[tipo]."' FROM DUAL WHERE NOT EXISTS (SELECT idemprev FROM vehiculos_revision WHERE re_fin='".$dt[fin]."' and idvehiculos=".$dt[id].")");
        }
    }
 ?>
