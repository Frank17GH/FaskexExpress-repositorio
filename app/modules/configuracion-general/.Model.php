<?php 
    class Mod extends database{
        public function tabla1($dt){
            if (!$dt) { 
                 return $this->select("SELECT al.idlocales, lo_direccion, lo_mail, lo_abreviatura, lo_ciudad, lo_estado, gi_nombre, gi_color, cg.idgiros, nombre as nom,(SELECT GROUP_CONCAT(cs.idseries) as series from conf_series cs inner join conf_series_locales cl on cs.idseries=cl.idseries where cl.idlocales=al.idlocales and cs.se_tipo='01') as fact,(SELECT GROUP_CONCAT(cs.idseries) as series from conf_series cs inner join conf_series_locales cl on cs.idseries=cl.idseries where cl.idlocales=al.idlocales and cs.se_tipo='03') as bol,(SELECT GROUP_CONCAT(cs.idseries) as series from conf_series cs inner join conf_series_locales cl on cs.idseries=cl.idseries where cl.idlocales=al.idlocales and cs.se_tipo='07') as cred,(SELECT GROUP_CONCAT(cs.idseries) as series from conf_series cs inner join conf_series_locales cl on cs.idseries=cl.idseries where cl.idlocales=al.idlocales and cs.se_tipo='08') as deb,(SELECT GROUP_CONCAT(cs.idseries) as series from conf_series cs inner join conf_series_locales cl on cs.idseries=cl.idseries where cl.idlocales=al.idlocales and cs.se_tipo='09') as guia, lo_codigo from adm_locales al inner join conf_giros cg on al.idgiros=cg.idgiros left join ciudad_distrito cd on al.lo_ciudad=cd.iddistrito");
             } else{
                return $this->select("SELECT idgiros, lo_direccion, lo_mail, lo_abreviatura, lo_ciudad, lo_estado, gi_nombre, gi_color, cg.idgiros from adm_locales al inner join conf_giros cg on al.idgiros=cg.idgiros WHERE al.idgiros=".$dt);
             }
            
        }
        public function giros(){ 
            return $this->select("SELECT *,(SELECT count(*) from conf_giros_cpe cg inner join conf_cpe cc on cg.idcpe=cc.idcpe where idgiros=ccg.idgiros and cc.idcpe='01') as fact, (SELECT count(*) from conf_giros_cpe cg inner join conf_cpe cc on cg.idcpe=cc.idcpe where idgiros=ccg.idgiros and cc.idcpe='03') as bol, (SELECT count(*) from conf_giros_cpe cg inner join conf_cpe cc on cg.idcpe=cc.idcpe where idgiros=ccg.idgiros and cc.idcpe='07') as cred,(SELECT count(*) from conf_giros_cpe cg inner join conf_cpe cc on cg.idcpe=cc.idcpe where idgiros=ccg.idgiros and cc.idcpe='08') as deb, (SELECT count(*) from conf_giros_cpe cg inner join conf_cpe cc on cg.idcpe=cc.idcpe where idgiros=ccg.idgiros and cc.idcpe='09') as guia from conf_giros ccg");
        }
        public function giros2(){ 
            return $this->select("SELECT * from conf_giros ccg WHERE gi_estado=1 order by gi_pos asc");
        }
        public function ser($dt){ echo "SELECT GROUP_CONCAT(cs.idseries) as series from conf_series cs inner join conf_series_locales cl on cs.idseries=cl.idseries where cl.idlocales=".$dt;
            return $this->select("SELECT GROUP_CONCAT(cs.idseries) as series from conf_series cs inner join conf_series_locales cl on cs.idseries=cl.idseries where cl.idlocales=".$dt);
        }
        public function sel1(){ 
            return $this->select("SELECT * from ciudad_departamento");
        }
        public function sel2($id){ 
            return $this->select("SELECT * from ciudad_provincia where iddepartamento='".$id."'");
        }
        public function sel3($id){ 
            return $this->select("SELECT * from ciudad_distrito WHERE iddistrito='".$id."'");
        }
        public function view($dt){ 
            return $this->select("SELECT idlocales, lo_codigo, idgiros, lo_direccion, lo_mail, lo_abreviatura, lo_ciudad as dist from adm_locales WHERE idlocales=".$dt);
        }
        public function vser($dt){ 
            return $this->select("SELECT GROUP_CONCAT(idseries) as series from conf_series where se_tipo='".$dt."'");
        }
        public function vser2($id,$ser){ 
            return $this->select("SELECT GROUP_CONCAT(cl.idseries) as series from conf_series_locales cl inner join conf_series cs on cl.idseries=cs.idseries where cs.se_tipo='".$ser."' and cl.idlocales=".$id);
        }
        public function mod3($dt){ 
            $dt='0'.$dt;
            return $this->select("SELECT * from conf_series where se_tipo=".$dt);
        }
        public function mod4($dt){ 
            return $this->select("SELECT * FROM conf_cpe t1 WHERE NOT EXISTS (SELECT NULL FROM conf_giros_cpe t2 WHERE t2.idcpe = t1.idcpe AND t2.idgiros=".$dt.")");
        }
        public function mod4_2($dt){ 
            return $this->select("SELECT cl.idgirosseries as id,cc.idcpe as cod, cpe_descrip from conf_cpe cc inner join conf_giros_cpe cl on cc.idcpe=cl.idcpe WHERE cl.idgiros=".$dt);
        }
        public function mod5_2($dt){ 
            return $this->select("SELECT cl.idcpe as id,cc.idcpe as cod, cpe_descrip from conf_cpe cc inner join conf_giros_cpe cl on cc.idcpe=cl.idcpe WHERE cl.idgiros=".explode('-/', $dt)[1]);
        }
        public function mod6($dt){ 
            return $this->select("SELECT * from conf_giros  WHERE idgiros=".$dt);
        }
        public function mod5($idloc,$idcomp){ 
            if ($idcomp=='99') {
                $idcomp='99';
            }else{
                $idcomp='0'.$idcomp;
            }
            return $this->select("SELECT * FROM conf_series t1 WHERE t1.se_tipo='".$idcomp."' AND NOT EXISTS (SELECT NULL FROM conf_series_locales t2 WHERE t2.idseries = t1.idseries AND t2.idlocales=".$idloc.")");
        }
        public function comp1($dt){
          if (explode('-/', $dt)[2]=='99') {
                $idcomp='99';
            }else{
                $idcomp='0'.explode('-/', $dt)[2];
            }            
            return $this->select("SELECT cl.idserielocales as id, cs.se_tipo as tipo, cl.idseries FROM conf_series_locales cl inner join conf_series cs on cl.idseries=cs.idseries WHERE idlocales=".explode('-/', $dt)[0]." and cs.se_tipo='".$idcomp."'");
        }
        public function insert1($dt){ 

       
           if ($dt['tp']) {

                return $this->ejecutar("UPDATE adm_locales set lo_codigo='".$dt['codigo']."',idgiros='".$dt['giro']."',lo_direccion='".$dt['direccion']."',lo_mail='".$dt['correo']."',lo_abreviatura='".$dt['abreviatura']."', lo_ciudad='".$dt['ciudad']."' WHERE idlocales=".$dt['tp']);
            }else{
                return $this->ejecutar("INSERT INTO adm_locales(lo_codigo, idgiros, lo_direccion, lo_abreviatura, lo_ciudad, lo_mail) SELECT '".$dt['codigo']."','".$dt['giro']."','".mb_strtoupper($dt['direccion'])."','".mb_strtoupper($dt['abreviatura'])."','".$dt['ciudad']."','".$dt['correo']."' FROM DUAL WHERE NOT EXISTS (SELECT * FROM adm_locales WHERE lo_abreviatura='".$dt['abreviatura']."')");
            }
        }
        public function insert2($idcpe,$idloc){ 
            if ($idcpe=='99') {
                $idcpe='99';
            }else{
                $idcpe='0'.$idcpe;
            }
            return $this->ejecutar("INSERT INTO conf_giros_cpe(idcpe, idgiros) VALUES ('".$idcpe."',".$idloc.")");
        }
        public function insert3($idser,$idloc){ 
            if ($idser!='null') {
                return $this->ejecutar("INSERT INTO conf_series_locales(idseries, idlocales) VALUES ('".$idser."',".$idloc.")");
            }else{
                return 0;
            }
        }
        public function insert4($tip,$ser){ 
            if ($tip=='99') {
                $tip='99';
            }else{
                $tip='0'.$tip;;
            }
            return $this->ejecutar("INSERT INTO conf_series(idseries, se_tipo) VALUES ('".$ser."','".$tip."')");
        }
        public function del1($dt){ 
            return $this->ejecutar("DELETE FROM adm_locales where idlocales=".$dt);
        }
        public function insert5($dt){ 
            echo "UPDATE conf_giros SET idgiros=".$dt[codigo].",gi_nombre='".$dt[nombre]."',gi_ruc=".$dt[ruc].",gi_color='".$dt[color]."',servidor=".$dt[servidor].",gi_direccion=".$dt[direccion]."";
            if ($dt[tp]) {
                return $this->ejecutar("UPDATE conf_giros SET idgiros=".$dt[codigo].",gi_nombre='".$dt[nombre]."',gi_ruc=".$dt[ruc].",gi_color='".$dt[color]."',servidor=".$dt[servidor].",gi_direccion='".$dt[direccion]."' WHERE idgiros=".$dt[codigo]);
            }else{
                return $this->ejecutar("INSERT INTO conf_giros(idgiros, gi_nombre, gi_ruc, gi_color, gi_pos, gi_estado, servidor, version,gi_direccion) VALUES (".$dt[codigo].", '".$dt[nombre]."', ".$dt[ruc].", '".$dt[color]."',0,1,".$dt[servidor].",".$dt[vers].",'".$dt[direccion]."')");
            }
        }
        public function del2($dt){ 
            return $this->ejecutar("DELETE FROM conf_giros_cpe where idgirosseries=".$dt);
        }
        public function del3($dt){ 
            return $this->ejecutar("DELETE FROM conf_series_locales where idserielocales=".$dt);
        }
        public function del4($dt){ 
            return $this->ejecutar("DELETE FROM conf_series where idseries='".$dt."'");
        }
    }
 ?>