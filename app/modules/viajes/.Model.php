<?php 
    class Mod extends database{
        public function tabla1(){ 
            return $this->select("
                SELECT 
                    v.id,
                    CONCAT(dd.nombre, ' - ', p.nombre, ' - ', d.nombre) as ubi_origen, 
                    CONCAT(dd2.nombre, ' - ', p2.nombre, ' - ', d2.nombre) as ubi_destino, 
                    l1.lo_direccion as direccion_origen, 
                    l2.lo_direccion as direccion_destino
                FROM 
                    viajes v 
                    inner join adm_locales as l1 on l1.idlocales=v.localOrigen_id
                    inner join adm_locales as l2 on l2.idlocales=v.localDestino_id

                    inner join ciudad_distrito d on l1.lo_ciudad=d.iddistrito 
                    inner join ciudad_provincia p on d.idprovincia=p.idprovincia 
                    inner join ciudad_departamento dd on p.iddepartamento=dd.iddepartamento 
                    inner join ciudad_distrito d2 on l2.lo_ciudad=d2.iddistrito 
                    inner join ciudad_provincia p2 on d2.idprovincia=p2.idprovincia 
                    inner join ciudad_departamento dd2 on p2.iddepartamento=dd2.iddepartamento");
        }
        
        public function sel1(){ 
            return $this->select("
                SELECT 
                    l1.idlocales as id,
                    CONCAT(dd.nombre, ' - ', p.nombre, ' - ', d.nombre) as ubi_origen, 
                    l1.lo_direccion as direccion_origen
                FROM 
                    adm_locales l1
                    inner join ciudad_distrito d on l1.lo_ciudad=d.iddistrito 
                    inner join ciudad_provincia p on d.idprovincia=p.idprovincia 
                    inner join ciudad_departamento dd on p.iddepartamento=dd.iddepartamento
                WHERE
                    idgiros = 97");
        }
        public function sel2(){ 
            return $this->select("
                SELECT 
                    idpersonal as id,
                    CONCAT(pe_apellidos, ', ', pe_nombres) as nombres
                FROM 
                    personal
                ORDER BY nombres asc");
        }
        public function sel3(){ 
            return $this->select("
                SELECT 
                    idvehiculos as id,
                    ve_marca,
                    ve_modelo,
                    ve_placa
                FROM 
                    vehiculos where ve_estado=1");
        }
        public function del1($id){ 
           return $this->ejecutar("DELETE FROM vehiculos WHERE idvehiculos=".$id." AND NOT EXISTS(SELECT idvehiculos FROM rutas r WHERE r.idvehiculos = ".$id.")");
        }
        public function insert1($dt){ 
            return $this->insertar("INSERT INTO viajes (localOrigen_id, localDestino_id, estado, persona_id, vehiculo_id, local_id) SELECT ".$dt[origen].", ".$dt[destino].", 1, ".$dt[conductor].", ".$dt[vehiculo].", ".$_SESSION['fasklog']['local_pre']." FROM DUAL WHERE NOT EXISTS  (SELECT id FROM viajes WHERE localOrigen_id=".$dt[origen]." and localDestino_id=".$dt[destino].")");
        }
    }
 ?>